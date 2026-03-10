<?php
/**
 * Title: Homepage Hero
 * Slug: memberlite/homepage-hero
 * Description: Greet website visitors with a compelling message and primary call to action.
 * Categories: memberlite-about
 * Keywords: hero, call to action, cta, homepage
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":1,"fontSize":"54"} -->
			<h1 class="wp-block-heading has-54-font-size">Your Expertise Deserves a Membership Site</h1>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"21"} -->
			<p class="has-21-font-size">Build recurring revenue by turning your knowledge into a thriving membership community. Get access to exclusive content, connect with like-minded members, and grow at your own pace.</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button">Get Started Now</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/linkedin-sales-solutions-NpyF7rjqmq4-unsplash-md.jpg" alt="A group of professionals collaborating together at a table."/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
