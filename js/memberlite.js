/**
 * memberlite.js
 */
jQuery( document ).ready(
	function() {

		// scroll to target links in page
		jQuery( 'a[href*="#"]:not(.memberlite_tabs a)' ).on(
			'click', function(event) {

				var target = jQuery( '#' + jQuery( this ).attr( 'href' ).hash );

				if ( target.length ) {
					event.preventDefault();
					jQuery( 'html, body' ).animate(
						{
							scrollTop: target.offset().top
						}, 800
					);
				}
			}
		);

		// switch tab content when clicked
		jQuery( '.memberlite_tabbable .memberlite_tabs li a' ).click(
			function(e) {

				// don't want to jump to #
				e.preventDefault();

				// which tab was clicked
				var tab, tabarea;
				tab     = jQuery( this ).attr( 'href' ).replace( /#/, '' );
				tabarea = jQuery( this ).closest( '.memberlite_tabbable' );

				// hide all tab panes
				tabarea.find( '.memberlite_tab_pane' ).hide();
				tabarea.find( '.memberlite_tab_pane' ).removeClass( 'memberlite_active' );

				// show the active one
				jQuery( '#' + tab ).show();
				jQuery( '#' + tab ).addClass( 'memberlite_active' );

				// unstyle tabs
				tabarea.find( '.memberlite_tabs li' ).removeClass( 'memberlite_active' );

				// highlight the active one
				jQuery( this ).closest( 'li' ).addClass( 'memberlite_active' );

				// update the URL
				if(history.pushState) {
				    history.pushState( null, null, '#' + tab );
				} else {
				    location.hash = '#' + tab;
				}
			}
		);

		// check if we should switch tab content on page loads
		jQuery( 'a[data-toggle="tab"][href="' + window.location.hash + '"]' ).click();

		// mobile navigation
		var mobilenav_trigger = jQuery( 'button.menu-toggle' );
		jQuery( '#mobile-navigation' ).after( jQuery( '<div id="mobile-navigation-height-col"></div>' ) );
		mobilenav_trigger.click(
			function() {

				jQuery( '#mobile-navigation' ).toggleClass( 'toggled' );

				if (jQuery( '#mobile-navigation' ).hasClass( 'toggled' )) {
					jQuery( '#mobile-navigation' ).animate(
						{
							left: '0px'
						}
					);
					jQuery( '#mobile-navigation-height-col' ).animate(
						{
							left: '0px'
						}
					);
				} else {
					jQuery( '#mobile-navigation' ).animate(
						{
							left: '-100%'
						}
					);
					jQuery( '#mobile-navigation-height-col' ).animate(
						{
							left: '-100%'
						}
					);
				}
			}
		);

		// skip link focus fix
		// borrowed from _s theme: https://git.io/vWdr2
		var isIe = /(trident|msie)/i.test( navigator.userAgent );

		if ( isIe && document.getElementById && window.addEventListener ) {
			window.addEventListener( 'hashchange', function() {
				var id = location.hash.substring( 1 ),
					element;

				if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
					return;
				}

				element = document.getElementById( id );

				if ( element ) {
					if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
						element.tabIndex = -1;
					}

					element.focus();
				}
			}, false );
		}
	}
);
