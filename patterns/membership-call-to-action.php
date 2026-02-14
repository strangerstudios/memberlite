<?php
/**
 * Memberlite Pattern: Membership Call To Action
 *
 * @since TBD
 */

return [
	'title'       => __( 'Membership Call To Action', 'memberlite' ),
	'description' => __( 'Promote your membership levels to increase signups.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'join', 'memberlite' ),
		__( 'subscribe', 'memberlite' ),
		__( 'membership', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","fontSize":"42"} -->
	<h2 class="wp-block-heading has-text-align-center has-42-font-size">' . __( 'Start Your Membership Today', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","fontSize":"21"} -->
	<p class="has-text-align-center has-21-font-size">' . __( 'Get instant access to exclusive content, resources, and a community of members who share your goals.', 'memberlite' ) . ' <a href="#">' . __( 'Compare membership levels', 'memberlite' ) . '</a> ' . __( 'to find the right fit.', 'memberlite' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">' . __( 'Join Now', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">' . __( 'Compare Plans', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
];
