<?php
/**
 * Memberlite functions and definitions
 *
 * @package Memberlite
 */
define( 'MEMBERLITE_VERSION', '5.2.1' );

// get default values for options/etc
require_once get_template_directory() . '/inc/defaults.php';

// enqueue additional stylesheets and javascript
function memberlite_init_styles() {
	global $memberlite_defaults;

	// framework stuff
	wp_enqueue_style( 'memberlite_grid', get_template_directory_uri() . '/css/grid.css', array(), MEMBERLITE_VERSION );
	wp_enqueue_style( 'memberlite_style', get_stylesheet_uri(), array(), MEMBERLITE_VERSION );
	if ( is_rtl() ) {
		wp_enqueue_style( 'memberlite_rtl', get_template_directory_uri() . '/css/rtl.css', array( 'memberlite_style' ), MEMBERLITE_VERSION );
	}
	wp_enqueue_style( 'memberlite_print_style', get_template_directory_uri() . '/css/print.css', array(), MEMBERLITE_VERSION, 'print' );
	wp_enqueue_script( 'memberlite-script', get_template_directory_uri() . '/js/memberlite.js', array( 'jquery' ), MEMBERLITE_VERSION, true );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/all.min.css', array(), '6.6.0' );

	// load dark.css for dark/inverted backgrounds
	$memberlite_darkcss = get_theme_mod( 'memberlite_darkcss', $memberlite_defaults['memberlite_darkcss'], false );
	if ( ! empty( $memberlite_darkcss ) ) {
		wp_enqueue_style( 'memberlite_darkcss', get_template_directory_uri() . '/css/dark.css', array(), MEMBERLITE_VERSION );
	}

	// comments JS on single pages only
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'memberlite_init_styles' );

function memberlite_get_font( $font_type, $nicename = NULL ) {
	global $memberlite_defaults;

	// Get the selected fonts from theme options.
	$fonts_string = get_theme_mod( 'memberlite_webfonts', $memberlite_defaults['memberlite_webfonts'] );

	// Break the theme mod for custom fonts into two parts.
	$fonts_string_parts = explode( '_', $fonts_string );

	if ( $font_type === 'header_font' ) {
		$r = $fonts_string_parts[0];
	} else {
		$r = $fonts_string_parts[1];
	}

	if ( ! empty( $nicename ) ) {
		$r = str_replace( '-', ' ', $r );
	}

	return $r;
}

/**
 * Load locally hosted Google fonts used in site.
 */
function memberlite_load_local_webfonts() {
	global $memberlite_defaults;

	// Get the selected fonts from theme options.
	$fonts_string = get_theme_mod( 'memberlite_webfonts', $memberlite_defaults['memberlite_webfonts'] );
	
	// If it's not a Google font, ignore.
	if ( ! in_array( $fonts_string, array_keys( Memberlite_Customize::get_google_fonts() ) ) ) {
		return;
	}
	
	// Get the selected fonts from theme options.
	$header_font = strtolower( memberlite_get_font( 'header_font' ) );
	$body_font = strtolower( memberlite_get_font( 'body_font' ) );

	// If the header and body fonts are the same, just load the body font.
	if ( $body_font === $header_font ) {
		$header_font = false;
	}

	// Fonts that do not have a bold (700 weight) font family.
	$no_bold_font = array( 'abril-fatface', 'fjalla-one', 'pathway-gothic-one', 'pt-mono' );

	// Wrapper style tag for CSS.
	echo '<style id="memberlite-webfonts-inline-css" type="text/css">';

	// Enqueue the body font.
	if ( ! empty( $body_font ) ) { ?>@font-face {
font-family: <?php echo esc_html( memberlite_get_font( 'body_font', true ) ); ?>;
font-style:normal;
src: url('<?php echo esc_url( get_template_directory_uri() ) . '/assets/fonts/' . esc_html( $body_font ) . '/' . esc_html( $body_font ) . '.woff2'; ?>') format('woff2');
font-weight: normal;
font-display: fallback;
font-stretch: normal;
}<?php if ( ! in_array( $body_font, $no_bold_font ) ) { ?>@font-face {
font-family: <?php echo esc_html( memberlite_get_font( 'body_font', true ) ); ?>;
font-style:normal;
src: url('<?php echo esc_url( get_template_directory_uri() ) . '/assets/fonts/' . esc_html( $body_font ) . '/' . esc_html( $body_font ) . '-bold.woff2'; ?>') format('woff2');
font-weight: bold;
font-display: fallback;
font-stretch: normal;
}<?php
		}
	}
	
	// Enqueue the header font.
	if ( ! empty( $header_font ) ) { ?>@font-face {
font-family: <?php echo esc_html( memberlite_get_font( 'header_font', true ) ); ?>;
font-style:normal;
src: url('<?php echo esc_url( get_template_directory_uri() ) . '/assets/fonts/' . esc_html( $header_font ) . '/' . esc_html( $header_font ) . '.woff2'; ?>') format('woff2');
font-weight: normal;
font-display: fallback;
font-stretch: normal;
}<?php if ( ! in_array( $header_font, $no_bold_font ) ) { ?>@font-face {
font-family: <?php echo esc_html( memberlite_get_font( 'header_font', true ) ); ?>;
font-style:normal;
src: url('<?php echo esc_url( get_template_directory_uri() ) . '/assets/fonts/' . esc_html( $header_font ) . '/' . esc_html( $header_font ) . '-bold.woff2'; ?>') format('woff2');
font-weight: bold;
font-display: fallback;
font-stretch: normal;
}<?php
		}
	}

	echo '</style>';
}
add_action( 'wp_head', 'memberlite_load_local_webfonts' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function memberlite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'memberlite_content_width', 744 );
}
add_action( 'after_setup_theme', 'memberlite_content_width', 0 );

