<?php
/**
 * Block template for CB Full Width.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

$bgcolour = get_field('background') ?: 'white';
?>
<section class="full_width py-5 bg-<?= $bgcolour ?>">
    <div class="container-xl">
        <?= get_field('content') ?>
    </div>
</section>