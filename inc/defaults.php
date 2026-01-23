<?php
/**
 * Define color array functions
 *
 * @return array<string, string>
 */
function memberlite_get_colors(): array {
	return array(
		'heading' => '#011935',
		'background' => '#FFFFFF',
		'masthead_bg' => '#FFFFFF',
		'nav_bg' => '#F9FAFB',
		'nav_text' => '#444444',
		'body_text' => '#222222',
		'primary' => '#011935',
		'primary_hover' => '#011935',
		'secondary' => '#011935',
		'action' => '#00A59D',
		'button' => '#E87102',
		'border' => '#3C4B5A',
		'masthead_text' => '#011935',
		'footer_bg' => '#FFFFFF',
		'footer_text' => '#F9FAFB',
		'delimiter' => '#444444',
	);
}

/**
 * Define News Author color array
 *
 * @return array<string, string>
 */
function memberlite_get_news_colors(): array {
	return array(
		'heading'         => '#1A1A1A',
		'background'      => '#FFFFFF', //base
		'masthead_bg'     => '#FFFFFF',
		'nav_bg'          => '#F9FAFB',
		'nav_text'        => '#444444',
		'body_text'       => '#222222', //contrast
		'primary'         => '#011935',
		'primary_hover'   => '#011935',
		'secondary'       => '#00A59D',
		'action'          => '#FF6719', //accent
		'button'          => '#FF6719',
		'border'          => '#E0E0E0',
		'masthead_text'   => '#FFFFFF',
		'footer_bg'       => '#F9FAFB',
		'footer_text'     => '#444444',
		'delimiter'       => '#FFFFFF',
	);
}

/**
 * Get default theme settings
 *
 * @return array<string, mixed>
 */
function memberlite_get_defaults(): array
{
	$colors = memberlite_get_colors();

	$defaults = array(
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
		'memberlite_color_scheme'  => 'Default',
		'memberlite_darkcss'       => false,
		'background_color'         => $colors['background'],
		'bgcolor_header'           => '',
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
		'hover_brightness'         => '1.1',
		'color_white'              => '#FFFFFF',
		'color_text'               => $colors['body_text'],
		'color_borders'            => $colors['border'],
		'memberlite_heading_color' => $colors['heading'],
	);
	return apply_filters('memberlite_defaults', $defaults);
}

/**
 * Get News Author theme variation settings
 *
 * @return array<string, mixed>
 */
function memberlite_get_defaults_news(): array
{
	$colors = memberlite_get_news_colors();

	$defaults = array(
		'memberlite_webfonts'      => '',
		'memberlite_header_font'   => 'Times New Roman',
		'memberlite_body_font'     => 'Times New Roman',
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
		'memberlite_color_scheme'  => 'News',
		'memberlite_darkcss'       => false,
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
		'bgcolor_page_masthead'    => $colors['primary'],
		'color_page_masthead'      => $colors['masthead_text'],
		'bgcolor_footer_widgets'   => $colors['footer_bg'],
		'color_footer_widgets'     => $colors['footer_text'],
		'delimiter'                => $colors['delimiter'],
		'hover_brightness'         => '1.1',
		'color_white'              => '#FFFFFF',
		'color_text'               => $colors['body_text'],
		'color_borders'            => $colors['border'],
		'memberlite_heading_color' => $colors['heading'],
	);

	return apply_filters('memberlite_defaults_news', $defaults);
}

/**
 * Color schemes from Memberlite versions prior to 4.6
 *
 * @return array<string, array<string, mixed>>
 */
function memberlite_get_legacy_color_schemes(): array {
	return array(
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
}

/**
 * Default Memberlite and Theme Variation Color Schemes
 *
 * @return array<string, array<string, mixed>>
 */
function memberlite_get_color_schemes(): array
{
	$colors = memberlite_get_colors();
	$news_colors = memberlite_get_news_colors();

	// Define new/current color schemes
	$schemes = array(
		'default_v4.6' => array(
			'label' => __('Default', 'memberlite'),
			'colors' => array(
				$colors['heading'],        // 1. Heading Text Color
				$colors['background'],     // 2. Background Color
				$colors['masthead_bg'],    // 3. Masthead Background Color
				$colors['nav_bg'],         // 4. Site Navigation Background Color
				$colors['nav_text'],       // 5. Site Navigation Text Color
				$colors['body_text'],      // 6. Body Text Color
				$colors['primary'],        // 7. Primary Color
				$colors['primary_hover'],  // 8. Primary Color Hover
				$colors['secondary'],      // 9. Secondary Color
				$colors['action'],         // 10. Action Color
				$colors['button'],         // 11. Button Color
				$colors['border'],         // 12. Border Color
				$colors['masthead_text'],  // 13. Masthead Text Color
				$colors['footer_bg'],      // 14. Footer Widgets Background Color
				$colors['footer_text'],    // 15. Footer Widgets Text Color
				$colors['delimiter'],      // 16. Delimiter Color
			),
		),
		'news' => array(
			'label' => __('News Author', 'memberlite'),
			'colors' => array(
				$news_colors['heading'],         // 1. Heading Text Color
				$news_colors['background'],      // 2. Background Color
				$news_colors['masthead_bg'],     // 3. Masthead Background Color
				$news_colors['nav_bg'],          // 4. Site Navigation Background Color
				$news_colors['nav_text'],        // 5. Site Navigation Text Color
				$news_colors['body_text'],       // 6. Body Text Color
				$news_colors['primary'],         // 7. Primary Color
				$news_colors['primary_hover'],   // 8. Primary Color Hover
				$news_colors['secondary'],       // 9. Secondary Color
				$news_colors['action'],          // 10. Action Color
				$news_colors['button'],          // 11. Button Color
				$news_colors['border'],          // 12. Border Color
				$news_colors['masthead_text'],   // 13. Masthead Text Color
				$news_colors['footer_bg'],       // 14. Footer Widgets Background Color
				$news_colors['footer_text'],     // 15. Footer Widgets Text Color
				$news_colors['delimiter'],       // 16. Delimiter Color
			),
		),
	);

	// Merge with legacy schemes
	$legacy_schemes = memberlite_get_legacy_color_schemes();
	$schemes = array_merge($schemes, $legacy_schemes);

	return apply_filters('memberlite_color_schemes', $schemes);
}

// For the Default Memberlite Colors
global $memberlite_colors;
$memberlite_colors = memberlite_get_colors();

// Colors for Theme Variation "News Author"
global $memberlite_news_colors;
$memberlite_news_colors = memberlite_get_news_colors();

// Presets for Default Theme Variation
global $memberlite_defaults;
$memberlite_defaults = memberlite_get_defaults();

// Presets for "News Author" Theme Variation
global $memberlite_defaults_news;
$memberlite_defaults_news = memberlite_get_defaults_news();

// Available Color Schemes
global $memberlite_color_schemes;
$memberlite_color_schemes = memberlite_get_color_schemes();
