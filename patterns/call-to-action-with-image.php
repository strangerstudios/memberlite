<?php
/**
 * Memberlite Pattern: Call To Action With Image
 *
 * @since TBD
 */

return [
	'title'       => __( 'Call To Action With Image', 'memberlite' ),
	'description' => __( 'Encourage a specific call to action', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ), __( 'memberlite-featured', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'content upgrade', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'lead magnet', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","className":"is-style-pmpro-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"30px"}},"backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-pmpro-card has-base-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
			<!-- wp:image -->
			<figure class="wp-block-image">
				<img/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">
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
