<?php
/**
 * Memberlite Pattern: Testimonials Grid of 2
 *
 * @since TBD
 */

return [
	'title'       => __( 'Testimonials Grid of 2', 'memberlite' ),
	'description' => __( 'Highlight what 2 people are saying about your products and services with beautiful testimonials.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-testimonials', 'memberlite' ) ],
	'keywords'    => [
		__( 'logos', 'memberlite' ),
		__( 'trusted by', 'memberlite' ),
		__( 'social proof', 'memberlite' ),
		__( 'users', 'memberlite' ),
		__( 'testimonials', 'memberlite' ),
		__( 'people', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","fontSize":"42"} -->
	<h2 class="wp-block-heading has-text-align-center has-42-font-size">' . __( 'Praise From Our Members', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"verticalAlignment":null} -->
	<div class="wp-block-columns">
		<!-- wp:column {"verticalAlignment":"stretch","style":{"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:quote {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<blockquote class="wp-block-quote is-style-plain">
				<!-- wp:paragraph {"textColor":"luminous-vivid-amber","fontSize":"30"} -->
				<p class="has-luminous-vivid-amber-color has-text-color has-30-font-size"><strong>★ ★ ★ ★ ★</strong></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph -->
				<p>' . __( 'This membership gives me exactly what I need without the fluff. The resources are practical, the community is supportive, and I can access everything on my own schedule. Worth every penny.', 'memberlite' ) . '</p>
				<!-- /wp:paragraph -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/people/alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg' ) . '" alt="' . esc_attr__( 'Photo of a smiling woman with short black curly hair and a white peasant style top standing in a clothing store.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
					<!-- /wp:image -->
					<!-- wp:paragraph -->
					<p><strong>' . __( 'Aria DeVaugn', 'memberlite' ) . '</strong><br>' . __( 'Premium Member', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","style":{"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"borderColor":"borders"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:quote {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<blockquote class="wp-block-quote is-style-plain">
				<!-- wp:paragraph {"textColor":"luminous-vivid-amber","fontSize":"30"} -->
				<p class="has-luminous-vivid-amber-color has-text-color has-30-font-size"><strong>★ ★ ★ ★ ★</strong></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph -->
				<p>' . __( 'I was skeptical at first, but this membership delivers real value. The exclusive content helped me grow my own business, and the member community has become my go-to support network.', 'memberlite' ) . '</p>
				<!-- /wp:paragraph -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/people/dylan-ferreira-jIM8kVsFKlM-unsplash-sm.jpg' ) . '" alt="' . esc_attr__( 'Close up photo of a smiling man with dark hair on a blue backdrop.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
					<!-- /wp:image -->
					<!-- wp:paragraph -->
					<p><strong>' . __( 'Ricardo Owens', 'memberlite' ) . '</strong><br>' . __( 'Member Since 2022', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
