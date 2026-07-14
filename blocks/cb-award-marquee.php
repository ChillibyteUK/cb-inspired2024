<?php
/**
 * Block template for CB Award Marquee.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$block      = isset( $block ) && is_array( $block ) ? $block : array();
$images     = get_field( 'awards' );
$extra      = $block['className'] ?? 'py-5';
$block_id   = 'cb-award-marquee-' . ( $block['id'] ?? uniqid() );
$section_id = $block['anchor'] ?? $block_id;

if ( empty( $images ) || ! is_array( $images ) ) {
    return;
}

?>
<section class="cb-award-marquee <?= esc_attr( $extra ); ?>" id="<?= esc_attr( $section_id ); ?>">
    <div class="cb-award-marquee__viewport">
        <div class="cb-award-marquee__track">
            <div class="cb-award-marquee__set">
                <?php
                foreach ( $images as $image_id ) {
                    ?>
                    <div class="cb-award-marquee__item">
                        <?= wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'cb-award-marquee__image' ) ); ?>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="cb-award-marquee__set" aria-hidden="true">
                <?php
                foreach ( $images as $image_id ) {
                    ?>
                    <div class="cb-award-marquee__item">
                        <?= wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'cb-award-marquee__image' ) ); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
add_action(
    'wp_footer',
    function () use ( $section_id ) {
        global $cb_award_marquee_gsap_loaded;
        ?>
        <?php if ( empty( $cb_award_marquee_gsap_loaded ) ) : ?>
            <script src="<?= esc_url( get_stylesheet_directory_uri() . '/js/gsap/gsap.min.js' ); ?>"></script>
            <?php $cb_award_marquee_gsap_loaded = true; ?>
        <?php endif; ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var section = document.getElementById(<?= wp_json_encode( $section_id ); ?>);

                if (!section || typeof window.gsap === 'undefined' || section.dataset.marqueeReady === '1') {
                    return;
                }

                var viewport = section.querySelector('.cb-award-marquee__viewport');
                var track = section.querySelector('.cb-award-marquee__track');
                var set = section.querySelector('.cb-award-marquee__set');
                var images = section.querySelectorAll('.cb-award-marquee__image');

                if (!viewport || !track || !set) {
                    return;
                }

                section.dataset.marqueeReady = '1';

                var tween;

                var removeDynamicSets = function() {
                    track.querySelectorAll('[data-marquee-clone="1"]').forEach(function(clone) {
                        clone.remove();
                    });
                };

                var ensureCoverage = function(distance) {
                    var copiesNeeded = Math.ceil(viewport.offsetWidth / distance) + 1;
                    var currentCopies = track.querySelectorAll('.cb-award-marquee__set').length;

                    while (currentCopies < copiesNeeded) {
                        var clone = set.cloneNode(true);

                        clone.setAttribute('aria-hidden', 'true');
                        clone.dataset.marqueeClone = '1';
                        track.appendChild(clone);
                        currentCopies += 1;
                    }
                };

                var buildMarquee = function() {
                    var distance = set.offsetWidth;

                    if (!distance) {
                        return;
                    }

                    if (tween) {
                        tween.kill();
                    }

                    removeDynamicSets();
                    ensureCoverage(distance);

                    gsap.set(track, { x: 0 });
                    tween = gsap.to(track, {
                        x: -distance,
                        duration: Math.max(distance / 90, 18),
                        ease: 'none',
                        force3D: true,
                        repeat: -1
                    });
                };

                buildMarquee();
                window.addEventListener('load', buildMarquee);
                window.addEventListener('resize', buildMarquee);
                images.forEach(function(image) {
                    if (!image.complete) {
                        image.addEventListener('load', buildMarquee, { once: true });
                    }
                });
            });
        </script>
        <?php
    }
);
