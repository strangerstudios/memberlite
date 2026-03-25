/**
 * Main JS for the Memberlite Theme
 */
document.addEventListener('DOMContentLoaded', function () {
	initTabs();
	initDesktopNav();
	initMobileNav();
	initStickyNav();
	initBackToTop();
});

// ─── Tabs ────────────────────────────────────────────────────────────────────

function initTabs() {
	document.querySelectorAll('.memberlite_tabbable .memberlite_tabs li a').forEach(function (tabLink) {
		tabLink.addEventListener('click', onTabClick);
	});

	// Check if we should switch tab content on page load
	const hashLink = document.querySelector('a[data-toggle="tab"][href="' + window.location.hash + '"]');
	if (hashLink) {
		hashLink.click();
	}
}

function onTabClick(e) {
	e.preventDefault();

	const tab = this.getAttribute('href').replace(/#/, '');
	const tabarea = this.closest('.memberlite_tabbable');

	setActiveTab(tabarea, tab);
	setActiveTabLink(tabarea, this);
	updateUrlHash(tab);
}

function setActiveTab(tabarea, tab) {
	tabarea.querySelectorAll('.memberlite_tab_pane').forEach(function (pane) {
		pane.style.display = 'none';
		pane.classList.remove('memberlite_active');
	});

	const activePane = document.getElementById(tab);
	if (activePane) {
		activePane.style.display = '';
		activePane.classList.add('memberlite_active');
	}
}

function setActiveTabLink(tabarea, activeLink) {
	tabarea.querySelectorAll('.memberlite_tabs li').forEach(function (li) {
		li.classList.remove('memberlite_active');
	});
	activeLink.closest('li').classList.add('memberlite_active');
}

function updateUrlHash(hash) {
	if (history.pushState) {
		history.pushState(null, null, '#' + hash);
	} else {
		location.hash = '#' + hash;
	}
}

// ─── Desktop Navigation ──────────────────────────────────────────────────────

function initDesktopNav() {
	// Both of these navigations are in the header and can have submenus.
	const widgetSiteNav = document.querySelector('.header-widget-area');
	const memberNav = document.getElementById('member-navigation');
	const mainSiteNav = document.getElementById('site-navigation');

	if (mainSiteNav) {
		mainSiteNav.querySelectorAll('.menu-item-has-children').forEach(initDesktopNavItem);
		initDesktopNavClickOutside(mainSiteNav);
	}

	if (memberNav) {
		memberNav.querySelectorAll('.menu-item-has-children').forEach(initDesktopNavItem);
		initDesktopNavClickOutside(memberNav);
	}

	if (widgetSiteNav) {
		widgetSiteNav.querySelectorAll('.menu-item-has-children').forEach(initDesktopNavItem);
		initDesktopNavClickOutside(widgetSiteNav);
	}
}

/**
 * Collapse a single menu item's submenu and reset its toggle button.
 * Also collapses any open nested submenus inside it so they don't appear
 * pre-expanded if this item is reopened later.
 *
 * @param {HTMLElement} li - A .menu-item-has-children element.
 */
function collapseDesktopNavItem(li) {
	const btn = li.querySelector(':scope > button[aria-controls]');
	if (btn) {
		btn.setAttribute('aria-expanded', 'false');
	}

	li.querySelectorAll('.menu-item-has-children > button[aria-controls]').forEach(function (nestedBtn) {
		nestedBtn.setAttribute('aria-expanded', 'false');
	});
}

/**
 * Collapse all open items within a container, with an optional item to skip
 * (used to close siblings when opening a new item).
 *
 * @param {HTMLElement} container - The element to search within.
 * @param {HTMLElement} [skip]    - A .menu-item-has-children li to leave open.
 */
function collapseAllDesktopNavItems(container, skip) {
	container.querySelectorAll('.menu-item-has-children').forEach(function (li) {
		if (li !== skip) {
			collapseDesktopNavItem(li);
		}
	});
}

/**
 * Attach all event listeners to a single .menu-item-has-children element.
 *
 * @param {HTMLElement} li - A .menu-item-has-children element.
 */
function initDesktopNavItem(li) {
	const btn = li.querySelector(':scope > button[aria-controls]');
	if (!btn) {
		return;
	}

	// Hover: mouseenter/mouseleave keep aria-expanded in sync with the visual
	// hover state so the button is never out of step with what the user sees.
	// This lets aria-expanded serve as the single CSS hook for showing submenus.
	li.addEventListener('mouseenter', function () {
		if (li.parentElement) {
			collapseAllDesktopNavItems(li.parentElement, li);
		}
		btn.setAttribute('aria-expanded', 'true');
	});

	li.addEventListener('mouseleave', function () {
		btn.setAttribute('aria-expanded', 'false');
	});

	// Button click: toggles the submenu for keyboard and pointer users.
	// Because mouseenter already sets aria-expanded="true" before a mouse user
	// could click, clicking while hovered correctly closes rather than
	// "reopening" an already-visible submenu.
	btn.addEventListener('click', function () {
		const isExpanded = btn.getAttribute('aria-expanded') === 'true';

		if (!isExpanded) {
			if (li.parentElement) {
				collapseAllDesktopNavItems(li.parentElement, li);
			}
			btn.setAttribute('aria-expanded', 'true');
		} else {
			collapseDesktopNavItem(li);
		}
	});

	// Escape key: close the innermost open submenu and return focus to its
	// toggle button. stopPropagation gives one-level-at-a-time behaviour for
	// three-level menus — a second Escape closes the next level up.
	li.addEventListener('keydown', function (e) {
		if (e.key !== 'Escape') {
			return;
		}

		if (btn.getAttribute('aria-expanded') === 'true') {
			e.stopPropagation();
			collapseDesktopNavItem(li);
			btn.focus();
		}
	});

	// focusout: collapse when focus leaves the <li> entirely. focusout bubbles,
	// so one listener covers all descendants. relatedTarget is where focus is
	// moving to — if it's still inside this <li>, we do nothing.
	li.addEventListener('focusout', function (e) {
		if (!li.contains(e.relatedTarget)) {
			collapseDesktopNavItem(li);
		}
	});
}

/**
 * Collapse everything if the user clicks outside the nav entirely.
 *
 * @param {HTMLElement} nav
 */
function initDesktopNavClickOutside(nav) {
	document.addEventListener('click', function (e) {
		if (!nav.contains(e.target)) {
			collapseAllDesktopNavItems(nav);
		}
	});
}

// ─── Mobile Navigation ───────────────────────────────────────────────────────

function initMobileNav() {
	const mobileNav = document.getElementById('mobile-navigation');
	const mobilenavTrigger = document.getElementById('expand-mobile-nav');
	const mobileNavClose = document.getElementById('close-mobile-nav');

	if (!mobileNav || !mobilenavTrigger || !mobileNavClose) return;

	mobilenavTrigger.addEventListener('click', function () {
		openMobileNav(mobileNav, mobilenavTrigger, mobileNavClose);
	});

	mobileNavClose.addEventListener('click', function () {
		closeMobileNav(mobileNav, mobilenavTrigger);
	});

	// Close the mobile menu when the Escape key is pressed
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && mobileNav.classList.contains('open')) {
			closeMobileNav(mobileNav, mobilenavTrigger);
		}
	});

	// Close the mobile menu when an anchor link is clicked
	mobileNav.addEventListener('click', function (e) {
		const link = e.target.closest('a');
		if (link && isAnchorLinkForCurrentPage(link)) {
			closeMobileNav(mobileNav, mobilenavTrigger);
		}
	});
}

