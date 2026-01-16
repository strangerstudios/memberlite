<?php
/**
 * Memberlite Theme Customizer
 *
 * @package Memberlite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * //@todo: potential to separate related settings/controls into their own functions
 */
class Memberlite_Customize
{
    public static function register($wp_customize)
    {
        // Add Memberlite Options Panel
        $wp_customize->add_panel(
                'memberlite_panel',
                array(
                        'title' => __('Memberlite Options', 'memberlite'),
                        'description' => sprintf(__('Customize settings for Memberlite. Visit the <a href="%s" target="_blank">Memberlite Tools</a> screen to import, export, or reset theme customizations.', 'memberlite'), admin_url('admin.php?page=memberlite-tools')),
                        'priority' => 0,
                )
        );

        // Add Sections within the Panel
        $wp_customize->add_section(
                'memberlite_theme_options',
                array(
                        'title' => __('General Settings', 'memberlite'),
                        'panel' => 'memberlite_panel'
                )
        );

        $wp_customize->add_section(
                'memberlite_header_options',
                array(
                        'title' => __('Header Settings', 'memberlite'),
                        'panel' => 'memberlite_panel'
                )
        );

        $wp_customize->add_section(
                'memberlite_post_page_options',
                array(
                        'title' => __('Post & Page Settings', 'memberlite'),
                        'panel' => 'memberlite_panel'
                )
        );

        $wp_customize->add_section(
                'memberlite_footer_options',
                array(
                        'title' => __('Footer Settings', 'memberlite'),
                        'panel' => 'memberlite_panel'
                )
        );

        // GENERAL: Color Scheme ================
        self::add_memberlite_setting_control($wp_customize, 'memberlite_color_scheme', __('Memberlite Color Scheme', 'memberlite'), 'memberlite_theme_options', array(
                'type' => 'select',
                'choices' => array_merge(
                        Memberlite_Customize::get_color_scheme_choices(),
                        array(
                                'custom' => 'Custom',
                        )
                ),
                'description' => __('Preset by Theme Variation. Customize here or in the "Colors" section.', 'memberlite'),
        ));

        // GENERAL: Dark Mode ================
        self::add_memberlite_setting_control($wp_customize, 'memberlite_darkcss', __('Use dark mode colors.', 'memberlite'), 'memberlite_theme_options', array(
                'type' => 'checkbox',
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
                'description' => __('Will apply a dark mode version of the selected color scheme.', 'memberlite'),
        ));

        // GENERAL: Heading Font ================
        self::add_memberlite_setting_control($wp_customize, 'memberlite_header_font', __('Heading Font', 'memberlite'), 'memberlite_theme_options', array(
                'type' => 'select',
                'choices' => self::get_all_fonts(),
                'description' => __('This font is used for all headings across the site. (e.g. h1, h2, h3...)', 'memberlite'),
        ));

        // GENERAL: Body Font ================
        self::add_memberlite_setting_control($wp_customize, 'memberlite_body_font', __('Content Font', 'memberlite'), 'memberlite_theme_options', array(
                'type' => 'select',
                'choices' => self::get_all_fonts(),
                'description' => __('This font is used for all content across the site.', 'memberlite'),
        ));

        // GENERAL: Columns Ratio ================
        self::add_memberlite_setting_control($wp_customize, 'columns_ratio', __('Columns Ratio', 'memberlite'), 'memberlite_theme_options', array(
                'type' => 'select',
                'transport' => 'refresh',
                'description' => __('Controls how wide your main content area is compared to your sidebar. For example, "8-4" makes content 8 units wide and the sidebar 4 units wide.', 'memberlite'),
                'choices' => array(
                        'none' => __('None', 'memberlite'), '6-6' => __('6x6', 'memberlite'), '7-5' => __('7x5', 'memberlite'), '8-4' => __('8x4', 'memberlite'),
                        '9-3' => __('9x3', 'memberlite'), '10-2' => __('10x2', 'memberlite'), '11-1' => __('11x1', 'memberlite'),
                ),
        ));

        // GENERAL: Sidebar Location ================
        //@todo: Is this redundant with the sidebar location setting in the post/page section?
        /* self::add_memberlite_setting_control($wp_customize, 'sidebar_location', __('Sidebar Placement', 'memberlite'), 'memberlite_theme_options', array(
                'type' => 'radio',
                'description' => __('By default, sidebars will display on archives (not for grid style) and single posts.', 'memberlite'),
                'choices' => array(
                        'sidebar-right' => __('Right Sidebar', 'memberlite'),
                        'sidebar-left' => __('Left Sidebar', 'memberlite'),
                        'sidebar-none' => __('No Sidebar', 'memberlite'),
                ),
        )); */

        // GENERAL: Breadcrumb Locations ================
        $memberlite_breadcrumbs = array(
                'page_breadcrumbs' => array(
                        'label' => __('Breadcrumbs on Pages', 'memberlite'),
                ),
                'post_breadcrumbs' => array(
                        'label' => __('Breadcrumbs on Posts', 'memberlite'),
                ),
                'archive_breadcrumbs' => array(
                        'label' => __('Breadcrumbs on Archives', 'memberlite'),
                ),
                'attachment_breadcrumbs' => array(
                        'label' => __('Breadcrumbs on Attachments', 'memberlite'),
                ),
                'search_breadcrumbs' => array(
                        'label' => __('Breadcrumbs on Search Results', 'memberlite'),
                ),
                'profile_breadcrumbs' => array(
                        'label' => __('Breadcrumbs on Profiles', 'memberlite'),
                ),

        );

        // Heading before the breadcrumb options
        self::add_memberlite_heading($wp_customize, 'memberlite_breadcrumbs_heading', __('Breadcrumb Settings', 'memberlite'), 'memberlite_theme_options');

        foreach ($memberlite_breadcrumbs as $breadcrumb_slug => $memberlite_breadcrumb) {
            self::add_memberlite_setting_control(
                    $wp_customize,
                    $breadcrumb_slug,
                    $memberlite_breadcrumb['label'],
                    'memberlite_theme_options',
                    array(
                            'type'              => 'checkbox',
                            'default'           => false,
                            'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
                    )
            );
        };

        // GENERAL: Breadcrumb Delimiter ================
        self::add_memberlite_setting_control($wp_customize, 'delimiter', __('Breadcrumb Delimiter', 'memberlite'), 'memberlite_theme_options', array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
        ));

