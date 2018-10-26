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
	if( empty( $memberlite_db_version ) ) {
		$memberlite_db_version = '2018080101';
		update_option('memberlite_db_version', $memberlite_db_version, 'no');
	}
}