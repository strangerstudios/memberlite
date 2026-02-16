<?php
/**
 * Memberlite Pattern: Community Stats Banner
 *
 * @since TBD
 */

return [
	'title'       => __( 'Community Stats Banner', 'memberlite' ),
	'description' => __( 'A full-width banner showcasing community engagement metrics with icons.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-community', 'memberlite' ) ],
	'keywords'    => [
		__( 'community', 'memberlite' ),
		__( 'stats', 'memberlite' ),
		__( 'metrics', 'memberlite' ),
		__( 'social proof', 'memberlite' ),
		__( 'engagement', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"top":{"color":"var:preset|color|borders","width":"1px"},"bottom":{"color":"var:preset|color|borders","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--borders);border-top-width:1px;border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns are-vertically-aligned-center alignwide">
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"center","textColor":"color-primary","fontSize":"36"} -->
			<p class="has-text-align-center has-color-primary-color has-text-color has-36-font-size">[fa icon="user-group"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"36"} -->
			<p class="has-text-align-center has-36-font-size"><strong>' . __( '5,000+', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","textColor":"meta-link","fontSize":"14"} -->
			<p class="has-text-align-center has-meta-link-color has-text-color has-14-font-size">' . __( 'Community Members', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"center","textColor":"color-primary","fontSize":"36"} -->
			<p class="has-text-align-center has-color-primary-color has-text-color has-36-font-size">[fa icon="comments"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"36"} -->
			<p class="has-text-align-center has-36-font-size"><strong>' . __( '32,000+', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","textColor":"meta-link","fontSize":"14"} -->
			<p class="has-text-align-center has-meta-link-color has-text-color has-14-font-size">' . __( 'Discussions', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"center","textColor":"color-primary","fontSize":"36"} -->
			<p class="has-text-align-center has-color-primary-color has-text-color has-36-font-size">[fa icon="video"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"36"} -->
			<p class="has-text-align-center has-36-font-size"><strong>' . __( '150+', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","textColor":"meta-link","fontSize":"14"} -->
			<p class="has-text-align-center has-meta-link-color has-text-color has-14-font-size">' . __( 'Live Events Hosted', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"align":"center","textColor":"color-primary","fontSize":"36"} -->
			<p class="has-text-align-center has-color-primary-color has-text-color has-36-font-size">[fa icon="file-lines"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"36"} -->
			<p class="has-text-align-center has-36-font-size"><strong>' . __( '500+', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","textColor":"meta-link","fontSize":"14"} -->
			<p class="has-text-align-center has-meta-link-color has-text-color has-14-font-size">' . __( 'Shared Resources', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
