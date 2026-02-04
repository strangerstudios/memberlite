(function ($) {
	'use strict';

	// Get scheme data from localized script (passed from customizer.php)
	// colorSchemes: { scheme_key: { label: '...', colors: { key: value, ... } }, ... }
	// colorSettingKeys: [ 'header_textcolor', 'background_color', ... ]

	// Flag to prevent infinite loop when programmatically updating colors
	let isUpdatingFromScheme = false;

	// Mapping from theme_mod keys to Customizer control IDs
	// Most controls use memberlite_ prefix, some are WordPress core
	const colorControlMapping = {
		'header_textcolor': 'header_textcolor',
		'background_color': 'background_color',
		'bgcolor_header': 'memberlite_bgcolor_header',
		'bgcolor_site_navigation': 'memberlite_bgcolor_site_navigation',
		'color_site_navigation': 'memberlite_color_site_navigation',
		'color_text': 'memberlite_color_text',
		'color_link': 'memberlite_color_link',
		'color_meta_link': 'memberlite_color_meta_link',
		'color_primary': 'memberlite_color_primary',
		'color_secondary': 'memberlite_color_secondary',
		'color_action': 'memberlite_color_action',
		'color_button': 'memberlite_color_button',
		'bgcolor_page_masthead': 'memberlite_bgcolor_page_masthead',
		'color_page_masthead': 'memberlite_color_page_masthead',
		'bgcolor_footer_widgets': 'memberlite_bgcolor_footer_widgets',
		'color_footer_widgets': 'memberlite_color_footer_widgets',
		'color_borders': 'memberlite_color_borders',
	};

	/**
	 * Update all color picker controls from a scheme's colors
	 *
	 * @param {Object} colors - The 17-color associative array
	 */
	function updateColorPickersFromScheme(colors) {
		isUpdatingFromScheme = true;

		$.each(colorControlMapping, function (colorKey, controlId) {
			if (colors[colorKey]) {
				let colorValue = colors[colorKey];

				// Handle header_textcolor and background_color differently (WordPress core)
				if (colorKey === 'header_textcolor' || colorKey === 'background_color') {
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
				if (colorKey === 'header_textcolor' || colorKey === 'background_color') {
					currentValue = wp.customize(colorKey)();
					// Add # if missing for comparison
					if (currentValue && currentValue.charAt(0) !== '#') {
						currentValue = '#' + currentValue;
					}
				} else {
					currentValue = wp.customize(colorKey) ? wp.customize(colorKey)() : '';
				}

				const schemeValue = schemeColors[colorKey].toUpperCase();
				const compareValue = (currentValue || '').toUpperCase();

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

			// Get the scheme colors
			if (typeof colorSchemes !== 'undefined' && colorSchemes[to]) {
				updateColorPickersFromScheme(colorSchemes[to].colors);
			}
		});
	});

	// When any color is manually changed, check if it matches a scheme or set to custom
	const allColorSettings = typeof colorSettingKeys !== 'undefined' ? colorSettingKeys : [
		'header_textcolor',
		'background_color',
		'bgcolor_header',
		'bgcolor_site_navigation',
		'color_site_navigation',
		'color_text',
		'color_link',
		'color_meta_link',
		'color_primary',
		'color_secondary',
		'color_action',
		'color_button',
		'bgcolor_page_masthead',
		'color_page_masthead',
		'bgcolor_footer_widgets',
		'color_footer_widgets',
		'color_borders',
	];

	allColorSettings.forEach(function (settingId) {
		wp.customize(settingId, function (value) {
			value.bind(function () {
				// Don't trigger if we're updating from a scheme selection
				if (isUpdatingFromScheme) {
					return;
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

})(jQuery);
