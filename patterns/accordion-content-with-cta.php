<?php
/**
 * Title: FAQ Accordion With Content And CTA
 * Slug: memberlite/accordion-content-with-cta
 * Description: Two-column FAQ layout with intro content and a CTA button on the left, and a large-icon accordion on the right. Content is static and should be customized per site.
 * Categories: memberlite-accordion
 * Keywords: faq, accordion, questions, cta, contact
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20"}}}} -->
<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"letterSpacing":"1px"}},"textColor":"color-action","fontSize":"21","fontFamily":"roboto"} -->
<p class="has-color-action-color has-text-color has-link-color has-roboto-font-family has-21-font-size" style="letter-spacing:1px"><strong>FAQ</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"35px","textTransform":"capitalize"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"}}},"fontFamily":"roboto"} -->
<h2 class="wp-block-heading has-roboto-font-family" style="margin-top:var(--wp--preset--spacing--10);margin-bottom:0;font-size:35px;text-transform:capitalize"><strong>Still have questions?</strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--10)">We've answered the questions new members ask most often here. Don't see yours? Reach out and we'll get back to you within one business day.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-sharp"} -->
<div class="wp-block-button is-style-sharp"><a class="wp-block-button__link wp-element-button">Contact Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:accordion {"className":"is-style-accrdn-large"} -->
<div role="group" class="wp-block-accordion is-style-accrdn-large"><!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">How much does membership cost?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>We offer monthly and annual plans to fit your budget, with a discount for paying yearly. You can view full pricing on our membership levels page.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">Do you offer a free trial?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>Yes, new members get a 7-day free trial with full access to member-only content before your card is ever charged.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">Can I upgrade or downgrade my plan?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>Absolutely. You can change your membership level any time from your account dashboard, and your billing will adjust automatically.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background"} -->
<div class="wp-block-accordion-item has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">What if I'm not happy with my membership?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>We offer a 30-day money-back guarantee. If membership isn't the right fit, just reach out and we'll take care of a refund.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item --></div>
<!-- /wp:accordion --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
