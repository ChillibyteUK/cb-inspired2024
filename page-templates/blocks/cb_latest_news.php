<?php
/**
 * Latest News Block Template.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$q = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
	)
);
?>
<section class="latest_news py-5">
    <div class="container-xl">
		<h2 class="mb-4">Latest News</h2>
		<div class="row g-4 latest_news__grid">
			<?php
			while ( $q->have_posts() ) {
				$q->the_post();
				?>
			<div class="col-md-4">
				<a href="<?= esc_url( get_the_permalink() ); ?>"
					class="latest_news__card">
					<img src="<?= esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>"
						alt="<?= esc_attr( get_the_title() ); ?>">
					<div class="latest_news__inner">
						<h3><?= esc_html( get_the_title() ); ?></h3>
						<div class="latest_news__date">
							<?= esc_html( get_the_date( 'j / m / Y' ) ); ?>
						</div>
						<div class="latest_news__excerpt">
							<?= wp_kses_post( wp_trim_words( get_the_content( null, false, get_the_ID() ), 30 ) ); ?>
						</div>
					</div>
				</a>
			</div>
				<?php
			}
			?>
		</div>
		<div class="text-center py-4">
			<a href="/blog/" class="btn btn-primary">All news</a>
		</div>
    </div>
</section>