<?php
/**
 * Memberlite Pattern: Meet the Team 1
 *
 * @since TBD
 */

return [
	'title'       => __( 'Meet the Team 1', 'memberlite' ),
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
	'content'     => '<!-- wp:group {"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-default has-white-background-color has-background" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"className":"alignwide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"30%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
			<!-- wp:heading {"textAlign":"right"} -->
			<h2 class="wp-block-heading has-text-align-right">' . __( 'Meet the Team', 'memberlite' ) . '</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"right"} -->
			<p class="has-text-align-right">' . __( 'The people behind the scenes who are here to support your membership journey.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"top","width":"70%","style":{"border":{"left":{"color":"var:preset|color|color-primary","width":"6px"},"top":[],"right":[],"bottom":[]},"spacing":{"padding":{"left":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="border-left-color:var(--wp--preset--color--color-primary);border-left-width:6px;padding-left:var(--wp--preset--spacing--30);flex-basis:70%">
			<!-- wp:columns -->
			<div class="wp-block-columns">
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
					<figure class="wp-block-image aligncenter has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/dylan-ferreira-jIM8kVsFKlM-unsplash-sm.jpg" alt="' . esc_attr__( 'Close up photo of a smiling man with dark hair on a blue backdrop.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
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
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
