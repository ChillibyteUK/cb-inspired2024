<?php
/**
 * Block template for CB Featured In.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$logos      = get_field( 'logos' );
$section_id = $block['anchor'] ?? '';
$extra      = $block['className'] ?? '';
$classes    = trim( 'cb-featured-in ' . $extra );

if ( empty( $logos ) || ! is_array( $logos ) ) {
    return;
}
?>
<section class="<?= esc_attr( $classes ); ?>" id="<?= esc_attr( $section_id ); ?>">
    <div class="container">
        <h2 class="cb-featured-in__title">As featured in</h2>
        <div class="cb-featured-in__logos">
            <?php
			foreach ( $logos as $logo_id ) {
				echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'cb-featured-in__logo' ) );
            }
			?>
        </div>
    </div>
</section>
