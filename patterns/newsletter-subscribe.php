<?php
/**
 * Title: Newsletter Subscribe
 * Slug: memberlite/newsletter-subscribe
 * Description: A call-to-action section encouraging visitors to subscribe to your paid newsletter.
 * Categories: memberlite-cta
 * Keywords: newsletter, subscribe, email, paid newsletter, call to action
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"backgroundColor":"color-primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-color-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns are-vertically-aligned-center alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"65%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:paragraph {"fontSize":"36"} -->
			<p class="has-36-font-size">[fa icon="envelope-open-text" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"fontSize":"36"} -->
			<h2 class="wp-block-heading has-36-font-size">Get the Weekly Insider Newsletter</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"18"} -->
			<p class="has-18-font-size">Every week, we deliver actionable insights, curated links, and exclusive analysis straight to your inbox. Join thousands of professionals who start their week with us.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"35%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-group">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph -->
					<p>[fa icon="check"]</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"fontSize":"16"} -->
					<p class="has-16-font-size">Exclusive member-only content</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph -->
					<p>[fa icon="check"]</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"fontSize":"16"} -->
					<p class="has-16-font-size">Early access to new features</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph -->
					<p>[fa icon="check"]</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"fontSize":"16"} -->
					<p class="has-16-font-size">Cancel anytime, no commitment</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"width":100,"className":"is-style-outline"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">Subscribe Now</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->