<?php
/**
 * Block template for CB Contact.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$bg = get_field( 'colour' ) ? 'bg-' . get_field( 'colour' ) : null;
?>
<section
    class="py-5 bg-grey-200 contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <h1 class="h1">Are you thinking about a garden design project?</h1>
                <?= get_field( 'content' ); ?>
            </div>
            <div class="col-lg-6 my-auto" data-aos="fade">
                <?= do_shortcode( '[gravityform id="1" title="false"]' ); ?>
            </div>
            <div class="col-lg-2 my-auto"></div>
            <div class="col-lg-4 my-auto align-content-center" data-aos="fade">
                <div class="ps-xl-3 py-5 my-auto">
                    <ul class="fa-ul my-4">
                        <li><span class="fa-li"><i class="fa-regular fa-envelope"></i></span> Email <?= do_shortcode( '[contact_email]' ); ?></li>
                        <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> Jude <?= do_shortcode( '[phone_judith]' ); ?></li>
                        <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> Emily <?= do_shortcode( '[phone_emily]' ); ?></li>
                    </ul>
                    <b>Studio (by appointment only)</b><br>18 Lammas Road<br>Godalming<br>Surrey<br>GU7 1YL
                    <h2 class="h3 mt-4">Find us on Instagram</h2>
                    <?php
                    $social = get_field( 'social', 'options' );
                    $ss     = $social ? $social : array();
                    $insta  = $ss['instagram_url'] ?? null;
                    preg_match( '/instagram\.com\/([^\/]+)/', $insta, $matches );
                    $username = $matches[1] ?? null;
                    ?>
                    <ul class="fa-ul mb-4">
                        <li><span class="fa-li"><i class="fab fa-instagram"></i></span> <a href="<?= esc_url( $insta ); ?>" target="_blank">@<?= esc_html( $username ); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>