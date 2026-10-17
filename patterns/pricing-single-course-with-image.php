<?php
/**
 * Title: Single Course Pricing With Image
 * Slug: memberlite/pricing-single-course-with-image
 * Description: Single price callout on the right paired with a headline, image, and colored background on the left. Content is static and does not pull from PMPro membership levels, so it should be customized per site. Perk checkmarks use the Memberlite Font Awesome shortcode.
 * Categories: memberlite-pricing
 * Keywords: pricing, plans, membership, course, product, perks, courses, pmpro_course
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"footer-widgets-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-footer-widgets-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"},"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}},"textColor":"footer-widgets"} -->
<div class="wp-block-column has-footer-widgets-color has-text-color has-link-color"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontFamily":"heading"} -->
<p class="has-color-action-color has-text-color has-link-color has-heading-font-family" style="margin-top:0;text-transform:uppercase"><strong>Invest in knowledge</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.4},"spacing":{"margin":{"top":"0"}}},"fontSize":"32","fontFamily":"heading"} -->
<p class="has-heading-font-family has-32-font-size" style="margin-top:0;line-height:1.4"><strong>Everything you need in one package</strong></p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-full is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/wes-hicks-4-EeTnaC1S4-unsplash-sm.jpg" alt="Person editing video footage on a laptop."/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"},"width":"1px"}},"backgroundColor":"site-navigation-background","borderColor":"borders"} -->
<div class="wp-block-column has-border-color has-borders-border-color has-site-navigation-background-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}},"border":{"radius":{"topLeft":"8px","topRight":"8px"}},"spacing":{"blockGap":"var:preset|spacing|10","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"page-masthead-background","textColor":"page-masthead","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-page-masthead-color has-page-masthead-background-background-color has-text-color has-background has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:heading {"level":3,"fontSize":"32"} -->
<h3 class="wp-block-heading has-32-font-size">Video Editing Course</h3>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"36","fontFamily":"heading"} -->
<p class="has-heading-font-family has-36-font-size"><strong>$49.99</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>*one time payment</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|20"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"textColor":"body-text","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group has-body-text-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size"><strong>Benefit Highlight 1</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size"><strong>Benefit Highlight 2</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"21"} -->
<p class="has-text-align-center has-21-font-size"><strong>Benefit Highlight 3</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"top"}} -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"textColor":"base","className":"is-style-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="#">Buy Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->