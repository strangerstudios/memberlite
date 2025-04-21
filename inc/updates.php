<?php
/**
 * Check if Memberlite has been updated and if any scripts need to be run.
 *
 * After running an update, sets memberlite_db_version to the version of the last update run.
 * Update versions are based on the date they were released. YYYYMMDD01, YYYYMMDD02.
 * Hopefully we don't release more than 99 updates in any given day.
 */
function memberlite_checkForUpdates() {
	$memberlite_db_version = get_option('memberlite_db_version', 0);

	// default DB version for Memberlite 4.0
	if ( empty( $memberlite_db_version ) ) {
		$memberlite_db_version = '2018080101';
		update_option('memberlite_db_version', $memberlite_db_version, 'no');
	}

	// Migrate the theme_mod for webfonts to single properties.
	// Update the database version to 2025032601
	if ( $memberlite_db_version < '2025032601' ) {
		$memberlite_webfonts = get_theme_mod( 'memberlite_webfonts' );
		if ( ! empty( $memberlite_webfonts ) ) {
			// Break the theme mod for custom fonts into two parts.
			$fonts_string_parts = explode( '_', $memberlite_webfonts );
			$memberlite_header_font = $fonts_string_parts[0];
			$memberlite_body_font = $fonts_string_parts[1];
			set_theme_mod( 'memberlite_header_font', $memberlite_header_font );
			set_theme_mod( 'memberlite_body_font', $memberlite_body_font );
			remove_theme_mod( 'memberlite_webfonts' );
		}
		update_option( 'memberlite_db_version', '2025032601', 'no' );
	}
}

/**
 * Setup themes api filters
 * @since TBD
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
 * @since  TBD
 */
function memberlite_get_update_info() {
	// Check if forcing a pull from the server.
	$update_info = get_option( 'memberlite_update_info', false );
	$update_info_timestamp = get_option( 'memberlite_update_info_timestamp', 0 );

	// Query the server if we do not have the local $update_info or we force checking for an update.
	if ( empty( $update_info ) || ! empty( $_REQUEST['force-check'] ) || current_time('timestamp') > $update_info_timestamp + 86400 ) {
		/**
         * Filter to change the timeout for this wp_remote_get() request for updates.
         * @since TBD
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
* @since TBD
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
 * @since TBD
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