        // Heading before the global links options
        self::add_memberlite_heading($wp_customize, 'memberlite_links_heading', __('Global Links', 'memberlite'), 'memberlite_theme_options');

        // GENERAL: Back to Top
        self::add_memberlite_setting_control($wp_customize, 'memberlite_back_to_top', __('Show Back to Top Link', 'memberlite'), 'memberlite_theme_options', array(
                'type' => 'checkbox',
                'default' => true,
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
        ));

        // HEADER: Columns Ratio ================
        self::add_memberlite_setting_control($wp_customize, 'columns_ratio_header', __('Columns Ratio', 'memberlite'), 'memberlite_header_options', array(
                'type' => 'select',
                'transport' => 'refresh',
                'description' => __('Controls how the left and right sections of your header are sized. For example, "4-8" makes the left side narrower and the right side wider.', 'memberlite'),
                'choices' => array(
                        '1-11' => '1x11', '2-10' => '2x10', '3-9' => '3x9', '4-8' => '4x8', '5-7' => '5x7', '6-6' => '6x6',
                        '7-5' => '7x5', '8-4' => '8x4', '9-3' => '9x3', '10-2' => '10x2', '11-1' => '11x1',
                ),
        ));

        // Heading for misc. fields to enable/disable header features
        self::add_memberlite_heading($wp_customize, 'memberlite_header_heading', __('Header Features', 'memberlite'), 'memberlite_header_options');

        // HEADER: Show Login/Member Info ================
        self::add_memberlite_setting_control($wp_customize, 'meta_login', __('Show Login/Member Info in Header', 'memberlite'), 'memberlite_header_options', array(
                'type' => 'checkbox',
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
        ));

        // HEADER: Show search form ================
        self::add_memberlite_setting_control($wp_customize, 'nav_menu_search', __('Show Search Form After Main Nav', 'memberlite'), 'memberlite_header_options', array(
                'type' => 'checkbox',
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
        ));

        // HEADER: Enable sticky header ================
        self::add_memberlite_setting_control($wp_customize, 'sticky_nav', __('Enable Sticky Header', 'memberlite'), 'memberlite_header_options', array(
                'type' => 'checkbox',
                'description' => __('On scroll, the header menu will stick to the top of the screen.', 'memberlite'),
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
        ));

        //POST & PAGE: Sidebar Location ================
        self::add_memberlite_setting_control($wp_customize, 'sidebar_location_blog', __('Sidebar Placement for Blog, Archives, Posts', 'memberlite'), 'memberlite_post_page_options', array(
                'type' => 'radio',
                'choices' => array(
                        'sidebar-blog-right' => __('Right Sidebar', 'memberlite'),
                        'sidebar-blog-left' => __('Left Sidebar', 'memberlite'),
                        'sidebar-blog-none' => __('No Sidebar', 'memberlite'),
                ),
        ));

        //POST & PAGE: Content Archives ================
        self::add_memberlite_setting_control($wp_customize, 'content_archives', __('Content Archives', 'memberlite'), 'memberlite_post_page_options', array(
                'type' => 'radio',
                'description' => __('Determines how content displays on archives.', 'memberlite'),
                'choices' => array(
                        'content' => __('Show Full Post Content', 'memberlite'),
                        'excerpt' => __('Show Post Excerpts', 'memberlite'),
                        'grid' => __('Show Posts in a Grid (Sidebar hidden)', 'memberlite'),
                ),
        ));

        // Add heading for pagination related settings
        self::add_memberlite_heading($wp_customize, 'memberlite_pagination_heading', __('Pagination Settings', 'memberlite'), 'memberlite_post_page_options');

        // POST & PAGE: (prev/next links) Post Nav ================
        self::add_memberlite_setting_control($wp_customize, 'memberlite_post_nav', __('Show Prev/Next on Single Posts', 'memberlite'), 'memberlite_post_page_options', array(
                'type' => 'checkbox',
                'default' => true,
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
        ));

        // POST & PAGE: (prev/next links) Page Nav ================
        self::add_memberlite_setting_control($wp_customize, 'memberlite_page_nav', __('Show Prev/Next on Single Pages', 'memberlite'), 'memberlite_post_page_options', array(
                'type' => 'checkbox',
                'default' => true,
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
        ));

