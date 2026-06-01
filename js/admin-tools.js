/**
 * Admin JS for Memberlite Tools page.
 *
 * Handles the import source toggle on the Tools > Import Settings section
 * when a child theme is active.
 *
 * @since TBD
 */
( function() {
	const radios= document.querySelectorAll( 'input[name="memberlite_import_source"]' ),
		fileRow       = document.getElementById( 'memberlite-import-file-row' ),
		menusRow      = document.getElementById( 'memberlite-import-menus-row' ),
		actionField   = document.getElementById( 'memberlite-import-action' ),
		fileInput     = document.getElementById( 'memberlite-import-file' );

	if ( ! radios.length ) {
		return;
	}

	function updateMode( mode ) {
		var isClone           = ( mode === 'clone' );
		fileRow.style.display  = isClone ? 'none' : '';
		menusRow.style.display = isClone ? 'none' : '';
		fileInput.disabled     = isClone;
		actionField.value      = isClone ? 'memberlite_clone_parent_theme_settings' : 'memberlite_import_theme_settings';
	}

	Array.prototype.forEach.call( radios, function( radio ) {
		radio.addEventListener( 'change', function() {
			updateMode( this.value );
		} );
	} );
}() );
