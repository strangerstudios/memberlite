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
 * @since 7.0
 * @return void
 */
function memberlite_migrate_colors_to_theme_mods(): void {
	$color_keys = memberlite_get_color_setting_keys();
	$current_scheme = get_theme_mod( 'memberlite_color_scheme', '' );
	$scheme_colors  = array();
	$final_scheme   = 'default';
	if ( ! empty( $current_scheme ) && 'custom' !== $current_scheme ) {
		$modern_schemes = memberlite_get_color_schemes();
		if ( isset( $modern_schemes[ $current_scheme ]['colors'] ) ) {
			$scheme_colors = $modern_schemes[ $current_scheme ]['colors'];
			$final_scheme  = $current_scheme;
		} else {
			$legacy_definitions = memberlite_get_legacy_color_scheme_definitions();
			if ( isset( $legacy_definitions[ $current_scheme ]['colors'] ) ) {
				$scheme_colors = $legacy_definitions[ $current_scheme ]['colors'];
				$final_scheme  = 'custom';
			}
		}
	}
	$resolved          = array();
	$has_custom_colors = false;
	foreach ( $color_keys as $key ) {
		$resolved[ $key ] = '';
		$existing = get_theme_mod( $key, '' );
		if ( ! empty( $existing ) ) {
			$sanitized = sanitize_hex_color_no_hash( '#' . ltrim( $existing, '#' ) );
			if ( ! empty( $sanitized ) ) {
				$has_custom_colors = true;
				$resolved[ $key ]  = $sanitized;
				continue;
			}
		}
		if ( isset( $scheme_colors[ $key ] ) ) {
			$resolved[ $key ] = sanitize_hex_color_no_hash( '#' . ltrim( $scheme_colors[ $key ], '#' ) );
		}
	}
	$primary = $resolved['color_primary'] ?? '';
	if ( empty( $resolved['bgcolor_page_masthead'] ) && ! empty( $primary ) ) {
		$resolved['bgcolor_page_masthead'] = $primary;
		$resolved['color_page_masthead']   = 'ffffff';
	}
	if ( empty( $resolved['bgcolor_footer_widgets'] ) && ! empty( $primary ) ) {
		$resolved['bgcolor_footer_widgets'] = $primary;
		$resolved['color_footer_widgets']   = 'ffffff';
	}
	$default_colors = memberlite_get_default_colors();
	foreach ( $color_keys as $key ) {
		if ( empty( $resolved[ $key ] ) && isset( $default_colors[ $key ] ) ) {
			$resolved[ $key ] = sanitize_hex_color_no_hash( '#' . ltrim( $default_colors[ $key ], '#' ) );
		}
	}
	foreach ( $color_keys as $key ) {
		if ( ! empty( $resolved[ $key ] ) ) {
			set_theme_mod( $key, $resolved[ $key ] );
		}
	}
	if ( $has_custom_colors ) {
		$final_scheme = 'custom';
	}
	set_theme_mod( 'memberlite_color_scheme', $final_scheme );
}

/**
 * Remove the old memberlite_darkcss theme_mod which is no longer used.
 *
 * @since 7.0
 * @return void
 */
function memberlite_remove_darkcss_theme_mod(): void {
	remove_theme_mod( 'memberlite_darkcss' );
}

/**
 * Update pages using the deprecated blank template to use fluid-width template and new template settings.
 *
 * @since 7.0
 * @return void
 */
function memberlite_deprecate_blank_page_template(): void {
	global $wpdb;

	// Find any published pages that had this template set
	$page_ids = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT p.ID
			FROM {$wpdb->posts} p
			INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
			WHERE p.post_type = 'page'
			AND p.post_status = 'publish'
			AND pm.meta_key = '_wp_page_template'
			AND pm.meta_value = %s",
			'templates/blank.php'
		)
	);

	// Return early if no results
	if ( empty( $page_ids ) ) {
		return;
	}

	// Update the pages.
	foreach ( $page_ids as $page_id ) {
		// Set post meta to hide header, footer, and page navigation.
		update_post_meta( $page_id, '_memberlite_hide_header', true );
		update_post_meta( $page_id, '_memberlite_hide_footer', true );
		update_post_meta( $page_id, '_memberlite_hide_page_nav', true );

		// Change template to templates/fluid-width.php.
		update_post_meta( $page_id, '_wp_page_template', 'templates/fluid-width.php' );
	}
}

/**
 * Update pages using the deprecated interstitial template to use full-width template and new template settings.
 *
 * @since 7.0
 * @return void
 */
function memberlite_deprecate_interstitial_page_template(): void {
	global $wpdb;

	// Find any published pages that had this template set
	$page_ids = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT p.ID
			FROM {$wpdb->posts} p
			INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
			WHERE p.post_type = 'page'
			AND p.post_status = 'publish'
			AND pm.meta_key = '_wp_page_template'
			AND pm.meta_value = %s",
			'templates/interstitial.php'
		)
	);

	// Return early if no results
	if ( empty( $page_ids ) ) {
		return;
	}

	// Update the pages.
	foreach ( $page_ids as $page_id ) {
		// Set post meta to hide header, footer, and page navigation.
		update_post_meta( $page_id, '_memberlite_hide_header', true );
		update_post_meta( $page_id, '_memberlite_hide_footer', true );
		update_post_meta( $page_id, '_memberlite_hide_page_nav', true );

		// Change template to templates/full-width.php.
		update_post_meta( $page_id, '_wp_page_template', 'templates/full-width.php' );
	}
}


/**
 * Update pages using the fluid width template to hide page nav via template settings.
 *
 * @since 7.0
 * @return void
 */
function memberlite_update_fluid_width_page_template_settings(): void {
	global $wpdb;

	// Find any published pages that had this template set
	$page_ids = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT p.ID
			FROM {$wpdb->posts} p
			INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
			WHERE p.post_type = 'page'
			AND p.post_status = 'publish'
			AND pm.meta_key = '_wp_page_template'
			AND pm.meta_value = %s",
			'templates/fluid-width.php'
		)
	);

	// Return early if no results
	if ( empty( $page_ids ) ) {
		return;
	}

	// Update the pages.
	foreach ( $page_ids as $page_id ) {
		// Set post meta to hide page navigation.
		update_post_meta( $page_id, '_memberlite_hide_page_nav', true );
	}
}

// Run updates for Memberlite 7.0
memberlite_migrate_colors_to_theme_mods();
memberlite_remove_darkcss_theme_mod();
memberlite_deprecate_blank_page_template();
memberlite_deprecate_interstitial_page_template();
memberlite_update_fluid_width_page_template_settings();
