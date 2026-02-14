<?php
/**
 * Memberlite Pattern: Homepage Hero
 *
 * @since TBD
 */

return [
	'title'       => __( 'Homepage Hero', 'memberlite' ),
	'description' => __( 'Greet website visitors with a compelling message and primary call to action.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-about', 'memberlite' ) ],
	'keywords'    => [
		__( 'hero', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'homepage', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"0px","right":"0px"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--60);padding-right:0px;padding-bottom:var(--wp--preset--spacing--60);padding-left:0px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":1,"fontSize":"54"} -->
			<h1 class="wp-block-heading has-54-font-size">' . __( 'Your Expertise Deserves a Membership Site', 'memberlite' ) . '</h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"21"} -->
			<p class="has-21-font-size">' . __( 'Build recurring revenue by turning your knowledge into a thriving membership community. Get access to exclusive content, connect with like-minded members, and grow at your own pace.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button">' . __( 'Get Started Now', 'memberlite' ) . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/experts/linkedin-sales-solutions-NpyF7rjqmq4-unsplash-md.jpg" alt="' . esc_attr__( 'A group of professionals collaborating together at a table.', 'memberlite' ) . '"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
