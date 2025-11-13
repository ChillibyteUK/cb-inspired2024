<?php
/**
 * Block template for CB Areas.
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="areas py-5">
	<div class="areas__content container-xl">
		<h2><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="areas__intro w-md-75 mx-auto mb-4"><?= esc_html( get_field( 'intro' ) ); ?></div>
		<div class="areas__areas">
			<?php
			// Display areas from areas taxonomy.
			cb_render_areas_we_cover_from_taxonomy();
			?>
		</div>
	</div>
</section>