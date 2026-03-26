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
	//Legacy Footer, we just want default footer
	$footer_variation = sanitize_key( memberlite_get_variation( 'footer' ) );
	$footer_class = 'site-footer site-footer-' . $footer_variation;
	
	//New Footer Pattern Method
	$footer_post_name = memberlite_get_current_footer_post_name();
	$footer_class     = 'site-footer';
	if ( $footer_post_name && '0' !== $footer_post_name ) {
		$footer_class .= ' site-footer-' . sanitize_html_class( $footer_post_name );
	}
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
