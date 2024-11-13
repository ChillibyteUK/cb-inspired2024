<section class="portfolio">
    <div class="container-xl my-auto py-5">
        <h2 class="mb-5" data-aos="fade">Portfolio</h2>
        <div class="portfolio__swiper swiper-container mb-4">
            <div class="swiper-wrapper">
                <?php
                $q = new WP_Query(array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => 9
                ));
                while ($q->have_posts()) {
                    $q->the_post();
                ?>
                    <div class="swiper-slide">
                        <a class="portfolio__card" href="<?= get_the_permalink() ?>">
                            <?= get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'portfolio__image')) ?>
                            <h3 class="h4 mt-2"><?= get_the_title() ?></h3>
                        </a>
                    </div>
                <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="swiper-controls">
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
?>
    <script>
        const swiper = new Swiper('.portfolio__swiper', {
            slidesPerView: 2, // Shows 4 cards at a time
            spaceBetween: 16, // Space between cards (adjust as needed)
            slidesPerGroup: 1, // Moves one slide at a time
            loop: true, // Loop through slides
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                }, // 1 card at a time on very small screens
                576: {
                    slidesPerView: 2
                }, // 2 cards at a time on small screens
                768: {
                    slidesPerView: 2
                }, // 3 cards at a time on medium screens
                992: {
                    slidesPerView: 2
                }, // 4 cards at a time on large screens
                1200: {
                    slidesPerView: 3
                } // 4 cards at a time on large screens
            }
        });
    </script>
<?php
}, 9999);
