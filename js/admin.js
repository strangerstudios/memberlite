/**
 * Admin JS for Memberlite Theme
 *
 * @since 6.1
 */

jQuery(document).ready(function () {
	memberlite_admin_prep_click_events();
});

// Function to prep click events for admin settings.
function memberlite_admin_prep_click_events() {
	/*
	 * Toggle content within the settings sections boxes.
	 *
	 * @since 6.1
	 */
	jQuery('button.memberlite_section-toggle-button').on('click', function (event) {
		event.preventDefault();

		let thebutton = jQuery(event.target).parents('.memberlite_section').find('button.memberlite_section-toggle-button');
		let buttonicon = thebutton.children('.dashicons');
		let section = thebutton.closest('.memberlite_section');
		let sectioninside = section.children('.memberlite_section_inside');

		//let visibility = container.data('visibility');
		//let activated = container.data('activated');
		if (buttonicon.hasClass('dashicons-arrow-down-alt2')) {
			// Section is not visible. Show it.
			jQuery(sectioninside).show();
			jQuery(buttonicon).removeClass('dashicons-arrow-down-alt2');
			jQuery(buttonicon).addClass('dashicons-arrow-up-alt2');
			jQuery(section).attr('data-visibility', 'shown');
			jQuery(thebutton).attr('aria-expanded', 'true');
		} else {
			// Section is visible. Hide it.
			jQuery(sectioninside).hide();
			jQuery(buttonicon).removeClass('dashicons-arrow-up-alt2');
			jQuery(buttonicon).addClass('dashicons-arrow-down-alt2');
			jQuery(section).attr('data-visibility', 'hidden');
			jQuery(thebutton).attr('aria-expanded', 'false');
		}
	});
}

