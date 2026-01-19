<?php
/**
 * Memberlite Pattern: Testimonials Grid of 2
 *
 * @since TBD
 */

return [
	'title'       => __( 'Testimonials Grid of 2', 'memberlite' ),
	'description' => __( 'Highlight what 2 people are saying about your products and services with beautiful testimonials.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-featured', 'memberlite' ), __( 'memberlite-testimonials', 'memberlite' ) ],
	'keywords'    => [
		__( 'logos', 'memberlite' ),
		__( 'trusted by', 'memberlite' ),
		__( 'social proof', 'memberlite' ),
		__( 'users', 'memberlite' ),
		__( 'testimonials', 'memberlite' ),
		__( 'people', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"style":{"color":{"background":"#edeff6"},"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}},"border":{"radius":"12px"}},"className":"has-background"} -->
<div class="wp-block-group has-background" style="border-radius:12px;background-color:#edeff6;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
	<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontSize":"42px"},"color":{"text":"#000000"},"elements":{"link":{"color":{"text":"#000000"}}}}} -->
	<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#000000;font-size:42px;font-style:normal">' . __( 'Praise From Our Members', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:columns -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"30px","bottom":"30px"}},"border":{"radius":"12px","color":"#e0e0e0","width":"1px"},"color":{"background":"#ffffff","text":"#000000"},"elements":{"link":{"color":{"text":"#000000"}}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-text-color has-background has-link-color" style="border-color:#e0e0e0;border-width:1px;border-radius:12px;color:#000000;background-color:#ffffff;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#c48100"},"typography":{"fontSize":"21px"}}} -->
					<p class="has-text-align-left has-text-color" style="color:#c48100;font-size:21px"><strong>★★★★★</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
					<p style="font-size:18px">' . __( 'This membership gives me exactly what I need without the fluff. The resources are practical, the community is supportive, and I can access everything on my own schedule. Worth every penny.', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%"}},"className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/people/alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg' ) . '" alt="' . __( 'Photo of a smiling woman with short black curly hair and a white peasant style top standing in a clothing store.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
					<!-- /wp:image -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
					<p style="font-size:18px"><strong>' . __( 'Aria DeVaugn', 'memberlite' ) . '</strong><br />' . __( 'Premium Member', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"30px","left":"30px","top":"30px","bottom":"30px"}},"border":{"radius":"12px","color":"#e0e0e0","width":"1px"},"color":{"background":"#ffffff","text":"#000000"},"elements":{"link":{"color":{"text":"#000000"}}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-text-color has-background has-link-color" style="border-color:#e0e0e0;border-width:1px;border-radius:12px;color:#000000;background-color:#ffffff;margin-top:0px;margin-bottom:0px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"align":"left","style":{"color":{"text":"#c48100"},"typography":{"fontSize":"21px"}}} -->
					<p class="has-text-align-left has-text-color" style="color:#c48100;font-size:21px"><strong>★★★★★</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
					<p style="font-size:18px">' . __( 'I was skeptical at first, but this membership delivers real value. The exclusive content helped me grow my own business, and the member community has become my go-to support network.', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%"}},"className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/people/dylan-ferreira-jIM8kVsFKlM-unsplash-sm.jpg' ) . '" alt="' . __( 'Close up photo of a smiling man with dark hair on a blue backdrop.', 'memberlite' ) . '" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
					<!-- /wp:image -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
					<p style="font-size:18px"><strong>' . __( 'Ricardo Owens', 'memberlite' ) . '</strong><br />' . __( 'Member Since 2022', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
