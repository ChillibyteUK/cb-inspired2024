<?php
$s = get_field('social', 'options');
$insta = $s['instagram_url'] ?? null
?>
<section class="insta_panel py-5">
    <div class="container-xl py-5">
        <div class="row g-5">
            <div class="col-lg-6 my-auto">
                <div class="insta_panel__inner d-flex gap-4" data-aos="fade">
                    <div><img src="<?= get_stylesheet_directory_uri() ?>/img/instagram.svg" alt="Instagram" width=100 height=100></div>
                    <div>
                        <h2>Instagram</h2>
                        <div class="mb-4"><?= get_field('intro') ?></div>
                        <a href="<?= $insta ?>" target="_blank" class="btn btn-secondary">Follow Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <?php
                    $d = 0;
                    foreach (get_field('images') as $i) {
                    ?>
                        <div class="col-md-4" data-aos="fade" data-aos-delay="<?=$d?>">
                            <?= wp_get_attachment_image($i, 'large', false, array('class' => 'insta_panel__image')) ?>
                        </div>
                    <?php
                    $d += 200;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>