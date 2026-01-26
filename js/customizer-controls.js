( function( $ ) {
    // 'use strict';

    //Memberlite < 4.6 (Legacy)
	let memberlite_color_controls, memberlite_color_controls_listener_flag;
	memberlite_color_controls = [
		'header_textcolor',
		'background_color',
		'memberlite_bgcolor_header',
		'memberlite_bgcolor_site_navigation',
		'memberlite_color_site_navigation',
		'memberlite_color_text',
		'memberlite_color_link',
		'memberlite_color_meta_link',
		'memberlite_color_primary',
		'memberlite_color_secondary',
		'memberlite_color_action',
		'memberlite_color_button',
		'memberlite_bgcolor_page_masthead',
		'memberlite_color_page_masthead',
		'memberlite_bgcolor_footer_widgets',
		'memberlite_color_footer_widgets',
	];
	memberlite_color_controls_listener_flag = true;

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

    // Update colors when NEW/VARIATION color scheme changes (Memberlite 4.7+)
    wp.customize('memberlite_variation_color_scheme', function(value) {
        value.bind(function(to) {
            // ignore "custom" and "legacy"
            if (to !== 'custom' && to !== 'legacy') {
                // update colors
                var colors = memberliteColorSchemes.new[to].colors;
                memberlite_variation_color_controls_listener_flag = false;

                for (i = 0; i < 7; i++) {  // Only 7 colors for new schemes
                    $('#customize-control-' + memberlite_variation_color_controls[i])
                        .find('.color-picker-hex')
                        .wpColorPicker('color', colors[i]);
                }

                memberlite_variation_color_controls_listener_flag = true;
            }
        });
    });

// Update colors when LEGACY color scheme changes (Memberlite < 4.7)
    wp.customize('memberlite_color_scheme', function(value) {
        value.bind(function(to) {
            // ignore "custom" and "modern"
            if (to !== 'custom' && to !== 'modern') {
                var colors = memberliteColorSchemes.legacy[to].colors;
                memberlite_color_controls_listener_flag = false;

                for (i = 0; i < 16; i++) {  // 16 colors for legacy schemes
                    $('#customize-control-' + memberlite_color_controls[i])
                        .find('.color-picker-hex')
                        .wpColorPicker('color', colors[i]);
                }

                memberlite_color_controls_listener_flag = true;
            } else if (to === 'modern') {
                // Switch back to new schemes
                wp.customize('memberlite_variation_color_scheme').set('default_2026');
            }
        });
    });

// Set variation scheme to custom when a color is manually changed
    for (i = 0; i < memberlite_variation_color_controls.length; i++) {
        wp.customize(memberlite_variation_color_controls[i], function(value) {
            value.bind(function(to) {
                if (memberlite_variation_color_controls_listener_flag) {
                    var currentScheme = wp.customize('memberlite_variation_color_scheme')();
                    if (currentScheme !== 'custom' && currentScheme !== 'legacy') {
                        wp.customize('memberlite_variation_color_scheme').set('custom');
                    }
                }
            });
        });
    }

// Set legacy scheme to custom when a color is manually changed
    for (i = 0; i < memberlite_color_controls.length; i++) {
        wp.customize(memberlite_color_controls[i].replace(/memberlite_/, ''), function(value) {
            value.bind(function(to) {
                if (memberlite_color_controls_listener_flag) {
                    var currentVariationScheme = wp.customize('memberlite_variation_color_scheme')();
                    if (currentVariationScheme === 'legacy') {
                        wp.customize('memberlite_color_scheme').set('custom');
                    }
                }
            });
        });
    }
} )( jQuery );
