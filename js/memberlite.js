/**
 * memberlite.js
 */

( function( $ ){
	$( document ).ready(
		function() {
			// Focus styles for menus when using keyboard navigation
			// Properly update the ARIA states on focus (keyboard) and mouse over events
			$( 'nav > ul' ).on( 'focus.wparia mouseenter.wparia', '[aria-haspopup="true"]', function ( ev ) {
				$( ev.currentTarget ).attr( 'aria-expanded', true );
			} );

			// Properly update the ARIA states on blur (keyboard) and mouse out events
			$( 'nav > ul' ).on( 'blur.wparia mouseleave.wparia', '[aria-haspopup="true"]', function ( ev ) {
				$( ev.currentTarget ).attr( 'aria-expanded', false );
			} );

			// switch tab content when clicked
			$( '.memberlite_tabbable .memberlite_tabs li a' ).click(
				function(e) {

					// don't want to jump to #
					e.preventDefault();

					// which tab was clicked
					let tab, tabarea;
					tab     = $( this ).attr( 'href' ).replace( /#/, '' );
					tabarea = $( this ).closest( '.memberlite_tabbable' );

					// hide all tab panes
					tabarea.find( '.memberlite_tab_pane' ).hide();
					tabarea.find( '.memberlite_tab_pane' ).removeClass( 'memberlite_active' );

					// show the active one
					$( '#' + tab ).show();
					$( '#' + tab ).addClass( 'memberlite_active' );

					// unstyle tabs
					tabarea.find( '.memberlite_tabs li' ).removeClass( 'memberlite_active' );

					// highlight the active one
					$( this ).closest( 'li' ).addClass( 'memberlite_active' );

					// update the URL
					if(history.pushState) {
						history.pushState( null, null, '#' + tab );
					} else {
						location.hash = '#' + tab;
					}
				}
			);

			// check if we should switch tab content on page loads
			$( 'a[data-toggle="tab"][href="' + window.location.hash + '"]' ).click();

			// mobile navigation
			let mobileNav = $( '#mobile-navigation' ),
				mobilenavTrigger = $( '#expand-mobile-nav' ),
				mobileNavClose = $( '#close-mobile-nav' );

			mobilenavTrigger.click(
				function() {
					$( 'body' ).addClass( 'mobile-nav-open' );
					$( '#content').attr( 'inert', true );
					$( '#colophon').attr( 'inert', true );
					mobileNav.removeAttr( 'inert' ).addClass( 'open' );
					$(this).attr( 'aria-expanded', true );
					mobileNavClose.focus();
				}
			);

			mobileNavClose.click( function() {
				$( 'body' ).removeClass( 'mobile-nav-open' );
				$( '#content').removeAttr( 'inert' );
				$( '#colophon').removeAttr( 'inert' );
				mobileNav.removeClass( 'open' ).attr( 'inert', true );
				mobilenavTrigger.attr( 'aria-expanded', false ).focus();
			});

			$( document ).on( 'keydown', function( e ) {
				if ( e.key === 'Escape' && mobileNav.hasClass( 'open' ) ) {
					mobileNavClose.click();
				}
			});

			// skip link focus fix
			// borrowed from _s theme: https://git.io/vWdr2
			let isIe = /(trident|msie)/i.test( navigator.userAgent );

			if ( isIe && document.getElementById && window.addEventListener ) {
				window.addEventListener( 'hashchange', function() {
					let id = location.hash.substring( 1 ),
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

}( jQuery ) );

