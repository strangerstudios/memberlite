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