<?php
/**
 * Memberlite Pattern: Testimonials Grid of 4
 *
 * @since TBD
 */

return [
	'title'       => __( 'Testimonials: Grid of 4', 'memberlite' ),
	'description' => __( 'Highlight what 4 people are saying about your products and services with beautiful testimonials.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-featured', 'memberlite' ), __( 'memberlite-testimonials', 'memberlite' ) ],
	'keywords'    => [
		__( 'logos', 'memberlite' ),
		__( 'trusted by', 'memberlite' ),
		__( 'social proof', 'memberlite' ),
		__( 'users', 'memberlite' ),
		__( 'testimonials', 'memberlite' ),
		__( 'people', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"color":{"background":"#f1f1f1"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f1f1f1;margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","align":"wide","fontSize":"42"} -->
	<h2 class="wp-block-heading alignwide has-text-align-center has-42-font-size">' . __( 'What Our Members Are Saying', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"borderColor":"borders","backgroundColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
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
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"borderColor":"borders","backgroundColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
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
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"borderColor":"borders","backgroundColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:quote {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<blockquote class="wp-block-quote is-style-plain">
					<!-- wp:paragraph {"textColor":"luminous-vivid-amber","fontSize":"30"} -->
					<p class="has-luminous-vivid-amber-color has-text-color has-30-font-size"><strong>★ ★ ★ ★ ★</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph -->
					<p>' . __( 'The member community alone is worth the price. I have connected with people who truly understand what I am building. We support each other, share wins, and help solve problems together.', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
						<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/people/foto-sushi-ExVlW9b648Q-unsplash-sm.jpg' ) . '" alt="' . esc_attr__( 'Photo of a smiling man with arms crossed in front of him wearing a red top in front of a blank grey backdrop.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
						<!-- /wp:image -->
						<!-- wp:paragraph -->
						<p><strong>' . __( 'Edwin Johnny', 'memberlite' ) . '</strong><br>' . __( 'Founding Member', 'memberlite' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</blockquote>
				<!-- /wp:quote -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"borderColor":"borders","backgroundColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-pmpro-card has-border-color has-borders-border-color has-white-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:quote {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<blockquote class="wp-block-quote is-style-plain">
					<!-- wp:paragraph {"textColor":"luminous-vivid-amber","fontSize":"30"} -->
					<p class="has-luminous-vivid-amber-color has-text-color has-30-font-size"><strong>★ ★ ★ ★ ★</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph -->
					<p>' . __( 'As a nonprofit volunteer, I needed affordable resources I could trust. This membership gave me exactly that. Reliable tools, clear guidance, and a community that understands working with limited budgets.', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
						<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/people/constantin-panagopoulos-9lf_erPHYG0-unsplash-md.jpg' ) . '" alt="' . esc_attr__( 'Close up photo of smiling woman wearing a straw hat and black top.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
						<!-- /wp:image -->
						<!-- wp:paragraph -->
						<p><strong>' . __( 'Ashley Hoyt', 'memberlite' ) . '</strong><br>' . __( 'Nonprofit Volunteer', 'memberlite' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</blockquote>
				<!-- /wp:quote -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
