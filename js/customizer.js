/**
 * Theme Customizer enhancements for a better user experience.
 *
 * This functionality runs in the site preview panel of Theme Customizer.
 *
 * Color variable mappings are localized from PHP so both
 * --memberlite-color-{css_var} and --wp--preset--color--{slug}
 * var names are always in sync with memberlite_get_color_preset_map().
 */
( function( $ ) {

	/**
	 * Build the color setting map from localized PHP data.
	 *
	 * memberlite_css_vars (localized from PHP) maps setting keys to their
	 * css_var suffix, e.g. { color_link: 'link', bgcolor_header: 'header-background' }.
	 * We use this to build the --memberlite-color-{css_var} var names dynamically.
	 */
	var colorSettingMap = {};

	if ( typeof memberlite_css_vars !== 'undefined' ) {
		Object.keys( memberlite_css_vars ).forEach( function( key ) {
			colorSettingMap[ key ] = {
				memberliteVar: '--memberlite-color-' + memberlite_css_vars[ key ]
			};
		} );
	}

	// header_textcolor can be 'blank' (WP stores it without #), so it needs a custom normalizer.
	if ( colorSettingMap.header_textcolor ) {
		colorSettingMap.header_textcolor.normalize = function( value ) {
			if ( 'blank' === value ) {
				return value;
			}
			return value.charAt( 0 ) === '#' ? value : '#' + value;
		};
	}

	/**
	 * Build the vars array for each setting from the static memberlite var
	 * plus the WP preset slugs localized from PHP.
	 */
	Object.keys( colorSettingMap ).forEach( function( key ) {
		var config = colorSettingMap[ key ];

		config.vars = [
			{ styleId: 'memberlite-customizer-css', varName: config.memberliteVar }
		];

		// Add WP preset var from the PHP-localized slug map.
		if ( typeof memberlite_preset_slugs !== 'undefined' && memberlite_preset_slugs[ key ] ) {
			config.vars.push( {
				styleId: 'global-styles-inline-css',
				varName: '--wp--preset--color--' + memberlite_preset_slugs[ key ]
			} );
		}
	} );

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
	 * If the variable doesn't exist yet, append a new :root block.
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
			css += '\n:root { ' + varName + ': ' + value + '; }';
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
	 * Check if a hex color is dark using WCAG relative luminance.
	 */
	function isDarkColor( hex ) {
		hex = hex.replace( /^#/, '' );
		if ( hex.length === 3 ) {
			hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
		}
		var r = parseInt( hex.substr( 0, 2 ), 16 ) / 255;
		var g = parseInt( hex.substr( 2, 2 ), 16 ) / 255;
		var b = parseInt( hex.substr( 4, 2 ), 16 ) / 255;

		r = ( r <= 0.03928 ) ? r / 12.92 : Math.pow( ( r + 0.055 ) / 1.055, 2.4 );
		g = ( g <= 0.03928 ) ? g / 12.92 : Math.pow( ( g + 0.055 ) / 1.055, 2.4 );
		b = ( b <= 0.03928 ) ? b / 12.92 : Math.pow( ( b + 0.055 ) / 1.055, 2.4 );

		return ( 0.2126 * r + 0.7152 * g + 0.0722 * b ) <= 0.179;
	}

	/**
	 * Register all color bindings
	 */
	Object.keys( colorSettingMap ).forEach( function( settingKey ) {
		bindColorSetting( settingKey, colorSettingMap[ settingKey ] );
	} );

	/**
	 * When background_color changes, toggle is-style-dark / is-style-light
	 * body class and update the color-scheme property on :root.
	 */
	wp.customize( 'background_color', function( setting ) {
		setting.bind( function( value ) {
			var dark = isDarkColor( value );

			$( 'body' ).toggleClass( 'is-style-dark', dark ).toggleClass( 'is-style-light', ! dark );

			// Update color-scheme in the customizer style tag.
			var styleEl = document.getElementById( 'memberlite-customizer-css' );
			if ( styleEl ) {
				var css = styleEl.textContent || '';
				var schemeRegex = /color-scheme:\s*[^;]+;/;
				var newScheme   = 'color-scheme: ' + ( dark ? 'dark' : 'light' ) + ';';
				if ( schemeRegex.test( css ) ) {
					css = css.replace( schemeRegex, newScheme );
				} else {
					css += '\n:root { ' + newScheme + ' }';
				}
				styleEl.textContent = css;
			}
		} );
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
