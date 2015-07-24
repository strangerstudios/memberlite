<?php
/**
 * Integration for WooCommerce
 *
 * @package Memberlite
 */

//enqueue additional stylesheets and javascript
function memberlite_woocommerce_init_styles()
{	
	wp_enqueue_style('memberlite_woocommerce', get_template_directory_uri() . "/css/woocommerce.css", array(), MEMBERLITE_VERSION);
}
add_action("wp_enqueue_scripts", "memberlite_woocommerce_init_styles");	

function memberlite_woocommerce_setup() {
	// Declare WooCommerce theme support
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'memberlite_woocommerce_setup');

function memberlite_woocommerce_before_main_content() {
  echo '<div id="primary" class="large-12 columns content-area">';
  echo '<main id="main" class="site-main" role="main">';
}
function memberlite_woocommerce_after_main_content() {
  echo '</main></div>';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'memberlite_woocommerce_before_main_content', 10);
add_action('woocommerce_after_main_content', 'memberlite_woocommerce_after_main_content', 10);