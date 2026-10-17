<?php
/**
 * Title: Course Grid with Member Progress
 * Slug: memberlite/course-grid-with-member-progress
 * Description: A featured courses section with two cover-style course cards, plus a free lessons gallery alongside the PMPro Courses "My Courses" block showing a member's progress.
 * Categories: memberlite-courses
 * Keywords: courses, coaching, lessons, progress, my courses, pmpro_course, pmpro_lesson
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|30","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"fontSize":"21"} -->
		<h2 class="wp-block-heading has-21-font-size">Featured Courses</h2>
		<!-- /wp:heading -->
		<!-- wp:buttons {"fontSize":"16","layout":{"type":"flex","verticalAlignment":"bottom"}} -->
		<div class="wp-block-buttons has-custom-font-size has-16-font-size">
			<!-- wp:button {"className":"is-style-arrow-plain","style":{"spacing":{"padding":{"left":"0","right":"0"}}}} -->
			<div class="wp-block-button is-style-arrow-plain"><a class="wp-block-button__link wp-element-button" href="#" style="padding-right:0;padding-left:0">View All Courses</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/sean-oulashin-KMn4VEeEPR8-unsplash-md.jpg","dimRatio":80,"overlayColor":"site-navigation-link","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0},"style":{"dimensions":{"aspectRatio":"16/9"},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
			<div class="wp-block-cover has-site-navigation-background-color has-text-color has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/sean-oulashin-KMn4VEeEPR8-unsplash-md.jpg" style="object-position:50% 0%" data-object-fit="cover" data-object-position="50% 0%"/>
				<span aria-hidden="true" class="wp-block-cover__background has-site-navigation-link-background-color has-background-dim-80 has-background-dim"></span>
				<div class="wp-block-cover__inner-container">
					<!-- wp:paragraph {"placeholder":"Write title…","style":{"typography":{"textAlign":"left","fontStyle":"normal","fontWeight":"800"}},"fontSize":"large","fontFamily":"heading"} -->
					<p class="has-text-align-left has-heading-font-family has-large-font-size" style="font-style:normal;font-weight:800">Beginner Surfing Fundamentals</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph -->
					<p><strong>Catch your first wave with confidence</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"1px"}},"fontSize":"16","fontFamily":"heading"} -->
						<p class="has-heading-font-family has-16-font-size" style="font-style:normal;font-weight:700;letter-spacing:1px;text-transform:uppercase">15 Lessons</p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","letterSpacing":"1px"}},"fontSize":"16","fontFamily":"heading"} -->
						<p class="has-heading-font-family has-16-font-size" style="font-style:normal;font-weight:700;letter-spacing:1px;text-transform:uppercase">5 hours 43 minutes</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"backgroundColor":"color-action","className":"is-style-fill"} -->
						<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-color-action-background-color has-background wp-element-button" href="#">[fa icon="circle-play"] Watch Now</a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
			</div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/joshua-earle-9idqIGrLuTE-unsplash-md.jpg","dimRatio":80,"overlayColor":"site-navigation-link","isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0},"style":{"dimensions":{"aspectRatio":"16/9"},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
			<div class="wp-block-cover has-site-navigation-background-color has-text-color has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/joshua-earle-9idqIGrLuTE-unsplash-md.jpg" style="object-position:50% 0%" data-object-fit="cover" data-object-position="50% 0%"/>
				<span aria-hidden="true" class="wp-block-cover__background has-site-navigation-link-background-color has-background-dim-80 has-background-dim"></span>
				<div class="wp-block-cover__inner-container">
					<!-- wp:paragraph {"placeholder":"Write title…","style":{"typography":{"textAlign":"left","fontStyle":"normal","fontWeight":"800"}},"fontSize":"large","fontFamily":"heading"} -->
					<p class="has-text-align-left has-heading-font-family has-large-font-size" style="font-style:normal;font-weight:800">Backcountry Hiking Basics</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph -->
					<p><strong>Explore the trail with confidence and skill</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-group">
						<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"1px"}},"fontSize":"16","fontFamily":"heading"} -->
						<p class="has-heading-font-family has-16-font-size" style="font-style:normal;font-weight:700;letter-spacing:1px;text-transform:uppercase">12 Lessons</p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","letterSpacing":"1px"}},"fontSize":"16","fontFamily":"heading"} -->
						<p class="has-heading-font-family has-16-font-size" style="font-style:normal;font-weight:700;letter-spacing:1px;text-transform:uppercase">4 hours 10 minutes</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"backgroundColor":"color-action","className":"is-style-fill"} -->
						<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-color-action-background-color has-background wp-element-button" href="#">[fa icon="circle-play"] Watch Now</a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
			</div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:heading {"fontSize":"21"} -->
			<h2 class="wp-block-heading has-21-font-size">Free Lessons</h2>
			<!-- /wp:heading -->
			<!-- wp:gallery {"columns":2,"linkTo":"none","aspectRatio":"1","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"},"margin":{"bottom":"0"}}}} -->
			<figure class="wp-block-gallery has-nested-images columns-2 is-cropped" style="margin-bottom:0">
				<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"1","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/daphne-fecheyr-VCET-_hySnU-unsplash-sm.jpg" alt="Sunlit path through a wooded park." style="aspect-ratio:1"/></figure>
				<!-- /wp:image -->
				<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"1","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/oliver-spicer-NmPNw8w_a24-unsplash-sm.jpg" alt="Wooden dock stretching across a calm lake at sunset." style="aspect-ratio:1"/></figure>
				<!-- /wp:image -->
				<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"1","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/joshua-sortino-f3uWi9G-lus-unsplash-sm.jpg" alt="Hiker overlooking a mountain valley with winding rivers." style="aspect-ratio:1"/></figure>
				<!-- /wp:image -->
				<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"1","sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/paul-pastourmatzis-eVQIojFZxm0-unsplash-sm.jpg" alt="Snow-covered mountain range viewed from a wooden deck." style="aspect-ratio:1"/></figure>
				<!-- /wp:image -->
			</figure>
			<!-- /wp:gallery -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:heading {"fontSize":"21"} -->
			<h2 class="wp-block-heading has-21-font-size">Your Progress</h2>
			<!-- /wp:heading -->
			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:pmpro-courses/my-courses {"limit":"4"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->