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
                    <h1>GY Gardening Blog</h1>
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
        </div>
        </div>
    </section>
    <section class="jobs py-5 has-bg--light-wo">
        <div class="container-xl">
            <h2 class="mb-5">Top Jobs by Month</h2>
            <div class="jobs__grid">
                <?php
        $m = new WP_Query(array(
'post_type' => 'post',
'post_status' => 'publish',
'posts_per_page' => -1,
'category_name' => 'top-jobs-this-month',
'order' => 'ASC',
        ));
$jobs = array();
while ($m->have_posts()) {
    $m->the_post();
    $d = get_the_date('n', get_the_ID());
    // echo $d;
    $jobs[$d] = get_the_ID();
}

$startIndex = date('n'); // Index to start from
$endIndex = $startIndex -1 ;   // Index to stop at

// Slice the array to get the elements from the start index to the end of the array
$firstPart = array_slice($jobs, $startIndex);

// Slice the array to get the elements from the beginning to the end index
$secondPart = array_slice($jobs, 0, $endIndex + 1);

// Concatenate the two parts to get the desired result
$result = array_merge($firstPart, $secondPart);

// Output the result

foreach ($result as $i) {
    ?>
                <a class="jobs__card"
                    href="<?=get_the_permalink($i)?>">
                    <img
                        src="<?=get_the_post_thumbnail_url($i, 'large')?>">
                    <div class="jobs__inner">
                        <h3><?=get_the_title($i)?></h3>
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