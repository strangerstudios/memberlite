<?php
/**
 * Title: Content Upgrade 1
 * Slug: memberlite/content-upgrade-1
 * Description: Simple text "content upgrade" call to action to build your email list or promote offers.
 * Categories: memberlite-cta
 * Keywords: marketing, call to action, cta, content upgrade, promotion, lead magnet
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-card" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"width":"70%","style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-column" style="flex-basis:70%">
				<!-- wp:paragraph {"fontSize":"large"} -->
				<p class="has-large-font-size"><strong><?php esc_html_e( 'Get started for free.', 'memberlite' ); ?></strong></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Start with our free resources to see if this community is right for you. No commitment required.', 'memberlite' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"color-primary","width":100,"className":"is-style-fill"} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#"><?php esc_html_e( 'Get Free Access', 'memberlite' ); ?></a></div>
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
<!-- /wp:group -->
