<?php
/**
 * Title: Featured News Cover Grid
 * Slug: memberlite/featured-news-cover-grid
 * Description: A cover-style grid highlighting the latest post as a large featured cover with title, author, and date, alongside four smaller post covers in a 2x2 grid.
 * Categories: memberlite-query-loops
 * Keywords: blog, posts, news, cover, query loop, grid, featured post, recent posts, courses, series, lessons, premium_content, pmpro_course, pmpro_lesson, pmpro_series
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-right:0;padding-left:0">
	<!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10","left":"0"},"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10"}},"typography":{"textTransform":"capitalize"}}} -->
	<h2 class="wp-block-heading alignwide" style="margin-bottom:var(--wp--preset--spacing--10);margin-left:0;padding-right:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10);text-transform:capitalize">Featured news</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"2px","left":"2px"},"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0">
		<!-- wp:column {"layout":{"type":"constrained"}} -->
		<div class="wp-block-column">
			<!-- wp:query {"queryId":7,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
			<div class="wp-block-query">
				<!-- wp:post-template -->
				<!-- wp:cover {"useFeaturedImage":true,"dimRatio":80,"overlayColor":"site-navigation-link","isUserOverlayColor":true,"style":{"dimensions":{"aspectRatio":"3/2"},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-cover" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><span aria-hidden="true" class="wp-block-cover__background has-site-navigation-link-background-color has-background-dim-80 has-background-dim"></span>
					<div class="wp-block-cover__inner-container">
						<!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background"} /-->
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
						<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--10)">
							<!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->
							<!-- wp:post-date /-->
						</div>
						<!-- /wp:group -->
					</div>
				</div>
				<!-- /wp:cover -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-column">
			<!-- wp:query {"queryId":12,"query":{"perPage":4,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
			<div class="wp-block-query alignwide">
				<!-- wp:post-template {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"grid","columnCount":2}} -->
				<!-- wp:cover {"useFeaturedImage":true,"dimRatio":80,"overlayColor":"site-navigation-link","isUserOverlayColor":true,"style":{"dimensions":{"aspectRatio":"3/2"},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-cover" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><span aria-hidden="true" class="wp-block-cover__background has-site-navigation-link-background-color has-background-dim-80 has-background-dim"></span>
					<div class="wp-block-cover__inner-container">
						<!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","fontSize":"21"} /-->
					</div>
				</div>
				<!-- /wp:cover -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->