<?php
/**
 * Title: Footer: Member Login & Quick Links
 * Slug: memberlite/footer-04
 * Description: Bordered card footer with two stacked link columns and a login form. Light background. Requires Paid Memberships Pro.
 * Categories: memberlite-footer, footer
 * Keywords: footer, login, member, links, card, border
 * Block Types: core/post-content
 * Post Types: memberlite_footer
 * Note: Update links to point to your membership levels and checkout pages.
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">

	<!-- wp:group {"align":"wide","className":"footer-variation-04","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"},"width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|memberlite-links"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"footer-widgets-background","textColor":"footer-widgets","borderColor":"borders","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide footer-variation-04 has-border-color has-borders-border-color has-footer-widgets-color has-footer-widgets-background-background-color has-text-color has-background has-link-color" style="border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">

			<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column" style="flex-basis:25%">

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"color-primary"} -->
				<p class="has-color-primary-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'Member Area', 'memberlite' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<ul class="wp-block-list is-style-plain">
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Membership Levels', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Join Now', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Member Login', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'My Account', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:spacer {"height":"10px"} -->
				<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"color-primary"} -->
				<p class="has-color-primary-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'Support', 'memberlite' ); ?></strong></p>
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

			<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column" style="flex-basis:25%">

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"color-primary"} -->
				<p class="has-color-primary-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'Quick Links', 'memberlite' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<ul class="wp-block-list is-style-plain">
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Courses & Training', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Community', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Blog', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Events', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:spacer {"height":"10px"} -->
				<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"-0.03em"}},"textColor":"color-primary"} -->
				<p class="has-color-primary-color has-text-color" style="letter-spacing:-0.03em"><strong><?php esc_html_e( 'About Us', 'memberlite' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
				<ul class="wp-block-list is-style-plain">
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Our Story', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Who We Help', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
					<!-- wp:list-item {"style":{"spacing":{"margin":{"top":"4px","bottom":"4px"}}}} --><li style="margin-top:4px;margin-bottom:4px"><a href="#"><?php esc_html_e( 'Our Team', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"50%","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-column" style="flex-basis:50%">
				<!-- wp:pmpro/login-form /-->
			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

		<!-- wp:separator {"align":"wide","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"borders"} -->
		<hr class="wp-block-separator alignwide has-text-color has-borders-color has-alpha-channel-opacity has-borders-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"/>
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

			<!-- wp:paragraph -->
			<p><a href="#"><?php esc_html_e( 'Privacy Policy', 'memberlite' ); ?></a> &nbsp;·&nbsp; <a href="#"><?php esc_html_e( 'Terms of Service', 'memberlite' ); ?></a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
