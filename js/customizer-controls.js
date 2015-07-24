( function( $ ) {
	var memberlite_color_controls, memberlite_color_controls_listener_flag;	
	memberlite_color_controls = ['header_textcolor', 
				'background_color', 
				'memberlite_color_link', 
				'memberlite_color_meta_link', 
				'memberlite_color_primary',
				'memberlite_color_secondary',
				'memberlite_color_action'
				];
	memberlite_color_controls_listener_flag = true;
	
	// Update colors when color scheme changes.
	wp.customize( 'memberlite_color_scheme', function( value ) {		
		value.bind( function( to ) {
						
			//ignore "custom"
			console.log(to);
			if(to != 'custom')
			{			
				//update colors											
				var colors, header_logo;
				colors = colorSchemes[to].colors;
				memberlite_color_controls_listener_flag = false;
				header_logo = $('#customize-control-display_header_text').find('input:checked');
				
				for(i = 0; i < 7; i++) {
					if(!header_logo || i > 2)
						$('#customize-control-'+memberlite_color_controls[i]).find( '.color-picker-hex' ).wpColorPicker('color', colors[i]);
				}
				memberlite_color_controls_listener_flag = true;				
			}			
		} );
	} );
	
	// Set color scheme to custom when a color is changed specifically
	for(i = 0; i < 7; i++) {
		wp.customize(memberlite_color_controls[i].replace(/memberlite_/, ''), function( value ) {
			value.bind( function( to ) {			
				if(memberlite_color_controls_listener_flag)
					$('#customize-control-memberlite_color_scheme').find('select').val('custom').change();
			} );
		} );
	}
} )( jQuery );