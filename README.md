#Memberlite: An Easy to Customize Theme for Membership Sites
===

##Getting Started
---------------

Memberlite makes it easy to customize the appearance and layout of your site using the Theme Customization Screen (Appearance > Customize). 

###Adding Your Logo
Use the Appearance Header Screen to add a Custom Header logo (formatted for retina display) and to toggle the display of header text and text color.

[Explore Documentation on Custom Headers in Memberlite](http://www.paidmembershipspro.com/themes/memberlite/adding-your-logo/)

###Customize the Theme
Use the Customize Screen to modify theme layout, logo, fonts, colors, copyright message and more.

[Explore Documentation on Customizing Memberlite »](http://www.paidmembershipspro.com/themes/memberlite/customize-the-theme/)

###Using Child Themes
If you need to customize the theme beyond the settings in "Customize", use a child theme.

[Download a Blank Child Theme »](https://github.com/strangerstudios/memberlite-child) | [About Child Themes (WordPress Codex) »](http://codex.wordpress.org/Child_Themes)

###Shortcodes
Memberlite shortcodes enhance the appearance of your site content and can be used to customize the display of Paid Memberships Pro-generated pages. Shortcodes are included for:

[row] and [column] for formatting text in responsive columns. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/column-shortcodes/)

[fa] for Font Awesome icons. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/font-awesome-icons/)

[memberlite_btn] for formatted buttons. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/buttons/)

[memberlite_levels] to display a block with details and a registration link for the specified membership levels. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/membership-levels-display/)

[memberlite_msg] for contextual message blocks. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/contextual-messages/)

[memberlite_recent_posts] designed to be used on the homepage and outputs the newest posts overall or in a defined category. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/recent-posts/)

[memberlite_signup] to display a block with signup fields for a specific membership level. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/membership-signup-block/)

[memberlite_subpagelist] to show a list of a given pages' subpages in the order you define. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/subpagelist/)

[memberlite_tabs] and [memberlite_tab] for tabbed content blocks. [docs](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/tabs/)

[View Shortcode Documentation »](http://www.paidmembershipspro.com/themes/memberlite/shortcodes/)

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
**2.0.3.5**
<<<<<<< HEAD
* BUG: Updated Comment Walker to respect PHP strict standards
=======
* BUG: Fixed homepage bottom banner when page template is defined.
* BUG: Fixed highlighted level in the compare_table layout when highlighted level is first column.
* BUG: Fixed current_user level class on compare_table layout in membership levels shortcode.
* BUG: Fixed notie when bbpress is not activated for memberlite_page_title function
>>>>>>> bd40cb9a54aa081519b475cf0ab86e04703d9be0

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