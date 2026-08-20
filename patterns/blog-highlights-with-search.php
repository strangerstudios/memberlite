<?php
/**
 * Title: Blog Highlights with Search
 * Slug: memberlite/blog-highlights-with-search
 * Description: Two-column blog layout featuring the latest post with a full image on one side, and a search field with four more recent post titles stacked beneath it on the other.
 * Categories: memberlite-query-loops
 * Keywords: blog, posts, search, query loop, recent posts, news, courses, series, lessons, premium_content, pmpro_course, pmpro_lesson, pmpro_series
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--10)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-right:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"className":"is-style-heading-rule","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
			<h2 class="wp-block-heading is-style-heading-rule" style="font-style:normal;font-weight:700">The Blog</h2>
			<!-- /wp:heading -->
			<!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
			<div class="wp-block-query">
				<!-- wp:post-template -->
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","sizeSlug":"full","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->
				<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","letterSpacing":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"spacing":{"padding":{"bottom":"0"},"margin":{"bottom":"0"}}},"textColor":"color-action","fontSize":"14"} /-->
				<!-- wp:post-title {"isLink":true,"style":{"spacing":{"padding":{"top":"0"},"margin":{"top":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link"} /-->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search the blog","width":100,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"className":"is-style-filled-sharp","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"typography":{"textTransform":"uppercase"}},"fontSize":"18"} /-->
			<!-- wp:query {"queryId":1,"query":{"perPage":4,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]},"layout":{"type":"constrained"}} -->
			<div class="wp-block-query">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|40","left":"0"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0">
					<!-- wp:post-template {"style":{"typography":{"textTransform":"none"},"spacing":{"blockGap":"0"}}} -->
					<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","letterSpacing":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"spacing":{"padding":{"bottom":"0"},"margin":{"bottom":"0"}}},"textColor":"color-action","fontSize":"14"} /-->
					<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"bottom":"var:preset|spacing|20","top":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|20"}},"border":{"bottom":{"width":"3px"},"top":[],"right":[],"left":[]}},"layout":{"type":"default"}} -->
					<div class="wp-block-group" style="border-bottom-width:3px;margin-top:0;margin-bottom:var(--wp--preset--spacing--20);padding-top:0;padding-bottom:var(--wp--preset--spacing--20)">
						<!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit"},"typography":{"lineHeight":"1.1","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}},"spacing":{"padding":{"top":"var:preset|spacing|10"}}},"textColor":"site-navigation-link","fontSize":"30"} /-->
					</div>
					<!-- /wp:group -->
					<!-- /wp:post-template -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->