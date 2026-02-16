<?php
/**
 * Memberlite Pattern: Podcast Subscribe Banner
 *
 * @since TBD
 */

return [
	'title'       => __( 'Podcast Subscribe Banner', 'memberlite' ),
	'description' => __( 'A full-width banner promoting your podcast with show details and subscribe links to popular platforms.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-media', 'memberlite' ) ],
	'keywords'    => [
		__( 'podcast', 'memberlite' ),
		__( 'subscribe', 'memberlite' ),
		__( 'banner', 'memberlite' ),
		__( 'audio', 'memberlite' ),
		__( 'show', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"backgroundColor":"color-primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-color-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns are-vertically-aligned-center alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"15%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:15%">
			<!-- wp:paragraph {"align":"center","fontSize":"54"} -->
			<p class="has-text-align-center has-54-font-size">[fa icon="podcast" size="2x"]</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:heading {"fontSize":"30"} -->
			<h2 class="wp-block-heading has-30-font-size">' . __( 'The Membership Insider Podcast', 'memberlite' ) . '</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>' . __( 'Weekly conversations with membership site founders, community builders, and industry experts. New episodes every Tuesday.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"35%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:paragraph {"fontSize":"14"} -->
			<p class="has-14-font-size"><strong>' . __( 'Listen on:', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
				<div class="wp-block-button has-custom-font-size has-14-font-size is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">[fa icon="apple" type="brand"] ' . __( 'Apple Podcasts', 'memberlite' ) . '</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
				<div class="wp-block-button has-custom-font-size has-14-font-size is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">[fa icon="spotify" type="brand"] ' . __( 'Spotify', 'memberlite' ) . '</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
				<div class="wp-block-button has-custom-font-size has-14-font-size is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">[fa icon="rss"] ' . __( 'RSS Feed', 'memberlite' ) . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
