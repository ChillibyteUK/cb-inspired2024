<?php
$classes = $block['className'] ?? null;
?>
<section class="child_nav <?=$classes?>">
    <div class="container-xl">
        <div class="child_nav__grid">
            <?php
    $children = new WP_Query(array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => get_the_ID(),
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
    ));
if ($children->have_posts()) {
    while ($children->have_posts()) {
        $children->the_post();
        global $post;

        $bg = null;
        $blocks = parse_blocks(get_the_content(null, false, get_the_ID()));
        foreach ($blocks as $b) {
            if ($b['blockName'] == 'acf/cb-short-hero') {
                $bg = wp_get_attachment_image_url($b['attrs']['data']['background'], 'large');
                break;
            }
            continue;
        }

        ?>
            <a class="child_nav__card"
                href="<?=get_the_permalink()?>"
                style="background-image:url(<?=$bg?>)">
                <div class="child_nav__title">
                    <div class="overlay--light"></div>
                    <?=get_the_title()?>
                </div>
            </a>
            <?php
    }
}
wp_reset_postdata();
?>
        </div>
    </div>
</section>