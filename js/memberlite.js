'use strict';
// Throttle
/**
 * @license
 * Lodash (Custom Build) lodash.com/license | Underscore.js 1.8.3 underscorejs.org/LICENSE
 * Build: `lodash include="throttle"`
 */
;(function(){function t(){}function e(t){return null==t?t===l?d:y:I&&I in Object(t)?n(t):r(t)}function n(t){var e=$.call(t,I),n=t[I];try{t[I]=l;var r=true}catch(t){}var o=_.call(t);return r&&(e?t[I]=n:delete t[I]),o}function r(t){return _.call(t)}function o(t,e,n){function r(e){var n=d,r=g;return d=g=l,x=e,v=t.apply(r,n)}function o(t){return x=t,O=setTimeout(c,e),T?r(t):v}function i(t){var n=t-h,r=t-x,o=e-n;return w?k(o,j-r):o}function f(t){var n=t-h,r=t-x;return h===l||n>=e||n<0||w&&r>=j}function c(){
    var t=D();return f(t)?p(t):(O=setTimeout(c,i(t)),l)}function p(t){return O=l,S&&d?r(t):(d=g=l,v)}function s(){O!==l&&clearTimeout(O),x=0,d=h=g=O=l}function y(){return O===l?v:p(D())}function m(){var t=D(),n=f(t);if(d=arguments,g=this,h=t,n){if(O===l)return o(h);if(w)return O=setTimeout(c,e),r(h)}return O===l&&(O=setTimeout(c,e)),v}var d,g,j,v,O,h,x=0,T=false,w=false,S=true;if(typeof t!="function")throw new TypeError(b);return e=a(e)||0,u(n)&&(T=!!n.leading,w="maxWait"in n,j=w?M(a(n.maxWait)||0,e):j,S="trailing"in n?!!n.trailing:S),
    m.cancel=s,m.flush=y,m}function i(t,e,n){var r=true,i=true;if(typeof t!="function")throw new TypeError(b);return u(n)&&(r="leading"in n?!!n.leading:r,i="trailing"in n?!!n.trailing:i),o(t,e,{leading:r,maxWait:e,trailing:i})}function u(t){var e=typeof t;return null!=t&&("object"==e||"function"==e)}function f(t){return null!=t&&typeof t=="object"}function c(t){return typeof t=="symbol"||f(t)&&e(t)==m}function a(t){if(typeof t=="number")return t;if(c(t))return s;if(u(t)){var e=typeof t.valueOf=="function"?t.valueOf():t;
    t=u(e)?e+"":e}if(typeof t!="string")return 0===t?t:+t;t=t.replace(g,"");var n=v.test(t);return n||O.test(t)?h(t.slice(2),n?2:8):j.test(t)?s:+t}var l,p="4.17.5",b="Expected a function",s=NaN,y="[object Null]",m="[object Symbol]",d="[object Undefined]",g=/^\s+|\s+$/g,j=/^[-+]0x[0-9a-f]+$/i,v=/^0b[01]+$/i,O=/^0o[0-7]+$/i,h=parseInt,x=typeof global=="object"&&global&&global.Object===Object&&global,T=typeof self=="object"&&self&&self.Object===Object&&self,w=x||T||Function("return this")(),S=typeof exports=="object"&&exports&&!exports.nodeType&&exports,N=S&&typeof module=="object"&&module&&!module.nodeType&&module,E=Object.prototype,$=E.hasOwnProperty,_=E.toString,W=w.Symbol,I=W?W.toStringTag:l,M=Math.max,k=Math.min,D=function(){
    return w.Date.now()};t.debounce=o,t.throttle=i,t.isObject=u,t.isObjectLike=f,t.isSymbol=c,t.now=D,t.toNumber=a,t.VERSION=p,typeof define=="function"&&typeof define.amd=="object"&&define.amd?(w._=t, define(function(){return t})):N?((N.exports=t)._=t,S._=t):w._=t}).call(this);

// *** Variables ****
var memberliteLinks = document.querySelectorAll( '[href*="#"]:not([data-toggle="tab"])' ); /* Exclude Memberlite tabs */
var memberliteSiteNavigation = document.getElementById( 'site-navigation' );
var memberliteSiteNavigationSticky = document.querySelector( '.site-navigation-sticky-wrapper' );

// *** Shared Functions ****

function memberliteGetElementHeight( e ) {
	if ( e != null ) {
		return e.clientHeight;
	}

	return 0;
}

function memberliteOffsetH( e ) {
	var rect = e.getBoundingClientRect(),
		scrollTop = window.pageYOffset || document.documentElement.scrollTop;

	return parseInt( rect.top + scrollTop );
}

// Borrowed from Chris Ferdinandi
// https://gomakethings.com/how-to-simulate-a-click-event-with-javascript/
// Vanilla JS click() method will not initiate navigation on an <a> element

/**
 * Simulate a click event.
 * @public
 * @param {Element} elem  the element to simulate a click on
 */
var memberliteSimulateClick = function ( elem ) {
	// Create our event (with options)
	var evt = new MouseEvent( 'click', {
		bubbles : true,
		cancelable : true,
		view : window
	} );

	// If cancelled, don't dispatch our event
	var canceled = ! elem.dispatchEvent( evt );
};

// *** Site-Specific Functions ***

