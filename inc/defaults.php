<?php
/**
 * Core color arrays for each scheme
 */

//Default color palette (inspired by legacy default 4.6)
function memberlite_get_colors(): array {
	return array(
		'heading'       => '#222222',
		'contrast'      => '#222222',
		'base'          => '#FFFFFF',
		'masthead_bg'   => '#FFFFFF',
		'masthead_text' => '#011935',
		'primary'       => '#011935',
		'secondary'     => '#011935',
		'border'        => '#3C4B5A',
	);
}

// Evergreen
function memberlite_get_evergreen_colors(): array {
	return array(
		'heading'       => '#0F0F0F',  // heading
		'contrast'      => '#0F0F0F',  // text
		'base'          => '#FFFFFF',  // body/nav/footer bg
		'masthead_bg'   => '#174B49',  // header bg
		'masthead_text' => '#FFFFFF',  // masthead heading text
		'primary'       => '#174B49',  // primary
		'secondary'     => '#2E7061',  // secondary
		'action'        => '#F83773',  // action/cta
		'border'        => '#76A597',  // soft accent as border
	);
}

// Seaside Linen (Tan/Blue/Yellow)
function memberlite_get_seaside_linen_colors(): array {
	return array(
		'heading'       => '#25292B',  // heading
		'contrast'      => '#25292B',  // text
		'base'          => '#ECEBE3',  // background
		'masthead_bg'   => '#1F3A4A',  // header bg
		'masthead_text' => '#FFFFFF',  // header/masthead text
		'primary'       => '#1F3A4A',  // primary
		'secondary'     => '#4E6A78',  // secondary
		'action'        => '#EBF9A8',  // action/cta
		'border'        => '#4E6A78',  // border
	);
}

// Deep Harbor (Blue/White)
function memberlite_get_deep_harbor_colors(): array {
	return array(
		'heading'       => '#2A2F36',  // heading
		'contrast'      => '#2A2F36',  // text
		'base'          => '#F7F9FC',  // background
		'masthead_bg'   => '#1F3A5F',  // header bg
		'masthead_text' => '#FFFFFF',  // header/masthead text
		'primary'       => '#1F3A5F',  // primary
		'secondary'     => '#2F5F8F',  // secondary
		'action'        => '#8FAEA0',  // action/cta
		'border'        => '#6B7280',  // soft accent
	);
}

// Midnight Violet (Dark Background with Purple)
function memberlite_get_midnight_violet_colors(): array {
	return array(
		'heading'       => '#F2F2F3',  // heading
		'contrast'      => '#F2F2F3',  // text
		'base'          => '#0B0B0D',  // background
		'masthead_bg'   => '#0B0B0D',  // header bg
		'masthead_text' => '#F2F2F3',  // header/masthead text
		'primary'       => '#7C4DFF',  // primary (light on dark)
		'secondary'     => '#9A9AA0',  // secondary
		'action'        => '#7C4DFF',  // action/cta
		'border'        => '#1C1D21',  // soft accent
	);
}

// Cedar Spice (Brown/Orange)
function memberlite_get_cedar_spice_colors(): array {
	return array(
		'heading'       => '#1F1B18',  // heading
		'contrast'      => '#1F1B18',  // text
		'base'          => '#FFFFFF',  // background
		'masthead_bg'   => '#2E2623',  // header bg
		'masthead_text' => '#FFFFFF',  // header/masthead text
		'primary'       => '#2E2623',  // primary
		'secondary'     => '#6F6A66',  // secondary
		'action'        => '#D89A5A',  // action/cta
		'border'        => '#6F6A66',  // border
	);
}

// Fresh Spruce (Green/Grey)
function memberlite_get_fresh_spruce_colors(): array {
	return array(
		'heading'       => '#2B2E2D',  // heading
		'contrast'      => '#2B2E2D',  // text
		'base'          => '#FFFFFF',  // background
		'masthead_bg'   => '#1DBF73',  // header bg
		'masthead_text' => '#FFFFFF',  // header/masthead text
		'primary'       => '#1DBF73',  // primary
		'secondary'     => '#7A7F7C',  // secondary
		'action'        => '#1DBF73',  // action/cta (not provided; defaulting to primary)
		'border'        => '#F5F6F6',  // soft accent
	);
}

