<?php
/**
 * Block template for CB LP Hero.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$background_id = get_field( 'background_image' );
$background    = $background_id ? wp_get_attachment_image_url( $background_id, 'full' ) : '';
$strap         = get_field( 'strap' );
$title         = get_field( 'title' );
$intro         = get_field( 'intro' );
$form_id       = absint( get_field( 'gravity_form_id' ) );
$section_id    = $block['anchor'] ?? '';
$extra         = $block['className'] ?? '';
$classes       = trim( 'cb-lp-hero d-flex align-items-center ' . $extra );

?>
<section class="<?= esc_attr( $classes ); ?>" id="<?= esc_attr( $section_id ); ?>"
<?php
if ( $background ) {
	?>
	style="background-image: url(<?= esc_url( $background ); ?>);"
	<?php
}
?>
	>
    <div class="cb-lp-hero__overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center gy-4">
            <div class="col-lg-8">
                <div class="cb-lp-hero__content">
                    <?php
					if ( $strap ) {
						?>
                        <p class="cb-lp-hero__strap"><?= esc_html( $strap ); ?></p>
                    	<?php
					}
					if ( $title ) {
						?>
                        <h1 class="cb-lp-hero__title"><?= esc_html( $title ); ?></h1>
						<?php
					}
					if ( $intro ) {
						?>
                        <div class="cb-lp-hero__intro"><?= wp_kses_post( wpautop( esc_html( $intro ) ) ); ?></div>
                    	<?php
					}
					?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cb-lp-hero__form-wrap">
                    <?php
                    if ( $form_id ) {
                        echo do_shortcode( '[gravityform id="' . $form_id . '" title="false" description="false" ajax="true"]' );
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
