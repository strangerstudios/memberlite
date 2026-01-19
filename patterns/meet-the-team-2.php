<?php
/**
 * Memberlite Pattern: Meet the Team 2
 *
 * @since TBD
 */

return [
	'title'       => __( 'Meet the Team 2', 'memberlite' ),
	'description' => __( 'Showcase the team with a compelling message and headshots.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-featured', 'memberlite' ), __( 'memberlite-team', 'memberlite' ) ],
	'keywords'    => [
		__( 'about', 'memberlite' ),
		__( 'bio', 'memberlite' ),
		__( 'instructor', 'memberlite' ),
		__( 'coach', 'memberlite' ),
		__( 'teacher', 'memberlite' ),
		__( 'expert', 'memberlite' ),
		__( 'team', 'memberlite' ),
		__( 'people', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-pmpro-card" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">' . __( 'Meet the Team', 'memberlite' ) . '</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">' . __( 'The people behind the scenes who are here to support your membership journey.', 'memberlite' ) . '</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/christina-wocintechchat-com-lFntEHwQvi4-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a smiling woman with long braided hair and arms crossed in front of her.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Emily Thompson', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/dylan-ferreira-jIM8kVsFKlM-unsplash-sm.jpg" alt="' . esc_attr__( 'Close up photo of a smiling man with dark hair on a blue.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Damien Delong', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/edward-cisneros-_H6wpor9mjs-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a blond woman with glowing sunlight behind her head wearing a black v-neck top.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Cathryn Michaels', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/foto-sushi-ExVlW9b648Q-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a smiling man with arms crossed in front of him wearing a red top in front of a blank grey backdrop.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Edwin Johnny', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/samuel-raita-RiDxDgHg7pw-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a man with thick black glasses and blond hair smiling and looking to the right.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Richard Anders', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a smiling woman with short black curly hair and a white peasant style top standing in a clothing store.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . __( 'Aria DeVaugn', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
