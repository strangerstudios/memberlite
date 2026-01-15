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


function memberlite_get_defaults()
{
    global $default_fonts, $default_colors;
    $defaults = array(
        'memberlite_webfonts' => 'Lato_Lato', // Unused property for backwards compatibility
        'memberlite_header_font' => 'Lato', //heading
        'memberlite_body_font' => 'Lato',
        'columns_ratio' => '8-4',
        'columns_ratio_header' => '4-8',
        'sidebar_location' => 'sidebar-right',
        'sidebar_location_blog' => 'sidebar-blog-right',
        'content_archives' => 'content',
        'memberlite_loop_images' => 'show_none',
        'posts_entry_meta_before' => __('Posted on {post_date} by {post_author_posts_link}', 'memberlite'),
        'posts_entry_meta_after' => __('This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite'),
        'author_block' => false,
        'memberlite_footerwidgets' => '4',
        'copyright_textbox' => '&copy; !!current_year!! !!site_title!!',
        'memberlite_back_to_top' => true,
        'memberlite_color_scheme' => 'Default',
        'memberlite_darkcss' => false,
        'background_color' => '#FFFFFF',
        'bgcolor_header' => '',
        'bgcolor_site_navigation' => '#F9FAFB',
        'color_site_navigation' => '#444444',
        'color_link' => '#011935',
        'color_meta_link' => '#011935',
        'color_primary' => '#011935',
        'color_secondary' => '#00A59D',
        'color_action' => '#E87102',
        'color_button' => '#3C4B5A',
        'bgcolor_page_masthead' => '#011935',
        'color_page_masthead' => '#FFFFFF',
        'bgcolor_footer_widgets' => '#F9FAFB',
        'color_footer_widgets' => '#444444',
        'bgcolor_header_elements' => '#masthead',
        'bgcolor_site_navigation_elements' => '#site-navigation, .main-navigation ul.sub-menu',
        'color_site_navigation_elements' => '.main-navigation a',
        'color_site_navigation_hover_elements' => '.main-navigation li:hover, .main-navigation li:hover > a',
        'color_link_color_elements' => '.content-area a:link:not(.wp-block-button__link), .content-area a:link:not(.btn), .content-area a:link:not(.comment-reply-link), .footer-navigation a, .site-info a',
        'color_meta_link_color_elements' => '.header-right .menu a',
        'color_primary_background_elements' => '#mobile-navigation, #mobile-navigation-height-col, .masthead, .footer-widgets, .btn_primary, .btn_primary:link, .menu-toggle, .bg_primary, .banner_primary, .has-color-primary-background-color',
        'color_primary_background_hover_elements' => '.btn_primary:hover',
        'color_primary_color_elements' => '#pmpro_levels .post h2, .pmpro_signup_form h2, .primary, .has-text-color.has-color-primary-color',
        'color_secondary_background_elements' => '.header-right #meta-member .meta-member-inner, #meta-member .member-navigation .sub-menu, .btn_secondary, .btn_secondary:link, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a:hover, .banner_secondary, #banner_bottom, .has-color-secondary-background-color',
        'color_secondary_background_hover_elements' => '.btn_secondary:hover',
        'color_secondary_border_elements' => '#pmpro_levels .pmpro_level-highlight, #pmpro_levels.pmpro_levels-2col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-3col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-4col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-div .pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table thead tr:first-child th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot tr:last-child td.pmpro_level-highlight, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a, .memberlite_tabbable .memberlite_tab_content',
        'color_secondary_border_left_elements' => '#pmpro_levels.pmpro_advanced_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-table .pmpro_level-highlight td:first-child, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a',
        'color_secondary_border_right_elements' => '#pmpro_levels.pmpro_advanced_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-table .pmpro_level-highlight td:last-child, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a',
        'color_secondary_color_elements' => 'blockquote.quote:before, q:before, .testimonials-widget-testimonial .open-quote::before, .testimonials-widget-testimonial .close-quote::after, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price, .secondary, .has-text-color.has-color-secondary-color',
        'color_action_background_elements' => '.btn_action, .btn_action:link, .pmpro_content_message a, .pmpro_content_message a:link, .pmpro_content_message a:visited, .pmpro_btn, .pmpro_btn:link, .pmpro_btn:visited, a.pmpro_btn, a.pmpro_btn:link, a.pmpro_btn:visited, input[type=button].pmpro_btn, input[type=submit].pmpro_btn, #loginform input[type=submit].button.button-primary, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .bg_action, .banner_action, .has-color-action-background-color',
        'color_action_background_hover_elements' => '.btn_action:hover, .pmpro_content_message a:hover, .pmpro_btn:hover, a.pmpro_btn:hover, input[type=button].pmpro_btn:hover, input[type=submit].pmpro_btn:hover, .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover',
        'color_action_color_elements' => '.action, .has-text-color.has-color-action-color',
        'color_button_background_elements' => 'button, input[type=button], input[type=reset], input[type=submit],.btn,.btn:link, a.comment-reply-link, a.comment-reply-link:link, #main div.em-search-main button.em-search-submit',
        'color_button_background_hover_elements' => 'button:hover, input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover, button:focus, input[type=button]:focus, input[type=reset]:focus, input[type=submit]:focus, button:active, input[type=button]:active, input[type=reset]:active, input[type=submit]:active,.btn:hover,.btn:active,.btn:focus, #main div.em-search-main button.em-search-submit:hover',
        'bgcolor_page_masthead_elements' => '.masthead',
        'color_page_masthead_elements' => '.masthead, .masthead h1 a, .masthead h2 a, .masthead h3 a, .masthead p a:not(.btn), .memberlite-breadcrumb, .masthead .memberlite-breadcrumb a',
        'bgcolor_footer_widgets_elements' => '.footer-widgets',
        'color_footer_widgets_elements' => '.footer-widgets, .footer-widgets a, .footer-widgets a:hover',
        'delimiter' => '&nbsp;&#47;&nbsp;',
        'memberlite_darkcss' => false,
        'hover_brightness' => '1.1',
        'color_white' => '#FFFFFF',
        'color_text' => '#222222',
        'color_borders' => '#03543F21',
        'memberlite_heading_color' => '#222222', //added new
    );
    return apply_filters('memberlite_defaults', $defaults);
}

