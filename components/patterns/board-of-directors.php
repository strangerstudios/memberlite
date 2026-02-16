<?php
/**
 * Memberlite Pattern: Board of Directors
 *
 * @since TBD
 */

return [
	'title'       => __( 'Board of Directors', 'memberlite' ),
	'description' => __( 'A grid of organizational leaders with photos, names, and titles for associations and nonprofits.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-team', 'memberlite' ) ],
	'keywords'    => [
		__( 'board', 'memberlite' ),
		__( 'directors', 'memberlite' ),
		__( 'leadership', 'memberlite' ),
		__( 'association', 'memberlite' ),
		__( 'nonprofit', 'memberlite' ),
		__( 'team', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"metadata":{"categories":["memberlite-team"],"patternName":"memberlite/board-of-directors","name":"Board of Directors"},"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center"} -->
			<h2 class="wp-block-heading has-text-align-center">' . __( 'Board of Directors', 'memberlite' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Meet the dedicated leaders guiding our organization\'s mission and strategic vision.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-column">
				<!-- wp:image {"width":"150px","aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
				<figure class="wp-block-image aligncenter is-resized has-custom-border is-style-rounded" style="margin-bottom:var(--wp--preset--spacing--10)"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/foto-sushi-ExVlW9b648Q-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a man in a red top with arms crossed.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:150px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center">' . __( 'Marcus Thompson', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"color-secondary"} -->
				<p class="has-text-align-center has-color-secondary-color has-text-color">' . __( 'Board Chair', 'memberlite' ) . '</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-column">
				<!-- wp:image {"width":"150px","aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
				<figure class="wp-block-image aligncenter is-resized has-custom-border is-style-rounded" style="margin-bottom:var(--wp--preset--spacing--10)"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/christina-wocintechchat-com-SJvDxw0azqw-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a professional woman.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:150px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center">' . __( 'Aisha Patel', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"color-secondary"} -->
				<p class="has-text-align-center has-color-secondary-color has-text-color">' . __( 'Vice Chair', 'memberlite' ) . '</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-column">
				<!-- wp:image {"width":"150px","aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
				<figure class="wp-block-image aligncenter is-resized has-custom-border is-style-rounded" style="margin-bottom:var(--wp--preset--spacing--10)"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/james-balensiefen-snFilgm4_RU-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a man with light eyes in a cap.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:150px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center">' . __( 'James Whitfield', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"color-secondary"} -->
				<p class="has-text-align-center has-color-secondary-color has-text-color">' . __( 'Secretary', 'memberlite' ) . '</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-column">
				<!-- wp:image {"width":"150px","aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
				<figure class="wp-block-image aligncenter is-resized has-custom-border is-style-rounded" style="margin-bottom:var(--wp--preset--spacing--10)"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/michael-dam-mEZ3PoFGs_k-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a woman with red lipstick and a red crop neck top.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:150px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center">' . __( 'Elena Rodriguez', 'memberlite' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"color-secondary"} -->
				<p class="has-text-align-center has-color-secondary-color has-text-color">' . __( 'Treasurer', 'memberlite' ) . '</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->',
];
