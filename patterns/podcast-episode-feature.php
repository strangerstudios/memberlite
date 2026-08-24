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
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"0","right":"0"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-right:0;padding-bottom:var(--wp--preset--spacing--70);padding-left:0">
	<!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
	<h2 class="wp-block-heading has-text-align-center">Latest Episode</h2>
	<!-- /wp:heading -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:columns {"verticalAlignment":"center"} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
				<!-- wp:image {"aspectRatio":"2/3","scale":"cover","style":{"border":{"radius":"8px"}}} -->
				<figure class="wp-block-image has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/cathryn-lavery-fMD_Cru6OTk-unsplash-md.jpg" alt="Podcast episode artwork." style="border-radius:8px;aspect-ratio:2/3;object-fit:cover"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center","width":"65%","style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"textColor":"buttons","fontSize":"14"} -->
					<p class="has-buttons-color has-text-color has-14-font-size"><strong>Episode 47</strong></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"textColor":"meta-link","fontSize":"14"} -->
					<p class="has-meta-link-color has-text-color has-14-font-size">[fa icon="stopwatch"] 45 min</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0.5rem"}}},"fontSize":"30"} -->
				<h3 class="wp-block-heading has-30-font-size" style="margin-top:0.5rem">Building a Sustainable Membership Business</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0.5rem"}}}} -->
				<p style="margin-top:0.5rem">In this episode, we sit down with a membership site founder who grew from zero to 10,000 paying members in just two years. Learn the strategies, mistakes, and pivots that shaped their journey.</p>
				<!-- /wp:paragraph -->
				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"},"blockGap":{"left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--10)">
					<!-- wp:button {"width":50} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-50"><a class="wp-block-button__link wp-element-button" href="#">[fa icon="circle-play"] Listen Now</a></div>
					<!-- /wp:button -->
					<!-- wp:button {"textColor":"buttons","width":50,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|buttons"}}}}} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-outline"><a class="wp-block-button__link has-buttons-color has-text-color has-link-color wp-element-button" href="#">All Episodes</a></div>
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