/*
 * Adjust $content_width for full-width and fluid-width templates.
 * We run on the wp action so is_page_template will work.
 * We override the $content_width global.
 */
function memberlite_adjusted_content_width() {
	global $content_width;

	// Get the primary column width value on a 12 column scale.
	$memberlite_columns_ratio_primary = memberlite_getColumnsRatio();

	if ( is_page_template( 'templates/full-width.php' ) || is_page_template( 'templates/fluid-width.php' ) ) {
		$content_width = 1230; /* pixels */
	} else {
		switch ( $memberlite_columns_ratio_primary ) {
			case 1:
				$content_width = 106; /* pixels */
				break;
			case 2:
				$content_width = 213; /* pixels */
				break;
			case 3:
				$content_width = 319; /* pixels */
				break;
			case 4:
				$content_width = 425; /* pixels */
				break;
			case 5:
				$content_width = 532; /* pixels */
				break;
			case 6:
				$content_width = 639; /* pixels */
				break;
			case 7:
				$content_width = 754; /* pixels */
				break;
			case 8:
				$content_width = 852; /* pixels */
				break;
			case 9:
				$content_width = 958; /* pixels */
				break;
			case 10:
				$content_width = 1064; /* pixels */
				break;
			case 11:
				$content_width = 1171; /* pixels */
				break;
		}
	} // End if().
}
add_action( 'wp', 'memberlite_adjusted_content_width' );

