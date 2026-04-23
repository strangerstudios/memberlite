<?php
/**
 * Title: Header: Split Nav & Centered Logo
 * Slug: memberlite/header-05
 * Description: Promotional top bar with sign-in and social links, plus a centered logo flanked by navigation on either side.
 * Categories: memberlite-header, header
 * Keywords: header, navigation, centered, logo, two-row, promotional, split nav
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: memberlite_header
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"backgroundColor":"color-primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-color-primary-background-color has-text-color has-background has-link-color" style="padding-top:10px;padding-bottom:10px"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"fontSize":"14"} -->
<p class="has-14-font-size"><strong>Free trial available</strong> — No credit card required. Cancel anytime.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:loginout {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"fontSize":"14"} /-->

<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"has-text-align-right","style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}},"typography":{"textTransform":"uppercase"}},"fontSize":"16"} -->
<p class="has-text-align-right has-link-color has-16-font-size" style="text-transform:uppercase"><a href="#">Home</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"16"} -->
<p class="has-16-font-size" style="text-transform:uppercase"><a href="#">Shop</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"16"} -->
<p class="has-16-font-size" style="text-transform:uppercase"><a href="#">About Us</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":60,"align":"center","className":"is-style-default","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|10"}}}} /-->

<!-- wp:site-title {"level":0,"textAlign":"center"} /-->

<!-- wp:site-tagline {"textAlign":"center"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"has-text-align-right","style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}},"typography":{"textTransform":"uppercase"}},"fontSize":"16"} -->
<p class="has-text-align-right has-link-color has-16-font-size" style="text-transform:uppercase"><a href="#">Services</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"16"} -->
<p class="has-16-font-size" style="text-transform:uppercase"><a href="#">Blog</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"16"} -->
<p class="has-16-font-size" style="text-transform:uppercase"><a href="#">Contact</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