function memberlite_get_defaults_news()
{
    global $default_fonts, $default_colors;
    $defaults = array(
        'memberlite_webfonts' => '', // Unused property for backwards compatibility
        'memberlite_header_font' => 'Times New Roman', //heading
        'memberlite_body_font' => 'Times New Roman',
        'columns_ratio' => '8-4',
        'columns_ratio_header' => '4-8',
        'sidebar_location' => 'sidebar-right',
        'sidebar_location_blog' => 'sidebar-blog-right',
        'content_archives' => 'content',
        'memberlite_loop_images' => 'show_none',
        'posts_entry_meta_before' => __('Posted on {post_date} by {post_author_posts_link}', 'memberlite'),
        'posts_entry_meta_after' => __('This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite'),
        'author_block' => false,
        'memberlite_footerwidgets' => '4',
        'copyright_textbox' => '&copy; !!current_year!! !!site_title!!',
        'memberlite_back_to_top' => true,
        'memberlite_color_scheme' => 'Default',
        'memberlite_darkcss' => false,
        'background_color' => '#FFFFFF',
        'bgcolor_header' => '',
        'bgcolor_site_navigation' => '#F9FAFB',
        'color_site_navigation' => '#444444',
        'color_link' => '#1A0DAB',
        'color_meta_link' => '#1A0DAB',
        'color_primary' => '#011935',
        'color_secondary' => '#00A59D',
        'color_action' => '#FF6719',
        'color_button' => '#FF6719',
        'bgcolor_page_masthead' => '#011935',
        'color_page_masthead' => '#FFFFFF',
        'bgcolor_footer_widgets' => '#F9FAFB',
        'color_footer_widgets' => '#444444',
        'bgcolor_header_elements' => '#masthead',
        'bgcolor_site_navigation_elements' => '#site-navigation, .main-navigation ul.sub-menu',
        'color_site_navigation_elements' => '.main-navigation a',
        'color_site_navigation_hover_elements' => '.main-navigation li:hover, .main-navigation li:hover > a',
        'color_link_color_elements' => '.content-area a:link:not(.wp-block-button__link), .content-area a:link:not(.btn), .content-area a:link:not(.comment-reply-link), .footer-navigation a, .site-info a',
        'color_meta_link_color_elements' => '.header-right .menu a',
        'color_primary_background_elements' => '#mobile-navigation, #mobile-navigation-height-col, .masthead, .footer-widgets, .btn_primary, .btn_primary:link, .menu-toggle, .bg_primary, .banner_primary, .has-color-primary-background-color',
        'color_primary_background_hover_elements' => '.btn_primary:hover',
        'color_primary_color_elements' => '#pmpro_levels .post h2, .pmpro_signup_form h2, .primary, .has-text-color.has-color-primary-color',
        'color_secondary_background_elements' => '.header-right #meta-member .meta-member-inner, #meta-member .member-navigation .sub-menu, .btn_secondary, .btn_secondary:link, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a:hover, .banner_secondary, #banner_bottom, .has-color-secondary-background-color',
        'color_secondary_background_hover_elements' => '.btn_secondary:hover',
        'color_secondary_border_elements' => '#pmpro_levels .pmpro_level-highlight, #pmpro_levels.pmpro_levels-2col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-3col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-4col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-div .pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table thead tr:first-child th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot tr:last-child td.pmpro_level-highlight, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a, .memberlite_tabbable .memberlite_tab_content',
        'color_secondary_border_left_elements' => '#pmpro_levels.pmpro_advanced_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-table .pmpro_level-highlight td:first-child, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a',
        'color_secondary_border_right_elements' => '#pmpro_levels.pmpro_advanced_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-table .pmpro_level-highlight td:last-child, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a',
        'color_secondary_color_elements' => 'blockquote.quote:before, q:before, .testimonials-widget-testimonial .open-quote::before, .testimonials-widget-testimonial .close-quote::after, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price, .secondary, .has-text-color.has-color-secondary-color',
        'color_action_background_elements' => '.btn_action, .btn_action:link, .pmpro_content_message a, .pmpro_content_message a:link, .pmpro_content_message a:visited, .pmpro_btn, .pmpro_btn:link, .pmpro_btn:visited, a.pmpro_btn, a.pmpro_btn:link, a.pmpro_btn:visited, input[type=button].pmpro_btn, input[type=submit].pmpro_btn, #loginform input[type=submit].button.button-primary, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .bg_action, .banner_action, .has-color-action-background-color',
        'color_action_background_hover_elements' => '.btn_action:hover, .pmpro_content_message a:hover, .pmpro_btn:hover, a.pmpro_btn:hover, input[type=button].pmpro_btn:hover, input[type=submit].pmpro_btn:hover, .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover',
        'color_action_color_elements' => '.action, .has-text-color.has-color-action-color',
        'color_button_background_elements' => 'button, input[type=button], input[type=reset], input[type=submit],.btn,.btn:link, a.comment-reply-link, a.comment-reply-link:link, #main div.em-search-main button.em-search-submit',
        'color_button_background_hover_elements' => 'button:hover, input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover, button:focus, input[type=button]:focus, input[type=reset]:focus, input[type=submit]:focus, button:active, input[type=button]:active, input[type=reset]:active, input[type=submit]:active,.btn:hover,.btn:active,.btn:focus, #main div.em-search-main button.em-search-submit:hover',
        'bgcolor_page_masthead_elements' => '.masthead',
        'color_page_masthead_elements' => '.masthead, .masthead h1 a, .masthead h2 a, .masthead h3 a, .masthead p a:not(.btn), .memberlite-breadcrumb, .masthead .memberlite-breadcrumb a',
        'bgcolor_footer_widgets_elements' => '.footer-widgets',
        'color_footer_widgets_elements' => '.footer-widgets, .footer-widgets a, .footer-widgets a:hover',
        'delimiter' => '&nbsp;&#47;&nbsp;',
        'memberlite_darkcss' => false,
        'hover_brightness' => '1.1',
        'color_white' => '#FFFFFF',
        'color_text' => '#222222',
        'color_borders' => '#E0E0E0',
        'memberlite_heading_color' => '#1A1A1A', //added new
    );

    return apply_filters('memberlite_defaults_news', $defaults);
}

