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
	?>
	<footer id="colophon" class="<?php echo esc_attr( $footer_class ); ?>" role="contentinfo">
		<?php get_template_part( 'components/footer/variation', $footer_variation ); ?>
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
