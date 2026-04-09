<?php
/**
 * Title: Footer: Minimal — Centered Bar
 * Slug: memberlite/footer-02
 * Description: Minimal centered footer with copyright, navigation, social icons, and site tagline. Light background.
 * Categories: memberlite-footer, footer
 * Keywords: footer, minimal, centered, simple
 * Block Types: core/post-content
 * Post Types: memberlite_footer
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"full","className":"footer-variation-02","style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"top":{"color":"var:preset|color|borders","width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}},"backgroundColor":"footer-widgets-background","textColor":"footer-widgets","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull footer-variation-02 has-footer-widgets-color has-footer-widgets-background-background-color has-text-color has-background has-link-color" style="border-top-color:var(--wp--preset--color--borders);border-top-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph --><p>©</p><!-- /wp:paragraph -->
			<!-- wp:site-title {"level":0,"isLink":false,"style":{"typography":{"lineHeight":"1.7"}},"fontSize":"18"} /-->
			<!-- wp:paragraph {"style":{"spacing":{"padding":{"left":"4px"}}}} --><p style="padding-left:4px"><?php esc_html_e( 'All rights reserved.', 'memberlite' ); ?></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"textColor":"borders","fontSize":"14"} -->
		<p class="has-borders-color has-text-color has-14-font-size">|</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}}} --><p class="has-link-color" style="--wp--elements--link--color--text:var(--wp--preset--color--footer-widgets)"><a href="#"><?php esc_html_e( 'Membership Levels', 'memberlite' ); ?></a></p><!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}}} --><p class="has-link-color" style="--wp--elements--link--color--text:var(--wp--preset--color--footer-widgets)"><a href="#"><?php esc_html_e( 'Login', 'memberlite' ); ?></a></p><!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}}} --><p class="has-link-color" style="--wp--elements--link--color--text:var(--wp--preset--color--footer-widgets)"><a href="#"><?php esc_html_e( 'Blog', 'memberlite' ); ?></a></p><!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}}} --><p class="has-link-color" style="--wp--elements--link--color--text:var(--wp--preset--color--footer-widgets)"><a href="#"><?php esc_html_e( 'Contact', 'memberlite' ); ?></a></p><!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:social-links {"iconColor":"footer-widgets","iconColorValue":"#222222","size":"has-normal-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
		<!-- wp:social-link {"url":"#","service":"facebook"} /-->
		<!-- wp:social-link {"url":"#","service":"instagram"} /-->
		<!-- wp:social-link {"url":"#","service":"x"} /-->
		<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
		<!-- wp:social-link {"url":"#","service":"youtube"} /-->
	</ul>
	<!-- /wp:social-links -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}}},"backgroundColor":"borders"} -->
	<hr class="wp-block-separator alignwide has-text-color has-borders-color has-alpha-channel-opacity has-borders-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--30)"/>
	<!-- /wp:separator -->

	<!-- wp:site-tagline {"textAlign":"center","fontSize":"24","fontFamily":"raleway"} /-->

</div>
<!-- /wp:group -->
