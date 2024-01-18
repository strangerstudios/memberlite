<?php
/**
 * Integration for LifterLMS
 *
 * @package Memberlite
 */

// Enqueue additional stylesheets and javascript
function memberlite_lifterlms_init_styles() {
	wp_enqueue_style( 'memberlite_lifterlms', get_template_directory_uri() . '/css/lifterlms.css', array(), MEMBERLITE_VERSION );
}
add_action( 'wp_enqueue_scripts', 'memberlite_lifterlms_init_styles' );

/**
 * Display LifterLMS Course and Lesson sidebars
 * on courses and lessons in place of the sidebar returned by
 * this function
 * @param string $id default sidebar id (an empty string)
 * @return string
 */
function memberlite_llms_sidebar_function( $id ) {
 	$my_sidebar_id = 'sidebar-2';
	return $my_sidebar_id;
}
add_filter( 'llms_get_theme_default_sidebar', 'memberlite_llms_sidebar_function' );

// Declare LifterLMS theme support
function memberlite_lifterlms_setup() {
	add_theme_support( 'lifterlms-sidebars' );
}
add_action( 'after_setup_theme', 'memberlite_lifterlms_setup' );
