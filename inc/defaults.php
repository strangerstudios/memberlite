<?php
// Fonts for the default preset
$memberlite_fonts = array(
    'webfonts' => 'Lato_Lato',
    'heading' => 'Lato',
    'body' => 'Lato',
);

// Colors for the default preset
$memberlite_colors = array(
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

// Fonts for the news author preset
$memberlite_news_fonts = array(
    'webfonts' => '', //Do we need this for new schemes/variations?
    'heading' => 'Times New Roman',
    'body' => 'Times New Roman',
);

// Colors for the news author preset
$memberlite_news_colors = array(
    'heading'         => '#1A1A1A',
    'background'      => '#FFFFFF',
    'masthead_bg'     => '#FFFFFF',
    'nav_bg'          => '#F9FAFB',
    'nav_text'        => '#444444',
    'body_text'       => '#222222',
    'primary'         => '#011935',
    'primary_hover'   => '#011935',
    'secondary'       => '#00A59D',
    'action'          => '#FF6719',
    'button'          => '#FF6719',
    'border'          => '#E0E0E0',
    'masthead_text'   => '#FFFFFF',
    'footer_bg'       => '#F9FAFB',
    'footer_text'     => '#444444',
    'delimiter'       => '#FFFFFF',
);


function memberlite_get_defaults()
{
    global $memberlite_fonts, $memberlite_colors;
    $defaults = array(
        'memberlite_webfonts'      => $memberlite_fonts['webfonts'],
        'memberlite_header_font'   => $memberlite_fonts['heading'],
        'memberlite_body_font'     => $memberlite_fonts['body'],
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
        'background_color'         => $memberlite_colors['background'],
        'bgcolor_header'           => '',
        'bgcolor_site_navigation'  => $memberlite_colors['nav_bg'],
        'color_site_navigation'    => $memberlite_colors['nav_text'],
        'color_link'               => $memberlite_colors['primary'],
        'color_meta_link'          => $memberlite_colors['primary'],
        'color_primary'            => $memberlite_colors['primary'],
        'color_secondary'          => $memberlite_colors['secondary'],
        'color_action'             => $memberlite_colors['action'],
        'color_button'             => $memberlite_colors['button'],
        'bgcolor_page_masthead'    => $memberlite_colors['heading'],
        'color_page_masthead'      => $memberlite_colors['background'],
        'bgcolor_footer_widgets'   => $memberlite_colors['footer_bg'],
        'color_footer_widgets'     => $memberlite_colors['footer_text'],
        'delimiter'                => $memberlite_colors['delimiter'],
        'hover_brightness'         => '1.1',
        'color_white'              => '#FFFFFF',
        'color_text'               => $memberlite_colors['body_text'],
        'color_borders'            => $memberlite_colors['border'],
        'memberlite_heading_color' => $memberlite_colors['heading'],
    );
    return apply_filters('memberlite_defaults', $defaults);
}

function memberlite_get_defaults_news()
{
    global $memberlite_news_fonts, $memberlite_news_colors;
    $defaults = array(
        'memberlite_webfonts'      => $memberlite_news_fonts['webfonts'],
        'memberlite_header_font'   => $memberlite_news_fonts['heading'],
        'memberlite_body_font'     => $memberlite_news_fonts['body'],
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
        'background_color'         => $memberlite_news_colors['background'],
        'bgcolor_header'           => $memberlite_news_colors['masthead_bg'],
        'bgcolor_site_navigation'  => $memberlite_news_colors['nav_bg'],
        'color_site_navigation'    => $memberlite_news_colors['nav_text'],
        'color_link'               => $memberlite_news_colors['primary'],
        'color_meta_link'          => $memberlite_news_colors['primary'],
        'color_primary'            => $memberlite_news_colors['primary'],
        'color_secondary'          => $memberlite_news_colors['secondary'],
        'color_action'             => $memberlite_news_colors['action'],
        'color_button'             => $memberlite_news_colors['button'],
        'bgcolor_page_masthead'    => $memberlite_news_colors['primary'],
        'color_page_masthead'      => $memberlite_news_colors['masthead_text'],
        'bgcolor_footer_widgets'   => $memberlite_news_colors['footer_bg'],
        'color_footer_widgets'     => $memberlite_news_colors['footer_text'],
        'delimiter'                => $memberlite_news_colors['delimiter'],
        'hover_brightness'         => '1.1',
        'color_white'              => '#FFFFFF',
        'color_text'               => $memberlite_news_colors['body_text'],
        'color_borders'            => $memberlite_news_colors['border'],
        'memberlite_heading_color' => $memberlite_news_colors['heading'],
    );

    return apply_filters('memberlite_defaults_news', $defaults);
}

function memberlite_get_color_schemes()
{
    global $memberlite_colors;
    global $memberlite_news_colors;
    $schemes = array(
        'default_v4.6' => array(
            'label' => __('Default', 'memberlite'),
            'colors' => array(
                $memberlite_colors['heading'],        // 1. Heading Text Color
                $memberlite_colors['background'],     // 2. Background Color
                $memberlite_colors['masthead_bg'],    // 3. Masthead Background Color
                $memberlite_colors['nav_bg'],         // 4. Site Navigation Background Color
                $memberlite_colors['nav_text'],       // 5. Site Navigation Text Color
                $memberlite_colors['body_text'],      // 6. Body Text Color
                $memberlite_colors['primary'],        // 7. Primary Color
                $memberlite_colors['primary_hover'],  // 8. Primary Color Hover
                $memberlite_colors['secondary'],      // 9. Secondary Color
                $memberlite_colors['action'],         // 10. Action Color
                $memberlite_colors['button'],         // 11. Button Color
                $memberlite_colors['border'],         // 12. Border Color
                $memberlite_colors['masthead_text'],  // 13. Masthead Text Color
                $memberlite_colors['footer_bg'],      // 14. Footer Widgets Background Color
                $memberlite_colors['footer_text'],    // 15. Footer Widgets Text Color
                $memberlite_colors['delimiter'],      // 16. Delimiter Color
            ),
        ),
        //News author theme presets (variation)
        'news' => array(
            'label' => __('News Author', 'memberlite'),
            'colors' => array(
                $memberlite_news_colors['heading'],         // 1. Heading Text Color
                $memberlite_news_colors['background'],      // 2. Background Color
                $memberlite_news_colors['masthead_bg'],     // 3. Masthead Background Color
                $memberlite_news_colors['nav_bg'],          // 4. Site Navigation Background Color
                $memberlite_news_colors['nav_text'],        // 5. Site Navigation Text Color
                $memberlite_news_colors['body_text'],       // 6. Body Text Color
                $memberlite_news_colors['primary'],         // 7. Primary Color
                $memberlite_news_colors['primary_hover'],   // 8. Primary Color Hover
                $memberlite_news_colors['secondary'],       // 9. Secondary Color
                $memberlite_news_colors['action'],          // 10. Action Color
                $memberlite_news_colors['button'],          // 11. Button Color
                $memberlite_news_colors['border'],          // 12. Border Color
                $memberlite_news_colors['masthead_text'],   // 13. Masthead Text Color
                $memberlite_news_colors['footer_bg'],       // 14. Footer Widgets Background Color
                $memberlite_news_colors['footer_text'],     // 15. Footer Widgets Text Color
                $memberlite_news_colors['delimiter'],       // 16. Delimiter Color
            ),
        ),
        // Can keep these hardcoded since they'll be "legacy" color schemes, not part of theme variations/presets.
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

// Set global defaults for every theme preset/variation.
global $memberlite_defaults;
$memberlite_defaults = memberlite_get_defaults();

global $memberlite_defaults_news;
$memberlite_defaults_news = memberlite_get_defaults_news();

//Set global color schemes
global $memberlite_color_schemes;
$memberlite_color_schemes = memberlite_get_color_schemes();

