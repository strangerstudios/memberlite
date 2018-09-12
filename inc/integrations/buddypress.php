<?php
/**
 * Integration for BuddyPress
 *
 * @package Memberlite
 */

// Enqueue additional stylesheets and javascript
function memberlite_buddypress_init_styles() {
	wp_enqueue_style( 'memberlite_buddypress', get_template_directory_uri() . '/css/bbp.css', array(), MEMBERLITE_VERSION );
}
add_action( 'wp_enqueue_scripts', 'memberlite_buddypress_init_styles' );
