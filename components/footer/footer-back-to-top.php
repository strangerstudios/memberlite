<?php
/**
 * Displays the footer back to top button.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

global $memberlite_defaults;
$back_to_top = get_theme_mod( 'memberlite_back_to_top', $memberlite_defaults['memberlite_back_to_top'] );

if ( ! empty( $back_to_top ) ) {
	$back_to_top_allowed_html = array(
		'i' => array(
			'class' => array(),
		),
	);
	$back_to_top = apply_filters( 'memberlite_back_to_top', '<i class="fa fa-chevron-up"></i> ' . esc_html__( 'Back to Top', 'memberlite' ) );
	if ( ! empty( $back_to_top ) ) {
		echo '<a class="skip-link btn" href="#page">' . wp_kses( $back_to_top, $back_to_top_allowed_html ) . '</a>';
	}
}
