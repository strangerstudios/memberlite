/* 
* TO DO'S * 
// TODO: - scroll to target links in page
// TODO: - sticky navigation
// TODO: - switch tab content when clicked
// TODO: - check if we should switch tab content on page loads
TODO: - mobile navigation
TODO: Transpile (Babel) 
*??? Only load polyfills if Edge or IE and >= 9
*??? Polyfills in own file, maybe PHP browser detect and enqueue when IE/Safari
*/

// *** Polyfills ***

// Before
// https://developer.mozilla.org/en-US/docs/Web/API/ChildNode/before#polyfill 
(function (arr) {
  arr.forEach(function (item) {
    if (item.hasOwnProperty('before')) {
      return;
    }
    Object.defineProperty(item, 'before', {
      configurable: true,
      enumerable: true,
      writable: true,
      value: function before() {
        var argArr = Array.prototype.slice.call(arguments),
          docFrag = document.createDocumentFragment();
        
        argArr.forEach(function (argItem) {
          var isNode = argItem instanceof Node;
          docFrag.appendChild(isNode ? argItem : document.createTextNode(String(argItem)));
        });
        
        this.parentNode.insertBefore(docFrag, this);
      }
    });
  });
})([Element.prototype, CharacterData.prototype, DocumentType.prototype]);

// After
// https://developer.mozilla.org/en-US/docs/Web/API/ChildNode/after#Polyfill
(function (arr) {
  arr.forEach(function (item) {
    if (item.hasOwnProperty('after')) {
      return;
    }
    Object.defineProperty(item, 'after', {
      configurable: true,
      enumerable: true,
      writable: true,
      value: function after() {
        var argArr = Array.prototype.slice.call(arguments),
          docFrag = document.createDocumentFragment();
        
        argArr.forEach(function (argItem) {
          var isNode = argItem instanceof Node;
          docFrag.appendChild(isNode ? argItem : document.createTextNode(String(argItem)));
        });
        
        this.parentNode.insertBefore(docFrag, this.nextSibling);
      }
    });
  });
})([Element.prototype, CharacterData.prototype, DocumentType.prototype]);

// *** Custom Scripts from libraries ***

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
const anchorLinks = document.querySelectorAll( '[href*="#"]:not([data-toggle="tab"])' ); /* Exclude Memberlite tabs */
const memberliteSiteNavigation = document.getElementById('site-navigation');
const memberliteSiteNavigationSticky = document.querySelector('.site-navigation-sticky-wrapper');

// *** Shared Functions ****

function getElementHeight(e) {
  if (e != null) {
    return e.clientHeight;
  } 
  return 0;
}

function offsetH(e) {
  var rect = e.getBoundingClientRect(),
  scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  return parseInt(rect.top + scrollTop);
}

// Borrowed from Chris Ferdinandi
// https://gomakethings.com/how-to-simulate-a-click-event-with-javascript/
// Vanilla JS click() method will not initiate navigation on an <a> element

/**
 * Simulate a click event.
 * @public
 * @param {Element} elem  the element to simulate a click on
 */
var simulateClick = function (elem) {
	// Create our event (with options)
	var evt = new MouseEvent('click', {
		bubbles: true,
		cancelable: true,
		view: window
	});
	// If cancelled, don't dispatch our event
	var canceled = !elem.dispatchEvent(evt);
};

// *** Site-Specific Functions ***

// scroll to target links in page
function memberliteSmootScroll(elemArray, scrollBounce = 0) {
  elemArray.forEach(link => {
    link.addEventListener('click', event => {
      event.preventDefault();
      let target = document.querySelector(event.target.hash);
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
  
// Check whether sticky navigation or WP adminbar is active
// and add their height to adjust scroll positions

      scrollBounce = scrollBounce + getElementHeight(document.getElementById('wpadminbar')) + ( (memberliteSiteNavigationSticky != null) ? getElementHeight(memberliteSiteNavigation) : 0);
// Adjust scroll position if required
      if (scrollBounce) {
        setTimeout(() => {
        window.scrollBy({top: -scrollBounce, behavior: 'smooth'});
        scrollBounce = 0;
        }, offsetH(target)/6 > 500 ? parseInt(offsetH(target)/6) : 500 ); //adjust time according to length of scroll
      }
    });
  });
}
// Take Action
memberliteSmootScroll(anchorLinks);

