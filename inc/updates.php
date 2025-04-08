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
