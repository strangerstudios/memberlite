<?php
/**
 * Displays the meta member login content
 * Version: 7.0
 *
 * @version 7.0
 *
 * @package Memberlite
 */
?>
<?php do_action( 'memberlite_before_mobile_nav' ); ?>

<?php
// show the mobile menu widget area
if ( is_active_sidebar( 'sidebar-5' ) || has_nav_menu( 'primary' ) ) { ?>
	<div id="mobile-navigation" role="dialog" aria-label="Mobile menu" aria-modal="true" inert>
		<div class="mobile-navigation-bar">
			<button id="close-mobile-nav" class="menu-toggle">
				<i class="fa fa-times" aria-hidden="true"></i>
				<span class="screen-reader-text">
					<?php _e( 'Close mobile menu', 'memberlite' ); ?>
				</span>
			</button>
		</div>
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
	</div>
	<?php
}
?>

<?php do_action( 'memberlite_after_mobile_nav' ); ?>
