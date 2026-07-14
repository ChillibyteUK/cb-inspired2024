<?php
/**
 * Block template for CB LP Contact Form.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$btitle     = get_field( 'title' );
$intro      = get_field( 'intro' );
$form_id    = absint( get_field( 'gravity_form_id' ) );
$section_id = $block['anchor'] ?? '';
$extra      = $block['className'] ?? '';
$classes    = trim( 'cb-lp-contact-form ' . $extra );

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

if ( 'has-blue-400-background-color' === $bg ) {
	$fg = 'has-white-color';
}

?>
<section class="<?= esc_attr( $classes ); ?> <?= esc_attr( $bg . ' ' . $fg ); ?>" id="<?= esc_attr( $section_id ); ?>">
	<div class="container">
		<div class="row g-5">
			<div class="col-md-6">
				<div class="cb-lp-contact-form__content">
					<?php
					if ( $btitle ) {
						?>
					<h2 class="cb-lp-contact-form__title"><?= esc_html( $btitle ); ?></h2>
						<?php
					}
					if ( $intro ) {
						?>
					<div class="cb-lp-contact-form__intro"><?= wp_kses_post( wpautop( $intro ) ); ?></div>
						<?php
					}
					?>
                    <ul class="fa-ul my-4">
                        <li><span class="fa-li"><i class="fa-regular fa-envelope"></i></span> Email <?= do_shortcode( '[contact_email]' ); ?></li>
                        <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> Jude <?= do_shortcode( '[phone_judith]' ); ?></li>
                        <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> Emily <?= do_shortcode( '[phone_emily]' ); ?></li>
                    </ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="cb-lp-contact-form__form-wrap">
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
