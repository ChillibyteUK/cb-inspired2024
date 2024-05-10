<section class="the_gallery">
    <div class="container-xl py-5">
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
</section>