// Sticky Nav - replaces inline script previously in header.php
// Borrowed from Jessica Chan: 
// https://github.com/thecodercoder/simple-sticky-header

// This function will run a throttled script every 300 ms to minimize resource usage
var memberliteStickyNav = _.throttle(() => { 

  // Detect scroll position
  let scrollPosition = Math.round(window.scrollY);

  // If we've scrolled 100px, add "sticky" class to the header
  if ( scrollPosition > getElementHeight( memberliteSiteNavigation ) ){
    memberliteSiteNavigation.classList.add( 'site-navigation-sticky' );
  }
  // If not, remove "sticky" class from header
  else {
    memberliteSiteNavigation.classList.remove( 'site-navigation-sticky' );
  }
}, 300);

if (memberliteSiteNavigationSticky != null) {
  // Run the checkHeader function every time you scroll
  window.addEventListener( 'scroll', memberliteStickyNav );
}

// switch tab content when clicked
const memberliteTabAnchors = document.querySelectorAll( '.memberlite_tabbable .memberlite_tabs li a' );
if ( memberliteTabAnchors != null ) {

  memberliteTabAnchors.forEach(link => {

    const memberliteTabAnchor = link.getAttribute('href');

      link.addEventListener('click', function (event, memberliteTabAnchor) {

        event.preventDefault();
        const memberliteTabName = this.getAttribute('href').replace( /#/, '' );
        const memberliteTabArea = this.closest( '.memberlite_tabbable' );
        const memberliteTabPanes = memberliteTabArea.querySelectorAll('.memberlite_tab_pane');

        for (let index = 0; index < memberliteTabPanes.length; index++) {
          memberliteTabPanes[index].style.display = 'none';
          memberliteTabPanes[index].classList.remove('memberlite-active');
        }

        let memberliteTabPaneActive =  document.getElementById(memberliteTabName);
        memberliteTabPaneActive.style.display = 'block';
        memberliteTabPaneActive.classList.add('memberlite_active');

        const memberliteTabAreaListItems = memberliteTabArea.querySelectorAll( '.memberlite_tabs li' );
        for (let index = 0; index < memberliteTabAreaListItems.length; index++) {
          memberliteTabAreaListItems[index].classList.remove('memberlite_active');
        }
        this.closest('li').classList.add( 'memberlite_active' );
    });
  });
}

function memberliteTabSwitch(anchor) {

}

/*
TODO:  see if possible to monitor with haschange to trigger again if location changes.
*/
// Get value with hashtag (#): (#VideoTutorial)
const urlHash = location.hash;
// console.log('hash :', hash == ''); 
if ( urlHash != null && urlHash != '' ) {
  memberliteTabHash = document.querySelector( 'a[data-toggle="tab"][href="' + urlHash + '"]' );
  simulateClick(memberliteTabHash);
}

// mobile navigation
const mobilenav_trigger = document.querySelector( 'button.menu-toggle' ),
      mobilenav = document.getElementById( 'mobile-navigation' );
const mobilenavDiv = document.createElement( 'div' );
mobilenavDiv.setAttribute( 'id', 'mobile-navigation-height-col' );
mobilenav.after(mobilenavDiv);
mobilenav_trigger.addEventListener( 'click', function (event) {
  mobilenav.classList.toggle( 'toggled' );
  if (mobilenav.classList.contains( 'toggled' )) {
    mobilenav.style.left = '0px';
    mobilenav.style.transition = '0.35s';
    mobilenavDiv.style.left = '0px';
    mobilenavDiv.style.transition = '0.35s';
  } else {
    mobilenav.style.left = '-100%';
    mobilenav.style.transition = '0.35s';
    mobilenavDiv.style.left = '-100%';
    mobilenavDiv.style.transition = '0.35s';
  }
});

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
