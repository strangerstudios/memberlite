/**
 * Theme Customizer enhancements for a better user experience.
 *
 * This functionality runs in the site preview panel of Theme Customizer.
 */
( function( $ ) {
	// Mapping of customizer settings to CSS variable names
	var colorSettingsToCssVars = {
		'header_textcolor': '--memberlite-color-header-text',
		'background_color': '--memberlite-color-site-background',
		'bgcolor_header': '--memberlite-color-header-background',
		'bgcolor_site_navigation': '--memberlite-color-site-navigation-background',
		'color_site_navigation': '--memberlite-color-site-navigation',
		'color_text': '--memberlite-color-text',
		'color_link': '--memberlite-color-link',
		'color_meta_link': '--memberlite-color-meta-link',
		'color_primary': '--memberlite-color-primary',
		'color_secondary': '--memberlite-color-secondary',
		'color_action': '--memberlite-color-action',
		'color_button': '--memberlite-color-button',
		'color_borders': '--memberlite-color-borders',
		'bgcolor_page_masthead': '--memberlite-color-page-masthead-background',
		'color_page_masthead': '--memberlite-color-page-masthead',
		'bgcolor_footer_widgets': '--memberlite-color-footer-widgets-background',
		'color_footer_widgets': '--memberlite-color-footer-widgets'
	};

	/**
	 * Update a CSS variable in the #memberlite-customizer-css style tag
	 */
	function updateCssVariable( varName, value ) {
		var styleEl = document.getElementById( 'memberlite-customizer-css' );
		if ( ! styleEl ) {
			return;
		}

		var css = styleEl.textContent;
		// Build regex to find and replace the variable declaration
		var regex = new RegExp( varName.replace( /[-]/g, '\\-' ) + ':\\s*[^;]+;' );

		if ( regex.test( css ) ) {
			// Replace existing variable
			css = css.replace( regex, varName + ': ' + value + ';' );
		}

		styleEl.textContent = css;
	}

	wp.customize('memberlite_color_scheme', function(value) {
		value.bind(function(newval) {
			//refresh page
			wp.customize.previewer.refresh();
		});
	});

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

	// Header text color (special handling for 'blank' value).
	wp.customize(
		'header_textcolor', function( setting ) {
			setting.bind(
				function( value ) {
					if ( 'blank' === value ) {
						$( '.site-title' ).css( { 'text-indent': '-9999em' } );
						$( '.site-description' ).css( { 'clip': 'rect(1px, 1px, 1px, 1px)', 'position': 'absolute' } );
					} else {
						$( '.site-title' ).css( { 'text-indent': '0' } );
						$( '.site-description' ).css( { 'clip': 'auto', 'position': 'static' } );
						// WordPress stores header_textcolor without the # prefix
						var colorValue = value.charAt(0) === '#' ? value : '#' + value;
						updateCssVariable( '--memberlite-color-header-text', colorValue );
					}
				}
			);
		}
	);

	// Register all color settings to update their CSS variables
	$.each( colorSettingsToCssVars, function( settingKey, cssVar ) {
		// Skip header_textcolor as it has special handling above
		if ( settingKey === 'header_textcolor' ) {
			return;
		}

		wp.customize( settingKey, function( setting ) {
			setting.bind( function( value ) {
				updateCssVariable( cssVar, value );
			});
		});
	});
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
