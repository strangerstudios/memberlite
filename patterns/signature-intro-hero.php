<?php
/**
 * Title: Signature Introduction Hero
 * Slug: memberlite/signature-intro-hero
 * Description: A personal introduction hero with a script-style signature, headline, short bio, portrait, and CTAs. Good for one-person expert or coaching sites.
 * Categories: memberlite-about, memberlite-hero
 * Keywords: hero, about, signature, founder, coach, expert, bio
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"0"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}}},"textColor":"color-action","fontSize":"36","fontFamily":"great-vibes"} -->
<p class="has-color-action-color has-text-color has-link-color has-great-vibes-font-family has-36-font-size">Sarah Mitchell</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"letterSpacing":"2px"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"36","fontFamily":"libre-baskerville"} -->
<h2 class="wp-block-heading has-libre-baskerville-font-family has-36-font-size" style="margin-top:var(--wp--preset--spacing--10);letter-spacing:2px">Grow with guidance you can trust</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"fontFamily":"karla"} -->
<p class="has-karla-font-family" style="margin-top:var(--wp--preset--spacing--10);margin-bottom:var(--wp--preset--spacing--10)">I've spent the last decade helping members build better habits, gain clarity, and stay accountable through personalized guidance, exclusive resources, and a community that cheers you on.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
<div class="wp-block-buttons" style="margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:button {"className":"is-style-sharp","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"fontFamily":"karla"} -->
<div class="wp-block-button is-style-sharp"><a class="wp-block-button__link has-karla-font-family wp-element-button" style="letter-spacing:1px;text-transform:uppercase">Contact</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-arrow-plain","style":{"typography":{"letterSpacing":"1px","textTransform":"uppercase"}}} -->
<div class="wp-block-button is-style-arrow-plain"><a class="wp-block-button__link wp-element-button" style="letter-spacing:1px;text-transform:uppercase">View Plans</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":"50px","bottomRight":"50px"}},"color":{"duotone":"var:preset|duotone|grayscale"},"spacing":{"margin":{"left":"var:preset|spacing|30"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-left:var(--wp--preset--spacing--30)"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/meg-wagener-M7fbJyBuAag-unsplash-sm.jpg" alt="Portrait of the site founder." style="border-top-left-radius:50px;border-bottom-right-radius:50px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
