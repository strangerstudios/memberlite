<?php
/**
 * Memberlite Pattern: Category Feature Boxes
 *
 * @since TBD
 */

return [
	'title'       => __( 'Category Feature Boxes', 'memberlite' ),
	'description' => __( 'Three content categories with icons, descriptions, and links to help visitors navigate your blog or news sections.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-content', 'memberlite' ) ],
	'keywords'    => [
		__( 'blog', 'memberlite' ),
		__( 'categories', 'memberlite' ),
		__( 'news', 'memberlite' ),
		__( 'navigation', 'memberlite' ),
		__( 'content', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">' . __( 'Explore Our Content', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"stretch","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"36"} -->
			<p class="has-color-secondary-color has-text-color has-36-font-size">[fa icon="newspaper" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">' . __( 'Industry News', 'memberlite' ) . '</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>' . __( 'The latest developments, trends, and analysis affecting our industry and members.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"color-primary"} -->
			<p class="has-color-primary-color has-text-color"><a href="#">' . __( 'Read Industry News &rarr;', 'memberlite' ) . '</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"36"} -->
			<p class="has-color-secondary-color has-text-color has-36-font-size">[fa icon="lightbulb" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">' . __( 'Tips &amp; Guides', 'memberlite' ) . '</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>' . __( 'Practical advice, how-to guides, and best practices to help you succeed in your work.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"color-primary"} -->
			<p class="has-color-primary-color has-text-color"><a href="#">' . __( 'Browse Guides &rarr;', 'memberlite' ) . '</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"36"} -->
			<p class="has-color-secondary-color has-text-color has-36-font-size">[fa icon="user-pen" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading">' . __( 'Member Stories', 'memberlite' ) . '</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>' . __( 'Real stories from real members sharing their experiences, wins, and lessons learned.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"color-primary"} -->
			<p class="has-color-primary-color has-text-color"><a href="#">' . __( 'Read Stories &rarr;', 'memberlite' ) . '</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
