( function( $ ) {
    // 'use strict';

	let isLegacy = false;

	let legacy_colors_active = memberliteColorSchemes.get_legacy_theme_mod;

	if (legacy_colors_active) {
		$( '#customize-control-memberlite_variation_color_scheme' ).find( 'select' ).val( memberliteColorSchemes.get_legacy_theme_mod ).change();
		isLegacy = true;
	}

    //Memberlite 4.7+ (Variation) - 7 core colors
    let memberlite_variation_color_controls, memberlite_variation_color_controls_listener_flag;
    memberlite_variation_color_controls = [
        'memberlite_color_text',
        'background_color',
        'memberlite_bgcolor_header',
        'memberlite_color_page_masthead',
        'memberlite_color_primary',
        'memberlite_color_secondary',
        'memberlite_color_borders',
    ];
    memberlite_variation_color_controls_listener_flag = true;

    // Update colors when color scheme changes
    wp.customize('memberlite_variation_color_scheme', function(value) {
        value.bind(function(to) {
            // Ignore custom
            if (to === 'custom') {
                return;
            }

			console.log(memberliteColorSchemes.new);
			console.log(memberliteColorSchemes.legacy);

			return;

            // Check if it's a new scheme or legacy scheme
            var colors = false;

            // Try to find in new schemes first
            // if (memberliteColorSchemes.new[to]) {
            //     colors = memberliteColorSchemes.new[to].colors;
            //     isLegacy = false;
            // }
            // // Check legacy schemes
            // else if (memberliteColorSchemes.legacy[to]) {
            //     colors = memberliteColorSchemes.legacy[to].colors;
            //     isLegacy = true;
            // }

            memberlite_variation_color_controls_listener_flag = false;

            if (isLegacy) {
                // Legacy scheme - update ALL color controls from the 16-color array
                // Map legacy colors to all Customizer settings
                var legacyColorMap = {
                    'memberlite_bgcolor_header': 0,             // Header BG
					'background_color': 1,                     // Body BG
					'memberlite_bgcolor_page_masthead': 2, //Masthead BG
					'memberlite_bgcolor_site_navigation': 3,    // Nav BG
					'memberlite_color_site_navigation': 4,      // Nav Text
                    'memberlite_color_text': 5,                 // Body Text
					'memberlite_color_primary': 6,              // Primary
					//Skip primary hover bc we don't have setting to update
					'memberlite_color_secondary': 8,            // Secondary
					'memberlite_color_action': 9,              // Action
					'memberlite_color_button': 10,              // Button
					//Skip border color bc we don't have a setting to update
					'memberlite_color_page_masthead': 12,       //Masthead Text
					'memberlite_bgcolor_footer_widgets': 13,    //Footer Widgets BG
					'memberlite_color_footer_widgets': 14,    //Footer Widgets Text
					//Skip delimiter bc there's no setting to update
                };

                $.each(legacyColorMap, function(controlId, colorIndex) {
                    if (colors[colorIndex]) {
                        $('#customize-control-' + controlId)
                            .find('.color-picker-hex')
                            .wpColorPicker('color', colors[colorIndex]);
                    }
                });

				memberlite_variation_color_controls_listener_flag = true;
            } else {
                // New scheme - update 7 color controls
                // for (var i = 0; i < 7 && i < colors.length; i++) {
                //     $('#customize-control-' + memberlite_variation_color_controls[i])
                //         .find('.color-picker-hex')
                //         .wpColorPicker('color', colors[i]);
                // }

                // Also update derived colors based on the 7-color mapping
                // These match memberlite_map_colors_to_settings() in defaults.php
                var derivedColors = {
					'memberlite_bgcolor_header': colors['base'],             // Header BG
					'background_color': colors['base'],                     // Body BG
					'memberlite_bgcolor_page_masthead': colors['masthead_bg'], //Masthead BG
					'memberlite_bgcolor_site_navigation': colors['base'],    // Nav BG
					'memberlite_color_site_navigation': colors['contrast'],      // Nav Text
					'memberlite_color_text': colors['contrast'],                 // Body Text
					'memberlite_color_primary': colors['primary'],              // Primary
					//Skip primary hover bc we don't have setting to update
					'memberlite_color_secondary': colors['secondary'],            // Secondary
					'memberlite_color_action': colors['primary'],              // Action
					'memberlite_color_button': colors['primary'],              // Button
					//Skip border color bc we don't have a setting to update
					'memberlite_color_page_masthead': colors['masthead_text'],       //Masthead Text
					'memberlite_bgcolor_footer_widgets': colors['base'],    //Footer Widgets BG
					'memberlite_color_footer_widgets': colors['contrast'],    //Footer Widgets Text
					//Skip delimiter bc there's no setting to update
                };

                $.each(derivedColors, function(controlId, color) {
                    $('#customize-control-' + controlId)
                        .find('.color-picker-hex')
                        .wpColorPicker('color', color);
                });

                // Handle header_textcolor (Site Title & Tagline) specially (WordPress core control, no # needed)
                var headerTextColor = colors['contrast']; // contrast
                if (headerTextColor && headerTextColor.charAt(0) === '#') {
                    headerTextColor = headerTextColor.substring(1); // Remove # for WordPress core
                }
                wp.customize('header_textcolor').set(headerTextColor);
            }

            memberlite_variation_color_controls_listener_flag = true;
        });
    });

    // When any color is manually changed, set to custom
    // We need to watch ALL color controls, not just the 7 core ones
    var allColorControls = [
		'memberlite_bgcolor_header',             // Header BG
		'background_color',                     // Body BG
		'memberlite_bgcolor_page_masthead', //Masthead BG
		'memberlite_bgcolor_site_navigation',    // Nav BG
		'memberlite_color_site_navigation',      // Nav Text
		'memberlite_color_text',                 // Body Text
		'memberlite_color_primary',              // Primary
		'memberlite_color_secondary',            // Secondary
		'memberlite_color_action',              // Action
		'memberlite_color_button',              // Button
		'memberlite_color_page_masthead',       //Masthead Text
		'memberlite_bgcolor_footer_widgets',    //Footer Widgets BG
		'memberlite_color_footer_widgets',    //Footer Widgets Text
		'header_textcolor', //Site Title & Tagline
		'background_color', //Site BG
    ];

    for (var i = 0; i < allColorControls.length; i++) {
        (function(controlId) {
            wp.customize(controlId, function(value) {
                value.bind(function(to) {
                    if (memberlite_variation_color_controls_listener_flag) {
                        var currentScheme = wp.customize('memberlite_variation_color_scheme')();
                        if (currentScheme !== 'custom') {
                            wp.customize('memberlite_variation_color_scheme').set('custom');
                        }
                    }
                });
            });
        })(allColorControls[i]);
    }
} )( jQuery );
