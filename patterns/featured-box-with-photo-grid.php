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
	'content'     => '<!-- wp:group {"className":"has-text-color","style":{"text":"#ffffff","elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"color-primary","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group has-text-color has-base-color has-color-primary-background-color has-background has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"#ffffff"}}},"color":{"text":"#ffffff"},"typography":{"fontSize":"30px"}}} -->
			<h3 class="wp-block-heading has-text-color has-link-color" style="color:#ffffff;font-size:30px">' . __( 'Join Our Member Community', 'memberlite' ) . '</h3>
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
<!-- /wp:group -->',
];
