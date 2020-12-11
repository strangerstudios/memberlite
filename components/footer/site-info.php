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
	<div class="medium-<?php
	if ( ! empty( $back_to_top ) ) {
		echo '10';
	} else {
		echo '12';
	} ?> small-12 columns">
	<?php
		global $memberlite_defaults;
		$copyright_textbox = get_theme_mod( 'copyright_textbox', $memberlite_defaults['copyright_textbox'] );
		if ( ! empty( $copyright_textbox ) ) {
			echo '<p>' . Memberlite_Customize::sanitize_text_with_links( $copyright_textbox ) . '</p>';
		}
	?>
	</div>
	<?php if ( ! empty( $back_to_top ) ) { ?>
		<div class="medium-2 small-12 columns">
		<?php
			$back_to_top_allowed_html = array(
				'i' => array(
					'class' => array(),
				),
			);
			$back_to_top = apply_filters( 'memberlite_back_to_top', '<i class="fa fa-chevron-up"></i> ' . esc_html__( 'Back to Top', 'memberlite' ) );
			if ( ! empty( $back_to_top ) ) {
				echo '<a class="skip-link btn btn_block" href="#page">' . wp_kses( $back_to_top, $back_to_top_allowed_html ) . '</a>';
			}
		?>
		</div><!-- .columns -->
	<?php } ?>
</div><!-- .row, .site-info -->

<?php do_action( 'memberlite_after_site_info' ); ?>
