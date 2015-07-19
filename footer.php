<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Member Lite 2.0
 */
?>
		<?php if(!is_front_page() && !is_page_template('templates/fluid-width.php') && !is_page_template( 'templates/interstitial.php' )) { ?></div><!-- .row --><?php } ?>
		<?php do_action('after_content'); ?>
	</div><!-- #content -->
	
	<?php do_action('before_footer'); ?>
	<?php if(!is_page_template( 'templates/interstitial.php' )) { ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php do_action('before_footer_widgets'); ?>
		<div class="footer-widgets">
 			<div class="row">
				<?php dynamic_sidebar('sidebar-4');	?>
			</div><!-- .row -->
		</div><!-- .footer-widgets -->
		<?php do_action('after_footer_widgets'); ?>
		<nav id="footer-navigation">
			<?php 
				$footer_defaults = array(
					'theme_location' => 'footer',
					'container' => 'div',
					'container_class' => 'footer-navigation row',
					'menu_class' => 'menu large-12 columns',
					'fallback_cb' => false,					
				);				
				wp_nav_menu($footer_defaults); 				
			?>
		</nav><!-- #footer-navigation -->
		<?php do_action('before_site_info'); ?>
		<div class="row site-info">
			<div class="large-12 columns">				
				<?php 
					global $memberlite_defaults;
					$copyright_textbox = get_theme_mod( 'copyright_textbox',$memberlite_defaults['copyright_textbox'] ); 
					if ( ! empty( $copyright_textbox ) ) 
					{
						echo wpautop($copyright_textbox); 
					}				
				?>
			</div><!-- .columns -->
		</div><!-- .row, .site-info -->
		<?php do_action('after_site_info'); ?>
	</footer><!-- #colophon -->
	<?php } ?>
	<?php do_action('after_footer'); ?>
</div><!-- #page -->
<?php do_action('after_page'); ?>
<?php wp_footer(); ?>
</body>
</html>
