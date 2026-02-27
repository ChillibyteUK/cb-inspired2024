<?php
/**
 * Register ACF Blocks
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register ACF Blocks
 */
function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

		// INSERT NEW BLOCKS HERE.

		acf_register_block_type(
            array(
				'name'            => 'cb_cta',
				'title'           => __( 'CB CTA' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-cta.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
				),
            )
        );
		acf_register_block_type(
            array(
				'name'            => 'cb_latest_news',
				'title'           => __( 'CB Latest News' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-latest-news.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_hero',
				'title'           => __( 'CB Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_video_hero',
				'title'           => __( 'CB Video Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-video-hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_short_hero',
				'title'           => __( 'CB Short Hero' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-short-hero.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_text_image',
				'title'           => __( 'CB Text / Image' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-text-image.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_full_width',
				'title'           => __( 'CB Full Width' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-full-width.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_split',
				'title'           => __( 'CB Split' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-split.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_portfolio',
				'title'           => __( 'CB Portfolio' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-portfolio.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_portfolio_grid',
				'title'           => __( 'CB Portfolio Grid' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-portfolio-grid.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_insta_panel',
				'title'           => __( 'CB Instagram Panel' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-insta-panel.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_awards',
				'title'           => __( 'CB Awards Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-awards.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_quote',
				'title'           => __( 'CB Quote' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-quote.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
					'color'     => array(
						'gradients'  => false,
						'text'       => true,
						'background' => true,
					),
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_contact',
				'title'           => __( 'CB Contact' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-contact.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_image_array',
				'title'           => __( 'CB Image Array' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-image-array.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_areas',
				'title'           => __( 'CB Areas' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-areas.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
            )
        );
    }
}
add_action( 'acf/init', 'acf_blocks' );

// Auto-sync ACF field groups from acf-json folder.
add_filter(
	'acf/settings/save_json',
	function ( $path ) { // phpcs:ignore
		return get_stylesheet_directory() . '/acf-json';
	}
);

add_filter(
	'acf/settings/load_json',
	function ( $paths ) {
		unset( $paths[0] );
		$paths[] = get_stylesheet_directory() . '/acf-json';
		return $paths;
	}
);

/**
 * Gutenburg core modifications.
 *
 * This is a bit hacky, but it allows us to wrap core blocks in a container without having to modify the content of each block in the editor. We can also add an id to headings for anchor links.
 *
 * @param array  $args Block type arguments.
 * @param string $name Block type name.
 * @return array Modified block type arguments.
 */
function core_image_block_type_args( $args, $name ) {
    if ( 'core/paragraph' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( 'core/list' === $name ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( 'core/heading' === $name ) {
        $args['render_callback'] = 'modify_core_heading';
    }

    return $args;
}
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );

/**
 * Helper function to detect if footer.php is being rendered.
 *
 * @return bool True if footer.php is being rendered, false otherwise.
 */
function is_footer_rendering() {
	$backtrace = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ); // phpcs:ignore
	foreach ( $backtrace as $trace ) {
		if ( isset( $trace['file'] ) && basename( $trace['file'] ) === 'footer.php' ) {
			return true;
		}
	}
	return false;
}

/**
 * Wrap core block content in a container.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Block content.
 * @return string Wrapped block content.
 */
function modify_core_add_container( $attributes, $content ) {
	if ( is_footer_rendering() ) {
		return $content;
	}
	ob_start();
	?>
    <div class="container-xl">
        <?= wp_kses_post( $content ); ?>
    </div>
	<?php
    $content = ob_get_clean();
    return $content;
}

/**
 * Wrap core heading content in a container and add an ID for anchors.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Block content.
 * @return string Wrapped block content.
 */
function modify_core_heading( $attributes, $content ) {
	if ( is_footer_rendering() ) {
		return $content;
	}
	ob_start();
	$id = strtolower( wp_strip_all_tags( $content ) );
	$id = cbslugify( $id );
	?>
    <div class="container-xl" id="<?= esc_attr( $id ); ?>">
        <?= wp_kses_post( $content ); ?>
    </div>
	<?php
    $content = ob_get_clean();
    return $content;
}
