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
		<?php
			if ( is_active_sidebar( 'sidebar-5' ) ) {
				dynamic_sidebar( 'sidebar-5' );
			} elseif ( has_nav_menu( 'primary' ) ) {
				$meta_login = get_theme_mod( 'meta_login', false );
				if ( ! empty( $meta_login ) ) {
					get_template_part( 'components/header/meta', 'member' );
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
