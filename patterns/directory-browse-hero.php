<?php
/**
 * Title: Directory Browse Hero
 * Slug: memberlite/directory-browse-hero
 * Description: A hero section encouraging visitors to explore the member directory, with a collage of member photos.
 * Categories: memberlite-community
 * Keywords: directory, members, browse, hero, search
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns are-vertically-aligned-center alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"55%","style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:heading {"level":2,"fontSize":"42"} -->
			<h2 class="wp-block-heading has-42-font-size">Connect With Members Like You</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"18"} -->
			<p class="has-18-font-size">Our member directory makes it easy to find and connect with professionals in your field. Search by expertise, location, or interest to find your next collaborator, mentor, or friend.</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">Browse the Directory</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">Update Your Profile</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-columns">
				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/alex-starnes-WYE2UhXsU1Y-unsplash-sm.jpg" alt="Member photo." style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/dylan-ferreira-jIM8kVsFKlM-unsplash-sm.jpg" alt="Member photo." style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|30"}}}} -->
				<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30)">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/christina-wocintechchat-com-SJvDxw0azqw-unsplash-sm.jpg" alt="Member photo." style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/edward-cisneros-_H6wpor9mjs-unsplash-sm.jpg" alt="Member photo." style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/karsten-winegeart-Q7iB4Yixcfw-unsplash-sm.jpg" alt="Member photo." style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
					<!-- /wp:image -->
					<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/rana-sawalha-IhuHLIxS_Tk-unsplash-sm.jpg" alt="Member photo." style="border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
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