// Iron Ember (Rust/Grey)
function memberlite_get_iron_ember_colors(): array {
	return array(
		'heading'       => '#1F252B',  // heading
		'contrast'      => '#1F252B',  // text
		'base'          => '#F6F7F6',  // background
		'masthead_bg'   => '#1F252B',  // header bg
		'masthead_text' => '#FFFFFF',  // header/masthead text
		'primary'       => '#1F252B',  // primary
		'secondary'     => '#4A5A6A',  // secondary
		'action'        => '#C84F1A',  // action/cta
		'border'        => '#6E757B',  // soft accent
	);
}

// Slate Harbor (Charcoal/Blue/Rust)
function memberlite_get_slate_harbor_colors(): array {
	return array(
		'heading'       => '#111827',  // heading
		'contrast'      => '#111827',  // text
		'base'          => '#FFFFFF',  // background
		'masthead_bg'   => '#0B1233',  // header bg
		'masthead_text' => '#FFFFFF',  // header/masthead text
		'primary'       => '#0B1233',  // primary
		'secondary'     => '#0F6E7A',  // secondary
		'action'        => '#F26B3A',  // action/cta
		'border'        => '#F4F7FA',  // soft accent
	);
}

/**
 * Legacy color array (16 colors - default 4.6) - for backward compatibility
 *
 * @return string[]
 */
function memberlite_get_legacy_colors(): array {
	return array(
		'background'    => '#FFFFFF',
		'masthead_bg'   => '#FFFFFF',
		'nav_bg'        => '#F9FAFB',
		'nav_text'      => '#444444',
		'body_text'     => '#222222',
		'primary'       => '#011935',
		'primary_hover' => '#011935',
		'secondary'     => '#011935',
		'action'        => '#00A59D',
		'button'        => '#E87102',
		'border'        => '#3C4B5A',
		'masthead_text' => '#011935',
		'footer_bg'     => '#FFFFFF',
		'footer_text'   => '#F9FAFB',
		'delimiter'     => '#444444',
		'color_heading' => '#222222',
	);
}

/**
 * Map new 7-color scheme to full Customizer settings
 *
 * @param array $colors
 *
 * @return array
 */
function memberlite_map_colors_to_settings( array $colors ): array {
	return array(
		// New simplified colors
		'color_text'              => $colors['contrast'],
		'background_color'        => $colors['base'],
		'bgcolor_header'          => $colors['base'],
		'bgcolor_page_masthead'   => $colors['masthead_bg'],
		'color_page_masthead'     => $colors['masthead_text'],
		'color_primary'           => $colors['primary'],
		'color_secondary'         => $colors['secondary'],
		'color_borders'           => $colors['border'],
		'header_textcolor'        => $colors['contrast'],
		'color_heading'           => $colors['contrast'],
		'color_link'              => $colors['primary'],
		'color_meta_link'         => $colors['primary'],
		'color_button'            => $colors['primary'],
		'color_action'            => $colors['primary'],
		'bgcolor_site_navigation' => $colors['base'],
		'color_site_navigation'   => $colors['contrast'],
		'bgcolor_footer_widgets'  => $colors['base'],
		'color_footer_widgets'    => $colors['contrast'],
		'delimiter'               => $colors['border'],
		'color_white'             => '#FFFFFF',
	);
}

/**
 * Map legacy 16-color scheme to full Customizer settings
 *
 * @param array $colors
 *
 * @return array
 */
function memberlite_map_legacy_colors_to_settings( array $colors ): array {
	return array(
		'background_color'        => $colors['background'],
		'bgcolor_header'          => $colors['background'],
		'bgcolor_site_navigation' => $colors['nav_bg'],
		'color_site_navigation'   => $colors['nav_text'],
		'color_link'              => $colors['primary'],
		'color_meta_link'         => $colors['primary'],
		'color_primary'           => $colors['primary'],
		'color_secondary'         => $colors['secondary'],
		'color_action'            => $colors['action'],
		'color_button'            => $colors['button'],
		'bgcolor_page_masthead'   => $colors['masthead_bg'],
		'color_page_masthead'     => $colors['masthead_text'],
		'bgcolor_footer_widgets'  => $colors['footer_bg'],
		'color_footer_widgets'    => $colors['footer_text'],
		'delimiter'               => $colors['delimiter'],
		'color_white'             => '#FFFFFF',
		'color_text'              => $colors['body_text'],
		'color_borders'           => $colors['border'],
		'color_heading'           => $colors['color_heading'],
	);
}

