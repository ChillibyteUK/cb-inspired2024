<?php
/**
 * The template for displaying the footer
 *
 * @package cb-inspired2024
 */

defined( 'ABSPATH' ) || exit;

?>
<div id="footer-top"></div>
<footer class="footer pt-5">
    <div class="footer__overlay"></div>
    <div class="container-xl pb-4">
        <div class="mb-4">
            <a href="<?= esc_html( get_home_url() ); ?>">
                <img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/ied_logo_white.svg' ); ?>" alt="Inspired Earth Design" width="730" height="320" class="logo mb-4">
            </a>
        </div>
        <div class="row pb-4">
            <div class="col-sm-6 col-lg-3 mb-2">
                <div class="footer__title">About Us</div>
                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu1' ) ); ?>
				<div class="footer__title mt-4">Design Services</div>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_menu2' ) ); ?>
            </div>
            <div class="col-sm-6 mb-2">
                <div class="footer__title">Portfolio</div>
                <ul class="menu cols-lg-2">
                    <?php
                    $q = new WP_Query(
						array(
							'post_type'      => 'portfolio',
							'posts_per_page' => -1,
                    	)
					);
                    while ( $q->have_posts() ) {
                        $q->the_post();
                    	?>
					<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?= esc_url( get_the_permalink( get_the_ID() ) ); ?>"><?= esc_html( get_the_title() ); ?></a></li>
                    	<?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 mb-2">
                <div class="footer__title">Contact Us</div>
				<?php
				$email     = antispambot( get_field( 'contact_email', 'options' ) );
				$jude      = get_field( 'contact_judith', 'options' );
				$jude_tel  = parse_phone( $jude );
				$emily     = get_field( 'contact_emily', 'options' );
				$emily_tel = parse_phone( $emily );
				?>
                <ul>
                    <li><a href="mailto:<?= esc_attr( $email ); ?>"><?= esc_html( $email ); ?></a></li>
                    <li>Jude Yeo: <a href="tel:<?= esc_attr( $jude_tel ); ?>"><?= esc_html( $jude ); ?></a> </li>
					<li>Emily Grayshaw: <a href="tel:<?= esc_attr( $emily_tel ); ?>"><?= esc_html( $emily ); ?></a></li>
                </ul>
                <div class="footer__socials">
                    <?php
                    $sc = get_field( 'social', 'options' );
                    if ( $sc['instagram_url'] ?? null ) {
                    	?>
                        <a href="<?= esc_url( $sc['instagram_url'] ); ?>"
                            target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    	<?php
                    }
                    if ( $sc['facebook_url'] ?? null ) {
                    	?>
                        <a href="<?= esc_url( $sc['facebook_url'] ); ?>"
                            target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    	<?php
                    }
                    if ( $sc['linkedin_url'] ?? null ) {
                    	?>
                        <a href="<?= esc_url( $sc['linkedin_url'] ); ?>"
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
            <div>&copy; <?= esc_html( gmdate( 'Y' ) ); ?> Inspired
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
<?php wp_footer(); ?>
</body>

</html>