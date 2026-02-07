/**
 * Theme Customizer enhancements for a better user experience.
 *
 * This functionality runs in the site preview panel of Theme Customizer.
 */
( function( $ ) {

	/**
	 * Map Customizer setting > CSS variables to update.
	 * Each setting can update one or more CSS custom properties.
	 */
	var colorSettingMap = {
		'header_textcolor': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-header-text' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-header-text' }
			],
			// header_textcolor can be 'blank' and WP stores it without #.
			normalize: function( value ) {
				if ( 'blank' === value ) {
					return value;
				}
				return value.charAt( 0 ) === '#' ? value : '#' + value;
			}
		},

		'background_color': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-site-background' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-site-background' }
			]
		},
		'bgcolor_header': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-header-background' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-header-background' }
			]
		},
		'bgcolor_site_navigation': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-site-navigation-background' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-site-navigation-background' }
			]
		},
		'color_site_navigation': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-site-navigation' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-site-navigation' }
			]
		},
		'color_text': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-text' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-text' }
			]
		},
		'color_link': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-link' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-link' }
			]
		},
		'color_meta_link': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-meta-link' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-meta-link' }
			]
		},
		'color_primary': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-primary' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-primary' }
			]
		},
		'color_secondary': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-secondary' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-secondary' }
			]
		},
		'color_action': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-action' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-action' }
			]
		},
		'color_button': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-button' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-button' }
			]
		},
		'color_borders': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-borders' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-borders' }
			]
		},
		'bgcolor_page_masthead': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-page-masthead-background' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--page-masthead-background' }
			]
		},
		'color_page_masthead': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-page-masthead' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-page-masthead' }
			]
		},
		'bgcolor_footer_widgets': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-footer-widgets-background' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-footer-widgets-background' }
			]
		},
		'color_footer_widgets': {
			vars: [
				{ styleId: 'memberlite-customizer-css', varName: '--memberlite-color-footer-widgets' },
				{ styleId: 'global-styles-inline-css',  varName: '--wp--preset--color--color-footer-widgets' }
			]
		}
	};

	/**
	 * Default normalizer for colors (Customizer values are typically hex, sometimes without '#').
	 */
	function normalizeColorValue( value ) {
		if ( ! value ) {
			return value;
		}
		return value.charAt( 0 ) === '#' ? value : '#' + value;
	}

	/**
	 * Update a CSS variable inside a specific <style> tag by id.
	 * If the variable doesn't exist yet, insert it before the last '}'.
	 */
	function updateCssVarInStyleTag( styleId, varName, value ) {
		var styleEl = document.getElementById( styleId );
		if ( ! styleEl ) {
			return;
		}

		var css   = styleEl.textContent || '';
		var esc   = varName.replace( /[-]/g, '\\-' );
		var regex = new RegExp( esc + ':\\s*[^;]+;' );

		if ( regex.test( css ) ) {
			css = css.replace( regex, varName + ': ' + value + ';' );
		} else {
			var closeIndex = css.lastIndexOf( '}' );
			if ( closeIndex !== -1 ) {
				css = css.substring( 0, closeIndex ) + '\t\t' + varName + ': ' + value + ';\n\t' + css.substring( closeIndex );
			}
		}

		styleEl.textContent = css;
	}

	/**
	 * Bind one Customizer color setting to update all mapped CSS vars.
	 */
	function bindColorSetting( settingKey, config ) {
		wp.customize( settingKey, function( setting ) {
			setting.bind( function( value ) {
				var normalized = ( config.normalize ? config.normalize( value ) : normalizeColorValue( value ) );

				// Special case: header text can be hidden.
				if ( settingKey === 'header_textcolor' ) {
					if ( 'blank' === normalized ) {
						$( '.site-title' ).css( { clip: 'rect(1px, 1px, 1px, 1px)', position: 'absolute' } );
						$( '.site-description' ).css( { clip: 'rect(1px, 1px, 1px, 1px)', position: 'absolute' } );
						return;
					}

					$( '.site-title' ).css( { clip: 'auto', position: 'static' } );
					$( '.site-description' ).css( { clip: 'auto', position: 'static' } );
				}

				// Update each target var in its respective style tag.
				if ( Array.isArray( config.vars ) ) {
					config.vars.forEach( function( target ) {
						updateCssVarInStyleTag( target.styleId, target.varName, normalized );
					} );
				}
			} );
		} );
	}

	/**
	 * Register all color bindings
	 */
	Object.keys( colorSettingMap ).forEach( function( settingKey ) {
		bindColorSetting( settingKey, colorSettingMap[ settingKey ] );
	} );

	/**
	 * Bind non-color settings.
	 */
	wp.customize( 'blogname', function( setting ) {
		setting.bind( function( value ) {
			$( '.site-title a' ).text( value );
		} );
	} );

	wp.customize( 'blogdescription', function( setting ) {
		setting.bind( function( value ) {
			$( '.site-description' ).text( value );
		} );
	} );

	wp.customize( 'delimiter', function( setting ) {
		setting.bind( function( value ) {
			$( '.memberlite-breadcrumb .sep, .bbp-breadcrumb-sep, .woocommerce-breadcrumb .sep' ).text( value );
		} );
	} );

	wp.customize( 'posts_entry_meta_before', function( setting ) {
		setting.bind( function( value ) {
			$( 'header .entry-meta' ).text( value );
		} );
	} );

	wp.customize( 'posts_entry_meta_after', function( setting ) {
		setting.bind( function( value ) {
			$( '.post .entry-footer' ).text( value );
		} );
	} );

	wp.customize( 'copyright_textbox', function( setting ) {
		setting.bind( function( value ) {
			$( '.site-info p' ).text( value );
		} );
	} );

} )( jQuery );
