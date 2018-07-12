<?php
/**
 * Displays the footer widgets content
 *
 * @package Memberlite
 */
?>

<?php do_action( 'memberlite_before_site_info' ); ?>
		
<div class="row site-info">
	<?php
		global $memberlite_defaults;
		$back_to_top = get_theme_mod( 'memberlite_back_to_top', $memberlite_defaults['memberlite_back_to_top'] );
	?>
	<div class="large-
	<?php
	if ( ! empty( $back_to_top ) ) {
		echo '10';
	} else {
		echo '12'; }
?>
 columns">
	<?php
		global $memberlite_defaults;
		$copyright_textbox = get_theme_mod( 'copyright_textbox', $memberlite_defaults['copyright_textbox'] );
	if ( ! empty( $copyright_textbox ) ) {
		echo wpautop( memberlite_Customize::sanitize_text_with_links( $copyright_textbox ) );
	}
	?>
	</div>
	<?php if ( ! empty( $back_to_top ) ) { ?>
		<div class="large-2 columns text-right">
		<?php
			$back_to_top = apply_filters( 'memberlite_back_to_top', __( '<i class="fa fa-chevron-up"></i> Back to Top', 'memberlite' ) );
		if ( ! empty( $back_to_top ) ) {
			echo '<a class="skip-link btn" href="#page">' . esc_html( $back_to_top ) . '</a>';
		}
		?>
		</div><!-- .columns -->
	<?php } ?>
</div><!-- .row, .site-info -->

<?php do_action( 'memberlite_after_site_info' ); ?>
