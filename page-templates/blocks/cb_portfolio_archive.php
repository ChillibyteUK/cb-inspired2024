<section class="portfolio-archive pb-5">
    <div class="container-xl">
        <div class="portfolio-archive__grid">
            <?php
            $q = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => -1
            ));

            while ($q->have_posts()) {
                $q->the_post();
                ?>
            <a class="portfolio__card"
                href="<?=get_the_permalink()?>">
                <?=get_the_post_thumbnail()?>
                <h2><?=get_the_title()?></h2>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
</section>