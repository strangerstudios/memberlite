<?php
/**
 * Memberlite functionality for handling editor settings and deprecation
 *
 * @package Memberlite
 *
 * @since TBD
 */

/**
 * Register custom document setting to hide header/footer (alternate to the blank page template)
 * @note: See the memberlite_set_blank_template_fallback() function in inc/updates.php for more deprecation context
 *
 * @return void
 */
function memberlite_register_blank_template_post_meta() : void {
	register_post_meta( 'page', '_memberlite_hide_header', array(
		'show_in_rest' => true,
		'type'         => 'boolean',
		'single'       => true,
		'default'      => false,
		'label'        => __( 'Hide Header', 'memberlite' ),
		'auth_callback' => function() {
			return current_user_can( 'edit_posts' );
		}
	) );

	register_post_meta( 'page', '_memberlite_hide_footer', array(
		'show_in_rest' => true,
		'type'         => 'boolean',
		'single'       => true,
		'default'      => false,
		'label'        => __( 'Hide Footer', 'memberlite' ),
		'auth_callback' => function() {
			return current_user_can( 'edit_posts' );
		}
	) );
}
add_action( 'init', 'memberlite_register_blank_template_post_meta' );

/**
 * Enqueue JS for custom document settings in the editor
 *
 * @return void
 */
function memberlite_enqueue_custom_editor_assets() : void {
	$asset_file = include get_template_directory() . '/build/editor/custom-settings.asset.php';

	wp_enqueue_script(
		'memberlite-custom-settings',
		get_template_directory_uri() . '/build/editor/custom-settings.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_custom_editor_assets' );

/**
 * Hide header on pages
 *
 * @return bool
 */
function memberlite_hide_page_header() {
	if ( get_post_type() !== 'page') {
		return false;
	}

	return (bool) get_post_meta( get_the_ID(), '_memberlite_hide_header', true );
}
add_filter( 'memberlite_hide_page_header', 'memberlite_hide_page_header' );

/**
 * Hide footer on pages
 *
 * @return bool
 */
function memberlite_hide_page_footer() {
	if ( get_post_type() !== 'page') {
		return false;
	}

	return (bool) get_post_meta( get_the_ID(), '_memberlite_hide_footer', true );
}
add_filter( 'memberlite_hide_page_footer', 'memberlite_hide_page_footer' );
