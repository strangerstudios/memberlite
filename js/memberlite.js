/**
 * Main JS for the Memberlite Theme
 * Version: 7.0
 *
 * @version 7.0
 * @package Memberlite
 */
document.addEventListener( 'DOMContentLoaded', function() {

	initAriaNavigation();
	initTabs();
	initMobileNav();
	initStickyNav();

} );

// ─── ARIA Navigation ────────────────────────────────────────────────────────

function initAriaNavigation() {
	document.querySelectorAll( 'nav > ul' ).forEach( function( nav ) {
		nav.addEventListener( 'focus',      function( ev ) { setAriaExpanded( ev, true );  }, true );
		nav.addEventListener( 'mouseenter', function( ev ) { setAriaExpanded( ev, true );  }, true );
		nav.addEventListener( 'blur',       function( ev ) { setAriaExpanded( ev, false ); }, true );
		nav.addEventListener( 'mouseleave', function( ev ) { setAriaExpanded( ev, false ); }, true );
	} );
}

function setAriaExpanded( ev, expanded ) {
	const trigger = ev.target.closest( '[aria-haspopup="true"]' );
	if ( trigger ) {
		trigger.setAttribute( 'aria-expanded', String( expanded ) );
	}
}

// ─── Tabs ────────────────────────────────────────────────────────────────────

function initTabs() {
	document.querySelectorAll( '.memberlite_tabbable .memberlite_tabs li a' ).forEach( function( tabLink ) {
		tabLink.addEventListener( 'click', onTabClick );
	} );

	// Check if we should switch tab content on page load
	const hashLink = document.querySelector( 'a[data-toggle="tab"][href="' + window.location.hash + '"]' );
	if ( hashLink ) {
		hashLink.click();
	}
}

function onTabClick( e ) {
	e.preventDefault();

	const tab     = this.getAttribute( 'href' ).replace( /#/, '' );
	const tabarea = this.closest( '.memberlite_tabbable' );

	setActiveTab( tabarea, tab );
	setActiveTabLink( tabarea, this );
	updateUrlHash( tab );
}

function setActiveTab( tabarea, tab ) {
	tabarea.querySelectorAll( '.memberlite_tab_pane' ).forEach( function( pane ) {
		pane.style.display = 'none';
		pane.classList.remove( 'memberlite_active' );
	} );

	const activePane = document.getElementById( tab );
	if ( activePane ) {
		activePane.style.display = '';
		activePane.classList.add( 'memberlite_active' );
	}
}

function setActiveTabLink( tabarea, activeLink ) {
	tabarea.querySelectorAll( '.memberlite_tabs li' ).forEach( function( li ) {
		li.classList.remove( 'memberlite_active' );
	} );
	activeLink.closest( 'li' ).classList.add( 'memberlite_active' );
}

function updateUrlHash( hash ) {
	if ( history.pushState ) {
		history.pushState( null, null, '#' + hash );
	} else {
		location.hash = '#' + hash;
	}
}

// ─── Mobile Navigation ───────────────────────────────────────────────────────

function initMobileNav() {
	const mobileNav        = document.getElementById( 'mobile-navigation' );
	const mobilenavTrigger = document.getElementById( 'expand-mobile-nav' );
	const mobileNavClose   = document.getElementById( 'close-mobile-nav' );

	if ( !mobileNav || !mobilenavTrigger || !mobileNavClose ) return;

	mobilenavTrigger.addEventListener( 'click', function() {
		openMobileNav( mobileNav, mobilenavTrigger, mobileNavClose );
	} );

	mobileNavClose.addEventListener( 'click', function() {
		closeMobileNav( mobileNav, mobilenavTrigger );
	} );

	document.addEventListener( 'keydown', function( e ) {
		if ( e.key === 'Escape' && mobileNav.classList.contains( 'open' ) ) {
			closeMobileNav( mobileNav, mobilenavTrigger );
		}
	} );
}

function openMobileNav( mobileNav, trigger, closeBtn ) {
	document.body.classList.add( 'mobile-nav-open' );
	document.getElementById( 'content' ).setAttribute( 'inert', true );
	document.getElementById( 'colophon' ).setAttribute( 'inert', true );
	mobileNav.removeAttribute( 'inert' );
	mobileNav.classList.add( 'open' );
	trigger.setAttribute( 'aria-expanded', 'true' );
	closeBtn.focus();
}

function closeMobileNav( mobileNav, trigger ) {
	document.body.classList.remove( 'mobile-nav-open' );
	document.getElementById( 'content' ).removeAttribute( 'inert' );
	document.getElementById( 'colophon' ).removeAttribute( 'inert' );
	mobileNav.classList.remove( 'open' );
	mobileNav.setAttribute( 'inert', true );
	trigger.setAttribute( 'aria-expanded', 'false' );
	trigger.focus();
}

// ─── Sticky Navigation ───────────────────────────────────────────────────────

function initStickyNav() {
	const stickyWrapper = document.querySelector( '.site-navigation-sticky-wrapper' );
	if ( !stickyWrapper ) return;

	const stickyNav      = document.getElementById( 'site-navigation' );
	const navHeight      = stickyNav.offsetHeight;
	const adminBar       = document.getElementById( 'wpadminbar' );
	const adminBarHeight = adminBar ? adminBar.offsetHeight : 0;

	stickyWrapper.style.height = navHeight + 'px';
	stickyNav.style.height     = navHeight + 'px';

	const stickyTop = stickyWrapper.getBoundingClientRect().top + window.scrollY - adminBarHeight;

	window.addEventListener( 'scroll', function() {
		updateStickyState( stickyNav, stickyTop, adminBarHeight );
	} );
}

function updateStickyState( stickyNav, stickyTop, adminBarHeight ) {
	if ( window.scrollY >= stickyTop ) {
		stickyNav.classList.add( 'site-navigation-sticky' );
		stickyNav.style.top = adminBarHeight + 'px';
	} else {
		stickyNav.classList.remove( 'site-navigation-sticky' );
		stickyNav.style.top = '';
	}
}
