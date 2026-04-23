<?php
/**
 * Title: Header: Logo, Nav & CTA
 * Slug: memberlite/header-04
 * Description: Colored header bar with site logo on the left, centered navigation, and a CTA button on the right.
 * Categories: memberlite-header, header
 * Keywords: header, navigation, member, cta, call to action
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: memberlite_header
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}},"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"footer-widgets-background","textColor":"footer-widgets","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-footer-widgets-color has-footer-widgets-background-background-color has-text-color has-background has-link-color" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;padding-top:0;padding-bottom:0"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"0"},"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)"><!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%"><!-- wp:site-title {"fontSize":"24"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><a href="#">Home</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><a href="#">About</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><a href="#">Membership</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><a href="#">Blog</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size"><a href="#">Contact</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-action","fontSize":"16"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-color-action-background-color has-background has-16-font-size has-custom-font-size wp-element-button">[fa icon="heart"] Join Today</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
