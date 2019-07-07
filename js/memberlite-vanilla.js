/* 
* TO DO'S * 
// TODO: - scroll to target links in page
// TODO: - sticky navigation
TODO: - switch tab content when clicked
TODO: - check if we should switch tab content on page loads
TODO: - mobile navigation
TODO: Transpile (Babel) 
*/

// Variables
const anchorLinks = document.querySelectorAll( '[href*="#"]:not([data-toggle="tab"])' ); /* Exclude Memberlite tabs */
// const memberliteSiteNavigation = document.querySelector('#site-navigation');
const memberliteSiteNavigation = document.getElementById('site-navigation');
const memberliteSiteNavigationSticky = document.querySelector('.site-navigation-sticky-wrapper');


// Shared Functions

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

// Custom Scripts from libraries

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

// Site-Specific Functions

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

// Sticky Nav
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

// switch tab content when clicked
// jQuery( '.memberlite_tabbable .memberlite_tabs li a' ).click(
//   function(e) {

    // don't want to jump to #
    // e.preventDefault();

    // which tab was clicked
    // var tab, tabarea;
    // tab     = jQuery( this ).attr( 'href' ).replace( /#/, '' );
    // tabarea = jQuery( this ).closest( '.memberlite_tabbable' );

    // hide all tab panes
    /*
    tabarea.find( '.memberlite_tab_pane' ).hide();
    tabarea.find( '.memberlite_tab_pane' ).removeClass( 'memberlite_active' );

    // show the active one
    jQuery( '#' + tab ).show();
    jQuery( '#' + tab ).addClass( 'memberlite_active' );

    // unstyle tabs
    tabarea.find( '.memberlite_tabs li' ).removeClass( 'memberlite_active' );

    // highlight the active one
    jQuery( this ).closest( 'li' ).addClass( 'memberlite_active' );
*/
//   }
// );

const memberliteTabAnchors = document.querySelectorAll( '.memberlite_tabbable .memberlite_tabs li a' );

if ( memberliteTabAnchors != null ) {
  // memberliteTab(memberliteTabAnchors); 
  memberliteTabAnchors.forEach(link => {
    const memberliteTabAnchor = link.getAttribute('data-value')
    const memberliteTabName = memberliteTabAnchor.replace( /#/, '' );

    console.log('link :', link);
    console.log('memberliteTabName :', memberliteTabName);
    // .replace( /#/, '' )
    // link.addEventListener('click', event => {
    //   event.preventDefault();
    //   // tab = event.getAttibute( 'href' ).replace( /#/, '' );
    //   // console.log(tab);
    //   // tabarea = link.closest( '.memberlite_tabbable' );
    //   // console.log(tabarea);
    // });
    // link.addEventListener('click', openCity(event, eaVal));
    link.addEventListener('click', function (event, memberliteTabName) {
      // body
      console.log(memberliteTabName);
      let memberliteTabTarget  = `#${memberliteTabName}`;
      console.log('memberliteTabTarget :', memberliteTabTarget);
    });

  });
}



function memberliteTabSwitch(evt, memberliteTabName) {
  // do code

}

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName('memberlite_tab_content');
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  // document.getElementById(cityName).style.display = "block";
  // evt.currentTarget.className += " active";
}

// memberliteSwitchTabs(memberliteTabAnchors);

// function onTabClick(event) {
//   let activeTabs = document.querySelectorAll('.memberlite_active');
//   // console.log(activeTabs);
//   // deactivate existing active tab and panel
//   // for( let i = 0; i < activeTabs.length; i++) {
//   //   activeTabs[i].className = activeTabs[i].className.replace('active', '');
//   // }
  
//   activeTabs.forEach(function(tab) {
//     console.log(tab);
//     // var elemCurrent = document.getElementById(elemAttr.replace(/#/g, ""));
//     // tab.querySelectorAll('a').replace(/#/g, "");
//     tab.className = tab.className.replace('memberlite_active', '');
//   });
  
//   // activate new tab and panel
//   event.target.parentElement.className += ' memberlite_active';
//   document.getElementById(event.target.href.split('#')[1]).className += ' memberlite_active';
// }
// // const element = document.getElementById('nav-tab');
// const element = document.querySelector('.memberlite_tabs');

// element.addEventListener('click', onTabClick, false);