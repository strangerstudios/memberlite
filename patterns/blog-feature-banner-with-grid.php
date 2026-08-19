<?php
/**
 * Title: Blog Feature Banner with Grid
 * Slug: memberlite/blog-feature-banner-with-grid
 * Description: A full-width banner heading, a larger featured post with image/date/title/excerpt, a divider, and a 3x2 grid of recent posts with date, title, and excerpt cards.
 * Categories: memberlite-query-loops
 * Keywords: blog, posts, banner, featured post, query loop, grid, recent posts, news, courses, series, lessons, premium_content, pmpro_course, pmpro_lesson, pmpro_series
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"footer-widgets-background","textColor":"footer-widgets","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-footer-widgets-color has-footer-widgets-background-background-color has-text-color has-background has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:heading {"align":"wide","style":{"typography":{"textTransform":"capitalize"}}} -->
		<h2 class="wp-block-heading alignwide" style="text-transform:capitalize">The blog</h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-right:0;padding-left:0">
		<!-- wp:query {"queryId":3,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"align":"full","layout":{"type":"constrained"}} -->
		<div class="wp-block-query alignfull">
			<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"0"}}} -->
			<!-- wp:columns -->
			<div class="wp-block-columns">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px","fontStyle":"normal","fontWeight":"700"}}} /-->
					<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} /-->
					<!-- wp:post-excerpt {"moreText":"Read More","excerptLength":100,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} /-->
				</div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","sizeSlug":"large"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
	<!-- wp:separator {"className":"is-style-flourish-diamond"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-flourish-diamond"/>
	<!-- /wp:separator -->
	<!-- wp:query {"queryId":12,"query":{"perPage":6,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"var:preset|spacing|20","left":"var:preset|spacing|10"}}},"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"dimensions":{"minHeight":"425px"},"border":{"width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"backgroundColor":"site-navigation-background","textColor":"site-navigation-link","borderColor":"borders","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-border-color has-borders-border-color has-site-navigation-link-color has-site-navigation-background-background-color has-text-color has-background has-link-color" style="border-width:1px;min-height:425px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action"} /-->
			<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"24"} /-->
			<!-- wp:post-excerpt {"moreText":"Read More","excerptLength":25,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->