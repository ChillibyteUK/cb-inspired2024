<?php

/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-inspired2024
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?= get_stylesheet_directory_uri() ?>/fonts/figtree-v5-latin-300.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= get_stylesheet_directory_uri() ?>/fonts/figtree-v5-latin-600.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="icon" href="<?= get_stylesheet_directory_uri() ?>/img/favicon.png" type="image/png">

    <?php
    if (get_field('ga_property', 'options')) {
    ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
            src="https://www.googletagmanager.com/gtag/js?id=<?= get_field('ga_property', 'options') ?>">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config',
                '<?= get_field('ga_property', 'options') ?>'
            );
        </script>
    <?php
    }
    if (get_field('gtm_property', 'options')) {
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
                '<?= get_field('gtm_property', 'options') ?>'
            );
        </script>
        <!-- End Google Tag Manager -->
    <?php
    }
    if (get_field('google_site_verification', 'options')) {
        echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
    }
    if (get_field('bing_site_verification', 'options')) {
        echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
    }

    wp_head();
    if (is_front_page()) {
    ?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Organization",
                "name": "Inspired Earth Design",
                "url": "https://www.inspiredearthdesign.co.uk/",
                "logo": "https://www.inspiredearthdesign.co.uk/wp-content/themes/cb-inspired2024/img/ie-logo.png",
                "description": "---",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Dorking",
                    "addressRegion": "Surrey",
                    "addressCountry": "UK"
                },
                "email": "hello@inspiredearthdesign.co.uk",
                "contactPoint": [{
                        "@type": "ContactPoint",
                        "telephone": "07917 208655",
                        "contactType": "Jude Yeo"
                    },
                    {
                        "@type": "ContactPoint",
                        "telephone": "07799 292573",
                        "contactType": "Emily Grayshaw"
                    }
                ],
                "sameAs": [
                    "https://www.instagram.com//",
                    "https://www.facebook.com//",
                    "https://www.linkedin.com/company//"
                ]
            }
        </script>
    <?php
    }
    ?>
    <style>
.navbar-toggler {
    border: none;
    background: transparent !important;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 24px;
    cursor: pointer;
    position: relative;
    padding: 0;
}
.navbar-toggler:focus {
    box-shadow: none;
}

/* Style the hamburger bars */
.navbar-toggler .icon-bar {
    display: block;
    width: 100%;        /* Full width of the toggler */
    height: 3px;        /* Thicker height for bars */
    background-color: rgba(0 0 0 /.7);  /* Adjust to your desired color */
    border-radius: 2px; /* Add slight rounding for a softer look */
    transition: all 0.3s ease; /* Smooth transition for the animation */
    position: absolute; /* Positioning to align properly during transformation */
}

/* Positioning each bar correctly when the hamburger is closed */
.icon-bar:nth-of-type(1) {
    top: 0; /* Top bar */
}

.icon-bar:nth-of-type(2) {
    top: 50%; /* Middle bar centered */
    transform: translateY(-50%); /* Adjust to perfectly center */
}

.icon-bar:nth-of-type(3) {
    bottom: 0; /* Bottom bar */
}

/* Animation to form the X when expanded */
.navbar-toggler[aria-expanded="true"] .icon-bar:nth-of-type(1) {
    transform: rotate(45deg);
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
}

.navbar-toggler[aria-expanded="true"] .icon-bar:nth-of-type(2) {
    opacity: 0; /* Hide the middle bar */
}

.navbar-toggler[aria-expanded="true"] .icon-bar:nth-of-type(3) {
    transform: rotate(-45deg);
    top: 50%;
    transform: translateY(-50%) rotate(-45deg);
}

    </style>
</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php
    do_action('wp_body_open');
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-grey-200">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="<?= get_stylesheet_directory_uri() ?>/img/ie-logo--dk.svg" alt="Inspired Earth Design" width="170" height="61" class="d-inline-block align-text-top">
                </a>

                <!-- Burger Menu for Mobile -->
                <button class="navbar-toggler x collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary_nav',
                            'container_class' => 'container-xl w-100',
                            'menu_class'      => 'navbar-nav justify-content-end',
                            'fallback_cb'     => '',
                            'depth'           => 3,
                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
    </header>