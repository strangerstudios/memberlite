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
<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-secondary"}}},"typography":{"letterSpacing":"1px"}},"textColor":"color-secondary","fontSize":"21","fontFamily":"roboto"} -->
<p class="has-color-secondary-color has-text-color has-link-color has-roboto-font-family has-21-font-size" style="letter-spacing:1px"><strong>FAQ</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"35px","textTransform":"capitalize"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"}}},"fontFamily":"roboto"} -->
<h2 class="wp-block-heading has-roboto-font-family" style="margin-top:var(--wp--preset--spacing--10);margin-bottom:0;font-size:35px;text-transform:capitalize"><strong>Let's build something together</strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--10)">The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-sharp"} -->
<div class="wp-block-button is-style-sharp"><a class="wp-block-button__link wp-element-button">Contact Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:accordion {"className":"is-style-accrdn-large"} -->
<div role="group" class="wp-block-accordion is-style-accrdn-large"><!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"backgroundColor":"color-primary","textColor":"page-masthead"} -->
<div class="wp-block-accordion-item has-page-masthead-color has-color-primary-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">How much will it cost?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"backgroundColor":"color-primary","textColor":"page-masthead"} -->
<div class="wp-block-accordion-item has-page-masthead-color has-color-primary-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">How much will it cost?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"backgroundColor":"color-primary","textColor":"page-masthead"} -->
<div class="wp-block-accordion-item has-page-masthead-color has-color-primary-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">How much will it cost?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|page-masthead"}}}},"backgroundColor":"color-primary","textColor":"page-masthead"} -->
<div class="wp-block-accordion-item has-page-masthead-color has-color-primary-background-color has-text-color has-background has-link-color" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none"},"typography":{"textTransform":"capitalize"}},"fontSize":"24","fontFamily":"roboto"} -->
<h3 class="wp-block-accordion-heading has-roboto-font-family has-24-font-size" style="border-style:none;border-width:0px;text-transform:capitalize"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:6px;padding-right:var(--wp--preset--spacing--10);padding-bottom:6px;padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">How much will it cost?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0"><!-- wp:paragraph -->
<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item --></div>
<!-- /wp:accordion --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
