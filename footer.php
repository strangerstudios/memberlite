<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Memberlite
 */
?>

<?php do_action( 'memberlite_after_content' ); ?>

</div><!-- #content -->

<?php do_action( 'memberlite_before_footer' ); ?>

<?php
if ( ! memberlite_hide_page_footer() ) {
	$footer_variation = sanitize_key( memberlite_get_variation( 'footer' ) );
	$footer_class = 'site-footer site-footer-' . $footer_variation;
	$cpt_footer    = memberlite_get_default_footer();
	?>
	<footer id="colophon" class="<?php echo esc_attr( $footer_class ); ?>" role="contentinfo">
		<?php if ( $cpt_footer ) : ?>
			<?php
			// Render the CPT footer's block content in a global post context so
			// block-related functions (e.g. has_blocks) behave correctly.
			$GLOBALS['post'] = $cpt_footer; // phpcs:ignore WordPress.WP.GlobalVariablesOverride
			setup_postdata( $cpt_footer );
			echo apply_filters( 'the_content', $cpt_footer->post_content ); // phpcs:ignore WordPress.Security.EscapeOutput
			wp_reset_postdata();
			?>
		<?php else : ?>
			<?php get_template_part( 'components/footer/variation', $footer_variation ); ?>
		<?php endif; ?>
	</footer><!-- #colophon -->
	<?php
}
?>

<?php do_action( 'memberlite_after_footer' ); ?>

</div><!-- #page -->

<?php do_action( 'memberlite_after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
