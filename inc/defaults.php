<?php
/**
 * Memberlite Color Scheme Definitions
 *
 * All schemes use the 17-color format that maps directly to theme_mods.
 * These are the authoritative color definitions - no mapping needed.
 *
 * The 17 color keys:
 * - header_textcolor: Site title and tagline color
 * - background_color: Site background color
 * - bgcolor_header: Header background color
 * - bgcolor_site_navigation: Primary navigation background
 * - color_site_navigation: Primary navigation link color
 * - color_text: Default body text color
 * - color_link: Default link color
 * - color_meta_link: Post meta link color
 * - color_primary: Primary brand color
 * - color_secondary: Secondary brand color
 * - color_action: CTA/action color
 * - color_button: Default button color
 * - bgcolor_page_masthead: Page masthead background
 * - color_page_masthead: Page masthead text color
 * - bgcolor_footer_widgets: Footer widgets background
 * - color_footer_widgets: Footer widgets text color
 * - color_borders: Border color
 *
 * @package Memberlite
 * @since TBD
 */

/**
 * Get the 17 color setting keys used by the theme.
 *
 * @since TBD
 * @return array List of color setting keys.
 */
function memberlite_get_color_setting_keys(): array {
	return array(
		'header_textcolor',
		'background_color',
		'bgcolor_header',
		'bgcolor_site_navigation',
		'color_site_navigation',
		'color_text',
		'color_link',
		'color_meta_link',
		'color_primary',
		'color_secondary',
		'color_action',
		'color_button',
		'bgcolor_page_masthead',
		'color_page_masthead',
		'bgcolor_footer_widgets',
		'color_footer_widgets',
		'color_borders',
	);
}

/**
 * Default color scheme (2026)
 *
 * Clean, professional look with navy primary.
 *
 * @since TBD
 * @return array 17-color associative array.
 */
function memberlite_get_default_colors(): array {
	return array(
		'header_textcolor'        => '011935',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => 'ffffff',
		'bgcolor_site_navigation' => 'f9fafb',
		'color_site_navigation'   => '222222',
		'color_text'              => '222222',
		'color_link'              => '011935',
		'color_meta_link'         => '011935',
		'color_primary'           => '011935',
		'color_secondary'         => '3c4b5a',
		'color_action'            => '00a59d',
		'color_button'            => '011935',
		'bgcolor_page_masthead'   => '011935',
		'color_page_masthead'     => 'ffffff',
		'bgcolor_footer_widgets'  => '011935',
		'color_footer_widgets'    => 'ffffff',
		'color_borders'           => 'e0e0e0',
	);
}

/**
 * Evergreen color scheme
 *
 * Rich forest greens with a vibrant pink accent.
 *
 * @since TBD
 * @return array 17-color associative array.
 */
function memberlite_get_evergreen_colors(): array {
	return array(
		'header_textcolor'        => '174b49',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => 'ffffff',
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
 * @since TBD
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
		'color_borders'           => 'e0e0e0',
	);
}

/**
 * Deep Harbor color scheme
 *
 * Cool blue tones with sage green accent.
 *
 * @since TBD
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
 * @since TBD
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
		'color_link'              => '7c4dff',
		'color_meta_link'         => '9a9aa0',
		'color_primary'           => '7c4dff',
		'color_secondary'         => '9a9aa0',
		'color_action'            => '7c4dff',
		'color_button'            => '7c4dff',
		'bgcolor_page_masthead'   => '1c1d21',
		'color_page_masthead'     => 'f2f2f3',
		'bgcolor_footer_widgets'  => '1c1d21',
		'color_footer_widgets'    => 'f2f2f3',
		'color_borders'           => '1c1d21',
	);
}

/**
 * Cocoa Ash color scheme
 *
 * Warm browns with orange accent.
 *
 * @since TBD
 * @return array 17-color associative array.
 */
function memberlite_get_cocoa_ash_colors(): array {
	return array(
		'header_textcolor'        => 'ddd7cf',
		'background_color'        => 'ffffff',
		'bgcolor_header'          => '1f1b18',
		'bgcolor_site_navigation' => 'a8a29a',
		'color_site_navigation'   => '1f1b18',
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
 * @since TBD
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
 * @since TBD
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
 * @since TBD
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
 * Get default theme settings
 *
 * Merges non-color defaults with the default color scheme.
 *
 * @since TBD
 * @return array
 */
function memberlite_get_defaults(): array {
	$defaults = array(
		// Typography
		'memberlite_header_font'            => 'Lato',
		'memberlite_body_font'              => 'Lato',

		// Layout
		'columns_ratio'                     => '8-4',
		'columns_ratio_blog'                => '8-4',
		'columns_ratio_header'              => '4-8',
		'sidebar_location'                  => 'sidebar-right',
		'sidebar_location_blog'             => 'sidebar-blog-right',

		// Archives
		'content_archives'                  => 'content',
		'memberlite_loop_images'            => 'show_none',

		// Post Meta
		'posts_entry_meta_before'           => __( 'Posted on {post_date} by {post_author_posts_link}', 'memberlite' ),
		'posts_entry_meta_after'            => __( 'This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite' ),
		'author_block'                      => false,

		// Footer
		'memberlite_footerwidgets'          => '4',
		'copyright_textbox'                 => '&copy; !!current_year!! !!site_title!!',
		'memberlite_back_to_top'            => true,

		// Color Scheme
		'memberlite_color_scheme'           => 'default',

		// Other
		'delimiter'							=> '&nbsp;&#47;&nbsp;',
		'memberlite_darkcss'                => false,
		'hover_brightness'                  => '1.1',
		'color_white'                       => 'ffffff',
	);

	// Merge with default color scheme
	$defaults = array_merge( $defaults, memberlite_get_default_colors() );

	/**
	 * Filter Memberlite default settings.
	 *
	 * @since TBD
	 * @param array $defaults Associative array of default settings.
	 */
	return apply_filters( 'memberlite_defaults', $defaults );
}

/**
 * Get all available color schemes.
 *
 * Each scheme contains a label and the full 17-color associative array.
 * The 'custom' scheme is a special case handled separately in the customizer.
 *
 * @since TBD
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
		'cocoa_ash'     => array(
			'label'  => __( 'Cocoa Ash', 'memberlite' ),
			'colors' => memberlite_get_cocoa_ash_colors(),
		),
		'soft_spruce'    => array(
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
	 * @since TBD
	 * @param array $schemes Associative array of color schemes.
	 */
	return apply_filters( 'memberlite_color_schemes', $schemes );
}

/**
 * Get color scheme choices for the customizer dropdown.
 *
 * Returns scheme keys and labels, plus 'custom' option.
 *
 * @since TBD
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
 * Detect which color scheme (if any) matches the current theme_mod colors.
 *
 * Compares all 17 color values. Returns 'custom' if no exact match.
 *
 * @since TBD
 * @return string Scheme key or 'custom'.
 */
function memberlite_detect_current_scheme(): string {
	$schemes    = memberlite_get_color_schemes();
	$color_keys = memberlite_get_color_setting_keys();

	// Get current colors from theme_mods
	$current_colors = array();
	foreach ( $color_keys as $key ) {
		$current_colors[ $key ] = strtolower( get_theme_mod( $key, '' ) );
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

/**
 * Get all active colors from theme_mods.
 *
 * Returns the 17 color values currently saved in theme_mods,
 * falling back to defaults for any missing values.
 *
 * @since TBD
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
 * Get colors for a specific scheme by key.
 *
 * @since TBD
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

// Initialize global defaults
global $memberlite_defaults;
$memberlite_defaults = memberlite_get_defaults();
