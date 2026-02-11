<?php
/**
 * Check if Memberlite has been updated and if any scripts need to be run.
 *
 * After running an update, sets memberlite_db_version to the version of the last update run.
 * Update versions are based on the date they were released. YYYYMMDD01, YYYYMMDD02.
 * Hopefully we don't release more than 99 updates in any given day.
 *
 * @package Memberlite
 * @since 4.0
 */

// Ensure files are loaded for color migration functions.
require_once get_template_directory() . '/inc/colors.php';
require_once get_template_directory() . '/inc/defaults.php';
require_once get_template_directory() . '/inc/deprecated.php';

/**
 * Check for updates and run migration scripts.
 *
 * @since 4.0
 */
function memberlite_checkForUpdates() {
	$memberlite_db_version = get_option( 'memberlite_db_version', 0 );

	// Default DB version for Memberlite 4.0
	if ( empty( $memberlite_db_version ) ) {
		$memberlite_db_version = '2018080101';
		update_option( 'memberlite_db_version', $memberlite_db_version, 'no' );
	}

	// Migrate the theme_mod for webfonts to single properties.
	if ( $memberlite_db_version < '2025032601' ) {
		$memberlite_webfonts = get_theme_mod( 'memberlite_webfonts' );
		if ( ! empty( $memberlite_webfonts ) ) {
			$fonts_string_parts     = explode( '_', $memberlite_webfonts );
			$memberlite_header_font = $fonts_string_parts[0];
			$memberlite_body_font   = $fonts_string_parts[1];
			set_theme_mod( 'memberlite_header_font', $memberlite_header_font );
			set_theme_mod( 'memberlite_body_font', $memberlite_body_font );
			remove_theme_mod( 'memberlite_webfonts' );
		}
		update_option( 'memberlite_db_version', '2025032601', 'no' );
	}

	// Migrate color scheme to individual theme_mods.
	// Remove the old memberlite_darkcss theme_mod which is no longer used.
	if ( $memberlite_db_version < '2026021001' ) {
		memberlite_migrate_colors_to_theme_mods();
		remove_theme_mod( 'memberlite_darkcss' );
		update_option( 'memberlite_db_version', '2026021001', 'no' );
	}

	// Set post meta for the deprecated blank page template
	if ( $memberlite_db_version < '2026021101' ) {
		memberlite_migrate_colors_to_theme_mods();
		memberlite_set_blank_template_fallback();

		update_option( 'memberlite_db_version', '2026021101', 'no' );
	}
}

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
 * Setup themes api filters
 *
 * @since 6.0
 */
function memberlite_setup_update_info() {
	// Only run this code if Update Manager isn't installed and above version 0.1
	if ( defined( 'PMPROUM_VERSION' ) && version_compare( PMPROUM_VERSION, '0.1', '>' ) ) {
		return;
	}

	if ( ! defined( 'PMPRO_LICENSE_SERVER' ) ) {
		define( 'PMPRO_LICENSE_SERVER', 'https://license.paidmembershipspro.com/v2/' );
	}

	add_filter( 'pre_set_site_transient_update_themes', 'memberlite_update_themes_filter' );
	add_filter( 'http_request_args', 'memberlite_http_request_args_for_update_info', 10, 2 );
	add_action( 'update_option_pmpro_license_key', 'memberlite_update_option_pmpro_license_key', 10, 2 );
}
add_action( 'admin_init', 'memberlite_setup_update_info' );

/**
 * Get theme update information from the PMPro server.
 *
 * @since  6.0
 */
function memberlite_get_update_info() {
	// Check if forcing a pull from the server.
	$update_info = get_option( 'memberlite_update_info', false );
	$update_info_timestamp = get_option( 'memberlite_update_info_timestamp', 0 );

	// Query the server if we do not have the local $update_info or we force checking for an update.
	if ( empty( $update_info ) || ! empty( $_REQUEST['force-check'] ) || current_time('timestamp') > $update_info_timestamp + 86400 ) {
		/**
		 * Filter to change the timeout for this wp_remote_get() request for updates.
		 * @since 6.0
		 *
		 * @param int $timeout The number of seconds before the request times out
		 */
		$timeout = apply_filters( 'memberlite_get_update_info_timeout', 5 );
		$remote_info = wp_remote_get( PMPRO_LICENSE_SERVER . 'themes/', $timeout );

		// Test response.
		if ( is_wp_error( $remote_info ) || empty( $remote_info['response'] ) || $remote_info['response']['code'] != '200' ) {
			// Error.
			return new WP_Error( 'connection_error', 'Could not connect to the PMPro License Server to get update information. Try again later.' );
		} else {
			// Update update_infos in cache.
			$update_info = json_decode( wp_remote_retrieve_body($remote_info), true );
			delete_option( 'memberlite_update_info' );
			add_option( 'memberlite_update_info', $update_info, NULL, 'no' );
		}

		// Save timestamp of last update
		delete_option( 'memberlite_update_info_timestamp' );
		add_option( 'memberlite_update_info_timestamp', current_time('timestamp'), NULL, 'no' );
	}

	return $update_info;
}

/**
 * Infuse theme update details when WordPress runs its update checker.
 * @since 6.0
 *
 * @param object $value  The WordPress update object.
 * @return object $value Amended WordPress update object on success, default if object is empty.
 */
function memberlite_update_themes_filter( $value ) {

	// If no update object exists, return early.
	if ( empty( $value ) ) {
		return $value;
	}

	// Get the update JSON for Stranger Studios themes
	$update_info = memberlite_get_update_info();
	// No info found, let's bail.
	if ( empty( $update_info ) ) {
		return $value;
	}

	// Find the memberlite theme data in the update info array.
	$find_theme = array_search( 'memberlite', array_column( $update_info, 'Slug' ) );

	// If the theme update data is found, adjust $update_info to be specifically for memberlite.
	if ( $find_theme !== false ) {
		$update_info = $update_info[$find_theme];
	} else {
		return $value;
	}

	//get data for memberlite. This will always return data.
	$theme_data = wp_get_theme( $update_info['Slug'] );

	//compare versions
	if ( ! empty( $update_info['License'] ) && version_compare( $theme_data['Version'], $update_info['Version'], '<' ) ){
		$value->response[$update_info['Slug']] = array(
			'theme' => $update_info['Slug'],
			'new_version' => $update_info['Version'],
			'url' => $update_info['ThemeURI'],
			'package' => $update_info['Download']
		);
	}

	// Return the update object.
	return $value;
}

/**
 * Disables SSL verification to prevent download package failures.
 *
 * @since 6.0
 *
 * @param array $args  Array of request args.
 * @param string $url  The URL to be pinged.
 * @return array $args Amended array of request args.
 */
function memberlite_http_request_args_for_update_info($args, $url)  {
	// If this is an SSL request and we are performing an upgrade routine, disable SSL verification.
	if ( strpos( $url, 'https://' ) !== false && strpos( $url, PMPRO_LICENSE_SERVER ) !== false && strpos( $url, "download") !== false ) {
		$args['sslverify'] = false;
	}

	return $args;
}

/**
 * Force update of theme update data when the PMPro License key is updated
 *
 * @since 2.0
 *
 * @param array $args  Array of request args.
 * @param string $url  The URL to be pinged.
 * @return array $args Amended array of request args.
 */
function memberlite_update_option_pmpro_license_key( $old_value, $value ) {
	delete_option( 'memberlite_update_info_timestamp' );
	delete_site_transient( 'update_themes' );
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
