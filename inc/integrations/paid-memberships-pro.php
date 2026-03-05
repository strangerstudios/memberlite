<?php
/**
 * Filter the theme.json properties based on the PMPro style variation.
 *
 * @since 7.0
 *
 * @param WP_Theme_JSON $theme_json Theme JSON object.
 * @return WP_Theme_JSON Theme JSON object.
 */
function memberlite_pmpro_filter_theme_json( $theme_json ) {
	// Get the current PMPro style variation.
	$pmpro_style_variation = get_option( 'pmpro_style_variation', 'variation_1' );

	// Return early if the variation is not variation_high_contrast.
	if ( $pmpro_style_variation !== 'variation_high_contrast' ) {
		return $theme_json;
	}

	// Change the custom border radius property to 0.
	$theme_json_data = $theme_json->get_data();
	if ( ! isset( $theme_json_data['settings'] ) ) {
		$theme_json_data['settings'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['custom'] ) ) {
		$theme_json_data['settings']['custom'] = array();
	}

	$theme_json_data['settings']['custom']['border']['radius'] = 0;

	// Update the theme.json object.
	return $theme_json->update_with( $theme_json_data );
}
add_filter( 'wp_theme_json_data_theme', 'memberlite_pmpro_filter_theme_json' );

/**
 * Don't show the page nav on the PMPro Membership Account page and subpages.
 */
function memberlite_pmpro_theme_mod_memberlite_page_nav( $mod ) {
	global $pmpro_pages, $post;

	// no post or pmpro_pages and we stop
	if ( empty( $pmpro_pages ) || empty( $pmpro_pages['account'] ) || empty( $post ) || empty( $post->ID ) ) {
		return $mod;
	}

	// which page to be checking
	if ( ! empty( $post->post_parent ) ) {
		$post_ancestors = get_post_ancestors( $post );
		$toplevelpost   = end( $post_ancestors );
	} else {
		$toplevelpost = $post->ID;
	}

	if ( $toplevelpost == $pmpro_pages['account'] ) {
		$mod = 0;
	}

	return $mod;
}
add_filter( 'theme_mod_memberlite_page_nav', 'memberlite_pmpro_theme_mod_memberlite_page_nav' );

/**
 * Hide subpage menu if this the PMPro Membership Account page or one of its subpages.
 */
function memberlite_pmpro_sidebar_hide_children( $widget_areas ) {
	global $pmpro_pages;

	$queried_object = get_queried_object();

	// no queried object or pmpro_pages and we stop
	if ( empty( $pmpro_pages ) || empty( $pmpro_pages['account'] ) || empty( $queried_object ) || empty( $queried_object->post_type ) ) {
		return $widget_areas;
	}

	//are we even showing children?
	$memberlite_nav_menu_submenu_key = array_search( 'memberlite_nav_menu_submenu', $widget_areas );
	if ( $memberlite_nav_menu_submenu_key === false ) {
		return $widget_areas;
	}

	// which page to be checking
	if ( ! empty( $queried_object->post_parent ) ) {
		$queried_object_ancestors = get_post_ancestors( $queried_object );
		$toplevelpost   = end( $queried_object_ancestors );
	} else {
		$toplevelpost = $queried_object->ID;
	}

	if ( $toplevelpost == $pmpro_pages['account'] ) {
		unset( $widget_areas[$memberlite_nav_menu_submenu_key] );
	}

	return $widget_areas;
}
add_filter( 'memberlite_get_widget_areas', 'memberlite_pmpro_sidebar_hide_children' );
