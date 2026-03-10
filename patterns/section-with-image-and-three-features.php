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
	<!-- wp:heading {"textAlign":"center","fontSize":"42"} -->
	<h2 class="wp-block-heading has-text-align-center has-42-font-size">Everything You Need to Succeed</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"verticalAlignment":null,"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/thought-catalog-505eectW54k-unsplash-md.jpg" alt="Overhead shot of a desk with books, a laptop, glasses, coffee, photos, and someone writing in a notebook."/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","width":"50%"} -->
		<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:50%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"borderColor":"borders","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}}},"textColor":"color-secondary"} -->
				<h3 class="wp-block-heading has-color-secondary-color has-text-color has-link-color">Exclusive Content</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p>Access resources, guides, and tools available only to members.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"borderColor":"borders","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}}},"textColor":"color-secondary"} -->
				<h3 class="wp-block-heading has-color-secondary-color has-text-color has-link-color">Ongoing Support</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p>Get help from people who understand your journey.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"1px","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"borderColor":"borders","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}}},"textColor":"color-secondary"} -->
				<h3 class="wp-block-heading has-color-secondary-color has-text-color has-link-color">Member Community</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p>Connect with like-minded people who share your goals.</p>
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
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">Join Now</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">View Membership Levels</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
