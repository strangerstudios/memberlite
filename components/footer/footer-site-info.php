<?php
/**
 * Displays the Copyright Text in the footer site info area.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

global $memberlite_defaults;
$copyright_textbox = get_theme_mod( 'copyright_textbox', $memberlite_defaults['copyright_textbox'] );

if ( ! empty( $copyright_textbox ) ) {
	echo '<p>' . Memberlite_Customize::sanitize_text_with_links( $copyright_textbox ) . '</p>'; // WPCS: xss ok.
}
