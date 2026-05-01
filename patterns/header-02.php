<?php
/**
 * Title: Header: Inline Logo + Navigation
 * Slug: memberlite/header-02
 * Description: Logo, navigation, and member info all on a single row.
 * Categories: memberlite-header, header
 * Keywords: header, navigation, member, inline, compact, single-row
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: memberlite_header
 * @package WordPress
 * @subpackage Memberlite
 * @since 7.1
 */
?>

<!-- wp:group {"className":"header-variation-02","align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="header-variation-02 wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}},"backgroundColor":"footer-widgets-background","textColor":"footer-widgets","fontSize":"16","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-footer-widgets-color has-footer-widgets-background-background-color has-text-color has-background has-link-color has-16-font-size" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;padding-top:10px;padding-right:0;padding-bottom:10px;padding-left:0"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide" style="padding-right:0;padding-left:0"><!-- wp:social-links {"iconColor":"footer-widgets","iconColorValue":"#222222","size":"has-normal-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"},"margin":{"left":"5px","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-right:0;margin-left:5px"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:memberlite/member-info {"backgroundColor":"footer-widgets-background"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:site-logo /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:site-title {"level":0,"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}}} /-->

<!-- wp:site-tagline /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:memberlite/nav-menu /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
