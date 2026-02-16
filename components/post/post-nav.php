<?php
/**
 * Get Memberlite Single Post Navigation
 */

$theme_mod = get_theme_mod( 'memberlite_post_nav', 1 );
if ( ! empty( $theme_mod ) ) {
	memberlite_post_nav();
}
