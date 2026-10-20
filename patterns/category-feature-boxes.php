<?php
/**
 * Title: Category Feature Boxes
 * Slug: memberlite/category-feature-boxes
 * Description: Three content categories with icons, descriptions, and links to help visitors navigate your blog or news sections.
 * Categories: memberlite-content, memberlite-features
 * Keywords: blog, categories, news, navigation, content, premium_content
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Explore Our Content', 'memberlite' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"stretch","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}}} -->
		<div class="wp-block-column is-style-card is-vertically-aligned-stretch" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"fontSize":"36"} -->
			<p class="has-36-font-size">[fa icon="newspaper" size="2x" color="action"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php esc_html_e( 'Industry News', 'memberlite' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'The latest developments, trends, and analysis affecting our industry and members.', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"color-primary"} -->
			<p class="has-color-primary-color has-text-color"><a href="#"><?php esc_html_e( 'Read Industry News →', 'memberlite' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}}} -->
		<div class="wp-block-column is-style-card is-vertically-aligned-stretch" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"fontSize":"36"} -->
			<p class="has-36-font-size">[fa icon="lightbulb" size="2x" color="action"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php esc_html_e( 'Tips & Guides', 'memberlite' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Practical advice, how-to guides, and best practices to help you succeed in your work.', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"color-primary"} -->
			<p class="has-color-primary-color has-text-color"><a href="#"><?php esc_html_e( 'Browse Guides →', 'memberlite' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}}} -->
		<div class="wp-block-column is-style-card is-vertically-aligned-stretch" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"fontSize":"36"} -->
			<p class="has-36-font-size">[fa icon="user-pen" size="2x" color="action"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php esc_html_e( 'Member Stories', 'memberlite' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Real stories from real members sharing their experiences, wins, and lessons learned.', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"color-primary"} -->
			<p class="has-color-primary-color has-text-color"><a href="#"><?php esc_html_e( 'Read Stories →', 'memberlite' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
