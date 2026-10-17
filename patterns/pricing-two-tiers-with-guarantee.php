<?php
/**
 * Title: Two Tier Pricing With Guarantee
 * Slug: memberlite/pricing-two-tiers-with-guarantee
 * Description: Heading and subtitle above a two-column pricing table with a perks checklist, plus a money-back guarantee callout below. Content is static and does not pull from PMPro membership levels, so it should be customized per site. Perk checkmarks and the guarantee icon use the Memberlite Font Awesome shortcode rather than the WordPress Icon block, for compatibility with sites not yet on WordPress 7; the guarantee icon's circle badge uses the shortcode's own color/background/shape attributes.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, guarantee, money back, perks, comparison
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center">Your Next Skill Starts Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center">Try it free for 7 days, then keep learning monthly or save with a yearly plan.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"grid","columnCount":2}} -->
<div class="wp-block-group"><!-- wp:pmpro/single-level {"selected_membership_level":"1","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"3px","radius":{"topLeft":"12px","topRight":"12px","bottomLeft":"12px","bottomRight":"12px"}}},"borderColor":"color-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level has-border-color has-color-primary-border-color" style="border-width:3px;border-top-left-radius:12px;border-top-right-radius:12px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"1"} -->
Explorer
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"1","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"32","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"1","textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 1 ) ); ?>">Buy Now</a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><strong>Sample the full catalog</strong></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><strong>Start your first project</strong></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><strong>Join the community</strong></strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"2","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topLeft":"12px","topRight":"12px","bottomLeft":"12px","bottomRight":"12px"}}},"backgroundColor":"page-masthead-background","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level has-page-masthead-background-background-color has-background" style="border-top-left-radius:12px;border-top-right-radius:12px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"2","style":{"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead"} -->
Mastery Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"2","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead","fontSize":"32","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"2","textAlign":"center","backgroundColor":"color-action","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-color-action-background-color has-background has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 2 ) ); ?>">Buy Now</a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead","fontSize":"21"} -->
<p class="has-page-masthead-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead"} -->
<p class="has-page-masthead-color has-text-color has-link-color"><strong>Learn at your own pace</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead","fontSize":"21"} -->
<p class="has-page-masthead-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead"} -->
<p class="has-page-masthead-color has-text-color has-link-color"><strong>Real project files included</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead","fontSize":"21"} -->
<p class="has-page-masthead-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"textColor":"page-masthead"} -->
<p class="has-page-masthead-color has-text-color has-link-color"><strong>Beginner friendly</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:pmpro/single-level --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textAlign":"left"}},"fontSize":"24"} -->
<p class="has-text-align-left has-24-font-size" style="font-style:normal;font-weight:700">[fa icon="handshake" color="site-navigation-background" background="primary" shape="circle"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"fontFamily":"heading"} -->
<p class="has-heading-font-family" style="letter-spacing:1px;text-transform:uppercase"><strong>100% Money back guarantee</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Not the right fit? Let us know within 30 days of joining and we'll refund you in full, no questions asked.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
