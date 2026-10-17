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
<div class="wp-block-group alignwide has-footer-widgets-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}},"textColor":"footer-widgets"} -->
<div class="wp-block-column is-vertically-aligned-center has-footer-widgets-color has-text-color has-link-color"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"},"spacing":{"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontFamily":"heading"} -->
<p class="has-color-action-color has-text-color has-link-color has-heading-font-family" style="margin-top:0;letter-spacing:1px;text-transform:uppercase"><strong><?php esc_html_e( 'Invest in knowledge', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":1.3999999999999999},"spacing":{"margin":{"top":"0"}}},"fontSize":"30","fontFamily":"heading"} -->
<p class="has-heading-font-family has-30-font-size" style="margin-top:0;line-height:1.4"><strong><?php esc_html_e( 'Everything you need in one package', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-full is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/wes-hicks-4-EeTnaC1S4-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Person editing video footage on a laptop.', 'memberlite' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"},"width":"1px"}},"backgroundColor":"site-navigation-background","borderColor":"borders"} -->
<div class="wp-block-column has-border-color has-borders-border-color has-site-navigation-background-background-color has-background" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}},"border":{"radius":{"topLeft":"8px","topRight":"8px"}},"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"page-masthead-background","textColor":"page-masthead","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-page-masthead-color has-page-masthead-background-background-color has-text-color has-background has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:heading {"fontSize":"30"} -->
<h2 class="wp-block-heading has-30-font-size"><?php esc_html_e( 'Video Editing Course', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"54","fontFamily":"heading"} -->
<p class="has-heading-font-family has-54-font-size"><strong>$4</strong>7</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"textColor":"body-text","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group has-body-text-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Learn at your own pace.', 'memberlite' ); ?></strong> <?php esc_html_e( 'Lifetime access revisit when you need a refresh.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Real project files included.', 'memberlite' ); ?></strong> <?php esc_html_e( 'Practice with the same footage & assets used in the lessons.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="circle-check" color="secondary" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Pro workflows, beginner friendly.', 'memberlite' ); ?></strong> <?php esc_html_e( 'From first cut to published without getting lost.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"top"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"base","className":"is-style-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"dimensions":{"width":"100%"}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" href="#"><?php esc_html_e( 'Buy Now', 'memberlite' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
