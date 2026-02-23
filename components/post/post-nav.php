<?php
/**
 * Template part for displaying the single post navigation.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

$theme_mod = get_theme_mod( 'memberlite_post_nav', 1 );
if ( ! empty( $theme_mod ) ) {
	memberlite_post_nav();
}
