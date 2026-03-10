<?php
/**
 * Title: Instructor Profile
 * Slug: memberlite/instructor-profile
 * Description: A two-column instructor or coach profile with photo, bio, and credentials.
 * Categories: memberlite-courses
 * Keywords: instructor, coach, teacher, profile, bio, course
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">Your Instructor</h2>
	<!-- /wp:heading -->
	<!-- wp:columns -->
	<div class="wp-block-columns">
		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:image {"aspectRatio":"3/4","scale":"cover","className":"is-style-default","style":{"border":{"radius":"8px"}}} -->
			<figure class="wp-block-image has-custom-border is-style-default"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/patterns/experts/christina-wocintechchat-com-3sY92eKV6-Y-unsplash-md.jpg" alt="Photo of an instructor in a professional setting." style="border-radius:8px;aspect-ratio:3/4;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"65%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:heading {"level":3,"fontSize":"36"} -->
			<h3 class="wp-block-heading has-36-font-size">Dr. Sarah Mitchell</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"18"} -->
			<p class="has-color-secondary-color has-text-color has-18-font-size"><strong>Lead Instructor &amp; Course Creator</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p>With over 15 years of industry experience, Sarah has helped thousands of students transform their careers. She brings a practical, hands-on approach to teaching that focuses on real-world applications.</p>
			<!-- /wp:paragraph -->
			<!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-columns">
				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<div class="wp-block-column">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"textColor":"color-secondary"} -->
						<p class="has-color-secondary-color has-text-color">[fa icon="graduation-cap"]</p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph {"fontSize":"14"} -->
						<p class="has-14-font-size">Ph.D., Stanford University</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"textColor":"color-secondary"} -->
						<p class="has-color-secondary-color has-text-color">[fa icon="award"]</p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph {"fontSize":"14"} -->
						<p class="has-14-font-size">Industry Certified Expert</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<div class="wp-block-column">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"textColor":"color-secondary"} -->
						<p class="has-color-secondary-color has-text-color">[fa icon="users"]</p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph {"fontSize":"14"} -->
						<p class="has-14-font-size">10,000+ Students Taught</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"textColor":"color-secondary"} -->
						<p class="has-color-secondary-color has-text-color">[fa icon="star"]</p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph {"fontSize":"14"} -->
						<p class="has-14-font-size">4.9/5 Average Rating</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
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