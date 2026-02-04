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
		'header_textcolor'        => '#011935',
		'background_color'        => '#FFFFFF',
		'bgcolor_header'          => '#FFFFFF',
		'bgcolor_site_navigation' => '#F9FAFB',
		'color_site_navigation'   => '#222222',
		'color_text'              => '#222222',
		'color_link'              => '#011935',
		'color_meta_link'         => '#011935',
		'color_primary'           => '#011935',
		'color_secondary'         => '#3C4B5A',
		'color_action'            => '#00A59D',
		'color_button'            => '#011935',
		'bgcolor_page_masthead'   => '#011935',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#011935',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
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
		'header_textcolor'        => '#FFFFFF',
		'background_color'        => '#FFFFFF',
		'bgcolor_header'          => '#174B49',
		'bgcolor_site_navigation' => '#174B49',
		'color_site_navigation'   => '#FFFFFF',
		'color_text'              => '#0F0F0F',
		'color_link'              => '#174B49',
		'color_meta_link'         => '#2E7061',
		'color_primary'           => '#174B49',
		'color_secondary'         => '#2E7061',
		'color_action'            => '#F83773',
		'color_button'            => '#174B49',
		'bgcolor_page_masthead'   => '#174B49',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#174B49',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
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
		'header_textcolor'        => '#FFFFFF',
		'background_color'        => '#ECEBE3',
		'bgcolor_header'          => '#1F3A4A',
		'bgcolor_site_navigation' => '#1F3A4A',
		'color_site_navigation'   => '#FFFFFF',
		'color_text'              => '#25292B',
		'color_link'              => '#1F3A4A',
		'color_meta_link'         => '#4E6A78',
		'color_primary'           => '#1F3A4A',
		'color_secondary'         => '#4E6A78',
		'color_action'            => '#EBF9A8',
		'color_button'            => '#1F3A4A',
		'bgcolor_page_masthead'   => '#1F3A4A',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#1F3A4A',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
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
		'header_textcolor'        => '#FFFFFF',
		'background_color'        => '#F7F9FC',
		'bgcolor_header'          => '#1F3A5F',
		'bgcolor_site_navigation' => '#1F3A5F',
		'color_site_navigation'   => '#FFFFFF',
		'color_text'              => '#2A2F36',
		'color_link'              => '#1F3A5F',
		'color_meta_link'         => '#2F5F8F',
		'color_primary'           => '#1F3A5F',
		'color_secondary'         => '#2F5F8F',
		'color_action'            => '#8FAEA0',
		'color_button'            => '#1F3A5F',
		'bgcolor_page_masthead'   => '#1F3A5F',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#1F3A5F',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
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
		'header_textcolor'        => '#F2F2F3',
		'background_color'        => '#0B0B0D',
		'bgcolor_header'          => '#0B0B0D',
		'bgcolor_site_navigation' => '#1C1D21',
		'color_site_navigation'   => '#F2F2F3',
		'color_text'              => '#F2F2F3',
		'color_link'              => '#7C4DFF',
		'color_meta_link'         => '#9A9AA0',
		'color_primary'           => '#7C4DFF',
		'color_secondary'         => '#9A9AA0',
		'color_action'            => '#7C4DFF',
		'color_button'            => '#7C4DFF',
		'bgcolor_page_masthead'   => '#1C1D21',
		'color_page_masthead'     => '#F2F2F3',
		'bgcolor_footer_widgets'  => '#1C1D21',
		'color_footer_widgets'    => '#F2F2F3',
		'color_borders'           => '#1C1D21',
	);
}

/**
 * Cedar Spice color scheme
 *
 * Warm browns with orange accent.
 *
 * @since TBD
 * @return array 17-color associative array.
 */
function memberlite_get_cedar_spice_colors(): array {
	return array(
		'header_textcolor'        => '#FFFFFF',
		'background_color'        => '#FFFFFF',
		'bgcolor_header'          => '#2E2623',
		'bgcolor_site_navigation' => '#2E2623',
		'color_site_navigation'   => '#FFFFFF',
		'color_text'              => '#1F1B18',
		'color_link'              => '#2E2623',
		'color_meta_link'         => '#6F6A66',
		'color_primary'           => '#2E2623',
		'color_secondary'         => '#6F6A66',
		'color_action'            => '#D89A5A',
		'color_button'            => '#2E2623',
		'bgcolor_page_masthead'   => '#2E2623',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#2E2623',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
	);
}

/**
 * Fresh Spruce color scheme
 *
 * Bright green with clean grays.
 *
 * @since TBD
 * @return array 17-color associative array.
 */
function memberlite_get_fresh_spruce_colors(): array {
	return array(
		'header_textcolor'        => '#FFFFFF',
		'background_color'        => '#FFFFFF',
		'bgcolor_header'          => '#1DBF73',
		'bgcolor_site_navigation' => '#1DBF73',
		'color_site_navigation'   => '#FFFFFF',
		'color_text'              => '#2B2E2D',
		'color_link'              => '#1DBF73',
		'color_meta_link'         => '#7A7F7C',
		'color_primary'           => '#1DBF73',
		'color_secondary'         => '#7A7F7C',
		'color_action'            => '#1DBF73',
		'color_button'            => '#1DBF73',
		'bgcolor_page_masthead'   => '#1DBF73',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#1DBF73',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
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
		'header_textcolor'        => '#FFFFFF',
		'background_color'        => '#F6F7F6',
		'bgcolor_header'          => '#1F252B',
		'bgcolor_site_navigation' => '#1F252B',
		'color_site_navigation'   => '#FFFFFF',
		'color_text'              => '#1F252B',
		'color_link'              => '#1F252B',
		'color_meta_link'         => '#4A5A6A',
		'color_primary'           => '#1F252B',
		'color_secondary'         => '#4A5A6A',
		'color_action'            => '#C84F1A',
		'color_button'            => '#1F252B',
		'bgcolor_page_masthead'   => '#1F252B',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#1F252B',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
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
		'header_textcolor'        => '#FFFFFF',
		'background_color'        => '#FFFFFF',
		'bgcolor_header'          => '#0B1233',
		'bgcolor_site_navigation' => '#0B1233',
		'color_site_navigation'   => '#FFFFFF',
		'color_text'              => '#111827',
		'color_link'              => '#0B1233',
		'color_meta_link'         => '#0F6E7A',
		'color_primary'           => '#0B1233',
		'color_secondary'         => '#0F6E7A',
		'color_action'            => '#F26B3A',
		'color_button'            => '#0B1233',
		'bgcolor_page_masthead'   => '#0B1233',
		'color_page_masthead'     => '#FFFFFF',
		'bgcolor_footer_widgets'  => '#0B1233',
		'color_footer_widgets'    => '#FFFFFF',
		'color_borders'           => '#E0E0E0',
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
		'color_white'                       => '#FFFFFF',
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
		'cedar_spice'     => array(
			'label'  => __( 'Cedar Spice', 'memberlite' ),
			'colors' => memberlite_get_cedar_spice_colors(),
		),
		'fresh_spruce'    => array(
			'label'  => __( 'Fresh Spruce', 'memberlite' ),
			'colors' => memberlite_get_fresh_spruce_colors(),
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
		$current_colors[ $key ] = strtoupper( get_theme_mod( $key, '' ) );
	}

	// Compare against each scheme
	foreach ( $schemes as $scheme_key => $scheme ) {
		$match = true;
		foreach ( $color_keys as $key ) {
			$scheme_color  = strtoupper( $scheme['colors'][ $key ] ?? '' );
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
