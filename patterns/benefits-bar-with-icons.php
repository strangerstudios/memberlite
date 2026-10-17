<?php
/**
 * Title: Benefits Bar With Icons
 * Slug: memberlite/benefits-bar-with-icons
 * Description: A full-width, four-column benefits bar highlighting key membership perks with icon badges. Icon badges use the Memberlite Font Awesome shortcode rather than the WordPress 7.0 Icon block, for compatibility with sites not yet on WordPress 7.0.
 * Categories: memberlite-content, memberlite-features
 * Keywords: benefits, features, icons, columns, membership, perks
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"borders","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-borders-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>[fa icon="store" color="site-background" background="secondary" shape="squircle"]</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Member Deals', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php esc_html_e( 'Enjoy discounts and perks available only to members.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>[fa icon="credit-card" color="site-background" background="secondary" shape="squircle"]</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Secure Payments', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php esc_html_e( 'Your billing information is encrypted and always secure.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>[fa icon="users" color="site-background" background="secondary" shape="squircle"]</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Active Community', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php esc_html_e( 'Connect with thousands of members who share your interests.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>[fa icon="shield" color="site-background" background="secondary" shape="squircle"]</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Cancel Anytime', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><?php esc_html_e( 'No contracts, no hassle. Manage your account whenever you like.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
