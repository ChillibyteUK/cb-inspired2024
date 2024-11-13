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
$after;
?>
    <div class="container-xl">
        <h1 class="pf__title"><?=get_the_title()?></h1>
        <div class="mb-4"><?=get_the_content()?></div>
        <div class="row g-2 mb-5">
            <?php
            if (get_field('gallery') ?? null) {
                foreach (get_field('gallery') as $g) {
                    $caption = wp_get_attachment_caption($g) ?? null;
                    ?>
            <a href="<?=wp_get_attachment_image_url($g, 'full')?>"
                data-fancybox="gallery" data-caption="<?=$caption?>" aria-label="View image" class="col-sm-6 col-lg-4">
                <?=wp_get_attachment_image($g, 'full',false,array('class' => 'gallery__image'))?></a>
                    <?php
                }
            }
            ?>
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