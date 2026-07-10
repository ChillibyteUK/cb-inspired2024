<?php
/**
 * Block template for CB How Steps.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$title      = get_field( 'title' );
$steps      = get_field( 'steps' );
$section_id = $block['anchor'] ?? '';
$extra      = $block['className'] ?? 'py-5';

if ( empty( $steps ) || ! is_array( $steps ) ) {
    return;
}

?>
<section class="cb-how-steps has-bg--light <?= esc_attr( $extra ); ?>" id="<?= esc_attr( $section_id ); ?>">
    <div class="container">
        <?php
        if ( $title ) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h2 class="cb-how-steps__title"><?= esc_html( $title ); ?></h2>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="row g-4">
            <?php
            foreach ( array_slice( $steps, 0, 3 ) as $index => $step ) {
                ?>
                <div class="col-md-4">
                    <article class="cb-how-steps__step">
                        <div class="cb-how-steps__number"><?= esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></div>

                        <?php if ( ! empty( $step['step_title'] ) ) : ?>
                            <h3 class="cb-how-steps__step-title"><?= esc_html( $step['step_title'] ); ?></h3>
                        <?php endif; ?>

                        <?php if ( ! empty( $step['step_detail'] ) ) : ?>
                            <div class="cb-how-steps__detail"><?= wp_kses_post( wpautop( esc_html( $step['step_detail'] ) ) ); ?></div>
                        <?php endif; ?>
                    </article>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
