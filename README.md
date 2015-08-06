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

###Changelog
**2.0.1**
* BUG: Added hook to reset update_themes cache when pmpro license is updated.
* ENHANCEMENT: Added the "pmpro_license_check_key_timeout" filter which can be used to set the timeout of the call to the PMPro License Server to something other than 5s. This is useful if you find your website timing out or having trouble getting updates.

**2.0**
* Initial version.