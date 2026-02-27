<?php
/**
 * Theme functions and definitions
 *
 * @package cb-inspired2024
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once CB_THEME_DIR . '/inc/cb-utility.php';
require_once CB_THEME_DIR . '/inc/cb-blocks.php';
require_once CB_THEME_DIR . '/inc/cb-block-usage.php';

// Remove unwanted SVG filter injection WP (keep global styles for theme.json utility classes).
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Filter global styles to remove duotone SVG filters while keeping utility classes.
 */
add_filter(
    'wp_get_global_stylesheet',
    function ( $stylesheet ) {
        $stylesheet = preg_replace( '/<svg[^>]*>.*?<\/svg>/s', '', $stylesheet );
        return $stylesheet;
    }
);

/**
 * Editor styles: opt-in so WP loads editor styles in the block editor.
 */
add_action(
    'after_setup_theme',
    function () {
        add_theme_support( 'editor-styles' );
        add_editor_style( 'css/custom-editor-style.css' );
    },
    5
);

/**
 * Neutralise legacy palette/font-size support (theme.json is authoritative).
 */
add_action(
    'after_setup_theme',
    function () {
        remove_theme_support( 'editor-color-palette' );
        remove_theme_support( 'editor-gradient-presets' );
        remove_theme_support( 'editor-font-sizes' );
    },
    99
);

/**
 * Ensure separate core block assets are loaded (performance nicety).
 */
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

// disable theme/plugin file editor.
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Removes specific page templates from the available templates list.
 *
 * @param array $page_templates The list of page templates.
 * @return array The modified list of page templates.
 */
function child_theme_remove_page_template( $page_templates ) {
    unset(
        $page_templates['page-templates/blank.php'],
        $page_templates['page-templates/empty.php'],
        $page_templates['page-templates/left-sidebarpage.php'],
        $page_templates['page-templates/right-sidebarpage.php'],
        $page_templates['page-templates/both-sidebarspage.php']
    );
    return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );

/**
 * Removes support for specific post formats in the theme.
 */
function remove_understrap_post_formats() {
    remove_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
add_action( 'after_setup_theme', 'remove_understrap_post_formats', 11 );


if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(
        array(
            'page_title' => 'Site-Wide Settings',
            'menu_title' => 'Site-Wide Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
        )
    );
}

/**
 * Initializes widgets, menus, and theme supports.
 *
 * This function registers navigation menus, unregisters sidebars and menus,
 * and adds theme support for custom editor color palettes.
 */
function widgets_init() {
    register_nav_menus(
        array(
			'primary_nav'  => __( 'Primary Nav', 'cb-inspired2024' ),
			'footer_menu1' => __( 'Footer Menu 1', 'cb-inspired2024' ),
			'footer_menu2' => __( 'Footer Menu 2', 'cb-inspired2024' ),
        )
    );

    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'footerfull' );
    unregister_nav_menu( 'primary' );

    add_theme_support( 'disable-custom-colors' );
}
add_action( 'widgets_init', 'widgets_init', 11 );

/**
 * Registers a custom dashboard widget for the Chillibyte theme.
 */
function register_cb_dashboard_widget() {
    wp_add_dashboard_widget(
        'cb_dashboard_widget',
        'Chillibyte',
        'cb_dashboard_widget_display'
    );
}
add_action( 'wp_dashboard_setup', 'register_cb_dashboard_widget' );

/**
 * Displays the content of the Chillibyte dashboard widget.
 */
function cb_dashboard_widget_display() {
	?>
    <div style="display: flex; align-items: center; justify-content: space-around;">
        <img style="width: 50%;"
            src="<?= esc_url( get_stylesheet_directory_uri() . '/img/cb-full.jpg' ); ?>">
        <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
            href="mailto:hello@chillibyte.co.uk">Contact</a>
    </div>
    <div>
        <p><strong>Thanks for choosing Chillibyte!</strong></p>
        <hr>
        <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
        <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
    </div>
	<?php
}


