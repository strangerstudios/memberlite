<?php
/**
 * Template part for displaying the single post navigation.
 * Version: 7.0
 *
 * @version 7.0
 *
 * @package Memberlite
 */

$theme_mod = get_theme_mod( 'memberlite_post_nav', 1 );
if ( ! empty( $theme_mod ) ) {
	memberlite_post_nav();
}
