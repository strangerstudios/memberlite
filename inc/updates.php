<?php
/**
 * Setup themes api filters
 *
 * @since 2.0
*/
function memberlite_setupUpdateInfo()
{
	add_filter('themes_api', 'memberlite_themes_api', 10, 3);
	add_filter('pre_set_site_transient_update_themes', 'memberlite_update_themes_filter');
	add_filter('http_request_args', 'memberlite_http_request_args_for_update_info', 10, 2);
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
		//get em
		$remote_info = wp_remote_get(PMPRO_LICENSE_SERVER . "/themes/memberlite");
		
		//test response
		if(empty($remote_info['response']) || $remote_info['response']['code'] != '200')
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

	$theme_data = wp_get_theme('style.css', $theme_file_abs);

	//compare versions
	if(!empty($update_info['License']) && version_compare($theme_data['Version'], $update_info['Version'], '<'))
	{
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
 * Setup theme updaters
 *
 * @since  2.0
 */
function memberlite_themes_api($api, $action = '', $args = null)
{	
	//Not even looking for theme information? Or not given slug?
	if('theme_information' != $action || empty($args->slug))
		return $api;
	
	//looking for memberlite?
	if($args->slug !== 'memberlite')
		return $api;

	$update_info = memberlite_getUpdateInfo();
	
	//no addons?
	if(empty($update_info))
		return $api;
		
	// Create a new stdClass object and populate it with our plugin information.
	$api = pmpro_getThemeAPIObjectFromUpdateInfo($update_info);
	
	//get license key if one is available
	$key = get_option("pmpro_license_key", "");
	if(!empty($key) && !empty($api->download_link))
		$api->download_link = add_query_arg("key", $key, $api->download_link);
	
	return $api;
}

/**
 * Disables SSL verification to prevent download package failures.
 *
 * @since 1.8.5
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