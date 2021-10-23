<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? esc_attr( hello_get_footer_layout_class() ) : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );

// customizer variables we created
$store_address = get_theme_mod('store_address');
$instagram_url = get_theme_mod('instagram_url');
$privacy_policy = get_theme_mod('privacy_policy_page');

?>
<footer id="site-footer" class="site-footer dynamic-footer <?php echo $footer_class; ?>" role="contentinfo">
	<div class="footer-inner">
		
<!-- start original code -->
		
		<div class="site-branding show-<?php echo hello_elementor_get_setting( 'hello_footer_logo_type' ); ?>">
			<?php if ( has_custom_logo() && ( 'title' !== hello_elementor_get_setting( 'hello_footer_logo_type' ) || $is_editor ) ) : ?>
				<div class="site-logo <?php echo hello_show_or_hide( 'hello_footer_logo_display' ); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;
			if ( $site_name && ( 'logo' !== hello_elementor_get_setting( 'hello_footer_logo_type' ) ) || $is_editor ) : ?>
				<h4 class="site-title <?php echo hello_show_or_hide( 'hello_footer_logo_display' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
						<?php echo esc_html( $site_name ); ?>
					</a>
				</h4>
			<?php endif; ?>
		</div>
		<?php if ( '' !== hello_elementor_get_setting( 'hello_footer_copyright_text' ) || $is_editor ) : ?>

<!-- end original code -->

			<div class="footer-center-info <?php echo hello_show_or_hide( 'hello_footer_copyright_display' ); ?>">
				<p><?php echo hello_elementor_get_setting( 'hello_footer_copyright_text' ); ?></p>
				
				
				
				
		
<!-- start custom updates -->
				
				<!-- open an if statement to check if the privacy policy has been set -->
				<?php if ( $privacy_policy ): ?> 
				<!-- set privacy policy link -->
					<span class="dash"> — </span><a href="<?php echo get_permalink($privacy_policy) ?>">Privacy Policy </a>
				<!-- end the if statement -->
				<?php endif; ?>
				
			</div>
		<?php endif; ?>
		
		
		
		<div class="footer-contact-information">
			<!-- open an if statement to check if the store address has been set  -->
			<?php if ( $store_address ) : ?>
			<!-- if set, show the store address -->
			<p class="store-address">
				<?php echo( $store_address ); ?>
			</p>
			<!-- open an else statement for when there is no store address set -->
			<?php else : ?>
			<!-- if no store address is set use a default message instead -->
			<p>We hope to see you soon!</p>
			<!-- end the if statement -->
			<?php endif; ?>
			
			
			
			<!-- open an if statement to check if the instagram url has been set  -->
			<?php if ( $instagram_url ) : ?>
			<!-- if set, show the instagram address -->
			<a href="<?php echo esc_url($instagram_url); ?>" class="footer-instagram-icon"><i class="fa fa-instagram"></i></a>
			<!-- end the if statement -->
			<?php endif; ?>
		</div>
		
		
		
<!-- end custom updates -->
	</div>
</footer>
