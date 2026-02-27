<?php
/**
 * Block template for CB Quote.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

?>
<section class="quote py-5 <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <div class="container-xl" data-aos="zoom-in">
        <div class="quote__quote">
            &ldquo;<?= esc_html( get_field( 'quote' ) ); ?>&rdquo;
        </div>
        <div class="quote__attr">
            <?= esc_html( get_field( 'attr' ) ); ?>
        </div>
    </div>
</section>