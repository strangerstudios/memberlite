<?php
/**
 * Memberlite Pattern: Content Upgrade 1
 *
 * @since TBD
 */

return [
	'title'       => __( 'Content Upgrade 1', 'memberlite' ),
	'description' => __( 'Simple text "content upgrade" call to action to build your email list or promote offers.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'content upgrade', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'lead magnet', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"width":"1px","radius":"8px"}},"backgroundColor":"white","borderColor":"borders","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-radius:8px;margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"width":"70%","style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-column" style="flex-basis:70%">
				<!-- wp:paragraph {"fontSize":"large"} -->
				<p class="has-large-font-size"><strong>' . __( 'Get started for free.', 'memberlite' ) . '</strong></p>
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
	<!-- /wp:group -->
</div>
<!-- /wp:group -->',
];
