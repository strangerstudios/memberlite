<?php
/**
 * Memberlite Pattern: Organization Stats
 *
 * @since TBD
 */

return [
	'title'       => __( 'Organization Stats', 'memberlite' ),
	'description' => __( 'Highlight key metrics for your association or nonprofit with icons and large numbers.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-about', 'memberlite' ) ],
	'keywords'    => [
		__( 'stats', 'memberlite' ),
		__( 'metrics', 'memberlite' ),
		__( 'numbers', 'memberlite' ),
		__( 'association', 'memberlite' ),
		__( 'nonprofit', 'memberlite' ),
		__( 'impact', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"color-primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-color-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">' . __( 'Our Impact by the Numbers', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="users" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:custom|heading|font-family"}},"fontSize":"42"} -->
			<p class="has-text-align-center has-42-font-size" style="font-family:var(--wp--custom--heading--font-family)"><strong>' . __( '12,500+', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Active Members', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="map-marker-alt" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:custom|heading|font-family"}},"fontSize":"42"} -->
			<p class="has-text-align-center has-42-font-size" style="font-family:var(--wp--custom--heading--font-family)"><strong>' . __( '48', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Regional Chapters', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="calendar-check" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:custom|heading|font-family"}},"fontSize":"42"} -->
			<p class="has-text-align-center has-42-font-size" style="font-family:var(--wp--custom--heading--font-family)"><strong>' . __( '200+', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Annual Events', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="handshake" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:custom|heading|font-family"}},"fontSize":"42"} -->
			<p class="has-text-align-center has-42-font-size" style="font-family:var(--wp--custom--heading--font-family)"><strong>' . __( '25', 'memberlite' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Years of Service', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
