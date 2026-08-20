<?php
/**
 * Title: Blog Grid with Sidebar
 * Slug: memberlite/blog-grid-with-sidebar
 * Description: A 2x2 grid of recent posts with featured images, titles, and excerpts alongside a sidebar with a newsletter signup, social links, and a search bar.
 * Categories: memberlite-query-loops
 * Keywords: blog, posts, search, query loop, recent posts, news, newsletter, social, sidebar, courses, series, lessons, premium_content, pmpro_course, pmpro_lesson, pmpro_series
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading {"align":"wide","className":"is-style-heading-rule","style":{"typography":{"textTransform":"capitalize"}},"fontSize":"36"} -->
	<h2 class="wp-block-heading alignwide is-style-heading-rule has-36-font-size" style="text-transform:capitalize">The blog</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%">
			<!-- wp:query {"queryId":39,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"layout":{"type":"constrained"}} -->
			<div class="wp-block-query">
				<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":2}} -->
				<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"inherit":false}} -->
				<div class="wp-block-group" style="padding-right:0;padding-left:0">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","sizeSlug":"medium","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}}} /-->
					<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"8px","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link","fontSize":"24"} /-->
					<!-- wp:post-excerpt {"excerptLength":28,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} /-->
				</div>
				<!-- /wp:group -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"33.33%","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"borders"} -->
		<div class="wp-block-column has-borders-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:33.33%">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"typography":{"textAlign":"center","textTransform":"capitalize"}}} -->
					<h3 class="wp-block-heading has-text-align-center" style="text-transform:capitalize">Get the weekly insider newsletter</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"18"} -->
					<p class="has-text-align-center has-18-font-size" style="margin-top:var(--wp--preset--spacing--10)">Every week, we deliver actionable insights, curated links, and exclusive analysis straight to your inbox. Join thousands of professionals who start their week with us.</p>
					<!-- /wp:paragraph -->
					<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"width":75,"style":{"typography":{"textTransform":"capitalize"}}} -->
						<div class="wp-block-button has-custom-width wp-block-button__width-75"><a class="wp-block-button__link wp-element-button" href="#" style="text-transform:capitalize">Subscribe now</a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
				<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"site-navigation-link"} -->
				<hr class="wp-block-separator has-text-color has-site-navigation-link-color has-alpha-channel-opacity has-site-navigation-link-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"/>
				<!-- /wp:separator -->
				<!-- wp:heading {"level":3,"style":{"typography":{"textAlign":"center","textTransform":"capitalize"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="text-transform:capitalize">Follow us</h3>
				<!-- /wp:heading -->
				<!-- wp:social-links {"iconColor":"base","iconColorValue":"#1f1b18","iconBackgroundColor":"buttons","iconBackgroundColorValue":"#ffa951","className":"is-style-default","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"},"margin":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default" style="margin-top:var(--wp--preset--spacing--10)">
					<!-- wp:social-link {"url":"#","service":"facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"x"} /-->
					<!-- wp:social-link {"url":"#","service":"tiktok"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram"} /-->
				</ul>
				<!-- /wp:social-links -->
				<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"site-navigation-link"} -->
				<hr class="wp-block-separator has-text-color has-site-navigation-link-color has-alpha-channel-opacity has-site-navigation-link-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"/>
				<!-- /wp:separator -->
				<!-- wp:heading {"level":3,"style":{"typography":{"textAlign":"center","textTransform":"capitalize"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="text-transform:capitalize">Search the blog</h3>
				<!-- /wp:heading -->
				<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"align":"center","className":"is-style-icon-round","style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"borderColor":"buttons"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->