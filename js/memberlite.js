/**
 * Main JS for the Memberlite Theme
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

	// Close the mobile menu when the Escape key is pressed
	document.addEventListener( 'keydown', function( e ) {
		if ( e.key === 'Escape' && mobileNav.classList.contains( 'open' ) ) {
			closeMobileNav( mobileNav, mobilenavTrigger );
		}
	} );

	// Close the mobile menu when an anchor link is clicked
	mobileNav.addEventListener( 'click', function( e ) {
		const link = e.target.closest( 'a' );
		if ( link && isAnchorLinkForCurrentPage( link ) ) {
			closeMobileNav( mobileNav, mobilenavTrigger );
		}
	} );
}

function openMobileNav( mobileNav, trigger, closeBtn ) {
	const content  = document.getElementById( 'content' );
	const colophon = document.getElementById( 'colophon' );

	document.body.classList.add( 'mobile-nav-open' );
	if ( content ) content.setAttribute( 'inert', true );
	if ( colophon ) colophon.setAttribute( 'inert', true );
	mobileNav.removeAttribute( 'inert' );
	mobileNav.classList.add( 'open' );
	trigger.setAttribute( 'aria-expanded', 'true' );
	closeBtn.focus();
}

function closeMobileNav( mobileNav, trigger ) {
	const content  = document.getElementById( 'content' );
	const colophon = document.getElementById( 'colophon' );

	document.body.classList.remove( 'mobile-nav-open' );
	if ( content ) content.removeAttribute( 'inert' );
	if ( colophon ) colophon.removeAttribute( 'inert' );
	mobileNav.classList.remove( 'open' );
	mobileNav.setAttribute( 'inert', true );
	trigger.setAttribute( 'aria-expanded', 'false' );
	trigger.focus();
}

function isAnchorLinkForCurrentPage( link ) {
	return (
		// Filter out links with no # at all, and bare # links (which have a hash of '')
		link.hash !== '' &&
		// Rule out links to other domains that happen to have a hash, e.g. https://example.com/page#section
		( link.origin === window.location.origin ) &&
		// Rule out links to other pages on the same site, e.g. /another-page#section,
		// which would cause a full navigation anyway and naturally close the menu
		( link.pathname === window.location.pathname )
	);
}

// ─── Sticky Navigation ───────────────────────────────────────────────────────

function initStickyNav() {
	const stickyWrapper  = document.querySelector( '.site-navigation-sticky-wrapper' );
	const stickyNav      = document.getElementById( 'site-navigation' );

	if ( ! stickyWrapper || ! stickyNav ) return;

	const navHeight      = stickyNav.offsetHeight;
	const adminBar               = document.getElementById( 'wpadminbar' );
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
