<?php
/**
 * Displays the footer widgets content.
 * Version: 7.0
 *
 * @version 7.0
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
