/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
	// Site title and description.
	wp.customize(
		'blogname', function( setting ) {
			setting.bind(
				function( value ) {
					$( '.site-title a' ).text( value );
				}
			);
		}
	);
	wp.customize(
		'blogdescription', function( setting ) {
			setting.bind(
				function( value ) {
					$( '.site-description' ).text( value );
				}
			);
		}
	);
	// Header text color.
	wp.customize(
		'header_textcolor', function( setting ) {
			setting.bind(
				function( value ) {
					if ( 'blank' === value ) {
						$( '.site-title' ).css(
							{
								'text-indent': '-9999em',
							}
						);
						$( '.site-description' ).css(
							{
								'clip': 'rect(1px, 1px, 1px, 1px)',
								'position': 'absolute'
							}
						);
					} else {
						$( '.site-title' ).css(
							{
								'text-indent': '0',
							}
						);

						$( '.site-title, .site-description' ).css(
							{
								'clip': 'auto',
								'color': value,
								'position': 'static'
							}
						);

						$( '.site-title a' ).css(
							{
								'color': value
							}
						);

					}
				}
			);
		}
	);
	// Body Background Color.
	wp.customize(
		'background_color', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-site-background', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-site-background:' + value + '; }' );
				}
			);
		}
	);
	// Header Background Color.
	wp.customize(
		'bgcolor_header', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-header-background', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-header-background:' + value + '; }' );
				}
			);
		}
	);
	// Primary Navigation Background Color.
	wp.customize(
		'bgcolor_site_navigation', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-site-navigation-background', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--bgcolor-site-navigation:' + value + '; }' );
				}
			);
		}
	);
	// Primary Navigation Color.
	wp.customize(
		'color_site_navigation', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-site-navigation', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-site-navigation:' + value + '; }' );
				}
			);
		}
	);
	// Link Color.
	wp.customize(
		'color_link', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-link', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-link:' + value + '; }' );
				}
			);
		}
	);
	// Meta Link Color.
	wp.customize(
		'color_meta_link', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-meta-link', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-meta-link:' + value + '; }' );
				}
			);
		}
	);
	// Primary Color.
	wp.customize(
		'color_primary', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-primary', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-primary:' + value + '; }' );
				}
			);
		}
	);
	// Secondary Color.
	wp.customize(
		'color_secondary', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-secondary', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-secondary:' + value + '; }' );
				}
			);
		}
	);
	// Action Color.
	wp.customize(
		'color_action', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-action', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-action:' + value + '; }' );
				}
			);
		}
	);
	// Button Color.
		wp.customize(
		'color_button', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-button', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-button:' + value + '; }' );
				}
			);
		}
	);
	// Page Masthead Background Color.
	wp.customize(
		'bgcolor_page_masthead', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-page-masthead-background', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--bgcolor-page-masthead:' + value + '; }' );
				}
			);
		}
	);
	// Footer Widgets Color.
	wp.customize(
		'color_page_masthead', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-page-masthead', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-page-masthead:' + value + '; }' );
				}
			);
		}
	);
	// Footer Widgets Background Color.
	wp.customize(
		'bgcolor_footer_widgets', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-footer-widgets-background', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--bgcolor-footer-widgets:' + value + '; }' );
				}
			);
		}
	);
	// Footer Widgets Color.
	wp.customize(
		'color_footer_widgets', function( setting ) {
			setting.bind(
				function( value ) {
					document.documentElement.style.setProperty('--memberlite-color-footer-widgets', value );
					$( '#memberlite-customizer-css' ).append( 'body { --wp--preset--color--color-footer-widgets:' + value + '; }' );
				}
			);
		}
	);
	wp.customize(
		'delimiter', function( setting ) {
			setting.bind(
				function( value ) {
					$( '.memberlite-breadcrumb .sep, .bbp-breadcrumb-sep, .woocommerce-breadcrumb .sep' ).text( value );
				}
			);
		}
	);
	wp.customize(
		'posts_entry_meta_before', function( setting ) {
			setting.bind(
				function( value ) {
					$( 'header .entry-meta' ).text( value );
				}
			);
		}
	);
	wp.customize(
		'posts_entry_meta_after', function( setting ) {
			setting.bind(
				function( value ) {
					$( '.post .entry-footer' ).text( value );
				}
			);
		}
	);
	wp.customize(
		'copyright_textbox', function( setting ) {
			setting.bind(
				function( value ) {
					$( '.site-info p' ).text( value );
				}
			);
		}
	);
} )( jQuery );
