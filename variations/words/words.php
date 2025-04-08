<?php
/**
 * Filters and actions for the Words variation
 */

/**
 * Enqueue the custom CSS for the Words theme variation.
 *
 * @since TBD
 *
 * @return void
 */
function memberlite_words_enqueue_styles() {
	wp_enqueue_style(
		'memberlite-words',
		get_template_directory_uri() . '/variations/words/words.css',
		array(),
		MEMBERLITE_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'memberlite_words_enqueue_styles', 20 );

/**
 * Remove unused parent theme items.
 *
 * @since TBD
 *
 * @return void
 */
function memberlite_words_setup() {

	// Add logo upload support via Customizer
	add_theme_support( 'custom-logo', array(
	   'height'      => 200,
	   'width'       => 200,
	   'flex-height' => true,
	   'flex-width'	 => true,
	   'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Remove unused image sizes.
	remove_image_size( 'memberlite-banner' );
	remove_image_size( 'memberlite-fullwidth' );
	remove_image_size( 'memberlite-masthead' );

	// Remove theme support for post formats.
	remove_theme_support( 'post-formats' );

	// Unregister unused theme menu locations.
	unregister_nav_menu( 'meta' );

}
add_action( 'after_setup_theme', 'memberlite_words_setup', 20 );

/**
 * Remove unused parent theme widget areas.
 *
 * @since TBD
 *
 * @return void
 */
function memberlite_words_widgets_init() {
	unregister_sidebar( 'sidebar-1' ); // Pages
	unregister_sidebar( 'sidebar-2' ); // Posts and Archives
	unregister_sidebar( 'sidebar-3' ); // Header Right
}
add_action( 'widgets_init', 'memberlite_words_widgets_init', 20 );

/**
 * Filter the theme page templates.
 *
 * @since TBD
 *
 * @param array $page_templates Array of page templates.
 * @param string $theme_instance The theme instance.
 * @param WP_Post $post The post object.
 *
 * @return array
 */
function memberlite_words_filter_theme_page_templates( $page_templates, $theme_instance, $post ) {
	unset( $page_templates['templates/blank.php'] );
	unset( $page_templates['templates/content-sidebar.php'] );
	unset( $page_templates['templates/fluid-width.php'] );
	unset( $page_templates['templates/full-width.php'] );
	unset( $page_templates['templates/interstitial.php'] );
	unset( $page_templates['templates/landing.php'] );
	unset( $page_templates['templates/narrow-width.php'] );
	unset( $page_templates['templates/sidebar-content.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'memberlite_words_filter_theme_page_templates', 20, 3 );

/**
 * Remove unused parent theme customizer options.
 *
 * @since TBD
 *
 * @return void
 */
function memberlite_words_customize_register() {  
	global $wp_customize;

	$customizer_settings = apply_filters( 'memberlite_words_remove_customizer_settings', array(
		'nav_menu_search',
		'sticky_nav',
		'columns_ratio_header',
		'columns_ratio',
		'sidebar_location',
		'sidebar_location_blog',
		'content_archives',
		'posts_entry_meta_after',
		'page_breadcrumbs',
		'post_breadcrumbs',
		'archive_breadcrumbs',
		'attachment_breadcrumbs',
		'search_breadcrumbs',
		'profile_breadcrumbs',
		'delimiter',
		'memberlite_loop_images',
	) );

	foreach ( $customizer_settings as $setting ) {
		$wp_customize->remove_control( $setting );
		$wp_customize->remove_setting( $setting );
	}
} 
add_action( 'customize_register', 'memberlite_words_customize_register', 99 );

/**
 * Filter the supported Elements in the Memberlite Elements plugin.
 *
 * @since TBD
 *
 * @param array $memberlite_supported_elements The supported elements.
 *
 * @return array
 */
function memberlite_words_supported_elements( $memberlite_supported_elements ) {
	$memberlite_supported_elements = array();
	return $memberlite_supported_elements;
}
add_filter( 'memberlite_supported_elements', 'memberlite_words_supported_elements' );

/**
 * Filter the color schemes for the Words theme.
 *
 * @since TBD
 *
 * @return array
 */
function memberlite_words_color_schemes( $memberlite_color_schemes ) {
	$words_default_scheme = array(
		'default_words' => array(
			'label'  => __( 'Words', 'memberlite' ),
			'colors' => array(
				'#011935', // 1. Header Text Color
				'#F5F8FA', // 2. Background Color
				'#F5F8FA', // 3. Header Background Color
				'#F5F8FA', // 4. Primary Navigation Background Color
				'#292929', // 5. Primary Navigation Link Color
				'#292929', // 6. Text Color
				'#011935', // 7. Link Color
				'#011935', // 8. Meta Link Color
				'#011935', // 9. Primary Color
				'#00A59D', // 10. Secondary Color
				'#E87102', // 11. Action Color
				'#3C4B5A', // 12. Default Button Color
				'#F5F8FA', // 14. Page Masthead Background Color
				'#292929', // 13. Page Masthead Text Color
				'#E7EDF2', // 16. Footer Widgets Background Color
				'#292929', // 15. Footer Widgets Text Color
			),
		),
	);

	$memberlite_color_schemes = array_merge( $words_default_scheme, $memberlite_color_schemes );
	return $memberlite_color_schemes;
}
add_filter( 'memberlite_color_schemes', 'memberlite_words_color_schemes' );

/**
 * Filter the Memberlite theme default values for this variation.
 *
 * @since TBD
 *
 * @param array $memberlite_defaults The existing array of Memberlite default values.
 */
function memberlite_words_defaults( $memberlite_defaults ) {
	$memberlite_defaults['background_color']         = '#F5F8FA';
	$memberlite_defaults['bgcolor_header']           = '#F5F8FA';
	$memberlite_defaults['bgcolor_site_navigation']  = '#F5F8FA';
	$memberlite_defaults['color_site_navigation']    = '#292929';
	$memberlite_defaults['color_text']               = '#292929';
	$memberlite_defaults['color_link']               = '#011935';
	$memberlite_defaults['color_meta_link']          = '#011935';
	$memberlite_defaults['color_primary']            = '#011935';
	$memberlite_defaults['color_secondary']          = '#00A59D';
	$memberlite_defaults['color_action']             = '#E87102';
	$memberlite_defaults['color_button']             = '#3C4B5A';
	$memberlite_defaults['color_page_masthead']      = '#292929';
	$memberlite_defaults['bgcolor_page_masthead']    = '#F5F8FA';
	$memberlite_defaults['color_footer_widgets']     = '#292929';
	$memberlite_defaults['bgcolor_footer_widgets']   = '#DBE6ED';

	return $memberlite_defaults;
}
add_filter( 'memberlite_defaults', 'memberlite_words_defaults' );

/**
 * Filter the columns ratio to always be narrow width.
 *
 * @since TBD
 *
 * @param string $r The columns ratio.
 * @param string $location The location.
 *
 * @return string
 */
function memberlite_words_columns_ratio( $r, $location ) {
	if ( empty( $location ) || $location === 'masthead' ) {
		$r = '10 medium-offset-1 large-8 large-offset-2 small-12';
	}

	return $r;
}
add_filter( 'memberlite_columns_ratio', 'memberlite_words_columns_ratio', 10, 2 );

/**
 * Display the site adminstration email Gravatar as logo if the custom_logo is not set.
 *
 * @since TBD
 *
 * @param string $html The custom logo HTML output.
 * @param int $blog_id The blog ID.
 *
 * @return string
 */
function memberlite_words_get_custom_logo( $html, $blog_id ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( ! empty( $custom_logo_id ) ) {
		return $html;
	} else {
		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			get_avatar( get_option( 'admin_email' ), 200, false, get_bloginfo( 'name' ) )
		);
	}
	return $html;
}
add_filter( 'get_custom_logo', 'memberlite_words_get_custom_logo', 10, 2 );

/**
 * Filter to hide the header right area throughout site.
 *
 * @since TBD
 *
 * @param bool $show_header_right Whether to show the header right area.
 */
function memberlite_words_memberlite_show_header_right( $show_header_right ) {
	return false;
}
add_filter( 'memberlite_show_header_right', 'memberlite_words_memberlite_show_header_right', 20 );

/**
 * Filter to hide the masthead banner throughout site.
 *
 * @since TBD
 *
 * @return bool
 */
function memberlite_words_memberlite_banner_show( $memberlite_banner_show ) {
	if ( is_home() ) {
		$memberlite_banner_show = false;
	}
	return $memberlite_banner_show;
}
add_filter( 'memberlite_banner_show', 'memberlite_words_memberlite_banner_show', 20 );

/**
 * Always hide breadcrumbs throughout site.
 *
 * @since TBD
 *
 * @return bool
 */
function memberlite_words_memberlite_show_breadcrumbs() {
	return false;
}
add_filter( 'memberlite_show_breadcrumbs', 'memberlite_words_memberlite_show_breadcrumbs', 20 );

/**
 * Filter to show the meta login area before the site header.
 *
 * @since TBD
 *
 * @return void
 */
function memberlite_words_memberlite_before_site_header() {
	$meta_login = get_theme_mod( 'meta_login', false );
	if ( ! empty( $meta_login ) ) {
		get_template_part( 'components/header/meta', 'member' );
	}
}
add_action( 'memberlite_before_site_header', 'memberlite_words_memberlite_before_site_header' );

/**
 * Hide the sidebars throughout site.
 *
 * @since TBD
 *
 * @return bool
 */
function memberlite_words_memberlite_get_sidebar() {
	return false;
}
add_filter( 'memberlite_get_sidebar', 'memberlite_words_memberlite_get_sidebar', 20 );

/**
 * Don't show the author thumbnail on grid or single post view.
 *
 * @since TBD
 *
 * @param bool $show_avatar Whether to show the author avatar.
 */
function memberlite_words_show_author_avatar( $show_avatar ) {
	$show_avatar = false;
	return $show_avatar;
}
add_filter( 'memberlite_show_author_avatar', 'memberlite_words_show_author_avatar' );

/**
 * Don't enlarge the "excerpt" content on single posts in Memberlite.
 *
 * @since TBD
 *
 * @param bool $memberlite_excerpt_larger Whether to show the excerpt larger.
 */
function memberlite_words_excerpt_larger( $memberlite_excerpt_larger ) {
	return false;
}
add_filter( 'memberlite_excerpt_larger', 'memberlite_words_excerpt_larger' );

/**
 * Remove the post meta shown after the post for the Words theme.
 *
 * @since TBD
 *
 * @param string $meta The post meta.
 * @param WP_Post $post The post object.
 * @param string $location The location.
 *
 * @return string
 */
function memberlite_words_entry_meta_remove_after( $meta, $post, $location ) {
	if ( $location === 'after' ) {
		$meta = '';
	}
	return $meta;
}
add_filter( 'memberlite_get_entry_meta' , 'memberlite_words_entry_meta_remove_after', 10, 3 );
