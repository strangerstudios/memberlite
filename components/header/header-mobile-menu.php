<?php
/**
 * Displays the meta member login content
 *
 * @package Memberlite
 */
?>
<?php do_action( 'memberlite_before_mobile_nav' ); ?>

<?php
	// show the mobile menu widget area
	if ( is_active_sidebar( 'sidebar-5' ) || has_nav_menu( 'primary' ) ) { ?>
		<nav id="mobile-navigation" role="navigation">
			<button id="close-mobile-nav" class="menu-toggle" aria-controls="mobile-navigation" aria-expanded="true">
				<i class="fa fa-times" aria-hidden="true"></i>
				<span class="screen-reader-text">
					<?php _e( 'Close mobile menu', 'memberlite' ); ?>
				</span>
			</button>
		<?php
			if ( is_active_sidebar( 'sidebar-5' ) ) {
				dynamic_sidebar( 'sidebar-5' );
			} elseif ( has_nav_menu( 'primary' ) ) {
				if ( ! empty( memberlite_is_meta_login_active() ) ) {
					get_template_part( 'components/header/header', 'member-info' );
				}
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
					)
				);
			}
		?>
		</nav>
		<?php
	}
?>

<?php do_action( 'memberlite_after_mobile_nav' ); ?>
