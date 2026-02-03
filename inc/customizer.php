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
 */
class Memberlite_Customize {
    /**
     * Sets and gets customizer settings and controls for Memberlite
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @return void
     */
    public static function register( WP_Customize_Manager $wp_customize ) {
        //Panels & Sections
        self::set_customizer_panels_sections( $wp_customize );

        //General Settings
        self::set_customizer_general_settings( $wp_customize );

        //Typography Settings
        self::set_typography_settings( $wp_customize );

        //Color Settings
        self::set_customizer_color_settings( $wp_customize );

        //Header Settings
        self::set_customizer_header_settings( $wp_customize );

        //Blog, Post, Archives
        self::set_customizer_post_settings( $wp_customize );

        //Pages
        self::set_customizer_page_settings( $wp_customize );

        //Footer Settings
        self::set_customizer_footer_settings( $wp_customize );

        $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

        $wp_customize->selective_refresh->add_partial(
                'blogname', array(
                        'selector'        => '.site-title a',
                        'render_callback' => array( 'Memberlite_Customize', 'bloginfo_name' ),
                )
        );
        $wp_customize->selective_refresh->add_partial(
                'blogdescription', array(
                        'selector'        => '.site-description',
                        'render_callback' => array( 'Memberlite_Customize', 'bloginfo_description' ),
                )
        );

        $wp_customize->get_setting( 'header_textcolor' )->transport        = 'postMessage';
        $wp_customize->get_setting( 'background_color' )->transport        = 'postMessage';
        $wp_customize->get_setting( 'posts_entry_meta_before' )->transport = 'postMessage';
        $wp_customize->get_setting( 'posts_entry_meta_after' )->transport  = 'postMessage';
        $wp_customize->get_setting( 'delimiter' )->transport               = 'postMessage';

        // Rename the label to "Site Title & Tagline Color".
        $wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title &amp; Tagline Color', 'memberlite' );

        // Rename the label to "Display Site Title & Tagline" for clarity.
        $wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'memberlite' );

