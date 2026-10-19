<?php
/**
 * Title: Three Tier Pricing
 * Slug: memberlite/pricing-three-tiers
 * Description: Three Paid Memberships Pro level cards of equal weight. Uses levels 1, 2, and 3; each card shows the level name, price, checkout button, and level description.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, tiers, table, comparison
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group alignwide"><!-- wp:pmpro/single-level {"selected_membership_level":"1","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"1","fontSize":"24"} -->
Explorer
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"1","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"1","textAlign":"center","className":"","text":<?php echo memberlite_get_pattern_attr_json( __( 'Buy Now', 'memberlite' ) ); ?>} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 1 ) ); ?>"><?php esc_html_e( 'Buy Now', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"1"} /--></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"2","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"2","fontSize":"24"} -->
Mastery Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"2","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"2","textAlign":"center","className":"","text":<?php echo memberlite_get_pattern_attr_json( __( 'Buy Now', 'memberlite' ) ); ?>} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 2 ) ); ?>"><?php esc_html_e( 'Buy Now', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"2"} /--></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"3","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"3","fontSize":"24"} -->
Flex Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"3","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"3","textAlign":"center","className":"","text":<?php echo memberlite_get_pattern_attr_json( __( 'Buy Now', 'memberlite' ) ); ?>} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 3 ) ); ?>"><?php esc_html_e( 'Buy Now', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"3"} /--></div>
<!-- /wp:pmpro/single-level --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
