<?php
/**
 * Core color arrays for each scheme
 */
function memberlite_get_colors(): array {
	return array(
		'contrast'     => '#222222',
		'base'         => '#FFFFFF',
		'masthead_bg'  => '#FFFFFF',
		'masthead_text'=> '#011935',
		'primary'      => '#011935',
		'secondary'    => '#011935',
		'border'       => '#3C4B5A',
	);
}

function memberlite_get_news_colors(): array {
	return array(
		'contrast'     => '#222222',
		'base'         => '#FFFFFF',
		'masthead_bg'  => '#e8b500',
		'masthead_text'=> '#FFFFFF',
		'primary'      => '#e8b500',
		'secondary'    => '#868787',
		'border'       => '#e6e6e6',
	);
}

/**
 * Legacy color array (16 colors) - for backward compatibility
 */
function memberlite_get_legacy_colors(): array {
	return array(
		'heading'       => '#011935',
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
	);
}

/**
 * Map new 7-color scheme to full Customizer settings
 * This is the key function that expands the simplified color scheme
 */
function memberlite_map_colors_to_settings(array $colors): array {
	return array(
		// New simplified colors
		'color_text'               => $colors['contrast'],
		'background_color'         => $colors['base'],
		'bgcolor_header'           => $colors['masthead_bg'],
		'color_page_masthead'      => $colors['masthead_text'],
		'color_primary'            => $colors['primary'],
		'color_secondary'          => $colors['secondary'],
		'color_borders'            => $colors['border'],

		// Derived/calculated colors based on the 7 core colors
		'memberlite_heading_color' => $colors['masthead_text'],
		'color_link'               => $colors['primary'],
		'color_meta_link'          => $colors['primary'],
		'color_button'             => $colors['primary'],
		'color_action'             => $colors['primary'],
		'bgcolor_page_masthead'    => $colors['primary'],

		// Navigation - derive from masthead or set sensible defaults
		'bgcolor_site_navigation'  => $colors['base'], // or derive
		'color_site_navigation'    => $colors['contrast'],

		// Footer - derive from base colors
		'bgcolor_footer_widgets'   => $colors['base'],
		'color_footer_widgets'     => $colors['contrast'],

		// Other elements
		'delimiter'                => $colors['border'],
		'color_white'              => '#FFFFFF',
	);
}

/**
 * Map legacy 16-color scheme to full Customizer settings
 */
function memberlite_map_legacy_colors_to_settings(array $colors): array {
	return array(
		'background_color'         => $colors['background'],
		'bgcolor_header'           => $colors['masthead_bg'],
		'bgcolor_site_navigation'  => $colors['nav_bg'],
		'color_site_navigation'    => $colors['nav_text'],
		'color_link'               => $colors['primary'],
		'color_meta_link'          => $colors['primary'],
		'color_primary'            => $colors['primary'],
		'color_secondary'          => $colors['secondary'],
		'color_action'             => $colors['action'],
		'color_button'             => $colors['button'],
		'bgcolor_page_masthead'    => $colors['heading'],
		'color_page_masthead'      => $colors['background'],
		'bgcolor_footer_widgets'   => $colors['footer_bg'],
		'color_footer_widgets'     => $colors['footer_text'],
		'delimiter'                => $colors['delimiter'],
		'color_white'              => '#FFFFFF',
		'color_text'               => $colors['body_text'],
		'color_borders'            => $colors['border'],
		'memberlite_heading_color' => $colors['heading'],
	);
}

/**
 * Get default theme settings (4.7+ with new 7-color scheme)
 */
function memberlite_get_defaults(): array {
	$colors = memberlite_get_colors();
	$color_settings = memberlite_map_colors_to_settings($colors);

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
			'posts_entry_meta_before'  => __('Posted on {post_date} by {post_author_posts_link}', 'memberlite'),
			'posts_entry_meta_after'   => __('This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite'),
			'author_block'             => false,
			'memberlite_footerwidgets' => '4',
			'copyright_textbox'        => '&copy; !!current_year!! !!site_title!!',
			'memberlite_back_to_top'   => true,
			'memberlite_color_scheme'  => 'default_2026',
			'memberlite_darkcss'       => false,
			'hover_brightness'         => '1.1',
		),
		$color_settings
	);

	return apply_filters('memberlite_variation_defaults', $defaults);
}

/**
 * Get News Author theme variation settings (4.7+ with new 7-color scheme)
 */
