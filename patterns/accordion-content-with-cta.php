<?php
/**
 * Title: FAQ Accordion With Content And CTA
 * Slug: memberlite/accordion-content-with-cta
 * Description: Two-column FAQ layout with intro content and a CTA button on the left, and an accordion on the right. Content is static and should be customized per site.
 * Categories: memberlite-accordion
 * Keywords: faq, accordion, questions, cta, contact
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 8.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"letterSpacing":"1px"}},"textColor":"color-action","fontSize":"21"} -->
<p class="has-color-action-color has-text-color has-link-color has-21-font-size" style="letter-spacing:1px"><strong><?php esc_html_e( 'FAQ', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"36"} -->
<h2 class="wp-block-heading has-36-font-size"><?php esc_html_e( 'Still Have Questions?', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"21"} -->
<p class="has-21-font-size"><?php esc_html_e( 'We\'ve answered the questions new members ask most often here. Don\'t see yours? Reach out and we\'ll get back to you within one business day.', 'memberlite' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Contact Us', 'memberlite' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column"><!-- wp:accordion {"autoclose":true,"className":"is-style-default","layout":{"type":"default"}} -->
<div role="group" class="wp-block-accordion is-style-default"><!-- wp:accordion-item {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-text-color has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"level":3,"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"backgroundColor":"site-navigation-link","fontSize":"21"} -->
<h3 class="wp-block-accordion-heading has-icon has-icon-right has-site-navigation-link-background-color has-background has-21-font-size" style="border-style:none;border-width:0px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-bottom:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title"><?php esc_html_e( 'How much does membership cost?', 'memberlite' ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"backgroundColor":"site-navigation-link"} -->
<div role="region" class="wp-block-accordion-panel has-site-navigation-link-background-color has-background"><!-- wp:paragraph -->
<p><?php esc_html_e( 'We offer monthly and annual plans to fit your budget, with a discount for paying yearly. You can view full pricing on our membership levels page.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-text-color has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"level":3,"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"backgroundColor":"site-navigation-link","fontSize":"21"} -->
<h3 class="wp-block-accordion-heading has-icon has-icon-right has-site-navigation-link-background-color has-background has-21-font-size" style="border-style:none;border-width:0px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-bottom:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title"><?php esc_html_e( 'Do you offer a free trial?', 'memberlite' ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"backgroundColor":"site-navigation-link"} -->
<div role="region" class="wp-block-accordion-panel has-site-navigation-link-background-color has-background"><!-- wp:paragraph -->
<p><?php esc_html_e( 'Yes, new members get a 7-day free trial with full access to member-only content before your card is ever charged.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-text-color has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"level":3,"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"backgroundColor":"site-navigation-link","fontSize":"21"} -->
<h3 class="wp-block-accordion-heading has-icon has-icon-right has-site-navigation-link-background-color has-background has-21-font-size" style="border-style:none;border-width:0px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-bottom:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title"><?php esc_html_e( 'Can I upgrade or downgrade my plan?', 'memberlite' ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"backgroundColor":"site-navigation-link"} -->
<div role="region" class="wp-block-accordion-panel has-site-navigation-link-background-color has-background"><!-- wp:paragraph -->
<p><?php esc_html_e( 'Absolutely. You can change your membership level any time from your account dashboard, and your billing will adjust automatically.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-text-color has-link-color"><!-- wp:accordion-heading {"level":3,"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"backgroundColor":"site-navigation-link","fontSize":"21"} -->
<h3 class="wp-block-accordion-heading has-icon has-icon-right has-site-navigation-link-background-color has-background has-21-font-size" style="border-style:none;border-width:0px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-bottom:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title"><?php esc_html_e( 'What if I\'m not happy with my membership?', 'memberlite' ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"backgroundColor":"site-navigation-link"} -->
<div role="region" class="wp-block-accordion-panel has-site-navigation-link-background-color has-background"><!-- wp:paragraph -->
<p><?php esc_html_e( 'We offer a 30-day money-back guarantee. If membership isn\'t the right fit, just reach out and we\'ll take care of a refund.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item --></div>
<!-- /wp:accordion --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

