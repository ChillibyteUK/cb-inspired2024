<?php
$q = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category_name' => 'blog'
));
?>
<section class="latest_news py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="mb-4">Latest News</h2>
                <div class="row g-4 latest_news__grid">
                    <?php
                    while ($q->have_posts()) {
                        $q->the_post();
                        ?>
                    <div class="col-md-6">
                        <a href="<?=get_the_permalink()?>"
                            class="latest_news__card">
                            <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>"
                                alt="<?=get_the_title()?>">
                            <div class="latest_news__inner">
                                <h3><?=get_the_title()?></h3>
                                <div class="latest_news__date">
                                    <?=get_the_date('j / m / Y')?>
                                </div>
                                <div class="latest_news__excerpt">
                                    <?=wp_trim_words(get_the_content(null, false, get_the_ID()), 30)?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
?>
                </div>
                <div class="text-center py-4">
                    <a href="/blog/" class="btn btn-primary">All news</a>
                </div>
            </div>
            <div class="col-lg-4">
                <h2 class="mb-4">Jobs for
                    <?=date('F')?>
                </h2>
                <div class="d-grid">
                    <?php
                $j = new WP_Query(array(
'post_type' => 'post',
'posts_per_page' => 1,
'category_name' => 'top-jobs-this-month',
'date_query' => array(
    array(
        'month' => date('m')
    )
)
                ));
while ($j->have_posts()) {
    $j->the_post();
    ?>
                    <a href="<?=get_the_permalink()?>"
                        class="latest_news__card">
                        <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>"
                            alt="<?=get_the_title()?>">
                        <div class="latest_news__inner">
                            <div class="latest_news__excerpt mb-3">
                                <?=wp_trim_words(get_the_content(null, false, get_the_ID()), 28)?>
                            </div>
                            <div class="text-center">
                                <span class="btn btn-primary">Read More</span>
                            </div>
                        </div>
                    </a>
                    <?php
}
?>
                </div>
            </div>
        </div>
    </div>
</section>