function memberlite_get_defaults_news(): array {
	$colors = memberlite_get_news_colors();
	$color_settings = memberlite_map_colors_to_settings($colors);

	$defaults = array_merge(
		array(
			'memberlite_webfonts'      => 'Roboto',
			'memberlite_header_font'   => 'Roboto',
			'memberlite_body_font'     => 'Roboto',
			'columns_ratio'            => '8-4',
			'columns_ratio_header'     => '4-8',
			'sidebar_location'         => 'sidebar-right',
			'sidebar_location_blog'    => 'sidebar-none',
			'content_archives'         => 'excerpt',
			'memberlite_loop_images'   => 'show_none',
			'posts_entry_meta_before'  => __('{post_author_posts_link} &#13; {post_date}', 'memberlite'),
			'posts_entry_meta_after'   => __('This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite'),
			'author_block'             => false,
			'memberlite_footerwidgets' => '1',
			'copyright_textbox'        => '&copy; !!current_year!! !!site_title!!',
			'memberlite_back_to_top'   => true,
			'memberlite_color_scheme'  => 'news',
			'memberlite_darkcss'       => false,
			'hover_brightness'         => '1.1',
		),
		$color_settings
	);

	return apply_filters('memberlite_defaults_news', $defaults);
}

/**
 * Get legacy default settings (pre-4.7 with 16-color scheme)
 * Used when 'default_v4.6' legacy scheme is selected
 */
function memberlite_get_defaults_legacy(): array {
	$colors = memberlite_get_legacy_colors();
	$color_settings = memberlite_map_legacy_colors_to_settings($colors);

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
			'posts_entry_meta_before'  => __('Posted on {post_date} by {post_author_posts_link}', 'memberlite'),
			'posts_entry_meta_after'   => __('This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite'),
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

	return apply_filters('memberlite_defaults', $defaults);
}

/**
 * New color schemes (4.7+) - 7 colors each
 */
function memberlite_get_color_schemes(): array {
	$colors = memberlite_get_colors();
	$news_colors = memberlite_get_news_colors();

	$schemes = array(
		'default_2026' => array(
			'label' => __('Default', 'memberlite'),
			'colors' => array(
				$colors['contrast'],
				$colors['base'],
				$colors['masthead_bg'],
				$colors['masthead_text'],
				$colors['primary'],
				$colors['secondary'],
				$colors['border'],
			),
		),
		'news' => array(
			'label' => __('News Author', 'memberlite'),
			'colors' => array(
				$news_colors['contrast'],
				$news_colors['base'],
				$news_colors['masthead_bg'],
				$news_colors['masthead_text'],
				$news_colors['primary'],
				$news_colors['secondary'],
				$news_colors['border'],
			),
		),
	);

	return apply_filters('memberlite_variation_color_schemes', $schemes);
}

/**
 * Color schemes from Memberlite versions up to 4.6 w/ 16 colors each for backward compatibility
 *
 * @return array<string, array<string, mixed>>
 */
function memberlite_get_legacy_color_schemes(): array {
	$legacy_colors = memberlite_get_legacy_colors();
	$schemes = array(
		'default_v4.6' => array(
			'label' => __('Default V4.6', 'memberlite'),
			'colors' => array(
				$legacy_colors['heading'],
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
		'default' => array(
			'label' => __('Default (Legacy)', 'memberlite'),
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
		'education' => array(
			'label' => __('Education (Legacy)', 'memberlite'),
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
		'modern_teal' => array(
			'label' => __('Modern Teal (Legacy)', 'memberlite'),
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
		'mono_blue' => array(
			'label' => __('Mono Blue (Legacy)', 'memberlite'),
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
		'mono_green' => array(
			'label' => __('Mono Green (Legacy)', 'memberlite'),
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
		'mono_orange' => array(
			'label' => __('Mono Orange (Legacy)', 'memberlite'),
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
		'mono_pink' => array(
			'label' => __('Mono Pink (Legacy)', 'memberlite'),
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
		'pop' => array(
			'label' => __('Pop! (Legacy)', 'memberlite'),
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
		'primary' => array(
			'label' => __('Not So Primary (Legacy)', 'memberlite'),
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
			'label' => __('Raspberry Lime (Legacy)', 'memberlite'),
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
		'slate_blue' => array(
			'label' => __('Slate Blue (Legacy)', 'memberlite'),
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
		'watermelon' => array(
			'label' => __('Watermelon Seed (Legacy)', 'memberlite'),
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

	return apply_filters('memberlite_color_schemes', $schemes);
}

// Globals
global $memberlite_defaults, $memberlite_defaults_news, $memberlite_defaults_legacy;
global $memberlite_color_schemes, $memberlite_legacy_color_schemes;

$memberlite_defaults = memberlite_get_defaults();
$memberlite_defaults_news = memberlite_get_defaults_news();
$memberlite_defaults_legacy = memberlite_get_defaults_legacy();
$memberlite_color_schemes = memberlite_get_color_schemes();
$memberlite_legacy_color_schemes = memberlite_get_legacy_color_schemes();
