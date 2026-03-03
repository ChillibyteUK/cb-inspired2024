<?php
/**
 * Custom taxonomies for the CB Inspired 2024 theme.
 *
 * This file defines and registers custom taxonomies.
 *
 * @package cb-inspired2024
 */

/**
 * Register custom taxonomies for the theme.
 *
 * This function registers the 'area' taxonomy.
 * The taxonomy is hierarchical and can be associated with any post type as needed.
 *
 * @return void
 */
function cb_register_taxonomies() {
    $args = array(
        'labels'             => array(
            'name'          => 'Areas',
            'singular_name' => 'Area',
        ),
        'public'             => false,
        'publicly_queryable' => false,
        'hierarchical'       => true,
        'show_ui'            => false,
        'show_in_nav_menus'  => false,
        'show_tagcloud'      => false,
        'show_in_quick_edit' => false,
        'show_admin_column'  => false,
        'show_in_rest'       => false,
        'rewrite'            => false,
    );

    register_taxonomy( 'area', array( 'page' ), $args );
}
add_action( 'init', 'cb_register_taxonomies' );