/**
 * Get default theme settings (6.6.2+ with new 7-color scheme)
 *
 * @return array
 */
function memberlite_get_defaults(): array {
	$colors         = memberlite_get_colors();
	$color_settings = memberlite_map_colors_to_settings( $colors );

	$defaults = array_merge(
		array(
			'memberlite_webfonts'               => 'Lato_Lato',
			'memberlite_header_font'            => 'Lato',
			'memberlite_body_font'              => 'Lato',
			'columns_ratio'                     => '8-4',
			'columns_ratio_header'              => '4-8',
			'sidebar_location'                  => 'sidebar-right',
			'sidebar_location_blog'             => 'sidebar-blog-right',
			'content_archives'                  => 'content',
			'memberlite_loop_images'            => 'show_none',
			'posts_entry_meta_before'           => __( 'Posted on {post_date} by {post_author_posts_link}', 'memberlite' ),
			'posts_entry_meta_after'            => __( 'This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite' ),
			'author_block'                      => false,
			'memberlite_footerwidgets'          => '4',
			'copyright_textbox'                 => '&copy; !!current_year!! !!site_title!!',
			'memberlite_back_to_top'            => true,
			'memberlite_variation_color_scheme' => 'default_2026',
			'memberlite_darkcss'                => false,
			'hover_brightness'                  => '1.1',
		),
		$color_settings
	);

	return apply_filters( 'memberlite_variation_defaults', $defaults );
}

/**
 * Get legacy default settings (pre-6.6.2 with 16-color scheme)
 *
 * @return array
 */
function memberlite_get_defaults_legacy(): array {
	$colors         = memberlite_get_legacy_colors();
	$color_settings = memberlite_map_legacy_colors_to_settings( $colors );

	$defaults = array_merge(
		array(
			'memberlite_webfonts'      => 'Lato_Lato',
			'memberlite_header_font'   => 'Lato',
			'memberlite_body_font'     => 'Lato',
			'columns_ratio'            => '8-4',
			'columns_ratio_header'     => '4-8',
			'sidebar_location'         => 'sidebar-right',
			'sidebar_location_blog'    => 'sidebar-blog-right',
			'content_archives'         => 'content',
			'memberlite_loop_images'   => 'show_none',
			'posts_entry_meta_before'  => __( 'Posted on {post_date} by {post_author_posts_link}', 'memberlite' ),
			'posts_entry_meta_after'   => __( 'This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite' ),
			'author_block'             => false,
			'memberlite_footerwidgets' => '4',
			'copyright_textbox'        => '&copy; !!current_year!! !!site_title!!',
			'memberlite_back_to_top'   => true,
			'memberlite_color_scheme'  => 'default_v4.6',
			'memberlite_darkcss'       => false,
			'hover_brightness'         => '1.1',
		),
		$color_settings
	);

	return apply_filters( 'memberlite_defaults', $defaults );
}

/**
 * New color schemes (6.6.2+) - 7 colors each
 *
 * @return array
 */
