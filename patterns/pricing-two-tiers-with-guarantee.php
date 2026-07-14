<?php
/**
 * Title: Two Tier Pricing With Guarantee
 * Slug: memberlite/pricing-two-tiers-with-guarantee
 * Description: Heading and subtitle above a two-column pricing table with a perks checklist, plus a money-back guarantee callout below. Content is static and does not pull from PMPro membership levels, so it should be customized per site. Perk checkmarks and the guarantee icon use the Memberlite Font Awesome shortcode; the guarantee icon circle is fixed to 80px via custom CSS on the group block rather than the WordPress Icon block, for compatibility with sites not yet on WordPress 7.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, guarantee, money back, perks, comparison
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:heading {"style":{"typography":{"textAlign":"center","textTransform":"capitalize"}},"fontSize":"42","fontFamily":"gentium-book-basic"} -->
<h2 class="wp-block-heading has-text-align-center has-gentium-book-basic-font-family has-42-font-size" style="text-transform:capitalize">Members who have already joined are making tremendous progress...</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center","textTransform":"uppercase","letterSpacing":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"textColor":"color-action","fontSize":"16"} -->
<p class="has-text-align-center has-color-action-color has-text-color has-link-color has-16-font-size" style="margin-top:var(--wp--preset--spacing--10);letter-spacing:1px;text-transform:uppercase"><strong>Free forever. Optional power ups!</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--30);padding-right:0;padding-left:0"><!-- wp:column {"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"borderColor":"color-primary"} -->
<div class="wp-block-column has-border-color has-color-primary-border-color" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"30","fontFamily":"gentium-book-basic"} -->
<p class="has-text-align-center has-gentium-book-basic-font-family has-30-font-size"><strong>The Basics</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center","fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"0"}}},"fontSize":"42","fontFamily":"gentium-book-basic"} -->
<p class="has-text-align-center has-gentium-book-basic-font-family has-42-font-size" style="margin-top:0;font-style:normal;font-weight:700"><strong>$50</strong></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-secondary","fontSize":"21"} -->
<p class="has-color-secondary-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 1</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-secondary","fontSize":"21"} -->
<p class="has-color-secondary-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 2</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-secondary","fontSize":"21"} -->
<p class="has-color-secondary-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 3</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"},"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:button {"width":100,"className":"is-style-outline","style":{"border":{"radius":{"topLeft":"3px","topRight":"3px","bottomLeft":"3px","bottomRight":"3px"},"width":"3px"},"typography":{"textTransform":"uppercase","letterSpacing":"1px"},"spacing":{"padding":{"top":"4px","bottom":"4px"}}},"fontSize":"18"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link has-18-font-size has-custom-font-size wp-element-button" style="border-width:3px;border-top-left-radius:3px;border-top-right-radius:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px;padding-top:4px;padding-bottom:4px;letter-spacing:1px;text-transform:uppercase">Buy now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"backgroundColor":"color-primary","borderColor":"color-primary"} -->
<div class="wp-block-column has-border-color has-color-primary-border-color has-color-primary-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","fontSize":"30","fontFamily":"gentium-book-basic"} -->
<p class="has-text-align-center has-site-navigation-background-color has-text-color has-link-color has-gentium-book-basic-font-family has-30-font-size"><strong>Expert Fisherman</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center","fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","fontSize":"42","fontFamily":"gentium-book-basic"} -->
<p class="has-text-align-center has-site-navigation-background-color has-text-color has-link-color has-gentium-book-basic-font-family has-42-font-size" style="margin-top:0;font-style:normal;font-weight:700"><strong>$100</strong></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|borders"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"borders","fontSize":"21"} -->
<p class="has-borders-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","fontSize":"21"} -->
<p class="has-text-align-center has-site-navigation-background-color has-text-color has-link-color has-21-font-size" style="margin-top:0"><strong>Perk 1</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|borders"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"borders","fontSize":"21"} -->
<p class="has-borders-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","fontSize":"21"} -->
<p class="has-text-align-center has-site-navigation-background-color has-text-color has-link-color has-21-font-size" style="margin-top:0"><strong>Perk 2</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|borders"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"borders","fontSize":"21"} -->
<p class="has-borders-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","fontSize":"21"} -->
<p class="has-text-align-center has-site-navigation-background-color has-text-color has-link-color has-21-font-size" style="margin-top:0"><strong>Perk 3</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"},"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:button {"textColor":"site-navigation-background","width":100,"className":"is-style-outline","style":{"border":{"radius":{"topLeft":"3px","topRight":"3px","bottomLeft":"3px","bottomRight":"3px"},"width":"3px"},"typography":{"textTransform":"uppercase","letterSpacing":"1px"},"spacing":{"padding":{"top":"4px","bottom":"4px"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"fontSize":"18","borderColor":"site-navigation-background"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link has-site-navigation-background-color has-text-color has-link-color has-border-color has-site-navigation-background-border-color has-18-font-size has-custom-font-size wp-element-button" style="border-width:3px;border-top-left-radius:3px;border-top-right-radius:3px;border-bottom-left-radius:3px;border-bottom-right-radius:3px;padding-top:4px;padding-bottom:4px;letter-spacing:1px;text-transform:uppercase">Buy now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--10);margin-bottom:var(--wp--preset--spacing--10);padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"top","width":"10%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:10%"><!-- wp:group {"style":{"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"dimensions":{"minHeight":"80px"},"css":"display: flex; align-items: center; justify-content: center; height: 80px; width: 80px;"},"backgroundColor":"color-primary","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-custom-css has-site-navigation-background-color has-color-primary-background-color has-text-color has-background has-link-color" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;min-height:80px"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textAlign":"center"},"layout":{"selfStretch":"fixed","flexSize":"25%"},"spacing":{"padding":{"right":"5px","left":"5px","top":"5px","bottom":"5px"}},"border":{"radius":{"topLeft":"100%","topRight":"100%","bottomLeft":"100%","bottomRight":"100%"}}},"fontSize":"24"} -->
<p class="has-text-align-center has-24-font-size" style="border-top-left-radius:100%;border-top-right-radius:100%;border-bottom-left-radius:100%;border-bottom-right-radius:100%;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;font-style:normal;font-weight:700">[fa icon="handshake"]</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"fontSize":"16"} -->
<p class="has-16-font-size" style="letter-spacing:1px;text-transform:uppercase"><strong>100% Money back guarantee</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"8px","left":"0"}}}} -->
<p style="margin-top:8px;margin-left:0"><em>Not the right fit? Let us know within 30 days of joining and we'll refund you in full, no questions asked.</em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
