<?php
/**
 * Block template for CB Video Hero.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$video_url = get_field( 'video' );
?>
<section class="video_hero">
    <video class="position-absolute top-50 start-50 translate-middle w-100 h-100 object-fit-cover" autoplay muted loop playsinline>
        <source src="<?= esc_url( $video_url ); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video_hero__inner">
        <div class="container">
            <div class="row">
                <div class="col-md-7 video_hero__content text-white p-5" data-aos="fade-up">
                    <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/ied_logo_white.svg' ); ?>" class="video_hero__logo" alt="Inspired Earth Design" width="250" height="110">
                    <h1 class="has-white-color mt-4 has-700-font-size"><?= esc_html( get_field( 'title' ) ); ?></h1>
                    <div class="has-500-font-size"><?= wp_kses_post( get_field( 'content' ) ); ?></div>
                    <div class="d-flex flex-wrap gap-3 my-4">
                        <a href="/portfolio/" class="btn btn-white">Portfolio</a>
                        <a href="/contact-us/" class="btn btn-white">Enquire</a>
                    </div>
                    <div class="video_hero__images">
                        <?php
                        $images = get_field( 'logos' );
                        if ( $images ) {
                            foreach ( $images as $image ) {
                                echo wp_get_attachment_image( $image, 'large', false, array( 'class' => 'video_hero__image' ) );
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>