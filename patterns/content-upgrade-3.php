<?php
/**
 * Memberlite Pattern: Content Upgrade 3
 *
 * @since TBD
 */

return [
	'title'       => __( 'Content Upgrade 3', 'memberlite' ),
	'description' => __( 'Icon and image "content upgrade" call to action to build your email list or promote offers.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ), __( 'memberlite-featured', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'content upgrade', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'lead magnet', 'memberlite' ),
	],
	'content' => '<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|10"},"border":{"radius":"12px"}},"backgroundColor":"color-primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-pmpro-card has-base-color has-color-primary-background-color has-text-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"fontSize":"36"} -->
		<p class="has-36-font-size">[fa icon="group-arrows-rotate"]</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading">Ready to Join Our Community?</h3>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	<!-- wp:paragraph -->
	<p>' . __( 'Take the next step and become a member today. Get instant access to exclusive content, resources, and a community of people just like you who are building something meaningful.', 'memberlite' ) . '</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">' . __( 'Become a Member', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
];
