<?php
/**
 * Title: Latest Podcast Episodes
 * Slug: memberlite/latest-podcast-episodes
 * Description: A centered heading introduces a three-column grid of the latest podcast episodes, each in a bordered card with featured image, date, and title.
 * Categories: memberlite-media, memberlite-query-loops
 * Keywords: podcast, episodes, audio, listen, query loop, grid
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"style":{"typography":{"textAlign":"center","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"16","fontFamily":"heading"} -->
	<p class="has-text-align-center has-color-action-color has-text-color has-link-color has-heading-font-family has-16-font-size" style="text-transform:capitalize"><strong>Start listening today</strong></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"style":{"typography":{"textAlign":"center","textTransform":"capitalize"},"spacing":{"margin":{"top":"0"}}}} -->
	<h2 class="wp-block-heading has-text-align-center" style="margin-top:0;text-transform:capitalize">Latest podcast episodes</h2>
	<!-- /wp:heading -->
	<!-- wp:query {"queryId":6,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"metadata":{"categories":["posts"],"name":"Grid"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders","layout":{"inherit":false}} -->
		<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);border-radius:8px">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","sizeSlug":"thumbnail"} /-->
			<!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"14"} /-->
			<!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-title-podcast","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link","fontSize":"18"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->