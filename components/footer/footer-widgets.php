<?php
/**
 * Displays the footer widgets content
 *
 * @package Memberlite
 */
?>

<?php do_action( 'before_footer_widgets' ); ?>

<?php if( is_active_sidebar( 'sidebar-4' )) { ?>
	<div class="footer-widgets">
		<div class="row">
			<?php dynamic_sidebar( 'sidebar-4' );	?>
		</div><!-- .row -->
	</div><!-- .footer-widgets -->
<?php } ?>

<?php do_action( 'after_footer_widgets' ); ?>
