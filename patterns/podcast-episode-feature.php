<?php
/**
 * Title: Podcast Episode Feature
 * Slug: memberlite/podcast-episode-feature
 * Description: A featured podcast episode layout with show artwork, episode details, and listen/subscribe buttons.
 * Categories: memberlite-media
 * Keywords: podcast, episode, audio, listen, show
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">Latest Episode</h2>
	<!-- /wp:heading -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:columns {"verticalAlignment":"center"} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
				<!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"8px"}}} -->
				<figure class="wp-block-image has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/cathryn-lavery-fMD_Cru6OTk-unsplash-md.jpg" alt="Podcast episode artwork." style="border-radius:8px;aspect-ratio:1;object-fit:cover"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center","width":"65%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"textColor":"color-secondary","fontSize":"14"} -->
					<p class="has-color-secondary-color has-text-color has-14-font-size"><strong>Episode 47</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"textColor":"meta-link","fontSize":"14"} -->
					<p class="has-meta-link-color has-text-color has-14-font-size">45 min</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:heading {"level":3,"fontSize":"30"} -->
				<h3 class="wp-block-heading has-30-font-size">Building a Sustainable Membership Business</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p>In this episode, we sit down with a membership site founder who grew from zero to 10,000 paying members in just two years. Learn the strategies, mistakes, and pivots that shaped their journey.</p>
				<!-- /wp:paragraph -->
				<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"color-primary"} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">[fa icon="play"] Listen Now</a></div>
					<!-- /wp:button -->
					<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">All Episodes</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