if ( ! function_exists( 'memberlite_setup' ) ) :
	/* Sets up theme defaults and registers support for various WordPress features. */
	function memberlite_setup() {
		global $memberlite_defaults;
		/*
		 * Make theme available for translation.
		 * If you're building a theme based on Memberlite, use a find and replace
		 * to change 'memberlite' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'memberlite' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add document title tag to HTML
		add_theme_support( 'title-tag' );

		// Add logo upload support via Customizer
		$logo_defaults = array(
			'height'      => 200,
			'width'       => 720,
			'flex-height'  => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => false, 
		);

		add_theme_support( 'custom-logo', $logo_defaults );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true );
		add_image_size( 'memberlite-mini', 80, 80, true, array( 'center', 'center' ) );
		add_image_size( 'memberlite-banner', 793, 200, true, array( 'center', 'center' ) );
		add_image_size( 'memberlite-fullwidth', 1170, 1200, false, array( 'center', 'center' ) );
		add_image_size( 'memberlite-masthead', 1600, 300, true, array( 'center', 'center' ) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Enable support for "wide" or "full" alignment Gutenberg blocks.
		add_theme_support( 'align-wide' );

		// Enable support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// This theme uses wp_nav_menu() in five locations.
		register_nav_menus(
			array(
				'primary'           => __( 'Primary', 'memberlite' ),
				'member'            => __( 'Member', 'memberlite' ),
				'member-logged-out' => __( 'Member - Logged Out', 'memberlite' ),
				'meta'              => __( 'Meta', 'memberlite' ),
				'footer'            => __( 'Footer', 'memberlite' ),
			)
		);

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		$html5_support_types = array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		);
		add_theme_support( 'html5', $html5_support_types );

		// Enables support for Post Formats.
		add_theme_support(
			'post-formats', array(
				'audio',
				'image',
				'link',
				'quote',
				'status',
				'video',
			)
		);

		// Setup the WordPress core custom background feature.
		$custom_background = apply_filters(
			'memberlite_custom_background_args', array(
				'default-color' => 'FFFFFF',
				'default-image' => '',
			)
		);
		add_theme_support( 'custom-background', $custom_background );
		
		// Build unique array of Color Scheme values to include in Block Editor
		$color_scheme = array();

		// Primary Color
		$color_scheme[] = array(
			'name' => __( 'Primary', 'memberlite' ),
			'slug' => 'color-primary',
			'color' => get_theme_mod( 'color_primary', $memberlite_defaults['color_primary'] )
		);

		// Secondary Color
		$color_scheme[] = array(
			'name' => __( 'Secondary', 'memberlite' ),
			'slug' => 'color-secondary',
			'color' => get_theme_mod( 'color_secondary', $memberlite_defaults['color_secondary'] )
		);

		// Action Color
		$color_scheme[] = array(
			'name' => __( 'Action', 'memberlite' ),
			'slug' => 'color-action',
			'color' => get_theme_mod( 'color_action', $memberlite_defaults['color_action'] )
		);

		// Primary Navigation Background Color
		$color_scheme[] = array(
			'name' => __( 'Navigation Background', 'memberlite' ),
			'slug' => 'site-navigation-background',
			'color' => get_theme_mod( 'bgcolor_site_navigation', $memberlite_defaults['bgcolor_site_navigation'] )
		);

		// Link Color
		$color_scheme[] = array(
			'name' => __( 'Links', 'memberlite' ),
			'slug' => 'memberlite-links',
			'color' => get_theme_mod( 'color_link', $memberlite_defaults['color_link'] )
		);

		// Primary Navigation Color
		$color_scheme[] = array(
			'name' => __( 'Navigation Links', 'memberlite' ),
			'slug' => 'site-navigation-link',
			'color' => get_theme_mod( 'color_site_navigation', $memberlite_defaults['color_site_navigation'] )
		);

		// Meta Link Color
		$color_scheme[] = array(
			'name' => __( 'Meta Links ', 'memberlite' ),
			'slug' => 'meta-link',
			'color' => get_theme_mod( 'color_meta_link', $memberlite_defaults['color_meta_link'] )
		);

		// Button Color
		$color_scheme[] = array(
			'name' => __( 'Buttons', 'memberlite' ),
			'slug' => 'buttons',
			'color' => get_theme_mod( 'color_button', $memberlite_defaults['color_button'] )
		);

		// White Color
		$color_scheme[] = array(
			'name' => __( 'White', 'memberlite' ),
			'slug' => 'white',
			'color' => get_theme_mod( 'color_white', $memberlite_defaults['color_white'] )
		);

		// Borders Color
		$color_scheme[] = array(
			'name' => __( 'Borders', 'memberlite' ),
			'slug' => 'borders',
			'color' => get_theme_mod( 'color_borders', $memberlite_defaults['color_borders'] )
		);

		// v4.6 added four new colors. For this reason, we need to set the fallback colors if they are using a built in scheme.
		// Get the current color scheme
		$this_color_scheme = get_theme_mod( 'memberlite_color_scheme' );

		// Set the defaults to the primary color from the current scheme if it isn't the new default.
		if ( $this_color_scheme != 'default_v4.6' ) {
			$memberlite_defaults['bgcolor_page_masthead'] = $color_scheme[0]['color'];
			$memberlite_defaults['color_page_masthead'] = $memberlite_defaults['color_white'];
			$memberlite_defaults['bgcolor_footer_widgets'] = $color_scheme[0]['color'];
			$memberlite_defaults['color_footer_widgets'] = $memberlite_defaults['color_white'];
		}

		// Page Masthead Background Color
		$color_scheme[] = array(
			'name' => __( 'Page Masthead Background Color', 'memberlite' ),
			'slug' => 'page-masthead-background',
			'color' => get_theme_mod( 'bgcolor_page_masthead', $memberlite_defaults['bgcolor_page_masthead'] )
		);

		// Page Masthead Color
		$color_scheme[] = array(
			'name' => __( 'Page Masthead Color', 'memberlite' ),
			'slug' => 'page-masthead',
			'color' => get_theme_mod( 'color_page_masthead', $memberlite_defaults['color_page_masthead'] )
		);

		// Footer Widgets Background Color
		$color_scheme[] = array(
			'name' => __( 'Footer Widgets Background Color', 'memberlite' ),
			'slug' => 'footer-widgets-background',
			'color' => get_theme_mod( 'bgcolor_footer_widgets', $memberlite_defaults['bgcolor_footer_widgets'] )
		);

		// Footer Widgets Color
		$color_scheme[] = array(
			'name' => __( 'Footer Widgets Color', 'memberlite' ),
			'slug' => 'footer-widgets',
			'color' => get_theme_mod( 'color_footer_widgets', $memberlite_defaults['color_footer_widgets'] )
		);

		// Get all unique color values.
		$color_scheme_temp = array_unique( array_column( $color_scheme, 'color' ) );
		$color_scheme = array_intersect_key( $color_scheme, $color_scheme_temp );

		// Always ensure the body text color is set.
		$color_scheme[] = array(
			'name' => __( 'Text', 'memberlite' ),
			'slug' => 'body-text',
			'color' => get_theme_mod( 'color_text', $memberlite_defaults['color_text'] )
		);

		// Always ensure the base color is set.
		$base_color = get_theme_mod( 'background_color', $memberlite_defaults['background_color'] );
		// Add a # if it's missing.
		if ( strpos( $base_color, '#' ) === false ) {
			$base_color = '#' . $base_color;
		}
		$color_scheme[] = array(
			'name' => __( 'Base', 'memberlite' ),
			'slug' => 'base',
			'color' => esc_attr( $base_color )
		);

		// Build colors array for palette.
		$colors = array();
		foreach( $color_scheme as $color ) {
			$colors[] = array(
				'name' => $color['name'],
				'slug' => $color['slug'],
				'color' => $color['color'],
			);
		}

		// Add color values to Block Editor
		add_theme_support( 'editor-color-palette', apply_filters( 'memberlite_editor_color_palette', $colors ) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // memberlite_setup
add_action( 'after_setup_theme', 'memberlite_setup' );

function memberlite_wp_head() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'memberlite_wp_head' );

/* Register widget areas */
function memberlite_widgets_init() {
	global $memberlite_defaults;
	register_sidebar(
		array(
			'name'          => __( 'Posts and Archives', 'memberlite' ),
			'id'            => 'sidebar-2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Pages', 'memberlite' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Header Right', 'memberlite' ),
			'id'            => 'sidebar-3',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);

	$footer_widgets_count = get_theme_mod( 'memberlite_footerwidgets', $memberlite_defaults['memberlite_footerwidgets'] );
	if ( $footer_widgets_count == '2' ) {
		$footer_widgets_col_class = 'medium-6';
	} elseif ( $footer_widgets_count == '3' ) {
		$footer_widgets_col_class = 'medium-4';
	} elseif ( $footer_widgets_count == '6' ) {
		$footer_widgets_col_class = 'large-3';
	} else {
		$footer_widgets_col_class = 'medium-3';
	}
	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'memberlite' ),
			'id'            => 'sidebar-4',
			'description'   => 'You can set the number of widget columns in Appearance > Customize. Default: 4 columns.',
			'before_widget' => '<aside id="%1$s" class="widget ' . $footer_widgets_col_class . ' columns %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Mobile Menu Widgets', 'memberlite' ),
			'id'            => 'sidebar-5',
			'description'   => 'The slide-out mobile menu area.',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'memberlite_widgets_init' );

