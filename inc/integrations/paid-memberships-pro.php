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

	// The Minimal variation has no card styles, so Memberlite's own theme.json values apply.
	if ( $pmpro_style_variation === 'variation_minimal' ) {
		return $theme_json;
	}

	$theme_json_data = $theme_json->get_data();
	if ( ! isset( $theme_json_data['settings'] ) ) {
		$theme_json_data['settings'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['custom'] ) ) {
		$theme_json_data['settings']['custom'] = array();
	}

	// Card tokens follow the PMPro card. Fallbacks cover the editor, where PMPro's variables may not load.
	$default_card_shadow = $pmpro_style_variation === 'variation_high_contrast' ? '5px 4px 0px #222' : '2px 2px 7px rgba(0, 0, 0, 0.07)';
	$theme_json_data['settings']['custom']['card'] = array(
		'background'  => 'var(--pmpro--color--base, var(--wp--preset--color--base))',
		'borderColor' => 'var(--pmpro--color--border--variation, var(--wp--preset--color--borders))',
		'color'       => 'var(--pmpro--color--contrast, var(--wp--preset--color--body-text))',
		'padding'     => 'var(--pmpro--base--spacing--large, 36px)',
		'radius'      => 'var(--wp--custom--border--radius)',
		'shadow'      => 'var(--pmpro--box-shadow, ' . $default_card_shadow . ')',
	);

	// Change the custom border radius property to 0.
	if ( $pmpro_style_variation === 'variation_high_contrast' ) {
		$theme_json_data['settings']['custom']['border']['radius'] = 0;
	}

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

/**
 * Get the PMPro color variables used when "Override PMPro Colors" is checked in the Customizer.
 *
 * @since TBD
 * @return array CSS variable names mapped to values.
 */
function memberlite_pmpro_get_color_override_vars(): array {
	$active_colors         = memberlite_get_active_colors();
	$pmpro_style_variation = get_option( 'pmpro_style_variation', 'variation_1' );

	return array(
		'--pmpro--color--accent'            => '#' . $active_colors['color_primary'],
		'--pmpro--color--accent--variation' => '#' . $active_colors['color_primary'],
		'--pmpro--color--base'              => 'light-dark( #fff, #' . $active_colors['background_color'] . ' )',
		'--pmpro--color--contrast'          => '#' . $active_colors['color_text'],
		'--pmpro--color--border--variation' => '#' . ( $pmpro_style_variation === 'variation_high_contrast' ? $active_colors['color_text'] : $active_colors['color_borders'] ),
	);
}

/**
 * Load the PMPro color variables in the block editor for the card tokens.
 *
 * PMPro and the Customizer print these on the frontend only.
 *
 * @since TBD
 * @return void
 */
function memberlite_pmpro_editor_color_vars(): void {
	if ( ! is_admin() ) {
		return;
	}

	if ( get_theme_mod( 'memberlite_pmpro_color_override' ) ) {
		// light-dark() in the base color needs the same color-scheme as the frontend.
		$css = ':root { color-scheme: ' . ( memberlite_is_dark_color( memberlite_get_active_colors()['background_color'] ) ? 'dark' : 'light' ) . ';';
		foreach ( memberlite_pmpro_get_color_override_vars() as $pmpro_var => $pmpro_value ) {
			$css .= ' ' . $pmpro_var . ': ' . $pmpro_value . ';';
		}
		$css .= ' }';
	} elseif ( function_exists( 'pmpro_print_root_color_values' ) ) {
		ob_start();
		pmpro_print_root_color_values();
		$css = wp_kses( ob_get_clean(), array() );
	} else {
		return;
	}

	wp_register_style( 'memberlite-pmpro-editor-colors', false, array(), MEMBERLITE_VERSION );
	wp_add_inline_style( 'memberlite-pmpro-editor-colors', $css );
	wp_enqueue_style( 'memberlite-pmpro-editor-colors' );
}
add_action( 'enqueue_block_assets', 'memberlite_pmpro_editor_color_vars' );
