<?php
/**
 * Memberlite Theme Customizer
 *
 * @package Memberlite
 */

/**
 * Memberlite Theme Customizer Class
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
class Memberlite_Customize {
	/**
	 * Sets and gets customizer settings and controls for Memberlite
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function register( WP_Customize_Manager $wp_customize ) {
		// Panels & Sections
		self::set_customizer_panels_sections( $wp_customize );

		// Typography Settings
		self::set_typography_settings( $wp_customize );

		// Color Settings
		self::set_customizer_color_settings( $wp_customize );

		// Breadcrumb Settings
		self::set_customizer_breadcrumb_settings( $wp_customize );

		// Header Settings
		self::set_customizer_header_settings( $wp_customize );

		// Footer Settings
		self::set_customizer_footer_settings( $wp_customize );

		// Posts & Archives
		self::set_customizer_post_settings( $wp_customize );

		// Pages
		self::set_customizer_page_settings( $wp_customize );

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

		// Rename the label to "Site Title and Tagline Color".
		$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title and Tagline Color', 'memberlite' );

		// Rename the label to "Site Background Color".
		$wp_customize->get_control( 'background_color' )->label = __( 'Site Background Color', 'memberlite' );
	}

	/**
	 * Sets panels and sections in customizer
	 *
	 * @since 6.1.1
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function set_customizer_panels_sections( WP_Customize_Manager $wp_customize ) {
		/* Site Identity --------------------------------- */
		$wp_customize->get_section( 'title_tagline' )->priority = 0;

		/* Typography ------------------------------------ */
		$wp_customize->add_section(
			'memberlite_typography_options',
			array(
				'title' => __( 'Typography', 'memberlite' ),
				'priority'    => 2,
			)
		);

		/* Breadcrumbs ----------------------------------- */
		$wp_customize->add_section(
			'memberlite_breadcrumbs_options',
			array(
				'title' => __( 'Breadcrumbs', 'memberlite' ),
				'priority'    => 3,
			)
		);

		/* Colors ---------------------------------------- */
		$wp_customize->get_section( 'colors' )->priority = 3;

		/* Header ---------------------------------------- */
		$wp_customize->add_section(
			'memberlite_header_options',
			array(
				'title'       => __( 'Header', 'memberlite' ),
				'priority' => 4,
			)
		);

		/* Footer ---------------------------------------- */
		$wp_customize->add_section(
			'memberlite_footer_options',
			array(
				'title' => __( 'Footer', 'memberlite' ),
				'priority' => 5,
			)
		);

		/* Posts & Archives ------------------------------ */
		$wp_customize->add_section(
			'memberlite_post_archive_options',
			array(
				'title' => __( 'Posts & Archives', 'memberlite' ),
				'priority' => 6,
			)
		);

		/* Pages ----------------------------------------- */
		$wp_customize->add_section(
			'memberlite_page_options',
			array(
				'title' => __( 'Pages', 'memberlite' ),
				'priority' => 7,
			)
		);

	}

	/**
	 * Sets typography-related customizer settings
	 *
	 * @since 6.1.1
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function set_typography_settings( WP_Customize_Manager $wp_customize ) {
		// TYPOGRAPHY: Heading Font =============
		self::add_memberlite_setting_control( $wp_customize, 'memberlite_header_font', __( 'Heading Font', 'memberlite' ), 'memberlite_typography_options', array(
			'type'        => 'select',
			'choices'     => self::get_all_fonts(),
			'description' => __( 'Default font used for headings across the site (h1, h2, h3, etc.).', 'memberlite' ),
		) );

		// TYPOGRAPHY: Body Font ================
		self::add_memberlite_setting_control( $wp_customize, 'memberlite_body_font', __( 'Content Font', 'memberlite' ), 'memberlite_typography_options', array(
			'type'        => 'select',
			'choices'     => self::get_all_fonts(),
			'description' => __( 'Default font used for body text across the site (paragraphs, lists, etc.).', 'memberlite' ),
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
		// COLORS: Color Scheme =================
		self::add_memberlite_setting_control(
			$wp_customize,
			'memberlite_color_scheme',
			__( 'Color Scheme', 'memberlite' ),
			'colors',
			array(
				'type'              => 'select',
				'transport'         => 'postMessage',
				'description'       => __( 'Choose a color scheme preset. Individual colors below will update to match. Customize any color to switch to "Custom" scheme.', 'memberlite' ),
				'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_color_scheme' ),
				'choices'           => memberlite_get_color_scheme_choices(),
				'priority'          => 1,
			)
		);

		// COLORS: PMPro Override ===============
		if ( defined( 'PMPRO_VERSION' ) ) {
			self::add_memberlite_setting_control( $wp_customize, 'memberlite_pmpro_color_override', __( 'Override PMPro Colors', 'memberlite' ), 'colors', array(
				'type'              => 'checkbox',
				'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'description'       => __( 'By default, PMPro will use colors from its own settings. Check this box to have PMPro use the colors you have chosen here instead.', 'memberlite' ),
				'priority'          => 2,
			) );
		}

		// COLORS: Header Colors ================
		self::add_memberlite_heading( $wp_customize, 'memberlite_header_colors', __( 'Header Colors', 'memberlite' ), 'colors' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_header', __( 'Header Background Color', 'memberlite' ), 'bgcolor_header' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_site_navigation', __( 'Primary Navigation Background Color', 'memberlite' ), 'bgcolor_site_navigation' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_site_navigation', __( 'Primary Navigation Link Color', 'memberlite' ), 'color_site_navigation' );

		// COLORS: Footer Colors ================
		self::add_memberlite_heading( $wp_customize, 'memberlite_footer_colors', __( 'Footer Colors', 'memberlite' ), 'colors' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_footer_widgets', __( 'Footer Widgets Background Color', 'memberlite' ), 'bgcolor_footer_widgets' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_footer_widgets', __( 'Footer Widgets Text Color', 'memberlite' ), 'color_footer_widgets' );

		// COLORS: Masthead Colors ==============
		self::add_memberlite_heading( $wp_customize, 'memberlite_masthead_colors', __( 'Masthead Colors', 'memberlite' ), 'colors' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_bgcolor_page_masthead', __( 'Page Masthead Background Color', 'memberlite' ), 'bgcolor_page_masthead' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_page_masthead', __( 'Page Masthead Text Color', 'memberlite' ), 'color_page_masthead' );

		// COLORS: Site Colors ==================
		self::add_memberlite_heading( $wp_customize, 'memberlite_body_colors', __( 'Site Colors', 'memberlite' ), 'colors' );

		// Move core controls down in the Colors section
		$header_textcolor_control = $wp_customize->get_control( 'header_textcolor' );
		if ( $header_textcolor_control ) {
			$header_textcolor_control->priority = 11;
		}

		$background_color_control = $wp_customize->get_control( 'background_color' );
		if ( $background_color_control ) {
			$background_color_control->priority = 12;
		}

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_text', __( 'Default Text Color', 'memberlite' ), 'color_text' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_link', __( 'Default Link Color', 'memberlite' ), 'color_link' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_meta_link', __( 'Post Meta Link Color', 'memberlite' ), 'color_meta_link' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_primary', __( 'Primary Color', 'memberlite' ), 'color_primary' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_secondary', __( 'Secondary Color', 'memberlite' ), 'color_secondary' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_action', __( 'Action Color', 'memberlite' ), 'color_action', array(
			'description' => __( 'Used as an accent color for CTAs and decorations.', 'memberlite' ),
		) );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_button', __( 'Default Button Color', 'memberlite' ), 'color_button' );

		self::add_memberlite_color_control( $wp_customize, 'memberlite_color_borders', __( 'Border Color', 'memberlite' ), 'color_borders' );
	}


	/**
	 * Sets breadcrumb-related customizer settings
	 *
	 * @since 6.1.1
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function set_customizer_breadcrumb_settings( WP_Customize_Manager $wp_customize ) {
		// BREADCRUMBS: Breadcrumb Locations ====
		$memberlite_breadcrumbs = array(
			'page_breadcrumbs'       => array(
				'label' => __( 'Breadcrumbs on Pages', 'memberlite' ),
			),
			'post_breadcrumbs'       => array(
				'label' => __( 'Breadcrumbs on Posts', 'memberlite' ),
			),
			'archive_breadcrumbs'    => array(
				'label' => __( 'Breadcrumbs on Archives', 'memberlite' ),
			),
			'attachment_breadcrumbs' => array(
				'label' => __( 'Breadcrumbs on Attachments', 'memberlite' ),
			),
			'search_breadcrumbs'     => array(
				'label' => __( 'Breadcrumbs on Search Results', 'memberlite' ),
			),
			'profile_breadcrumbs'    => array(
				'label' => __( 'Breadcrumbs on Profiles', 'memberlite' ),
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

		// BREADCRUMBS: Breadcrumb Delimiter ====
		self::add_memberlite_setting_control( $wp_customize, 'delimiter', __( 'Breadcrumb Delimiter', 'memberlite' ), 'memberlite_breadcrumbs_options', array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	}

	/**
	 * Sets header-related customizer settings
	 *
	 * @since 6.1.1
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function set_customizer_header_settings( WP_Customize_Manager $wp_customize ) {
		// HEADER: Columns Ratio ================
		self::add_memberlite_setting_control( $wp_customize, 'columns_ratio_header', __( 'Columns Ratio', 'memberlite' ), 'memberlite_header_options', array(
			'type'        => 'select',
			'transport'   => 'refresh',
			'description' => __( 'Controls how the left and right sections of your header are sized. For example, "4-8" makes the left side narrower and the right side wider.', 'memberlite' ),
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

		// HEADER: Other Settings Heading =======
		self::add_memberlite_heading( $wp_customize, 'memberlite_header_heading', __( 'Other Settings', 'memberlite' ), 'memberlite_header_options' );

		// HEADER: Show Login/Member Info =======
		self::add_memberlite_setting_control( $wp_customize, 'meta_login', __( 'Show Login/Member Info in Header', 'memberlite' ), 'memberlite_header_options', array(
			'type'              => 'checkbox',
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
		) );

		// HEADER: Show search form =============
		self::add_memberlite_setting_control( $wp_customize, 'nav_menu_search', __( 'Show Search Form After Main Nav', 'memberlite' ), 'memberlite_header_options', array(
			'type'              => 'checkbox',
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
		) );

		// HEADER: Enable sticky header =========
		self::add_memberlite_setting_control( $wp_customize, 'sticky_nav', __( 'Enable Sticky Header', 'memberlite' ), 'memberlite_header_options', array(
			'type'              => 'checkbox',
			'description'       => __( 'On scroll, the header menu will stick to the top of the screen.', 'memberlite' ),
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
		) );
	}

	/**
	 * Sets footer-related customizer settings
	 *
	 * @since 6.1.1
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function set_customizer_footer_settings( WP_Customize_Manager $wp_customize ) {
		// FOOTER: FOOTER VARIATION STYLE
		self::add_memberlite_setting_control( $wp_customize, 'memberlite_footer_variation', __( 'Footer Variation', 'memberlite' ), 'memberlite_footer_options', array(
				'type'              => 'select',
				'default'           => 'default',
                'description'       => __( 'This determines your footer\'s layout and style.', 'memberlite' ),
				'choices'           => array(
						'default' => __( 'Default', 'memberlite' ),
						'stacked' => __( 'Stacked', 'memberlite' ),
				),
		) );

		// FOOTER: Footer Widgets ===============
		self::add_memberlite_setting_control( $wp_customize, 'memberlite_footerwidgets', __( 'Footer Widget Columns', 'memberlite' ), 'memberlite_footer_options', array(
			'type'              => 'select',
			'sanitize_callback' => 'absint',
			'choices'           => array( '2' => '2', '3' => '3', '4' => '4', '6' => '6' ),
		) );

		// FOOTER: Copyright Text ===============
		self::add_memberlite_setting_control( $wp_customize, 'copyright_textbox', __( 'Copyright Text', 'memberlite' ), 'memberlite_footer_options', array(
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_text_with_links' ),
			'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_text_with_links' ),
		) );

		// FOOTER: Back to Top Heading ==========
		self::add_memberlite_heading( $wp_customize, 'memberlite_back_to_top_heading', __( 'Back to Top', 'memberlite' ), 'memberlite_footer_options' );

		// FOOTER: Back to Top Link =============
		self::add_memberlite_setting_control( $wp_customize, 'memberlite_back_to_top', __( 'Show Back to Top Link', 'memberlite' ), 'memberlite_footer_options', array(
			'type'              => 'checkbox',
			'default'           => true,
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
		) );
	}

	/**
	 * Sets post, page, and archive related customizer settings
	 *
	 * @since 6.1.1
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function set_customizer_post_settings( WP_Customize_Manager $wp_customize ) {
		// POST: Content Archives ===============
		self::add_memberlite_setting_control( $wp_customize, 'content_archives', __( 'Archive Layout', 'memberlite' ), 'memberlite_post_archive_options', array(
			'type'        => 'radio',
			'description' => __( 'Choose how posts are displayed on blog and archive pages.', 'memberlite' ),
			'choices'     => array(
				'content' => __( 'Show Full Post Content', 'memberlite' ),
				'excerpt' => __( 'Show Post Excerpts', 'memberlite' ),
				'grid'    => __( 'Show Posts in a Grid (sidebar hidden)', 'memberlite' ),
			),
		) );

		// POST: Sidebar Location ===============
		self::add_memberlite_setting_control( $wp_customize, 'sidebar_location_blog', __( 'Sidebar Location', 'memberlite' ), 'memberlite_post_archive_options', array(
			'type'    => 'radio',
			'choices' => array(
				'sidebar-blog-right' => __( 'Right Sidebar', 'memberlite' ),
				'sidebar-blog-left'  => __( 'Left Sidebar', 'memberlite' ),
				'sidebar-blog-none'  => __( 'No Sidebar', 'memberlite' ),
			),
		) );

		// POST: Columns Ratio ==================
		self::add_memberlite_setting_control( $wp_customize, 'columns_ratio_blog', __( 'Columns Ratio', 'memberlite' ), 'memberlite_post_archive_options', array(
			'type'        => 'select',
			'transport'   => 'refresh',
			'description' => __( 'Sets the content-to-sidebar width ratio. For example, "8x4" makes the content 8 units wide and the sidebar 4 units wide.', 'memberlite' ),
			'choices'     => array(
				'6-6'  => '6x6',
				'7-5'  => '7x5',
				'8-4'  => '8x4',
				'9-3'  => '9x3',
				'10-2' => '10x2',
				'11-1' => '11x1',
			),
		) );

		// POST: Navigation Settings Heading ====
		self::add_memberlite_heading( $wp_customize, 'memberlite_navigation_post_archive_heading', __( 'Navigation Settings', 'memberlite' ), 'memberlite_post_archive_options' );

		// POST: (prev/next links) Post Nav =====
		self::add_memberlite_setting_control( $wp_customize, 'memberlite_post_nav', __( 'Show Prev/Next on Single Posts', 'memberlite' ), 'memberlite_post_archive_options', array(
			'type'              => 'checkbox',
			'default'           => true,
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
		) );

		// POST: Other Settings Heading =========
		self::add_memberlite_heading( $wp_customize, 'memberlite_post_heading', __( 'Other Settings', 'memberlite' ), 'memberlite_post_archive_options' );

		// POST: Author Block ===================
		self::add_memberlite_setting_control( $wp_customize, 'author_block', __( 'Show Author Block on Posts', 'memberlite' ), 'memberlite_post_archive_options', array(
			'type'              => 'checkbox',
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
		) );

		// POST: Banner & Thumbnail Options =====
		$memberlite_loop_images_choices = array(
			'show_none'      => __( 'Do Not Show Featured Images', 'memberlite' ),
			'show_banner'    => __( 'Show Banner Only', 'memberlite' ),
			'show_thumbnail' => __( 'Show Thumbnail Only', 'memberlite' ),
			'show_block'     => __( 'Show Block Image In Excerpt', 'memberlite' ),
		);

		if ( class_exists( 'MemberliteMultiPostThumbnails' ) ) {
			$memberlite_loop_images_choices['show_both'] = __( 'Show Banner and Thumbnail', 'memberlite' );
		}

		self::add_memberlite_setting_control( $wp_customize, 'memberlite_loop_images', __( 'Featured Images', 'memberlite' ), 'memberlite_post_archive_options', array(
			'type'      => 'select',
			'transport' => 'refresh',
			'choices'   => $memberlite_loop_images_choices,
		) );

		// POST: Post Meta Before ===============
		self::add_memberlite_setting_control( $wp_customize, 'posts_entry_meta_before', __( 'Post Entry Meta (before)', 'memberlite' ), 'memberlite_post_archive_options', array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );

		// POST: Post Meta After ================
		self::add_memberlite_setting_control( $wp_customize, 'posts_entry_meta_after', __( 'Post Entry Meta (after)', 'memberlite' ), 'memberlite_post_archive_options', array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	}

	/**
	 * Sets page-related customizer settings
	 *
	 * @since 6.1.1
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @return void
	 */
	public static function set_customizer_page_settings( WP_Customize_Manager $wp_customize ) {
		// PAGE: Sidebar Location ===============
		self::add_memberlite_setting_control($wp_customize, 'sidebar_location', __( 'Sidebar Location', 'memberlite' ), 'memberlite_page_options', array(
			'type' => 'radio',
			'choices' => array(
				'sidebar-right' => __( 'Right Sidebar', 'memberlite' ),
				'sidebar-left' => __( 'Left Sidebar', 'memberlite' ),
				'sidebar-none' => __( 'No Sidebar', 'memberlite' ),
			),
		));

		// PAGE: Columns Ratio ==================
		self::add_memberlite_setting_control( $wp_customize, 'columns_ratio', __( 'Columns Ratio', 'memberlite' ), 'memberlite_page_options', array(
			'type'        => 'select',
			'transport'   => 'refresh',
			'description' => __( 'Sets the content-to-sidebar width ratio. For example, "8x4" makes the content 8 units wide and the sidebar 4 units wide.', 'memberlite' ),
			'choices'     => array(
				'6-6'  => '6x6',
				'7-5'  => '7x5',
				'8-4'  => '8x4',
				'9-3'  => '9x3',
				'10-2' => '10x2',
				'11-1' => '11x1',
			),
		) );

		// PAGE: Navigation Settings Heading ====
		self::add_memberlite_heading( $wp_customize, 'memberlite_navigation_pages_heading', __( 'Navigation Settings', 'memberlite' ), 'memberlite_page_options' );

		// PAGE: (prev/next links) Page Nav =====
		self::add_memberlite_setting_control( $wp_customize, 'memberlite_page_nav', __( 'Show Prev/Next on Single Pages', 'memberlite' ), 'memberlite_page_options', array(
			'type'              => 'checkbox',
			'default'           => true,
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
		) );

	}

	/**
	 * Helper to add headings for organizational purposes
	 *
	 * @since 6.1.1
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
					'label'   => $label,
					'section' => $section,
					'priority'=> $args['priority'] ?? 10,
				)
			)
		);
	}

	/**
	 * Helper to add setting/control pairs for colors
	 *
	 * @since 6.1.1
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
		global $memberlite_defaults;

		// Define default arguments
		$defaults = array(
			'default'     => isset( $memberlite_defaults[ $setting_id ] ) ? $memberlite_defaults[ $setting_id ] : '',
			'description' => '',
		);

		// Merge passed args with defaults
		$args = wp_parse_args( $args, $defaults );

		// Add Setting
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'              => $args['default'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_hex_color_no_hash' ),
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
	 * @since 6.1.1
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
			'default'           => isset( $memberlite_defaults[ $id ] ) ? $memberlite_defaults[ $id ] : false,
			'type'              => 'text',
			'choices'           => array(),
			'sanitize_callback' => array( 'Memberlite_Customize', 'sanitize_select' ), // Default to select/text
			'transport'         => 'refresh',
			'description'       => '',
		);

		// Merge passed args with defaults
		$args = wp_parse_args( $args, $defaults );

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
		$wp_customize->add_control(
			$id,
			array(
				'label'       => $label,
				'section'     => $section,
				'type'        => $args['type'],
				'choices'     => $args['choices'],
				'description' => $args['description'],
			)
		);
	}

	/**
	 * Call bloginfo to echo the site name.
	 * For use in a customizer callback above.
	 *
	 * @since 3.1
	 */
	public static function bloginfo_name() {
		bloginfo( 'name' );
	}

	/**
	 * Call bloginfo to echo the site description.
	 * For use in a customizer callback above.
	 *
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

		$content_width    = $GLOBALS['content_width'] . 'px';
		$header_font      = memberlite_get_font( 'header_font', true );
		$body_font        = memberlite_get_font( 'body_font', true );

		// Get active colors based on selected scheme
		$active_colors = memberlite_get_active_colors();
		$override_pmpro_colors = get_theme_mod( 'memberlite_pmpro_color_override' );
		?>
		<!--Customizer CSS-->
		<style id="memberlite-customizer-css" type="text/css">
			:root {
				color-scheme: <?php echo memberlite_is_dark_color( $active_colors['background_color'] ) ? 'dark' : 'light'; ?>;
				--memberlite-content-width: <?php echo esc_html( $content_width ); ?>;
				--memberlite-body-font: <?php echo esc_html( $body_font ); ?>, sans-serif;
				--memberlite-header-font: <?php echo esc_html( $header_font ); ?>, sans-serif;
			<?php
			$color_map = memberlite_get_color_preset_map();
			foreach ( $color_map as $setting_key => $preset ) {
				$value = $active_colors[ $setting_key ] ?? '';
				if ( empty( $value ) || 'blank' === $value ) {
					continue;
				}
				echo "\t\t\t\t--memberlite-color-" . esc_attr( $preset['css_var'] ) . ': #' . esc_attr( $value ) . ";\n";
			}
			?>
				--memberlite-hover-brightness: <?php echo esc_attr( $memberlite_defaults['hover_brightness'] ); ?>;
				--memberlite-color-white: #ffffff;

			<?php if ( $override_pmpro_colors && defined( 'PMPRO_VERSION' ) ) : ?>
				/* PMPro color vars */
				--pmpro--color--accent: <?php echo '#' . esc_attr( $active_colors['color_primary'] ); ?>;
				--pmpro--color--accent--variation: <?php echo '#' . esc_attr( $active_colors['color_primary'] ); ?>;
				--pmpro--color--base: <?php echo '#' . esc_attr( $active_colors['background_color'] ); ?>;
				--pmpro--color--contrast: <?php echo '#' . esc_attr( $active_colors['color_text'] ); ?>;
			<?php endif; ?>

			}
		</style>
		<!--/Customizer CSS-->
		<?php
	}

	/**
	 * Localize $memberlite_defaults for use in the customizer live preview JS
	 *
	 * @return void
	 */
	public static function live_preview() {
		global $memberlite_defaults;

		wp_register_script(
			'Memberlite_Customizer',
			MEMBERLITE_URL . '/js/customizer.js',
			array( 'jquery', 'customize-preview' ),
			MEMBERLITE_VERSION,
			true
		);

		// Localize the script with new data
		wp_localize_script( 'Memberlite_Customizer', 'memberlite_defaults', $memberlite_defaults );

		// Localize the WP preset slug map so JS can build --wp--preset--color--{slug} var names.
		wp_localize_script( 'Memberlite_Customizer', 'memberlite_preset_slugs', memberlite_get_color_preset_slugs() );

		// Localize the css_var suffixes so JS can build --memberlite-color-{css_var} var names.
		wp_localize_script( 'Memberlite_Customizer', 'memberlite_css_vars', memberlite_get_color_css_vars() );

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
	 * Sanitize a hex color without hash and lowercase it.
	 *
	 * Wraps sanitize_hex_color_no_hash() and ensures the
	 * returned value is always lowercase.
	 *
	 * @since TBD
	 *
	 * @param string $color Hex color value without hash.
	 * @return string|null Sanitized lowercase hex color or null.
	 */
	public static function sanitize_hex_color_no_hash( $color ) {
		$color = sanitize_hex_color_no_hash( $color );
		if ( $color ) {
			$color = strtolower( $color );
		}
		return $color;
	}

	/**
	 * Sanitization callback for color schemes.
	 *
	 * @since TBD
	 *
	 * @param string $value Color scheme name value.
	 * @return string Color scheme name.
	 */
	public static function sanitize_color_scheme( $value ) {
		$color_schemes = memberlite_get_color_scheme_choices();

		if ( ! array_key_exists( $value, $color_schemes ) ) {
			$value = 'default';
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
	 * Passes color scheme data as colorSchemes global.
	 *
	 * @since TBD
	 */
	public static function customizer_controls_js() {
		wp_enqueue_script(
			'Memberlite_Customizer-controls',
			MEMBERLITE_URL . '/js/customizer-controls.js',
			array( 'customize-controls', 'iris', 'underscore', 'wp-util', 'wp-color-picker' ),
			MEMBERLITE_VERSION,
			true
		);

		// Pass color schemes to JS - convert to format JS expects
		$schemes    = memberlite_get_color_schemes();
		$js_schemes = array();

		foreach ( $schemes as $key => $scheme ) {
			$js_schemes[ $key ] = array(
				'label'  => $scheme['label'],
				'colors' => $scheme['colors'],
			);
		}

		wp_localize_script( 'Memberlite_Customizer-controls', 'colorSchemes', $js_schemes );
		wp_localize_script( 'Memberlite_Customizer-controls', 'colorSettingKeys', memberlite_get_color_setting_keys() );
		wp_localize_script( 'Memberlite_Customizer-controls', 'memberlite_preset_slugs', memberlite_get_color_preset_slugs() );

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
 *
 * @since 6.1.1
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

/**
 * When the color scheme changes, save all colors to theme_mods.
 *
 * This ensures the individual color settings are always the source of truth.
 *
 * @since TBD
 */
add_action( 'customize_save_after', 'memberlite_save_scheme_colors' );

function memberlite_save_scheme_colors( WP_Customize_Manager $wp_customize ) {
	$scheme_setting = $wp_customize->get_setting( 'memberlite_color_scheme' );

	if ( ! $scheme_setting ) {
		return;
	}

	$scheme_key = $scheme_setting->value();

	// Don't save colors if it's custom mode
	if ( 'custom' === $scheme_key ) {
		return;
	}

	// Get the scheme colors
	$scheme_colors = memberlite_get_scheme_colors( $scheme_key );

	if ( ! $scheme_colors ) {
		return;
	}

	// Save all colors to theme_mods
	foreach ( $scheme_colors as $key => $value ) {
		// Skip header_textcolor if currently 'blank' (user chose to hide site title/tagline)
		if ( $key === 'header_textcolor' && get_theme_mod( 'header_textcolor' ) === 'blank' ) {
			continue;
		}

		$value = strtolower( ltrim( $value, '#' ) );

		set_theme_mod( $key, $value );
	}
}
