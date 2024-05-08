<?php
/**
 * Template Name: Blog Index
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$img = get_the_post_thumbnail_url(get_option('page_for_posts'), 'full');
?>
<main id="main">
    <section class="short-hero d-flex mb-0"
        style="background-image:url(<?=$img?>);">
        <div class="overlay--light"></div>
        <div class="container-xl d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-md-6">
                    <h1>Inspired Earth Blog</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container-xl py-5">
            <div class="news__grid">
                <?php
            $w = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'publish_date',
                'order' => 'DESC',
                'category_name' => 'blog'
            ));
while ($w->have_posts()) {
    $w->the_post();
    ?>
                <a class="news__card"
                    href="<?=get_the_permalink()?>">
                    <img
                        src="<?=get_the_post_thumbnail_url($w->ID, 'large')?>">
                    <div class="news__inner">
                        <h3><?=get_the_title()?></h3>
                        <div class="latest_news__date">
                            <?=get_the_date('j / m / Y')?>
                        </div>
                        <div class="latest_news__excerpt">
                            <?=wp_trim_words(get_the_content(null, false, get_the_ID()), 30)?>
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