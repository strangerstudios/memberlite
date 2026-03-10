<?php
/**
 * Title: Featured Testimonial
 * Slug: memberlite/featured-testimonial
 * Description: Highlight what 1 person is saying about your products and services with a beautiful testimonial.
 * Categories: memberlite-testimonials
 * Keywords: logos, trusted by, social proof, users, testimonials
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">Hear From Our Members</h2>
		<!-- /wp:heading -->
		<!-- wp:quote {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<blockquote class="wp-block-quote is-style-plain">
			<!-- wp:paragraph {"textColor":"luminous-vivid-amber","fontSize":"30"} -->
			<p class="has-luminous-vivid-amber-color has-text-color has-30-font-size"><strong>★ ★ ★ ★ ★</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p>This membership has been worth every penny. The exclusive resources helped me level up my skills, and the community keeps me motivated. I finally have a place where I belong with people who get it.</p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/patterns/people/michael-dam-mEZ3PoFGs_k-unsplash-sm.jpg" alt="Photo of a woman with red lipstick and a red crop neck top with long brown hair and a large smile." style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:100px"/></figure>
				<!-- /wp:image -->
				<!-- wp:paragraph -->
				<p><strong>Vivienne Carroll</strong><br>Premium Member</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</blockquote>
		<!-- /wp:quote -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->