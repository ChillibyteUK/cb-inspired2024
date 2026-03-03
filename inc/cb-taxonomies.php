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
        'show_ui'            => true,
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

/**
 * Display instructions on the Areas taxonomy admin page.
 *
 * @return void
 */
function cb_area_taxonomy_instructions() {
    $screen = get_current_screen();
    if ( $screen && 'edit-area' === $screen->id ) {
        ?>
        <div class="notice notice-info">
            <p>
                <strong>How Areas Work:</strong><br>
                1. Create hierarchical terms: Parent terms are counties/regions, child terms are specific areas.<br>
                2. Create matching pages under <code>/areas/</code> with slugs matching the term slugs (e.g., <code>/areas/guildford/</code>).<br>
                3. The theme will automatically link areas to pages if a matching page exists. <strong>No need to assign terms to pages.</strong><br>
                4. Areas display on the "Areas We Cover" block—use the hierarchy to organise by county/region.
            </p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'cb_area_taxonomy_instructions' );
