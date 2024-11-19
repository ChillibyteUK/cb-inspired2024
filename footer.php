<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-5">
    <div class="footer__overlay"></div>
    <div class="container-xl pb-4">
        <div class="mb-4">
            <a href="<?= get_home_url() ?>">
                <img src="<?= get_stylesheet_directory_uri() ?>/img/ie-logo--wo.svg" alt="Inspired Earth Design" width="170" height="61" class="logo mb-4">
            </a>
        </div>
        <div class="row pb-4">
            <div class="col-sm-6 col-lg-3 mb-2">
                <div class="footer__title">About Us</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu1')); ?>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2">
                <div class="footer__title">Design Services</div>
                <?php wp_nav_menu(array('theme_location' => 'footer_menu2')); ?>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2">
                <div class="footer__title">Portfolio</div>
                <ul class="menu">
                    <?php
                    $q = new WP_Query(array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => -1
                    ));
                    while ($q->have_posts()) {
                        $q->the_post();
                    ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?= get_the_permalink(get_the_ID()) ?>"><?= get_the_title() ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2">
                <div class="footer__title">Contact Us</div>
                <ul>
                    <li><a
                            href="mailto:<?= get_field('contact_email', 'options') ?>"><?= get_field('contact_email', 'options') ?></a>
                    </li>
                    <li>Jude Yeo: <a
                            href="tel:<?= parse_phone(get_field('contact_judith', 'options')) ?>"><?= get_field('contact_judith', 'options') ?></a>
                    </li>
                    <li>Emily Grayshaw: <a
                            href="tel:<?= parse_phone(get_field('contact_emily', 'options')) ?>"><?= get_field('contact_emily', 'options') ?></a>
                    </li>
                </ul>
                <div class="footer__socials">
                    <?php
                    $s = get_field('social', 'options');
                    if ($s['instagram_url'] ?? null) {
                    ?>
                        <a href="<?= $s['instagram_url'] ?>"
                            target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <?php
                    }
                    if ($s['facebook_url'] ?? null) {
                    ?>
                        <a href="<?= $s['facebook_url'] ?>"
                            target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <?php
                    }
                    if ($s['linkedin_url'] ?? null) {
                    ?>
                        <a href="<?= $s['linkedin_url'] ?>"
                            target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <div class="colophon">
        <div class="container-xl">
            <div>&copy; <?= date('Y') ?> Inspired
                Earth Design Ltd. Registered in England, No. 13515175
            </div>
            <div class="colophon__links">
                <a href="/privacy/">Privacy Policy</a> |
                <a href="/cookies/">Cookie Preferences</a>
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb"
                    title="Digital Marketing by Chillibyte"></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=<?= get_field('gtm_property', 'options') ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php
}
?>
</body>

</html>