<?php
global $memberlite_defaults;
$memberlite_defaults = apply_filters( 'memberlite_defaults', array(
	'memberlite_variation'						=> 'default',
	'memberlite_webfonts'						=> 'Lato_Lato', // Unused property for backwards compatibility
	'memberlite_header_font'					=> 'Lato',
	'memberlite_body_font'						=> 'Lato',
	'columns_ratio'								=> '8-4',
	'columns_ratio_header'						=> '4-8',
	'sidebar_location'							=> 'sidebar-right',
	'sidebar_location_blog'						=> 'sidebar-blog-right',
	'content_archives'							=> 'content',
	'memberlite_loop_images'					=> 'show_none',
	'posts_entry_meta_before'					=> __( 'Posted on {post_date} by {post_author_posts_link}', 'memberlite' ),
	'posts_entry_meta_after'					=> __( 'This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite' ),
	'author_block'								=> false,
	'memberlite_footerwidgets'					=> '4',
	'copyright_textbox'							=> '&copy; !!current_year!! !!site_title!!',
	'memberlite_back_to_top'					=> true,
	'memberlite_color_scheme'					=> 'Default',
	'memberlite_darkcss'						=> false,
	'background_color'							=> '#FFFFFF',
	'bgcolor_header'							=> '',
	'bgcolor_site_navigation'					=> '#F9FAFB',
	'color_site_navigation'						=> '#444444',
	'color_link'								=> '#011935',
	'color_meta_link'							=> '#011935',
	'color_primary'								=> '#011935',
	'color_secondary'							=> '#00A59D',
	'color_action'								=> '#E87102',
	'color_button'								=> '#3C4B5A',
	'bgcolor_page_masthead'						=> '#011935',
	'color_page_masthead'						=> '#FFFFFF',
	'bgcolor_footer_widgets'					=> '#F9FAFB',
	'color_footer_widgets'						=> '#444444',
	'bgcolor_header_elements'		  			=> '#masthead',
	'bgcolor_site_navigation_elements'			=> '#site-navigation, .main-navigation ul.sub-menu',
	'color_site_navigation_elements'			=> '.main-navigation a',
	'color_site_navigation_hover_elements'		=> '.main-navigation li:hover, .main-navigation li:hover > a',
	'color_link_color_elements'					=> '.content-area a:link:not(.wp-block-button__link), .content-area a:link:not(.btn), .content-area a:link:not(.comment-reply-link), .footer-navigation a, .site-info a',
	'color_meta_link_color_elements'			=> '.header-right .menu a',
	'color_primary_background_elements'			=> '#mobile-navigation, #mobile-navigation-height-col, .masthead, .footer-widgets, .btn_primary, .btn_primary:link, .menu-toggle, .bg_primary, .banner_primary, .has-color-primary-background-color',
	'color_primary_background_hover_elements'	=> '.btn_primary:hover',
	'color_primary_color_elements'				=> '#pmpro_levels .post h2, .pmpro_signup_form h2, .primary, .has-text-color.has-color-primary-color',
	'color_secondary_background_elements'		=> '.header-right #meta-member .meta-member-inner, #meta-member .member-navigation .sub-menu, .btn_secondary, .btn_secondary:link, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a:hover, .banner_secondary, #banner_bottom, .has-color-secondary-background-color',
	'color_secondary_background_hover_elements'	=> '.btn_secondary:hover',
	'color_secondary_border_elements'			=> '#pmpro_levels .pmpro_level-highlight, #pmpro_levels.pmpro_levels-2col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-3col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-4col .pmpro_level-highlight, #pmpro_levels.pmpro_levels-div .pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table thead tr:first-child th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot tr:last-child td.pmpro_level-highlight, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a, .memberlite_tabbable .memberlite_tab_content',
	'color_secondary_border_left_elements'		=> '#pmpro_levels.pmpro_advanced_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-table .pmpro_level-highlight td:first-child, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a',
	'color_secondary_border_right_elements'		=> '#pmpro_levels.pmpro_advanced_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_advanced_levels-compare_table tfoot td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-table .pmpro_level-highlight td:last-child, .memberlite_tabbable ul.memberlite_tabs li.memberlite_active a',
	'color_secondary_color_elements'			=> 'blockquote.quote:before, q:before, .testimonials-widget-testimonial .open-quote::before, .testimonials-widget-testimonial .close-quote::after, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price, .secondary, .has-text-color.has-color-secondary-color',
	'color_action_background_elements'			=> '.btn_action, .btn_action:link, .pmpro_content_message a, .pmpro_content_message a:link, .pmpro_content_message a:visited, .pmpro_btn, .pmpro_btn:link, .pmpro_btn:visited, a.pmpro_btn, a.pmpro_btn:link, a.pmpro_btn:visited, input[type=button].pmpro_btn, input[type=submit].pmpro_btn, #loginform input[type=submit].button.button-primary, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .bg_action, .banner_action, .has-color-action-background-color',
	'color_action_background_hover_elements'	=> '.btn_action:hover, .pmpro_content_message a:hover, .pmpro_btn:hover, a.pmpro_btn:hover, input[type=button].pmpro_btn:hover, input[type=submit].pmpro_btn:hover, .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover',
	'color_action_color_elements'				=> '.action, .has-text-color.has-color-action-color',
	'color_button_background_elements'			=> 'button, input[type=button], input[type=reset], input[type=submit],.btn,.btn:link, a.comment-reply-link, a.comment-reply-link:link, #main div.em-search-main button.em-search-submit',
	'color_button_background_hover_elements'	=> 'button:hover, input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover, button:focus, input[type=button]:focus, input[type=reset]:focus, input[type=submit]:focus, button:active, input[type=button]:active, input[type=reset]:active, input[type=submit]:active,.btn:hover,.btn:active,.btn:focus, #main div.em-search-main button.em-search-submit:hover',
	'bgcolor_page_masthead_elements'			=> '.masthead',
	'color_page_masthead_elements'				=> '.masthead, .masthead h1 a, .masthead h2 a, .masthead h3 a, .masthead p a:not(.btn), .memberlite-breadcrumb, .masthead .memberlite-breadcrumb a',
	'bgcolor_footer_widgets_elements'			=> '.footer-widgets',
	'color_footer_widgets_elements'				=> '.footer-widgets, .footer-widgets a, .footer-widgets a:hover',
	'delimiter'									=> '&nbsp;&#47;&nbsp;',
	'memberlite_darkcss'						=> false,
	'hover_brightness'							=> '1.1',
	'color_white'								=> '#FFFFFF',
	'color_text'								=> '#222222',
	'color_borders'								=> '#03543F21',
) );
