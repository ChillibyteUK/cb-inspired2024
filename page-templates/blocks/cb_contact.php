<?php
$bg = get_field('colour') ? 'bg-' . get_field('colour') : null;
?>
<section
    class="split bg-grey-200 contact">
    <div class="container-fluid">
        <div class="h1 d-lg-none text-center pt-3">
            Get in Touch
        </div>
        <div class="row h-100">
            <div class="col-lg-6 split__image order-lg-2" data-aos="fade">
                <?= wp_get_attachment_image(get_field('image'), 'full') ?: get_stylesheet_directory_uri() . '/img/placeholder-800x450.png'; ?>
            </div>
            <div class="col-lg-6 h-100 my-auto order-lg-1" data-aos="fade">
                <div class="ps-xl-3 py-5 my-auto text--left">
                    <h1 class="h1 d-none d-lg-block">
                        Get in Touch
                    </h1>
                    <?= get_field('content') ?>
                    <ul class="fa-ul my-4">
                        <li><span class="fa-li"><i class="fa-regular fa-envelope"></i></span> Email <?=do_shortcode('[contact_email]')?></li>
                        <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> Jude <?=do_shortcode('[phone_judith]')?></li>
                        <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> Emily <?=do_shortcode('[phone_emily]')?></li>
                    </ul>
                    <h2 class="h3">Find us on Instagram</h2>
                    <?php
                    $s = get_field('social', 'options');
                    $insta = $s['instagram_url'] ?? null;
                    preg_match('/instagram\.com\/([^\/]+)/', $insta, $matches);
                    $username = $matches[1];
                    ?>
                    <ul class="fa-ul mb-4">
                        <li><span class="fa-li"><i class="fab fa-instagram"></i></span> <a href="<?=$insta?>" target="_blank">@<?=$username?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>