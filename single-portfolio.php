<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');

$image_id = get_post_thumbnail_id(get_the_ID());

$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

?>
<main id="main" class="p-top">
    <?php
    $content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
?>
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-9">
                <article class="blog pb-5">
                    <h1 class="blog__title"><?=get_the_title()?>
                    </h1>
                    <section class="breadcrumbs">
                        <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
?>
                    </section>
                    <?=get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'blog__image mb-5'))?>
                    <?php

foreach ($blocks as $block) {
    echo render_block($block);
}
?>
                    <div class="gallery mt-5">
                        <?php
                        if (get_field('gallery') ?? null) {
                            foreach (get_field('gallery') as $g) {
                                ?>
                        <a href="<?=wp_get_attachment_image_url($g, 'full')?>"
                            data-fancybox="gallery" aria-label="View image">
                            <?=wp_get_attachment_image($g, 'full')?></a>
                        <?php
                            }
                        }
?>
                    </div>
                </article>
            </div>
            <!--
            <div class="col-md-3">
                <aside class="related pb-5">
                    <h3 class="h4">Related News</h3>
                    <?php
$cats = get_the_category();
$ids = wp_list_pluck($cats, 'term_id');
$r = new WP_Query(array(
    'category__in' => $ids,
    'posts_per_page' => 4,
    'post__not_in' => array(get_the_ID())
));
while ($r->have_posts()) {
    $r->the_post();
    ?>
            <a class="blog_card" href="<?=get_the_permalink()?>">
                <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>"
                    alt="" class="blog_card__image">
                <div class="blog_card__content">
                    <h3 class="blog_card__title">
                        <?=get_the_title()?>
                    </h3>
                </div>
            </a>
            <?php
}
?>
            </aside>
        </div>
        -->
    </div>
    </div>
</main>
<?php

add_action('wp_footer', function () {
    ?>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script>
    Fancybox.bind("[data-fancybox]", {});
</script>
<?php
}, 9999);

get_footer();
?>