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
<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'New here? Let\'s get you started.', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php esc_html_e( 'We\'ve curated the perfect starting point just for you!', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"blockGap":{"left":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"site-navigation-background"} -->
<div class="wp-block-columns has-site-navigation-background-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"style":{"border":{"radius":{"topLeft":"8px","bottomLeft":"8px"}}}} -->
<div class="wp-block-column" style="border-top-left-radius:8px;border-bottom-left-radius:8px"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":"8px","bottomLeft":"8px"}}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/people/michael-dam-mEZ3PoFGs_k-unsplash-sm.jpg" alt="<?php esc_attr_e( 'Person opening a laptop at a desk, ready to get started.', 'memberlite' ); ?>" style="border-top-left-radius:8px;border-bottom-left-radius:8px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-link"}}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":{"topRight":"8px","bottomRight":"8px"}}},"backgroundColor":"site-navigation-background","textColor":"site-navigation-link"} -->
<div class="wp-block-column is-vertically-aligned-center has-site-navigation-link-color has-site-navigation-background-background-color has-text-color has-background has-link-color" style="border-top-right-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph -->
<p><?php esc_html_e( 'Our most popular member content — quick-start guides, foundational reads, and can\'t-miss resources — is hand-picked to help new members find their footing fast.', 'memberlite' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-faded-edges"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-faded-edges"/>
<!-- /wp:separator -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'No overwhelm, just the essentials to get you moving in the right direction.', 'memberlite' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Start Exploring', 'memberlite' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
