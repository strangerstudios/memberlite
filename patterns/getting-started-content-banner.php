<?php
/**
 * Title: Getting Started Content Banner
 * Slug: memberlite/getting-started-content-banner
 * Description: A full-width banner inviting new or beginner members to a curated starting point, with a photo card and call to action.
 * Categories: memberlite-content
 * Keywords: onboarding, getting started, beginner, new member, orientation, cta
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20)"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"42"} -->
<h2 class="wp-block-heading has-text-align-center has-42-font-size">New here? Let's get you started.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0"}}},"fontSize":"32"} -->
<p class="has-text-align-center has-32-font-size" style="margin-top:0"><strong>We've curated the perfect starting point just for you!</strong></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"0"},"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns" style="padding-right:0;padding-left:0"><!-- wp:column {"style":{"border":{"radius":{"topLeft":"8px","bottomLeft":"8px"}}}} -->
<div class="wp-block-column" style="border-top-left-radius:8px;border-bottom-left-radius:8px"><!-- wp:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":"10px","bottomLeft":"10px"}}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/michael-dam-mEZ3PoFGs_k-unsplash-sm.jpg" alt="Person opening a laptop at a desk, ready to get started." style="border-top-left-radius:10px;border-bottom-left-radius:10px;aspect-ratio:9/16;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topRight":"10px","bottomRight":"10px"}}},"backgroundColor":"base","textColor":"site-navigation-link"} -->
<div class="wp-block-column has-site-navigation-link-color has-base-background-color has-text-color has-background has-link-color" style="border-top-right-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"fontSize":"21"} -->
<p class="has-21-font-size"><strong>Not sure where to begin?</strong> Here's what we recommend first.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size">Our most popular member content — quick-start guides, foundational reads, and can't-miss resources — is hand-picked to help new members find their footing fast.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"16"} -->
<p class="has-16-font-size">No overwhelm, just the essentials to get you moving in the right direction.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"site-navigation-background","style":{"typography":{"textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}},"fontSize":"21"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-site-navigation-background-color has-text-color has-link-color has-21-font-size has-custom-font-size wp-element-button" style="text-transform:capitalize">Start exploring</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
