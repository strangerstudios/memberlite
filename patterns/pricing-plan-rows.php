<?php
/**
 * Title: Pricing Plan Rows
 * Slug: memberlite/pricing-plan-rows
 * Description: A compact pricing band with a heading beside three stacked Paid Memberships Pro plan rows, the middle plan highlighted. Uses levels 1, 2, and 3; a lighter-weight pricing teaser for a homepage.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, rows, band, homepage, teaser
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"align":"wide","style":{"border":{"radius":{"topLeft":"12px","topRight":"12px","bottomLeft":"12px","bottomRight":"12px"}},"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="border-top-left-radius:12px;border-top-right-radius:12px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}}} -->
<p style="letter-spacing:1px;text-transform:uppercase"><strong><?php esc_html_e( 'Membership Plans', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Learn Something New Every Week', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Start with a free week of every course. Stay monthly, or save with a yearly pass when you know it fits.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"69%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:69%"><!-- wp:pmpro/single-level {"selected_membership_level":"1","className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"backgroundColor":"site-navigation-background","textColor":"site-navigation-link","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card has-site-navigation-link-color has-site-navigation-background-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:pmpro/single-level-name {"selected_membership_level":"1","fontSize":"24"} -->
Explorer
<!-- /wp:pmpro/single-level-name -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Try every course free for 7 days.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:pmpro/single-level-price {"selected_membership_level":"1","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"1","text":<?php echo memberlite_get_pattern_attr_json( __( 'Join', 'memberlite' ) ); ?>,"textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 1 ) ); ?>"><?php esc_html_e( 'Join', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"2","className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"backgroundColor":"page-masthead-background","textColor":"page-masthead","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card has-page-masthead-color has-page-masthead-background-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:pmpro/single-level-name {"selected_membership_level":"2","fontSize":"24"} -->
Mastery Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Our best value for serious learners.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:pmpro/single-level-price {"selected_membership_level":"2","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"2","text":<?php echo memberlite_get_pattern_attr_json( __( 'Join', 'memberlite' ) ); ?>,"textAlign":"center","backgroundColor":"color-action","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-color-action-background-color has-background has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 2 ) ); ?>"><?php esc_html_e( 'Join', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:pmpro/single-level {"selected_membership_level":"3","className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"backgroundColor":"site-navigation-background","textColor":"site-navigation-link","layout":{"type":"constrained"}} -->
<div class="wp-block-pmpro-single-level is-style-card has-site-navigation-link-color has-site-navigation-background-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:pmpro/single-level-name {"selected_membership_level":"3","fontSize":"24"} -->
Flex Pass
<!-- /wp:pmpro/single-level-name -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Full access, billed monthly.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:pmpro/single-level-price {"selected_membership_level":"3","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->

<!-- wp:pmpro/checkout-button {"selected_membership_level":"3","text":<?php echo memberlite_get_pattern_attr_json( __( 'Join', 'memberlite' ) ); ?>,"textAlign":"center","className":""} -->
<div class="wp-block-buttons has-text-align-center"><div class="wp-block-button"><a class="wp-block-button__link wp-block-pmpro-checkout-button has-text-align-center wp-element-button" href="<?php echo esc_url( memberlite_get_pattern_checkout_url( 3 ) ); ?>"><?php esc_html_e( 'Join', 'memberlite' ); ?></a></div></div>
<!-- /wp:pmpro/checkout-button --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:pmpro/single-level -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php esc_html_e( 'Already a member?', 'memberlite' ); ?> <a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e( 'Log in', 'memberlite' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
