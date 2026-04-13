<?php
/**
 * Title: Header: Centered Branding
 * Slug: memberlite/header-03
 * Description: Colored header bar with centered logo and site branding, social links, and centered navigation.
 * Categories: memberlite-header, header
 * Keywords: header, navigation, member, centered, stacked
 * Block Types: core/post-content
 * Post Types: memberlite_header
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"full","style":{"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}},"backgroundColor":"footer-widgets-background","textColor":"footer-widgets","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-footer-widgets-color has-footer-widgets-background-background-color has-text-color has-background has-link-color" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":140,"align":"center","className":"is-style-default","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|10"}}}} /-->

<!-- wp:site-title {"level":0,"textAlign":"center"} /-->

<!-- wp:site-tagline {"textAlign":"center"} /--></div>
<!-- /wp:group -->

<!-- wp:social-links {"iconColor":"footer-widgets","iconColorValue":"#222222","size":"has-normal-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:memberlite/nav-menu /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
