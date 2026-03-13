<?php
/**
 * Title: Video Feature Section
 * Slug: memberlite/video-feature-section
 * Description: A featured video section with an embed area, title, description, and call-to-action for video membership sites.
 * Categories: memberlite-media
 * Keywords: video, embed, featured, media, streaming
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">This Week's Featured Video</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
		<p class="has-text-align-center has-18-font-size">New premium video content published every week for members.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"},"border":{"radius":"8px"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="border-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/domenico-loia-hGV2TfOh0ns-unsplash-md.jpg","dimRatio":60,"overlayColor":"color-primary","minHeight":400,"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|30","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30);min-height:400px"><span aria-hidden="true" class="wp-block-cover__background has-color-primary-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/domenico-loia-hGV2TfOh0ns-unsplash-md.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
			<!-- wp:paragraph {"align":"center","fontSize":"54"} -->
			<p class="has-text-align-center has-54-font-size">[fa icon="circle-play" size="2x"]</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","fontSize":"30"} -->
			<h3 class="wp-block-heading has-text-align-center has-white-color has-text-color has-link-color has-30-font-size">Mastering the Fundamentals: A Complete Walkthrough</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
			<p class="has-text-align-center has-white-color has-text-color has-link-color">Duration: 42 minutes</p>
			<!-- /wp:paragraph -->
		</div></div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:group -->
	<!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"65%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column" style="flex-basis:65%">
			<!-- wp:heading {"level":3,"fontSize":"24"} -->
			<h3 class="wp-block-heading has-24-font-size">About This Video</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>In this comprehensive tutorial, we break down the core techniques you need to know. Whether you're just getting started or looking to sharpen your skills, this video covers everything from basics to advanced tips with real-world examples.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"35%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"vertical"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"color-primary","width":100} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">[fa icon="play"] Watch Full Video</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"textColor":"color-primary","width":100,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">Browse Video Library</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
