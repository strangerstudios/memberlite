<?php
/**
 * Title: Header: Two-Column Classic
 * Slug: memberlite/header-01
 * Description: Site branding on the left, member info on the right, with navigation below.
 * Categories: memberlite-header, header
 * Keywords: header, navigation, member, classic, two-column
 * Block Types: core/post-content
 * Post Types: memberlite_header
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<div class="wp-block-column is-vertically-aligned-top" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":120,"className":"is-style-default","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|10"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:site-title {"level":0,"fontSize":"30"} /-->

<!-- wp:site-tagline /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:group {"layout":{"type":"constrained","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:memberlite/member-info /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:memberlite/nav-menu /-->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search","buttonText":"Search","buttonPosition":"no-button"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
