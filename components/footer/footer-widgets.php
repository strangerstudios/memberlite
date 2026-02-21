<?php
/**
 * Displays the footer widgets content.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

if ( is_active_sidebar( 'sidebar-4' ) ) { ?>
	<div class="footer-widgets">
		<div class="row">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div><!-- .row -->
	</div><!-- .footer-widgets -->
	<?php
}
