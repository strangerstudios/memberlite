<?php
/**
 * Title: Footer: Join CTA + Copyright Bar
 * Slug: memberlite/footer-05
 * Description: Bold membership call-to-action section with a slim copyright bar below. High-conversion layout.
 * Categories: memberlite-footer, footer
 * Keywords: footer, cta, join, call to action, conversion
 * Block Types: core/post-content
 * Post Types: memberlite_footer
 * Note: Update button links to point to your membership levels and checkout pages.
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"full","className":"footer-variation-05-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|memberlite-links"}}},"border":{"top":{"color":"var:preset|color|borders","width":"1px"},"right":{},"bottom":{},"left":{}}},"backgroundColor":"footer-widgets-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull footer-variation-05-cta has-footer-widgets-background-background-color has-background has-link-color" style="border-top-color:var(--wp--preset--color--borders);border-top-width:1px;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"700"}},"fontSize":"36"} -->
<h2 class="wp-block-heading has-text-align-center has-36-font-size" style="font-weight:700"><?php esc_html_e( 'Ready to become a member?', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"has-text-align-center","textColor":"meta-link"} -->
<p class="has-text-align-center has-text-align-center has-meta-link-color has-text-color"><?php esc_html_e( 'Join thousands of members who are already learning, growing, and building connections in our community.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"color-action"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-color-action-background-color has-background wp-element-button"><?php printf( '[fa icon="heart"] %s', esc_html__( 'Join Today', 'memberlite' ) ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php printf( '[fa icon="arrow-right-to-bracket"] %s', esc_html__( 'Log In', 'memberlite' ) ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"has-text-align-center","style":{"typography":{"letterSpacing":"0.03em"}},"textColor":"meta-link","fontSize":"14","fontFamily":"space-grotesk"} -->
<p class="has-text-align-center has-meta-link-color has-text-color has-space-grotesk-font-family has-14-font-size" style="letter-spacing:0.03em"><?php esc_html_e( 'No long-term commitment required. Cancel anytime.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"footer-variation-05-bar","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull footer-variation-05-bar has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>©</p>
<!-- /wp:paragraph -->

<!-- wp:site-title {"level":0,"isLink":false,"style":{"typography":{"lineHeight":"1.7"}},"fontSize":"18"} /-->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"left":"4px"}}}} -->
<p style="padding-left:4px"><?php esc_html_e( 'All rights reserved.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><a href="#"><?php esc_html_e( 'Privacy Policy', 'memberlite' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#"><?php esc_html_e( 'Terms of Service', 'memberlite' ); ?></a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#"><?php esc_html_e( 'Refund Policy', 'memberlite' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
