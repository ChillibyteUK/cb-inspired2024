<?php
$class = $block['className'] ?? null;
?>
<section class="hero hero--short">
    <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = 'active';
            foreach (get_field('slides') as $s) {
                $img = wp_get_attachment_image_url($s, 'full');
            ?>
                <div class="carousel-item <?= $active ?>">
                    <img src="<?= $img ?>" class="d-block w-100">
                </div>
            <?php
                $active = '';
            }
            ?>
        </div>
        <?php
            $l = count(get_field('slides'));
            if ($l > 1) { 
            ?>
        <div class="carousel-indicators">
                <?php
                $active = 'active';
                for ($i = 0; $i < $l; $i++) {
                    ?>
                <button type="button" data-bs-target="#carousel"
                    data-bs-slide-to="<?= $i ?>"
                    class="<?= $active ?>" aria-current="true"
                    aria-label="Slide <?= $i ?>"></button>
                    <?php
                    $active = '';
                }
                ?>
        </div>
                <?php
            }
            ?>
    </div>
    <div class="hero__inner">
        <div class="container-xl my-auto">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <?= get_field('title') ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>