#Memberlite: An Easy to Customize Theme for Membership Sites
===

##Getting Started
---------------

Memberlite makes it easy to customize the appearance and layout of your site using the Theme Customization Screen (Appearance > Customize). 

###Adding Your Logo
Use the Appearance Header Screen to add a Custom Header logo (formatted for retina display) and to toggle the display of header text and text color.

[Explore Documentation on Custom Headers in Memberlite](http://www.memberlitetheme.com/documentation/adding-your-logo/)

###Customize the Theme
Use the Customize Screen to modify theme layout, logo, fonts, colors, copyright message and more.

[Explore Documentation on Customizing Memberlite »](http://memberlitetheme.com/documentation/customize-the-theme/)

###Using Child Themes
If you need to customize the theme beyond the settings in "Customize", use a child theme.

[Download a Blank Child Theme »](https://github.com/strangerstudios/memberlite-child) | [About Child Themes (WordPress Codex) »](http://codex.wordpress.org/Child_Themes)

###Integrated Plugins
Memberlite includes formatting for use with:

**Paid Memberships Pro**
[Install Paid Memberships Pro »](http://www.paidmembershipspro.com/documentation/download/)

**WooCommerce**
[Install WooCommerce »](https://wordpress.org/plugins/woocommerce/) | [Install Paid Memberships Pro - WooCommerce Add On »](https://wordpress.org/plugins/pmpro-woocommerce/)

**bbPress**
[Install bbPress »](https://wordpress.org/plugins/bbpress/) | [Install Paid Memberships Pro - bbPress Add On »](https://wordpress.org/plugins/pmpro-bbpress/)

**Events Manager**
[Install Events Manager »](https://wordpress.org/plugins/events-manager/)

**Testimonials Widget**
[Install Testimonials Widget »](https://wordpress.org/plugins/testimonials-widget/)

We highly recommend using these plugins for every site running Memberlite:

**Multiple Post Thumbnails**
[Install Multiple Post Thumbnails »](https://wordpress.org/plugins/multiple-post-thumbnails/)

**Theme My Login**
[Install Theme My Login »](https://wordpress.org/plugins/theme-my-login/)


###Changelog
**3.0**
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

**2.0.3.7**
* ENHANCEMENT: Added JS code to swap to a tab if an anchor is in the URL.

**2.0.3.6**
* ENHANCEMENT: Added responsive appearance to compare_table Membership Levels layout.
* Added hooks for before and after content hooks to single page and single post.
* BUG: Fixed notices in memberlite_levels shortcode.

**2.0.3.5**
* FEATURE: Added memberlite_banner shortcode
* BUG: Fixed comment/ping/trackback count for 'approve' status only.
* BUG: Updated Comment Walker to respect PHP strict standards
* BUG: Fixed homepage bottom banner when page template is defined.
* BUG: Fixed highlighted level in the compare_table layout when highlighted level is first column.
* BUG: Fixed current_user level class on compare_table layout in membership levels shortcode.
* BUG: Fixed notice when bbpress is not activated for memberlite_page_title function

**2.0.3.4**
* SECURITY: Now using get_search_query() and the_search_query() to prevent XSS issues in h1s and breadcrumbs on search results pages. (Thanks, retr0)
* ENHANCEMENT: Tweaks to checkout page CSS.

**2.0.3.3**
* BUG: Updated memberlite_defaults for banner hover background color.

**2.0.3.2**
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

**2.0.3.1**
* ENHANCEMENT: Support added for dark background via customizer setting and additional dark.css
* BUG: Fixing issue with [memberlite_subpagelist] shortcode thumbnail size setting
* BUG: Header text color fix in customizer

**2.0.3**
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

**2.0.2**
* ENHANCEMENT: Now respecting your choice if you set a specific page template on the "static front page".
* BUG: Updates to member menu area to only show the "member menu" selection if current user has membership level.

**2.0.1**
* BUG: Added hook to reset update_themes cache when pmpro license is updated.
* ENHANCEMENT: Added the "pmpro_license_check_key_timeout" filter which can be used to set the timeout of the call to the PMPro License Server to something other than 5s. This is useful if you find your website timing out or having trouble getting updates.

**2.0**
* Initial version.