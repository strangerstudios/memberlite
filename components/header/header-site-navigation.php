<?php
/**
 * Site Navigation for the Header
 */

do_action( 'memberlite_before_site_navigation' );

if ( ! is_page_template( 'templates/interstitial.php' ) && has_nav_menu( 'primary' ) ) {
$sticky_nav = get_theme_mod( 'sticky_nav' );
if ( $sticky_nav == true ) { ?>
	<div class="site-navigation-sticky-wrapper">
		<?php }
		?>
		<nav id="site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'memberlite' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				$primary_defaults = array(
					'theme_location'  => 'primary',
					'container'       => false,
					'fallback_cb'     => false,
					'items_wrap'      => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
					'menu_class'      => 'menu',
					'walker'          => new Memberlite_Aria_Walker_Nav_Menu(),
				);
				wp_nav_menu( $primary_defaults );
			}
			?>
		</nav><!-- #site-navigation -->
		<?php
		if ( $sticky_nav == true ) { ?>
	</div> <!-- .site-navigation-sticky-wrapper -->
	<script>
		jQuery(document).ready(function ($) {
			var s = $("#site-navigation");
			var pos = s.position();
			$(window).scroll(function() {
				var windowpos = $(window).scrollTop();
				if ( windowpos >= pos.top ) {
					s.addClass("site-navigation-sticky");
				} else {
					s.removeClass("site-navigation-sticky");
				}
			});
		});
	</script>
<?php }
}
