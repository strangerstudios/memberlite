<?php
/**
 * Title: Three Tier Pricing
 * Slug: memberlite/pricing-three-tiers
 * Description: Three-column pricing table with perks and a call-to-action button per tier. Content is static and does not pull from PMPro membership levels, so it should be customized per site. Perk checkmarks use the Memberlite Font Awesome shortcode.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, tiers, table, comparison
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|20","top":"var:preset|spacing|20","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"borders"} -->
<div class="wp-block-column is-vertically-aligned-center has-borders-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center","fontStyle":"normal","fontWeight":"700"}},"fontSize":"42","fontFamily":"open-sans"} -->
<p class="has-text-align-center has-open-sans-font-family has-42-font-size" style="font-style:normal;font-weight:700"><strong>Free</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"textColor":"color-action","fontSize":"24"} -->
<p class="has-text-align-center has-color-action-color has-text-color has-link-color has-24-font-size" style="margin-top:var(--wp--preset--spacing--10)"><strong>Free Trial</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"8px","bottom":"var:preset|spacing|10"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:8px;margin-bottom:var(--wp--preset--spacing--10)">This is a description that isn't dynamic.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 1</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 2</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 3</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"},"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:button {"width":100,"style":{"border":{"radius":{"topLeft":"10em","topRight":"10em","bottomLeft":"10em","bottomRight":"10em"}},"typography":{"textTransform":"capitalize"}},"fontSize":"21"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-21-font-size has-custom-font-size wp-element-button" style="border-top-left-radius:10em;border-top-right-radius:10em;border-bottom-left-radius:10em;border-bottom-right-radius:10em;text-transform:capitalize">Sign up</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"backgroundColor":"borders"} -->
<div class="wp-block-column is-vertically-aligned-center has-borders-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center","fontStyle":"normal","fontWeight":"700"}},"fontSize":"42","fontFamily":"open-sans"} -->
<p class="has-text-align-center has-open-sans-font-family has-42-font-size" style="font-style:normal;font-weight:700"><strong>$276</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"textColor":"color-action","fontSize":"24"} -->
<p class="has-text-align-center has-color-action-color has-text-color has-link-color has-24-font-size" style="margin-top:var(--wp--preset--spacing--10)"><strong>Annual</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"8px","bottom":"var:preset|spacing|10"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:8px;margin-bottom:var(--wp--preset--spacing--10)">This is a description that isn't dynamic.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 1</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 2</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 3</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"},"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:button {"width":100,"style":{"border":{"radius":{"topLeft":"10em","topRight":"10em","bottomLeft":"10em","bottomRight":"10em"}},"typography":{"textTransform":"capitalize"}},"fontSize":"21"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-21-font-size has-custom-font-size wp-element-button" style="border-top-left-radius:10em;border-top-right-radius:10em;border-bottom-left-radius:10em;border-bottom-right-radius:10em;text-transform:capitalize">Sign up</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"backgroundColor":"borders"} -->
<div class="wp-block-column is-vertically-aligned-center has-borders-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center","fontStyle":"normal","fontWeight":"700"}},"fontSize":"42","fontFamily":"open-sans"} -->
<p class="has-text-align-center has-open-sans-font-family has-42-font-size" style="font-style:normal;font-weight:700"><strong>$25</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"textColor":"color-action","fontSize":"24"} -->
<p class="has-text-align-center has-color-action-color has-text-color has-link-color has-24-font-size" style="margin-top:var(--wp--preset--spacing--10)"><strong>Monthly</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"8px","bottom":"var:preset|spacing|10"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:8px;margin-bottom:var(--wp--preset--spacing--10)">This is a description that isn't dynamic.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 1</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 2</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 3</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"},"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:button {"width":100,"style":{"border":{"radius":{"topLeft":"10em","topRight":"10em","bottomLeft":"10em","bottomRight":"10em"}},"typography":{"textTransform":"capitalize"}},"fontSize":"21"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-21-font-size has-custom-font-size wp-element-button" style="border-top-left-radius:10em;border-top-right-radius:10em;border-bottom-left-radius:10em;border-bottom-right-radius:10em;text-transform:capitalize">Sign up</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
