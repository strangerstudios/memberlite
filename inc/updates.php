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
	*/
	if($memberlite_db_version < '2016091901') {

		/**
		 * We need to convert header images into site logos.
		 */
		$header_image_data = get_theme_mod('header_image_data');
		$custom_logo = get_theme_mod('custom_logo');

		if(!empty($header_image_data) && empty($custom_logo)) {
			$custom_logo = $header_image_data->attachment_id;
			set_theme_mod('custom_logo', $custom_logo);
			remove_theme_mod('header_image');
			remove_theme_mod('header_image_data');
		}

		/**
		 * We need to convert 'memberlite_show_image_banner' meta to '_memberlite_show_image_banner'.
		 */
		global $wpdb;
		$sqlQuery = "UPDATE $wpdb->postmeta SET meta_key = '_memberlite_show_image_banner' WHERE meta_key = 'memberlite_show_image_banner'";
		$wpdb->query($sqlQuery);
		
		//update db version
		$memberlite_db_version = '2016091901';
		update_option('memberlite_db_version', $memberlite_db_version, 'no');
	}
}