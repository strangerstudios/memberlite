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

	// If a footer slug setting was saved but the post was later deleted, the select
	// will have no matching option and jQuery .val() returns null. Reset to '0' so
	// the "Use legacy footer" option is selected rather than the field appearing blank.
	wp.customize.bind( 'ready', function() {
		var footerSlugSettings = [
			'memberlite_default_footer_slug',
			'memberlite_archives_footer_slug',
			'memberlite_post_footer_slug',
			'memberlite_page_footer_slug',
		];

		footerSlugSettings.forEach( function( settingId ) {
			var $select = $( '#customize-control-' + settingId + ' select' );
			if ( ! $select.length ) {
				return;
			}
			if ( null === $select.val() ) {
				$select.val( '0' );
				wp.customize( settingId ).set( '0' ); //Will prompt the user to save, this is intentional if posts were deleted
			}
		} );
	} );

})(jQuery);
