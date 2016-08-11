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

	/**
	 * Upgrade from v2.0.
	 *
	 * We need to convert header images into site logos.
	 */
	if($memberlite_db_version < '2016081101') {
		//set site logo to be the same as the header image
		
		//remove the header image

		//update db version
		$memberlite_db_version = '2016081101';
		//update_option('memberlite_db_version', $memberlite_db_version, 'no');
	}
}