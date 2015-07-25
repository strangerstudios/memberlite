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
$memberlite_defaults = array(
	'memberlite_webfonts' => 'Lato_Lato',
	'sidebar_location' => 'sidebar-right',
	'sidebar_location_blog' => 'sidebar-blog-right',
	'content_archives' => 'content',
	'memberlite_loop_images' => 'show_both',
	'memberlite_footerwidgets' => '4',
	'copyright_textbox' => '<a href="http://wordpress.org/" rel="license">Proudly powered by WordPress</a><span class="sep"> | </span>Theme: Memberlite by <a href="http://paidmembershipspro.com" rel="license">Kim Coleman</a>',
	'memberlite_color_scheme' => 'Default',
	'color_link' => '#2C3E50',
	'color_meta_link' => '#2C3E50',
	'color_primary' => '#2C3E50',
	'color_secondary' => '#18BC9C',
	'color_action' => '#F39C12',
	'color_link_color_elements' => '#primary a',
	'color_meta_link_color_elements' => '#meta-navigation a',
	'color_primary_background_elements' => '#mobile-navigation, #mobile-navigation-height-col, .masthead, .footer-widgets, .btn_primary, .btn_primary:link, .bg_primary, .banner_primary',
	'color_primary_color_elements' => '.site-header .site-title a, .main-navigation li:hover > a, #secondary .widget a:hover, .primary',
	'color_secondary_background_elements' => '#meta-member aside, #meta-member .member-navigation ul ul, a.pmpro_btn:hover, input[type="submit"].pmpro_btn:hover, .btn_secondary, .btn_secondary:link, .btn_primary:hover, .pmpro_content_message a:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, #banner_bottom, .bg_secondary, .banner_secondary',
	'color_secondary_border_elements' => '#pmpro_levels .pmpro_level-highlight, #pmpro_levels.pmpro_levels-compare_table thead tr:first-child th.pmpro_level-highlight, #pmpro_levels.pmpro_levels-compare_table tfoot tr:last-child td.pmpro_level-highlight, .memberlite_signup',
	'color_secondary_border_left_elements' => '#pmpro_levels.pmpro_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-compare_table tfoot td.pmpro_level-highlight',
	'color_secondary_border_right_elements' => '#pmpro_levels.pmpro_levels-compare_table thead th.pmpro_level-highlight, #pmpro_levels.pmpro_levels-compare_table tbody td.pmpro_level-highlight, #pmpro_levels.pmpro_levels-compare_table tfoot td.pmpro_level-highlight',
	'color_secondary_color_elements' => 'a:hover, blockquote.quote:before, q:before, .testimonials-widget-testimonial .open-quote::before, .testimonials-widget-testimonial .close-quote::after, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price, .secondary',
	'color_action_background_elements' => '.btn_action, .btn_action:link, .pmpro_content_message a, .pmpro_content_message a:link, .pmpro_btn, .pmpro_btn:link, .pmpro_btn:visited, input[type=button].pmpro_btn, input[type=submit].pmpro_btn, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .bg_action, .banner_action',
	'color_action_color_elements' => '.action',	
	'delimiter' => '&nbsp;&#47;&nbsp;'
);
class memberlite_Customize {
	public static function register ( $wp_customize ) {
		global $memberlite_defaults;
		$wp_customize->add_section(
			'memberlite_theme_options', 
			array(
				'title' => __( 'MemberLite Options', 'memberlite' ),
				'priority' => 35,
				'capability' => 'edit_theme_options',
				'description' => __('Allows you to customize settings for MemberLite.', 'memberlite'),
			) 
		);
		$wp_customize->add_setting(
			'memberlite_webfonts',
			array(
				'default' => $memberlite_defaults['memberlite_webfonts'],
			)
		);
		$wp_customize->add_control(
			'memberlite_webfonts',
			array(
				'label' => 'Google Webfonts',
				'section' => 'memberlite_theme_options',
				'type'       => 'select',
				'choices'    => array(
					'Lato_Lato'  => 'Lato',
					'PT-Sans_PT-Serif'  => 'PT Sans and PT Serif',
					'Fjalla-One_Noto-Sans'  => 'Fjalla One and Noto Sans',
					'Pathway-Gothic-One_Source-Sans-Pro' => 'Pathway Gothic One and Source Sans Pro',
					'Oswald_Lato' => 'Oswald and Lato',
					'Ubuntu_Open-Sans' => 'Ubuntu and Open Sans',
					'Lato_Source-Sans-Pro' => 'Lato and Source Sans Pro',
					'Roboto-Slab_Roboto'  => 'Roboto Slab and Roboto',
					'Lato_Merriweather'  => 'Lato and Merriweather',
					'Playfair-Display_Open-Sans'  => 'Playfair Display and Open Sans',
					'Oswald_Quattrocento'  => 'Oswald and Quattrocento',
					'Abril-Fatface_Open-Sans'  => 'Abril Fatface and Open Sans',
					'Open-Sans_Gentium-Book-Basic' => 'Open Sans and Gentium Book Basic',
					'Oswald_PT-Mono' => 'Oswald and PT Mono'
				),
				'priority' => 10
			)
		);
		$wp_customize->add_setting(
			'meta_login',
			array(
				'default' => false
			)
		);
		$wp_customize->add_control(
			'meta_login', 
			array(
				'type' => 'checkbox',
				'label' => 'Show Login/Member Info in Header', 
				'section' => 'memberlite_theme_options',
				'priority' => '15'
			)
		);
		$wp_customize->add_setting(
			'sidebar_location',
			array(
				'default' => $memberlite_defaults['sidebar_location'],
			)
		);
		$wp_customize->add_control(
			'sidebar_location',
			array(
				'label' => 'Default Layout',
				'section' => 'memberlite_theme_options',
				'type'       => 'radio',
					'choices'    => array(
						'sidebar-right'  => 'Right Sidebar',
						'sidebar-left'   => 'Left Sidebar',
					),
				'priority' => 20
			)
		);
		$wp_customize->add_setting(
			'sidebar_location_blog',
			array(
				'default' => $memberlite_defaults['sidebar_location_blog'],
			)
		);
		$wp_customize->add_control(
			'sidebar_location_blog',
			array(
				'label' => 'Layout for Blog, Archive, Posts',
				'section' => 'memberlite_theme_options',
				'type'       => 'radio',
					'choices'    => array(
						'sidebar-blog-right'  => 'Right Sidebar',
						'sidebar-blog-left'   => 'Left Sidebar',
					),
				'priority' => 30
			)
		);
		$wp_customize->add_setting(
			'content_archives',
			array(
				'default' => $memberlite_defaults['content_archives'],
			)
		);
		$wp_customize->add_control(
			'content_archives',
			array(
				'label' => 'Content Archives',
				'section' => 'memberlite_theme_options',
				'type'       => 'radio',
					'choices'    => array(
						'content'  => 'Show Post Content',
						'excerpt'   => 'Show Post Excerpts',
					),
				'priority' => 40
			)
		);
		
		$memberlite_breadcrumbs = array();
		
		$memberlite_breadcrumbs[] = array(
			'slug'=>'page_breadcrumbs', 
			'label' => __('Breadcrumbs on Pages', 'ssbootstrapt'),
			'priority' => 51
		);
		$memberlite_breadcrumbs[] = array(
			'slug'=>'post_breadcrumbs', 
			'label' => __('Breadcrumbs on Posts', 'memberlite'),
			'priority' => 52
		);
		$memberlite_breadcrumbs[] = array(
			'slug'=>'archive_breadcrumbs', 
			'label' => __('Breadcrumbs on Archives', 'memberlite'),
			'priority' => 53
		);
		$memberlite_breadcrumbs[] = array(
			'slug'=>'attachment_breadcrumbs', 
			'label' => __('Breadcrumbs on Attachments', 'memberlite'),
			'priority' => 54
		);
		$memberlite_breadcrumbs[] = array(
			'slug'=>'search_breadcrumbs', 
			'label' => __('Breadcrumbs on Search Results', 'memberlite'),
			'priority' => 55
		);
		$memberlite_breadcrumbs[] = array(
			'slug'=>'profile_breadcrumbs', 
			'label' => __('Breadcrumbs on Profiles', 'memberlite'),
			'priority' => 56
		);
		foreach( $memberlite_breadcrumbs as $memberlite_breadcrumb ) {
			// SETTINGS
			$wp_customize->add_setting(
				$memberlite_breadcrumb['slug'],
				array(
					'default' => false
				)
			);
			// CONTROLS
			$wp_customize->add_control(
				$memberlite_breadcrumb['slug'], 
				array(
					'type' => 'checkbox',
					'label' => $memberlite_breadcrumb['label'], 
					'section' => 'memberlite_theme_options',
					'priority' => $memberlite_breadcrumb['priority']
				)
			);
		};
		$wp_customize->add_setting(
			'memberlite_loop_images',
			array(
				'default' => $memberlite_defaults['memberlite_loop_images'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'refresh',
			)
		);
		$wp_customize->add_control(
			'memberlite_loop_images',
			array(
				'label' => 'Featured Images on Index/Archives',
				'section' => 'memberlite_theme_options',
				'type'       => 'select',
				'choices'    => array(
					'show_both' => 'Show Banner or Thumbnail',
					'show_banner' => 'Show Banner Only',
					'show_thumbnail' => 'Show Thumbnail Only',
					'show_none'  => 'Do Not Show Featured Images',
				),
				'priority' => 59
			)
		);
		$wp_customize->add_setting(
			'memberlite_footerwidgets',
			array(
				'default' => $memberlite_defaults['memberlite_footerwidgets'],
			)
		);
		$wp_customize->add_control(
			'memberlite_footerwidgets',
			array(
				'label' => 'Footer Widgets',
				'section' => 'memberlite_theme_options',
				'type'       => 'select',
				'choices'    => array(
					'2' => '2',
					'3' => '3',
					'4'  => '4',
					'6' => '6'
				),
				'priority' => 60
			)
		);
		$wp_customize->add_setting(
			'delimiter',
			array(
				'default' => $memberlite_defaults['delimiter'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'delimiter',
			array(
				'label' => 'Breadcrumb Delimiter',
				'section' => 'memberlite_theme_options',
				'type' => 'text',
				'priority' => 65
			)
		);
		$wp_customize->add_setting(
			'copyright_textbox',
			array(
				'default' => $memberlite_defaults['copyright_textbox'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'copyright_textbox',
			array(
				'label' => 'Copyright Text',
				'section' => 'memberlite_theme_options',
				'type' => 'text',
				'priority' => 70
			)
		);
		$wp_customize->add_setting(
			'memberlite_color_scheme',
			array(
				'default' => $memberlite_defaults['memberlite_color_scheme'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'memberlite_color_scheme',
			array(
				'label' => 'Color Scheme',
				'section' => 'colors',
				'type'       => 'select',
				'choices'    => array_merge(memberlite_Customize::get_color_scheme_choices(), array('custom'=>'Custom')),
				'priority' => 1
			)
		);
		$wp_customize->add_setting(
			'color_link',
			array(
				'default' => $memberlite_defaults['color_link'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'memberlite_color_link',
				array(
				'label' => __( 'Link Color', 'memberlite' ),
				'section' => 'colors',
				'settings' => 'color_link',
				'priority' => 10,
				) 
		));
		$wp_customize->add_setting(
			'color_meta_link',
			array(
				'default' => $memberlite_defaults['color_meta_link'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'memberlite_color_meta_link',
				array(
				'label' => __( 'Meta Link Color', 'memberlite' ),
				'section' => 'colors',
				'settings' => 'color_meta_link',
				'priority' => 15,
				) 
		));
		$wp_customize->add_setting(
			'color_primary',
			array(
				'default' => $memberlite_defaults['color_primary'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'memberlite_color_primary',
				array(
				'label' => __( 'Primary Color', 'memberlite' ),
				'section' => 'colors',
				'settings' => 'color_primary',
				'priority' => 20,
				) 
		));
		$wp_customize->add_setting(
			'color_secondary',
			array(
				'default' => $memberlite_defaults['color_secondary'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'memberlite_color_secondary',
				array(
				'label' => __( 'Secondary Color', 'memberlite' ),
				'section' => 'colors',
				'settings' => 'color_secondary',
				'priority' => 30,
				) 
		));
		$wp_customize->add_setting(
			'color_action',
			array(
				'default' => $memberlite_defaults['color_action'],
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
			) 
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'memberlite_color_action',
				array(
				'label' => __( 'Action Color', 'memberlite' ),
				'section' => 'colors',
				'settings' => 'color_action',
				'priority' => 40,
				) 
		));		
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';	
		$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
		$wp_customize->get_setting( 'delimiter' )->transport = 'postMessage';
	}

	public static function header_output() {
		global $memberlite_defaults;
		?>
		<!--Customizer CSS--> 
		<style type="text/css">
			<?php self::generate_css($memberlite_defaults['color_link_color_elements'], 'color', 'color_link'); ?>
			<?php self::generate_css($memberlite_defaults['color_meta_link_color_elements'], 'color', 'color_meta_link'); ?>
			<?php self::generate_css($memberlite_defaults['color_primary_background_elements'], 'background', 'color_primary'); ?> 
			<?php self::generate_css($memberlite_defaults['color_primary_color_elements'], 'color', 'color_primary'); ?>
			<?php self::generate_css($memberlite_defaults['color_secondary_background_elements'], 'background', 'color_secondary'); ?> 
			<?php self::generate_css($memberlite_defaults['color_secondary_border_elements'], 'border-top-color', 'color_secondary'); ?>
			<?php self::generate_css($memberlite_defaults['color_secondary_border_elements'], 'border-bottom-color', 'color_secondary'); ?>
			<?php self::generate_css($memberlite_defaults['color_secondary_border_left_elements'], 'border-right-color', 'color_secondary'); ?>
			<?php self::generate_css($memberlite_defaults['color_secondary_border_right_elements'], 'border-left-color', 'color_secondary'); ?>
			<?php self::generate_css($memberlite_defaults['color_secondary_color_elements'], 'color', 'color_secondary'); ?>
			<?php self::generate_css($memberlite_defaults['color_action_background_elements'], 'background', 'color_action'); ?>
			<?php self::generate_css($memberlite_defaults['color_action_color_elements'], 'color', 'color_action'); ?>
			<?php self::generate_css('.btn_secondary:hover', 'background', 'color_primary'); ?>
			<?php self::generate_css('.btn_action:hover', 'background', 'color_secondary'); ?>
			<?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?> 
			<?php self::generate_css('body', 'background-color', 'background_color', '#'); ?> 
			<?php 
				$fonts_string = get_theme_mod('memberlite_webfonts');
				if(empty($fonts_string))
				{
					global $memberlite_defaults;
					$fonts_string = $memberlite_defaults['memberlite_webfonts'];
				}
				$fonts = explode("_", $fonts_string);
				$header_font = str_replace("-", " ", $fonts[0]);
				$body_font = str_replace("-", " ", $fonts[1]);	
			?>
			<?php echo 'body, button, input[type="button"], input[type="reset"], input[type="submit"], .btn, a.comment-reply-link, a.pmpro_btn, input[type="submit"].pmpro_btn, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, form.pmpro_form thead th span.pmpro_thead-msg {font-family: "' . $body_font . '", sans-serif; }'; ?>
			<?php echo 'h1, h2, h3, h4, h5, h6, label, .navigation, th, .pmpro_checkout thead th, #pmpro_account .pmpro_box h3, #meta-member .user, #bbpress-forums li.bbp-header, #bbpress-forums li.bbp-footer, #bbpress-forums fieldset.bbp-form legend {font-family: "' . $header_font . '", sans-serif; }'; ?>
		</style> 
		<!--/Customizer CSS-->
		<?php
	}
	
	public static function live_preview() {
		global $memberlite_defaults;
		wp_register_script(
			'memberlite_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array(  'jquery', 'customize-preview' ),
			'20140902',
			true
		);
		// Localize the script with new data
		$memberlite_defaults = array(			
			'color_link_color_elements' => $memberlite_defaults['color_link_color_elements'],
			'color_meta_link_color_elements' => $memberlite_defaults['color_meta_link_color_elements'],
			'color_primary_background_elements' => $memberlite_defaults['color_primary_background_elements'],
			'color_primary_color_elements' => $memberlite_defaults['color_primary_color_elements'],
			'color_secondary_background_elements' => $memberlite_defaults['color_secondary_background_elements'],
			'color_secondary_border_elements' => $memberlite_defaults['color_secondary_border_elements'],
			'color_secondary_border_right_elements' => $memberlite_defaults['color_secondary_border_right_elements'],
			'color_secondary_border_left_elements' => $memberlite_defaults['color_secondary_border_left_elements'],
			'color_secondary_color_elements' => $memberlite_defaults['color_secondary_color_elements'],
			'color_action_background_elements' => $memberlite_defaults['color_action_background_elements'],
			'color_action_color_elements' => $memberlite_defaults['color_action_color_elements'],
			'delimiter' => $memberlite_defaults['delimiter'],
		);
		wp_localize_script( 'memberlite_customizer', 'memberlite_defaults', $memberlite_defaults );
		wp_enqueue_script('memberlite_customizer');
	}

	public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      	  
	  if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
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
	 * 3. Link Color
	 * 4. Meta Link Color
	 * 5. Primary Color
	 * 6. Secondary Color
	 * 7. Action Color
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @return array An associative array of color scheme options.
	 */
	public static function get_color_schemes() {
		return apply_filters( 'memberlite_color_schemes', array(
			'default' => array(
				'label'  => __( 'Default', 'memberlite' ),
				'colors' => array(
					'#2c3e50',
					'#ffffff',
					'#2C3E50',
					'#2C3E50',
					'#2C3E50',
					'#18BC9C',
					'#F39C12',
				),
			),
			'education'   => array(
				'label'  => __( 'Education', 'memberlite' ),
				'colors' => array(
					'#3a9ad9',
					'#f4efea',
					'#3a9ad9',
					'#3a9ad9',
					'#354458',
					'#eb7260',
					'#29aba4',
				),
			),
			'modern_teal'  => array(
				'label'  => __( 'Modern Teal', 'memberlite' ),
				'colors' => array(
					'#424242',
					'#efefef',
					'#00ccd6',
					'#00ccd6',
					'#00ccd6',
					'#424242',
					'#ffd900',
				),
			),
			'mono_blue'  => array(
				'label'  => __( 'Mono Blue', 'memberlite' ),
				'colors' => array(
					'#00aeef',
					'#ffffff',
					'#00aeef',
					'#00aeef',
					'#333333',
					'#555555',
					'#00aeef',
				),
			),
			'mono_green'  => array(
				'label'  => __( 'Mono Green', 'memberlite' ),
				'colors' => array(
					'#00a651',
					'#ffffff',
					'#00a651',
					'#00a651',
					'#333333',
					'#555555',
					'#00a651',
				),
			),
			'mono_orange'  => array(
				'label'  => __( 'Mono Orange', 'memberlite' ),
				'colors' => array(
					'#f39c12',
					'#ffffff',
					'#f39c12',
					'#f39c12',
					'#333333',
					'#555555',
					'#f39c12',
				),
			),
			'mono_pink'  => array(
				'label'  => __( 'Mono Pink', 'memberlite' ),
				'colors' => array(
					'#ed0977',
					'#ffffff',
					'#ed0977',
					'#ed0977',
					'#333333',
					'#555555',
					'#ed0977',
				),
			),
			'pop'   => array(
				'label'  => __( 'Pop!', 'memberlite' ),
				'colors' => array(
					'#53bbf4',
					'#FFFFFF',
					'#b1eb00',
					'#b1eb00',
					'#53bbf4',
					'#ffac00',
					'#ff85cb',
				),
			),
			'primary'   => array(
				'label'  => __( 'Not So Primary', 'memberlite' ),
				'colors' => array(
					'#1352a2',
					'#f0f1ee',
					'#fb6964',
					'#fb6964',
					'#1352a2',
					'#fb6964',
					'#ffd464',
				),
			),
			'raspberry_lime'    => array(
				'label'  => __( 'Raspberry Lime', 'memberlite' ),
				'colors' => array(
					'#aa2159',
					'#ffffff',
					'#009d97',
					'#aa2159',
					'#aa2159',
					'#009d97',
					'#bcc747',
				),
			),
			'slate_blue'  => array(
				'label'  => __( 'Slate Blue', 'memberlite' ),
				'colors' => array(
					'#6991ac',
					'#f5f5f5',
					'#6991ac',
					'#6991ac',
					'#67727a',
					'#6991ac',
					'#d75c37',
				),
			),
			'watermelon'   => array(
				'label'  => __( 'Watermelon Seed', 'memberlite' ),
				'colors' => array(
					'#363635',
					'#f3f3ee',
					'#83bf17',
					'#83bf17',
					'#83bf17',
					'#363635',
					'#f15d58',
				),
			),
		) );
	}
			
	/**
	 * Returns an array of color scheme choices registered for Memberlite.
	 *
	 * @since Memberlite 2.0
	 *
	 * @return array Array of color schemes.
	 */
	public static function get_color_scheme_choices() {
		$color_schemes                = memberlite_Customize::get_color_schemes();
		$color_scheme_control_options = array();
		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}
		return $color_scheme_control_options;
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
		$color_schemes = memberlite_Customize::get_color_scheme_choices();
		if ( ! array_key_exists( $value, $color_schemes ) ) {
			$value = 'default';
		}
		return $value;
	}	
	
	/**
	 * Binds JS listener to make Customizer color_scheme control.
	 *
	 * Passes color scheme data as colorScheme global.
	 *
	 * @since Twenty Fifteen 1.0
	 */
	public static function customizer_controls_js() {
		wp_enqueue_script( 'memberlite_customizer-controls', get_template_directory_uri() . '/js/customizer-controls.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), MEMBERLITE_VERSION, true );
		wp_localize_script( 'memberlite_customizer-controls', 'colorSchemes', memberlite_Customize::get_color_schemes() );
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'memberlite_Customize' , 'register' ) );
add_action( 'customize_controls_enqueue_scripts', array('memberlite_Customize', 'customizer_controls_js' ));

// Output custom CSS to live site
add_action( 'wp_head' , array( 'memberlite_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'memberlite_Customize' , 'live_preview' ) );

