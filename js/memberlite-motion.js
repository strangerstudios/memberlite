/**
 * Memberlite in-view hook for child themes.
 *
 * Adds `is-inview` to each `[data-memberlite-inview]` element once 30% of it is visible.
 * Adds `memberlite-motion` to <html> only while motion is allowed, so CSS that hides an
 * element before it comes into view should be scoped to `.memberlite-motion`.
 *
 * Elements are shown at once when the "Add Subtle Motion" setting is off, the visitor
 * prefers reduced motion, IntersectionObserver is missing, the element is inside
 * `.memberlite-no-motion`, the element is already on screen, or the page is printed.
 *
 * Not enqueued by the theme. Child themes load it with wp_enqueue_script( 'memberlite-motion' ).
 */
( function () {
	var SELECTOR = '[data-memberlite-inview]';
	var root = document.documentElement;
	var reduce = window.matchMedia( '(prefers-reduced-motion: reduce)' );
	var observer = null;

	function show( el ) {
		el.classList.add( 'is-inview' );
	}

	function showAll() {
		if ( observer ) {
			observer.disconnect();
			observer = null;
		}
		root.classList.remove( 'memberlite-motion' );
		document.querySelectorAll( SELECTOR ).forEach( show );
	}

	function isOnScreen( el ) {
		var rect = el.getBoundingClientRect();
		return rect.top < window.innerHeight && rect.bottom > 0;
	}

	function init() {
		if ( ! document.body.classList.contains( 'memberlite-has-motion' ) || reduce.matches || ! ( 'IntersectionObserver' in window ) ) {
			showAll();
			return;
		}

		observer = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					show( entry.target );
					observer.unobserve( entry.target );
				}
			} );
		}, { threshold: 0.3 } );

		document.querySelectorAll( SELECTOR ).forEach( function ( el ) {
			if ( el.closest( '.memberlite-no-motion' ) || isOnScreen( el ) ) {
				show( el );
			} else {
				observer.observe( el );
			}
		} );

		root.classList.add( 'memberlite-motion' );
	}

	reduce.addEventListener( 'change', function () {
		if ( reduce.matches ) {
			showAll();
		}
	} );
	window.addEventListener( 'beforeprint', showAll );

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
