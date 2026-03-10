<?php
/**
 * Title: Call To Action With Image
 * Slug: memberlite/call-to-action-with-image
 * Description: Encourage a specific call to action
 * Categories: memberlite-cta
 * Keywords: marketing, call to action, cta, content upgrade, promotion, lead magnet
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/oliver-spicer-NmPNw8w_a24-unsplash-md.jpg" alt="Looking out from a wooden dock to water with trees and setting sun in the distance." style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"65%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:heading -->
			<h2 class="wp-block-heading">Join a Community Built for Your Success</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Get access to exclusive resources, connect with members who share your goals, and grow at your own pace. Our membership is designed for people like you who want to build something real without breaking the bank.</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary","className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button"><strong>New Members Welcome</strong>: Apply Here</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
