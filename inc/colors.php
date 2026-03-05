<?php
/**
 * Memberlite Colors and Color Scheme Definitions
 *
 * @package Memberlite
 *
 * @since 7.0
 */

/**
 * Get the canonical mapping of Memberlite color setting keys to WordPress preset and theme-specific slugs.
 *
 * This is the single source of truth for how Memberlite's color setting keys
 * (theme_mod keys) map to the:
 * - slugs used in the editor color palette (--wp--preset--color--{slug} CSS custom properties
 * - theme-specific CSS variable names (--memberlite--color--{css_var})
 * - human-readable labels for use in the customizer UI.
 *
 * Note: Some slugs don't match the setting key pattern due to legacy naming in
 * the editor color palette that we must continue to support.
 *
 * @since 7.0
 * @return array Associative array keyed by setting key, each value containing 'slug', 'label'.
 */
function memberlite_get_color_preset_map(): array {
	return array(
		'color_primary' => array(
			'slug'    => 'color-primary',
			'css_var' => 'primary',
			'label'   => __( 'Primary', 'memberlite' ),
		),
		'color_secondary' => array(
			'slug'    => 'color-secondary',
			'css_var' => 'secondary',
			'label'   => __( 'Secondary', 'memberlite' ),
		),
		'color_action' => array(
			'slug'    => 'color-action',
			'css_var' => 'action',
			'label'   => __( 'Action', 'memberlite' ),
		),
		'bgcolor_site_navigation' => array(
			'slug'    => 'site-navigation-background',
			'css_var' => 'site-navigation-background',
			'label'   => __( 'Site Navigation Background', 'memberlite' ),
		),
		'color_site_navigation' => array(
			'slug'    => 'site-navigation-link',
			'css_var' => 'site-navigation',
			'label'   => __( 'Site Navigation', 'memberlite' ),
		),
		'color_button' => array(
			'slug'    => 'buttons',
			'css_var' => 'button',
			'label'   => __( 'Buttons', 'memberlite' ),
		),
		'color_borders' => array(
			'slug'    => 'borders',
			'css_var' => 'borders',
			'label'   => __( 'Borders', 'memberlite' ),
		),
		'color_text' => array(
			'slug'    => 'body-text',
			'css_var' => 'text',
			'label'   => __( 'Text', 'memberlite' ),
		),
		'background_color' => array(
			'slug'    => 'base',
			'css_var' => 'site-background',
			'label'   => __( 'Site Background', 'memberlite' ),
		),
		'color_link' => array(
			'slug'    => 'memberlite-links',
			'css_var' => 'link',
			'label'   => __( 'Links', 'memberlite' ),
		),
		'color_meta_link' => array(
			'slug'    => 'meta-link',
			'css_var' => 'meta-link',
			'label'   => __( 'Meta Links', 'memberlite' ),
		),
		'header_textcolor' => array(
			'slug'    => 'header-textcolor',
			'css_var' => 'header-text',
			'label'   => __( 'Header Text', 'memberlite' ),
		),
		'bgcolor_header' => array(
			'slug'    => 'bgcolor-header',
			'css_var' => 'header-background',
			'label'   => __( 'Header Background', 'memberlite' ),
		),
		'bgcolor_page_masthead' => array(
			'slug'    => 'page-masthead-background',
			'css_var' => 'page-masthead-background',
			'label'   => __( 'Page Masthead Background', 'memberlite' ),
		),
		'color_page_masthead' => array(
			'slug'    => 'page-masthead',
			'css_var' => 'page-masthead',
			'label'   => __( 'Page Masthead', 'memberlite' ),
		),
		'bgcolor_footer_widgets' => array(
			'slug'    => 'footer-widgets-background',
			'css_var' => 'footer-widgets-background',
			'label'   => __( 'Footer Widgets Background', 'memberlite' ),
		),
		'color_footer_widgets' => array(
			'slug'    => 'footer-widgets',
			'css_var' => 'footer-widgets',
			'label'   => __( 'Footer Widgets', 'memberlite' ),
		),
	);
}

