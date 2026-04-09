<?php
/**
 * Title: Footer: Full - Logo, About & Links
 * Slug: memberlite/footer-08
 * Description: Full footer with logo, site tagline, and three link columns. Dark background.
 * Categories: memberlite-footer, footer
 * Keywords: footer, logo, links, columns, full
 * Block Types: core/post-content
 * Post Types: memberlite_footer
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"full","className":"footer-variation-08","style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"site-navigation-link","textColor":"site-navigation-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull footer-variation-08 has-site-navigation-background-color has-site-navigation-link-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"30%"} -->
		<div class="wp-block-column" style="flex-basis:30%">
			<!-- wp:site-logo {"width":140,"className":"is-style-rounded"} /-->
			<!-- wp:site-tagline {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"-0.03em"}},"textColor":"site-navigation-background"} -->
			<p class="has-site-navigation-background-color has-text-color" style="letter-spacing:-0.03em;text-transform:uppercase"><strong><?php esc_html_e( 'Membership', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Membership Levels', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Join Now', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Member Login', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'My Account', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Member Benefits', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"-0.03em"}},"textColor":"site-navigation-background"} -->
			<p class="has-site-navigation-background-color has-text-color" style="letter-spacing:-0.03em;text-transform:uppercase"><strong><?php esc_html_e( 'Resources', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Courses & Training', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Community', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Blog', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Events', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"-0.03em"}},"textColor":"site-navigation-background"} -->
			<p class="has-site-navigation-background-color has-text-color" style="letter-spacing:-0.03em;text-transform:uppercase"><strong><?php esc_html_e( 'Support', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Contact Us', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Help Center', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Privacy Policy', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Terms of Service', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Refund Policy', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}}},"backgroundColor":"borders"} -->
	<hr class="wp-block-separator alignwide has-text-color has-borders-color has-alpha-channel-opacity has-borders-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--30)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph --><p>©</p><!-- /wp:paragraph -->
			<!-- wp:site-title {"level":0,"isLink":false,"style":{"typography":{"lineHeight":"1.7"}},"fontSize":"18"} /-->
			<!-- wp:paragraph {"style":{"spacing":{"padding":{"left":"4px"}}}} --><p style="padding-left:4px"><?php esc_html_e( 'All rights reserved.', 'memberlite' ); ?></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|site-navigation-background"}}}}} -->
		<p class="has-link-color" style="--wp--elements--link--color--text:var(--wp--preset--color--site-navigation-background)"><a href="#"><?php esc_html_e( 'Privacy Policy', 'memberlite' ); ?></a> &nbsp;·&nbsp; <a href="#"><?php esc_html_e( 'Terms of Service', 'memberlite' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
