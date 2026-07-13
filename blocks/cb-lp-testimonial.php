<?php
/**
 * Block template for CB LP Testimonial.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$btitle       = get_field( 'title' );
$testimonials = get_field( 'testimonials' );
$section_id   = $block['anchor'] ?? '';
$extra        = $block['className'] ?? '';
$classes      = trim( 'cb-lp-testimonial ' . $extra );

if ( empty( $testimonials ) || ! is_array( $testimonials ) ) {
	return;
}

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

if ( 'has-blue-400-background-color' === $bg ) {
	$fg = 'has-white-color';
}

?>
<section class="<?= esc_attr( $classes ); ?>  <?= esc_attr( $bg . ' ' . $fg ); ?>" id="<?= esc_attr( $section_id ); ?>">
	<div class="container">
		<?php
		if ( $btitle ) {
			?>
		<h2 class="cb-lp-testimonial__title"><?= esc_html( $btitle ); ?></h2>
			<?php
		}
		?>
		<div class="row g-4">
			<?php
			foreach ( array_slice( $testimonials, 0, 2 ) as $testimonial ) {
				?>
			<div class="col-md-6">
				<div class="cb-lp-testimonial__card">
					<?php
					if ( ! empty( $testimonial['content'] ) ) {
						?>
					<div class="cb-lp-testimonial__content"><?= wp_kses_post( wpautop( esc_html( $testimonial['content'] ) ) ); ?></div>
						<?php
					}
					if ( ! empty( $testimonial['name'] ) ) {
						?>
					<div class="cb-lp-testimonial__name"><?= esc_html( $testimonial['name'] ); ?></div>
						<?php
					}
					if ( ! empty( $testimonial['location'] ) ) {
						?>
					<div class="cb-lp-testimonial__location"><?= esc_html( $testimonial['location'] ); ?></div>
						<?php
					}
					?>
				</div>
			</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
