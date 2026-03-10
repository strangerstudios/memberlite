<?php
/**
 * Title: Member Spotlight
 * Slug: memberlite/member-spotlight
 * Description: A featured member profile card with photo, bio, and membership details for directories and community pages.
 * Categories: memberlite-community
 * Keywords: member, spotlight, profile, directory, featured
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">Member Spotlight</h2>
	<!-- /wp:heading -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:columns {"verticalAlignment":"center"} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"30%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
				<!-- wp:image {"width":"200px","aspectRatio":"1","scale":"cover","className":"is-style-rounded","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image is-resized has-custom-border is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/patterns/people/samuel-raita-RiDxDgHg7pw-unsplash-sm.jpg" alt="Photo of a man with glasses and blonde hair." style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:200px"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">
				<!-- wp:heading {"level":3,"fontSize":"30"} -->
				<h3 class="wp-block-heading has-30-font-size">David Lindgren</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"16"} -->
				<p class="has-color-secondary-color has-text-color has-16-font-size"><strong>Premium Member Since 2021</strong></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph -->
				<p>David is a longtime community contributor who has helped onboard dozens of new members. His expertise in project management has made him an invaluable resource in our forums and mentorship program.</p>
				<!-- /wp:paragraph -->
				<!-- wp:quote {"className":"is-style-plain","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"left":{"color":"var:preset|color|color-secondary","width":"3px"}},"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
				<blockquote class="wp-block-quote is-style-plain" style="border-left-color:var(--wp--preset--color--color-secondary);border-left-width:3px;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:italic;font-weight:400">
					<!-- wp:paragraph {"fontSize":"16"} -->
					<p class="has-16-font-size">"Being part of this community has completely changed how I approach my work. The connections I\'ve made here are priceless."</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">Browse the Member Directory</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->