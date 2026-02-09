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
