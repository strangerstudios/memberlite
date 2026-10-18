<?php
/**
 * Title: Feature List With Icons
 * Slug: memberlite/content-feature-list-with-icons
 * Description: Gradient-framed card with a heading and a two-column list of icon feature callouts. Content is static and should be customized per site. Icon badges use the Memberlite Font Awesome shortcode rather than the WordPress 7.0 Icon block, for compatibility with sites not yet on WordPress 7.0.
 * Categories: memberlite-content, memberlite-features
 * Keywords: features, benefits, courses, community, icons, list
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"color-secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-color-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"align":"wide","style":{"border":{"radius":"8px"},"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|body-text"}}}},"backgroundColor":"base","textColor":"body-text","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-body-text-color has-base-background-color has-text-color has-background has-link-color" style="border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"30%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","textAlign":"center"}},"fontSize":"24","fontFamily":"heading"} -->
<p class="has-text-align-center has-heading-font-family has-24-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e( 'Take our courses on the go. Learn wherever and whenever it\'s convenient.', 'memberlite' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Browse Courses', 'memberlite' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"%","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"left":"var:preset|spacing|40"}},"border":{"left":{"color":"var:preset|color|borders","width":"3px"}}}} -->
<div class="wp-block-column is-vertically-aligned-top" style="border-left-color:var(--wp--preset--color--borders);border-left-width:3px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>[fa icon="users" color="site-navigation-background" background="action" shape="circle" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Connect with the Community', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Join discussions, ask questions, and connect with other members between lessons.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>[fa icon="key" color="site-navigation-background" background="action" shape="circle" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Login Anywhere with Magic Links', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Skip the password. Click the link we email you and you\'re signed in securely from any device.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>[fa icon="mobile-screen" color="site-navigation-background" background="action" shape="circle" size="2x"]</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.25em"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p><strong><?php esc_html_e( 'Learn on Desktop or Mobile', 'memberlite' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Pick up right where you left off, whether you\'re at your desk or on the go.', 'memberlite' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
