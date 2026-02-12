<?php
/**
 * Memberlite 7.0 Update Functions
 *
 * @package Memberlite
 * @since 7.0
 */

// Ensure files are loaded for color migration functions.
require_once get_template_directory() . '/inc/colors.php';
require_once get_template_directory() . '/inc/defaults.php';
require_once get_template_directory() . '/inc/deprecated.php';

/**
 * Migrate color scheme to individual theme_mods.
 *
 * This migration handles three scenarios:
 * 1. User has a legacy scheme selected (from deprecated.php) → expand all to theme_mods, set scheme to 'custom'
 * 2. User has a new scheme selected → expand all to theme_mods, keep scheme setting
 * 3. User has custom colors already → preserve them, set scheme to 'custom'
 *
 * After migration, the all individual color theme_mods are the single source of truth.
 *
 * @since TBD
 */
function memberlite_migrate_colors_to_theme_mods() {
	$color_keys = memberlite_get_color_setting_keys();

	// Check for old scheme theme_mods.
	$current_scheme = get_theme_mod( 'memberlite_color_scheme', '' );

	$colors       = array();
	$final_scheme = 'default';

	// Try to get colors from a scheme
	if ( ! empty( $current_scheme ) && 'custom' !== $current_scheme ) {
		// First check if it's a modern scheme
		$modern_schemes = memberlite_get_color_schemes();

		if ( isset( $modern_schemes[ $current_scheme ] ) ) {
			$colors       = $modern_schemes[ $current_scheme ]['colors'];
			$final_scheme = $current_scheme;
		} else {
			// Check if it's a legacy scheme
			$legacy_definitions = memberlite_get_legacy_color_scheme_definitions();

			if ( isset( $legacy_definitions[ $current_scheme ] ) ) {
				$colors       = $legacy_definitions[ $current_scheme ]['colors'];
				$final_scheme = 'custom'; // Legacy schemes become custom
			}
		}
	}

	// If no scheme colors found, use default
	if ( empty( $colors ) ) {
		$default_colors = memberlite_get_default_colors();
		$colors         = $default_colors;
		$final_scheme   = 'default';
	}

	// Check if user has any custom color overrides
	$has_custom_colors = false;
	foreach ( $color_keys as $key ) {
		$existing = get_theme_mod( $key, '' );
		if ( ! empty( $existing ) ) {
			$has_custom_colors = true;
			break;
		}
	}

	// Save all colors as individual theme_mods
	foreach ( $color_keys as $key ) {
		$existing_value = get_theme_mod( $key, '' );

		// If user already has a custom value for this color, preserve it
		if ( ! empty( $existing_value ) ) {
			// Remove hash if present in custom value and lowercase the color
			$existing_trimmed_color = ltrim( $existing_value, '#' );
			$existing_trimmed_color = strtolower( $existing_trimmed_color );
			set_theme_mod( $key, $existing_trimmed_color );
		}

		// Otherwise, save the scheme's color value.
		if ( isset( $colors[ $key ] ) ) {
			$trimmed_color = ltrim( $colors[ $key ], '#' );
			$trimmed_color = strtolower( $trimmed_color );
			set_theme_mod( $key, $trimmed_color );
		}
	}

	// Set the scheme - if they had custom colors, mark as custom
	if ( $has_custom_colors ) {
		$final_scheme = 'custom';
	}

	set_theme_mod( 'memberlite_color_scheme', $final_scheme );

}

/**
 * Remove the old memberlite_darkcss theme_mod which is no longer used.
 *
 * @since TBD
 *
 * @return void
 */
function memberlite_remove_darkcss_theme_mod(){
	remove_theme_mod( 'memberlite_darkcss' );
}

/**
 * Deprecate the blank page template.
 * Find any pages with this template and update post_meta for our new header/footer settings.
 *
 * @since TBD
 *
 * @return void
 */
function memberlite_set_blank_template_fallback(){
	//Find any published pages that had the blank template set
	global $wpdb;

	$page_ids = $wpdb->get_col( $wpdb->prepare(
		"SELECT p.ID 
		FROM {$wpdb->posts} p
		INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
		WHERE p.post_type = 'page'
		AND p.post_status = 'publish'
		AND pm.meta_key = '_wp_page_template'
		AND pm.meta_value = %s",
		'templates/blank.php'
	) );

	// Return early if no results
	if ( empty( $page_ids ) ) {
		return;
	}

	// Set the page meta to hide the header and footer
	foreach( $page_ids as $page_id ) {
		update_post_meta( $page_id, '_memberlite_hide_header', true );
		update_post_meta( $page_id, '_memberlite_hide_footer', true );
	}
}

// Run updates for Memberlite 7.0
memberlite_migrate_colors_to_theme_mods();
memberlite_remove_darkcss_theme_mod();
memberlite_set_blank_template_fallback();
