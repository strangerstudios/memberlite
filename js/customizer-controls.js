(function ($) {
	'use strict';

	// Localized data from customizer.php:
	// colorSchemes: { scheme_key: { label: '...', colors: { key: value, ... } }, ... }
	// colorSettingKeys: [ 'header_textcolor', 'background_color', ... ]
	// memberlite_preset_slugs: { setting_key: slug, ... }

	// Flag to prevent infinite loop when programmatically updating colors
	let isUpdatingFromScheme = false;

	// WordPress core color settings use the key directly as the control ID.
	// All Memberlite settings use 'memberlite_' + key.
	const wpCoreSettings = ['header_textcolor', 'background_color'];

	/**
	 * Get the Customizer control ID for a color setting key.
	 *
	 * @param {string} key - The color setting key (e.g. 'color_link')
	 * @returns {string} The control ID (e.g. 'memberlite_color_link')
	 */
	function getControlId(key) {
		return wpCoreSettings.indexOf(key) !== -1 ? key : 'memberlite_' + key;
	}

	/**
	 * Check if a color setting key is a WordPress core setting.
	 *
	 * @param {string} key - The color setting key
	 * @returns {boolean}
	 */
	function isWpCoreSetting(key) {
		return wpCoreSettings.indexOf(key) !== -1;
	}

	/**
	 * Update all color picker controls from a scheme's colors
	 *
	 * @param {Object} colors - The 17-color associative array
	 */
	function updateColorPickersFromScheme(colors) {
		isUpdatingFromScheme = true;

		colorSettingKeys.forEach(function (colorKey) {
			if (colors[colorKey]) {
				let colorValue = colors[colorKey];
				if (colorValue.charAt(0) !== '#') {
					colorValue = '#' + colorValue;
				}

				const controlId = getControlId(colorKey);

				// Handle WordPress core color settings differently
				if (isWpCoreSetting(colorKey)) {
					// Skip header_textcolor if currently set to 'blank' (user chose to hide site title/tagline)
					if (colorKey === 'header_textcolor' && wp.customize(controlId)() === 'blank') {
						return; // continue to next iteration
					}
					// WordPress stores these without the # prefix
					if (colorValue && colorValue.charAt(0) === '#') {
						colorValue = colorValue.substring(1);
					}
					wp.customize(controlId).set(colorValue);
				} else {
					// Standard Memberlite color controls
					const $control = $('#customize-control-' + controlId);
					if ($control.length) {
						const $picker = $control.find('.color-picker-hex');
						if ($picker.length && $picker.wpColorPicker) {
							$picker.wpColorPicker('color', colorValue);
						}
					}
					// Also set the customize value directly
					if (wp.customize(colorKey)) {
						wp.customize(colorKey).set(colorValue);
					}
				}
			}
		});

		// Use setTimeout to ensure flag is reset after all bindings fire
		setTimeout(function () {
			isUpdatingFromScheme = false;
		}, 100);
	}

	/**
	 * Check if current colors match any scheme
	 *
	 * @returns {string} Scheme key or 'custom'
	 */
	function detectCurrentScheme() {
		if (typeof colorSchemes === 'undefined') {
			return 'custom';
		}

		for (const schemeKey in colorSchemes) {
			if (!colorSchemes.hasOwnProperty(schemeKey)) continue;

			const schemeColors = colorSchemes[schemeKey].colors;
			let isMatch = true;

			for (const colorKey in schemeColors) {
				if (!schemeColors.hasOwnProperty(colorKey)) continue;

				let currentValue = '';
				if (isWpCoreSetting(colorKey)) {
					currentValue = wp.customize(colorKey)();
					// Skip header_textcolor comparison if set to 'blank' (hidden site title)
					if (colorKey === 'header_textcolor' && currentValue === 'blank') {
						continue;
					}
					// Add # if missing for comparison
					if (currentValue && currentValue.charAt(0) !== '#') {
						currentValue = '#' + currentValue;
					}
				} else {
					currentValue = wp.customize(colorKey) ? wp.customize(colorKey)() : '';
				}

				const schemeValue = schemeColors[colorKey];
				const compareValue = (currentValue || '').replace(/^#/, '');

				if (schemeValue !== compareValue) {
					isMatch = false;
					break;
				}
			}

			if (isMatch) {
				return schemeKey;
			}
		}

		return 'custom';
	}

	// Update colors when color scheme dropdown changes
	wp.customize('memberlite_color_scheme', function (value) {
		value.bind(function (to) {
			// Ignore custom - user is manually setting colors
			if (to === 'custom') {
				return;
			}

			if ( wp.customize('memberlite_pmpro_color_override') ) {
				// Uncheck PMPro overrides whenever the scheme changes
				wp.customize('memberlite_pmpro_color_override').set(false);
			}

			// Get the scheme colors
			if (typeof colorSchemes !== 'undefined' && colorSchemes[to]) {
				updateColorPickersFromScheme(colorSchemes[to].colors);
			}
		});
	});

	// When any color is manually changed, check if it matches a scheme or set to custom
	colorSettingKeys.forEach(function (settingId) {
		wp.customize(settingId, function (value) {
			value.bind(function (newVal, oldVal) {
				// Don't trigger if we're updating from a scheme selection
				if (isUpdatingFromScheme) {
					return;
				}

				// When header_textcolor transitions from 'blank' to a color
				// and a non-custom scheme is active, use that scheme's color
				// instead of the generic default.
				if (settingId === 'header_textcolor' && oldVal === 'blank' && newVal !== 'blank') {
					const currentScheme = wp.customize('memberlite_color_scheme')();
					if (currentScheme !== 'custom' && typeof colorSchemes !== 'undefined' && colorSchemes[currentScheme]) {
						let schemeColor = colorSchemes[currentScheme].colors.header_textcolor;
						if (schemeColor && schemeColor.charAt(0) === '#') {
							schemeColor = schemeColor.substring(1);
						}
						if (schemeColor && schemeColor.toLowerCase() !== newVal.toLowerCase()) {
							wp.customize(settingId).set(schemeColor);
							return;
						}
					}
				}

				// Check if the new color configuration matches any scheme
				const detectedScheme = detectCurrentScheme();
				const currentScheme = wp.customize('memberlite_color_scheme')();

				if (detectedScheme !== currentScheme) {
					wp.customize('memberlite_color_scheme').set(detectedScheme);
				}
			});
		});
	});

	// Dynamic show/hide for CPT archive controls, mirroring the blog controls logic.
	if ( typeof memberlite_cpt_archive_slugs !== 'undefined' ) {
		memberlite_cpt_archive_slugs.forEach( function( postType ) {
			var archiveKey = 'content_archives_' + postType;
			var sidebarKey = 'sidebar_location_' + postType;
			var ratioKey   = 'columns_ratio_' + postType;

			wp.customize( archiveKey, function( value ) {
				value.bind( function( newval ) {
					var isGrid = newval === 'grid';
					wp.customize.control( sidebarKey, function( control ) {
						control.active.set( ! isGrid );
					} );
					wp.customize.control( ratioKey, function( control ) {
						var noSidebar = wp.customize( sidebarKey )() === 'sidebar-blog-none';
						control.active.set( ! isGrid && ! noSidebar );
					} );
				} );
			} );

			wp.customize( sidebarKey, function( value ) {
				value.bind( function( newval ) {
					wp.customize.control( ratioKey, function( control ) {
						var isGrid = wp.customize( archiveKey )() === 'grid';
						control.active.set( ! isGrid && newval !== 'sidebar-blog-none' );
					} );
				} );
			} );
		} );
	}

	// Toggle sidebar_location_blog and columns_ratio_blog visibility based on content_archives and sidebar_location_blog values.
	wp.customize( 'content_archives', function( value ) {
		value.bind( function( newval ) {
			var isGrid = newval === 'grid';
			wp.customize.control( 'sidebar_location_blog', function( control ) {
				control.active.set( ! isGrid );
			} );
			wp.customize.control( 'columns_ratio_blog', function( control ) {
				var noSidebar = wp.customize( 'sidebar_location_blog' )() === 'sidebar-blog-none';
				control.active.set( ! isGrid && ! noSidebar );
			} );
		} );
	} );

	wp.customize( 'sidebar_location_blog', function( value ) {
		value.bind( function( newval ) {
			wp.customize.control( 'columns_ratio_blog', function( control ) {
				var isGrid = wp.customize( 'content_archives' )() === 'grid';
				control.active.set( ! isGrid && newval !== 'sidebar-blog-none' );
			} );
		} );
	} );

	// If a header/footer variation slug setting points to a post that no longer
	// appears in the dropdown (e.g. the post was trashed), the <select> has no
	// matching option and jQuery's .val() returns null. Visually fall back so
	// the field doesn't render blank.
	//
	// We intentionally do NOT call wp.customize(settingId).set() here:
	//   - Permanent deletion is handled server-side (theme_mod is cleared in
	//     before_delete_post), so by the time the user reopens the Customizer,
	//     the setting already matches a real option.
	//   - During the trash period, the post may be untrashed; preserving the
	//     stored slug means the original assignment is restored automatically.
	//   - Calling .set() here would also dirty the Customizer and prompt for a
	//     save the user didn't intend.
	wp.customize.bind('ready', function () {
		const orphanFallbacks = {
			'memberlite_default_header_slug': '0',
			'memberlite_global_footer_slug': '0',
			'memberlite_archives_footer_slug': 'memberlite-global-footer',
			'memberlite_post_footer_slug': 'memberlite-global-footer',
			'memberlite_page_footer_slug': 'memberlite-global-footer'
		};

		Object.keys(orphanFallbacks).forEach(function (settingId) {
			const $select = $('#customize-control-' + settingId + ' select');
			if (!$select.length) {
				return;
			}
			if (null === $select.val()) {
				$select.val(orphanFallbacks[settingId]);
			}
		});
	});

})(jQuery);
