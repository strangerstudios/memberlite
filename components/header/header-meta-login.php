<?php
/**
 * Checks if the header right column should be shown.
 */

$meta_login = get_theme_mod( 'meta_login', false );

if ( ! is_page_template( 'templates/interstitial.php' ) && ( ! empty( $meta_login ) || has_nav_menu( 'meta' ) || is_active_sidebar( 'sidebar-3' ) ) ) {
	$show_header_right = true;
} else {
	$show_header_right = false;
}

var_dump($show_header_right);

/**
 * Filter to hide or show the right column area of the header.
 *
 * @param bool $show_header_right True to show the header right, false to hide it.
 *
 * @return bool $show_header_right
 */
$show_header_right = apply_filters( 'memberlite_show_header_right', $show_header_right );
