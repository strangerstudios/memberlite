<?php
/**
 * Displays the footer widgets content
 *
 * @package Memberlite
 */

global $memberlite_defaults;
$copyright_textbox = get_theme_mod( 'copyright_textbox', $memberlite_defaults['copyright_textbox'] );
if ( ! empty( $copyright_textbox ) ) {
	echo '<p class="site-info-copyright-text">' . Memberlite_Customize::sanitize_text_with_links( $copyright_textbox ) . '</p>'; // WPCS: xss ok.
}
