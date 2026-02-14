<?php
/**
 * Memberlite Pattern: Featured Box With Photo Grid
 *
 * @since TBD
 */

return [
	'title'       => __( 'Featured Box With Photo Grid', 'memberlite' ),
	'description' => __( 'Highlight some people using this website.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-about', 'memberlite' ) ],
	'keywords'    => [
		__( 'members', 'memberlite' ),
		__( 'community', 'memberlite' ),
		__( 'instructors', 'memberlite' ),
		__( 'team', 'memberlite' ),
		__( 'users', 'memberlite' ),
		__( 'people', 'memberlite' ),
		__( 'testimonials', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"metadata":{"categories":["memberlite-about"],"patternName":"memberlite/featured-box-with-photo-grid","name":"Featured Box With Photo Grid"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"color-primary","textColor":"white","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide has-white-color has-color-primary-background-color has-text-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":3,"fontSize":"30"} -->
			<h3 class="wp-block-heading has-30-font-size">' . __( 'Join Our Member Community', 'memberlite' ) . '</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>' . __( 'Connect with members who share your goals. Get support, share wins, and grow together at your own pace.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">' . __( 'Learn More About Membership', 'memberlite' ) . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
			<div class="wp-block-columns">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/christina-wocintechchat-com-lFntEHwQvi4-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a smiling woman with long braided hair and arms crossed in front of her.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/dylan-ferreira-jIM8kVsFKlM-unsplash-sm.jpg" alt="' . esc_attr__( 'Close up photo of a smiling man with dark hair on a blue.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/edward-cisneros-_H6wpor9mjs-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a blond woman with glowing sunlight behind her head wearing a black v-neck top.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/foto-sushi-ExVlW9b648Q-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a smiling man with arms crossed in front of him wearing a red top in front of a blank grey backdrop.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
			<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
			<div class="wp-block-columns">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/james-balensiefen-snFilgm4_RU-unsplash-sm.jpg" alt="' . esc_attr__( 'Side profile photo of a man with light blue eyes and wearing a white cap.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/michael-dam-mEZ3PoFGs_k-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a woman with red lipstick and a red crop neck top with long brown hair and a large smile.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/samuel-raita-RiDxDgHg7pw-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a man with thick black glasses and blond hair smiling and looking to the right.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a smiling woman with short black curly hair and a white peasant style top standing in a clothing store.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->',
];
