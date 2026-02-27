<?php
/**
 * Block template for CB Split.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$classes = $block['className'] ?? null;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$image_order    = 'Image/Text' === get_field( 'order' ) ? '' : 'order-lg-2';
$text_order     = 'Image/Text' === get_field( 'order' ) ? '' : 'order-lg-1';
$text_alignment = 'Image/Text' === get_field( 'order' ) ? 'text--right' : 'text--left  ';

$img = wp_get_attachment_image_url( get_field( 'image' ), 'full' ) ? wp_get_attachment_image_url( get_field( 'image' ), 'full' ) : get_stylesheet_directory_uri() . '/img/placeholder-800x450.png';
?>
<section
    class="split <?= esc_attr( $bg . ' ' . $fg ); ?> <?= esc_attr( $classes ); ?>">
    <div class="container-fluid">
        <div class="h2 d-lg-none text-center pt-3">
            <?= esc_html( get_field( 'title' ) ); ?>
        </div>
        <div class="row h-100">
            <div class="col-lg-6 split__image <?= esc_attr( $image_order ); ?>" data-aos="fade">
                <?php
                $image_html = wp_get_attachment_image( get_field( 'image' ), 'full' );
                echo $image_html ? $image_html : '<img src="' . esc_url( get_stylesheet_directory_uri() . '/img/placeholder-800x450.png' ) . '" alt="Placeholder">';
                ?>
            </div>
            <div class="col-lg-6 h-100 my-auto <?= esc_attr( $text_order ); ?>" data-aos="fade">
                <div class="ps-xl-3 py-5 my-auto <?= esc_attr( $text_alignment ); ?>">
                    <h2 class="h2 d-none d-lg-block">
                        <?= esc_html( get_field( 'title' ) ); ?>
                    </h2>
                    <?= wp_kses_post( get_field( 'content' ) ); ?>
                    <?php
                    if ( get_field( 'link' ) ?? null ) {
                        $l = get_field( 'link' );
                        ?>
                    <a href="<?= esc_url( $l['url'] ); ?>"
                        class="btn btn-primary mx-auto ms-md-0"
                        target="<?= esc_attr( $l['target'] ); ?>"><?= esc_html( $l['title'] ); ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>