<?php
/**
 * Memberlite Pattern: Content Upgrade 1
 *
 * @since TBD
 */

return [
	'title'       => __( 'Content Upgrade 1', 'memberlite' ),
	'description' => __( 'Simple text "content upgrade" call to action to build your email list or promote offers.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ), __( 'memberlite-featured', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'content upgrade', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'lead magnet', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","className":"is-style-pmpro-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull is-style-pmpro-card has-base-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"70%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:70%">
			<!-- wp:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size"><strong>' . __( 'See What Membership Has to Offer', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p>' . __( 'Start with our free resources to see if this community is right for you. No commitment required.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary","width":100,"className":"is-style-fill"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button">' . __( 'Get Free Access', 'memberlite' ) . '</a></div>
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
