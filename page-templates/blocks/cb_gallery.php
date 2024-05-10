<section class="the_gallery">
    <div class="container-xl py-5">
        <div class="the_gallery__grid">
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
    </div>
</section>
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
