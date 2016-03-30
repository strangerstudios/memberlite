/**
 * memberlite.js
 *
 */
jQuery(document).ready(function(){		
	jQuery('a[href^="#"]').on('click', function(event) {
		var target = jQuery( jQuery(this).attr('href') );
	
		if( target.length ) {
			event.preventDefault();
			jQuery('html, body').animate({
				scrollTop: target.offset().top
			}, 800);
		}
	});
});