add_filter(
    'wpseo_breadcrumb_links',
    function ( $links ) {
        global $post;
        if ( is_singular( 'portfolio' ) ) {
            $t            = get_the_category( $post->ID );
            $breadcrumb[] = array(
                'url'  => '/portfolio/',
                'text' => 'Portfolio',
            );

            array_splice( $links, 1, -2, $breadcrumb );
        }
        return $links;
    }
);

/**
 * Change submit from input to button
 *
 * Do not use example provided by Gravity Forms as it strips out the button attributes including onClick
 *
 * @param string $button_input The original input HTML.
 * @param array  $form The Gravity Forms form array.
 * @return string The updated button HTML.
 */
function wd_gf_update_submit_button( $button_input, $form ) {
    // save attribute string to $button_match[1].
    preg_match( '/<input([^\/>]*)(\s\/)*>/', $button_input, $button_match );

    // remove value attribute (since we aren't using an input).
    $button_atts = str_replace( "value='" . $form['button']['text'] . "' ", '', $button_match[1] );

    // create the button element with the button text inside the button element instead of set as the value.
    return '<button ' . $button_atts . '><span>' . $form['button']['text'] . '</span></button>';
}
add_filter( 'gform_submit_button', 'wd_gf_update_submit_button', 10, 2 );

/**
 * Enqueues theme-specific scripts and styles.
 *
 * This function deregisters jQuery and disables certain styles and scripts
 * that are commented out for potential use in the theme.
 */
