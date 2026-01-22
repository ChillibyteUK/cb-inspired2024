<?php
/**
 * CTA Block Template.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$bgcolour = get_field('background') ?: 'white';

$colour = '';

if ( 'blue-400' === $bgcolour ) {
	$colour = 'has-white-color';
}

$level = get_field( 'level' ) ? get_field( 'level' ) : 'h2';
?>
<section class="cta py-5 bg-<?= esc_attr( $bgcolour ); ?> <?= esc_attr( $colour ); ?>">
    <div class="container-xl text-center" data-aos="zoom-in">
		<<?= esc_attr( $level ); ?> class="h3 <?= esc_attr( $colour ); ?>"><?= wp_kses_post( get_field( 'title' ) ); ?></<?= esc_attr( $level ); ?>>
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
		<a class="btn btn-primary mt-3" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
			<?= esc_html( $link_title ); ?>
		</a>
			<?php
		}
		?>
	</div>
</section>