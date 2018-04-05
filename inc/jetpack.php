<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Memberlite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function memberlite_jetpack_setup() {
	add_theme_support(
		'infinite-scroll', array(
			'container'      => 'main',
			'footer'         => 'page',
			'type'           => 'click',
			'footer_widgets' => array( 'sidebar-4' ),
		)
	);
}
add_action( 'after_setup_theme', 'memberlite_jetpack_setup' );
