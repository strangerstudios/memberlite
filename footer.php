<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Memberlite
 */
?>
		<?php 
			$template = get_page_template();
			if( 
				!is_page_template('templates/fluid-width.php') && 
				!is_page_template( 'templates/interstitial.php' ) &&
				!is_404() && 
				(!is_front_page() || (is_front_page() && !empty($template) && (basename($template) != 'page.php') || 'posts' == get_option( 'show_on_front' )))
			) 
			{ 
				?>
				</div><!-- .row -->
				<?php 
			} 
		?>
		<?php
			global $post;
			if(!empty($post) && !empty($post->ID))
				$memberlite_banner_bottom = get_post_meta($post->ID, '_memberlite_banner_bottom', true);
			else
				$memberlite_banner_bottom = false;
			if(!empty($memberlite_banner_bottom))
			{
				?>
				<div id="banner_bottom">
					<div class="row"><div class="large-12 columns">
						<?php echo apply_filters('the_content',$memberlite_banner_bottom); ?>
					</div></div>
				</div>
				<?php
			}
		?>
		<?php do_action('after_content'); ?>
	</div><!-- #content -->
	
	<?php do_action('before_footer'); ?>
	<?php if(!is_page_template( 'templates/interstitial.php' )) { ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php do_action('before_footer_widgets'); ?>
		<?php if(is_active_sidebar('sidebar-4')) { ?>
		<div class="footer-widgets">
 			<div class="row">
				<?php dynamic_sidebar('sidebar-4');	?>
			</div><!-- .row -->
		</div><!-- .footer-widgets -->
		<?php } ?>
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
			<div class="large-10 columns">				
				<?php 
					global $memberlite_defaults;
					$copyright_textbox = get_theme_mod( 'copyright_textbox',$memberlite_defaults['copyright_textbox'] ); 
					if ( ! empty( $copyright_textbox ) ) 
					{
						echo wpautop(memberlite_Customize::sanitize_text_with_links($copyright_textbox));
					}				
				?>
			</div>
			<div class="large-2 columns text-right">
				<?php
					$back_to_top = get_theme_mod( 'memberlite_back_to_top',$memberlite_defaults['memberlite_back_to_top'] ) ;
					if( !empty($back_to_top) )
						$back_to_top = apply_filters('memberlite_back_to_top', __('<i class="fa fa-chevron-up"></i> Back to Top', 'memberlite') );					
					if( !empty($back_to_top) )
						echo '<a class="skip-link btn" href="#page">' . $back_to_top . '</a>';
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
