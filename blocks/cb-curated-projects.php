<?php
/**
 * Block template for CB Curated Projects.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$block = isset( $block ) && is_array( $block ) ? $block : array();

$btitle      = get_field( 'title' );
$subtitle    = get_field( 'subtitle' );
$projects    = get_field( 'projects' );
$block_id    = 'cb-curated-projects-' . ( $block['id'] ?? uniqid() );
$section_id  = $block['anchor'] ?? $block_id;
$extra_class = $block['className'] ?? 'py-5';

if ( empty( $projects ) || ! is_array( $projects ) ) {
    return;
}

$projects = array_values(
    array_filter(
        array_map(
            static function ( $project ) {
                if ( is_object( $project ) && isset( $project->ID ) ) {
                    return (int) $project->ID;
                }

                if ( is_numeric( $project ) ) {
                    return (int) $project;
                }

                return 0;
            },
            array_slice( $projects, 0, 3 )
        )
    )
);

if ( empty( $projects ) ) {
    return;
}

$primary_project     = $projects[0] ?? 0;
$secondary_projects  = array_slice( $projects, 1, 2 );
$render_project_card = static function ( $project_id, $size = 'large', $modifier = '' ) {
    if ( ! $project_id ) {
        return;
    }

    $project_title = get_the_title( $project_id );
    $project_link  = get_permalink( $project_id );
    $image_url     = has_post_thumbnail( $project_id )
        ? get_the_post_thumbnail_url( $project_id, $size )
        : get_stylesheet_directory_uri() . '/img/placeholder-800x450.png';
    ?>
    <a class="cb-curated-projects__card <?= esc_attr( $modifier ); ?>" href="<?= esc_url( $project_link ); ?>">
        <div class="cb-curated-projects__media" style="--cb-curated-project-image: url('<?= esc_url( $image_url ); ?>');">
            <span class="cb-curated-projects__overlay"></span>
            <span class="cb-curated-projects__project-title"><?= esc_html( $project_title ); ?></span>
        </div>
    </a>
    <?php
};
?>
<section class="cb-curated-projects <?= esc_attr( $extra_class ); ?>" id="<?= esc_attr( $section_id ); ?>">
    <div class="container">
        <div class="cb-curated-projects__header row align-items-end g-4">
            <div class="col-lg-8">
                <?php
                if ( $btitle ) {
                    ?>
                    <h2 class="cb-curated-projects__title"><?= esc_html( $btitle ); ?></h2>
                    <?php
                }
                if ( $subtitle ) {
                    ?>
                    <div class="cb-curated-projects__subtitle"><?= esc_html( $subtitle ); ?></div>
                    <?php
                }
                ?>
            </div>

            <div class="col-lg-4 d-flex justify-content-lg-end">
                <a class="btn cb-curated-projects__button" href="<?= esc_url( home_url( '/portfolio/' ) ); ?>">View Portfolio</a>
            </div>
        </div>

        <div class="cb-curated-projects__grid row g-4">
            <div class="col-lg-8">
                <?php $render_project_card( $primary_project, 'full', 'cb-curated-projects__card--featured' ); ?>
            </div>

            <?php
            if ( ! empty( $secondary_projects ) ) {
                ?>
            <div class="col-lg-4">
                <div class="cb-curated-projects__stack">
                    <?php foreach ( $secondary_projects as $project_id ) : ?>
                        <?php $render_project_card( $project_id, 'large', 'cb-curated-projects__card--stacked' ); ?>
                    <?php endforeach; ?>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
