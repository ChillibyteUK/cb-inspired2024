<?php
$classes = $block['className'] ?? null;
?>
<section class="buttons <?=$classes?>">
    <div class="container-xl">
        <div class="d-flex justify-content-center gap-4">
            <?php
            while(have_rows('buttons')) {
                the_row();
                $link = get_sub_field('link');
                ?>
            <a href="<?=$link['url']?>" target="<?=$link['target']?>" class="btn btn-primary" aria-label="<?=basename($link['url'])?>"><?=$link['title']?></a>
                <?php
            }
            ?>
        </div>
    </div>
</section>