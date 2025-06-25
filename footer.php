<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Memberlite
 */
?>

		<?php if ( ! is_page_template( 'templates/fluid-width.php' )  && ! is_page_template( 'templates/blank.php' ) && ! is_404() ) { ?>
			</div><!-- .row -->
		<?php } ?>

		<?php do_action( 'memberlite_after_content' ); ?>

	</div><!-- #content -->

	<?php do_action( 'memberlite_before_footer' ); ?>

	<?php if ( ! is_page_template( 'templates/interstitial.php' ) && ! is_page_template( 'templates/blank.php' ) ) { ?>
	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php get_template_part( 'components/footer/footer', 'widgets' ); ?>

		<?php if ( has_nav_menu( 'footer' ) ) { ?>
			<nav id="footer-navigation" class="row">
				<?php
					$footer_defaults_container_class = 'footer-navigation large-12 columns';
					if ( ! is_active_sidebar( 'sidebar-4' ) ) {
						$footer_defaults_container_class .= ' footer-widgets-empty';
					}
					wp_nav_menu(
						array(
							'theme_location'  => 'footer',
							'container'       => 'div',
							'container_class' => $footer_defaults_container_class,
							'menu_class'      => 'menu',
							'fallback_cb'     => false,
						)
					);
				?>
			</nav><!-- #footer-navigation -->
		<?php } ?>

		<?php get_template_part( 'components/footer/site', 'info' ); ?>

	</footer><!-- #colophon -->
	<?php } // End if(). ?>

	<?php do_action( 'memberlite_after_footer' ); ?>

</div><!-- #page -->


<?php do_action( 'memberlite_after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
