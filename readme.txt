=== Memberlite ===
Contributors: kimannwall, strangerstudios
Requires at least: 6.0
Tested up to: 6.6
Requires PHP: 5.6
Stable tag: 5.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: one-column, two-columns, left-sidebar, right-sidebar, flexible-header, custom-background, custom-colors, custom-header, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, full-width-template, post-formats, theme-options, threaded-comments, translation-ready, e-commerce

== Description ==
=Build a Professional WordPress Membership Site=
Memberlite is the ideal theme for your membership site - packed with integration for top plugins including Paid Memberships Pro and LifterLMS. It's fully customizable with your logo, colors, fonts, and more global layout settings. Extend the site appearance further with the Memberlite Elements and Memberlite Shortcodes plugins. Memberlite is responsive, clean and minimal.

== Copyright ==

Memberlite WordPress Theme, Copyright (C) 2018 - 2024 Stranger Studios, LLC and other contributors
Memberlite is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Memberlite WordPress Theme bundles or has used original or modified code from the following third-party resources:

Font Awesome icons Copyright Dave Gandy
License: CC BY 4.0 License
Source: https://fontawesome.com/license

Font Awesome CSS Copyright Dave Gandy
License: MIT License
Source: https://fontawesome.com/license

Paid Memberships Pro icon and templates
License: GPLv2
Source: https://www.paidmembershipspro.com/paid-memberships-pro-is-100-gpl-and-why/

bbPress icon, CSS and templates
License: GPLv2
Source: https://bbpress.org/about/gpl/

BuddyPress CSS and templates
License: GPLv2
Source: https://buddypress.org/about/gpl/

WooCommerce CSS and templates
License: GPLv3
Source: https://github.com/woocommerce/woocommerce/blob/master/license.txt

The Events Manager icon
License: GPLv3
Source: https://eventsmanagerpro.com/terms-conditions/

CSS grid based on Foundation by Zurb
License: MIT License
Source: https://foundation.zurb.com/get-involved/faq.html

== Getting Started ==
Memberlite makes it easy to customize the appearance and layout of your site using the Theme Customization Screen (Appearance > Customize).

== Adding Your Logo ==
Use the Customize > Site Identity screen to add a custom logo (formatted for retina display), update your Site Title and Tagline, and toggle the display of your Site Title & Tagline.