        // Rename the label to "Background Color".
        $wp_customize->get_control( 'background_color' )->label = __( 'Site Background Color', 'memberlite' );
    }

    /**
     * Sets panels and sections in customizer
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @return void
     */
    public static function set_customizer_panels_sections( WP_Customize_Manager $wp_customize ) {

        /* General -------------------------------- */
        $wp_customize->add_panel(
                'memberlite_general_panel',
                array(
                        'title'    => __( 'General', 'memberlite' ),
                        'priority' => 1,
                )
        );


        $wp_customize->add_section(
                'memberlite_layout_options',
                array(
                        'title' => __( 'Site Layout', 'memberlite' ),
                        'panel' => 'memberlite_general_panel'
                )
        );

        // Move core Background Image into our custom panel
        $section = $wp_customize->get_section( 'background_image' );
        if ( $section ) {
            $section->panel = 'memberlite_general_panel';
        }

        $wp_customize->add_section(
                'memberlite_breadcrumbs_options',
                array(
                        'title' => __( 'Breadcrumbs', 'memberlite' ),
                        'panel' => 'memberlite_general_panel'
                )
        );

        /* Typography -------------------------------- */
        $wp_customize->add_section(
                'memberlite_typography_options',
                array(
                        'title'    => __( 'Typography', 'memberlite' ),
                        'priority' => 2,
                )
        );

        /* Colors -------------------------------- */
        $wp_customize->get_section( 'colors' )->priority = 3;

        /* Header -------------------------------- */
        $wp_customize->add_panel(
                'memberlite_header_panel',
                array(
                        'title'      => __( 'Header', 'memberlite' ),
                        'capability' => 'edit_theme_options',
                        'priority'   => 4,
                )
        );

        $wp_customize->add_section(
                'memberlite_header_layout_options',
                array(
                        'title' => __( 'Header Layout', 'memberlite' ),
                        'panel' => 'memberlite_header_panel'
                )
        );

        $wp_customize->add_section(
                'memberlite_header_feature_options',
                array(
                        'title' => __( 'Header Features', 'memberlite' ),
                        'panel' => 'memberlite_header_panel'
                )
        );

        // Move core Header Image into our custom panel
        $section = $wp_customize->get_section( 'header_image' );
        if ( $section ) {
            $section->panel    = 'memberlite_header_panel';
            $section->priority = 10;
        }

        /* Footer -------------------------------- */
        $wp_customize->add_section(
                'memberlite_footer_options',
                array(
                        'title'    => __( 'Footer', 'memberlite' ),
                        'priority' => 5,
                )
        );

        /* Post & Archives -------------------------------- */
        $wp_customize->add_section(
                'memberlite_post_archive_options',
                array(
                        'title'    => __( 'Posts & Archives', 'memberlite' ),
                        'priority' => 6,
                )
        );

        /* Pages -------------------------------- */
        $wp_customize->add_section(
                'memberlite_page_options',
                array(
                        'title'    => __( 'Pages', 'memberlite' ),
                        'priority' => 7,
                )
        );

    }

    /**
     * Sets general/global customizer settings
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @return void
     */
    public static function set_customizer_general_settings( WP_Customize_Manager $wp_customize ) {
        // GENERAL: Breadcrumb Locations ================
        $memberlite_breadcrumbs = array(
                'page_breadcrumbs'       => array(
                        'label' => 'Breadcrumbs on Pages',
                ),
                'post_breadcrumbs'       => array(
                        'label' => 'Breadcrumbs on Posts',
                ),
                'archive_breadcrumbs'    => array(
                        'label' => 'Breadcrumbs on Archives',
                ),
                'attachment_breadcrumbs' => array(
                        'label' => 'Breadcrumbs on Attachments',
                ),
                'search_breadcrumbs'     => array(
                        'label' => 'Breadcrumbs on Search Results',
                ),
                'profile_breadcrumbs'    => array(
                        'label' => 'Breadcrumbs on Profiles',
                ),
        );

        foreach ( $memberlite_breadcrumbs as $breadcrumb_slug => $memberlite_breadcrumb ) {
            self::add_memberlite_setting_control(
                    $wp_customize,
                    $breadcrumb_slug,
                    $memberlite_breadcrumb['label'],
                    'memberlite_breadcrumbs_options',
                    array(
                            'type'              => 'checkbox',
                            'default'           => false,
                            'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
                    )
            );
        };

        // GENERAL: Breadcrumb Delimiter ================
        self::add_memberlite_setting_control( $wp_customize, 'delimiter', 'Breadcrumb Delimiter', 'memberlite_breadcrumbs_options', array(
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
        ) );
    }

    public static function set_typography_settings( WP_Customize_Manager $wp_customize ) {
        // TYPOGRAPHY: Heading Font ================
        self::add_memberlite_setting_control( $wp_customize, 'memberlite_header_font', 'Heading Font', 'memberlite_typography_options', array(
                'type'        => 'select',
                'choices'     => self::get_all_fonts(),
                'description' => 'Default font used for headings across the site (h1, h2, h3, etc.).',
        ) );

        // TYPOGRAPHY: Body Font ================
        self::add_memberlite_setting_control( $wp_customize, 'memberlite_body_font', 'Content Font', 'memberlite_typography_options', array(
                'type'        => 'select',
                'choices'     => self::get_all_fonts(),
                'description' => 'Default font used for body text across the site (paragraphs, lists, etc.).',
        ) );
    }

    /**
     * Sets color-related customizer settings
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @return void
     */
    public static function set_customizer_color_settings( WP_Customize_Manager $wp_customize ) {
        // In your control registration
        $description = 'Choose a color scheme for your site.';

        // Get current scheme safely from the setting to avoid recursion
        $setting = $wp_customize->get_setting( 'memberlite_variation_color_scheme' );
        $current_scheme = $setting ? $setting->value() : get_theme_mod( 'memberlite_variation_color_scheme', '' );

        // Check if they're currently on a legacy scheme
        $legacy_schemes = memberlite_get_legacy_color_schemes();

        if ( isset( $legacy_schemes[ $current_scheme ] ) ) {
            $description .= ' <strong>You are using a legacy scheme.</strong> Consider switching to a modern scheme for better performance.';
        }

        // COLORS: Color Scheme (New and Legacy) ================
        self::add_memberlite_setting_control(
                $wp_customize,
                'memberlite_variation_color_scheme',
                'Color Scheme',
                'colors',
                array(
                        'type'                 => 'select',
                        'description'          => $description,
                        'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_dynamic_color_scheme' ),
                        'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_dynamic_color_scheme' ),
                        'choices'              => Memberlite_Customize::get_dynamic_color_scheme_choices(),
                        'priority'             => 1,
                )
        );

        // COLORS: Dark Mode ================
        $memberlite_darkcss = get_theme_mod( 'memberlite_darkcss' );

        if ( ! empty( $memberlite_darkcss ) ) {
            //Only adds this "dark mode" version if the user already had it enabled (will be deprecated in the future)
            self::add_memberlite_setting_control( $wp_customize, 'memberlite_darkcss', 'Use Dark Mode Colors', 'colors', array(
                    'type'              => 'checkbox',
                    'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
                    'description'       => 'Check this box if you have chosen a dark background color and light default text color for your site.',
                    'priority'          => 2,
            ) );
        }

        if ( is_pmpro_active() ) {
            //Include override option if PMPro is active
            self::add_memberlite_setting_control( $wp_customize, 'memberlite_pmpro_color_override', 'Override PMPro Colors', 'colors', array(
                    'type'              => 'checkbox',
                    'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
                    'description'       => 'By default, PMPro will use colors <a href="' . admin_url( 'admin.php?page=pmpro-designsettings' ) . '" target="_blank">from its own settings</a>. Check this box to have PMPro use the base color, contrast color, and accent color you have chosen here instead.',
                    'priority'          => 2,
            ) );
        }

        // COLORS: Header Colors ================
        self::add_memberlite_heading( $wp_customize, 'memberlite_header_colors', 'Header Colors', 'colors' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_header', 'Header Background Color', 'bgcolor_header' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_site_navigation', 'Primary Navigation Background Color', 'bgcolor_site_navigation' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_site_navigation', 'Primary Navigation Link Color', 'color_site_navigation' );

        // COLORS: Footer Colors ================
        self::add_memberlite_heading( $wp_customize, 'memberlite_footer_colors', 'Footer Colors', 'colors' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_footer_widgets', 'Footer Widgets Background Color', 'bgcolor_footer_widgets' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_footer_widgets', 'Footer Widgets Text Color', 'color_footer_widgets' );

        // COLORS: Masthead Colors ================
        self::add_memberlite_heading( $wp_customize, 'memberlite_masthead_colors', 'Masthead Colors', 'colors' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_page_masthead', 'Page Masthead Background Color', 'bgcolor_page_masthead' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_page_masthead', 'Page Masthead Text Color', 'color_page_masthead' );

        // COLORS: Site Colors ================
        self::add_memberlite_heading( $wp_customize, 'memberlite_body_colors', 'Site Colors', 'colors' );

        // Move core controls down in the Colors section
        $header_textcolor_control = $wp_customize->get_control( 'header_textcolor' );
        if ( $header_textcolor_control ) {
            $header_textcolor_control->priority = 11;
        }

        $background_color_control = $wp_customize->get_control( 'background_color' );
        if ( $background_color_control ) {
            $background_color_control->priority = 12;
        }

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_text', 'Default Text Color', 'color_text' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_heading', 'Default Heading Color', 'color_heading' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_link', 'Default Link Color', 'color_link' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_meta_link', 'Post Meta Link Color', 'color_meta_link' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_primary', 'Primary Color', 'color_primary' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_secondary', 'Secondary Color', 'color_secondary' );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_action', 'Action Color', 'color_action', array(
                'description' => 'Used for CTA buttons and links.'
        ) );

        self::add_memberlite_color_control( $wp_customize, 'memberlite_color_button', 'Default Button Color', 'color_button' );
    }

    /**
     * Sets header-related customizer settings
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @return void
     */
    public static function set_customizer_header_settings( WP_Customize_Manager $wp_customize ) {
        // HEADER > Layout : Columns Ratio ================
        self::add_memberlite_setting_control( $wp_customize, 'columns_ratio_header', 'Columns Ratio', 'memberlite_header_layout_options', array(
                'type'        => 'select',
                'transport'   => 'refresh',
                'description' => 'Controls how the left and right sections of your header are sized. For example, "4-8" makes the left side narrower and the right side wider.',
                'choices'     => array(
                        '1-11' => '1x11',
                        '2-10' => '2x10',
                        '3-9'  => '3x9',
                        '4-8'  => '4x8',
                        '5-7'  => '5x7',
                        '6-6'  => '6x6',
                        '7-5'  => '7x5',
                        '8-4'  => '8x4',
                        '9-3'  => '9x3',
                        '10-2' => '10x2',
                        '11-1' => '11x1',
                ),
        ) );

        // HEADER: Show Login/Member Info ================
        self::add_memberlite_setting_control( $wp_customize, 'meta_login', 'Show Login/Member Info in Header', 'memberlite_header_feature_options', array(
                'type'              => 'checkbox',
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
        ) );

        // HEADER: Show search form ================
        self::add_memberlite_setting_control( $wp_customize, 'nav_menu_search', 'Show Search Form After Main Nav', 'memberlite_header_feature_options', array(
                'type'              => 'checkbox',
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
        ) );

        // HEADER: Enable sticky header ================
        self::add_memberlite_setting_control( $wp_customize, 'sticky_nav', 'Enable Sticky Header', 'memberlite_header_feature_options', array(
                'type'              => 'checkbox',
                'description'       => 'On scroll, the header menu will stick to the top of the screen.',
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
        ) );
    }

    /**
     * Sets post, page, and archive related customizer settings
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @return void
     */
    public static function set_customizer_post_settings( WP_Customize_Manager $wp_customize ) {
        // POST: Content Archives ================
        self::add_memberlite_setting_control( $wp_customize, 'content_archives', 'Archive Layout', 'memberlite_post_archive_options', array(
                'type'        => 'radio',
                'description' => 'Choose how posts are displayed on blog and archive pages.',
                'choices'     => array(
                        'content' => 'Show Full Post Content',
                        'excerpt' => 'Show Post Excerpts',
                        'grid'    => 'Show Posts in a Grid (sidebar hidden)',
                ),
        ) );

        // POST: Sidebar Location ================
        self::add_memberlite_setting_control( $wp_customize, 'sidebar_location_blog', 'Sidebar Location', 'memberlite_post_archive_options', array(
                'type'    => 'radio',
                'choices' => array(
                        'sidebar-blog-right' => 'Right Sidebar',
                        'sidebar-blog-left'  => 'Left Sidebar',
                        'sidebar-blog-none'  => 'No Sidebar',
                ),
        ) );

        // POST: Columns Ratio ================
        self::add_memberlite_setting_control( $wp_customize, 'columns_ratio_blog', 'Columns Ratio', 'memberlite_post_archive_options', array(
                'type'        => 'select',
                'transport'   => 'refresh',
                'description' => 'Sets the content-to-sidebar width ratio. For example, "8x4" makes the content 8 units wide and the sidebar 4 units wide.',
                'choices'     => array(
                        '6-6'  => '6x6',
                        '7-5'  => '7x5',
                        '8-4'  => '8x4',
                        '9-3'  => '9x3',
                        '10-2' => '10x2',
                        '11-1' => '11x1',
                ),
        ) );

        // Add heading for navigation related settings
        self::add_memberlite_heading( $wp_customize, 'memberlite_navigation_post_archive_heading', 'Navigation Settings', 'memberlite_post_archive_options' );

        // POST: (prev/next links) Post Nav ================
        self::add_memberlite_setting_control( $wp_customize, 'memberlite_post_nav', 'Show Prev/Next on Single Posts', 'memberlite_post_archive_options', array(
                'type'              => 'checkbox',
                'default'           => true,
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
        ) );

        // Heading for other post settings
        self::add_memberlite_heading( $wp_customize, 'memberlite_post_heading', 'Other Settings', 'memberlite_post_archive_options' );

        // POST: Author Block ================
        self::add_memberlite_setting_control( $wp_customize, 'author_block', 'Show Author Block on Posts', 'memberlite_post_archive_options', array(
                'type'              => 'checkbox',
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
        ) );

        // POST: Banner & Thumbnail Options ================
        $memberlite_loop_images_choices = array(
                'show_none'      => 'Do Not Show Featured Images',
                'show_banner'    => 'Show Banner Only',
                'show_thumbnail' => 'Show Thumbnail Only',
                'show_block'     => 'Show Block Image In Excerpt',
        );

        if ( class_exists( 'MemberliteMultiPostThumbnails' ) ) {
            $memberlite_loop_images_choices['show_both'] = 'Show Banner and Thumbnail';
        }

        self::add_memberlite_setting_control( $wp_customize, 'memberlite_loop_images', 'Featured Images', 'memberlite_post_archive_options', array(
                'type'      => 'select',
                'transport' => 'refresh',
                'choices'   => $memberlite_loop_images_choices,
        ) );

        // POST: Post Meta Before ================
        self::add_memberlite_setting_control( $wp_customize, 'posts_entry_meta_before', 'Post Entry Meta (before)', 'memberlite_post_archive_options', array(
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
        ) );

        // POST: Post Meta After ================
        self::add_memberlite_setting_control( $wp_customize, 'posts_entry_meta_after', 'Post Entry Meta (after)', 'memberlite_post_archive_options', array(
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
        ) );
    }

    public static function set_customizer_page_settings( WP_Customize_Manager $wp_customize ) {
        // PAGE: Sidebar Location ================
        self::add_memberlite_setting_control( $wp_customize, 'sidebar_location', 'Sidebar Location', 'memberlite_page_options', array(
                'type'    => 'radio',
                'choices' => array(
                        'sidebar-right' => 'Right Sidebar',
                        'sidebar-left'  => 'Left Sidebar',
                        'sidebar-none'  => 'No Sidebar',
                ),
        ) );

        // PAGE: Columns Ratio ================
        self::add_memberlite_setting_control( $wp_customize, 'columns_ratio', 'Columns Ratio', 'memberlite_page_options', array(
                'type'        => 'select',
                'transport'   => 'refresh',
                'description' => 'Sets the content-to-sidebar width ratio. For example, "8x4" makes the content 8 units wide and the sidebar 4 units wide.',
                'choices'     => array(
                        '6-6'  => '6x6',
                        '7-5'  => '7x5',
                        '8-4'  => '8x4',
                        '9-3'  => '9x3',
                        '10-2' => '10x2',
                        '11-1' => '11x1',
                ),
        ) );

        // Add heading for navigation related settings
        self::add_memberlite_heading( $wp_customize, 'memberlite_navigation_pages_heading', 'Navigation Settings', 'memberlite_page_options' );

        // PAGE: (prev/next links) Page Nav ================
        self::add_memberlite_setting_control( $wp_customize, 'memberlite_page_nav', 'Show Prev/Next on Single Pages', 'memberlite_page_options', array(
                'type'              => 'checkbox',
                'default'           => true,
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
        ) );

    }

    /**
     * Sets footer-related customizer settings
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @return void
     */
    public static function set_customizer_footer_settings( WP_Customize_Manager $wp_customize ) {
        // FOOTER: Footer Widgets ================
        self::add_memberlite_setting_control( $wp_customize, 'memberlite_footerwidgets', 'Footer Widget Columns', 'memberlite_footer_options', array(
                'type'              => 'select',
                'sanitize_callback' => 'absint',
                'choices'           => array( '2' => '2', '3' => '3', '4' => '4', '6' => '6' ),
        ) );

        // FOOTER: Copyright Text ================
        self::add_memberlite_setting_control( $wp_customize, 'copyright_textbox', 'Copyright Text', 'memberlite_footer_options', array(
                'transport'            => 'postMessage',
                'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_text_with_links' ),
                'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_text_with_links' ),
        ) );

        // FOOTER: Back to Top
        self::add_memberlite_heading( $wp_customize, 'memberlite_back_to_top_heading', 'Back to Top', 'memberlite_footer_options' );
        self::add_memberlite_setting_control( $wp_customize, 'memberlite_back_to_top', 'Show Back to Top Link', 'memberlite_footer_options', array(
                'type'              => 'checkbox',
                'default'           => true,
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
        ) );
    }

    /**
     * Helper to add headings for organizational purposes
     *
     * @param object $wp_customize
     * @param string $id
     * @param string $label
     * @param string $section
     *
     * @return void
     */
    public static function add_memberlite_heading( WP_Customize_Manager $wp_customize, string $id, string $label, string $section, $args = array() ): void {
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
                                'label'    => $label,
                                'section'  => $section,
                                'priority' => $args['priority'] ?? 10,
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
     * @param array $args
     *
     * @return void
     */
    public static function add_memberlite_color_control( WP_Customize_Manager $wp_customize, string $id, string $label, string $setting_id, $args = array() ): void {
        global $memberlite_defaults, $memberlite_defaults_legacy;

        // Determine which defaults array to use
        if ( $setting_id === 'memberlite_color_scheme' ) {
            $defaults_array = $memberlite_defaults_legacy;
        } else {
            $defaults_array = $memberlite_defaults;
        }

        $defaults = array(
                'default'     => isset( $defaults_array[ $setting_id ] ) ? $defaults_array[ $setting_id ] : '',
                'description' => '',
        );

        // Merge passed args with defaults
        $args = wp_parse_args( $args, $defaults );

        // Translate label if it's a plain string
        $label = __( $label, 'memberlite' );

        // Translate description if provided
        if ( ! empty( $args['description'] ) ) {
            $args['description'] = __( $args['description'], 'memberlite' );
        }

        // Add Setting
        $wp_customize->add_setting(
                $setting_id,
                array(
                        'default'              => $args['default'],
                        'sanitize_callback'    => 'sanitize_hex_color',
                        'sanitize_js_callback' => 'maybe_hash_hex_color',
                        'transport'            => 'postMessage',
                )
        );

        // Add Control
        $wp_customize->add_control(
                new WP_Customize_Color_Control(
                        $wp_customize,
                        $id,
                        array(
                                'label'       => $label,
                                'description' => $args['description'],
                                'section'     => 'colors',
                                'settings'    => $setting_id,
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
     *
     * @return void
     */
    public static function add_memberlite_setting_control( WP_Customize_Manager $wp_customize, string $id, string $label, string $section, $args = array() ): void {
        global $memberlite_defaults;

        // Define default arguments for the setting and control
        $defaults = array(
                'type'              => 'text',
                'choices'           => array(),
                'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_select' ), // Default to select/text
                'transport'         => 'refresh',
                'description'       => '',
                'active_callback'   => null,
                'default'           => false, // Base default
        );

        // Merge passed args with defaults
        $args = wp_parse_args( $args, $defaults );

        // If no default was explicitly passed in $args, check $memberlite_defaults
        if ( $args['default'] === false && isset( $memberlite_defaults[$id] ) ) {
            $args['default'] = $memberlite_defaults[$id];
        }

        // Translate label if it's a plain string
        $label = __( $label, 'memberlite' );

        // Translate description if it's a plain string
        if ( ! empty( $args['description'] ) ) {
            $args['description'] = __( $args['description'], 'memberlite' );
        }

        // Translate choice values
        if ( ! empty( $args['choices'] ) && is_array( $args['choices'] ) ) {
            $args['choices'] = array_map( function ( $choice ) {
                return __( $choice, 'memberlite' );
            }, $args['choices'] );
        }

        // 1. Add Setting
        $wp_customize->add_setting(
                $id,
                array(
                        'default'              => $args['default'],
                        'sanitize_callback'    => $args['sanitize_callback'],
                        'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
                        'transport'            => $args['transport'],
                )
        );

        // 2. Add Control
        $control_args = array(
                'label'       => $label,
                'section'     => $section,
                'type'        => $args['type'],
                'choices'     => $args['choices'],
                'description' => $args['description'],
        );

        // Add active_callback if provided
        if ( $args['active_callback'] !== null ) {
            $control_args['active_callback'] = $args['active_callback'];
        }

        $wp_customize->add_control( $id, $control_args );
    }

    /**
     * Get color scheme choices including user's legacy scheme if applicable
     *
     * @param string|null $current_scheme Optional. The current scheme value. If not provided,
     *                                    uses the safe helper function to avoid recursion.
     * @return array Color scheme choices for dropdown
     */
    public static function get_dynamic_color_scheme_choices() {
        // Start with new modern schemes
        $choices = Memberlite_Customize::get_color_scheme_choices();

        // Check if user has EVER had a legacy scheme (stored permanently)
        $user_legacy_scheme = get_option('memberlite_user_legacy_scheme', '');

        // If they have a legacy scheme stored
        if ( !empty($user_legacy_scheme) ) {
            $legacy_schemes = memberlite_get_legacy_color_schemes();

            // If this legacy scheme exists in our definitions
            if ( isset($legacy_schemes[$user_legacy_scheme]) ) {
                // Add their specific legacy scheme to choices
                $choices[$user_legacy_scheme] = $legacy_schemes[$user_legacy_scheme]['label'];
            }
        }

        // Always include custom option
        $choices['custom'] = 'Custom Colors';

        return $choices;
    }

    /**
     * Call bloginfo to echo the site name.
     * For use in a customizer callback above.
     * @since 3.1
     */
    public static function bloginfo_name() {
        bloginfo( 'name' );
    }

    /**
     * Call bloginfo to echo the site description.
     * For use in a customizer callback above.
     * @since 3.1
     */
    public static function bloginfo_description() {
        bloginfo( 'description' );
    }

    /**
     * Convert colors from customizer into CSS variables that output in the header
     *
     * @return void
     */
    public static function header_output() {
        global $memberlite_defaults;

        $content_width = $GLOBALS['content_width'] . 'px';
        $header_font   = memberlite_get_font( 'header_font', true );
        $body_font     = memberlite_get_font( 'body_font', true );

        // Get active colors based on selected scheme
        $active_colors = memberlite_get_active_colors();

        // Get non-color settings
        $header_textcolor = get_theme_mod( 'header_textcolor' );
        if ( empty( $header_textcolor ) ) {
            $header_textcolor = $memberlite_defaults['header_textcolor'];
        }

        $override_pmpro_colors = get_theme_mod( 'memberlite_pmpro_color_override' );

        $hover_brightness = $memberlite_defaults['hover_brightness'];
        $color_white      = '#FFFFFF';

        ?>
        <!--Customizer CSS-->
        <style id="memberlite-customizer-css" type="text/css">
            :root {
                /* Layout & Typography */
                --memberlite-content-width: <?php echo esc_html( $content_width ); ?>;
                --memberlite-body-font: <?php echo esc_html( $body_font ); ?>, sans-serif;
                --memberlite-header-font: <?php echo esc_html( $header_font ); ?>, sans-serif;

                /* Memberlite-specific color variables (your existing system) */
            <?php if ( $header_textcolor != 'blank' ) : ?> --memberlite-color-header-text: <?php echo '#' . esc_attr( $header_textcolor ); ?>;
            <?php endif; ?> --memberlite-color-site-background: <?php echo esc_attr( $active_colors['background_color'] ); ?>;
                --memberlite-color-header-background: <?php echo esc_attr( $active_colors['bgcolor_header'] ); ?>;
                --memberlite-color-site-navigation-background: <?php echo esc_attr( $active_colors['bgcolor_site_navigation'] ); ?>;
                --memberlite-color-site-navigation: <?php echo esc_attr( $active_colors['color_site_navigation'] ); ?>;
                --memberlite-color-text: <?php echo esc_attr( $active_colors['color_text'] ); ?>;
                --memberlite-color-heading: <?php echo esc_attr( $active_colors['color_heading'] ); ?>;
                --memberlite-color-link: <?php echo esc_attr( $active_colors['color_link'] ); ?>;
                --memberlite-color-meta-link: <?php echo esc_attr( $active_colors['color_meta_link'] ); ?>;
                --memberlite-color-primary: <?php echo esc_attr( $active_colors['color_primary'] ); ?>;
                --memberlite-color-secondary: <?php echo esc_attr( $active_colors['color_secondary'] ); ?>;
                --memberlite-color-action: <?php echo esc_attr( $active_colors['color_action'] ); ?>;
                --memberlite-color-button: <?php echo esc_attr( $active_colors['color_button'] ); ?>;
                --memberlite-color-borders: <?php echo esc_attr( $active_colors['color_borders'] ); ?>;
                --memberlite-color-page-masthead-background: <?php echo esc_attr( $active_colors['bgcolor_page_masthead'] ); ?>;
                --memberlite-color-page-masthead: <?php echo esc_attr( $active_colors['color_page_masthead'] ); ?>;
                --memberlite-color-footer-widgets-background: <?php echo esc_attr( $active_colors['bgcolor_footer_widgets'] ); ?>;
                --memberlite-color-footer-widgets: <?php echo esc_attr( $active_colors['color_footer_widgets'] ); ?>;
                --memberlite-hover-brightness: <?php echo esc_attr( $hover_brightness ); ?>;
                --memberlite-color-white: <?php echo esc_attr( $color_white ); ?>;

                /* WordPress theme.json color aliases (map to Customizer colors) */
                --wp--preset--color--heading: <?php echo esc_attr( $active_colors['color_heading'] ); ?>;
                --wp--preset--color--base: <?php echo esc_attr( $active_colors['background_color'] ); ?>;
                --wp--preset--color--body-text: <?php echo esc_attr( $active_colors['color_text'] ); ?>;
                --wp--preset--color--color-primary: <?php echo esc_attr( $active_colors['color_primary'] ); ?>;
                --wp--preset--color--color-secondary: <?php echo esc_attr( $active_colors['color_secondary'] ); ?>;
                --wp--preset--color--buttons: <?php echo esc_attr( $active_colors['color_button'] ); ?>;
                --wp--preset--color--border: <?php echo esc_attr( $active_colors['color_borders'] ); ?>;
                --wp--preset--color--action: <?php echo esc_attr( $active_colors['color_action'] ); ?>;
                --wp--preset--color--color-action: <?php echo esc_attr( $active_colors['color_action'] ); ?>;
                --wp--preset--color--masthead-bg: <?php echo esc_attr( $active_colors['bgcolor_page_masthead'] ); ?>;
                --wp--preset--color--masthead-text: <?php echo esc_attr( $active_colors['color_page_masthead'] ); ?>;
                --wp--preset--color--nav-bg: <?php echo esc_attr( $active_colors['bgcolor_site_navigation'] ); ?>;
                --wp--preset--color--nav-text: <?php echo esc_attr( $active_colors['color_site_navigation'] ); ?>;
                --wp--preset--color--footer-bg: <?php echo esc_attr( $active_colors['bgcolor_footer_widgets'] ); ?>;
                --wp--preset--color--footer-text: <?php echo esc_attr( $active_colors['color_footer_widgets'] ); ?>;
                --wp--preset--color--white: <?php echo esc_attr( $color_white ); ?>;

            <?php if ( $override_pmpro_colors && is_pmpro_active() )  : ?>
                /* PMPro color vars */
                --pmpro--color--accent: <?php echo esc_attr( $active_colors['color_primary'] ); ?>;
                --pmpro--color--accent--variation: <?php echo esc_attr( $active_colors['color_secondary'] ); ?>;
                --pmpro--color--base: <?php echo esc_attr( $active_colors['background_color'] ); ?>;
                --pmpro--color--contrast: <?php echo esc_attr( $active_colors['color_text'] ); ?>;
            <?php endif; ?>
            }
        </style>
        <!--/Customizer CSS-->
        <?php
    }

    public static function live_preview() {
        wp_register_script(
                'Memberlite_Customizer',
                MEMBERLITE_URL . '/js/customizer.js',
                array( 'jquery', 'customize-preview' ),
                MEMBERLITE_VERSION,
                true
        );

        wp_localize_script(
                'Memberlite_Customizer',
                'memberliteCustomizerPreview',
                array(
                        'activeColors'  => memberlite_get_active_colors(),
                        'isPmproActive' => is_pmpro_active(),
                )
        );

        wp_enqueue_script( 'Memberlite_Customizer' );
    }

    /**
     * Get Google fonts
     */
    public static function get_google_fonts() {
        return array(
                'Abril-Fatface'      => __( 'Abril Fatface', 'memberlite' ),
                'DM-Sans'            => __( 'DM Sans', 'memberlite' ),
                'Figtree'            => __( 'Figtree', 'memberlite' ),
                'Fjalla-One'         => __( 'Fjalla One', 'memberlite' ),
                'Gentium-Book-Basic' => __( 'Gentium Book Basic', 'memberlite' ),
                'Inter'              => __( 'Inter', 'memberlite' ),
                'Lato'               => __( 'Lato', 'memberlite' ),
                'Merriweather'       => __( 'Merriweather', 'memberlite' ),
                'Montserrat'         => __( 'Montserrat', 'memberlite' ),
                'Noto-Sans'          => __( 'Noto Sans', 'memberlite' ),
                'Open-Sans'          => __( 'Open Sans', 'memberlite' ),
                'Oswald'             => __( 'Oswald', 'memberlite' ),
                'Pathway-Gothic-One' => __( 'Pathway Gothic One', 'memberlite' ),
                'Playfair-Display'   => __( 'Playfair Display', 'memberlite' ),
                'Poppins'            => __( 'Poppins', 'memberlite' ),
                'PT-Mono'            => __( 'PT Mono', 'memberlite' ),
                'PT-Sans'            => __( 'PT Sans', 'memberlite' ),
                'PT-Serif'           => __( 'PT Serif', 'memberlite' ),
                'Quattrocento'       => __( 'Quattrocento', 'memberlite' ),
                'Roboto'             => __( 'Roboto', 'memberlite' ),
                'Roboto-Slab'        => __( 'Roboto Slab', 'memberlite' ),
                'Source-Sans-Pro'    => __( 'Source Sans Pro', 'memberlite' ),
                'Ubuntu'             => __( 'Ubuntu', 'memberlite' ),
        );
    }

    /**
     * Get array of web safe fonts
     */
    public static function get_web_safe_fonts() {
        return array(
                'Arial'           => __( 'Arial', 'memberlite' ),
                'Bookman'         => __( 'Bookman', 'memberlite' ),
                'Courier'         => __( 'Courier', 'memberlite' ),
                'Courier-New'     => __( 'Courier New', 'memberlite' ),
                'Garamond'        => __( 'Garamond', 'memberlite' ),
                'Georgia'         => __( 'Georgia', 'memberlite' ),
                'Helvetica'       => __( 'Helvetica', 'memberlite' ),
                'Times'           => __( 'Times', 'memberlite' ),
                'Times-New-Roman' => __( 'Times New Roman', 'memberlite' ),
                'Trebuchet-MS'    => __( 'Trebuchet MS', 'memberlite' ),
                'Verdana'         => __( 'Verdana', 'memberlite' ),
        );
    }

    /**
     * Get array of all fonts
     */
    public static function get_all_fonts() {
        return array_merge( Memberlite_Customize::get_google_fonts(), Memberlite_Customize::get_web_safe_fonts() );
    }

    public static function get_color_schemes() {
        global $memberlite_color_schemes;

        return $memberlite_color_schemes;
    }

    /**
     * Register color schemes for Memberlite.
     * Based on code from the Twentyfifteen theme. (https://themes.svn.wordpress.org/twentyfifteen/1.2/inc/customizer.php)
     *
     * Can be filtered with {@see 'memberlite_color_schemes'}.
     *
     * The order of colors in a colors array:
     * 1. Heading Text Color
     * 2. Background Color
     * 3. Site Header Background Color
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
    public static function get_legacy_color_schemes() {
        global $memberlite_legacy_color_schemes;

        return $memberlite_legacy_color_schemes;
    }

    /**
     * Returns an array of color scheme choices (6.6.1 and later) registered for Memberlite.
     *
     * @return array Array of color schemes.
     * @since Memberlite 6.6.2
     *
     */
    public static function get_color_scheme_choices() {
        $color_schemes                = memberlite_get_color_schemes(); // Call global function from defaults.php
        $color_scheme_control_options = array();

        foreach ( $color_schemes as $color_scheme => $value ) {
            $color_scheme_control_options[ $color_scheme ] = $value['label'];
        }

        return $color_scheme_control_options;
    }

    /**
     * Sanitize Checkbox input values
     *
     * @since Memberlite 3.0
     */
    public static function sanitize_checkbox( $input ) {
        if ( $input ) {
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
    public static function sanitize_js_callback( $value ) {
        $value = esc_js( $value );

        return $value;
    }

    /**
     * Sanitize select and radio fields. Based on (https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php#L262-L288)
     *
     * Updated to use sanitize_text_field instead of sanitize_key since we have select fields with uppercase keys
     *
     * @param string $input Slug to sanitize.
     * @param WP_Customize_Setting $setting Setting instance.
     *
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
    public static function sanitize_select( $input, $setting ) {
        $input   = sanitize_text_field( $input );
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

    /**
     * Sanitization callback for color schemes (including dynamic legacy)
     *
     * IMPORTANT: This function must NOT call get_theme_mod() or any function
     * that calls get_theme_mod(), as this can cause infinite recursion during
     * Customizer preview/autosave when sanitize triggers theme_mod filters.
     */
    public static function sanitize_dynamic_color_scheme( $value ) {
        $value = sanitize_text_field( $value );

        // Get valid schemes from stable arrays (no theme_mod calls)
        $modern = array_keys( Memberlite_Customize::get_color_scheme_choices() );
        $legacy = array_keys( memberlite_get_legacy_color_schemes() );

        $valid = array_merge( $modern, $legacy, array( 'custom' ) );

        if ( ! in_array( $value, $valid, true ) ) {
            $value = 'default_2026';
        }

        return $value;
    }

    /**
     * Sanitization callback text that may contain links
     *
     * @param string $value string to sanitize.
     *
     * @return string sanitized string.
     * @since Memberlite 2.0
     *
     */
    public static function sanitize_text_with_links( $value ) {
        $allowed_html = array(
                'a'    => array(
                        'class' => array(),
                        'href'  => array(),
                        'title' => array(),
                ),
                'span' => array(
                        'class' => array(),
                ),
                'time' => array(
                        'class'    => array(),
                        'datetime' => array(),
                ),
        );

        return wp_kses( $value, $allowed_html );
    }

    public static function sanitize_js_text_with_links( $value ) {
        $allowed_html = array(
                'a' => array(
                        'class' => array(),
                        'href'  => array(),
                        'title' => array(),
                ),
        );

        return esc_js( wp_kses( $value, $allowed_html ) );
    }

    /**
     * Binds JS listener to make Customizer color_scheme control.
     *
     * Passes color scheme data as colorScheme global.
     *
     * Also enqueue stylesheet for customizer setting controls.
     *
     * @since Twenty Fifteen 1.0
     */
    public static function customizer_controls_js() {
        wp_register_script(
                'Memberlite_Customizer_Controls',
                MEMBERLITE_URL . '/js/customizer-controls.js',
                array(
                        'customize-controls',
                        'iris',
                        'underscore',
                        'wp-util'
                ),
                MEMBERLITE_VERSION,
                true
        );

        $get_modern_scheme_theme_mod = get_theme_mod( 'memberlite_variation_color_scheme');
        $all_legacy_schemes = Memberlite_Customize::get_legacy_color_schemes();
        $is_current_scheme_legacy = isset($all_legacy_schemes[$get_modern_scheme_theme_mod]);

        // Pass BOTH new and legacy color schemes to the same script
        wp_localize_script(
                'Memberlite_Customizer_Controls',
                'memberliteColorSchemes',
                array(
                        'allColorSchemes'    => Memberlite_Customize::get_color_schemes(),
                        'allLegacyColorSchemes' => Memberlite_Customize::get_legacy_color_schemes(),
                        'activeColorScheme' => get_theme_mod( 'memberlite_variation_color_scheme'),
                        'isLegacy' => $is_current_scheme_legacy,
                ));

        wp_enqueue_script( 'Memberlite_Customizer_Controls' );

        wp_enqueue_style(
                'memberlite-customizer-css',
                get_template_directory_uri() . '/css/customizer.css',
                array(),
                MEMBERLITE_VERSION
        );
    }
}

/**
 * Custom Control for displaying a header within a Customizer Section
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
    class Memberlite_Customize_Header_Control extends WP_Customize_Control {
        public function render_content() {
            echo '<span class="customize-control-title settings-heading">' . esc_html( $this->label ) . '</span>';
        }
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Memberlite_Customize', 'register' ) );
add_action( 'customize_controls_enqueue_scripts', array( 'Memberlite_Customize', 'customizer_controls_js' ) );

// Output custom CSS to live site
add_action( 'wp_head', array( 'Memberlite_Customize', 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', array( 'Memberlite_Customize', 'live_preview' ) );
