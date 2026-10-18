<?php
/**
 * Memberlite Fonts
 *
 * Helpers for the Customizer heading and body font settings and the
 * theme.json font family settings derived from them.
 *
 * @package Memberlite
 *
 * @since TBD
 */

/**
 * Get the slugs of the theme.json font family entries that alias the
 * Customizer heading and body fonts rather than naming a real font.
 *
 * @since TBD
 * @return string[] Font family slugs.
 */
function memberlite_get_font_alias_slugs() {
	return array( 'heading', 'body' );
}

/**
 * Get the selected font slug for a given font type.
 *
 * Returns the theme.json-compatible slug (lowercase). If $nicename is true,
 * returns the display name by looking it up in the registered font families.
 * Safe to call anywhere except from within the wp_theme_json_data_theme filter
 * with $nicename = true (use memberlite_get_font_name_from_json_data() there instead).
 *
 * @since 7.0.1
 * @param string    $font_type 'header_font' or 'body_font'.
 * @param bool|null $nicename  Optional. If true, return the display name.
 * @return string Font slug or display name.
 */
function memberlite_get_font( $font_type, $nicename = false ) {
	global $memberlite_defaults;

	$slug = strtolower( get_theme_mod( 'memberlite_' . $font_type, $memberlite_defaults[ 'memberlite_' . $font_type ] ) );

	if ( ! $nicename ) {
		return $slug;
	}

	// Look up the display name from theme.json font families.
	$settings      = wp_get_global_settings();
	$font_families = $settings['typography']['fontFamilies']['theme'] ?? array();
	foreach ( $font_families as $font ) {
		if ( ! is_array( $font ) || empty( $font['slug'] ) || empty( $font['name'] ) ) {
			continue;
		}
		if ( $font['slug'] === $slug ) {
			return $font['name'];
		}
	}

	// Fallback: convert slug to title case.
	return ucwords( str_replace( '-', ' ', $slug ) );
}

/**
 * Look up a font display name from a fontFamilies array.
 *
 * Used inside the wp_theme_json_data_theme filter to avoid circular calls
 * to wp_get_global_settings().
 *
 * @since 7.0.1
 * @param string $slug         The font slug to look up.
 * @param array  $font_families Array of fontFamily objects from theme.json data.
 * @return string Display name, or title-cased slug as fallback.
 */
function memberlite_get_font_name_from_json_data( $slug, $font_families ) {
	foreach ( $font_families as $font ) {
		if ( ! is_array( $font ) || empty( $font['slug'] ) || empty( $font['name'] ) ) {
			continue;
		}
		if ( $font['slug'] === $slug ) {
			return $font['name'];
		}
	}
	return ucwords( str_replace( '-', ' ', $slug ) );
}

/**
 * Get all fonts a site owner can choose from in the Customizer.
 *
 * theme.json is the single source of truth for available fonts. Developers
 * can add fonts by filtering wp_theme_json_data_theme. Alias entries that
 * point back at the Customizer fonts are excluded.
 *
 * @since TBD
 * @return array Associative array of slug => display name.
 */
function memberlite_get_fonts() {
	$settings      = wp_get_global_settings();
	$font_families = $settings['typography']['fontFamilies']['theme'] ?? array();
	$alias_slugs   = memberlite_get_font_alias_slugs();
	$fonts         = array();
	foreach ( $font_families as $font ) {
		if ( ! is_array( $font ) || empty( $font['slug'] ) || empty( $font['name'] ) ) {
			continue;
		}
		$slug = sanitize_key( $font['slug'] );
		if ( '' === $slug || in_array( $slug, $alias_slugs, true ) ) {
			continue;
		}
		$fonts[ $slug ] = $font['name'];
	}
	return $fonts;
}

/**
 * Filter theme.json data to set the heading and body font family custom properties
 * from the fonts selected in the Customizer.
 *
 * @since TBD
 *
 * @param WP_Theme_JSON $theme_json Theme JSON object.
 * @return WP_Theme_JSON Theme JSON object.
 */
function memberlite_filter_theme_json_fonts( $theme_json ) {
	$theme_json_data = $theme_json->get_data();

	if ( ! isset( $theme_json_data['settings'] ) ) {
		$theme_json_data['settings'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['custom'] ) ) {
		$theme_json_data['settings']['custom'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['custom']['heading'] ) ) {
		$theme_json_data['settings']['custom']['heading'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['custom']['body'] ) ) {
		$theme_json_data['settings']['custom']['body'] = array();
	}

	// Look up font display names directly from the theme.json data to avoid
	// circular calls to wp_get_global_settings() inside this filter.
	// fontFamilies in raw theme.json data may be grouped (e.g. 'theme', 'default'),
	// so flatten all groups into a single list before passing to the lookup function.
	$font_families_grouped = $theme_json_data['settings']['typography']['fontFamilies'] ?? array();
	$font_families         = array();
	foreach ( $font_families_grouped as $group ) {
		if ( is_array( $group ) ) {
			$font_families = array_merge( $font_families, $group );
		}
	}
	$theme_json_data['settings']['custom']['heading']['fontFamily'] = memberlite_get_font_name_from_json_data( memberlite_get_font( 'header_font' ), $font_families );
	$theme_json_data['settings']['custom']['body']['fontFamily']    = memberlite_get_font_name_from_json_data( memberlite_get_font( 'body_font' ), $font_families );

	// Update the theme.json object.
	return $theme_json->update_with( $theme_json_data );
}
add_filter( 'wp_theme_json_data_theme', 'memberlite_filter_theme_json_fonts' );
