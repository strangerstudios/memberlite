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
	//New Footer Pattern Method
	$footer_post_name        = memberlite_get_current_footer_post_name();
	$footer_class            = 'site-footer';
	$footer_post_name_exists = ! empty( $footer_post_name ) && '0' !== $footer_post_name;

	if ( $footer_post_name_exists ) {
		$footer_class .= ' site-footer-' . sanitize_html_class( $footer_post_name );
	} else {
		$footer_class .= ' site-footer-default'; //legacy footer
	}
	?>
	<footer id="colophon" class="<?php echo esc_attr( $footer_class ); ?>" role="contentinfo">
		<?php
		if ( $footer_post_name_exists ) {
			memberlite_render_footer_variation( $footer_post_name );
		} else {
			get_template_part( 'components/footer/variation', 'default' ); //legacy footer
		}
		?>
	</footer><!-- #colophon -->
	<?php memberlite_the_footer_edit_link( $footer_post_name ); ?>
	<?php
}
?>

<?php do_action( 'memberlite_after_footer' ); ?>

</div><!-- #page -->

<?php do_action( 'memberlite_after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
