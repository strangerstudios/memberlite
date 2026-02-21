<?php
/**
 * Displays the footer navigation content.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

if ( has_nav_menu( 'footer' ) ) { ?>
	<nav id="footer-navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'footer',
				'container'       => '',
				'menu_class'      => 'menu',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav><!-- #footer-navigation -->
	<?php
}