function memberlite_get_color_schemes(): array {
	$schemes = array(
		'default_2026'    => array(
			'label'  => __( 'Default', 'memberlite' ),
			'colors' => memberlite_get_colors(),
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

	// Loop through and format colors as array for theme.json
	foreach ( $schemes as $scheme ) {
		$scheme['colors'] = memberlite_format_scheme_colors( $scheme['colors'] );
	}

	return apply_filters( 'memberlite_variation_color_schemes', $schemes );
}

/**
 * Format color schemes for theme.json
 *
 * @param array $color_defs
 *
 * @return array
 */
function memberlite_format_scheme_colors( array $color_defs ): array {
	return array(
		$color_defs['contrast'],
		$color_defs['base'],
		$color_defs['masthead_bg'],
		$color_defs['masthead_text'],
		$color_defs['primary'],
		$color_defs['secondary'],
		$color_defs['border'],
	);
}

/**
 * Color schemes from Memberlite versions up to 6.6.1 w/ 16 colors each for backward compatibility
 *
 * @return array<string, array<string, mixed>>
 */
function memberlite_get_legacy_color_schemes(): array {
	$legacy_colors = memberlite_get_legacy_colors();

	$schemes = array(
		'default_v4.6'   => array(
			'label'  => __( 'Default V4.6 (Legacy)', 'memberlite' ),
			'colors' => array(
				$legacy_colors['color_heading'],
				$legacy_colors['background'],
				$legacy_colors['masthead_bg'],
				$legacy_colors['nav_bg'],
				$legacy_colors['nav_text'],
				$legacy_colors['body_text'],
				$legacy_colors['primary'],
				$legacy_colors['primary_hover'],
				$legacy_colors['secondary'],
				$legacy_colors['action'],
				$legacy_colors['button'],
				$legacy_colors['border'],
				$legacy_colors['masthead_text'],
				$legacy_colors['footer_bg'],
				$legacy_colors['footer_text'],
				$legacy_colors['delimiter'],
			),
		),
		'default'        => array(
			'label'  => __( 'Default (Legacy)', 'memberlite' ),
			'colors' => array(
				'#2C3E50', // 1. Heading Text Color
				'#FFFFFF', // 2. Background Color
				'#FFFFFF', // 3. Masthead Background Color
				'#FAFAFA', // 4. Site Navigation Background Color
				'#777777', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#2C3E50', // 7. Primary Color
				'#2C3E50', // 8. Primary Color Hover
				'#2C3E50', // 9. Secondary Color
				'#18BC9C', // 10. Action Color
				'#F39C12', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#2C3E50', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#2C3E50', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'education'      => array(
			'label'  => __( 'Education (Legacy)', 'memberlite' ),
			'colors' => array(
				'#3A9AD9', // 1. Heading Text Color
				'#F4EFEA', // 2. Background Color
				'#F4EFEA', // 3. Masthead Background Color
				'#E2DED9', // 4. Site Navigation Background Color
				'#354458', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#3A9AD9', // 7. Primary Color
				'#3A9AD9', // 8. Primary Color Hover
				'#354458', // 9. Secondary Color
				'#EB7260', // 10. Action Color
				'#29ABA4', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#354458', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#354458', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'modern_teal'    => array(
			'label'  => __( 'Modern Teal (Legacy)', 'memberlite' ),
			'colors' => array(
				'#424242', // 1. Heading Text Color
				'#EFEFEF', // 2. Background Color
				'#EFEFEF', // 3. Masthead Background Color
				'#424242', // 4. Site Navigation Background Color
				'#EFEFEF', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#00CCD6', // 7. Primary Color
				'#00CCD6', // 8. Primary Color Hover
				'#00CCD6', // 9. Secondary Color
				'#424242', // 10. Action Color
				'#FFD900', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#00CCD6', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#00CCD6', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'mono_blue'      => array(
			'label'  => __( 'Mono Blue (Legacy)', 'memberlite' ),
			'colors' => array(
				'#00AEEF', // 1. Heading Text Color
				'#FFFFFF', // 2. Background Color
				'#FFFFFF', // 3. Masthead Background Color
				'#00AEEF', // 4. Site Navigation Background Color
				'#FFFFFF', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#00AEEF', // 7. Primary Color
				'#00AEEF', // 8. Primary Color Hover
				'#333333', // 9. Secondary Color
				'#555555', // 10. Action Color
				'#00AEEF', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#333333', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#333333', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'mono_green'     => array(
			'label'  => __( 'Mono Green (Legacy)', 'memberlite' ),
			'colors' => array(
				'#00A651', // 1. Heading Text Color
				'#FFFFFF', // 2. Background Color
				'#FFFFFF', // 3. Masthead Background Color
				'#00A651', // 4. Site Navigation Background Color
				'#FFFFFF', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#00A651', // 7. Primary Color
				'#00A651', // 8. Primary Color Hover
				'#333333', // 9. Secondary Color
				'#555555', // 10. Action Color
				'#00A651', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#333333', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#333333', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'mono_orange'    => array(
			'label'  => __( 'Mono Orange (Legacy)', 'memberlite' ),
			'colors' => array(
				'#F39C12', // 1. Heading Text Color
				'#FFFFFF', // 2. Background Color
				'#FFFFFF', // 3. Masthead Background Color
				'#F39C12', // 4. Site Navigation Background Color
				'#FFFFFF', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#F39C12', // 7. Primary Color
				'#F39C12', // 8. Primary Color Hover
				'#333333', // 9. Secondary Color
				'#555555', // 10. Action Color
				'#F39C12', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#333333', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#333333', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'mono_pink'      => array(
			'label'  => __( 'Mono Pink (Legacy)', 'memberlite' ),
			'colors' => array(
				'#ED0977', // 1. Heading Text Color
				'#FFFFFF', // 2. Background Color
				'#FFFFFF', // 3. Masthead Background Color
				'#ED0977', // 4. Site Navigation Background Color
				'#FFFFFF', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#ED0977', // 7. Primary Color
				'#ED0977', // 8. Primary Color Hover
				'#333333', // 9. Secondary Color
				'#555555', // 10. Action Color
				'#ED0977', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#333333', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#333333', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'pop'            => array(
			'label'  => __( 'Pop! (Legacy)', 'memberlite' ),
			'colors' => array(
				'#53BBF4', // 1. Heading Text Color
				'#FFFFFF', // 2. Background Color
				'#FFFFFF', // 3. Masthead Background Color
				'#B1EB00', // 4. Site Navigation Background Color
				'#666666', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#B1EB00', // 7. Primary Color
				'#B1EB00', // 8. Primary Color Hover
				'#53BBF4', // 9. Secondary Color
				'#FFAC00', // 10. Action Color
				'#FF85CB', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#53BBF4', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#53BBF4', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'primary'        => array(
			'label'  => __( 'Not So Primary (Legacy)', 'memberlite' ),
			'colors' => array(
				'#1352A2', // 1. Heading Text Color
				'#F0F1EE', // 2. Background Color
				'#F0F1EE', // 3. Masthead Background Color
				'#FFFFFF', // 4. Site Navigation Background Color
				'#555555', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#FB6964', // 7. Primary Color
				'#FB6964', // 8. Primary Color Hover
				'#1352A2', // 9. Secondary Color
				'#FB6964', // 10. Action Color
				'#FFD464', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#1352A2', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#1352A2', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'raspberry_lime' => array(
			'label'  => __( 'Raspberry Lime (Legacy)', 'memberlite' ),
			'colors' => array(
				'#AA2159', // 1. Heading Text Color
				'#FFFFFF', // 2. Background Color
				'#FFFFFF', // 3. Masthead Background Color
				'#700035', // 4. Site Navigation Background Color
				'#EFEFEF', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#009D97', // 7. Primary Color
				'#AA2159', // 8. Primary Color Hover
				'#AA2159', // 9. Secondary Color
				'#009D97', // 10. Action Color
				'#BCC747', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#AA2159', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#AA2159', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'slate_blue'     => array(
			'label'  => __( 'Slate Blue (Legacy)', 'memberlite' ),
			'colors' => array(
				'#6991AC', // 1. Heading Text Color
				'#F5F5F5', // 2. Background Color
				'#F5F5F5', // 3. Masthead Background Color
				'#FFFFFF', // 4. Site Navigation Background Color
				'#67727A', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#6991AC', // 7. Primary Color
				'#6991AC', // 8. Primary Color Hover
				'#67727A', // 9. Secondary Color
				'#6991AC', // 10. Action Color
				'#D75C37', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#67727A', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#67727A', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
		'watermelon'     => array(
			'label'  => __( 'Watermelon Seed (Legacy)', 'memberlite' ),
			'colors' => array(
				'#363635', // 1. Heading Text Color
				'#F9F9F7', // 2. Background Color
				'#F9F9F7', // 3. Masthead Background Color
				'#363635', // 4. Site Navigation Background Color
				'#FFFFFF', // 5. Site Navigation Text Color
				'#222222', // 6. Body Text Color
				'#83BF17', // 7. Primary Color
				'#83BF17', // 8. Primary Color Hover
				'#83BF17', // 9. Secondary Color
				'#363635', // 10. Action Color
				'#F15D58', // 11. Button Color
				'#798D8F', // 12. Border Color
				'#83BF17', // 13. Masthead Text Color
				'#FFFFFF', // 14. Footer Widgets Background Color
				'#83BF17', // 15. Footer Widgets Text Color
				'#FFFFFF', // 16. Delimiter Color
			),
		),
	);

	return apply_filters( 'memberlite_color_schemes', $schemes );
}


/**
 * Used to fetch active default colors based on the selected color scheme
 *
 * @return array
 */
function memberlite_get_active_colors() {
	global $memberlite_defaults;

	$variation_scheme = get_theme_mod( 'memberlite_variation_color_scheme', 'default_2026' );

	// Check if it's a legacy scheme (by checking if it exists in legacy schemes)
	$legacy_schemes = memberlite_get_legacy_color_schemes();
	if ( isset( $legacy_schemes[ $variation_scheme ] ) ) {
		// It's a legacy scheme - use legacy color mapping
		$colors = $legacy_schemes[ $variation_scheme ]['colors'];
		var_dump( $colors );

		return array(
			'color_heading'           => $colors[5],
			'background_color'        => $colors[1],
			'bgcolor_header'          => $colors[2],
			'bgcolor_site_navigation' => $colors[3],
			'color_site_navigation'   => $colors[4],
			'color_text'              => $colors[5],
			'color_link'              => isset( $colors[6] ) ? $colors[6] : $colors[5],
			'color_meta_link'         => isset( $colors[7] ) ? $colors[7] : $colors[6],
			'color_primary'           => isset( $colors[8] ) ? $colors[8] : $colors[0],
			'color_secondary'         => isset( $colors[9] ) ? $colors[9] : $colors[0],
			'color_action'            => isset( $colors[10] ) ? $colors[10] : $colors[8],
			'color_button'            => isset( $colors[11] ) ? $colors[11] : $colors[8],
			'color_borders'           => isset( $colors[12] ) ? $colors[12] : '#cccccc',
			'bgcolor_page_masthead'   => isset( $colors[13] ) ? $colors[13] : $colors[0],
			'color_page_masthead'     => isset( $colors[14] ) ? $colors[14] : $colors[1],
			'bgcolor_footer_widgets'  => isset( $colors[15] ) ? $colors[15] : $colors[1],
			'color_footer_widgets'    => isset( $colors[16] ) ? $colors[16] : $colors[5],
			'header_textcolor'        => $colors[5],
		);
	}

	// Check if it's a new variation scheme
	$new_schemes = memberlite_get_color_schemes();

	if ( isset( $new_schemes[ $variation_scheme ] ) ) {
		// It's a new scheme - use new color mapping
		// Build the function name dynamically
		if ( $variation_scheme === 'default_2026' ) {
			$color_array = memberlite_get_colors();
		} else {
			// Dynamically call the appropriate function: memberlite_get_{scheme}_colors()
			$function_name = 'memberlite_get_' . $variation_scheme . '_colors';
			if ( function_exists( $function_name ) ) {
				$color_array = call_user_func( $function_name );
			} else {
				// Fallback to default if function doesn't exist
				$color_array = memberlite_get_colors();
			}
		}

		return memberlite_map_colors_to_settings( $color_array );
	}

	// Custom mode - get individual saved colors
	$colors     = array();
	$color_keys = array(
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
		'color_heading',
		'header_textcolor',
	);

	foreach ( $color_keys as $key ) {
		$value          = get_theme_mod( $key );
		$colors[ $key ] = ! empty( $value ) ? $value : ( isset( $memberlite_defaults[ $key ] ) ? $memberlite_defaults[ $key ] : '' );
	}

	return $colors;
}

// Globals
global $memberlite_defaults, $memberlite_color_schemes, $memberlite_legacy_color_schemes, $memberlite_defaults_news, $memberlite_defaults_evergreen;

$memberlite_defaults             = memberlite_get_defaults();
$memberlite_defaults_legacy      = memberlite_get_defaults_legacy();
$memberlite_color_schemes        = memberlite_get_color_schemes();
$memberlite_legacy_color_schemes = memberlite_get_legacy_color_schemes();
