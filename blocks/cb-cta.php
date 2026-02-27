<?php
/**
 * CTA Block Template.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$bgcolour = get_field( 'background' ) ? get_field( 'background' ) : 'white';

$colour = '';

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

if ( 'has-blue-400-background-color' === $bg ) {
	$fg = 'has-white-color';
}

$level = get_field( 'level' ) ? get_field( 'level' ) : 'h2';
?>
<section class="cta py-5 <?= esc_attr( $bg . ' ' . $fg ); ?>">
    <div class="container-xl text-center" data-aos="zoom-in">
		<<?= esc_attr( $level ); ?> class="h3"><?= wp_kses_post( get_field( 'title' ) ); ?></<?= esc_attr( $level ); ?>>
		<?php
		if ( get_field( 'content' ) ) {
			?>
			<p><?= wp_kses_post( get_field( 'content' ) ); ?></p>
			<?php
		}
		$l = get_field( 'link' );
		if ( $l ) {
			$l_url    = $l['url'];
			$l_title  = $l['title'];
			$l_target = $l['target'] ? $l['target'] : '_self';
			?>
		<a class="btn btn-primary mt-3" href="<?= esc_url( $l_url ); ?>" target="<?= esc_attr( $l_target ); ?>">
			<?= esc_html( $l_title ); ?>
		</a>
			<?php
		}
		?>
	</div>
</section>