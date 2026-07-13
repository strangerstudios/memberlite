<?php
/**
 * Title: Hero With Scroll Indicator
 * Slug: memberlite/hero-with-scroll-indicator
 * Description: A full-width cover image hero with a left-aligned headline, CTAs, and a scroll indicator cue to encourage visitors to keep exploring the page.
 * Categories: memberlite-hero
 * Keywords: hero, cover, cta, scroll, scroll indicator, welcome
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/joshua-sortino-f3uWi9G-lus-unsplash-md.jpg","dimRatio":70,"overlayColor":"site-navigation-link","isUserOverlayColor":true,"sizeSlug":"full","align":"full","className":"is-style-scroll-indicator","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-style-scroll-indicator has-site-navigation-background-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/landscapes/joshua-sortino-f3uWi9G-lus-unsplash-md.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-site-navigation-link-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"fontSize":"42"} -->
<h2 class="wp-block-heading has-42-font-size">Your Community Starts <em>Here</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--10)">Join a growing community of members getting exclusive content, tools, and support to help them succeed — all in one place.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill","style":{"typography":{"textTransform":"capitalize"}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" style="text-transform:capitalize">Join now</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"site-navigation-background","className":"is-style-arrow-plain","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}}} -->
<div class="wp-block-button is-style-arrow-plain"><a class="wp-block-button__link has-site-navigation-background-color has-text-color has-link-color wp-element-button">Learn more</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->
