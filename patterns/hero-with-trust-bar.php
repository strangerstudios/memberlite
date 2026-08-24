<?php
/**
 * Title: Hero With Trust Bar
 * Slug: memberlite/hero-with-trust-bar
 * Description: A full-width cover image hero with a rounded bottom edge, centered headline and CTAs, and a trust bar highlighting reviews and guarantees.
 * Categories: memberlite-hero
 * Keywords: hero, cover, cta, trust, reviews, guarantee
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/daphne-fecheyr-VCET-_hySnU-unsplash-md.jpg","dimRatio":70,"overlayColor":"base","isUserOverlayColor":true,"isDark":false,"sizeSlug":"full","align":"full","style":{"border":{"radius":{"bottomLeft":"100px","bottomRight":"100px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover alignfull is-light" style="border-bottom-left-radius:100px;border-bottom-right-radius:100px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40)"><img class="wp-block-cover__image-background size-full" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/daphne-fecheyr-VCET-_hySnU-unsplash-md.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-base-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group alignwide" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"style":{"typography":{"textAlign":"center","fontStyle":"normal","fontWeight":"700","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"textColor":"body-text","fontSize":"54"} -->
				<h2 class="wp-block-heading has-text-align-center has-body-text-color has-text-color has-link-color has-54-font-size" style="font-style:normal;font-weight:700;text-transform:capitalize">Everything your members need, all in one place</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"textColor":"body-text","fontSize":"21"} -->
				<p class="has-text-align-center has-body-text-color has-text-color has-link-color has-21-font-size">Join a growing community of members getting exclusive content, tools, and support to help them succeed.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill","style":{"typography":{"textTransform":"capitalize"}}} -->
					<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" style="text-transform:capitalize">Join now</a></div>
					<!-- /wp:button -->

					<!-- wp:button {"textColor":"body-text","className":"is-style-outline","style":{"border":{"width":"3px"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}},"typography":{"textTransform":"capitalize"}},"borderColor":"body-text"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-body-text-color has-text-color has-link-color has-border-color has-body-text-border-color wp-element-button" style="border-width:3px;text-transform:capitalize">View membership plans</a></div>
					<!-- /wp:button --></div>
				<!-- /wp:buttons -->

				<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"},"margin":{"top":"var:preset|spacing|50","bottom":"0"}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;margin-top:var(--wp--preset--spacing--50);margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
					<div class="wp-block-columns"><!-- wp:column {"width":"35%"} -->
						<div class="wp-block-column" style="flex-basis:35%"><!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
							<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action"} -->
								<p class="has-color-action-color has-text-color has-link-color"><strong>★ ★ ★ ★ ★</strong></p>
								<!-- /wp:paragraph -->

								<!-- wp:paragraph {"style":{"typography":{"textTransform":"capitalize"}}} -->
								<p style="text-transform:capitalize">500+ reviews</p>
								<!-- /wp:paragraph --></div>
							<!-- /wp:group --></div>
						<!-- /wp:column -->

						<!-- wp:column -->
						<div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center","textTransform":"capitalize"}}} -->
							<p class="has-text-align-center" style="text-transform:capitalize">Cancel anytime</p>
							<!-- /wp:paragraph --></div>
						<!-- /wp:column -->

						<!-- wp:column {"width":"35%"} -->
						<div class="wp-block-column" style="flex-basis:35%"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center","textTransform":"capitalize"}}} -->
							<p class="has-text-align-center" style="text-transform:capitalize">30-day money-back guarantee</p>
							<!-- /wp:paragraph --></div>
						<!-- /wp:column --></div>
					<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
			<!-- /wp:group --></div></div>
	<!-- /wp:cover --></div>
<!-- /wp:group -->