<?php
/**
 * "Stacked" template for the header
 */
?>

<div class="large-12 columns site-branding">
	<div class="site-identity">
		<?php memberlite_the_custom_logo(); ?>
		<?php echo memberlite_output_site_title(); ?>
	</div>
</div><!-- .site-branding -->

<?php
// show the mobile menu toggle button
if ( is_active_sidebar( 'sidebar-5' ) || has_nav_menu( 'primary' ) ) { ?>
	<div class="mobile-navigation-bar">
		<button class="menu-toggle">
			<i class="fa fa-bars"></i>
			<span class="screen-reader-text">
				<?php esc_html_e( 'Toggle Mobile Menu', 'memberlite' ); ?>
			</span>
		</button>
	</div>
<?php } ?>

<?php get_template_part( 'components/header/header', 'site-navigation' ); ?>

<?php get_template_part( 'components/header/header', 'mobile-menu' ); ?>

<?php $header_meta_menu_class = ! memberlite_is_meta_login_active() ? 'no-meta-menu' : ''; ?>

<div class="columns medium-<?php echo esc_attr( memberlite_getColumnsRatio( 'header-right' ) );
echo esc_attr( $header_meta_menu_class ) ?>">

	<?php
	// Get Login Form/Member Profile Info
	get_template_part( 'components/header/header', 'member-info' );

	// Replaces where we were previously using the "meta" menu and sidebar-3
	do_action( 'memberlite_after_member_info' );
	?>
</div><!-- .columns -->



