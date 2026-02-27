<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

session_start();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta
        charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/figtree-v5-latin-300.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/figtree-v5-latin-600.woff2' ); ?>"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php
    if ( ! is_user_logged_in() ) {
        if ( get_field( 'ga_property', 'options' ) ) {
        	?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
            src="https://www.googletagmanager.com/gtag/js?id=<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config',
                '<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>'
            );
        </script>
        	<?php
        }
        if ( get_field( 'gtm_property', 'options' ) ) {
        	?>
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer',
                '<?= esc_attr( get_field( 'gtm_property', 'options' ) ); ?>'
            );
        </script>
        <!-- End Google Tag Manager -->
        	<?php
        }
    }
    if ( get_field( 'google_site_verification', 'options' ) ) {
        echo '<meta name="google-site-verification" content="' . esc_attr( get_field( 'google_site_verification', 'options' ) ) . '" />';
    }
    if ( get_field( 'bing_site_verification', 'options' ) ) {
        echo '<meta name="msvalidate.01" content="' . esc_attr( get_field( 'bing_site_verification', 'options' ) ) . '" />';
    }

    wp_head();
    if ( is_front_page() || is_page( 'contact-us' ) ) {
    	?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Organization",
                "name": "Inspired Earth Design",
                "url": "https://www.inspiredearthdesign.co.uk/",
                "logo": "https://www.inspiredearthdesign.co.uk/wp-content/themes/cb-inspired2024/img/ied_logo_green.svg",
                "description": "Inspired Earth Design is a multi-award winning landscape design company with a passion for creating incredible bespoke outdoor spaces. We have over 20 years experience in the industry, and have won several awards for our design work, including RHS Gold Medals. We create gardens and outdoor spaces that are beautiful, environmentally intelligent, with a carefully considered structure. In just six simple stages, we explain how we transport you from your current garden to the one that you're dreaming of.",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "18 Lammas Road",
					"addressLocality": "Godalming",
					"postalCode": "GU7 1YL",
					"addressRegion": "Surrey",
					"addressCountry": "UK"
				},
                "email": "hello@inspiredearthdesign.co.uk",
                "contactPoint": [{
                        "@type": "ContactPoint",
                        "telephone": "+44 7917 208655",
                        "contactType": "Jude Yeo"
                    },
                    {
                        "@type": "ContactPoint",
                        "telephone": "+44 7799 292573",
                        "contactType": "Emily Grayshaw"
                    }
                ],
                "sameAs": [
					"https://www.instagram.com/inspiredearthdesign/",
					"https://www.facebook.com/p/Inspired-Earth-Design-61562789076095/"
                ]
            }
        </script>
    	<?php
    }
    ?>
	<meta name="p:domain_verify" content="80e4add8511a5857d93d760982038183"/>
</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php
    if ( ! is_user_logged_in() ) {
        if ( get_field( 'gtm_property', 'options' ) ) {
        	?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe
                src="https://www.googletagmanager.com/ns.html?id=<?= esc_attr( get_field( 'gtm_property', 'options' ) ); ?>"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        	<?php
        }
    }
    do_action( 'wp_body_open' );
    ?>
    <header id="wrapperNavbar">
        <nav class="navbar">
            <button class="menu" id="menutoggle" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#rightOffcanvas" aria-controls="rightOffcanvas">
                Menu <i class="fa-solid fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="rightOffcanvas"
                aria-labelledby="rightOffcanvasLabel">
                <div class="offcanvas-body">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary_nav',
                            'container_class' => 'container-xl w-100',
                            'menu_class'      => 'navbar-nav justify-content-between gap-1',
                            'fallback_cb'     => '',
                            'menu_id'         => 'navbarr',
                            'depth'           => 3,
                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
        <?php
        if ( ! is_front_page() ) {
        	?>
        <a class="site-logo" href="/">
            <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/ied_logo_white.svg' ); ?>" alt="Inspired Earth Design" width="141" height="62" class="d-inline-block align-text-top">
        </a>
            <?php
        }
        ?>
    </header>