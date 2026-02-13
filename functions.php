<?php
/**
 * Memberlite functions and definitions
 *
 * @package Memberlite
 */
define( 'MEMBERLITE_VERSION', '6.1.1.0.21' );
define( 'MEMBERLITE_URL', get_template_directory_uri() );

// enqueue additional stylesheets and javascript
function memberlite_init_styles() {
	global $memberlite_defaults;

	// framework stuff
	wp_enqueue_style( 'memberlite_grid', MEMBERLITE_URL . '/css/grid.css', array(), MEMBERLITE_VERSION );
	wp_enqueue_style( 'memberlite_style', get_stylesheet_uri(), array(), MEMBERLITE_VERSION );
	if ( is_rtl() ) {
		wp_enqueue_style( 'memberlite_rtl', MEMBERLITE_URL . '/css/rtl.css', array( 'memberlite_style' ), MEMBERLITE_VERSION );
	}
	wp_enqueue_style( 'memberlite_print_style', MEMBERLITE_URL . '/css/print.css', array(), MEMBERLITE_VERSION, 'print' );
	wp_enqueue_script( 'memberlite-script', MEMBERLITE_URL . '/js/memberlite.js', array( 'jquery' ), MEMBERLITE_VERSION, true );
	wp_enqueue_style( 'font-awesome', MEMBERLITE_URL . '/font-awesome/css/all.min.css', array(), '6.6.0' );

	// comments JS on single pages only
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Conditionally load styles for shortcodes.
	global $post, $page;
	$shortcodes = array(
		'memberlite_accordion',
		'memberlite_banner',
		'memberlite_btn',
		'row',
		'row_row',
		'row_row_row',
		'row_row_row_your_boat',
		'fa',
		'memberlite_msg',
		'memberlite_recent_posts',
		'memberlite_subpagelist',
		'memberlite_tab',
	);

	$should_exit = true;

	foreach ( $shortcodes as $sc ) {
		if ( ( isset( $post->post_content ) && has_shortcode( $post->post_content, $sc ) ) || ( isset( $page->post_content ) && has_shortcode( $page->post_content, $sc ) ) ) {
			$should_exit = false;
		}
	}

	// Only load / enqueue resources if a shortcode is present on the post/page.
	if ( false === $should_exit ) {
		wp_enqueue_script( 'memberlite-js-cookie', MEMBERLITE_URL . '/js/js.cookie.min.js', array(), MEMBERLITE_VERSION, true );
		wp_enqueue_script( 'memberlite_js', MEMBERLITE_URL . '/js/memberlite-shortcodes.js', array( 'jquery' ), MEMBERLITE_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'memberlite_init_styles' );

/**
 * Enqueue admin JavaScript and CSS
 *
 * @since 6.1
 */
function memberlite_admin_enqueue_scripts() {
	if ( ! empty( $_GET['page'] ) && strpos( $_GET['page'], 'memberlite-' ) === 0 ) {
		wp_register_style( 'memberlite_admin', MEMBERLITE_URL . '/css/admin.css', [], MEMBERLITE_VERSION, 'screen' );
		wp_enqueue_style( 'memberlite_admin' );

		wp_register_script( 'memberlite_admin_js', MEMBERLITE_URL . '/js/admin.js', [ 'jquery' ], MEMBERLITE_VERSION, true );
		wp_enqueue_script( 'memberlite_admin_js' );
	}
}
add_action( 'admin_enqueue_scripts', 'memberlite_admin_enqueue_scripts' );

function memberlite_get_font( $font_type, $nicename = NULL ) {
	global $memberlite_defaults;

	// Get the selected fonts from theme options.
	$r = get_theme_mod( 'memberlite_' . $font_type, $memberlite_defaults[ 'memberlite_' . $font_type ] );

	// If we're returning the font name, convert the slug to a human-readable name.
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
	$header_font = strtolower( memberlite_get_font( 'header_font' ) );
	$body_font = strtolower( memberlite_get_font( 'body_font' ) );

	// If it's not a Google font, ignore.
	$fonts_string = $header_font . '_' . $body_font;
	if ( ! in_array( $fonts_string, array_keys( Memberlite_Customize::get_google_fonts() ) ) ) {
		return;
	}

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
src: url('<?php echo esc_url( MEMBERLITE_URL ) . '/assets/fonts/' . esc_html( $body_font ) . '/' . esc_html( $body_font ) . '.woff2'; ?>') format('woff2');
font-weight: normal;
font-display: fallback;
font-stretch: normal;
}<?php if ( ! in_array( $body_font, $no_bold_font ) ) { ?>@font-face {
font-family: <?php echo esc_html( memberlite_get_font( 'body_font', true ) ); ?>;
font-style:normal;
src: url('<?php echo esc_url( MEMBERLITE_URL ) . '/assets/fonts/' . esc_html( $body_font ) . '/' . esc_html( $body_font ) . '-bold.woff2'; ?>') format('woff2');
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
src: url('<?php echo esc_url( MEMBERLITE_URL ) . '/assets/fonts/' . esc_html( $header_font ) . '/' . esc_html( $header_font ) . '.woff2'; ?>') format('woff2');
font-weight: normal;
font-display: fallback;
font-stretch: normal;
}<?php if ( ! in_array( $header_font, $no_bold_font ) ) { ?>@font-face {
font-family: <?php echo esc_html( memberlite_get_font( 'header_font', true ) ); ?>;
font-style:normal;
src: url('<?php echo esc_url( MEMBERLITE_URL ) . '/assets/fonts/' . esc_html( $header_font ) . '/' . esc_html( $header_font ) . '-bold.woff2'; ?>') format('woff2');
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
	$GLOBALS['content_width'] = apply_filters( 'memberlite_content_width', 805 );
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
		require_once get_template_directory() . '/inc/colors.php';
		require_once get_template_directory() . '/inc/defaults.php';

		global $memberlite_defaults;

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
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		);
		add_theme_support( 'custom-background', $custom_background );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // memberlite_setup
add_action( 'after_setup_theme', 'memberlite_setup' );

/**
 * Load the Memberlite theme textdomain on init (WP 6.7+ requirement).
 *
 * If you're building a theme based on Memberlite, use a find and replace
 * to change 'memberlite' to the name of your theme in all the template files.
 */
function memberlite_load_textdomain() {
	load_theme_textdomain( 'memberlite', get_template_directory() . '/languages' );
}
add_action( 'init', 'memberlite_load_textdomain' );

/**
 * Load custom translations from our own server: translate.strangerstudios.com
 *
 * @since 6.1
 */
function memberlite_check_for_translations() {

	// if Update Manager is installed, we can bail.
	if ( function_exists( 'pmproum_check_for_translations' ) ) {
		return;
	}

	// If the library isn't loaded, bail.
	if ( ! function_exists( 'Memberlite\Required\Traduttore_Registry\add_project' ) ) {
		return;
	}

	// Only check for updates when on the update page, plugins, themes page, or the Memberlite support page
	$is_update_or_plugins_page = strpos( $_SERVER['REQUEST_URI'], 'update-core.php' ) !== false || strpos( $_SERVER['REQUEST_URI'], 'plugins.php' ) !== false || strpos( $_SERVER['REQUEST_URI'], 'themes.php' ) !== false;
	$is_memberlite_admin_page = isset( $_REQUEST['page'] ) && $_REQUEST['page'] === 'memberlite-support';

	if ( $is_memberlite_admin_page || $is_update_or_plugins_page ) {
		Memberlite\Required\Traduttore_Registry\add_project(
			'theme',
			'memberlite',
			'https://translate.strangerstudios.com/api/translations/memberlite'
		);
	}
}
add_action( 'admin_init', 'memberlite_check_for_translations' );


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
		$redirect_to = home_url( esc_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) );
	} else {
		$redirect_to = home_url();
	}
	return apply_filters( 'memberlite_login_redirect_to', esc_url( $redirect_to ) );
}

/* Get the redirect_to URL to use for "Log Out" links. */
function memberlite_logout_redirect_to() {
	if ( isset( $_SERVER['REQUEST_URI'] ) ) {
		$redirect_to = home_url( esc_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) );
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

/**
 * Create an accessible HTML list of nav menu items.
 */
class Memberlite_Aria_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filter the arguments for a single nav menu item.
		 *
		 * @param array  $args  An array of arguments.
		 * @param object $item  Menu item data object.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= sprintf( '%s<li%s%s%s>',
			$indent,
			$id,
			$class_names,
			in_array( 'menu-item-has-children', $item->classes ) ? ' aria-haspopup="true" aria-expanded="false" tabindex="0"' : ''
		);

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filter a menu item's title.
		 *
		 * @param string $title The menu item's title.
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output.
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}


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

/* Custom landing page element code. */
require_once get_template_directory() . '/inc/landing_page.php';

/* Custom translation server logic. */
require_once get_template_directory() . '/inc/localization.php';

/* Multiple post thumbanils support. */
require_once get_template_directory() . '/inc/multi-post-thumbnails.php';

/* Custom page banner element code. */
require_once get_template_directory() . '/inc/page_banners.php';

/* Custom template tags. */
require_once get_template_directory() . '/inc/template-tags.php';

/* Custom widgets that act independently of the theme templates. */
require_once get_template_directory() . '/inc/widgets.php';

/* Dashboard. */
require_once get_template_directory() . '/adminpages/dashboard.php';

/* Custom sidebars. */
require_once get_template_directory() . '/inc/sidebars.php';
require_once get_template_directory() . '/adminpages/sidebars.php';

/* Tools */
require_once get_template_directory() . '/adminpages/tools.php';

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

/* Integration for WooCommerce. */
if ( function_exists( 'is_woocommerce' ) ) {
	require_once get_template_directory() . '/inc/integrations/woocommerce.php';
}

/**
 * Load all the shortcodes.
 */
require_once get_template_directory() . '/shortcodes/accordion.php';
require_once get_template_directory() . '/shortcodes/banners.php';
require_once get_template_directory() . '/shortcodes/buttons.php';
require_once get_template_directory() . '/shortcodes/columns.php';
require_once get_template_directory() . '/shortcodes/font-awesome.php';
require_once get_template_directory() . '/shortcodes/messages.php';
require_once get_template_directory() . '/shortcodes/recent_posts.php';
require_once get_template_directory() . '/shortcodes/subpagelist.php';
require_once get_template_directory() . '/shortcodes/tabs.php';

/* Filter the template hierarchy for the front page. */
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
 * Enqueue block editor styles.
 *
 * @since 5.1.0
 *
 * @return void
 */
function memberlite_enqueue_block_assets() {
	wp_enqueue_style(
		'memberlite-block-editor-style',
		MEMBERLITE_URL . '/css/editor.css',
		[],
		MEMBERLITE_VERSION
	);
}
add_action( 'enqueue_block_assets', 'memberlite_enqueue_block_assets' );

/**
 * Filter the footer copyright text to allow dynamic variables.
 */
function memberlite_theme_mod_copyright_textbox( $copyright_text ) {
	// Don't filter the text in the admin.
	if ( is_admin() ) {
		return $copyright_text;
	}

	// Return if the text is not a string.
	if ( ! is_string( $copyright_text ) ) {
		return $copyright_text;
	}

	$data = array(
		'current_year' => date( 'Y' ),
		'site_title'   => (string) get_option( 'blogname' ),
		'site_url'     => (string) get_option( 'siteurl' ),
		'tagline'      => (string) get_option( 'blogdescription' ),
	);

	foreach ( $data as $key => $value ) {
		$copyright_text = str_replace( "!!" . $key . "!!", $value, $copyright_text );
	}

	return $copyright_text;
}
add_filter( 'theme_mod_copyright_textbox', 'memberlite_theme_mod_copyright_textbox' );

/**
 * Filter theme.json data to add theme settings
 *
 * @since TBD
 *
 * @param WP_Theme_JSON $theme_json Theme JSON object.
 * @return WP_Theme_JSON Theme JSON object.
 */
function memberlite_filter_theme_json( $theme_json ) {
	$active_colors = memberlite_get_active_colors();
	$preset_map = memberlite_get_color_preset_map();

	// Make sure every color is a color and prepend a # in front of it.
	foreach ( $active_colors as $key => $color ) {
		if ( sanitize_hex_color_no_hash( $color ) === NULL ) {
			unset( $active_colors[ $key ] );
			continue;
		}
		$active_colors[ $key ] = '#' . $color;
	}

	// Build the color palette from the canonical preset map.
	$color_scheme = array();
	foreach ( $preset_map as $setting_key => $preset ) {
		if ( ! isset( $active_colors[ $setting_key ] ) ) {
			continue;
		}

		$color_scheme[] = array(
			'slug'  => $preset['slug'],
			'color' => $active_colors[ $setting_key ],
			'name'  => $preset['label'],
		);
	}

	// Static palette entry.
	$color_scheme[] = array(
		'slug' => 'white',
		'color' => '#ffffff',
		'name' => __( 'White', 'memberlite' )
	);

	// Reindex the array to ensure sequential keys.
	$color_palette = array_values( $color_scheme );

	// Merge with existing theme.json data.
	$theme_json_data = $theme_json->get_data();

	// Update the color palette.
	if ( ! isset( $theme_json_data['settings'] ) ) {
		$theme_json_data['settings'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['color'] ) ) {
		$theme_json_data['settings']['color'] = array();
	}

	$theme_json_data['settings']['color']['palette'] = $color_palette;

	// Add font family custom properties.
	if ( ! isset( $theme_json_data['settings']['custom'] ) ) {
		$theme_json_data['settings']['custom'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['custom']['heading'] ) ) {
		$theme_json_data['settings']['custom']['heading'] = array();
	}
	if ( ! isset( $theme_json_data['settings']['custom']['body'] ) ) {
		$theme_json_data['settings']['custom']['body'] = array();
	}

	$theme_json_data['settings']['custom']['heading']['fontFamily'] = memberlite_get_font( 'header_font', true );
	$theme_json_data['settings']['custom']['body']['fontFamily'] = memberlite_get_font( 'body_font', true );

	// Update the theme.json object.
	return $theme_json->update_with( $theme_json_data );
}
add_filter( 'wp_theme_json_data_theme', 'memberlite_filter_theme_json' );

/**
 * Dedupe the full color palette for the editor color picker.
 *
 * @since TBD
 *
 * @param array $editor_settings Editor settings array.
 * @param WP_Block_Editor_Context $context Editor context.
 * @return array
 */
function memberlite_dedupe_editor_color_palette( $editor_settings, $context ) {
	// Helper: return a deduped palette (first occurrence wins) by color value.
	// but always keep 'body-text' and 'base' slugs.
	$dedupe = static function( $palette ) {
		if ( empty( $palette ) || ! is_array( $palette ) ) {
			return $palette;
		}

		$seen   = array();
		$result = array();

		foreach ( $palette as $entry ) {
			if ( ! is_array( $entry ) || empty( $entry['color'] ) ) {
				continue;
			}

			$color = sanitize_hex_color( $entry['color'] );
			if ( empty( $color ) ) {
				continue;
			}

			$key = strtolower( $color );
			$slug = isset( $entry['slug'] ) ? $entry['slug'] : '';

			// Always keep 'body-text' and 'base' slugs, even if duplicate color.
			if ( in_array( $slug, array( 'body-text', 'base' ), true ) ) {
				$entry['color'] = $color;
				$result[] = $entry;
				continue;
			}

			if ( isset( $seen[ $key ] ) ) {
				continue;
			}

			$seen[ $key ] = true;

			// Keep the original entry shape (slug/name), but normalize color.
			$entry['color'] = $color;
			$result[]       = $entry;
		}

		return array_values( $result );
	};

	/*
	 * WordPress stores palette data for the editor UI in slightly different
	 * places depending on WP/Gutenberg versions.
	 *
	 * We try the most common paths and replace only the "theme" palette list
	 * that powers the picker UI.
	 */
	$paths = array(
		array( '__experimentalFeatures', 'color', 'palette', 'theme' ),
		array( '__experimentalFeatures', 'settings', 'color', 'palette', 'theme' ),
		array( 'settings', 'color', 'palette', 'theme' ),
	);

	foreach ( $paths as $path ) {
		$ref = &$editor_settings;

		$found = true;
		foreach ( $path as $segment ) {
			if ( ! is_array( $ref ) || ! array_key_exists( $segment, $ref ) ) {
				$found = false;
				break;
			}
			$ref = &$ref[ $segment ];
		}

		if ( $found && is_array( $ref ) ) {
			$ref = $dedupe( $ref );
			// Don’t break; multiple paths can exist in some setups.
		}
	}

	return $editor_settings;
}
add_filter( 'block_editor_settings_all', 'memberlite_dedupe_editor_color_palette', 20, 2 );
