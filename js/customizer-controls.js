( function( $ ) {
    // 'use strict';

	//Checks if the color scheme that loads initially (in theme_mod) is a legacy scheme
	let isLegacy = false,
		legacyColorsActive = memberliteColorSchemes.isLegacy,
		legacyColorSchemes = memberliteColorSchemes.allLegacyColorSchemes,
		modernSchemes = memberliteColorSchemes.allColorSchemes;

	if (legacyColorsActive) {
		isLegacy = true;
		// Wait for the control to be ready
		wp.customize.control('memberlite_variation_color_scheme', function(control) {
			control.setting.set(memberliteColorSchemes.activeColorScheme);
		});
	}

    //Memberlite color scheme change listener flag
    let memberlite_variation_color_controls_listener_flag = true;

    // Update colors when color scheme changes
    wp.customize('memberlite_variation_color_scheme', function(value) {
        value.bind(function(to) {
            // Ignore custom
            if (to === 'custom') {
                return;
            }

			let currentlySelectedScheme = to,
				colors = false;

            memberlite_variation_color_controls_listener_flag = false;

            if ( currentlySelectedScheme && (currentlySelectedScheme in legacyColorSchemes) ) {
				let legacyScheme = legacyColorSchemes[currentlySelectedScheme]['colors'];

				console.log(legacyScheme);

                // Legacy scheme - update ALL color controls from the 16-color array
                // Map legacy colors to all Customizer settings
                let legacyColorMap = {
                    'memberlite_bgcolor_header': legacyScheme[0],             // Header BG
					'background_color': legacyScheme[1],                     // Body BG
					'memberlite_bgcolor_page_masthead': legacyScheme[2], //Masthead BG
					'memberlite_bgcolor_site_navigation': legacyScheme[3],    // Nav BG
					'memberlite_color_site_navigation': legacyScheme[4],      // Nav Text
                    'memberlite_color_text': legacyScheme[5],                 // Body Text
					'memberlite_color_primary': legacyScheme[6],              // Primary
					//Skip primary hover bc we don't have setting to update
					'memberlite_color_secondary': legacyScheme[8],            // Secondary
					'memberlite_color_action': legacyScheme[9],              // Action
					'memberlite_color_button': legacyScheme[10],              // Button
					'memberlite_color_link': modernScheme[6],              // Link
					'memberlite_color_meta_link': modernScheme[6], //meta link
					//Skip border color bc we don't have a setting to update
					'memberlite_color_page_masthead': legacyScheme[12],       //Masthead Text
					'memberlite_bgcolor_footer_widgets': legacyScheme[13],    //Footer Widgets BG
					'memberlite_color_footer_widgets': legacyScheme[14],    //Footer Widgets Text
					//Skip delimiter bc there's no setting to update
                };

                $.each(legacyColorMap, function(controlId, color) {
                        $('#customize-control-' + controlId)
                            .find('.color-picker-hex')
                            .wpColorPicker('color', color);

                });

				// Handle header_textcolor (Site Title & Tagline) specially (WordPress core control, no # needed)
				let headerTextColor = legacyScheme[5]; //body text color
				if (headerTextColor && headerTextColor.charAt(0) === '#') {
					headerTextColor = headerTextColor.substring(1); // Remove # for WordPress core
				}
				wp.customize('header_textcolor').set(headerTextColor);

				memberlite_variation_color_controls_listener_flag = true;
            } else {
				let modernScheme = modernSchemes[currentlySelectedScheme]['colors'];

				console.log(modernScheme);
                // Also update derived colors based on the 7-color mapping
                // These match memberlite_map_colors_to_settings() in defaults.php
                let modernColorMap = {
					'memberlite_bgcolor_header': modernScheme['base'],             // Header BG
					'background_color': modernScheme['base'],                     // Body BG
					'memberlite_bgcolor_page_masthead': modernScheme['masthead_bg'], //Masthead BG
					'memberlite_bgcolor_site_navigation': modernScheme['base'],    // Nav BG
					'memberlite_color_site_navigation': modernScheme['contrast'],      // Nav Text
					'memberlite_color_text': modernScheme['contrast'],                 // Body Text
					'memberlite_color_primary': modernScheme['primary'],              // Primary
					//Skip primary hover bc we don't have setting to update
					'memberlite_color_secondary': modernScheme['secondary'],            // Secondary
					'memberlite_color_action': modernScheme['primary'],              // Action
					'memberlite_color_button': modernScheme['primary'],              // Button
					'memberlite_color_link': modernScheme['primary'],              // Link
					'memberlite_color_meta_link': modernScheme['primary'],              // Meta Link
					//Skip border color bc we don't have a setting to update
					'memberlite_color_page_masthead': modernScheme['masthead_text'],       //Masthead Text
					'memberlite_bgcolor_footer_widgets': modernScheme['base'],    //Footer Widgets BG
					'memberlite_color_footer_widgets': modernScheme['contrast'],    //Footer Widgets Text
					//Skip delimiter bc there's no setting to update
                };

                $.each(modernColorMap, function(controlId, color) {
                    $('#customize-control-' + controlId)
                        .find('.color-picker-hex')
                        .wpColorPicker('color', color);
                });

                // Handle header_textcolor (Site Title & Tagline) specially (WordPress core control, no # needed)
                let headerTextColor = modernScheme['contrast']; // contrast
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
