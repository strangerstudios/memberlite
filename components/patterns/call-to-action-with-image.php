<?php
/**
 * Memberlite Pattern: Call To Action With Image
 *
 * @since TBD
 */

return [
	'title'       => __( 'Call To Action With Image', 'memberlite' ),
	'description' => __( 'Encourage a specific call to action', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'content upgrade', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'lead magnet', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/landscapes/oliver-spicer-NmPNw8w_a24-unsplash-md.jpg" alt="' . esc_attr__( 'Looking out from a wooden dock to water with trees and setting sun in the distance.', 'memberlite' ) . '" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"65%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:heading -->
			<h2 class="wp-block-heading">' . __( 'Join a Community Built for Your Success', 'memberlite' ) . '</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>' . __( 'Get access to exclusive resources, connect with members who share your goals, and grow at your own pace. Our membership is designed for people like you who want to build something real without breaking the bank.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary","className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button"><strong>' . __( 'New Members Welcome', 'memberlite' ) . '</strong>: ' . __( 'Apply Here', 'memberlite' ) . '</a></div>
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