function cb_theme_enqueue() {
    $the_theme = wp_get_theme();
    // phpcs:disable
    // wp_enqueue_style('lightbox-stylesheet', get_stylesheet_directory_uri() . '/css/lightbox.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_style('slick-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_style('slick-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_script('lightbox-scripts', get_stylesheet_directory_uri() . '/js/lightbox-plus-jquery.min.js', array(), $the_theme->get('Version'), true);
    // wp_enqueue_script('lightbox-scripts', get_stylesheet_directory_uri() . '/js/lightbox.min.js', array(), $the_theme->get('Version'), true);
    // wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), null, true);
    // wp_enqueue_script('slick-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
    // wp_enqueue_script('gsap-scripts', get_stylesheet_directory_uri() . '/js/gsap/gsap.min.js', array('jquery'), '1.8.1', true);
    // wp_enqueue_script('scrolltrigger-scripts', get_stylesheet_directory_uri() . '/js/gsap/ScrollTrigger.min.js', array('gsap-scripts'), null, true);
    // wp_enqueue_script('splittext-scripts', get_stylesheet_directory_uri() . '/js/gsap/SplitText.min.js', array('gsap-scripts'), null, true);
    // wp_enqueue_script('parallax', get_stylesheet_directory_uri() . '/js/parallax.min.js', array('jquery'), null, true);
    // wp_deregister_script( 'jquery' );
    // phpcs:enable

    wp_enqueue_style( 'aos-style', get_stylesheet_directory_uri() . '/css/aos.css', array() ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
    wp_enqueue_script( 'aos', get_stylesheet_directory_uri() . '/js/aos.js', array(), null, true ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion

    wp_enqueue_style( 'swiper-style', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css', array() ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
    wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array(), null, true ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
}
add_action( 'wp_enqueue_scripts', 'cb_theme_enqueue' );



add_shortcode(
    'phone_emily',
    function () {
		if ( get_field( 'contact_emily', 'options' ) ) {
			return '<a href="tel:' . parse_phone( get_field( 'contact_emily', 'options' ) ) . '">' . get_field( 'contact_emily', 'options' ) . '</a>';
		}
	}
);
add_shortcode(
    'phone_judith',
    function () {
		if ( get_field( 'contact_judith', 'options' ) ) {
			return '<a href="tel:' . parse_phone( get_field( 'contact_judith', 'options' ) ) . '">' . get_field( 'contact_judith', 'options' ) . '</a>';
		}
	}
);
add_shortcode(
    'phone_emily_btn',
    function () {
		if ( get_field( 'contact_emily', 'options' ) ) {
			return '<a href="tel:' . parse_phone( get_field( 'contact_emily', 'options' ) ) . '" class="btn btn-primary"><i class="fa-solid fa-phone"></i> Call Emily</a>';
		}
	}
);
add_shortcode(
    'phone_judith_btn',
    function () {
		if ( get_field( 'contact_judith', 'options' ) ) {
			return '<a href="tel:' . parse_phone( get_field( 'contact_judith', 'options' ) ) . '" class="btn btn-primary"><i class="fa-solid fa-phone"></i> Call Jude</a>';
		}
	}
);
add_shortcode(
    'email_btn',
    function () {
		if ( get_field( 'contact_email', 'options' ) ) {
			return '<a href="mailto:' . antispambot( get_field( 'contact_email', 'options' ) ) . '" class="btn btn-primary"><i class="fa-solid fa-envelope"></i> Email Us</a>';
		}
	}
);


/**
 * Customizes the login logo on the WordPress login page.
 *
 * This function injects custom CSS to replace the default WordPress logo with a custom image.
 * The custom logo is set to be 302px wide and 64px tall, and it is centered on the login page.
 */
function custom_login_logo() {
    $custom_logo_url = '/wp-content/themes/cb-inspired2024/img/cb-full.jpg';
    echo '
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(' . esc_url( $custom_logo_url ) . ');
                width: 302px;
                height: 64px;
                background-size: contain;
                background-repeat: no-repeat;
                padding-bottom: 1rem;
            }
        </style>
    ';
}
add_action( 'login_enqueue_scripts', 'custom_login_logo' );


/**
 * Retrieves a child area page by its slug under the 'areas' parent page.
 *
 * @param string $slug The slug of the area page.
 * @return WP_Post|null The area page post object if found, or null if not found.
 */
function cb_get_area_page_by_slug( string $slug ) {
    $parent = get_page_by_path( 'areas' );
    if ( ! $parent ) {
        return null;
    }
    // get_page_by_path with parent context (WordPress doesn't do nested path matching here),
    // so we fetch by path "areas/{$slug}" in one go.
    $page = get_page_by_path( 'areas/' . $slug );
    return $page instanceof WP_Post ? $page : null;
}

/**
 * Renders the list of areas covered, grouped by county, using the 'area' taxonomy.
 *
 * Outputs HTML for each county and its areas, linking to area pages if available.
 */
function cb_render_areas_we_cover_from_taxonomy() {
    $counties = get_terms(
        array(
            'taxonomy'   => 'area',
            'parent'     => 0,
            'hide_empty' => false,
            'orderby'    => 'name',
            'order'      => 'ASC',
        )
    );

    if ( is_wp_error( $counties ) || empty( $counties ) ) {
        return;
    }

    foreach ( $counties as $county ) {
        $areas = get_terms(
            array(
                'taxonomy'   => 'area',
                'parent'     => (int) $county->term_id,
                'hide_empty' => false,
                'orderby'    => 'name',
                'order'      => 'ASC',
            )
        );

        echo '<div class="areas__group">';
        // Try to find a page for the county (area title).
        $county_slug = $county->slug;
        $county_page = cb_get_area_page_by_slug( $county_slug );
        echo '<h3 class="h3">';
        if ( $county_page ) {
            echo '<a class="areas__link--h3" href="' . esc_url( get_permalink( $county_page->ID ) ) . '">' . esc_html( $county->name ) . '</a>';
        } else {
            echo esc_html( $county->name );
        }
        echo '</h3>';

        // Show areas if they exist, otherwise just show the county.
        if ( ! is_wp_error( $areas ) && ! empty( $areas ) ) {
            echo '<ul class="areas__list">';

            foreach ( $areas as $term ) {
				$slug = $term->slug; // e.g. "guildford".
				$page = cb_get_area_page_by_slug( $slug );

				echo '<li class="areas__item">';
				if ( $page ) {
					echo '<a class="areas__link" href="' . esc_url( get_permalink( $page->ID ) ) . '">'
                    . esc_html( $term->name ) . '</a>';
				} else {
					echo '<span class="areas__text">' . esc_html( $term->name ) . '</span>';
				}
				echo '</li>';
			}

            echo '</ul>';
        }

        echo '</div>';
    }
}
?>