/**
 * Hide/show page banner settings
 */
//function to toggle settings
function memberlite_togglePageBannerMeta() {
	var $radios = jQuery('input[name=memberlite_banner_show]');
	if ( ! $radios.length ) {
		return; // Block editor: this metabox section isn't gated by the (removed) radio.
	}
	var memberlite_banner_show = parseInt($radios.filter(':checked').val());
	jQuery('#memberlite_top_banner_settings_wrapper').toggle( !! memberlite_banner_show );
}

//toggle on page load
jQuery(document).ready(function() { memberlite_togglePageBannerMeta(); });

//toggle when show banner radio is changed
jQuery('input[name=memberlite_banner_show]').on('keyup change', function() { memberlite_togglePageBannerMeta() });

/**
 * Temporary fix for Gutenberg issue where wp_editor fields are not saved when
 * used in meta boxes.
 * Borrowed from CMB2: https://github.com/CMB2/CMB2/pull/1190
 */
if (wp.data && window.tinymce) {
	wp.data.subscribe(function () {
		// the post is currently being saved && we have tinymce editors
		if (wp.data.select( 'core/editor' ).isSavingPost() && window.tinymce.editors) {
			for (var i = 0; i < tinymce.editors.length; i++) {
			tinymce.editors[i].save();
			}
		}
	});
}