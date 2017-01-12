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

/*
	NOTE: All code below here will be removed in Memberlite v3.1, once the theme is in the WordPress.org repository
*/

/**
 * Setup themes api filters
 *
 * @since 2.0
*/
function memberlite_setupUpdateInfo()
{
	add_filter('pre_set_site_transient_update_themes', 'memberlite_update_themes_filter');
	add_filter('http_request_args', 'memberlite_http_request_args_for_update_info', 10, 2);
	add_action('update_option_pmpro_license_key', 'memberlite_update_option_pmpro_license_key', 10, 2);
}
add_action('init', 'memberlite_setupUpdateInfo');
/**
 * Get theme update information from the PMPro server.
 *
 * @since  2.0
 */
function memberlite_getUpdateInfo()
{
	//check if forcing a pull from the server
	$update_info = get_option("memberlite_update_info", false);
	$update_info_timestamp = get_option("memberlite_update_info_timestamp", 0);
	
	//if no update_infos locally, we need to hit the server
	if(empty($update_info) || !empty($_REQUEST['force-check']) || current_time('timestamp') > $update_info_timestamp+86400)
	{
		/**
         * Filter to change the timeout for this wp_remote_get() request.
         *
         * @since 2.0.1
         *
         * @param int $timeout The number of seconds before the request times out
         */
        $timeout = apply_filters("memberlite_get_update_info_timeout", 5);
		//get em
		$remote_info = wp_remote_get(PMPRO_LICENSE_SERVER . "/themes/memberlite", $timeout);
		
		//test response		
        if(is_wp_error($remote_info) || empty($remote_info['response']) || $remote_info['response']['code'] != '200')
		{
			//error
			pmpro_setMessage("Could not connect to the PMPro License Server to get update information. Try again later.", "error");
		}
		else
		{
			//update update_infos in cache
			$update_info = json_decode(wp_remote_retrieve_body($remote_info), true);
			delete_option('memberlite_update_info');
			add_option("memberlite_update_info", $update_info, NULL, 'no');
		}
		
		//save timestamp of last update
		delete_option('memberlite_update_info_timestamp');
		add_option("memberlite_update_info_timestamp", current_time('timestamp'), NULL, 'no');		
	}		
	
	return $update_info;
}
/**
* Infuse theme update details when WordPress runs its update checker.
*
* @since 2.0
*
* @param object $value  The WordPress update object.
* @return object $value Amended WordPress update object on success, default if object is empty.
*/
function memberlite_update_themes_filter( $value ) {
	
	// If no update object exists, return early.
	if ( empty( $value ) ) {
		return $value;
	}
	
	// get update_info information
	$update_info = memberlite_getUpdateInfo();
	
	// no info?
	if(empty($update_info))
		return $value;
	
	//get data for theme
	$theme_file_abs = ABSPATH . 'wp-content/themes/' . $update_info['Slug'];
	$theme_file = $theme_file_abs . "/style.css";
	$theme_data = wp_get_theme($update_info['Slug']);
	//compare versions
	if(!empty($update_info['License']) && version_compare($theme_data['Version'], $update_info['Version'], '<'))
	{
		$value->response[$update_info['Slug']] = array(
			'theme' => $update_info['Slug'],
			'new_version' => $update_info['Version'],
			'url' => $update_info['ThemeURI'],
			'package' => $update_info['Download']
		);
		//get license key if one is available
		$key = get_option("pmpro_license_key", "");
		if(!empty($key) && function_exists('pmpro_license_isValid') && pmpro_license_isValid($key, "plus"))
			$value->response[$update_info['Slug']]['package'] = add_query_arg("key", $key, $value->response[$update_info['Slug']]['package']);
		else
		{
			global $memberlite_license_error;
			//only want to show this once
			if(empty($memberlite_license_error))
			{
				$memberlite_license_error = true;
				echo "<div class='error'><p>" . sprintf(__('A valid PMPro Plus license key is required to update Memberlite. <a href="%s">Please validate your PMPro Plus license key</a>.', 'memberlite'), admin_url('options-general.php?page=pmpro_license_settings')) . "</p></div>";
			}
		}
	}
	
	// Return the update object.
	return $value;
}
/**
 * Disables SSL verification to prevent download package failures.
 *
 * @since 2.0
 *
 * @param array $args  Array of request args.
 * @param string $url  The URL to be pinged.
 * @return array $args Amended array of request args.
 */
function memberlite_http_request_args_for_update_info($args, $url) 
{
	// If this is an SSL request and we are performing an upgrade routine, disable SSL verification.
	if(strpos($url, 'https://') !== false && strpos($url, PMPRO_LICENSE_SERVER) !== false && strpos($url, "download") !== false)
		$args['sslverify'] = false;
	
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
function memberlite_update_option_pmpro_license_key($old_value, $value) 
{	
	delete_option('memberlite_update_info_timestamp');
	delete_site_transient('update_themes');
}
