<?php
// $f = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: 'NOPE';
$img = wp_get_attachment_image_url(get_field('background'), 'full'); // ?: $f;
$class = $block['className'] ?? null;
?>
<section class="short-hero d-flex <?=$class?>"
    style="background-image:url(<?=$img?>)">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-md-6 position-relative">
                <div class="overlay--light"></div>
                <h1>
                    <?=get_field('title')?>
                </h1>
                <?php
                if (get_field('content')) {
                    ?>
                <div class="text-white" data-aos="fade">
                    <?=get_field('content')?>
                </div>
                <?php
                }
?>
            </div>
        </div>
    </div>
</section>