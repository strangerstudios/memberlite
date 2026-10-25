<?php
/**
 * Title: Three Tier Pricing With Featured Plan
 * Slug: memberlite/pricing-three-tiers-featured
 * Description: Three Paid Memberships Pro level cards with the middle plan highlighted as the best value. Uses levels 1, 2, and 3; each card shows the level name, price, checkout button, and level description.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, tiers, featured, popular, best value
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 8.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center","textTransform":"uppercase","letterSpacing":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action"} -->
<p class="has-text-align-center has-color-action-color has-text-color has-link-color" style="letter-spacing:1px;text-transform:uppercase"><strong><?php esc_html_e( 'Membership Plans', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Pick the Plan That Fits How You Learn', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php esc_html_e( 'Start with a free week, then keep learning monthly or save with a yearly pass.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group alignwide"><!-- wp:pmpro/single-level {"selected_membership_level":"1","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"1","fontSize":"24"} -->
Explorer
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"1","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"1","text":<?php echo memberlite_get_pattern_attr_json( __( 'Choose Plan', 'memberlite' ) ); ?>,"textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 1 ) ); ?>"><?php esc_html_e( 'Choose Plan', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"1"} /--></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"2","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"backgroundColor":"page-masthead-background","textColor":"page-masthead","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card has-page-masthead-color has-page-masthead-background-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center","textTransform":"uppercase","letterSpacing":"1px"}}} -->
<p class="has-text-align-center" style="letter-spacing:1px;text-transform:uppercase"><strong><?php esc_html_e( 'Best Value', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"2","fontSize":"24"} -->
Mastery Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"2","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"2","text":<?php echo memberlite_get_pattern_attr_json( __( 'Choose Plan', 'memberlite' ) ); ?>,"textAlign":"center","backgroundColor":"color-action","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-color-action-background-color has-background has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 2 ) ); ?>"><?php esc_html_e( 'Choose Plan', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"2"} /--></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"3","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:pmpro/single-level-name {"textAlign":"center","selected_membership_level":"3","fontSize":"24"} -->
Flex Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:pmpro/single-level-price {"textAlign":"center","selected_membership_level":"3","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"42","fontFamily":"heading"} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"3","text":<?php echo memberlite_get_pattern_attr_json( __( 'Choose Plan', 'memberlite' ) ); ?>,"textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 3 ) ); ?>"><?php esc_html_e( 'Choose Plan', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button -->

<!-- wp:pmpro/single-level-description {"selected_membership_level":"3"} /--></div>
<!-- /wp:pmpro/single-level --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php esc_html_e( 'Already a member?', 'memberlite' ); ?> <a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e( 'Log in', 'memberlite' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