        // Heading for other page and post settings
        self::add_memberlite_heading($wp_customize, 'memberlite_post_heading', __('Other Settings', 'memberlite'), 'memberlite_post_page_options');

        // POST & PAGE: Author Block ================
        self::add_memberlite_setting_control($wp_customize, 'author_block', __('Show Author Block on Single Posts', 'memberlite'), 'memberlite_post_page_options', array(
                'type' => 'checkbox',
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_checkbox'),
        ));

        // POST & PAGE: Banner & Thumbnail Options ================
        $memberlite_loop_images_choices = array(
                'show_none' => __('Do Not Show Featured Images', 'memberlite'),
                'show_banner' => __('Show Banner Only', 'memberlite'),
                'show_thumbnail' => __('Show Thumbnail Only', 'memberlite'),
                'show_block' => __('Show Block Image In Excerpt', 'memberlite'),
        );

        if (class_exists('MemberliteMultiPostThumbnails')) {
            $memberlite_loop_images_choices['show_both'] = __('Show Banner and Thumbnail', 'memberlite');
        }

        self::add_memberlite_setting_control($wp_customize, 'memberlite_loop_images', __('Featured Images on Posts Page and Archives', 'memberlite'), 'memberlite_post_page_options', array(
                'type' => 'select',
                'transport' => 'refresh',
                'choices' => $memberlite_loop_images_choices,
        ));