/* Get the redirect_to URL to use for "Log In" links. */
function memberlite_login_redirect_to() {
	if ( isset( $_SERVER['REQUEST_URI'] ) ) {
		$redirect_to = home_url( esc_url( $_SERVER['REQUEST_URI'] ) );
	} else {
		$redirect_to = home_url();
	}
	return apply_filters( 'memberlite_login_redirect_to', esc_url( $redirect_to ) );
}

/* Get the redirect_to URL to use for "Log Out" links. */
function memberlite_logout_redirect_to() {
	if ( isset( $_SERVER['REQUEST_URI'] ) ) {
		$redirect_to = home_url( esc_url( $_SERVER['REQUEST_URI'] ) );
	} else {
		$redirect_to = home_url();
	}
	return apply_filters(  'memberlite_logout_redirect_to', esc_url( $redirect_to ) );
}

/* Adds a Log Out link in member menu */
function memberlite_menus( $items, $args ) {
	// is this the member menu location or a replaced menu using pmpro-nav-menus plugin
	if ( $args->theme_location == 'member' || $args->theme_location == 'member-logged-out' || ( substr( $args->theme_location, -strlen( '-member' ) ) === '-member' ) ) {
		if ( is_user_logged_in() && defined( 'PMPRO_VERSION' ) && pmpro_hasMembershipLevel() ) {
			// user is logged in and has a membership level
			$items .= '<li><a href="' . esc_url( wp_logout_url( memberlite_logout_redirect_to() ) ) . '">' . esc_html__( 'Log Out', 'memberlite' ) . '</a></li>';
		} elseif ( is_user_logged_in() ) {
			// user is logged in and does not have a membership level
			$items = '<li><a href="' . esc_url( wp_logout_url( memberlite_logout_redirect_to() ) ) . '">' . esc_html__( 'Log Out', 'memberlite' ) . '</a></li>';
		} else {
			// not logged in
			$items .= '<li><a href="' . esc_url( wp_login_url( memberlite_login_redirect_to() ) ) . '">' . esc_html__( 'Log In', 'memberlite' ) . '</a></li>';

			$show_register_link = get_option( 'users_can_register' ) || defined( 'PMPRO_VERSION' );
			$show_register_link = apply_filters( 'memberlite_show_register_link', $show_register_link );
			if ( ! empty( $show_register_link ) ) {
				$items .= '<li><a href="' . esc_url( wp_registration_url() ) . '">' . esc_html__( 'Register', 'memberlite' ) . '</a></li>';
			}
		}
	}
	// is this the primary menu location or a replaced menu using pmpro-nav-menus plugin
	if ( $args->theme_location == 'primary' || ( substr( $args->theme_location, -strlen( '-primary' ) ) === '-primary' ) ) {
		$nav_menu_search = get_theme_mod( 'nav_menu_search', false );
		if ( ! empty( $nav_menu_search ) ) {
			$items .= '<li class="menu-item-search">' . get_search_form( false ) . '</li>';
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'memberlite_menus', 10, 2 );

function memberlite_member_menu_cb( $args ) {
	extract( $args );
	if ( empty( $link_before ) ) {
		$link_before = '<li class="menu_item">';
	}
	if ( empty( $link_after ) ) {
		$link_after = '</li>';
	}
	if ( is_user_logged_in() ) {
		$link = $link_before . '<a href="' . esc_url( wp_logout_url( memberlite_logout_redirect_to() ) ) . '">' . $before . esc_html__( 'Log Out', 'memberlite' ) . $after . '</a>';
	} else {
		// not logged in
		$link = $link_before . '<a href="' . esc_url( wp_login_url( memberlite_login_redirect_to() ) ) . '">' . $before . esc_html__( 'Log In', 'memberlite' ) . $after . '</a>';

		$show_register_link = get_option( 'users_can_register' ) || defined( 'PMPRO_VERSION' );
		$show_register_link = apply_filters( 'memberlite_show_register_link', $show_register_link );
		if ( ! empty( $show_register_link ) ) {
			$link .= $link_before . '<a href="' . esc_url( wp_registration_url() ) . '">' . $before . esc_html__( 'Register', 'memberlite' ) . $after . '</a>' . $link_after;
		}
	}
	$output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
	if ( ! empty( $container ) ) {
		$output = "<$container class='$container_class' id='$container_id'>$output</$container>";
	}
	if ( $echo ) {
		echo wp_kses( $output, 'post' );
	}
	return $output;
}

/* Allow the use of shortcodes in menus */
add_filter( 'wp_nav_menu', 'do_shortcode', 11 );

/* Exclude pings and trackbacks from the number of comments on a post. */
function memberlite_comment_count( $count ) {
	global $id;
	$comment_count = 0;
	$comments      = get_approved_comments( $id );
	foreach ( $comments as $comment ) {
		if ( $comment->comment_type === '' ) {
			$comment_count++;
		}
	}
	return $comment_count;
}
add_filter( 'get_comments_number', 'memberlite_comment_count', 0 );

/* Custom loader for get_sidebar to allow templates and child themes to modify */
function memberlite_get_sidebar( $name = null ) {
	$name = apply_filters( 'memberlite_get_sidebar', $name );
	if ( $name !== false ) {
		get_sidebar( $name );
	}
}

/* Check for updates */
if ( is_admin() ) {
	require_once get_template_directory() . '/inc/updates.php';
	memberlite_checkForUpdates();
}

/* Custom admin theme pages. */
if ( is_admin() ) {
	require_once get_template_directory() . '/inc/admin.php';
}

/* Implement the Custom Header feature. */
require_once get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require_once get_template_directory() . '/inc/customizer.php';

/* Deprecated hooks, filters and functions. */
require_once get_template_directory() . '/inc/deprecated.php';

/* Custom functions that act independently of the theme templates. */
require_once get_template_directory() . '/inc/extras.php';

/* Load Font Awesome custom functions file. */
require_once get_template_directory() . '/inc/font-awesome.php';

/* Load Jetpack compatibility file. */
require_once get_template_directory() . '/inc/jetpack.php';

/* Custom template tags. */
require_once get_template_directory() . '/inc/template-tags.php';

/* Custom widgets that act independently of the theme templates. */
require_once get_template_directory() . '/inc/widgets.php';

/* Integration for Paid Memberships Pro. */
if ( defined( 'PMPRO_VERSION' ) ) {
	require_once get_template_directory() . '/inc/integrations/paid-memberships-pro.php';
}

/* Integration for BuddyPress. */
if ( function_exists( 'is_buddypress' ) ) {
	require_once get_template_directory() . '/inc/integrations/buddypress.php';
}

/* Integration for LifterLMS. */
if ( class_exists( 'LifterLMS' ) ) {
	require_once get_template_directory() . '/inc/integrations/lifterlms.php';
}

/* Integration for Theme My Login. */
if ( function_exists( 'theme_my_login' ) ) {
	require_once get_template_directory() . '/inc/integrations/theme-my-login.php';
}

/* Integration for WooCommerce. */
if ( function_exists( 'is_woocommerce' ) ) {
	require_once get_template_directory() . '/inc/integrations/woocommerce.php';
}

function memberlite_frontpage_template_hierarchy( $templates ) {
	$templates = array();
	if ( ! is_home() ) {
		$custom = get_page_template_slug( get_queried_object_id() );
		if ( ! empty( $custom ) ) {
			$templates[] = $custom;
		}
		$templates[] = 'front-page.php';
	}
	// Return the template hierarchy.
	return $templates;
}
add_filter( 'frontpage_template_hierarchy', 'memberlite_frontpage_template_hierarchy', 5 );

/**
 * Formats custom property to be used in CSS.
 *
 * @param string $property The property name.
 * @return string
 */
function memberlite_format_custom_property( string $property ): string {
	if ( ! str_contains( $property, 'var:' ) ) {
		return $property;
	}

	return str_replace(
		[ 'var:', '|' ],
		[ 'var(--wp--', '--' ],
		$property
	) . ')';
}

/**
 * Generate custom properties from global styles.
 *
 * @return string
 */
function memberlite_get_custom_properties(): string {
	$custom_properties  = [];
	$custom_properties[ "--memberlite-header-font" ] = memberlite_get_font( 'header_font', true );
	$custom_properties[ "--memberlite-body-font" ] = memberlite_get_font( 'body_font', true );

	if ( is_array( $custom_properties ) ) {
		$css = [];

		foreach ( $custom_properties as $key => $value ) {
			$css[] = $key . ':' . memberlite_format_custom_property( $value ) . ';';
		}

		return 'body{' . implode( '', $css ) . '}';
	}

	return '';
}

/**
 * Enqueue block editor styles.
 *
 * @since 5.1.0
 *
 * @return void
 */
function memberlite_enqueue_block_assets() {
   // Enqueue the editor stylesheet to attach the inline styles to.
	wp_enqueue_style(
		'memberlite-block-editor-style',
		get_template_directory_uri() . '/css/editor.css',
		[],
		MEMBERLITE_VERSION
	);

	// Add custom inline styles to the block editor.
	wp_add_inline_style(
		'memberlite-block-editor-style',
		memberlite_get_custom_properties()
	);
}
add_action( 'enqueue_block_assets', 'memberlite_enqueue_block_assets' );