/**
 * Get the 17 color setting keys used by the theme.
 *
 * @since 7.0
 * @return array List of color setting keys.
 */
function memberlite_get_color_setting_keys(): array {
	return array_keys( memberlite_get_color_preset_map() );
}

/**
 * Get color preset slugs keyed by setting key.
 *
 * Builds a simplified version of the preset map for JS localization.
 *
 * @since 7.0
 * @return array Associative array of setting_key => slug.
 */
function memberlite_get_color_preset_slugs(): array {
	$preset_map   = memberlite_get_color_preset_map();
	$preset_slugs = array();
	foreach ( $preset_map as $key => $entry ) {
		$preset_slugs[ $key ] = $entry['slug'];
	}
	return $preset_slugs;
}

/**
 * Get color CSS variable suffixes keyed by setting key.
 *
 * Used to localize the css_var values to JS so the customizer
 * live preview can build --memberlite-color-{css_var} dynamically.
 *
 * @since 7.0
 * @return array Associative array of setting_key => css_var.
 */
function memberlite_get_color_css_vars(): array {
	$preset_map = memberlite_get_color_preset_map();
	$css_vars   = array();
	foreach ( $preset_map as $key => $entry ) {
		$css_vars[ $key ] = $entry['css_var'];
	}
	return $css_vars;
}

