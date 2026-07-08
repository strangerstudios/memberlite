<?php
/**
 * Title: Single Course Pricing With Image
 * Slug: memberlite/pricing-single-course-with-image
 * Description: Single price callout on the right paired with a headline, image, and colored background on the left. Content is static and does not pull from PMPro membership levels, so it should be customized per site. Perk checkmarks use the Memberlite Font Awesome shortcode.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, course, product, perks
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"color-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-color-primary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|borders"}}},"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"borders"} -->
<p class="has-borders-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--20);text-transform:uppercase"><strong>Invest in knowledge</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4},"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background","fontSize":"32","fontFamily":"open-sans"} -->
<p class="has-site-navigation-background-color has-text-color has-link-color has-open-sans-font-family has-32-font-size" style="margin-top:0;line-height:1.4"><strong>Everything you need in one package</strong></p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} -->
<figure class="wp-block-image size-full" style="margin-top:var(--wp--preset--spacing--10)"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/wes-hicks-4-EeTnaC1S4-unsplash-sm.jpg" alt="Person editing video footage on a laptop." /></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"site-navigation-background"} -->
<div class="wp-block-column has-site-navigation-background-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"border":{"radius":{"topLeft":"8px","topRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"borders","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-site-navigation-background-color has-borders-background-color has-text-color has-background has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link","fontSize":"32","fontFamily":"open-sans"} -->
<h3 class="wp-block-heading has-site-navigation-link-color has-text-color has-link-color has-open-sans-font-family has-32-font-size">Video Editing Course</h3>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link","fontSize":"42","fontFamily":"open-sans"} -->
<p class="has-site-navigation-link-color has-text-color has-link-color has-open-sans-font-family has-42-font-size"><strong>$49.99</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link"} -->
<p class="has-site-navigation-link-color has-text-color has-link-color"><strong>*one time payment</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0"},"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|30","bottom":"var:preset|spacing|10"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"5px","padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-secondary","fontSize":"21"} -->
<p class="has-color-secondary-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 1</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0"},"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-secondary","fontSize":"21"} -->
<p class="has-color-secondary-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 2</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|20","right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"color-secondary","fontSize":"21"} -->
<p class="has-color-secondary-color has-text-color has-link-color has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size" style="margin-top:0"><strong>Perk 3</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"top"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-action","width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-color-action-background-color has-background wp-element-button">Buy Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
