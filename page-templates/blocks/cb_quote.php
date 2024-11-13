<?php
$bgcolour = get_field('background') ?: 'white';
?>
<section class="quote py-5 bg-<?=$bgcolour?>">
    <div class="container-xl" data-aos="zoom-in">
        <div class="quote__quote">
            &ldquo;<?=get_field('quote')?>&rdquo;
        </div>
        <div class="quote__attr">
            <?=get_field('attr')?>
        </div>
    </div>
</section>