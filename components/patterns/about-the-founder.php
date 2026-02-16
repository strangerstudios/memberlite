<?php
/**
 * Memberlite Pattern: About the Founder
 *
 * @since TBD
 */

return [
	'title'       => __( 'About the Founder', 'memberlite' ),
	'description' => __( 'Introduce the leader of this program.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-team', 'memberlite' ), __( 'memberlite-about', 'memberlite' ) ],
	'keywords'    => [
		__( 'about', 'memberlite' ),
		__( 'bio', 'memberlite' ),
		__( 'instructor', 'memberlite' ),
		__( 'coach', 'memberlite' ),
		__( 'teacher', 'memberlite' ),
		__( 'expert', 'memberlite' ),
		__( 'people', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:paragraph {"fontSize":"24"} -->
			<p class="has-24-font-size">' . __( 'Members join communities led by people they know, like, and trust. Your unique expertise can create real impact.<br><strong>There is a membership inside all of us.</strong>', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p>' . __( 'Sarah Mitchell is a community builder, consultant, and membership site creator with over 10 years of experience helping others succeed. She built this platform to share her knowledge and connect with members like you.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p>' . __( 'She has helped hundreds of members achieve their goals through exclusive resources, a supportive community, and hands-on guidance that makes a real difference.', 'memberlite' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:image {"aspectRatio":"3/4","scale":"cover"} -->
			<figure class="wp-block-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/people/christina-wocintechchat-com-SJvDxw0azqw-unsplash-sm.jpg" alt="' . esc_attr__( 'Photo of the a female executive side profile of a woman with a white and black striped vest in a corporate setting.', 'memberlite' ) . '" style="aspect-ratio:3/4;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