// scroll to target links in page
function memberliteSmootScroll( elemArray ) {
	var scrollBounce = arguments.length <= 1 || arguments[1] === undefined ? 0 : arguments[1];

	var elemArrayArray = Array.prototype.slice.call( elemArray ); // Convert Nodelist to Array (IE doesn't support nodelist with foreach)

	elemArrayArray.forEach( function ( link ) {
		link.addEventListener( 'click', function ( event ) {
			event.preventDefault();

			var target = document.querySelector( event.target.hash );

			target.scrollIntoView( {
				behavior : 'smooth',
				block : 'start'
			} );

			// Check whether sticky navigation or WP adminbar is active
			// and add their height to adjust scroll positions

			scrollBounce = scrollBounce + memberliteGetElementHeight( document.getElementById( 'wpadminbar' ) ) + (memberliteSiteNavigationSticky != null ? memberliteGetElementHeight( memberliteSiteNavigation ) : 0);

			// Adjust scroll position if required
			if ( scrollBounce ) {
				setTimeout(
					function () {
						window.scrollBy( {top : -scrollBounce, behavior : 'smooth'} );
						scrollBounce = 0;
					},
					memberliteOffsetH( target ) / 6 > 500 ? parseInt( memberliteOffsetH( target ) / 6 ) : 500 //adjust time according to length of scroll
				);
			}
		} );
	} );
}

// Take Action
memberliteSmootScroll( memberliteLinks );

// Sticky Nav - replaces inline script previously in header.php
// Borrowed from Jessica Chan:
// https://github.com/thecodercoder/simple-sticky-header

// This function will run a throttled script every 300 ms to minimize resource usage
var memberliteStickyNav = _.throttle( function () {

	// Detect scroll position
	var scrollPosition = Math.round( window.scrollY );

	// If we've scrolled 100px, add "sticky" class to the header
	if ( scrollPosition > memberliteGetElementHeight( memberliteSiteNavigation ) ) {
		memberliteSiteNavigation.classList.add( 'site-navigation-sticky' );
	}
	// If not, remove "sticky" class from header
	else {
		memberliteSiteNavigation.classList.remove( 'site-navigation-sticky' );
	}
}, 300 );

if ( memberliteSiteNavigationSticky != null ) {
	// Run the checkHeader function every time you scroll
	window.addEventListener( 'scroll', memberliteStickyNav );
}

// switch tab content when clicked
var memberliteTabAnchors = document.querySelectorAll( '.memberlite_tabbable .memberlite_tabs li a' );
if ( memberliteTabAnchors != null ) {
	// Convert Nodelist to Array (IE doesn't support nodelist with foreach)
	var memberliteTabAnchorsArray = Array.prototype.slice.call( memberliteTabAnchors );

	memberliteTabAnchorsArray.forEach( function ( link ) {
		var memberliteTabAnchor = link.getAttribute( 'href' );

		link.addEventListener( 'click', function ( event, memberliteTabAnchor ) {
			event.preventDefault();

			var memberliteTabName = this.getAttribute( 'href' ).replace( /#/, '' );
			var memberliteTabArea = this.closest( '.memberlite_tabbable' );
			var memberliteTabPanes = memberliteTabArea.querySelectorAll( '.memberlite_tab_pane' );

			for ( var index = 0; index < memberliteTabPanes.length; index++ ) {
				memberliteTabPanes[index].style.display = 'none';
				memberliteTabPanes[index].classList.remove( 'memberlite-active' );
			}

			var memberliteTabPaneActive = document.getElementById( memberliteTabName );

			memberliteTabPaneActive.style.display = 'block';
			memberliteTabPaneActive.classList.add( 'memberlite_active' );

			var memberliteTabAreaListItems = memberliteTabArea.querySelectorAll( '.memberlite_tabs li' );

			for ( var _index = 0; _index < memberliteTabAreaListItems.length; _index++ ) {
				memberliteTabAreaListItems[_index].classList.remove( 'memberlite_active' );
			}

			this.closest( 'li' ).classList.add( 'memberlite_active' );
		} );
	} );
}

function memberliteTabSwitch( anchor ) {
}

/*
TODO:  see if possible to monitor with haschange to trigger again if location changes.
*/
// Get value with hashtag (#): (#VideoTutorial)
var memberliteUrlHash = location.hash;

if ( memberliteUrlHash != null && memberliteUrlHash != '' ) {
	var memberliteTabHash = document.querySelector( 'a[data-toggle="tab"][href="' + memberliteUrlHash + '"]' );

	memberliteSimulateClick( memberliteTabHash );
}

// mobile navigation
var memberliteMobilenav_trigger = document.querySelector( 'button.menu-toggle' ),
	memberliteMobilenav = document.getElementById( 'mobile-navigation' ),
	memberliteMobilenavDiv = document.createElement( 'div' );

memberliteMobilenavDiv.setAttribute( 'id', 'mobile-navigation-height-col' );
memberliteMobilenav.after( memberliteMobilenavDiv );

memberliteMobilenav_trigger.addEventListener( 'click', function ( event ) {
	memberliteMobilenav.classList.toggle( 'toggled' );

	if ( memberliteMobilenav.classList.contains( 'toggled' ) ) {
		memberliteMobilenav.style.left = '0px';
		memberliteMobilenav.style.transition = '0.35s';
		memberliteMobilenavDiv.style.left = '0px';
		memberliteMobilenavDiv.style.transition = '0.35s';
	}
	else {
		memberliteMobilenav.style.left = '-100%';
		memberliteMobilenav.style.transition = '0.35s';
		memberliteMobilenavDiv.style.left = '-100%';
		memberliteMobilenavDiv.style.transition = '0.35s';
	}
} );

// skip link focus fix
// borrowed from _s theme: https://git.io/vWdr2

var memberliteIsIe = /(trident|msie)/i.test( navigator.userAgent );

if ( memberliteIsIe && document.getElementById && window.addEventListener ) {
	window.addEventListener( 'hashchange', function () {
		var id = location.hash.substring( 1 ), element;

		if ( ! /^[A-z0-9_-]+$/.test( id ) ) {
			return;
		}

		element = document.getElementById( id );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();
		}
	}, false );
}
