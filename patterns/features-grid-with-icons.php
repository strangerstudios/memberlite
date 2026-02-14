<?php
/**
 * Memberlite Pattern: Features Grid With Icons
 *
 * @since TBD
 */

return [
	'title'       => __( 'Features Grid With Icons', 'memberlite' ),
	'description' => __( 'A four-feature grid with icons and a pair of call-to-action buttons.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-about', 'memberlite' ) ],
	'keywords'    => [
		__( 'features', 'memberlite' ),
		__( 'grid', 'memberlite' ),
		__( 'icons', 'memberlite' ),
		__( 'membership', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">' . __( 'What You Get as a Member', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"},"width":"1px"}},"backgroundColor":"white","borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:50%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"textColor":"color-secondary"} -->
				<p class="has-color-secondary-color has-text-color">[fa icon="wand-magic-sparkles" size="2x"]</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">' . __( 'Practical Resources', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
			<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-blue"} -->
			<hr class="wp-block-separator has-text-color has-border-blue-color has-alpha-channel-opacity has-border-blue-background-color has-background is-style-wide"/>
			<!-- /wp:separator -->
			<!-- wp:paragraph -->
			<p>' . __( 'Downloadable guides, templates, and step-by-step lessons you can use right away—updated regularly.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"},"width":"1px"}},"backgroundColor":"white","borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:50%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"textColor":"color-secondary"} -->
				<p class="has-color-secondary-color has-text-color">[fa icon="life-ring" size="2x"]</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">' . __( 'Real Support', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
			<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-blue"} -->
			<hr class="wp-block-separator has-text-color has-border-blue-color has-alpha-channel-opacity has-border-blue-background-color has-background is-style-wide"/>
			<!-- /wp:separator -->
			<!-- wp:paragraph -->
			<p>' . __( 'Get answers when you need them—through member Q&amp;A, feedback, and guidance from people who understand your goals.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"},"width":"1px"}},"backgroundColor":"white","borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:50%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"textColor":"color-secondary"} -->
				<p class="has-color-secondary-color has-text-color">[fa icon="bolt" size="2x"]</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">' . __( 'Member-Only Experiences', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
			<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-blue"} -->
			<hr class="wp-block-separator has-text-color has-border-blue-color has-alpha-channel-opacity has-border-blue-background-color has-background is-style-wide"/>
			<!-- /wp:separator -->
			<!-- wp:paragraph -->
			<p>' . __( 'Workshops, live sessions, and behind-the-scenes updates that help you stay consistent and make progress.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"},"width":"1px"}},"backgroundColor":"white","borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:50%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"textColor":"color-secondary"} -->
				<p class="has-color-secondary-color has-text-color">[fa icon="lock-open" size="2x"]</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">' . __( 'Flexible Access', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
			<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-blue"} -->
			<hr class="wp-block-separator has-text-color has-border-blue-color has-alpha-channel-opacity has-border-blue-background-color has-background is-style-wide"/>
			<!-- /wp:separator -->
			<!-- wp:paragraph -->
			<p>' . __( 'Choose the membership level that fits your needs. Upgrade, downgrade, or cancel anytime—no long-term commitment required.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">' . __( 'Join Now', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">' . __( 'View Membership Levels', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
];
