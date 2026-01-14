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

		<?php get_template_part( 'components/footer/footer', 'default' ); ?>	

	</footer><!-- #colophon -->
	<?php } // End if(). ?>

	<?php do_action( 'memberlite_after_footer' ); ?>

</div><!-- #page -->

<?php do_action( 'memberlite_after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
