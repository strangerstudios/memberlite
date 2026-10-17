<?php
/**
 * Title: Organization Stats
 * Slug: memberlite/organization-stats
 * Description: Highlight key metrics for your association or nonprofit with icons and large numbers.
 * Categories: memberlite-about
 * Keywords: stats, metrics, numbers, association, nonprofit, impact
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"borders","textColor":"site-navigation-link","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-site-navigation-link-color has-borders-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Our Impact by the Numbers', 'memberlite' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="users" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"42","fontFamily":"heading"} -->
			<p class="has-text-align-center has-heading-font-family has-42-font-size"><strong>12,500+</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php esc_html_e( 'Active Members', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="map-marker-alt" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"42","fontFamily":"heading"} -->
			<p class="has-text-align-center has-heading-font-family has-42-font-size"><strong>48</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php esc_html_e( 'Regional Chapters', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="calendar-check" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"42","fontFamily":"heading"} -->
			<p class="has-text-align-center has-heading-font-family has-42-font-size"><strong>200+</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php esc_html_e( 'Annual Events', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","fontSize":"24"} -->
			<p class="has-text-align-center has-24-font-size">[fa icon="handshake" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center","fontSize":"42","fontFamily":"heading"} -->
			<p class="has-text-align-center has-heading-font-family has-42-font-size"><strong>25</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php esc_html_e( 'Years of Service', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->