[Explore Documentation on Custom Headers in Memberlite](http://www.memberlitetheme.com/documentation/site-branding/)

== Customize the Theme ==
Use the Customize > Memberlite Options screen to modify theme layout, logo, fonts, colors, copyright message and more.

[Explore Documentation on Customizing Memberlite »](http://memberlitetheme.com/documentation/customize/)

== Using Child Themes ==
If you need to customize the theme beyond theme settings, use a child theme.

[Memberlite Child Theme Downloads »](https://memberlitetheme.com/themes/) | [About Child Themes (WordPress Codex) »](https://developer.wordpress.org/themes/advanced-topics/child-themes/)

== Integrated Plugins ==
Memberlite includes formatting for use with:

= Paid Memberships Pro =
[Install Paid Memberships Pro »](http://www.paidmembershipspro.com/documentation/download/)

= bbPress =
[Install bbPress »](https://wordpress.org/plugins/bbpress/) | [Install Paid Memberships Pro - bbPress Add On »](https://wordpress.org/plugins/pmpro-bbpress/)

= LifterLMS =
[Install LifterLMS »](https://wordpress.org/plugins/lifterlms/)

= Events Manager =
[Install Events Manager »](https://wordpress.org/plugins/events-manager/)

= Testimonials Widget =
[Install Testimonials Widget »](https://wordpress.org/plugins/testimonials-widget/)

We highly recommend using these plugins for every site running Memberlite:

= Multiple Post Thumbnails =
[Install Multiple Post Thumbnails »](https://wordpress.org/plugins/multiple-post-thumbnails/)

== Changelog ==

= 5.2.1 - 2024-08-25 =
* ENHANCEMENT: Now supporting a color setting for text color.
* ENHANCEMENT: Added body class `is-style-dark` or `is-style-light` if dark mode is active.
* BUG FIX/ENHANCEMENT: Additional fixes to support sites using a dark background / inverted scheme.
* BUG FIX: Fixed priority of color palette setup so that font and body background colors are always named.

= 5.2.0 - 2024-07-17 =
* ENHANCEMENT: Updated to fully support for PMPro v3.1+ and frontend design updates in core.
* ENHANCEMENT: Updated to Font Awesome version 6.6.0.
* BUG FIX: Fixed the LifterLMS Student Dashboard Log In and Password Reset views.

= 5.1.0 - 2024-01-25 =
* FEATURE: Now includes support for frontend styling of courses with LifterLMS.
* ENHANCEMENT: Added support for LifterLMS sidebars.
* ENHANCEMENT: Now loading the correct named font families in the Block Editor for body and header font.
* ENHANCEMENT: Updated to Font Awesome version 6.5.1.
* BUG FIX/ENHANCEMENT: Styles now updated to be compatible with PMPro Advanced Levels Page v1.0

= 5.0.0 - 2023-07-03 =
* FEATURE: Added hybrid theme features for tighter compatibility with the WordPress Block Editor.
* ENHANCEMENT: Improved default color scheme. Existing sites can choose Legacy Default scheme for previous palette.
* ENHANCEMENT: Added ability to customize masthead and footer background colors and text colors via Customizer.
* ENHANCEMENT: Added caret icon to show when primary navigation menu has children.
* ENHANCEMENT: General updates to styles across the theme.
* ENHANCEMENT: Added addition Google Fonts: DM Sans, Figtree, Poppins, and Inter
* ENHANCEMENT: Added the `memberlite_editor_color_palette` filter to adjust the editor color palette.
* ENHANCEMENT: Updated to Font Awesome version 6.4.
* ENHANCEMENT: Reducing calls made to `get_option()` from `pmpro_getOption()`.
* ENHANCEMENT: Enlarged overall max site width and grid spacing to modern standards.
* ENHANCEMENT: Updated Content Width for new larger grid.
* ENHANCEMENT/BUG FIX: Improved the format of the "Log Out" link in PMPro Login Widget
* ENHANCEMENT/BUG FIX: Fixed heading level to h2 for loop items vs. single posts (h1).
* ENHANCEMENT/BUG FIX: Updating screen reader text shown with page navigation to not use the H1 tag for SEO and page structure.
* ENHANCEMENT/BUG FIX: Accessibility improvements for the Mobile Menu toggle.
* ENHANCEMENT/BUG FIX: Checkout heading updates for accessibility improvements in PMPro v2.11.
* ENHANCEMENT/BUG FIX: Improved appearance of third level dropdown items in primary and meta menu locations.
* BUG FIX/ENHANCEMENT: Improved dark background handling for various frontend elements.
* BUG FIX: Allow `noscript` tag in the escaped output of author avatar image for Jetpack compatibility.
* BUG FIX: Fixing issue with columns layout on search results when blog grid display is enabled.
* BUG FIX: Fixed PHP 8 deprecated notices.

= 4.5.4.1 - 2022-09-27 =
* ENHANCEMENT: Improved core WP block styling for tables and quotes.
* BUG FIX: Fixed links to install and activate recommended plugins when using a WordPress multisite environment.
* BUG FIX: Updated Font Awesome icon weights for Elementor compatibility for post titles on protected content, post types.
* BUG FIX: Added code to prevent a duplicate featured image showing as banner and thumbnail on archives.
* BUG FIX: Added missing Non Sans local font file.
* BUG FIX: Fixed dropdowns in primary navigation that could be behind row two if your primary menu wraps.
* BUG FIX: Improvements to button colors on default PMPro levels page, footer skip link, and sidebars.
* BUG FIX: Replaced lost separator for sites that show the larger "excerpt" content on loop and single posts.

= 4.5.4 - 2022-09-11 =
* FEATURE: Added grid layout for blog.
* FEATURE: Added block image option for showing post thumbnails in the loop and single post.
* FEATURE: Added author block customizer setting for posts.
* ENHANCEMENT: Now loading all webfonts locally.
* ENHANCEMENT: Moved all colors to root variables to improve 
* ENHANCEMENT: Added all unique colors in theme to editor color palette.
* ENHANCEMENT: Updated to Font Awesome version 6.2.
* ENHANCEMENT: Improved compatibility with WordPress Block Editor styling options and core blocks.
* ENHANCEMENT: Added filter `memberlite_show_author_avatar` to optionally disable author avatar on posts.
* ENHANCEMENT: Added filter `memberlite_logout_redirect_to` to allow filtering the logout URL redirect.
* ENHANCEMENT: Added filter `memberlite_nav_menu_submenu_pagemenuid` to set the top level page to generate the submenu on pages.
* ENHANCEMENT: Added filter `memberlite_excerpt_larger` to turn off the enlarged/enhanced excerpt text for a single post.
* BUG FIX/ENHANCEMENT: Improved dark background handling for various frontend elements.
* BUG FIX/ENHANCEMENT: Removed h1 tag from logo on all pages except `home_url`.

= 4.5.3 - 2021-03-13 =
* ENHANCEMENT: Now showing member welcome/links in mobile menu if no other widgets defined.
* BUG FIX: Fixed issues with background color and font color for button or cover blocks.
* BUG FIX: General improvements for sites using an inverted (dark) body background color.

= 4.5.2 - 2020-12-08 =
* BUG FIX: Fixed issue with the Log in and Log Out links in member header theme area.
* BUG FIX/ENHANCEMENT: Fixed localization and escaping throughout theme.
* BUG FIX/ENHANCEMENT: Improved styling of frontend elements throughout theme.
* ENHANCEMENT: Updated to Font Awesome version 5.15.1.
* ENHANCEMENT: Improved Memberlite Guide admin page formatting.
* ENHANCEMENT: Updated to Font Awesome version 5.15.1.

= 4.5.1 - 2020-10-14 =
* BUG FIX: Adjusting Nav Menus code to supress warnings and fix issue with meta menu callback not adding log in or log out links.
* BUG FIX/ENHANCEMENT: Updated stylesheets for version 2.6+ of bbPress.
* BUG FIX/ENHANCEMENT: Adding expected Memberlite hooks to forum.php template.
* ENHANCEMENT: Styles to support new Payment Request Button features planned for PMPro.

= 4.5 - 2020-09-14 =
* SECURITY: Escaped `get_template_directory_uri` in inc/admin.php that was missing.
* BUG FIX: Fixed bug where sidebar would show below content if "No Sidebar" layout was chosen in theme options.
* BUG FIX: Fixed undefined variable `show_header_right`.
* BUG FIX: Removed old CSS not used anymore by block editor for gallery block.
* BUG FIX: Now allowing span and time as allowed HTML for the sanitization of post meta before and after values from Customizer.
* BUG FIX: Updated Customizer CSS to fix potential override of header background image with specified background-color.
* BUG FIX/ENHANCEMENT: Adjusted support for Nav Menus Add On to better detect member-specific menus.
* BUG FIX/ENHANCEMENT: Added styles to avoid word wrap in specific form input fields for Column block compatibility.
* BUG FIX/ENHANCEMENT: Adjusted alignwide and alignfull as block editor styles to fix bugs with column layouts.
* BUG FIX/ENHANCEMENT: Now hiding the sidebar child pages menu if this is a membership account page or a child of it.
* BUG FIX/ENHANCEMENT: Updated all color schemes and customizer controls to include header background color for preview and save.
* BUG FIX/ENHANCEMENT: Updated search results to check post type before adding `entry-header-grid` to post_class.
* ENHANCEMENT: Added styles to highlight the current page item in the subpages sidebar display.
* ENHANCEMENT: Added styles to select type form inputs to match other form fields display.
* ENHANCEMENT: Updated to Font Awesome version 5.14.0
* ENHANCEMENT: Checking to see if menu theme_location exists before calling wp_nav_menu for certain menus.
* ENHANCEMENT: Added in backwards compatibility for wp_body_open (required to call at the top of the body tag).
* ENHANCEMENT: Adjusted stylesheet to include tested up to and PHP versions.
* ENHANCEMENT: Updated Memberlite Guide to support child themes via the `memberlite_guide_additional` action hook.
* ENHANCEMENT: Updated Memberlite Guide to allow child themes to filter recommended and integrated plugins via `memberlite_plugins_recommended` filter hook.
* ENHANCEMENT: Added `memberlite_defaults` filter for child themes or plugin to adjust theme default options.
* ENHANCEMENT: Wrapped replacement variables for the post meta before and after in a unique span for styling via CSS.
* ENHANCEMENT: Added `memberlite_show_header_right` filter to hide header right area in logo space.
* ENHANCEMENT: Added `memberlite_login_redirect_to` function and filter to get the `redirect_to` URL attribute used for "Log In" links.
* ENHANCEMENT: Adjusted appearance of headings and form elements on the new Member Profile Edit page in PMPro.
* REFACTOR: Added new function `memberlite_get_font` to return the header or body font from theme options. 

= 4.4 - 2020-04-30 =
* FEATURE: Added layout for "No Sidebar" Layout for Blog, Archive, Posts.
* FEATURE: Added header background color customizer setting.
* ENHANCEMENT: Added support for new frontend login, log in widget, and profiles in PMPro v2.3+.
* BUG FIX/ENHANCEMENT: Improved CSS for sidebar menus and other widgets to only target menu-style lists, not all lists and for the Theme My Login widget.
* BUG FIX/ENHANCEMENT: Improved Customizer CSS output so that all input types to respect custom font settings.
* BUG FIX/ENHANCEMENT: Adjusted buttons and button-style links hover "brightness" instead of opacity for better appearance.
* BUG FIX/ENHANCEMENT: Added post_class `entry-header-grid` to posts formats so styling only applies in main loop.
* BUG FIX/ENHANCEMENT: Adjusted secondary (sidebar) text link to not apply to buttons.
* ENHANCEMENT: Added `memberlite_avatar_size` filter for adjusting avatar display size.
* ENHANCEMENT: Improved Accessibility and SEO by adding `alt` tags to post thumbnails and avatar.
* ENHANCEMENT: Updated to Font Awesome version 5.13.0.

= 4.3 - 2019-05-13 =
* BUG FIX: Fixed bug where {post_comments} replacement wasn't returning the correct count in masthead area.
* BUG FIX: Fixed spacing when applying a discount code and the error/success message displays.
* BUG FIX: Fixed issue with escaped CSS selectors and .site-title ‘blank’ color value.
* BUG FIX: Fixing warning on homepage when displaying latest posts and no posts are found.
* BUG FIX/ENHANCEMENT: Fixed the `memberlite_parse_tags` replacements to be more reliable for post entry meta before and after.
* BUG FIX/ENHANCEMENT: Adjusting button text color for columns layouts of Advanced Levels Page shortcode
* ENHANCEMENT: Adjusting image block for responsive screens to display block and not floated.
* ENHANCEMENT: Added option for sticky navbar.
* ENHANCEMENT: Now aligning floated images on small screens to center and block to avoid broken text wrap on mobile.
* ENHANCEMENT: Adjusted layout of the Memberlite Guide page to match WP 5.0+ admin styles.
* ENHANCEMENT: Adjusted responsive view of masthead/post byline area to display avatar above title for small screens; no hyphenation on small screens.
* ENHANCEMENT: Adjusted responsive view of site footer copyright and ‘back to top’ link area.
* ENHANCEMENT: Restructured the header for small screens to use grid layout so menu toggle button doesn't overlap logo.
* ENHANCEMENT: Adjusted margin around comment form; Adjusted tabs on comment/pingbacks area to have no outline.
* ENHANCEMENT: Updating to Font Awesome version 5.8.2.
* FEATURE: Added support for the additional HTML5 tags `details` and `summary`.
* FEATURE: Added RTL support.
* FEATURE: Began adding styles for core WP Blocks, including blockquotes, image gallery displays, captions; Support for default styles including font sizes small, medium, large, huge.
* FEATURE: Added theme’s color scheme to block editor via `editor-color-palette` theme support.
* FEATURE: Built unique array of Color Scheme values to include in Block Editor.
* FEATURE: Now using a comment query to get count so we can exclude trackbacks and pingbacks.
* FEATURE: Added word break and hyphen styles for comments content.

= 4.2 - 2018-10-26 =
* SECURITY: Properly escaping the URL for excerpt_more.
* BUG FIX/ENHANCEMENT: Localizing the 'more' link in excerpt.
* BUG FIX/ENHANCEMENT: Only applying filter to excerpt_more on the frontend.
* ENHANCEMENT: Adding new "blank" page template without a header or a footer.

= 4.1 - 2018-10-08 =
* SECURITY: Sanitizing meta section just in case.
* SECURITY: Using esc_html_e to properly escape translatable content.
* BUG FIX/ENHANCEMENT: Improving button color and font color behavior.
* BUG FIX/ENHANCEMENT: Fixing missing end break for if statement.
* BUG FIX/ENHANCEMENT: Adjusting how the_excerpt and <!--more--> tags are handled in loop.
* BUG FIX/ENHANCEMENT: Improving 'status' post format layout.
* BUG FIX/ENHANCEMENT: Improving code for WPCS.
* BUG FIX/ENHANCEMENT: Removing $more tag global.
* BUG FIX/ENHANCEMENT: Removing custom content walker for comments and pings.
* ENHANCEMENT: Adding .bypostauthor class; adding class for comments in moderation; hiding "says" from comments.
* ENHANCEMENT: Added memberlite_the_excerpt and memberlite_more_content functions used in post template parts.

= 4.0.1 - 2018-09-25 =
* SECURITY: Switching to use absint as a sanitizing function instead of intval_base10 which doesn't work.
* SECURITY: Fixed escaping in the user account link.
* BUG FIX: Fix targeting of jQuery for tabbable Content, Post Comments and Permalinks.
* BUG FIX: Font Awesome icons added via the :before selector in css require a font-weight attribute.
* BUG FIX: Fixing bug with menu placed text color in header right widget area via widgets > add new.
* BUG FIX: Fixed bug where "Custom" color scheme didn't save because it wasn't a valid value in sanitization callback.
* BUG FIX: Fixing code formatting where additional line was breaking columns layout.
* BUG FIX/ENHANCEMENT: Updating styles for BuddyPress to add to existing BuddyPress template stylesheets instead of complete override.
* BUG FIX/ENHANCEMENT: Updating primary area form styling to reference the .site-content class instead of the #primary div.
* BUG FIX/ENHANCEMENT: Updating the primary link color and hover color to use a class instead of an ID attribute.
* BUG FIX/ENHANCEMENT: Updating memberlite_page_nav function to bail if the post ID is 0.
* BUG FIX/ENHANCEMENT: Font Awesome fixes for font-weight and buttons; Theme My Login 7 formatting fixes.
* BUG FIX/ENHANCEMENT: Updating check to require both Multiple Post Thumbnails and Memberlite Elements plugins to allow the show_both option in customizer.
* BUG FIX/ENHANCEMENT: Improving appearance of front page when set to static.
* BUG FIX/ENHANCEMENT: Adjusting style for banner images in the loop.
* BUG FIX/ENHANCEMENT: Updating Recent Posts w/Thumbnails widget to use grid instead of float.
* BUG FIX/ENHANCEMENT: Fixing case where customizer preview wasn't adjusting site description when changing site title and tagline text color.
* ENHANCEMENT: Moving all Theme My Login related styles to a separate optionally loaded integration file.
* ENHANCEMENT: Fixing mobile navigation search form to be the same whether added via Widget or via the Memberlite Options > Search Form After Navigation setting.
* ENHANCEMENT: Adding pmpro_btn-cancel to the standard link color default customization.
* ENHANCEMENT: Improving button and link-type button appearance throughout theme and for use in Paid Memberships Pro.
* ENHANCEMENT: Fixing padding on bbPress search widget to match other widget spacing.
* ENHANCEMENT: Removing padding on Custom HTML widget when placed in the sidebar (#secondary) location.
* ENHANCEMENT: Cleaning up tabs on empty lines.
* ENHANCEMENT: Removing the !important declaration from button font color.
* ENHANCEMENT: Adjusting text size of post titles in recent posts with thumbnails widget.
* ENHANCEMENT: Adding rel="nofollow" to the custom excerpt more link.
* ENHANCEMENT: Updating screenshot.
* ENHANCEMENT: Updating "Tested up to" WordPress version value.
* ENHANCEMENT: Adjusting featured image size in loop to use the 'medium' size for better appearance.
* FEATURE: Added 'memberlite_google_fonts_weights' filter to adjust which font weights are enqueued when loading Google Fonts.

= 4.0 - 2018-07-31 =
* SECURITY/BUG FIX: Added esc_url to wp-admin links on theme welcome page.
* SECURITY/BUG FIX: Various other escaping and sanitization fixes. (Thanks, Justin Tadlock and Sakin Shrestha)
* BUG FIX: Hiding 'Register' link in meta menu if registration is disabled.
* BUG FIX: Wrapping strings in customizer to fix redirect issue.
* BUG FIX: Fixed styles for some BuddyPress buttons that were invisible.
* BUG FIX/ENHANCEMENT: Fixed blockquotes styling. (Thanks, Justin Tadlock and Sakin Shrestha)
* BUG FIX/ENHANCEMENT: Prefixing all hooks with theme slug. Adding deprecated file for old hook names.
* ENHANCEMENT: Some banner, widget, and sidebar features were moved into a separate plugin Memberlite Elements, available from the wp.org repository here https://wordpress.org/plugins/memberlite-elements/.
* ENHANCEMENT: Improving print styles for better output
* ENHANCEMENT: Updating to version 5.2 of Font Awesome.
* ENHANCEMENT: Adding WooCommerce page template 3.x support
* ENHANCEMENT: Adding feature to define a member-menu area for logged out visitors
* ENHANCEMENT: Added {post_type} as a variable for the Post Entry Meta settings.
* ENHANCEMENT: Added some web safe fonts (non-Google Font) options for the font settings. Also allowing translators to exclude certain fonts.

= 3.0.4 - 2017-10-27 =
* SECURITY/BUG FIX/ENHANCEMENT: Added sanitization and escaping to the banner metabox on the edit post page, fixed the cropping settings for the uploaded images, and refactored the code to make it more readable. (Thanks, Massimo Marazzi)
* ENHANCEMENT: Improved checkout template to work with the div-based layout now used in PMPro 1.9.4+.

= 3.0.3 - 2017-08-07 =
* SECURITY: Escaping login/logout URLs, account/profile URLs, landing page level URL, home_url.
* BUG FIX: Fixed float for Full Width and Narrow Width page templates when default pages layout set to left sidebar.
* BUG/ENHANCEMENT: Wrapping welcome text in header and a few other strings for translation.
* BUG FIX/ENHANCEMENT: Added comment support to pages.
* BUG FIX/ENHANCEMENT: Fixed abbr and heading tag use on PMPro checkout page.
* BUG FIX/ENHANCEMENT: Fixed text link color issue for cancel button.
* BUG/ENHANCEMENT: Setting the content width on after_setup_theme hook now.
* BUG/ENHANCEMENT: No longer enqueuing jQuery directly. It is set as a dependency for our JS files.
* NOTE: Added Copyright section to the readme.
* NOTE: The get_the_content_before_more and get_the_content_after_more functions are now prefixed, memberlite_get_the_content_before_more() and memberlite_get_the_content_after_more().
* NOTE/ENHACEMENT: Now only showing the post meta generated by memberlite_get_entry_meta() on the post CPT.
* NOTE/ENHANCEMENT: Now only showing the footer widgets primary background stripe if there are active widgets in the area.
* ENHANCEMENT: Added CSS for JetPack contact form submission/results blockquote.
* ENHANCEMENT: Improved breadcrumbs for custom post type archives and custom taxonomies
* ENHANCEMENT: Improved page title for custom post type archives and custom taxonomies
* ENHANCEMENT: Updated bbPress single forum topic title output.

= 3.0.2 - 2017-01-12 =
* BUG: Fixed issue with update code when PMPro is not installed.
* BUG/ENHANCEMENT: Now running "do_shortcode" on the "Banner Right" content.
* BUG/ENHANCEMENT: CSS tweak for input elements in iOS browsers.
* ENHANCEMENT: Added Narrow Width page template for an 8 column centered main content layout with no sidebar.

= 3.0.1 - 2016-12-06 =
* BUG: Now hiding the wrapping <p> tag for memberlite_get_entry_meta before and after when set to none via customizer.
* ENHANCEMENT: Added masthead with profile user name to bbPress single user profile view.
* BUG: Now filtering memberlite_banner_right to allow shortcodes.
* BUG: Fixing some display issues with no masthead and the blog sidebar float.
* NOTE/ENHANCEMENT: Added the code back to update from the PMPro license server until we get approval in the WordPress repository.

= 3.0 - 2016-09-20 =
* ENHANCEMENT: Page banner description and banner right column now inheriting ratio of primary columns.
* ENHANCEMENT: Adding support for toggling display of page masthead banner.
* BUG: Fixing index error on memberlite_cpt_sidebar_id.
* ENHANCEMENT: Added page setting for page icon and banner right icon display.
* BUG: Fixing error when viewing archive and no $post is set.
* BUG: Fixing error when missing pagemenuid in sidebar.
* Cleaning blank spaces in style.css
* BUG: Fixing CSS on checkout page headings (h2) for boxes added via Register Helper.
* BUG: Fixing some dark.css colors for Paid Memberships Pro and bbPress.
* ENHANCEMENT: Added customization setting for columns ratio of primary and sidebar.
* BUG: Removed add_image_size('large') declaration
* ENHANCEMENT: Added image size for 'fullwidth' (full width 12 columns - 1170px)
* ENHANCEMENT: Added fallback to author avatar for recent posts widget when featured image is not set
* BUG: Fixing content_width for full width or fluid width page template.
* ENHANCEMENT: Added single post meta settings with template variables for before and after post.
* ENHANCEMENT: Added Back to Top footer link
* ENHANCEMENT: Added customizer settings for page and post navigation
* ENHANCEMENT: Added single page navigation within parent/child page hierarchy
* ENHANCEMENT: Updating theme for compatibility with pmpro-advanced-levels-shortcode addon
* ENHANCEMENT: JS for smooth scroll to # target links in page
* BUG: Fixing nav menus when using pmpro-nav-menus addon
* BUG: Fixing errors and alerts from Theme Check plugin.
* ENHANCEMENT: Moving all shortcodes to 'memberlite-shortocdes' plugin for better compatibility for theme changes.
* ENHANCEMENT: Improved handling of CPT titles, breadcrumbs, and sidebars for single and archive view.

= 2.0.3.7 =
* ENHANCEMENT: Added JS code to swap to a tab if an anchor is in the URL.

= 2.0.3.6 =
* ENHANCEMENT: Added responsive appearance to compare_table Membership Levels layout.
* Added hooks for before and after content hooks to single page and single post.
* BUG: Fixed notices in memberlite_levels shortcode.

= 2.0.3.5 =
* FEATURE: Added memberlite_banner shortcode
* BUG: Fixed comment/ping/trackback count for 'approve' status only.
* BUG: Updated Comment Walker to respect PHP strict standards
* BUG: Fixed homepage bottom banner when page template is defined.
* BUG: Fixed highlighted level in the compare_table layout when highlighted level is first column.
* BUG: Fixed current_user level class on compare_table layout in membership levels shortcode.
* BUG: Fixed notice when bbpress is not activated for memberlite_page_title function

= 2.0.3.4 - 2015-11-07 =
* SECURITY: Now using get_search_query() and the_search_query() to prevent XSS issues in h1s and breadcrumbs on search results pages. (Thanks, retr0)
* ENHANCEMENT: Tweaks to checkout page CSS.

= 2.0.3.3 =
* BUG: Updated memberlite_defaults for banner hover background color.

= 2.0.3.2 - 2015-10-08  =
* BUG: Updated sidebar registration order so default widgets of new WP install are placed in the Posts custom sidebar.
* BUG: Fixed dropdown submenu menus at the third level/depth.
* BUG: Fixed case where the member menu wouldn’t appear for a logged in member.
* BUG: Fixed bug where the mobile menu icon would sometimes not show on mobile or ipad layouts.
* BUG: Fixed bug where the wrong banner image would sometimes show on blog and archive pages.
* BUG: Better handling of custom sidebars with quotes and other special characters in them.
* ENHANCEMENT: Now falling back to primary menu (if set) if mobile menu widgets are not defined.
* ENHANCEMENT: Now using the main navigation bar color for dropdown menus.
* ENHANCEMENT: Added support for assigning custom sidebars to detected CPTs.
* ENHANCEMENT: Added "lock" icon to membership-restricted post titles (requires PMPro v1.8.5.4 or higher)
* ENHANCEMENT: Added the ability to select a separate banner and feature image when the Multiple Post Thumbnails Plugin () is enabled.
* ENHANCEMENT: Setting the hover colors of primary, secondary, and action links to a lighter version of the color instead of using other colors from the color scheme.
* ENHANCEMENT: Moved memberlite_defaults array to a separate included file.
* ENHANCEMENT: Design improvements for galleries and image captions.

= 2.0.3.1 - 2015-08-26 =
* ENHANCEMENT: Support added for dark background via customizer setting and additional dark.css
* BUG: Fixing issue with [memberlite_subpagelist] shortcode thumbnail size setting
* BUG: Header text color fix in customizer

= 2.0.3 - 2015-08-26 =
* SECURITY: Fixed XSS issue with the h1 display of search queries.
* BUG: Removed pmpro_content_filter from banner description so it is not duplicated in post content.
* BUG: Fixing issue where archvies and index weren't showing full the_content when set in customizer.
* ENHANCEMENT: Updating Title of Contents and general stylesheet formatting improvements.
* ENHANCEMENT: Added post_parent and thumbnail_size attributes to [memberlite_subpagelist] shortcode.
* ENHANCEMENT: Improved memberlite_getLevelCost function to respect price formatting filters in Paid Memberships Pro.
* ENHANCEMENT: Added masthead banner background image support to front-page template.
* ENHANCEMENT: Added customizer settings for primary navigation bar background color and link color.
* ENHANCEMENT: Added 'scheme_SCHEMENAME' to body classes array when an included color scheme is selected in customizer.'
* ENHANCEMENT: Improved formatting for comments, nested comments, pingbacks and trackbacks

= 2.0.2 =
* ENHANCEMENT: Now respecting your choice if you set a specific page template on the "static front page".
* BUG: Updates to member menu area to only show the "member menu" selection if current user has membership level.

= 2.0.1 =
* BUG: Added hook to reset update_themes cache when pmpro license is updated.
* ENHANCEMENT: Added the "pmpro_license_check_key_timeout" filter which can be used to set the timeout of the call to the PMPro License Server to something other than 5s. This is useful if you find your website timing out or having trouble getting updates.

= 2.0 =
* Initial version.
