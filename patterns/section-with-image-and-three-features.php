<?php
/**
 * Title: Section with Image and 3 Features
 * Slug: memberlite/section-with-image-and-three-features
 * Description: Highlight the elements of your program.
 * Categories: memberlite-about
 * Keywords: about, coach, community, course, homepage, membership
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"42"} -->
	<h2 class="wp-block-heading has-text-align-center has-42-font-size"><?php esc_html_e( 'Everything You Need to Succeed', 'memberlite' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/thought-catalog-505eectW54k-unsplash-md.jpg" alt="<?php esc_attr_e( 'Overhead shot of a desk with books, a laptop, glasses, coffee, photos, and someone writing in a notebook.', 'memberlite' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:50%">
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action"} -->
				<h3 class="wp-block-heading has-color-action-color has-text-color has-link-color"><?php esc_html_e( 'Exclusive Content', 'memberlite' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Access resources, guides, and tools available only to members.', 'memberlite' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action"} -->
				<h3 class="wp-block-heading has-color-action-color has-text-color has-link-color"><?php esc_html_e( 'Ongoing Support', 'memberlite' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Get help from people who understand your journey.', 'memberlite' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action"} -->
				<h3 class="wp-block-heading has-color-action-color has-text-color has-link-color"><?php esc_html_e( 'Member Community', 'memberlite' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Connect with like-minded people who share your goals.', 'memberlite' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#"><?php esc_html_e( 'Join Now', 'memberlite' ); ?></a></div>
		<!-- /wp:button -->
		<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#"><?php esc_html_e( 'View Membership Levels', 'memberlite' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
