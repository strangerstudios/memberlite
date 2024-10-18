/**
 * memberlite-shortcodes.js
 */
jQuery( document ).ready( function() {

	//show accordion content when clicked
	jQuery('.memberlite_accordion-item h2').click(function(e) {
		
		var accordion_trigger, accordion, accordion_wrapper;

		accordion_trigger = jQuery(this);
		accordion = accordion_trigger.closest('.memberlite_accordion-item');
		accordion_wrapper = accordion.closest('.memberlite_accordion');

		if(accordion_wrapper.hasClass('memberlite_accordion-show')) {
			//hide all items
			jQuery.each(accordion_wrapper.find('.memberlite_accordion-item'), function(key, item) {
				if(jQuery(item).is(accordion)) {
					jQuery(item).find('.memberlite_accordion-item-content').slideToggle(350);
					if(jQuery(item).hasClass('memberlite_accordion-active')) {
						jQuery(item).removeClass('memberlite_accordion-active');
					} else {
						jQuery(item).addClass('memberlite_accordion-active');
					}
				}
			});
		} else {
			//hide all items
			jQuery.each(accordion_wrapper.find('.memberlite_accordion-item'), function(key, item) {
				if(jQuery(item).is(accordion)) {
					jQuery(item).find('.memberlite_accordion-item-content').slideToggle(350);
					if(jQuery(item).hasClass('memberlite_accordion-active')) {
						jQuery(item).removeClass('memberlite_accordion-active');
					} else {
						jQuery(item).addClass('memberlite_accordion-active');
					}
				} else {
					jQuery(item).find('.memberlite_accordion-item-content').slideUp(350);
					jQuery(item).removeClass('memberlite_accordion-active');
				}
			});
		}
	});

	if( jQuery(".memberlite_accordion-item").length > 0 ){
		//Accordion is on this page
		var accordion_id = location.hash;
		if( accordion_id !== "" ){
			//Open an accordion
			jQuery( accordion_id + ' h2' ).click();
		}

	}

});