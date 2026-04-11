<?php
/**
 * Memberlite functionality for handling editor settings and deprecation
 *
 * @package Memberlite
 *
 * @since 7.0
 */

/**
 * Register custom document settings post meta
 *
 * @since 7.0
 * @return void
 */
function memberlite_register_editor_settings_post_meta(): void {
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

	register_post_meta( 'page', '_memberlite_footer_override', array(
		'show_in_rest'      => true,
		'type'              => 'string',
		'single'            => true,
		'default'           => '',
		'label'             => __( 'Select Footer', 'memberlite' ),
		'sanitize_callback' => 'sanitize_key',
		'auth_callback' => function() {
			return current_user_can( 'edit_posts' );
		}
	) );

	register_post_meta( 'page', '_memberlite_hide_page_nav', array(
		'show_in_rest' => true,
		'single'       => true,
		'type'         => 'boolean',
		'default'      => false,
		'auth_callback' => function() {
			return current_user_can( 'edit_posts' );
		}
	) );
}
add_action( 'init', 'memberlite_register_editor_settings_post_meta' );

/**
 * Enqueue JS for custom document settings in the editor
 *
 * @since 7.0
 * @return void
 */
function memberlite_enqueue_custom_editor_assets(): void {
	$asset_path = get_template_directory() . '/build/editor/custom-settings.asset.php';

	if ( ! file_exists( $asset_path ) ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			// Log in debug mode. See docs/build-process.md for more info on the build process.
			error_log( 'Memberlite: Missing asset file at ' . $asset_path );
		}

		return;
	}

	$asset_file = include $asset_path;

	wp_enqueue_script(
		'memberlite-custom-settings',
		get_template_directory_uri() . '/build/editor/custom-settings.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	// Build editor footer choices as an ordered array of {value, label} objects.
	$footer_variations_editor = array(
		array(
			'value' => '',
			'label' => __( '— No Override —', 'memberlite' ),
		),
	);
	foreach ( memberlite_get_footer_variations() as $slug => $title ) {
		$footer_variations_editor[] = array(
			'value' => (string) $slug,
			'label' => $title,
		);
	}

	// Get existing theme mods, and get footer variations to populate the footer override setting
	wp_localize_script(
		'memberlite-custom-settings',
		'memberliteEditorData',
		array(
			'showPrevNextSinglePages' => get_theme_mod( 'memberlite_page_nav', true ),
			'footerVariations'        => $footer_variations_editor,
			'manageFootersUrl'        => admin_url( 'edit.php?post_type=memberlite_footer' ),
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'memberlite_enqueue_custom_editor_assets' );

/**
 * Hide header on pages
 *
 * @since 7.0
 * @return bool
 */
function memberlite_hide_page_header() {
	if ( get_post_type() !== 'page' ) {
		return false;
	}

	return (bool) get_post_meta( get_the_ID(), '_memberlite_hide_header', true );
}

/**
 * Hide footer on pages
 *
 * @since 7.0
 * @return bool
 */
function memberlite_hide_page_footer() {
	if ( get_post_type() !== 'page' ) {
		return false;
	}

	return (bool) get_post_meta( get_the_ID(), '_memberlite_hide_footer', true );
}