function memberlite_get_color_schemes()
{
    global $default_news_colors;
    $schemes = array(
        'default_v4.6' => array(
            'label' => __('Default', 'memberlite'),
            'colors' => array(
                '#011935', // 1. Heading Text Color
                '#FFFFFF', // 2. Background Color
                '#FFFFFF', // 3. Masthead Background Color
                '#F9FAFB', // 4. Site Navigation Background Color
                '#444444', // 5. Site Navigation Text Color
                '#222222', // 6. Body Text Color
                '#011935', // 7. Primary Color
                '#011935', // 8. Primary Color Hover
                '#011935', // 9. Secondary Color
                '#00A59D', // 10. Action Color
                '#E87102', // 11. Button Color
                '#3C4B5A', // 12. Border Color
                '#011935', // 13. Masthead Text Color
                '#FFFFFF', // 14. Footer Widgets Background Color
                '#F9FAFB', // 15. Footer Widgets Text Color
                '#444444', // 16. Delimiter Color
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
            'label' => __('Education', 'memberlite'),
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
            'label' => __('Modern Teal', 'memberlite'),
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
            'label' => __('Mono Blue', 'memberlite'),
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
            'label' => __('Mono Green', 'memberlite'),
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
            'label' => __('Mono Orange', 'memberlite'),
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
            'label' => __('Mono Pink', 'memberlite'),
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
            'label' => __('Pop!', 'memberlite'),
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
            'label' => __('Not So Primary', 'memberlite'),
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
            'label' => __('Raspberry Lime', 'memberlite'),
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
            'label' => __('Slate Blue', 'memberlite'),
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
            'label' => __('Watermelon Seed', 'memberlite'),
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

global $memberlite_defaults;
$memberlite_defaults = memberlite_get_defaults();

global $memberlite_color_schemes;
$memberlite_color_schemes = memberlite_get_color_schemes();

global $memberlite_defaults_news;
$memberlite_defaults_news = memberlite_get_defaults_news();

