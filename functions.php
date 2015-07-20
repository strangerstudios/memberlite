<?php
/**
 * Member Lite 2.0 functions and definitions
 *
 * @package Member Lite 2.0
 */

//enqueue additional stylesheets and javascript
function memberlite_init_styles()
{	
	//need jquery
	wp_enqueue_script('jquery');
	
	//framework stuff
	wp_enqueue_style('memberlite_grid', get_template_directory_uri() . "/css/grid.css", NULL, NULL, "all");
	wp_enqueue_style('memberlite_style', get_stylesheet_uri(), NULL, "6.7");
	wp_enqueue_style('memberlite_fontawesome', get_template_directory_uri() . "/font-awesome/css/font-awesome.min.css", array(), "4.1.0", "all");
	
	wp_enqueue_script('memberlite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);
	
	//script
	wp_enqueue_script('memberlite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

	//comments JS on single pages only
	if ( is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action("wp_enqueue_scripts", "memberlite_init_styles");	

/* Load fonts via good API
 */
function memberlite_load_fonts()
{
	global $memberlite_defaults;
	wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=' . str_replace('_',':400,700|',str_replace('-','+',get_theme_mod('memberlite_webfonts',$memberlite_defaults['memberlite_webfonts']))) . ':400,700');
	wp_enqueue_style('googleFonts');
}
add_action('wp_print_styles', 'memberlite_load_fonts');

/* Set the content width based on the theme's design and stylesheet.
 */
if(!isset($content_width)) {
	$content_width = 748; /* pixels */
}

if(!function_exists('memberlite_setup')) :
/* Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function memberlite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Member Lite 2.0, use a find and replace
	 * to change 'memberlite' to the name of your theme in all the template files
	 */
	load_theme_textdomain('memberlite', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');
	add_image_size('mini', 80, 80, true, array('center','center'));
	add_image_size('banner', 740, 200, true, array('center','center'));
	add_image_size('large', 748, 9999, true, array('center','center'));
	add_image_size('masthead', 1600, 300, true, array('center','center'));
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __('Primary Menu', 'memberlite'),
		'member' => __('Member Menu', 'memberlite'),
		'meta' => __('Meta Menu', 'memberlite'),
		'footer' => __('Footer Menu', 'memberlite'),
	));
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support('post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	));

	// Setup the WordPress core custom background feature.
	add_theme_support('custom-background', apply_filters('memberlite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
	
	// Declare WooCommerce theme support
    add_theme_support('woocommerce');
}
endif; // memberlite_setup
add_action('after_setup_theme', 'memberlite_setup');

/* Register widget areas */
function memberlite_widgets_init() {
	global $memberlite_defaults;
	register_sidebar( array(
		'name'          => __('Pages', 'memberlite'),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __('Posts and Archives', 'memberlite'),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __('Header Right', 'memberlite'),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));

	$footer_widgets_count = get_theme_mod('memberlite_footerwidgets',$memberlite_defaults['memberlite_footerwidgets']);
	if($footer_widgets_count == '2')
		$footer_widgets_col_class = 'medium-6';
	elseif($footer_widgets_count == '3')
		$footer_widgets_col_class = 'medium-4';
	elseif($footer_widgets_count == '6')
		$footer_widgets_col_class = 'large-3';
	else
		$footer_widgets_col_class = 'medium-3';
	register_sidebar( array(
		'name'          => __('Footer Widgets', 'memberlite'),
		'id'            => 'sidebar-4',
		'description'   => 'You can set the number of widget columns in Appearance > Customize. Default: 4 columns.',
		'before_widget' => '<aside id="%1$s" class="widget ' . $footer_widgets_col_class . ' columns %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __('Mobile Menu Widgets', 'memberlite'),
		'id'            => 'sidebar-5',
		'description'   => 'The slide-out mobile menu area.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'memberlite_widgets_init');

/* Adds a Log Out link in member menu */
function memberlite_member_menu( $items, $args ) {
	if ($args->theme_location == 'member') {
		if (is_user_logged_in())
			$items .= '<li><a href="'. wp_logout_url() .'">' . __('Log Out','memberlite') . '</a></li>';
		else
		{
			$items = '<li><a href="'. wp_login_url() .'">' . __('Log In','memberlite') . '</a></li>';	  
			$items .= '<li><a href="'. wp_registration_url() .'">' . __('Register','memberlite') . '</a></li>';	  
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'memberlite_member_menu', 10, 2 );

/* Adds a Member Lite settings meta box to the side column on the Page edit screens. */
function memberlite_settings_add_meta_box() {
	$screens = array('page');
	foreach ($screens as $screen) {
		add_meta_box(
			'memberlite_settings_section',
			__('Member Lite Settings', 'memberlite'),
			'memberlite_settings_meta_box_callback',
			$screen,
			'normal',
			'high'
		);
	}
}
add_action('add_meta_boxes', 'memberlite_settings_add_meta_box');

/* Meta box for Member Lite settings */
function memberlite_settings_meta_box_callback($post) {
	wp_nonce_field('memberlite_settings_meta_box', 'memberlite_settings_meta_box_nonce');
	$memberlite_banner_desc = get_post_meta($post->ID, '_memberlite_banner_desc', true);
	$memberlite_banner_right = get_post_meta($post->ID, '_memberlite_banner_right', true);
	$memberlite_banner_bottom = get_post_meta($post->ID, '_memberlite_banner_bottom', true);
	echo '<p><strong>' . __('Banner Description', 'memberlite') . '</strong></p>';
	echo '<p>Shown in the masthead banner below the page title.</p>';	
	echo '<label class="screen-reader-text" for="memberlite_banner_desc">';
	_e('Banner Description', 'memberlite');
	echo '</label>';
	echo '<textarea class="large-text" rows="5" id="memberlite_banner_desc" name="memberlite_banner_desc">';
		echo $memberlite_banner_desc;
	echo '</textarea>';	
	echo '<hr />';
	echo '<p style="margin: 0;"><strong>' . __('Banner Right Column', 'memberlite') . '</strong></p>';
	echo '<p>Right side of the masthead banner. (i.e. Video Embed, Image or Action Button)</p>';	
	echo '<label class="screen-reader-text" for="memberlite_banner_right">';
	_e('Banner Right Column', 'memberlite');
	echo '</label> ';
	echo '<textarea class="large-text" rows="5" id="memberlite_banner_right" name="memberlite_banner_right">';
		echo $memberlite_banner_right;
	echo '</textarea>';
	echo '<hr />';
	echo '<p style="margin: 0;"><strong>' . __('Page Bottom Banner', 'memberlite') . '</strong></p>';
	echo '<p>Banner shown above footer on pages. (i.e. call to action)</p>';	
	echo '<label class="screen-reader-text" for="memberlite_banner_bottom">';
	_e('Page Bottom Banner', 'memberlite');
	echo '</label> ';
	echo '<textarea class="large-text" rows="5" id="memberlite_banner_bottom" name="memberlite_banner_bottom">';
		echo $memberlite_banner_bottom;
	echo '</textarea>';
}

/* Save custom sidebar selection */
function memberlite_settings_save_meta_box_data($post_id) {
	if(!isset($_POST['memberlite_settings_meta_box_nonce'])) {
		return;
	}
	if(!wp_verify_nonce($_POST['memberlite_settings_meta_box_nonce'], 'memberlite_settings_meta_box')) {
		return;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if(!current_user_can('edit_page', $post_id)) {
			return;
		}
	} 
	else
	{
		if(!current_user_can('edit_post', $post_id)) {
			return;
		}
	}
	
	if(!isset($_POST['memberlite_banner_desc'])) {
		return;
	}
	//$memberlite_banner_desc = sanitize_text_field($_POST['memberlite_banner_desc']);
	$memberlite_banner_desc = $_POST['memberlite_banner_desc'];
	
	if(!isset($_POST['memberlite_banner_right'])) {
		return;
	}
	//$memberlite_banner_right = sanitize_text_field($_POST['memberlite_banner_right']);
	$memberlite_banner_right = $_POST['memberlite_banner_right'];

	if(!isset($_POST['memberlite_banner_bottom'])) {
		return;
	}
	//$memberlite_banner_bottom = sanitize_text_field($_POST['memberlite_banner_bottom']);
	$memberlite_banner_bottom = $_POST['memberlite_banner_bottom'];

	// Update the meta field in the database.
	update_post_meta($post_id, '_memberlite_banner_desc', $memberlite_banner_desc);
	update_post_meta($post_id, '_memberlite_banner_right', $memberlite_banner_right);
	update_post_meta($post_id, '_memberlite_banner_bottom', $memberlite_banner_bottom);
}
add_action('save_post', 'memberlite_settings_save_meta_box_data');

/* Adds a Custom Sidebar meta box to the side column on the Post and Page edit screens. */
function memberlite_sidebar_add_meta_box() {
	$screens = array('post', 'page', 'forum', 'event', 'event-recurring');
	foreach ($screens as $screen) {
		add_meta_box(
			'memberlite_sidebar_section',
			__('Custom Sidebar', 'memberlite'),
			'memberlite_sidebar_meta_box_callback',
			$screen,
			'side',
			'core'
		);
	}
}
add_action('add_meta_boxes', 'memberlite_sidebar_add_meta_box');

/* Meta box for custom sidebar selection */
function memberlite_sidebar_meta_box_callback($post) {
	global $wp_registered_sidebars;
	wp_nonce_field('memberlite_sidebar_meta_box', 'memberlite_sidebar_meta_box_nonce');
	$memberlite_custom_sidebar = get_post_meta($post->ID, '_memberlite_custom_sidebar', true);
	$memberlite_default_sidebar = get_post_meta($post->ID, '_memberlite_default_sidebar', true);
	echo '<p>' . __('Swap the default sidebar.', 'memberlite');
	echo ' <a href="' . admin_url( 'custom-sidebars.php') . '">' . __('Manage Custom Sidebars','memberlite') . '</a></p>';
	echo '<p><strong>' . __('Select Sidebar', 'memberlite') . '</strong></p>';
	echo '<label class="screen-reader-text" for="memberlite_custom_sidebar">';
	_e('Select Sidebar', 'memberlite');
	echo '</label> ';
	echo '<select id="memberlite_custom_sidebar" name="memberlite_custom_sidebar">';
	foreach($wp_registered_sidebars as $wp_registered_sidebar)
	{
		echo '<option value="' . $wp_registered_sidebar['id'] . '"' . selected( $memberlite_custom_sidebar, $wp_registered_sidebar['id'] ) . '>' . $wp_registered_sidebar['name'] . '</option>';
	}
	echo '</select>';	
	echo '<hr />';
	echo '<p><strong>' . __('Default Sidebar Behavior', 'memberlite') . '</strong></p>';
	echo '<label class="screen-reader-text" for="memberlite_default_sidebar">';
	_e('Default Sidebar', 'memberlite');
	echo '</label> ';
	echo '<select id="memberlite_default_sidebar" name="memberlite_default_sidebar">';
	echo '<option value="default_sidebar_above"' . selected( $memberlite_default_sidebar, 'default_sidebar_above' ) . '>' . __('Show Default Sidebar Above', 'memberlite') . '</option>';
	echo '<option value="default_sidebar_below"' . selected( $memberlite_default_sidebar, 'default_sidebar_below' ) . '>' . __('Show Default Sidebar Below', 'memberlite') . '</option>';
	echo '<option value="default_sidebar_hide"' . selected( $memberlite_default_sidebar, 'default_sidebar_hide' ) . '>' . __('Hide Default Sidebar', 'memberlite') . '</option>';
	echo '</select>';
}

/* Save custom sidebar selection */
function memberlite_sidebar_save_meta_box_data($post_id) {
	if(!isset($_POST['memberlite_sidebar_meta_box_nonce'])) {
		return;
	}
	if(!wp_verify_nonce($_POST['memberlite_sidebar_meta_box_nonce'], 'memberlite_sidebar_meta_box')) {
		return;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if(!current_user_can('edit_page', $post_id)) {
			return;
		}
	} 
	else
	{
		if(!current_user_can('edit_post', $post_id)) {
			return;
		}
	}
	
	if(!isset($_POST['memberlite_custom_sidebar'])) {
		return;
	}
	$memberlite_custom_sidebar = sanitize_text_field($_POST['memberlite_custom_sidebar']);
	
	if(!isset($_POST['memberlite_default_sidebar'])) {
		return;
	}
	$memberlite_default_sidebar = sanitize_text_field($_POST['memberlite_default_sidebar']);

	// Update the meta field in the database.
	update_post_meta($post_id, '_memberlite_custom_sidebar', $memberlite_custom_sidebar);
	update_post_meta($post_id, '_memberlite_default_sidebar', $memberlite_default_sidebar);
}
add_action('save_post', 'memberlite_sidebar_save_meta_box_data');

/* Add Setting in Featured Images meta box */
function memberlite_featured_image_meta( $content ) {
    global $post;
	if(in_array( get_post_type($post->ID), array('post','page')))
	{
		$id = 'memberlite_hide_image_banner';
		$value = esc_attr( get_post_meta( $post->ID, $id, true ) );
		$label = '<label for="' . $id . '" class="selectit"><input name="' . $id . '" type="checkbox" id="' . $id . '" value="' . $value . ' "'. checked( $value, 1, false) .'>' . __('Hide Image Banner on Single View', 'memberlite') . '</label>';
		return $content .= $label;
	}
	else
		return $content;
}
add_filter( 'admin_post_thumbnail_html', 'memberlite_featured_image_meta' );

/* Save Setting in Featured Images meta box */
function memberlite_save_featured_image_meta( $post_id, $post, $update ) {  
	$value = 0;
	if ( isset( $_REQUEST['memberlite_hide_image_banner'] ) ) {
		$value = 1;
	}
	// Set meta value to either 1 or 0
	update_post_meta( $post_id, 'memberlite_hide_image_banner', $value );
}
add_action( 'save_post', 'memberlite_save_featured_image_meta', 10, 3 );

function memberlite_woocommerce_before_main_content() {
  echo '<div id="primary" class="large-12 columns content-area">';
  echo '<main id="main" class="site-main" role="main">';
}
function memberlite_woocommerce_after_main_content() {
  echo '</main></div>';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'memberlite_woocommerce_before_main_content', 10);
add_action('woocommerce_after_main_content', 'memberlite_woocommerce_after_main_content', 10);

/* Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/* Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/* Custom widgets that act independently of the theme templates.
 */
require get_template_directory() . '/inc/widgets.php';

/* Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/* Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* Custom shortcodes that act independently of the theme templates.
 */
require get_template_directory() . '/inc/shortcodes.php';

/* PMPro License code
 */
if(!defined('PMPRO_LICENSE_SERVER'))
	require get_template_directory() . '/inc/license.php';

/* Custom admin theme pages.
 */
require get_template_directory() . '/inc/admin.php';

/* Custom sidebars pages.
 */
require get_template_directory() . '/inc/custom-sidebars.php';