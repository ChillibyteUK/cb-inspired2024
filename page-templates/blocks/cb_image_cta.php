<?php
$img = wp_get_attachment_image_url(get_field('background'), 'full');
$c = get_field('cta');
$classes = $block['className'] ?? null;
?>
<section class="image_cta py-5 <?=$classes?>"
    style="background-image:url(<?=$img?>)">
    <div class="container-xl">
        <div class="image_cta__inner">
            <div class="overlay"></div>
            <h2 class="image_cta__title">
                <?=get_field('title')?>
            </h2>
            <div class="image_cta__content">
                <?=get_field('content')?>
            </div>
            <a href="<?=$c['url']?>"
                target="<?=$c['target']?>"
                class="btn btn-white"><?=$c['title']?></a>
        </div>
    </div>
</section>