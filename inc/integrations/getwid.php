<?php
/**
 * Integration for Getwid
 */

// Enqueue additional stylesheets and javascript
function memberlite_getwid_styles() {
	wp_enqueue_style( 'memberlite-getwid', get_template_directory_uri() . '/css/getwid.css', array(), MEMBERLITE_VERSION );
}
add_action( 'wp_enqueue_scripts', 'memberlite_getwid_styles' );