        // POST & PAGE: Post Meta Before ================
        self::add_memberlite_setting_control($wp_customize, 'posts_entry_meta_before', __('Post Entry Meta (before)', 'memberlite'), 'memberlite_post_page_options', array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
        ));

        // POST & PAGE: Post Meta After ================
        self::add_memberlite_setting_control($wp_customize, 'posts_entry_meta_after', __('Post Entry Meta (after)', 'memberlite'), 'memberlite_post_page_options', array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
        ));

        // FOOTER: Footer Widgets ================
        self::add_memberlite_setting_control($wp_customize, 'memberlite_footerwidgets', __('Footer Widgets', 'memberlite'), 'memberlite_footer_options', array(
                'type' => 'select',
                'sanitize_callback' => 'absint',
                'choices' => array('2' => '2', '3' => '3', '4' => '4', '6' => '6'),
        ));

        // FOOTER: Copyright Text ================
        self::add_memberlite_setting_control($wp_customize, 'copyright_textbox', __('Copyright Text', 'memberlite'), 'memberlite_footer_options', array(
                'transport' => 'postMessage',
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_text_with_links'),
        ));

        // COLORS: Header Background Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_bgcolor_header', __('Header Background Color', 'memberlite'), 'bgcolor_header');

        // COLORS: Primary Navigation Background Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_bgcolor_site_navigation', __('Primary Navigation Background Color', 'memberlite'), 'bgcolor_site_navigation');

        // COLORS: Primary Navigation Font Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_site_navigation', __('Primary Navigation Font Color', 'memberlite'), 'color_site_navigation');

        // COLORS: Text Color
        //@todo: Add description since it was re-labeled
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_text', __('Content Color', 'memberlite'), 'color_text');

        // COLORS: Link Color
        //@todo: Add description clarifying that this only affects content, not the header or footer
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_link', __('Link Color', 'memberlite'), 'color_link');

        // COLORS: Post Meta Link Color
        //@todo: Meta link color doesn't affect categories on single post?
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_meta_link', __('Meta Link Color', 'memberlite'), 'color_meta_link');

        // COLORS: Default Button Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_button', __('Default Button Color', 'memberlite'), 'color_button');

        // COLORS: Primary Color
        //@todo: Also affects buttons? Is there a point in the "default button color" setting?
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_primary', __('Primary Color', 'memberlite'), 'color_primary');

        // COLORS: Secondary Color
        //@todo: Clarify what this color affects vs primary color, also affects buttons?
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_secondary', __('Secondary Color', 'memberlite'), 'color_secondary');

        // COLORS: Action Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_action', __('Action Color', 'memberlite'), 'color_action');

        // COLORS: Page Masthead Background Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_bgcolor_page_masthead', __('Page Masthead Background Color', 'memberlite'), 'bgcolor_page_masthead');

        // COLORS: Page Masthead Text Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_page_masthead', __('Page Masthead Text Color', 'memberlite'), 'color_page_masthead');

        // COLORS: Footer Widgets Background Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_bgcolor_footer_widgets', __('Footer Widgets Background Color', 'memberlite'), 'bgcolor_footer_widgets');

        // COLORS: Footer Widgets Text Color
        self::add_memberlite_color_control($wp_customize, 'memberlite_color_footer_widgets', __('Footer Widgets Text Color', 'memberlite'), 'color_footer_widgets');

        $wp_customize->get_setting('blogname')->transport = 'postMessage';

        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

        $wp_customize->selective_refresh->add_partial(
                'blogname', array(
                        'selector' => '.site-title a',
                        'render_callback' => array('Memberlite_Customize', 'bloginfo_name'),
                )
        );

        $wp_customize->selective_refresh->add_partial(
                'blogdescription', array(
                        'selector' => '.site-description',
                        'render_callback' => array('Memberlite_Customize', 'bloginfo_description'),
                )
        );

        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
        $wp_customize->get_setting('background_color')->transport = 'postMessage';
        $wp_customize->get_setting('posts_entry_meta_before')->transport = 'postMessage';
        $wp_customize->get_setting('posts_entry_meta_after')->transport = 'postMessage';
        $wp_customize->get_setting('delimiter')->transport = 'postMessage';

        // Rename the label to "Site Title & Tagline Color".
        $wp_customize->get_control('header_textcolor')->label = __('Site Title &amp; Tagline Color', 'memberlite');

        // Rename the label to "Display Site Title & Tagline" for clarity.
        $wp_customize->get_control('display_header_text')->label = __('Display Site Title &amp; Tagline', 'memberlite');

    }

    /**
     * Helper to add headings for organizational purposes
     *
     * @param object $wp_customize
     * @param string $id
     * @param string $label
     * @param string $section
     * @return void
     */
    public static function add_memberlite_heading(object $wp_customize, string $id, string $label, string $section): void
    {
        $wp_customize->add_setting(
                $id,
                array(
                        'sanitize_callback' => 'sanitize_text_field',
                )
        );
        $wp_customize->add_control(
                new Memberlite_Customize_Header_Control(
                        $wp_customize,
                        $id,
                        array(
                                'label' => $label,
                                'section' => $section,
                        )
                )
        );
    }

    /**
     * Helper to add setting/control pairs for colors
     *
     * @param object $wp_customize
     * @param string $id
     * @param string $label
     * @param string $setting_id
     * @return void
     */
    public static function add_memberlite_color_control(object $wp_customize, string $id, string $label, string $setting_id): void
    {
        global $memberlite_defaults;

        $wp_customize->add_setting(
                $setting_id,
                array(
                        'default'              => isset($memberlite_defaults[$setting_id]) ? $memberlite_defaults[$setting_id] : '',
                        'sanitize_callback'    => 'sanitize_hex_color',
                        'sanitize_js_callback' => 'maybe_hash_hex_color',
                        'transport'            => 'postMessage',
                )
        );

        $wp_customize->add_control(
                new WP_Customize_Color_Control(
                        $wp_customize,
                        $id,
                        array(
                                'label'    => $label,
                                'section'  => 'colors',
                                'settings' => $setting_id,
                        )
                )
        );
    }

    /**
     * Helper to add_setting/control pairs for customizer fields
     *
     * @param object $wp_customize
     * @param string $id
     * @param string $label
     * @param string $section
     * @param $args
     * @return void
     */
    public static function add_memberlite_setting_control(object $wp_customize, string $id, string $label, string $section, $args = array()): void
    {
        global $memberlite_defaults;

        // Define default arguments for the setting and control
        $defaults = array(
                'default' => isset($memberlite_defaults[$id]) ? $memberlite_defaults[$id] : false,
                'type' => 'text',
                'choices' => array(),
                'sanitize_callback' => array('Memberlite_Customize', 'sanitize_select'), // Default to select/text
                'transport' => 'refresh',
                'description' => '',
        );

        // Merge passed args with defaults
        $args = wp_parse_args($args, $defaults);

        // 1. Add Setting
        $wp_customize->add_setting(
                $id,
                array(
                        'default' => $args['default'],
                        'sanitize_callback' => $args['sanitize_callback'],
                        'sanitize_js_callback' => array('Memberlite_Customize', 'sanitize_js_callback'),
                        'transport' => $args['transport'],
                )
        );

        // 2. Add Control
        $wp_customize->add_control(
                $id,
                array(
                        'label' => $label,
                        'section' => $section,
                        'type' => $args['type'],
                        'choices' => $args['choices'],
                        'description' => $args['description'],
                )
        );
    }

    /**
     * Call bloginfo to echo the site name.
     * For use in a customizer callback above.
     * @since 3.1
     */
    public static function bloginfo_name()
    {
        bloginfo('name');
    }

    /**
     * Call bloginfo to echo the site description.
     * For use in a customizer callback above.
     * @since 3.1
     */
    public static function bloginfo_description()
    {
        bloginfo('description');
    }

    public static function header_output()
    {
        global $memberlite_defaults;

        $content_width = $GLOBALS['content_width'] . 'px';
        $header_font = memberlite_get_font('header_font', true);
        $body_font = memberlite_get_font('body_font', true);
        $header_textcolor = get_theme_mod('header_textcolor');

        // Get theme colors from custom settings or defaults.
        $color_site_background = get_theme_mod('background_color');
        if (empty($color_site_background)) {
            $color_site_background = $memberlite_defaults['background_color'];
        }

        $color_header_background = get_theme_mod('bgcolor_header');
        if (empty($color_header_background)) {
            $color_header_background = $memberlite_defaults['bgcolor_header'];
        }

        $color_primary = get_theme_mod('color_primary');
        if (empty($color_primary)) {
            $color_primary = $memberlite_defaults['color_primary'];
        }

        $color_secondary = get_theme_mod('color_secondary');
        if (empty($color_secondary)) {
            $color_secondary = $memberlite_defaults['color_secondary'];
        }

        $color_action = get_theme_mod('color_action');
        if (empty($color_action)) {
            $color_action = $memberlite_defaults['color_action'];
        }

        $color_button = get_theme_mod('color_button');
        if (empty($color_button)) {
            $color_button = $memberlite_defaults['color_button'];
        }

        $color_text = get_theme_mod('color_text');
        if (empty($color_text)) {
            $color_text = $memberlite_defaults['color_text'];
        }

        $color_link = get_theme_mod('color_link');
        if (empty($color_link)) {
            $color_link = $memberlite_defaults['color_link'];
        }

        $color_meta_link = get_theme_mod('color_meta_link');
        if (empty($color_meta_link)) {
            $color_meta_link = $memberlite_defaults['color_meta_link'];
        }

        $color_site_navigation_background = get_theme_mod('bgcolor_site_navigation');
        if (empty($color_site_navigation_background)) {
            $color_site_navigation_background = $memberlite_defaults['bgcolor_site_navigation'];
        }

        $color_site_navigation = get_theme_mod('color_site_navigation');
        if (empty($color_site_navigation)) {
            $color_site_navigation = $memberlite_defaults['color_site_navigation'];
        }

        // v4.6 added four new colors. For this reason, we need to set the fallback colors if they are using a built in scheme.
        // Get the current color scheme
        $this_color_scheme = get_theme_mod('memberlite_color_scheme');

        // Set the defaults to the primary color from the current scheme if it isn't the new default.
        if ($this_color_scheme != 'default_v4.6') {
            $memberlite_defaults['bgcolor_page_masthead'] = $color_primary;
            $memberlite_defaults['color_page_masthead'] = $memberlite_defaults['color_white'];
            $memberlite_defaults['bgcolor_footer_widgets'] = $color_primary;
            $memberlite_defaults['color_footer_widgets'] = $memberlite_defaults['color_white'];
        }

        $color_page_masthead_background = get_theme_mod('bgcolor_page_masthead');
        if (empty($color_page_masthead_background)) {
            $color_page_masthead_background = $memberlite_defaults['bgcolor_page_masthead'];
        }

        $color_page_masthead = get_theme_mod('color_page_masthead');
        if (empty($color_page_masthead)) {
            $color_page_masthead = $memberlite_defaults['color_page_masthead'];
        }

        $color_footer_widgets_background = get_theme_mod('bgcolor_footer_widgets');
        if (empty($color_footer_widgets_background)) {
            $color_footer_widgets_background = $memberlite_defaults['bgcolor_footer_widgets'];
        }

        $color_footer_widgets = get_theme_mod('color_footer_widgets');
        if (empty($color_footer_widgets)) {
            $color_footer_widgets = $memberlite_defaults['color_footer_widgets'];
        }

        // Get theme settings from defaults.
        $hover_brightness = $memberlite_defaults['hover_brightness'];
        $color_white = $memberlite_defaults['color_white'];
        $color_borders = $memberlite_defaults['color_borders'];
        ?>
        <!--Customizer CSS-->
        <style id="memberlite-customizer-css" type="text/css">
            :root {
                --memberlite-content-width: <?php echo esc_html( $content_width ); ?>;
                --memberlite-body-font: <?php echo esc_html( $body_font ); ?>, sans-serif;
                --memberlite-header-font: <?php echo esc_html( $header_font ); ?>, sans-serif;
            <?php if ( $header_textcolor != 'blank' ) { ?> --memberlite-color-header-text: <?php echo '#' . esc_attr( $header_textcolor ); ?>;
            <?php } ?> --memberlite-color-site-background: <?php echo '#' . esc_attr( $color_site_background ); ?>;
                --memberlite-color-header-background: <?php echo esc_attr( $color_header_background ); ?>;
                --memberlite-color-site-navigation-background: <?php echo esc_attr( $color_site_navigation_background ); ?>;
                --memberlite-color-site-navigation: <?php echo esc_attr( $color_site_navigation ); ?>;
                --memberlite-color-text: <?php echo esc_attr( $color_text ); ?>;
                --memberlite-color-link: <?php echo esc_attr( $color_link ); ?>;
                --memberlite-color-meta-link: <?php echo esc_attr( $color_meta_link ); ?>;
                --memberlite-color-primary: <?php echo esc_attr( $color_primary ); ?>;
                --memberlite-color-secondary: <?php echo esc_attr( $color_secondary ); ?>;
                --memberlite-color-action: <?php echo esc_attr( $color_action ); ?>;
                --memberlite-color-button: <?php echo esc_attr( $color_button ); ?>;
                --memberlite-hover-brightness: <?php echo esc_attr( $hover_brightness ); ?>;
                --memberlite-color-white: <?php echo esc_attr( $color_white ); ?>;
                --memberlite-color-text: <?php echo esc_attr( $color_text ); ?>;
                --memberlite-color-borders: <?php echo esc_attr( $color_borders ); ?>;
                --memberlite-color-page-masthead-background: <?php echo esc_attr( $color_page_masthead_background ); ?>;
                --memberlite-color-page-masthead: <?php echo esc_attr( $color_page_masthead ); ?>;
                --memberlite-color-footer-widgets-background: <?php echo esc_attr( $color_footer_widgets_background ); ?>;
                --memberlite-color-footer-widgets: <?php echo esc_attr( $color_footer_widgets ); ?>;
            }
        </style>
        <!--/Customizer CSS-->
        <?php
    }

    public static function live_preview()
    {
        global $memberlite_defaults;
        wp_register_script(
                'Memberlite_Customizer',
                MEMBERLITE_URL . '/js/customizer.js',
                array('jquery', 'customize-preview'),
                MEMBERLITE_VERSION,
                true
        );
        // Localize the script with new data
        wp_localize_script('Memberlite_Customizer', 'memberlite_defaults', $memberlite_defaults);
        wp_enqueue_script('Memberlite_Customizer');
    }

    /**
     * Get Google fonts
     */
    public static function get_google_fonts()
    {
        return array(
                'Abril-Fatface' => __('Abril Fatface', 'memberlite'),
                'DM-Sans' => __('DM Sans', 'memberlite'),
                'Figtree' => __('Figtree', 'memberlite'),
                'Fjalla-One' => __('Fjalla One', 'memberlite'),
                'Gentium-Book-Basic' => __('Gentium Book Basic', 'memberlite'),
                'Inter' => __('Inter', 'memberlite'),
                'Lato' => __('Lato', 'memberlite'),
                'Merriweather' => __('Merriweather', 'memberlite'),
                'Montserrat' => __('Montserrat', 'memberlite'),
                'Noto-Sans' => __('Noto Sans', 'memberlite'),
                'Open-Sans' => __('Open Sans', 'memberlite'),
                'Oswald' => __('Oswald', 'memberlite'),
                'Pathway-Gothic-One' => __('Pathway Gothic One', 'memberlite'),
                'Playfair-Display' => __('Playfair Display', 'memberlite'),
                'Poppins' => __('Poppins', 'memberlite'),
                'PT-Mono' => __('PT Mono', 'memberlite'),
                'PT-Sans' => __('PT Sans', 'memberlite'),
                'PT-Serif' => __('PT Serif', 'memberlite'),
                'Quattrocento' => __('Quattrocento', 'memberlite'),
                'Roboto' => __('Roboto', 'memberlite'),
                'Roboto-Slab' => __('Roboto Slab', 'memberlite'),
                'Source-Sans-Pro' => __('Source Sans Pro', 'memberlite'),
                'Ubuntu' => __('Ubuntu', 'memberlite'),
        );
    }

    /**
     * Get array of web safe fonts
     */
    public static function get_web_safe_fonts()
    {
        return array(
                'Arial' => __('Arial', 'memberlite'),
                'Bookman' => __('Bookman', 'memberlite'),
                'Courier' => __('Courier', 'memberlite'),
                'Courier-New' => __('Courier New', 'memberlite'),
                'Garamond' => __('Garamond', 'memberlite'),
                'Georgia' => __('Georgia', 'memberlite'),
                'Helvetica' => __('Helvetica', 'memberlite'),
                'Times' => __('Times', 'memberlite'),
                'Times-New-Roman' => __('Times New Roman', 'memberlite'),
                'Trebuchet-MS' => __('Trebuchet MS', 'memberlite'),
                'Verdana' => __('Verdana', 'memberlite'),
        );
    }

    /**
     * Get array of all fonts
     */
    public static function get_all_fonts()
    {
        return array_merge(Memberlite_Customize::get_google_fonts(), Memberlite_Customize::get_web_safe_fonts());
    }

    /**
     * Register color schemes for Memberlite.
     * Based on code from the Twentyfifteen theme. (https://themes.svn.wordpress.org/twentyfifteen/1.2/inc/customizer.php)
     *
     * Can be filtered with {@see 'memberlite_color_schemes'}.
     *
     * The order of colors in a colors array:
     * 1. Header Text Color
     * 2. Background Color
     * 3. Header Background Color
     * 4. Primary Navigation Background Color
     * 5. Primary Navigation Link Color
     * 6. Text Color
     * 7. Link Color
     * 8. Meta Link Color
     * 9. Primary Color
     * 10. Secondary Color
     * 11. Action Color
     * 12. Default Button Color
     * 13. Page Masthead Text Color
     * 14. Page Masthead Background Color
     * 15. Footer Widgets Text Color
     * 16. Footer Widgets Background Color
     *
     * @return array An associative array of color scheme options.
     * @since Memberlite 1.0
     *
     */
    public static function get_color_schemes()
    {
        return apply_filters(
                'memberlite_color_schemes', array(
                        'default_v4.6' => array(
                                'label' => __('Default', 'memberlite'),
                                'colors' => array(
                                        '#011935',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#F9FAFB',
                                        '#444444',
                                        '#222222',
                                        '#011935',
                                        '#011935',
                                        '#011935',
                                        '#00A59D',
                                        '#E87102',
                                        '#3C4B5A',
                                        '#011935',
                                        '#FFFFFF',
                                        '#F9FAFB',
                                        '#444444',
                                ),
                        ),
                        'default' => array(
                                'label' => __('Default (Legacy)', 'memberlite'),
                                'colors' => array(
                                        '#2C3E50',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#FAFAFA',
                                        '#777777',
                                        '#222222',
                                        '#2C3E50',
                                        '#2C3E50',
                                        '#2C3E50',
                                        '#18BC9C',
                                        '#F39C12',
                                        '#798D8F',
                                        '#2C3E50',
                                        '#FFFFFF',
                                        '#2C3E50',
                                        '#FFFFFF',
                                ),
                        ),
                        'education' => array(
                                'label' => __('Education', 'memberlite'),
                                'colors' => array(
                                        '#3A9AD9',
                                        '#F4EFEA',
                                        '#F4EFEA',
                                        '#E2DED9',
                                        '#354458',
                                        '#222222',
                                        '#3A9AD9',
                                        '#3A9AD9',
                                        '#354458',
                                        '#EB7260',
                                        '#29ABA4',
                                        '#798D8F',
                                        '#354458',
                                        '#FFFFFF',
                                        '#354458',
                                        '#FFFFFF',
                                ),
                        ),
                        'modern_teal' => array(
                                'label' => __('Modern Teal', 'memberlite'),
                                'colors' => array(
                                        '#424242',
                                        '#EFEFEF',
                                        '#EFEFEF',
                                        '#424242',
                                        '#EFEFEF',
                                        '#222222',
                                        '#00CCD6',
                                        '#00CCD6',
                                        '#00CCD6',
                                        '#424242',
                                        '#FFD900',
                                        '#798D8F',
                                        '#00CCD6',
                                        '#FFFFFF',
                                        '#00CCD6',
                                        '#FFFFFF',
                                ),
                        ),
                        'mono_blue' => array(
                                'label' => __('Mono Blue', 'memberlite'),
                                'colors' => array(
                                        '#00AEEF',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#00AEEF',
                                        '#FFFFFF',
                                        '#222222',
                                        '#00AEEF',
                                        '#00AEEF',
                                        '#333333',
                                        '#555555',
                                        '#00AEEF',
                                        '#798D8F',
                                        '#333333',
                                        '#FFFFFF',
                                        '#333333',
                                        '#FFFFFF',
                                ),
                        ),
                        'mono_green' => array(
                                'label' => __('Mono Green', 'memberlite'),
                                'colors' => array(
                                        '#00A651',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#00A651',
                                        '#FFFFFF',
                                        '#222222',
                                        '#00A651',
                                        '#00A651',
                                        '#333333',
                                        '#555555',
                                        '#00A651',
                                        '#798D8F',
                                        '#333333',
                                        '#FFFFFF',
                                        '#333333',
                                        '#FFFFFF',
                                ),
                        ),
                        'mono_orange' => array(
                                'label' => __('Mono Orange', 'memberlite'),
                                'colors' => array(
                                        '#F39C12',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#F39C12',
                                        '#FFFFFF',
                                        '#222222',
                                        '#F39C12',
                                        '#F39C12',
                                        '#333333',
                                        '#555555',
                                        '#F39C12',
                                        '#798D8F',
                                        '#333333',
                                        '#FFFFFF',
                                        '#333333',
                                        '#FFFFFF',
                                ),
                        ),
                        'mono_pink' => array(
                                'label' => __('Mono Pink', 'memberlite'),
                                'colors' => array(
                                        '#ED0977',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#ED0977',
                                        '#FFFFFF',
                                        '#222222',
                                        '#ED0977',
                                        '#ED0977',
                                        '#333333',
                                        '#555555',
                                        '#ED0977',
                                        '#798D8F',
                                        '#333333',
                                        '#FFFFFF',
                                        '#333333',
                                        '#FFFFFF',
                                ),
                        ),
                        'pop' => array(
                                'label' => __('Pop!', 'memberlite'),
                                'colors' => array(
                                        '#53BBF4',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#B1EB00',
                                        '#666666',
                                        '#222222',
                                        '#B1EB00',
                                        '#B1EB00',
                                        '#53BBF4',
                                        '#FFAC00',
                                        '#FF85CB',
                                        '#798D8F',
                                        '#53BBF4',
                                        '#FFFFFF',
                                        '#53BBF4',
                                        '#FFFFFF',
                                ),
                        ),
                        'primary' => array(
                                'label' => __('Not So Primary', 'memberlite'),
                                'colors' => array(
                                        '#1352A2',
                                        '#F0F1EE',
                                        '#F0F1EE',
                                        '#FFFFFF',
                                        '#555555',
                                        '#222222',
                                        '#FB6964',
                                        '#FB6964',
                                        '#1352A2',
                                        '#FB6964',
                                        '#FFD464',
                                        '#798D8F',
                                        '#1352A2',
                                        '#FFFFFF',
                                        '#1352A2',
                                        '#FFFFFF',
                                ),
                        ),
                        'raspberry_lime' => array(
                                'label' => __('Raspberry Lime', 'memberlite'),
                                'colors' => array(
                                        '#AA2159',
                                        '#FFFFFF',
                                        '#FFFFFF',
                                        '#700035',
                                        '#EFEFEF',
                                        '#222222',
                                        '#009D97',
                                        '#AA2159',
                                        '#AA2159',
                                        '#009D97',
                                        '#BCC747',
                                        '#798D8F',
                                        '#AA2159',
                                        '#FFFFFF',
                                        '#AA2159',
                                        '#FFFFFF',
                                ),
                        ),
                        'slate_blue' => array(
                                'label' => __('Slate Blue', 'memberlite'),
                                'colors' => array(
                                        '#6991AC',
                                        '#F5F5F5',
                                        '#F5F5F5',
                                        '#FFFFFF',
                                        '#67727A',
                                        '#222222',
                                        '#6991AC',
                                        '#6991AC',
                                        '#67727A',
                                        '#6991AC',
                                        '#D75C37',
                                        '#798D8F',
                                        '#67727A',
                                        '#FFFFFF',
                                        '#67727A',
                                        '#FFFFFF',
                                ),
                        ),
                        'watermelon' => array(
                                'label' => __('Watermelon Seed', 'memberlite'),
                                'colors' => array(
                                        '#363635',
                                        '#F9F9F7',
                                        '#F9F9F7',
                                        '#363635',
                                        '#FFFFFF',
                                        '#222222',
                                        '#83BF17',
                                        '#83BF17',
                                        '#83BF17',
                                        '#363635',
                                        '#F15D58',
                                        '#798D8F',
                                        '#83BF17',
                                        '#FFFFFF',
                                        '#83BF17',
                                        '#FFFFFF',
                                ),
                        ),
                )
        );
    }

    /**
     * Returns an array of color scheme choices registered for Memberlite.
     *
     * @return array Array of color schemes.
     * @since Memberlite 2.0
     *
     */
    public static function get_color_scheme_choices()
    {
        $color_schemes = Memberlite_Customize::get_color_schemes();
        $color_scheme_control_options = array();
        foreach ($color_schemes as $color_scheme => $value) {
            $color_scheme_control_options[$color_scheme] = $value['label'];
        }
        return $color_scheme_control_options;
    }

    /**
     * Sanitize Checkbox input values
     *
     * @since Memberlite 3.0
     */
    public static function sanitize_checkbox($input)
    {
        if ($input) {
            $output = '1';
        } else {
            $output = false;
        }
        return $output;
    }

    /**
     * Sanitize Text input values
     *
     * @since Memberlite 3.0
     */
    public static function sanitize_js_callback($value)
    {
        $value = esc_js($value);
        return $value;
    }

    /**
     * Sanitize select and radio fields. Based on (https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php#L262-L288)
     *
     * Updated to use sanitize_text_field instead of sanitize_key since we have select fields with uppercase keys
     *
     * @param string $input Slug to sanitize.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
     * @since Memberlite 3.1
     *
     * - Sanitization: select
     * - Control: select, radio
     *
     * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
     * as text, and then validates `$input` against the choices defined for the control.
     *
     * @see sanitize_text_field()        https://developer.wordpress.org/reference/functions/sanitize_text_field/
     * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
     *
     */
    public static function sanitize_select($input, $setting)
    {
        $input = sanitize_text_field($input);
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }

    /**
     * Sanitization callback for color schemes.
     *
     * @param string $value Color scheme name value.
     * @return string Color scheme name.
     * @since Memberlite 2.0
     *
     */
    public static function sanitize_color_scheme($value)
    {
        $color_schemes = array_merge(
                Memberlite_Customize::get_color_scheme_choices(),
                array(
                        'custom' => 'Custom',
                )
        );
        if (!array_key_exists($value, $color_schemes)) {
            $value = 'default';
        }
        return $value;
    }

    public static function sanitize_js_color_scheme($value)
    {
        $color_schemes = array_merge(
                Memberlite_Customize::get_color_scheme_choices(),
                array(
                        'custom' => 'Custom',
                )
        );
        if (!array_key_exists($value, $color_schemes)) {
            $value = 'default';
        }
        return esc_js($value);
    }

    /**
     * Sanitization callback text that may contain links
     *
     * @param string $value string to sanitize.
     * @return string sanitized string.
     * @since Memberlite 2.0
     *
     */
    public static function sanitize_text_with_links($value)
    {
        $allowed_html = array(
                'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'title' => array(),
                ),
                'span' => array(
                        'class' => array(),
                ),
                'time' => array(
                        'class' => array(),
                        'datetime' => array(),
                ),
        );
        return wp_kses($value, $allowed_html);
    }

    public static function sanitize_js_text_with_links($value)
    {
        $allowed_html = array(
                'a' => array(
                        'class' => array(),
                        'href' => array(),
                        'title' => array(),
                ),
        );
        return esc_js(wp_kses($value, $allowed_html));
    }

    /**
     * Binds JS listener to make Customizer color_scheme control.
     *
     * Passes color scheme data as colorScheme global.
     *
     * @since Twenty Fifteen 1.0
     */
    public static function customizer_controls_js()
    {
        wp_enqueue_script('Memberlite_Customizer-controls', MEMBERLITE_URL . '/js/customizer-controls.js', array('customize-controls', 'iris', 'underscore', 'wp-util'), MEMBERLITE_VERSION, true);
        wp_localize_script('Memberlite_Customizer-controls', 'colorSchemes', Memberlite_Customize::get_color_schemes());
    }

}

/**
 * Custom Control for displaying a header within a Customizer Section
 */
if (class_exists('WP_Customize_Control')) {
    class Memberlite_Customize_Header_Control extends WP_Customize_Control
    {
        public function render_content()
        {
            echo '<span class="customize-control-title" style="margin: 8px 0 -6px;">' . esc_html($this->label) . '</span>';
        }
    }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('Memberlite_Customize', 'register'));
add_action('customize_controls_enqueue_scripts', array('Memberlite_Customize', 'customizer_controls_js'));

// Output custom CSS to live site
add_action('wp_head', array('Memberlite_Customize', 'header_output'));

// Enqueue live preview javascript in Theme Customizer admin screen
add_action('customize_preview_init', array('Memberlite_Customize', 'live_preview'));
