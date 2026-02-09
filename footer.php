<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Memberlite
 */
?>

		<?php if ( ! is_page_template( 'templates/fluid-width.php' )  && ! memberlite_hide_page_footer() && ! is_404() ) { ?>
			</div><!-- .row -->
		<?php } ?>

<?php do_action( 'memberlite_after_content' ); ?>

</div><!-- #content -->

<?php do_action( 'memberlite_before_footer' ); ?>

<?php if ( ! memberlite_hide_page_footer() ) {
    $footer_variation = get_theme_mod( 'memberlite_footer_variation' );
    $is_default       = empty( $footer_variation ) || 'default' === $footer_variation;
    $footer_class     = $is_default ? 'site-footer-default' : 'site-footer-' . $footer_variation;
    ?>
    <footer id="colophon" class="site-footer <?php echo esc_attr( $footer_class ); ?>" role="contentinfo">
        <?php
        $footer_variation = get_theme_mod( 'memberlite_footer_variation' );

		if ( $is_default ) {
			get_template_part( 'components/footer/footer', 'default' );
		} else {
			get_template_part( 'components/footer/footer', $footer_variation );
		} ?>
	</footer><!-- #colophon -->
<?php } // End if(). ?>

<?php do_action( 'memberlite_after_footer' ); ?>

</div><!-- #page -->


<?php do_action( 'memberlite_after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
