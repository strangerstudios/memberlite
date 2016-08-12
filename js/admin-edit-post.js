/**
 * Hide/show page banner settings
 */
//function to toggle settings
function memberlite_togglePageBannerMeta() {
	var memberlite_banner_show = parseInt(jQuery('input[name=memberlite_banner_show]:checked').val());
	if(memberlite_banner_show) {
		jQuery('#memberlite_top_banner_settings_wrapper').show();
	} else {
		jQuery('#memberlite_top_banner_settings_wrapper').hide();
	}
}

//toggle on page load
jQuery(document).ready(function() { memberlite_togglePageBannerMeta(); });

//toggle when show banner radio is changed
jQuery('input[name=memberlite_banner_show]').bind('keyup change', function() { memberlite_togglePageBannerMeta() });