/**
 * Default color scheme (2026)
 *
 * Clean, professional look with navy primary.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_default_colors(): array {
	return array(
		'header_textcolor'        => '011935',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => 'ffffff',
		'bgcolor_site_navigation' => 'ffffff',
		'color_site_navigation'   => '222222',
		'color_text'              => '222222',
		'color_link'              => '011935',
		'color_meta_link'         => '011935',
		'color_primary'           => '011935',
		'color_secondary'         => '00a59d',
		'color_action'            => 'e87102',
		'color_button'            => '3c4b5a',
		'bgcolor_page_masthead'   => '011935',
		'color_page_masthead'     => 'ffffff',
		'bgcolor_footer_widgets'  => 'f9fafb',
		'color_footer_widgets'    => '222222',
		'color_borders'           => 'e0e0e0',
	);
}

/**
 * Evergreen color scheme
 *
 * Rich forest greens with a vibrant pink accent.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_evergreen_colors(): array {
	return array(
		'header_textcolor'        => '174b49',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => 'f9fafb',
		'bgcolor_site_navigation' => 'f9fafb',
		'color_site_navigation'   => '0f0f0f',
		'color_text'              => '0f0f0f',
		'color_link'              => '174b49',
		'color_meta_link'         => '174b49',
		'color_primary'           => '174b49',
		'color_secondary'         => '2e7061',
		'color_action'            => 'f83773',
		'color_button'            => '174b49',
		'bgcolor_page_masthead'   => '174b49',
		'color_page_masthead'     => 'ffffff',
		'bgcolor_footer_widgets'  => '174b49',
		'color_footer_widgets'    => 'ffffff',
		'color_borders'           => 'e0e0e0',
	);
}

/**
 * Seaside Linen color scheme
 *
 * Warm tan background with deep blue and chartreuse accent.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_seaside_linen_colors(): array {
	return array(
		'header_textcolor'        => '1f3a4a',
		'background_color'        => 'ecebe3',
		'bgcolor_header'          => 'ecebe3',
		'bgcolor_site_navigation' => 'ecebe3',
		'color_site_navigation'   => '25292b',
		'color_text'              => '25292b',
		'color_link'              => '1f3a4a',
		'color_meta_link'         => '1f3a4a',
		'color_primary'           => '1f3a4a',
		'color_secondary'         => '4e6a78',
		'color_action'            => 'ebf9a8',
		'color_button'            => '1f3a4a',
		'bgcolor_page_masthead'   => '1f3a4a',
		'color_page_masthead'     => 'ffffff',
		'bgcolor_footer_widgets'  => 'ecebe3',
		'color_footer_widgets'    => '25292b',
		'color_borders'           => 'cccab8',
	);
}

/**
 * Deep Harbor color scheme
 *
 * Cool blue tones with sage green accent.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_deep_harbor_colors(): array {
	return array(
		'header_textcolor'        => '2a2f36',
		'background_color'        => 'f7f9fc',
		'bgcolor_header'          => 'f7f9fc',
		'bgcolor_site_navigation' => 'f7f9fc',
		'color_site_navigation'   => '2a2f36',
		'color_text'              => '2a2f36',
		'color_link'              => '1f3a5f',
		'color_meta_link'         => '2f5f8f',
		'color_primary'           => '1f3a5f',
		'color_secondary'         => '2f5f8f',
		'color_action'            => '8faea0',
		'color_button'            => '1f3a5f',
		'bgcolor_page_masthead'   => '1f3a5f',
		'color_page_masthead'     => 'f7f9fc',
		'bgcolor_footer_widgets'  => 'f7f9fc',
		'color_footer_widgets'    => '2a2f36',
		'color_borders'           => 'e0e0e0',
	);
}

/**
 * Midnight Violet color scheme
 *
 * Dark mode with purple accents.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_midnight_violet_colors(): array {
	return array(
		'header_textcolor'        => 'f2f2f3',
		'background_color'        => '0b0b0d',
		'bgcolor_header'          => '0b0b0d',
		'bgcolor_site_navigation' => '1c1d21',
		'color_site_navigation'   => 'f2f2f3',
		'color_text'              => 'f2f2f3',
		'color_link'              => 'a483ff',
		'color_meta_link'         => '9a9aa0',
		'color_primary'           => 'a483ff',
		'color_secondary'         => '9a9aa0',
		'color_action'            => 'a483ff',
		'color_button'            => 'a483ff',
		'bgcolor_page_masthead'   => '1c1d21',
		'color_page_masthead'     => 'f2f2f3',
		'bgcolor_footer_widgets'  => '1c1d21',
		'color_footer_widgets'    => 'f2f2f3',
		'color_borders'           => '434347',
	);
}

/**
 * Cocoa Ash color scheme
 *
 * Warm browns with orange accent.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_cocoa_ash_colors(): array {
	return array(
		'header_textcolor'        => 'ffffff',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => '1f1b18',
		'bgcolor_site_navigation' => '6f6a66',
		'color_site_navigation'   => 'ffffff',
		'color_text'              => '1f1b18',
		'color_link'              => '2e2623',
		'color_meta_link'         => 'ddd7cf',
		'color_primary'           => '2e2623',
		'color_secondary'         => '6f6a66',
		'color_action'            => 'd89a5a',
		'color_button'            => '2e2623',
		'bgcolor_page_masthead'   => 'a8a29a',
		'color_page_masthead'     => '1f1b18',
		'bgcolor_footer_widgets'  => '2e2623',
		'color_footer_widgets'    => 'ddd7cf',
		'color_borders'           => 'a8a29a',
	);
}

/**
 * Soft Spruce color scheme
 *
 * Clean grays with restrained green accents.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_soft_spruce_colors(): array {
	return array(
		'header_textcolor'        => '2b2e2d',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => 'ffffff',
		'bgcolor_site_navigation' => 'f5f7f6',
		'color_site_navigation'   => '2b2e2d',
		'color_text'              => '2b2e2d',
		'color_link'              => '0e7a49',
		'color_meta_link'         => '7a7f7c',
		'color_primary'           => '0e7a49',
		'color_secondary'         => '7a7f7c',
		'color_action'            => 'd18a3a',
		'color_button'            => '0e7a49',
		'bgcolor_page_masthead'   => 'f5f7f6',
		'color_page_masthead'     => '2b2e2d',
		'bgcolor_footer_widgets'  => 'f5f7f6',
		'color_footer_widgets'    => '2b2e2d',
		'color_borders'           => 'e3e6e4',
	);
}

/**
 * Iron Ember color scheme
 *
 * Dark charcoal with rust orange accent.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_iron_ember_colors(): array {
	return array(
		'header_textcolor'        => '1f252b',
		'background_color'        => 'f6f7f6',
		'bgcolor_header'          => 'f6f7f6',
		'bgcolor_site_navigation' => 'e9ecea',
		'color_site_navigation'   => '1f252b',
		'color_text'              => '1f252b',
		'color_link'              => '1f252b',
		'color_meta_link'         => '4a5a6a',
		'color_primary'           => '1f252b',
		'color_secondary'         => '4a5a6a',
		'color_action'            => 'c84f1a',
		'color_button'            => '1f252b',
		'bgcolor_page_masthead'   => '1f252b',
		'color_page_masthead'     => 'ffffff',
		'bgcolor_footer_widgets'  => '1f252b',
		'color_footer_widgets'    => 'ffffff',
		'color_borders'           => 'e0e0e0',
	);
}

/**
 * Slate Harbor color scheme
 *
 * Deep navy with teal and coral accents.
 *
 * @since 7.0
 * @return array 17-color associative array.
 */
