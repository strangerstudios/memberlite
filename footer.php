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
				!is_404() && 
				( !is_front_page() || ( is_front_page() && !empty( $template ) && ( basename( $template ) != 'page.php' ) || 'posts' == get_option( 'show_on_front' ) ) )
			) { ?>
				</div><!-- .row -->
		<?php } ?>

		<?php do_action( 'after_content' ); ?>

	</div><!-- #content -->
	
	<?php do_action( 'before_footer' ); ?>

	<?php if( !is_page_template( 'templates/interstitial.php' ) ) { ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<?php get_template_part( 'components/footer/footer', 'widgets' ); ?>
		
		<?php if( has_nav_menu( 'footer' ) ) { ?>
			<nav id="footer-navigation">
				<?php 
					$footer_defaults = array(
						'theme_location' => 'footer',
						'container' => 'div',
						'container_class' => 'footer-navigation row',
						'menu_class' => 'menu large-12 columns',
						'fallback_cb' => false,					
					);				
					wp_nav_menu( $footer_defaults ); 				
				?>
			</nav><!-- #footer-navigation -->
		<?php } ?>

		<?php get_template_part( 'components/footer/site', 'info' ); ?>

	</footer><!-- #colophon -->
	<?php } ?>

	<?php do_action( 'after_footer' ); ?>

</div><!-- #page -->

<?php do_action( 'after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
