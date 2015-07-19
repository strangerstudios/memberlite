<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package Member Lite 2.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses memberlite_header_style()
 * @uses memberlite_admin_header_style()
 * @uses memberlite_admin_header_image()
 */
function memberlite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'memberlite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '2c3e50',
		'flex-height'            => true,
		'width'                  => 720,
		'flex-height'            => true,
		'height'                 => 200,
		'wp-head-callback'       => 'memberlite_header_style',
		'admin-head-callback'    => 'memberlite_admin_header_style',
		'admin-preview-callback' => 'memberlite_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'memberlite_custom_header_setup' );

if ( ! function_exists( 'memberlite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see memberlite_custom_header_setup().
 */
function memberlite_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

	// If no custom options for text are set, let's bail
	if ( empty( $header_image ) || HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-branding .site-title a {
			display: block;
			background: url(<?php header_image(); ?>) no-repeat left top;
			background-size: 360px 100px;
			width: 360px;
			height: 100px;
		}
		.site-header .site-title {
			margin: 0;
		}
		@media (max-width: 767px) {
			.site-branding {
				background-size: 768px auto;
			}
		}
		@media (max-width: 359px) {
			.site-branding {
				background-size: 360px auto;
			}
		}
	<?php
		endif;
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title {
			text-indent: -9999em;
		}
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}	
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // memberlite_header_style

if ( ! function_exists( 'memberlite_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see memberlite_custom_header_setup().
 */
function memberlite_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
			background: #<?php echo get_theme_mod( 'background_color' ); ?>;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
			font-style: italic; 
			color: #AAA;
		}
		#headimg img {
			width: 360px;
			height: 100px;
		}
	</style>
<?php
}
endif; // memberlite_admin_header_style

if ( ! function_exists( 'memberlite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see memberlite_custom_header_setup().
 */
function memberlite_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // memberlite_admin_header_image