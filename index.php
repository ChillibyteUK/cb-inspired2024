<?php
/**
 * Template Name: Blog Index
 *
 * @package cb-inspired2024
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$img = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'full' );
?>
<main id="main">
	<section class="hero hero--short">
		<div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
			<div class="carousel-inner">
				<img src="<?= esc_url( $img ); ?>" class="d-block w-100">
			</div>
		</div>
		<div class="hero__inner">
			<div class="container-xl my-auto">
				<div class="row">
					<div class="col-md-6">
						<h1>Inspired Earth Blog</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="news">
        <div class="container-xl py-5">
            <div class="news__grid">
                <?php
				$w = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => -1,
						'orderby'        => 'publish_date',
						'order'          => 'DESC',
					)
				);
				while ( $w->have_posts() ) {
					$w->the_post();
					?>
                <a class="news__card" href="<?= esc_url( get_the_permalink() ); ?>">
                    <img src="<?= esc_url( get_the_post_thumbnail_url( $w->ID, 'large' ) ); ?>">
                    <div class="news__inner">
                        <h3><?= esc_html( get_the_title() ); ?></h3>
                        <div class="latest_news__date">
                            <?= esc_html( get_the_date( 'j / m / Y' ) ); ?>
                        </div>
                        <div class="latest_news__excerpt">
                            <?= wp_kses_post( wp_trim_words( get_the_content( null, false, get_the_ID() ), 30 ) ); ?>
                        </div>
                    </div>
                </a>
                	<?php
				}
				?>
            </div>
        </div>
    </section>
<?php
get_footer();
?>