<?php
/**
 * Displays the meta member login content
 *
 * @package Memberlite
 */
?>
<?php do_action( 'memberlite_before_mobile_nav' ); ?>

<?php
if ( is_active_sidebar( 'sidebar-5' ) || has_nav_menu( 'primary' ) ) {
	// show the mobile menu widget area
	?>
	<nav id="mobile-navigation" role="navigation">
	<?php
	if ( is_active_sidebar( 'sidebar-5' ) ) {
		dynamic_sidebar( 'sidebar-5' );
	} elseif ( has_nav_menu( 'primary' ) ) {
		$mobile_defaults = array(
			'theme_location' => 'primary',
		);
		wp_nav_menu( $mobile_defaults );
	}
		?>
		</nav>
		<?php
}
?>

<?php do_action( 'memberlite_after_mobile_nav' ); ?>