function memberlite_get_slate_harbor_colors(): array {
	return array(
		'header_textcolor'        => '0b1233',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => 'ffffff',
		'bgcolor_site_navigation' => 'eef2f6',
		'color_site_navigation'   => '0b1233',
		'color_text'              => '111827',
		'color_link'              => '0b1233',
		'color_meta_link'         => '0f6e7a',
		'color_primary'           => '0b1233',
		'color_secondary'         => '0f6e7a',
		'color_action'            => 'f26b3a',
		'color_button'            => '0b1233',
		'bgcolor_page_masthead'   => '0b1233',
		'color_page_masthead'     => 'ffffff',
		'bgcolor_footer_widgets'  => '0b1233',
		'color_footer_widgets'    => 'ffffff',
		'color_borders'           => 'e4e9f0',
	);
}

/**
 * Get all available color schemes.
 *
 * Each scheme contains a label and the full 17-color associative array.
 * The 'custom' scheme is a special case handled separately in the customizer.
 *
 * @since 7.0
 * @return array Associative array of color schemes.
 */
function memberlite_get_color_schemes(): array {
	$schemes = array(
		'default'         => array(
			'label'  => __( 'Default', 'memberlite' ),
			'colors' => memberlite_get_default_colors(),
		),
		'evergreen'       => array(
			'label'  => __( 'Evergreen', 'memberlite' ),
			'colors' => memberlite_get_evergreen_colors(),
		),
		'seaside_linen'   => array(
			'label'  => __( 'Seaside Linen', 'memberlite' ),
			'colors' => memberlite_get_seaside_linen_colors(),
		),
		'deep_harbor'     => array(
			'label'  => __( 'Deep Harbor', 'memberlite' ),
			'colors' => memberlite_get_deep_harbor_colors(),
		),
		'midnight_violet' => array(
			'label'  => __( 'Midnight Violet', 'memberlite' ),
			'colors' => memberlite_get_midnight_violet_colors(),
		),
		'cocoa_ash'       => array(
			'label'  => __( 'Cocoa Ash', 'memberlite' ),
			'colors' => memberlite_get_cocoa_ash_colors(),
		),
		'soft_spruce'     => array(
			'label'  => __( 'Soft Spruce', 'memberlite' ),
			'colors' => memberlite_get_soft_spruce_colors(),
		),
		'iron_ember'      => array(
			'label'  => __( 'Iron Ember', 'memberlite' ),
			'colors' => memberlite_get_iron_ember_colors(),
		),
		'slate_harbor'    => array(
			'label'  => __( 'Slate Harbor', 'memberlite' ),
			'colors' => memberlite_get_slate_harbor_colors(),
		),
	);

	/**
	 * Filter Memberlite color schemes.
	 *
	 * @since 7.0
	 *
	 * @param array $schemes Associative array of color schemes.
	 */
	return apply_filters( 'memberlite_color_schemes', $schemes );
}

/**
 * Get color scheme choices for the customizer dropdown.
 *
 * Returns scheme keys and labels, plus 'custom' option.
 *
 * @since 7.0
 *
 * @return array Associative array of scheme_key => label.
 */
