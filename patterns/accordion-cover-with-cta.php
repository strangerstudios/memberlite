<?php
/**
 * Title: FAQ Accordion With Cover Image And CTA
 * Slug: memberlite/accordion-cover-with-cta
 * Description: Full-width cover image section with intro content and a CTA button on the left, and a caret-style accordion on the right. Content is static and should be customized per site.
 * Categories: memberlite-accordion
 * Keywords: faq, accordion, questions, cta, cover, community
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/daphne-fecheyr-VCET-_hySnU-unsplash-md.jpg","dimRatio":90,"overlayColor":"site-navigation-background","isUserOverlayColor":true,"isDark":false,"align":"wide","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignwide is-light" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/daphne-fecheyr-VCET-_hySnU-unsplash-md.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-site-navigation-background-background-color has-background-dim-90 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20"}}}} -->
<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"letterSpacing":"1px"}},"textColor":"color-action","fontSize":"21","fontFamily":"roboto"} -->
<p class="has-color-action-color has-text-color has-link-color has-roboto-font-family has-21-font-size" style="letter-spacing:1px"><strong>Community</strong> <strong>Benefits</strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"35px","textTransform":"capitalize"},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link","fontFamily":"libre-baskerville"} -->
<h2 class="wp-block-heading has-site-navigation-link-color has-text-color has-link-color has-libre-baskerville-font-family" style="margin-top:var(--wp--preset--spacing--10);margin-bottom:0;font-size:35px;text-transform:capitalize"><strong>What </strong>you need to know about joining the community</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"textColor":"site-navigation-link"} -->
<p class="has-site-navigation-link-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--10)">We've pulled together the questions new members ask us most, so you know exactly what to expect before you join.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-pill","style":{"typography":{"textTransform":"capitalize"}},"fontSize":"24"} -->
<div class="wp-block-button is-style-pill"><a class="wp-block-button__link has-24-font-size has-custom-font-size wp-element-button" style="text-transform:capitalize">Join now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:accordion {"className":"is-style-accrdn-caret","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|30","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}}},"backgroundColor":"site-navigation-background","textColor":"site-navigation-link"} -->
<div role="group" class="wp-block-accordion is-style-accrdn-caret has-site-navigation-link-color has-site-navigation-background-background-color has-text-color has-background has-link-color" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--10)"><!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}}}} -->
<div class="wp-block-accordion-item" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;margin-bottom:0"><!-- wp:accordion-heading {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"fontSize":"24","fontFamily":"libre-baskerville"} -->
<h3 class="wp-block-accordion-heading has-libre-baskerville-font-family has-24-font-size" style="border-style:none;border-width:0px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">What does membership cost?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph -->
<p>Pricing varies by plan, and we offer a discount for annual memberships. You can compare all current options on our membership levels page.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}}}} -->
<div class="wp-block-accordion-item" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;margin-bottom:0"><!-- wp:accordion-heading {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"fontSize":"24","fontFamily":"libre-baskerville"} -->
<h3 class="wp-block-accordion-heading has-libre-baskerville-font-family has-24-font-size" style="border-style:none;border-width:0px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">What do I get access to as a member?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph -->
<p>Members get full access to our private community, exclusive resources, and monthly live events, everything you need to get the most out of belonging.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

<!-- wp:accordion-item {"style":{"spacing":{"margin":{"bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|borders","width":"1px"}}}} -->
<div class="wp-block-accordion-item" style="border-bottom-color:var(--wp--preset--color--borders);border-bottom-width:1px;margin-bottom:0"><!-- wp:accordion-heading {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"fontSize":"24","fontFamily":"libre-baskerville"} -->
<h3 class="wp-block-accordion-heading has-libre-baskerville-font-family has-24-font-size" style="border-style:none;border-width:0px"><button type="button" class="wp-block-accordion-heading__toggle" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span class="wp-block-accordion-heading__toggle-title">How do I cancel if it's not for me?</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel {"style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
<div role="region" class="wp-block-accordion-panel" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:paragraph -->
<p>You can cancel any time from your account page. There are no long-term contracts, and you'll keep access through the end of your billing period.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item --></div>
<!-- /wp:accordion --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->
