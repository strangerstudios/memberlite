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

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );
add_filter( 'woocommerce_show_page_title', '__return_false' );
add_filter ( 'woocommerce_product_thumbnails_columns', 'xx_thumb_cols' );
function xx_thumb_cols() {
	return 5; // .last class applied to every 4th thumbnail
}
function woo_related_products_limit() {
	global $product;
	$args['posts_per_page'] = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'memberlite_related_products_args' );
	function memberlite_related_products_args( $args ) {	
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 4; // arranged in 2 columns
	return $args;
}