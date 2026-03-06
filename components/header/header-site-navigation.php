<?php
/**
 * Site Navigation for the Header
 * Version: 7.0
 *
 * @version 7.0
 *
 * @package Memberlite
 */

do_action( 'memberlite_before_site_navigation' );

if ( has_nav_menu( 'primary' ) ) {
	$sticky_nav = get_theme_mod( 'sticky_nav' );
	if ( $sticky_nav == true ) { ?><div class="site-navigation-sticky-wrapper"><?php } ?>
	<nav id="site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'memberlite' ); ?>">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			$primary_defaults = array(
				'theme_location' => 'primary',
				'container'      => false,
				'fallback_cb'    => false,
				'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
				'menu_class'     => 'menu',
				'walker'         => new Memberlite_Aria_Walker_Nav_Menu(),
			);
			wp_nav_menu( $primary_defaults );
		}
		?>
	</nav><!-- #site-navigation -->
	<?php if ( $sticky_nav == true ) { ?>
		</div> <!-- .site-navigation-sticky-wrapper -->
	<?php }
}