function memberlite_get_color_scheme_choices(): array {
	$schemes = memberlite_get_color_schemes();
	$choices = array();

	foreach ( $schemes as $key => $scheme ) {
		$choices[ $key ] = $scheme['label'];
	}

	// Add custom option at the end
	$choices['custom'] = __( 'Custom', 'memberlite' );

	return $choices;
}

/**
 * Get colors for a specific scheme by key.
 *
 * @since 7.0
 * @param string $scheme_key The scheme key (e.g., 'default', 'evergreen').
 * @return array|null The 17-color array or null if not found.
 */
function memberlite_get_scheme_colors( string $scheme_key ): ?array {
	$schemes = memberlite_get_color_schemes();

	if ( isset( $schemes[ $scheme_key ] ) ) {
		return $schemes[ $scheme_key ]['colors'];
	}

	return null;
}

/**
 * Get all active colors from theme_mods.
 *
 * Returns the 17 color values currently saved in theme_mods,
 * falling back to defaults for any missing values.
 *
 * @since 7.0
 * @return array Associative array of all 17 color values.
 */
function memberlite_get_active_colors(): array {
	global $memberlite_defaults;

	$color_keys = memberlite_get_color_setting_keys();
	$colors     = array();

	foreach ( $color_keys as $key ) {
		$value          = get_theme_mod( $key, '' );
		$colors[ $key ] = ! empty( $value ) ? $value : ( $memberlite_defaults[ $key ] ?? '' );
	}

	return $colors;
}

/**
 * Determine whether a hex color is "dark" based on WCAG relative luminance.
 *
 * Uses the sRGB linearization and luminance formula from WCAG 2.0.
 * A luminance of 0.179 is the threshold — colors at or below this
 * value are considered dark.
 *
 * @since 7.0
 * @param string $hex_color Hex color value (with or without leading '#').
 * @return bool True if the color is dark, false if light.
 */
function memberlite_is_dark_color( string $hex_color ): bool {
	$hex = ltrim( $hex_color, '#' );

	// Expand shorthand (e.g. "fff" → "ffffff").
	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}

	$r = hexdec( substr( $hex, 0, 2 ) ) / 255;
	$g = hexdec( substr( $hex, 2, 2 ) ) / 255;
	$b = hexdec( substr( $hex, 4, 2 ) ) / 255;

	// sRGB to linear.
	$r = ( $r <= 0.03928 ) ? $r / 12.92 : pow( ( $r + 0.055 ) / 1.055, 2.4 );
	$g = ( $g <= 0.03928 ) ? $g / 12.92 : pow( ( $g + 0.055 ) / 1.055, 2.4 );
	$b = ( $b <= 0.03928 ) ? $b / 12.92 : pow( ( $b + 0.055 ) / 1.055, 2.4 );

	$luminance = 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;

	return $luminance <= 0.179;
}

/**
 * Detect which color scheme (if any) matches the current theme_mod colors.
 *
 * Compares all 17 color values. Returns 'custom' if no exact match.
 *
 * @since 7.0
 * @return string Scheme key or 'custom'.
 */
function memberlite_detect_current_scheme(): string {
	$schemes    = memberlite_get_color_schemes();
	$color_keys = memberlite_get_color_setting_keys();

	// Get current colors from theme_mods
	$current_colors = array();
	foreach ( $color_keys as $key ) {
		$current_colors[ $key ] = strtolower( ltrim( get_theme_mod( $key, '' ), '#' ) );
	}

	// Compare against each scheme
	foreach ( $schemes as $scheme_key => $scheme ) {
		$match = true;
		foreach ( $color_keys as $key ) {
			// Skip header_textcolor comparison if set to 'blank' (hidden site title)
			if ( 'header_textcolor' === $key && 'blank' === get_theme_mod( 'header_textcolor' ) ) {
				continue;
			}

			$scheme_color  = strtolower( $scheme['colors'][ $key ] ?? '' );
			$current_color = $current_colors[ $key ];

			if ( $scheme_color !== $current_color ) {
				$match = false;
				break;
			}
		}

		if ( $match ) {
			return $scheme_key;
		}
	}

	return 'custom';
}
