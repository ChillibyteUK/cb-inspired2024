<section class="image_array py-5">
    <div class="container-xl">
        <h2><?=get_field('title')?></h2>
        <?php
        if(get_field('intro') ?? null) {
            ?>
            <div class="text-center mb-4"><?=get_field('intro')?></div>
            <?php
        }
        ?>
        <div class="image_array__grid">
            <?php
            foreach (get_field('images') as $i) {
                echo wp_get_attachment_image($i, 'large', false);
            }
            ?>
        </div>
        <?php
        if(get_field('outro') ?? null) {
            ?>
            <div class="text-center mt-4"><?=get_field('outro')?></div>
            <?php
        }
        ?>
    </div>
</section>
<style>
.image_array__grid {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 3rem;
}
.image_array__grid img {
    display: block;
    max-height: 70px;
    height: auto;
    width: auto;
    max-width: 150px;
}
</style>