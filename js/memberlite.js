/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery(document).ready(function(){		
	var mobilenav_trigger = jQuery('button.menu-toggle');
	jQuery('#mobile-navigation').after(jQuery('<div id="mobile-navigation-height-col"></div>'));
	
	mobilenav_trigger.click(function() {	
			
		jQuery('#mobile-navigation').toggleClass('toggled');
		
		if(jQuery('#mobile-navigation').hasClass('toggled')){
			jQuery('#mobile-navigation').animate({
				left: '0px'
			});
			jQuery('#mobile-navigation-height-col').animate({
				left: '0px'
			});	
		} else {			
			jQuery('#mobile-navigation').animate({
				left: '-100%'
			});
			jQuery('#mobile-navigation-height-col').animate({
				left: '-100%'
			});
		}
	});
	
	//check if we should switch tab content on page loads
	if(window.location.hash)
		jQuery('a[href=' + window.location.hash + ']').click();
});