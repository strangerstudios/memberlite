<?php
/**
 * Memberlite Pattern: Featured Testimonial
 *
 * @since TBD
 */

return [
	'title'       => __( 'Featured Testimonial', 'memberlite' ),
	'description' => __( 'Highlight what 1 person is saying about your products and services with a beautiful testimonial.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-featured', 'memberlite' ), __( 'memberlite-testimonials', 'memberlite' ) ],
	'keywords'    => [
		__( 'logos', 'memberlite' ),
		__( 'trusted by', 'memberlite' ),
		__( 'social proof', 'memberlite' ),
		__( 'users', 'memberlite' ),
		__( 'testimonials', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-pmpro-card" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">' . __( 'Hear From Our Members', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->

	<!-- wp:quote {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
	<blockquote class="wp-block-quote is-style-plain">
		<!-- wp:paragraph {"textColor":"luminous-vivid-amber","fontSize":"30"} -->
		<p class="has-luminous-vivid-amber-color has-text-color has-30-font-size">	
		<strong>★ ★ ★ ★ ★</strong>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>' . __( 'This membership has been worth every penny. The exclusive resources helped me level up my skills, and the community keeps me motivated. I finally have a place where I belong with people who get it.', 'memberlite' ) . '</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-group">
			<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/michael-dam-mEZ3PoFGs_k-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of a woman with red lipstick and a red crop neck top with long brown hair and a large smile.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph -->
			<p><strong>' . __( 'Vivienne Carroll', 'memberlite' ) . '</strong><br />' . __( 'Premium Member', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</blockquote>
	<!-- /wp:quote -->
</div>
<!-- /wp:group -->',
];
