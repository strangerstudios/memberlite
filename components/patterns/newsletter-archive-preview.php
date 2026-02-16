<?php
/**
 * Memberlite Pattern: Newsletter Archive Preview
 *
 * @since TBD
 */

return [
	'title'       => __( 'Newsletter Archive Preview', 'memberlite' ),
	'description' => __( 'Display recent newsletter issues using a query loop with a list layout, lock icon, and subscribe CTA.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-content', 'memberlite' ) ],
	'keywords'    => [
		__( 'newsletter', 'memberlite' ),
		__( 'archive', 'memberlite' ),
		__( 'issues', 'memberlite' ),
		__( 'paid newsletter', 'memberlite' ),
		__( 'query loop', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">' . __( 'Recent Issues', 'memberlite' ) . '</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"16"} -->
		<p class="has-color-secondary-color has-text-color has-16-font-size">[fa icon="lock"] ' . __( 'Members-only content', 'memberlite' ) . '</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:query {"queryId":2,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
				<!-- wp:post-title {"isLink":true,"fontSize":"18"} /-->
				<!-- wp:post-date {"textColor":"meta-link","fontSize":"14"} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">' . __( 'Subscribe to Unlock All Issues', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
];
