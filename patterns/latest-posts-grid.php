<?php
/**
 * Title: Latest Posts Grid
 * Slug: memberlite/latest-posts-grid
 * Description: Display your latest blog posts in a three-column grid with featured images, titles, dates, and excerpts.
 * Categories: memberlite-content
 * Keywords: blog, posts, news, articles, query loop, grid
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">Latest Articles</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
	<p class="has-text-align-center has-18-font-size">Stay up to date with the latest news, insights, and stories from our community.</p>
	<!-- /wp:paragraph -->
	<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"},"border":{"width":"1px","radius":"8px"},"dimensions":{"minHeight":"100%"}},"borderColor":"borders","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;min-height:100%">
				<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"0px","bottomRight":"0px"}}}} /-->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
					<!-- wp:post-title {"isLink":true,"fontSize":"21"} /-->
					<!-- wp:post-date {"textColor":"meta-link","fontSize":"14"} /-->
					<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":20} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">View All Articles</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->