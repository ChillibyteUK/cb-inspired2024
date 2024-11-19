<section class="portfolio_grid py-5">
    <div class="container-xl">
        <div class="row g-4">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
        ));

        while ($q->have_posts()) {
            $q->the_post();
            ?>
        <a href="<?=get_the_permalink()?>" class="col-sm-6 col-lg-4 portfolio_grid__card">
            <div class="portfolio_grid__image"><?=get_the_post_thumbnail(get_the_ID(),'full')?></div>
            <div class="portfolio_grid__title"><?=get_the_title()?></div>
        </a>
            <?php
        }
        wp_reset_postdata();
        ?>
        </div>
    </div>
</section>