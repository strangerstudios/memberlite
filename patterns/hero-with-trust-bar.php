<?php
/**
 * Title: Hero With Trust Bar
 * Slug: memberlite/hero-with-trust-bar
 * Description: A full-width cover image hero with a rounded bottom edge, centered headline and CTAs, and a trust bar highlighting reviews and guarantees.
 * Categories: memberlite-hero
 * Keywords: hero, cover, cta, trust, reviews, guarantee
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 8.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:separator {"className":"is-style-double"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-double"/>
<!-- /wp:separator -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"textAlign":"center","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"textColor":"body-text","fontSize":"54"} -->
<h2 class="wp-block-heading has-text-align-center has-body-text-color has-text-color has-link-color has-54-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Everything Your Members Need. All in One Place.', 'memberlite' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"textColor":"body-text","fontSize":"21"} -->
<p class="has-text-align-center has-body-text-color has-text-color has-link-color has-21-font-size"><?php esc_html_e( 'Join a growing community of members getting exclusive content, tools, and support to help them succeed.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Join Now', 'memberlite' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"body-text","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-body-text-color has-text-color has-link-color wp-element-button" href="#"><?php esc_html_e( 'View Membership Plans', 'memberlite' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:separator {"className":"is-style-double"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-double"/>
<!-- /wp:separator -->

<!-- wp:group {"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px"><!-- wp:paragraph -->
<p><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-color-action-color">★ ★ ★ ★ ★</mark></strong> <?php esc_html_e( '500+ Reviews', 'memberlite' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>•</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php esc_html_e( 'Cancel Anytime', 'memberlite' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>•</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php esc_html_e( '30-Day Guarantee', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
