<?php
/**
 * Memberlite Pattern: Section with Image and 3 Features
 *
 * @since TBD
 */

return [
	'title'       => __( 'Section with Image and 3 Features', 'memberlite' ),
	'description' => __( 'Highlight the elements of your program.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-services', 'memberlite' ), __( 'memberlite-about', 'memberlite' ) ],
	'keywords'    => [
		__( 'about', 'memberlite' ),
		__( 'coach', 'memberlite' ),
		__( 'community', 'memberlite' ),
		__( 'course', 'memberlite' ),
		__( 'homepage', 'memberlite' ),
		__( 'membership', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"color":{"background":"#ffffff"},"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","bottom":"60px","left":"60px","right":"60px"},"blockGap":"60px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#ffffff;margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:60px;padding-bottom:60px;padding-left:60px">
	<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#000000"},"elements":{"link":{"color":{"text":"#000000"}}},"typography":{"fontSize":"42px"}},"className":"is-style-default"} -->
	<h2 class="wp-block-heading has-text-align-center is-style-default has-text-color has-link-color" style="color:#000000;font-size:42px">' . __( 'Everything You Need to Succeed', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:media-text {"align":"wide","mediaId":3465,"mediaLink":"' . esc_url( get_template_directory_uri() . '/assets/images/patterns/experts/thought-catalog-505eectW54k-unsplash-md.jpg' ) . '","mediaType":"image","mediaWidth":45,"imageFill":false} -->
	<div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:45% auto">
		<figure class="wp-block-media-text__media"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/experts/thought-catalog-505eectW54k-unsplash-md.jpg' ) . '" alt="' . __( 'Overhead shot of a desk with books, a laptop, glasses, coffee, photos, and someone writing in a notebook.', 'memberlite' ) . '"/></figure>
		<div class="wp-block-media-text__content">
			<!-- wp:group {"style":{"spacing":{"blockGap":"30px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"color":{"text":"#466dd8"},"typography":{"fontSize":"36px"}}} -->
					<h3 class="wp-block-heading has-text-color" style="color:#466dd8;font-size:36px">' . __( 'Exclusive Content', 'memberlite' ) . '</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
					<p style="font-size:18px">' . __( 'Access resources, guides, and tools available only to members.', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"color":{"text":"#466dd8"},"typography":{"fontSize":"36px"}}} -->
					<h3 class="wp-block-heading has-text-color" style="color:#466dd8;font-size:36px">' . __( 'Member Community', 'memberlite' ) . '</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
					<p style="font-size:18px">' . __( 'Connect with like-minded people who share your goals.', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"style":{"color":{"text":"#466dd8"},"typography":{"fontSize":"36px"}}} -->
					<h3 class="wp-block-heading has-text-color" style="color:#466dd8;font-size:36px">' . __( 'Ongoing Support', 'memberlite' ) . '</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
					<p style="font-size:18px">' . __( 'Get help when you need it from people who understand your journey.', 'memberlite' ) . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:media-text -->
</div>
<!-- /wp:group -->',
];
