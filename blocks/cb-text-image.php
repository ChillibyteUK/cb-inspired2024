<?php
/**
 * Block template for CB Text Image.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$txtcol = 'text/image' === get_field( 'order' ) ? 'order-2 order-lg-1' : 'order-2 order-lg-2';
$imgcol = 'text/image' === get_field( 'order' ) ? 'order-1 order-lg-2' : 'order-1 order-lg-1';

$txtcolwidth = '5050' === get_field( 'split' ) ? 'col-lg-6' : 'col-lg-8';
$imgcolwidth = '5050' === get_field( 'split' ) ? 'col-lg-6' : 'col-lg-4';

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$img = wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => 'w-75 w-md-50 w-lg-100 mx-auto' ) ) ? wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => 'w-75 w-md-50 w-lg-100 mx-auto' ) ) : '<img src="' . get_stylesheet_directory_uri() . '/img/missing-image.png">';

$anchor = isset( $block['anchor'] ) ? $block['anchor'] : '';
if ( $anchor ) {
    ?>
<a id="<?= esc_attr( $anchor ); ?>" class="anchor"></a>
    <?php
}
?>

<section class="text_image py-5 <?= esc_attr( $bg . ' ' . $fg ); ?> <?= esc_attr( $block['className'] ?? '' ); ?>">
    <div class="container-xl">
        <?php
        if ( get_field( 'title' ) ?? null ) {
            ?>
        <div class="h2 text-center d-lg-none mb-4" data-aos="fade">
            <?= esc_html( get_field( 'title' ) ); ?>
        </div>
            <?php
        }
        ?>
        <div class="row g-5">
            <div
                class="<?= esc_attr( $txtcolwidth ); ?> d-flex flex-column justify-content-center align-items-start <?= esc_attr( $txtcol ); ?>" data-aos="fade">
                <?php
                if ( get_field( 'title' ) ?? null ) {
                    ?>
                <h2 class="d-none d-lg-block mb-4">
                    <?= esc_html( get_field( 'title' ) ); ?>
                </h2>
                    <?php
                }
                ?>
                <div><?= wp_kses_post( get_field( 'content' ) ); ?>
                </div>
                <?php
                if ( get_field( 'link' ) ?? null ) {
                    $l = get_field( 'link' );
                    ?>
                <a href="<?= esc_url( $l['url'] ); ?>"
                    target="<?= esc_attr( $l['target'] ); ?>"
                    class="mt-4 btn <?= esc_attr( $btn ); ?>"><?= esc_html( $l['title'] ); ?></a>
                    <?php
                }
                ?>
            </div>
            <div
                class="<?= esc_attr( $imgcolwidth ); ?> <?= esc_attr( $imgcol ); ?> d-flex align-items-center" data-aos="fade">
                <?= $img; ?>
            </div>
        </div>
    </div>
</section>