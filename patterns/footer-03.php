<?php
/**
 * Title: Footer: Logo & Four Member Columns
 * Slug: memberlite/footer-03
 * Description: Logo and branding on top, with four link columns below. Dark background.
 * Categories: memberlite-footer, footer
 * Keywords: footer, logo, columns, links, membership, dark
 * Block Types: core/post-content
 * Post Types: memberlite_footer
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"full","className":"footer-variation-03","style":{"border":{"top":{"color":"var:preset|color|borders","width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull footer-variation-03 has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="border-top-color:var(--wp--preset--color--borders);border-top-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:site-logo {"width":140,"className":"is-style-rounded","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|10"}}}} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:site-title {"level":0,"isLink":false,"fontSize":"24","fontFamily":"raleway"} /-->
			<!-- wp:site-tagline {"fontSize":"24","fontFamily":"raleway"} /-->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"10px"} -->
	<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"site-navigation-background"} -->
			<p class="has-site-navigation-background-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'Member Area', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Membership Levels', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Join Now', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Member Login', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'My Account', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"site-navigation-background"} -->
			<p class="has-site-navigation-background-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'Support', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Contact Us', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Help Center', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Refund Policy', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"site-navigation-background"} -->
			<p class="has-site-navigation-background-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'Quick Links', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Courses & Training', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Community', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Blog', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Events', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"site-navigation-background"} -->
			<p class="has-site-navigation-background-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'Connect', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Our Story', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Who We Help', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Our Team', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:social-links {"iconColor":"site-navigation-background","iconColorValue":"#ffffff","size":"has-normal-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
			<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"#","service":"facebook"} /-->
				<!-- wp:social-link {"url":"#","service":"instagram"} /-->
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				<!-- wp:social-link {"url":"#","service":"youtube"} /-->
			</ul>
			<!-- /wp:social-links -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:spacer {"height":"10px"} -->
	<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","verticalAlignment":"center"}} -->
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

		<!-- wp:paragraph --><p><a href="#"><?php esc_html_e( 'Privacy Policy', 'memberlite' ); ?></a></p><!-- /wp:paragraph -->
		<!-- wp:paragraph --><p><a href="#"><?php esc_html_e( 'Terms', 'memberlite' ); ?></a></p><!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
