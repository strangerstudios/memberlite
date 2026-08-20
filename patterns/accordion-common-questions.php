<?php
/**
 * Title: Common Questions Accordion
 * Slug: memberlite/accordion-common-questions
 * Description: FAQ-style accordion inside a section with its own background color, distinct from the accordion heading and open-panel colors. Content is static and should be customized per site.
 * Categories: memberlite-accordion
 * Keywords: faq, accordion, questions, help, support
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"borders","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-borders-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--10)"><!-- wp:heading {"style":{"typography":{"textAlign":"center","textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"textColor":"body-text"} -->
<h2 class="wp-block-heading has-text-align-center has-body-text-color has-text-color has-link-color" style="text-transform:capitalize"><strong>Common questions</strong></h2>
<!-- /wp:heading -->

<!-- wp:accordion {"className":"is-style-accrdn-medium","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div role="group" class="wp-block-accordion is-style-accrdn-medium" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
<div class="wp-block-accordion-item" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"},"width":"0px","style":"none"},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"buttons","textColor":"base"} -->
<h3 class="wp-block-accordion-heading has-icon has-icon-right has-base-color has-buttons-background-color has-text-color has-background has-link-color" style="border-style:none;border-width:0px;border-top-left-radius:8px;border-top-right-radius:8px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-bottom:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">How does the money back guarantee work?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}},"border":{"radius":{"bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"base","textColor":"body-text"} -->
<div role="region" class="wp-block-accordion-panel has-body-text-color has-base-background-color has-text-color has-background has-link-color" style="border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:0;padding-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} -->
<p style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">If you're not satisfied with your membership, let us know within the first 30 days and we'll issue a full refund, no questions asked.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
<div class="wp-block-accordion-item" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"},"width":"0px","style":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"backgroundColor":"buttons","textColor":"base"} -->
<h3 class="wp-block-accordion-heading has-icon has-icon-right has-base-color has-buttons-background-color has-text-color has-background has-link-color" style="border-style:none;border-width:0px;border-top-left-radius:8px;border-top-right-radius:8px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-bottom:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">Can I cancel my membership at any time?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}},"border":{"radius":{"bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"base","textColor":"body-text"} -->
<div role="region" class="wp-block-accordion-panel has-body-text-color has-base-background-color has-text-color has-background has-link-color" style="border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:0;padding-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} -->
<p style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">Yes. You can cancel any time from your account page, and you'll keep full access through the end of your current billing period.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} -->
<div class="wp-block-accordion-item" style="margin-bottom:var(--wp--preset--spacing--10)"><!-- wp:accordion-heading {"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"},"width":"0px","style":"none"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"backgroundColor":"buttons","textColor":"base"} -->
<h3 class="wp-block-accordion-heading has-icon has-icon-right has-base-color has-buttons-background-color has-text-color has-background has-link-color" style="border-style:none;border-width:0px;border-top-left-radius:8px;border-top-right-radius:8px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-bottom:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">What payment methods do you accept?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}},"border":{"radius":{"bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"base","textColor":"body-text"} -->
<div role="region" class="wp-block-accordion-panel has-body-text-color has-base-background-color has-text-color has-background has-link-color" style="border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:0;padding-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} -->
<p style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">We accept all major credit cards as well as PayPal. Your payment details are processed securely and are never stored on our servers.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item --></div>
<!-- /wp:accordion --></div>
<!-- /wp:group -->