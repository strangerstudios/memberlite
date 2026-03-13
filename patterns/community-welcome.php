<?php
/**
 * Title: Community Welcome
 * Slug: memberlite/community-welcome
 * Description: A welcoming introduction to your community with expandable guidelines and expectations using details blocks.
 * Categories: memberlite-community
 * Keywords: community, welcome, guidelines, rules, onboarding, accordion
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"42"} -->
			<p class="has-color-secondary-color has-text-color has-42-font-size">[fa icon="people-group" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading -->
			<h2 class="wp-block-heading">Welcome to the Community</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"18"} -->
			<p class="has-18-font-size">We're glad you're here. This is a space for members to connect, share ideas, ask questions, and support each other. Review the guidelines below to get started.</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">Introduce Yourself</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"60%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"borderColor":"borders"} -->
			<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<summary>Be Respectful and Inclusive</summary>
				<!-- wp:paragraph -->
				<p>Treat every member with kindness and respect. We welcome diverse perspectives and ask that all discussions remain constructive and professional.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
			<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"borderColor":"borders"} -->
			<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<summary>Share Knowledge Freely</summary>
				<!-- wp:paragraph -->
				<p>This community thrives when members share their expertise. Don't hesitate to answer questions, offer feedback, or share resources that have helped you.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
			<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"borderColor":"borders"} -->
			<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<summary>Keep It On Topic</summary>
				<!-- wp:paragraph -->
				<p>Post in the appropriate channels and keep discussions relevant. Off-topic conversations can be taken to the general discussion area.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
			<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"borderColor":"borders"} -->
			<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<summary>No Self-Promotion or Spam</summary>
				<!-- wp:paragraph -->
				<p>Genuine recommendations are welcome, but please avoid unsolicited promotion of your own products or services. Repeated spam will result in removal.</p>
				<!-- /wp:paragraph -->
			</details>
			<!-- /wp:details -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
