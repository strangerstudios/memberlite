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
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group alignwide"><!-- wp:pmpro/single-level {"selected_membership_level":"1","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"width":"1px","radius":{"topLeft":"12px","topRight":"12px","bottomLeft":"12px","bottomRight":"12px"}}},"borderColor":"borders","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:12px;border-top-right-radius:12px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"1","fontSize":"24"} -->
Explorer
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"1","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"1","textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 1 ) ); ?>">Buy Now</a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"1"} /--></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"2","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"width":"1px","radius":{"topLeft":"12px","topRight":"12px","bottomLeft":"12px","bottomRight":"12px"}}},"borderColor":"borders","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:12px;border-top-right-radius:12px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"2","fontSize":"24"} -->
Mastery Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"2","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"2","textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 2 ) ); ?>">Buy Now</a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"2"} /--></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"3","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"border":{"width":"1px","radius":{"topLeft":"12px","topRight":"12px","bottomLeft":"12px","bottomRight":"12px"}}},"borderColor":"borders","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:12px;border-top-right-radius:12px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"3","fontSize":"24"} -->
Flex Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"3","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"3","textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 3 ) ); ?>">Buy Now</a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"3"} /--></div>
<!-- /wp:pmpro/single-level --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
