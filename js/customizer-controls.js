( function( $ ) {
    // 'use strict';

    //Memberlite 4.7+ (Variation)
    let memberlite_variation_color_controls, memberlite_variation_color_controls_listener_flag;
    memberlite_variation_color_controls = [
        'color_text',
        'background_color',
        'bgcolor_header',
        'color_page_masthead',
        'color_primary',
        'color_secondary',
        'color_borders',
    ];
    memberlite_variation_color_controls_listener_flag = true;

    // Update colors when color scheme changes
    wp.customize('memberlite_variation_color_scheme', function(value) {
        value.bind(function(to) {
            // Ignore custom
            if (to === 'custom') {
                return;
            }

            // Check if it's a new scheme or legacy scheme
            var colors, isLegacy = false;

            // Try to find in new schemes first
            if (memberliteColorSchemes.new[to]) {
                colors = memberliteColorSchemes.new[to].colors;
                isLegacy = false;
            }
            // Check legacy schemes
            else if (memberliteColorSchemes.legacy[to]) {
                colors = memberliteColorSchemes.legacy[to].colors;
                isLegacy = true;
            } else {
                return; // Unknown scheme
            }

            memberlite_variation_color_controls_listener_flag = false;

            if (isLegacy) {
                // Legacy scheme - update all 16 color controls
                var legacyControls = [
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
                    'color_borders',
                    'bgcolor_page_masthead',
                    'color_page_masthead',
                    'bgcolor_footer_widgets',
                    'color_footer_widgets',
                ];

                for (i = 0; i < colors.length && i < legacyControls.length; i++) {
                    $('#customize-control-' + legacyControls[i])
                        .find('.color-picker-hex')
                        .wpColorPicker('color', colors[i]);
                }
            } else {
                // New scheme - update 7 color controls
                for (i = 0; i < 7; i++) {
                    $('#customize-control-' + memberlite_variation_color_controls[i])
                        .find('.color-picker-hex')
                        .wpColorPicker('color', colors[i]);
                }
            }

            memberlite_variation_color_controls_listener_flag = true;
        });
    });

// When any color is manually changed, set to custom
    for (i = 0; i < memberlite_variation_color_controls.length; i++) {
        wp.customize(memberlite_variation_color_controls[i], function(value) {
            value.bind(function(to) {
                if (memberlite_variation_color_controls_listener_flag) {
                    var currentScheme = wp.customize('memberlite_variation_color_scheme')();
                    if (currentScheme !== 'custom') {
                        wp.customize('memberlite_variation_color_scheme').set('custom');
                    }
                }
            });
        });
    }
} )( jQuery );
