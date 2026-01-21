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
?>
<section class="cta py-5 bg-<?=$bgcolour?> <?=$colour?>">
    <div class="container-xl text-center" data-aos="zoom-in">
		<h3 class="<?= $colour; ?>"><?= wp_kses_post( get_field( 'title' ) ); ?></h3>
		<p><?= wp_kses_post( get_field( 'content' ) ); ?></p>
		<?php
		$link = get_field( 'link' );
		if ( $link ) :
			$link_url    = $link['url'];
			$link_title  = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
		<a class="btn btn-primary mt-3" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
			<?= esc_html( $link_title ); ?>
		</a>
		<?php endif; ?>
	</div>
</section>