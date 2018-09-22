<?php
/**
 * Integration for Theme My Login
 *
 * @package Memberlite
 */

// Enqueue additional stylesheets and javascript
function memberlite_tml_init_styles() {
	wp_enqueue_style( 'memberlite_tml', get_template_directory_uri() . '/css/theme-my-login.css', array(), MEMBERLITE_VERSION );
}
add_action( 'wp_enqueue_scripts', 'memberlite_tml_init_styles' );
