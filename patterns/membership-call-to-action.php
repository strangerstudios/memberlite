<?php
/**
 * Memberlite Pattern: Membership Call To Action
 *
 * @since TBD
 */

return [
	'title'       => __( 'Membership Call To Action', 'memberlite' ),
	'description' => __( 'Promote your membership levels to increase signups.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ), __( 'memberlite-featured', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'join', 'memberlite' ),
		__( 'subscribe', 'memberlite' ),
		__( 'membership', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","className":"is-style-pmpro-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-pmpro-card" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">' . __( 'Start Your Membership Today', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . __( 'Get instant access to exclusive content, resources, and a community of members who share your goals.', 'memberlite' ) . ' <a href="#">' . __( 'Compare membership levels', 'memberlite' ) . '</a> ' . __( 'to find the right fit.', 'memberlite' ) . '</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">' . __( 'Join Now', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
];
