<?php
/**
 * Memberlite Pattern: Homepage Hero
 *
 * @since TBD
 */

return [
	'title'       => __( 'Homepage Hero', 'memberlite' ),
	'description' => __( 'Greet website visitors with a compelling message and primary call to action.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-hero', 'memberlite' ), __( 'memberlite-featured', 'memberlite' ) ],
	'keywords'    => [
		__( 'hero', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'homepage', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"60px","bottom":"60px","left":"0px","right":"0px"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"60px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:0px;padding-bottom:60px;padding-left:0px">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"30px"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontSize":"54px"},"color":{"text":"#000000"},"elements":{"link":{"color":{"text":"#000000"}}}}} -->
			<h1 class="wp-block-heading has-text-color has-link-color" style="color:#000000;font-size:54px;font-style:normal">' . __( 'Your Expertise Deserves a Membership Site', 'memberlite' ) . '</h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"21px"},"elements":{"link":{"color":{"text":"#000000"}}},"color":{"text":"#000000"}}} -->
			<p class="has-text-color has-link-color" style="color:#000000;font-size:21px">' . __( 'Build recurring revenue by turning your knowledge into a thriving membership community. Get access to exclusive content, connect with like-minded members, and grow at your own pace.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"color-primary"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button">' . __( 'View Membership Levels', 'memberlite' ) . '</a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:embed {"url":"https://vimeo.com/894991881","type":"video","providerNameSlug":"vimeo","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
			<figure class="wp-block-embed is-type-video is-provider-vimeo wp-block-embed-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">https://vimeo.com/894991881</div></figure>
			<!-- /wp:embed -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
