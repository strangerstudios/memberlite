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
	public static function register( $wp_customize ) {
		global $memberlite_defaults;
		$wp_customize->add_section(
			'memberlite_theme_options',
			array(
				'title'       => __( 'Memberlite Options', 'memberlite' ),
				'priority'    => 35,
				'description' => __( 'Allows you to customize settings for Memberlite.', 'memberlite' ),
			)
		);

		$wp_customize->add_setting(
			'memberlite_webfonts',
			array(
				'default'              => $memberlite_defaults['memberlite_webfonts'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_select' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'memberlite_webfonts',
			array(
				'label'    => __( 'Font', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'select',
				'choices'  => Memberlite_Customize::get_all_fonts(),
				'priority' => 10,
			)
		);

		$wp_customize->add_setting(
			'meta_login',
			array(
				'default'              => false,
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'meta_login',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Show Login/Member Info in Header', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'priority' => '15',
			)
		);

		$wp_customize->add_setting(
			'nav_menu_search',
			array(
				'default'              => false,
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'nav_menu_search',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Show Search Form After Main Nav', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'priority' => '20',
			)
		);

		$wp_customize->add_setting(
		    'sticky_nav',
			array(
		        'default'   => false,
		        'transport' => 'refresh',
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
		    )
		);

		$wp_customize->add_control(
		    'sticky_nav',
			array(
				'type'     => 'checkbox',
		        'label'    => __( 'Stick Menu to Top of Screen on Scroll', 'memberlite' ),
		        'section'  => 'memberlite_theme_options',
		        'priority' => '21',
		    )
		);

		$wp_customize->add_setting(
			'columns_ratio_header',
			array(
				'default'              => $memberlite_defaults['columns_ratio_header'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_select' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
				'transport'            => 'refresh',
			)
		);

		$wp_customize->add_control(
			'columns_ratio_header',
			array(
				'label'    => __( 'Columns Ratio - Header', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'select',
				'choices'  => array(
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
				'priority' => 23,
			)
		);

		$wp_customize->add_setting(
			'columns_ratio',
			array(
				'default'              => $memberlite_defaults['columns_ratio'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_select' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
				'transport'            => 'refresh',
			)
		);

		$wp_customize->add_control(
			'columns_ratio',
			array(
				'label'    => __( 'Columns Ratio - Primary', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'select',
				'choices'  => array(
					'6-6'  => __( '6x6', 'memberlite' ),
					'7-5'  => __( '7x5', 'memberlite' ),
					'8-4'  => __( '8x4', 'memberlite' ),
					'9-3'  => __( '9x3', 'memberlite' ),
					'10-2' => __( '10x2', 'memberlite' ),
					'11-1' => __( '11x1', 'memberlite' ),
				),
				'priority' => 24,
			)
		);

		$wp_customize->add_setting(
			'sidebar_location',
			array(
				'default'              => $memberlite_defaults['sidebar_location'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_select' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'sidebar_location',
			array(
				'label'    => __( 'Default Layout', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'radio',
				'choices'  => array(
					'sidebar-right' => __( 'Right Sidebar', 'memberlite' ),
					'sidebar-left'  => __( 'Left Sidebar', 'memberlite' ),
				),
				'priority' => 25,
			)
		);

		$wp_customize->add_setting(
			'sidebar_location_blog',
			array(
				'default'              => $memberlite_defaults['sidebar_location_blog'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_select' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'sidebar_location_blog',
			array(
				'label'    => __( 'Layout for Blog, Archive, Posts', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'radio',
				'choices'  => array(
					'sidebar-blog-right' => __( 'Right Sidebar', 'memberlite' ),
					'sidebar-blog-left'  => __( 'Left Sidebar', 'memberlite' ),
				),
				'priority' => 30,
			)
		);

		$wp_customize->add_setting(
			'content_archives',
			array(
				'default'              => $memberlite_defaults['content_archives'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_select' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'content_archives',
			array(
				'label'    => __( 'Content Archives', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'radio',
				'choices'  => array(
					'content' => __( 'Show Post Content', 'memberlite' ),
					'excerpt' => __( 'Show Post Excerpts', 'memberlite' ),
				),
				'priority' => 40,
			)
		);

		$memberlite_breadcrumbs = array();

		$memberlite_breadcrumbs[] = array(
			'slug'     => 'page_breadcrumbs',
			'label'    => __( 'Breadcrumbs on Pages', 'memberlite' ),
			'priority' => 51,
		);

		$memberlite_breadcrumbs[] = array(
			'slug'     => 'post_breadcrumbs',
			'label'    => __( 'Breadcrumbs on Posts', 'memberlite' ),
			'priority' => 52,
		);

		$memberlite_breadcrumbs[] = array(
			'slug'     => 'archive_breadcrumbs',
			'label'    => __( 'Breadcrumbs on Archives', 'memberlite' ),
			'priority' => 53,
		);

		$memberlite_breadcrumbs[] = array(
			'slug'     => 'attachment_breadcrumbs',
			'label'    => __( 'Breadcrumbs on Attachments', 'memberlite' ),
			'priority' => 54,
		);

		$memberlite_breadcrumbs[] = array(
			'slug'     => 'search_breadcrumbs',
			'label'    => __( 'Breadcrumbs on Search Results', 'memberlite' ),
			'priority' => 55,
		);

		$memberlite_breadcrumbs[] = array(
			'slug'     => 'profile_breadcrumbs',
			'label'    => __( 'Breadcrumbs on Profiles', 'memberlite' ),
			'priority' => 56,
		);

		foreach ( $memberlite_breadcrumbs as $memberlite_breadcrumb ) {
			// SETTINGS
			$wp_customize->add_setting(
				$memberlite_breadcrumb['slug'],
				array(
					'default'              => false,
					'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
					'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				$memberlite_breadcrumb['slug'],
				array(
					'type'     => 'checkbox',
					'label'    => $memberlite_breadcrumb['label'],
					'section'  => 'memberlite_theme_options',
					'priority' => $memberlite_breadcrumb['priority'],
				)
			);
		};

		$wp_customize->add_setting(
			'memberlite_post_nav',
			array(
				'default'              => true,
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'memberlite_post_nav',
			array(
				'type'     => 'checkbox',
				'label'    => 'Show Prev/Next on Single Posts',
				'section'  => 'memberlite_theme_options',
				'priority' => '60',
			)
		);

		$wp_customize->add_setting(
			'memberlite_page_nav',
			array(
				'default'              => true,
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'memberlite_page_nav',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Show Prev/Next on Single Pages', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'priority' => '61',
			)
		);

		$wp_customize->add_setting(
			'memberlite_loop_images',
			array(
				'default'              => $memberlite_defaults['memberlite_loop_images'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_select' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
				'transport'            => 'refresh',
			)
		);

		// Define dropdown options for the Featured Images on Index/Archives option.
		$memberlite_loop_images_choices = array(
			'show_none'      => __( 'Do Not Show Featured Images', 'memberlite' ),
			'show_banner'    => __( 'Show Banner Only', 'memberlite' ),
			'show_thumbnail' => __( 'Show Thumbnail Only', 'memberlite' ),
		);

		// Add a "show_both" option if the Multiple Post Thumbnails plugin is active.
		if ( defined( 'MEMBERLITE_ELEMENTS_VERSION' ) && class_exists( 'MultiPostThumbnails' ) ) {
			$memberlite_loop_images_choices['show_both'] = __( 'Show Banner and Thumbnail', 'memberlite' );
		}

		$wp_customize->add_control(
			'memberlite_loop_images',
			array(
				'label'    => __( 'Featured Images on Posts Page and Archives', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'select',
				'choices'  => $memberlite_loop_images_choices,
				'priority' => 70,
			)
		);

		$wp_customize->add_setting(
			'posts_entry_meta_before',
			array(
				'default'              => $memberlite_defaults['posts_entry_meta_before'],
				'sanitize_callback'    => 'sanitize_text_field',
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'posts_entry_meta_before',
			array(
				'label'    => __( 'Post Entry Meta (before)', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'text',
				'priority' => 80,
			)
		);

		$wp_customize->add_setting(
			'posts_entry_meta_after',
			array(
				'default'              => $memberlite_defaults['posts_entry_meta_after'],
				'sanitize_callback'    => 'sanitize_text_field',
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'posts_entry_meta_after',
			array(
				'label'    => __( 'Post Entry Meta (after)', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'text',
				'priority' => 90,
			)
		);

		$wp_customize->add_setting(
			'memberlite_footerwidgets',
			array(
				'default'              => $memberlite_defaults['memberlite_footerwidgets'],
				'sanitize_callback'    => 'absint',
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'memberlite_footerwidgets',
			array(
				'label'    => __( 'Footer Widgets', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'select',
				'choices'  => array(
					'2' => __( '2', 'memberlite' ),
					'3' => __( '3', 'memberlite' ),
					'4' => __( '4', 'memberlite' ),
					'6' => __( '6', 'memberlite' ),
				),
				'priority' => 100,
			)
		);

		$wp_customize->add_setting(
			'delimiter',
			array(
				'default'              => $memberlite_defaults['delimiter'],
				'sanitize_callback'    => 'sanitize_text_field',
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'delimiter',
			array(
				'label'    => __( 'Breadcrumb Delimiter', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'text',
				'priority' => 110,
			)
		);

		$wp_customize->add_setting(
			'copyright_textbox',
			array(
				'default'              => $memberlite_defaults['copyright_textbox'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_text_with_links' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_text_with_links' ),
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'copyright_textbox',
			array(
				'label'    => __( 'Copyright Text', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'type'     => 'text',
				'priority' => 120,
			)
		);

		$wp_customize->add_setting(
			'memberlite_back_to_top',
			array(
				'default'              => true,
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'memberlite_back_to_top',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Show Back to Top Link', 'memberlite' ),
				'section'  => 'memberlite_theme_options',
				'priority' => '130',
			)
		);

		$wp_customize->add_setting(
			'memberlite_color_scheme',
			array(
				'default'              => $memberlite_defaults['memberlite_color_scheme'],
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_color_scheme' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_color_scheme' ),
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'memberlite_color_scheme',
			array(
				'label'    => __( 'Color Scheme', 'memberlite' ),
				'section'  => 'colors',
				'type'     => 'select',
				'choices'  => array_merge(
					Memberlite_Customize::get_color_scheme_choices(),
					array(
						'custom' => 'Custom',
					)
				),
				'priority' => 1,
			)
		);

		$wp_customize->add_setting(
			'memberlite_darkcss',
			array(
				'default'              => false,
				'sanitize_callback'    => array( 'Memberlite_Customize', 'sanitize_checkbox' ),
				'sanitize_js_callback' => array( 'Memberlite_Customize', 'sanitize_js_callback' ),
			)
		);

		$wp_customize->add_control(
			'memberlite_darkcss',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Use Dark Background/Inverted Scheme', 'memberlite' ),
				'section'  => 'colors',
				'priority' => '2',
			)
		);

		$wp_customize->add_setting(
			'bgcolor_site_navigation',
			array(
				'default'              => $memberlite_defaults['bgcolor_site_navigation'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'memberlite_bgcolor_site_navigation',
				array(
					'label'    => __( 'Primary Navigation Background Color', 'memberlite' ),
					'section'  => 'colors',
					'settings' => 'bgcolor_site_navigation',
					'priority' => 10,
				)
			)
		);

		$wp_customize->add_setting(
			'color_site_navigation',
			array(
				'default'              => $memberlite_defaults['color_site_navigation'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'memberlite_color_site_navigation',
				array(
					'label'    => __( 'Primary Navigation Color', 'memberlite' ),
					'section'  => 'colors',
					'settings' => 'color_site_navigation',
					'priority' => 20,
				)
			)
		);

		$wp_customize->add_setting(
			'color_link',
			array(
				'default'              => $memberlite_defaults['color_link'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'memberlite_color_link',
				array(
					'label'    => __( 'Link Color', 'memberlite' ),
					'section'  => 'colors',
					'settings' => 'color_link',
					'priority' => 30,
				)
			)
		);

		$wp_customize->add_setting(
			'color_meta_link',
			array(
				'default'              => $memberlite_defaults['color_meta_link'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'memberlite_color_meta_link',
				array(
					'label'    => __( 'Meta Link Color', 'memberlite' ),
					'section'  => 'colors',
					'settings' => 'color_meta_link',
					'priority' => 40,
				)
			)
		);

		$wp_customize->add_setting(
			'color_primary',
			array(
				'default'              => $memberlite_defaults['color_primary'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'memberlite_color_primary',
				array(
					'label'    => __( 'Primary Color', 'memberlite' ),
					'section'  => 'colors',
					'settings' => 'color_primary',
					'priority' => 50,
				)
			)
		);

		$wp_customize->add_setting(
			'color_secondary',
			array(
				'default'              => $memberlite_defaults['color_secondary'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'memberlite_color_secondary',
				array(
					'label'    => __( 'Secondary Color', 'memberlite' ),
					'section'  => 'colors',
					'settings' => 'color_secondary',
					'priority' => 60,
				)
			)
		);

		$wp_customize->add_setting(
			'color_action',
			array(
				'default'              => $memberlite_defaults['color_action'],
				'sanitize_callback'    => 'sanitize_hex_color',
				'sanitize_js_callback' => 'maybe_hash_hex_color',
				'transport'            => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'memberlite_color_action',
				array(
					'label'    => __( 'Action Color', 'memberlite' ),
					'section'  => 'colors',
					'settings' => 'color_action',
					'priority' => 70,
				)
			)
		);

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

	public static function header_output() {
		global $memberlite_defaults;
		?>
		<!--Customizer CSS-->
		<style type="text/css">
			<?php self::generate_css_from_mod( $memberlite_defaults['bgcolor_site_navigation_elements'], 'background', 'bgcolor_site_navigation' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_site_navigation_elements'], 'color', 'color_site_navigation' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_link_color_elements'], 'color', 'color_link' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_meta_link_color_elements'], 'color', 'color_meta_link' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_primary_background_elements'], 'background', 'color_primary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_primary_color_elements'], 'color', 'color_primary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_secondary_background_elements'], 'background', 'color_secondary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_secondary_border_elements'], 'border-top-color', 'color_secondary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_secondary_border_elements'], 'border-bottom-color', 'color_secondary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_secondary_border_left_elements'], 'border-left-color', 'color_secondary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_secondary_border_right_elements'], 'border-right-color', 'color_secondary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_secondary_color_elements'], 'color', 'color_secondary' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_action_background_elements'], 'background', 'color_action' ); ?>
			<?php self::generate_css_from_mod( $memberlite_defaults['color_action_color_elements'], 'color', 'color_action' ); ?>

			<?php
				// hover styles
				$color_primary = get_theme_mod( 'color_primary' );
			if ( empty( $color_primary ) ) {
				$color_primary = $memberlite_defaults['color_primary'];
			}
				$color_primary_rgb   = self::hex2rgb( $color_primary );
				$color_primary_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_primary_rgb );
				self::generate_css( $memberlite_defaults['color_primary_background_hover_elements'], 'background', $color_primary_hover );
				self::generate_css( $memberlite_defaults['color_primary_color_hover_elements'], 'color', $color_primary_hover );

				$color_secondary = get_theme_mod( 'color_secondary' );
			if ( empty( $color_secondary ) ) {
				$color_secondary = $memberlite_defaults['color_secondary'];
			}
				$color_secondary_rgb   = self::hex2rgb( $color_secondary );
				$color_secondary_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_secondary_rgb );
				self::generate_css( $memberlite_defaults['color_secondary_background_hover_elements'], 'background', $color_secondary_hover );

				$color_action = get_theme_mod( 'color_action' );
			if ( empty( $color_action ) ) {
				$color_action = $memberlite_defaults['color_action'];
			}
				$color_action_rgb   = self::hex2rgb( $color_action );
				$color_action_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_action_rgb );
				self::generate_css( $memberlite_defaults['color_action_background_hover_elements'], 'background', $color_action_hover );

				$color_link = get_theme_mod( 'color_link' );
			if ( empty( $color_link ) ) {
				$color_link = $memberlite_defaults['color_link'];
			}
				$color_link_rgb   = self::hex2rgb( $color_link );
				$color_link_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_link_rgb );
				self::generate_css( $memberlite_defaults['color_link_hover_elements'], 'color', $color_link_hover );

				$color_site_navigation = get_theme_mod( 'color_site_navigation' );
			if ( empty( $color_site_navigation ) ) {
				$color_site_navigation = $memberlite_defaults['color_site_navigation'];
			}
				$color_site_navigation_rgb   = self::hex2rgb( $color_site_navigation );
				$color_site_navigation_hover = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_site_navigation_rgb );
				self::generate_css( $memberlite_defaults['color_site_navigation_hover_elements'], 'color', $color_site_navigation_hover );
			?>

			<?php
				$header_textcolor = get_theme_mod( 'header_textcolor' );
				if ( $header_textcolor != 'blank' ) {
					self::generate_css_from_mod( '.site-title a, .site-header .site-description', 'color', 'header_textcolor', '#' );
				}
			?>
			<?php self::generate_css_from_mod( 'body, .banner_body', 'background-color', 'background_color', '#' ); ?>
			<?php
				$fonts_string = get_theme_mod( 'memberlite_webfonts' );
			if ( empty( $fonts_string ) ) {
				global $memberlite_defaults;
				$fonts_string = $memberlite_defaults['memberlite_webfonts'];
			}
				$fonts       = explode( '_', $fonts_string );
				$header_font = str_replace( '-', ' ', $fonts[0] );
				$body_font   = str_replace( '-', ' ', $fonts[1] );
			?>
			<?php echo 'body, button, input[type="button"], input[type="reset"], input[type="submit"], .btn, a.comment-reply-link, a.pmpro_btn, input[type="submit"].pmpro_btn, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, form.pmpro_form thead th span.pmpro_thead-msg {font-family: "' . esc_html( $body_font ) . '", sans-serif; }'; ?>
			<?php echo 'h1, h2, h3, h4, h5, h6, label, .navigation, th, .pmpro_checkout thead th, #pmpro_account .pmpro_box h3, #meta-member .user, #bbpress-forums li.bbp-header, #bbpress-forums li.bbp-footer, #bbpress-forums fieldset.bbp-form legend {font-family: "' . esc_html( $header_font ) . '", sans-serif; }'; ?>
		</style>
		<!--/Customizer CSS-->
		<?php
	}

	public static function live_preview() {
		global $memberlite_defaults;
		wp_register_script(
			'Memberlite_Customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'jquery', 'customize-preview' ),
			'20140902',
			true
		);
		// Localize the script with new data
		wp_localize_script( 'Memberlite_Customizer', 'memberlite_defaults', $memberlite_defaults );
		wp_enqueue_script( 'Memberlite_Customizer' );
	}

	public static function generate_css_from_mod( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
		$return = '';
		$mod    = get_theme_mod( $mod_name );

		if ( ! empty( $mod ) ) {
			$return = sprintf(
				'%s { %s: %s; }',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);
			if ( $echo ) {
				echo esc_html( $return );
			}
		}
		return $return;
	}

	public static function generate_css( $selector, $style, $value, $prefix = '', $postfix = '', $echo = true ) {
		$return = '';

		// Note: We only need to escape the value here.
		// $selector is known value and escaping it would break the CSS usage of ">" symbol.
		if ( ! empty( $value ) ) {
			$return = sprintf(
				'%s { %s: %s; }',
				$selector,
				$style,
				$prefix . esc_html( $value ) . $postfix
			);
			if ( $echo ) {
				echo $return;
			}
		}
		return $return;
	}

	/**
	 * Get Google fonts
	 */
	public static function get_google_fonts() {
		return array(
			'Lato_Lato'                          => __( 'Lato', 'memberlite' ),
			'PT-Sans_PT-Serif'                   => __( 'PT Sans and PT Serif', 'memberlite' ),
			'Fjalla-One_Noto-Sans'               => __( 'Fjalla One and Noto Sans', 'memberlite' ),
			'Pathway-Gothic-One_Source-Sans-Pro' => __( 'Pathway Gothic One and Source Sans Pro', 'memberlite' ),
			'Oswald_Lato'                        => __( 'Oswald and Lato', 'memberlite' ),
			'Ubuntu_Open-Sans'                   => __( 'Ubuntu and Open Sans', 'memberlite' ),
			'Lato_Source-Sans-Pro'               => __( 'Lato and Source Sans Pro', 'memberlite' ),
			'Roboto-Slab_Roboto'                 => __( 'Roboto Slab and Roboto', 'memberlite' ),
			'Lato_Merriweather'                  => __( 'Lato and Merriweather', 'memberlite' ),
			'Playfair-Display_Open-Sans'         => __( 'Playfair Display and Open Sans', 'memberlite' ),
			'Oswald_Quattrocento'                => __( 'Oswald and Quattrocento', 'memberlite' ),
			'Abril-Fatface_Open-Sans'            => __( 'Abril Fatface and Open Sans', 'memberlite' ),
			'Open-Sans_Gentium-Book-Basic'       => __( 'Open Sans and Gentium Book Basic', 'memberlite' ),
			'Oswald_PT-Mono'                     => __( 'Oswald and PT Mono', 'memberlite' ),
		);
	}

	/**
	 * Get array of web safe fonts
	 */
	public static function get_web_safe_fonts() {
		return array(
			'Arial_Arial'						 => __( 'Arial', 'memberlite' ),
			'Bookman_Bookman'					 => __( 'Bookman', 'memberlite' ),
			'Courier_Courier'					 => __( 'Courier', 'memberlite' ),
			'Courier-New_Courier-New'			 => __( 'Courier New', 'memberlite' ),
			'Garamond_Garamond'					 => __( 'Garamond', 'memberlite' ),
			'Georgia_Georgia'					 => __( 'Georgia', 'memberlite' ),
			'Helvetica_Helvetica'				 => __( 'Helvetica', 'memberlite' ),
			'Times_Times'						 => __( 'Times', 'memberlite' ),
			'Times-New-Roman_Times-New-Roman'	 => __( 'Times New Roman', 'memberlite' ),
			'Trebuchet-MS_Trebuchet-MS'			 => __( 'Trebuchet MS', 'memberlite' ),
			'Verdana_Verdana'					 => __( 'Verdana', 'memberlite' ),
		);
	}

	/**
	 * Get array of all fonts
	 */
	public static function get_all_fonts() {
		return array_merge( Memberlite_Customize::get_google_fonts(), Memberlite_Customize::get_web_safe_fonts() );
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
	 * 3. Primary Navigation Background Color
	 * 4. Primary Navigation Link Color
	 * 5. Link Color
	 * 6. Meta Link Color
	 * 7. Primary Color
	 * 8. Secondary Color
	 * 9. Action Color
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @return array An associative array of color scheme options.
	 */
	public static function get_color_schemes() {
		return apply_filters(
			'memberlite_color_schemes', array(
				'default'        => array(
					'label'  => __( 'Default', 'memberlite' ),
					'colors' => array(
						'#2c3e50',
						'#ffffff',
						'#FAFAFA',
						'#777777',
						'#2C3E50',
						'#2C3E50',
						'#2C3E50',
						'#18BC9C',
						'#F39C12',
					),
				),
				'education'      => array(
					'label'  => __( 'Education', 'memberlite' ),
					'colors' => array(
						'#3a9ad9',
						'#f4efea',
						'#e2ded9',
						'#354458',
						'#3a9ad9',
						'#3a9ad9',
						'#354458',
						'#eb7260',
						'#29aba4',
					),
				),
				'modern_teal'    => array(
					'label'  => __( 'Modern Teal', 'memberlite' ),
					'colors' => array(
						'#424242',
						'#efefef',
						'#424242',
						'#efefef',
						'#00ccd6',
						'#00ccd6',
						'#00ccd6',
						'#424242',
						'#ffd900',
					),
				),
				'mono_blue'      => array(
					'label'  => __( 'Mono Blue', 'memberlite' ),
					'colors' => array(
						'#00aeef',
						'#ffffff',
						'#00aeef',
						'#ffffff',
						'#00aeef',
						'#00aeef',
						'#333333',
						'#555555',
						'#00aeef',
					),
				),
				'mono_green'     => array(
					'label'  => __( 'Mono Green', 'memberlite' ),
					'colors' => array(
						'#00a651',
						'#ffffff',
						'#00a651',
						'#ffffff',
						'#00a651',
						'#00a651',
						'#333333',
						'#555555',
						'#00a651',
					),
				),
				'mono_orange'    => array(
					'label'  => __( 'Mono Orange', 'memberlite' ),
					'colors' => array(
						'#f39c12',
						'#ffffff',
						'#f39c12',
						'#ffffff',
						'#f39c12',
						'#f39c12',
						'#333333',
						'#555555',
						'#f39c12',
					),
				),
				'mono_pink'      => array(
					'label'  => __( 'Mono Pink', 'memberlite' ),
					'colors' => array(
						'#ed0977',
						'#ffffff',
						'#ed0977',
						'#ffffff',
						'#ed0977',
						'#ed0977',
						'#333333',
						'#555555',
						'#ed0977',
					),
				),
				'pop'            => array(
					'label'  => __( 'Pop!', 'memberlite' ),
					'colors' => array(
						'#53bbf4',
						'#FFFFFF',
						'#b1eb00',
						'#666666',
						'#b1eb00',
						'#b1eb00',
						'#53bbf4',
						'#ffac00',
						'#ff85cb',
					),
				),
				'primary'        => array(
					'label'  => __( 'Not So Primary', 'memberlite' ),
					'colors' => array(
						'#1352a2',
						'#f0f1ee',
						'#ffffff',
						'#555555',
						'#fb6964',
						'#fb6964',
						'#1352a2',
						'#fb6964',
						'#ffd464',
					),
				),
				'raspberry_lime' => array(
					'label'  => __( 'Raspberry Lime', 'memberlite' ),
					'colors' => array(
						'#aa2159',
						'#ffffff',
						'#700035',
						'#efefef',
						'#009d97',
						'#aa2159',
						'#aa2159',
						'#009d97',
						'#bcc747',
					),
				),
				'slate_blue'     => array(
					'label'  => __( 'Slate Blue', 'memberlite' ),
					'colors' => array(
						'#6991ac',
						'#f5f5f5',
						'#ffffff',
						'#67727a',
						'#6991ac',
						'#6991ac',
						'#67727a',
						'#6991ac',
						'#d75c37',
					),
				),
				'watermelon'     => array(
					'label'  => __( 'Watermelon Seed', 'memberlite' ),
					'colors' => array(
						'#363635',
						'#f9f9f7',
						'#363635',
						'#ffffff',
						'#83bf17',
						'#83bf17',
						'#83bf17',
						'#363635',
						'#f15d58',
					),
				),
			)
		);
	}

	/**
	 * Returns an array of color scheme choices registered for Memberlite.
	 *
	 * @since Memberlite 2.0
	 *
	 * @return array Array of color schemes.
	 */
	public static function get_color_scheme_choices() {
		$color_schemes                = Memberlite_Customize::get_color_schemes();
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
	 * @param string               $input   Slug to sanitize.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
	 */
	public static function sanitize_select( $input, $setting ) {
		$input = sanitize_text_field( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	/**
	 * Sanitization callback for color schemes.
	 *
	 * @since Memberlite 2.0
	 *
	 * @param string $value Color scheme name value.
	 * @return string Color scheme name.
	 */
	public static function sanitize_color_scheme( $value ) {
		$color_schemes = array_merge(
			Memberlite_Customize::get_color_scheme_choices(),
			array(
				'custom' => 'Custom',
			)
		);
		if ( ! array_key_exists( $value, $color_schemes ) ) {
			$value = 'default';
		}
		return $value;
	}

	public static function sanitize_js_color_scheme( $value ) {
		$color_schemes = array_merge(
			Memberlite_Customize::get_color_scheme_choices(),
			array(
				'custom' => 'Custom',
			)
		);
		if ( ! array_key_exists( $value, $color_schemes ) ) {
			$value = 'default';
		}
		return esc_js( $value );
	}

	/**
	 * Sanitization callback text that may contain links
	 *
	 * @since Memberlite 2.0
	 *
	 * @param string $value string to sanitize.
	 * @return string sanitized string.
	 */
	public static function sanitize_text_with_links( $value ) {
		$allowed_html = array(
			'a' => array(
				'class' => array(),
				'href'  => array(),
				'title' => array(),
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
	 * @since Twenty Fifteen 1.0
	 */
	public static function customizer_controls_js() {
		wp_enqueue_script( 'Memberlite_Customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), MEMBERLITE_VERSION, true );
		wp_localize_script( 'Memberlite_Customizer-controls', 'colorSchemes', Memberlite_Customize::get_color_schemes() );
	}

	/**
	 * Convert HEX to RGB.
	 *
	 * Borrowed from Twentyfifteen: https://github.com/WordPress/WordPress/blob/master/wp-content/themes/twentyfifteen/inc/customizer.php
	 *
	 * @since Memberlite 2.0.4
	 *
	 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
	 * @return array Array containing RGB (red, green, and blue) values for the given
	 *               HEX code, empty array otherwise.
	 */
	public static function hex2rgb( $color ) {
		$color = trim( $color, '#' );
		if ( strlen( $color ) == 3 ) {
			$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
			$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
			$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
		} elseif ( strlen( $color ) == 6 ) {
			$r = hexdec( substr( $color, 0, 2 ) );
			$g = hexdec( substr( $color, 2, 2 ) );
			$b = hexdec( substr( $color, 4, 2 ) );
		} else {
			return array();
		}
		return array(
			'red'   => $r,
			'green' => $g,
			'blue'  => $b,
		);
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Memberlite_Customize', 'register' ) );
add_action( 'customize_controls_enqueue_scripts', array( 'Memberlite_Customize', 'customizer_controls_js' ) );

// Output custom CSS to live site
add_action( 'wp_head', array( 'Memberlite_Customize', 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', array( 'Memberlite_Customize', 'live_preview' ) );
