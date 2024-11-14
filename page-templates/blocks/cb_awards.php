<section class="awards py-5 bg-grey-200">
    <div class="container-xl py-5">
        <div class="row">
            <div class="col-md-3" data-aos="fade">
                <h2>Awards &amp; affiliations</h2>
            </div>
            <div class="col-md-9 position-relative">
                <div class="awards__swiper swiper-container mb-3">
                    <div class="swiper-wrapper">
                        <?php
                        $d = 0;
                        foreach (get_field('badges', 'option') as $b) {
                        ?>
                            <div class="swiper-slide" data-aos="fade" data-aos-delay="<?=$d?>">
                                <?= wp_get_attachment_image($b, 'full', false, array('class' => 'awards__badge')) ?>
                            </div>
                        <?php
                            $d += 200;
                        }
                        ?>
                    </div>
                </div>
                <div class="swiper-controls">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
?>
    <script>
        const swiper2 = new Swiper('.awards__swiper', {
            slidesPerView: 4, // Shows 4 cards at a time
            spaceBetween: 16, // Space between cards (adjust as needed)
            slidesPerGroup: 1, // Moves one slide at a time
            loop: true, // Loop through slides
            autoplay: true,
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
                    slidesPerView: 3
                }, // 3 cards at a time on medium screens
                992: {
                    slidesPerView: 4
                }, // 4 cards at a time on large screens
                1200: {
                    slidesPerView: 4
                } // 4 cards at a time on large screens
            }
        });
    </script>
<?php
}, 9999);
