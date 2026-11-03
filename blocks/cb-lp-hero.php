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
$form_title    = get_field( 'form_title' ) ?: 'Speak to a designer';
$form_intro    = get_field( 'form_intro' ) ?: 'Or send your project details below and we will be in touch.';
$form_id       = absint( get_field( 'gravity_form_id' ) );
$section_id    = $block['anchor'] ?? '';
$extra         = $block['className'] ?? '';
$classes       = trim( 'cb-lp-hero d-flex align-items-center ' . $extra );

// Designer phone numbers come from the site-wide settings.
$designers = array(
	array(
		'name'  => 'Jude Yeo',
		'phone' => get_field( 'contact_judith', 'options' ),
	),
	array(
		'name'  => 'Emily Grayshaw',
		'phone' => get_field( 'contact_emily', 'options' ),
	),
);
$designers = array_filter(
	$designers,
	function ( $designer ) {
		return ! empty( $designer['phone'] );
	}
);

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
                    <div class="cb-lp-hero__form-header">
                        <?php
						if ( $form_title ) {
							?>
                        <h2 class="cb-lp-hero__form-title"><?= esc_html( $form_title ); ?></h2>
							<?php
						}
						if ( $designers ) {
							?>
                        <div class="cb-lp-hero__designers">
                            <?php
							foreach ( $designers as $designer ) {
								?>
                            <a class="cb-lp-hero__designer" href="tel:<?= esc_attr( parse_phone( $designer['phone'] ) ); ?>">
                                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                                <span class="cb-lp-hero__designer-text">
                                    <span class="cb-lp-hero__designer-name"><?= esc_html( $designer['name'] ); ?></span>
                                    <span class="cb-lp-hero__designer-phone"><?= esc_html( $designer['phone'] ); ?></span>
                                </span>
                            </a>
								<?php
							}
							?>
                        </div>
							<?php
						}
						if ( $form_intro ) {
							?>
                        <p class="cb-lp-hero__form-intro"><?= esc_html( $form_intro ); ?></p>
							<?php
						}
						?>
                    </div>
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
