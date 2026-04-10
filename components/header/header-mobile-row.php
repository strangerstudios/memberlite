<?php
/**
 * Mobile branding row for CPT-based header variations.
 *
 * Displays the site logo, site title, and mobile menu toggle button.
 * Hidden on tablet and above via CSS (.site-header-mobile-row).
 *
 * @package Memberlite
 */
?>
<div class="row site-header-mobile-row">
	<div class="site-branding columns">
		<?php memberlite_the_custom_logo(); ?>
		<div class="site-identity">
			<?php echo memberlite_output_site_title(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span class="site-description"><?php bloginfo( 'description' ); ?></span>
		</div>
	</div>
	<?php if ( is_active_sidebar( 'sidebar-5' ) || has_nav_menu( 'primary' ) ) { ?>
		<div class="mobile-navigation-bar">
			<button id="expand-mobile-nav" aria-haspopup="dialog" class="menu-toggle" aria-controls="mobile-navigation" aria-expanded="false">
				<i class="fa fa-bars" aria-hidden="true"></i>
				<span class="screen-reader-text">
					<?php esc_html_e( 'Open mobile menu', 'memberlite' ); ?>
				</span>
			</button>
		</div>
	<?php } ?>
</div>
