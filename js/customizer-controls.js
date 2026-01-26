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
        'contrast',
        'base',
        'masthead_bg',
        'masthead_text',
        'primary',
        'secondary',
        'border',
    ];
    memberlite_variation_color_controls_listener_flag = true;

	// Update colors when legacy color scheme changes. (Memberlite 4.6 and earlier)
	wp.customize(
		'memberlite_color_scheme', function( value ) {
			value.bind(
				function( to ) {

					// ignore "custom"
					if (to != 'custom') {
						// update colors
						var colors, header_logo;
						colors                                  = memberliteColorSchemes.legacy[to].colors;
						memberlite_color_controls_listener_flag = false;
						header_logo                             = $( '#customize-control-display_header_text' ).find( 'input:checked' );

						for (i = 0; i < 15; i++) {
							if (header_logo.length || i > 0) {
								$( '#customize-control-' + memberlite_color_controls[i] ).find( '.color-picker-hex' ).wpColorPicker( 'color', colors[i] );
							}
						}
						memberlite_color_controls_listener_flag = true;
					}
				}
			);
		}
	);

    // Update colors when color scheme changes. (Memberlite 4.7+)
    wp.customize(
        'memberlite_variation_color_scheme', function( value ) {
            value.bind(
                function( to ) {

                    // ignore "custom"
                    if (to != 'custom') {
                        // update colors
                        var colors, header_logo;
                        colors                                  = memberliteColorSchemes.new[to].colors;
                        memberlite_variation_color_controls_listener_flag = false;
                        header_logo                             = $( '#customize-control-display_header_text' ).find( 'input:checked' );

                        for (i = 0; i < 15; i++) {
                            if (header_logo.length || i > 0) {
                                $( '#customize-control-' + memberlite_variation_color_controls[i] ).find( '.color-picker-hex' ).wpColorPicker( 'color', colors[i] );
                            }
                        }
                        memberlite_variation_color_controls_listener_flag = true;
                    }
                }
            );
        }
    );

	// Set legacy color scheme to custom when a color is changed specifically
	for (i = 0; i < 15; i++) {
		wp.customize(
			memberlite_color_controls[i].replace( /memberlite_/, '' ), function( value ) {
				value.bind(
					function( to ) {
						if (memberlite_color_controls_listener_flag) {
							$( '#customize-control-memberlite_color_scheme' ).find( 'select' ).val( 'custom' ).change();
						}
					}
				);
			}
		);
	}

    // Set variation color scheme to custom when a color is changed specifically
    for (i = 0; i < 15; i++) {
        wp.customize(
            memberlite_variation_color_controls[i], function( value ) {
                value.bind(
                    function( to ) {
                        if (memberlite_variation_color_controls_listener_flag) {
                            $( '#customize-control-memberlite_variation_color_scheme' ).find( 'select' ).val( 'custom' ).change();
                        }
                    }
                );
            }
        );
    }
} )( jQuery );