function openMobileNav(mobileNav, trigger, closeBtn) {
	const content = document.getElementById('content');
	const colophon = document.getElementById('colophon');

	document.body.classList.add('mobile-nav-open');
	if (content) content.setAttribute('inert', true);
	if (colophon) colophon.setAttribute('inert', true);
	mobileNav.removeAttribute('inert');
	mobileNav.classList.add('open');
	trigger.setAttribute('aria-expanded', 'true');
	closeBtn.focus();
}

function closeMobileNav(mobileNav, trigger) {
	const content = document.getElementById('content');
	const colophon = document.getElementById('colophon');

	document.body.classList.remove('mobile-nav-open');
	if (content) content.removeAttribute('inert');
	if (colophon) colophon.removeAttribute('inert');
	mobileNav.classList.remove('open');
	mobileNav.setAttribute('inert', true);
	trigger.setAttribute('aria-expanded', 'false');
	trigger.focus();
}

function isAnchorLinkForCurrentPage(link) {
	return (
		// Filter out links with no # at all, and bare # links (which have a hash of '')
		link.hash !== '' &&
		// Rule out links to other domains that happen to have a hash, e.g. https://example.com/page#section
		(link.origin === window.location.origin) &&
		// Rule out links to other pages on the same site, e.g. /another-page#section,
		// which would cause a full navigation anyway and naturally close the menu
		(link.pathname === window.location.pathname)
	);
}

// ─── Sticky Navigation ───────────────────────────────────────────────────────

function initStickyNav() {
	const stickyWrapper = document.querySelector('.site-navigation-sticky-wrapper');
	const stickyNav = document.getElementById('site-navigation');

	if (!stickyWrapper || !stickyNav) return;

	const navHeight = stickyNav.offsetHeight;
	const adminBar = document.getElementById('wpadminbar');
	const adminBarHeight = adminBar ? adminBar.offsetHeight : 0;

	stickyWrapper.style.height = navHeight + 'px';
	stickyNav.style.height = navHeight + 'px';

	const stickyTop = stickyWrapper.getBoundingClientRect().top + window.scrollY - adminBarHeight;

	window.addEventListener('scroll', function () {
		updateStickyState(stickyNav, stickyTop, adminBarHeight);
	});
}

function updateStickyState(stickyNav, stickyTop, adminBarHeight) {
	if (window.scrollY >= stickyTop) {
		stickyNav.classList.add('site-navigation-sticky');
		stickyNav.style.top = adminBarHeight + 'px';
	} else {
		stickyNav.classList.remove('site-navigation-sticky');
		stickyNav.style.top = '';
	}
}

// ─── Back to Top ─────────────────────────────────────────────────────────────

function initBackToTop() {
	const btn = document.querySelector('.memberlite-back-to-top.floating');
	if (!btn) return;

	const SCROLL_THRESHOLD = 300;

	function updateScrollVisibility() {
		btn.classList.toggle('is-visible', window.scrollY > SCROLL_THRESHOLD);
	}

	// Hide the button when the site footer scrolls into view.
	const footer = document.getElementById('colophon');
	if (footer) {
		new IntersectionObserver(function (entries) {
			if (!entries.length) return;
			btn.classList.toggle('is-footer-visible', entries[0].isIntersecting);
		}).observe(footer);
	}

	window.addEventListener('scroll', updateScrollVisibility, { passive: true });
	updateScrollVisibility();

	btn.addEventListener('click', function (e) {
		e.preventDefault();
		window.scrollTo({ top: 0, behavior: 'smooth' });
	});
}
