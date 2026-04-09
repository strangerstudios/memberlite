<?php
/**
 * Title: Footer: Community Stats & Links
 * Slug: memberlite/footer-06
 * Description: Community stat callouts above a logo and link columns. Great for showcasing your membership community. Light background.
 * Categories: memberlite-footer, footer
 * Keywords: footer, stats, community, numbers, social proof
 * Block Types: core/post-content
 * Post Types: memberlite_footer
 * Note: Update the stat numbers and labels to reflect your actual community metrics.
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"align":"full","className":"footer-variation-06","style":{"border":{"top":{"color":"var:preset|color|borders","width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"footer-widgets-background","textColor":"footer-widgets","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull footer-variation-06 has-footer-widgets-color has-footer-widgets-background-background-color has-text-color has-background has-link-color" style="border-top-color:var(--wp--preset--color--borders);border-top-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:25%">

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"textColor":"footer-widgets","fontSize":"42"} -->
			<p class="has-text-align-center has-footer-widgets-color has-text-color has-42-font-size" style="font-style:normal;font-weight:900"><?php esc_html_e( '2,500+', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.07em"}},"textColor":"footer-widgets","fontSize":"16"} -->
			<p class="has-text-align-center has-footer-widgets-color has-text-color has-16-font-size" style="font-weight:500;letter-spacing:0.07em;text-transform:uppercase"><?php esc_html_e( 'Active Members', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:25%">

			<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"textColor":"footer-widgets","fontSize":"42"} -->
			<h3 class="wp-block-heading has-text-align-center has-footer-widgets-color has-text-color has-42-font-size" style="font-style:normal;font-weight:900"><?php esc_html_e( '75+', 'memberlite' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.07em"}},"textColor":"footer-widgets","fontSize":"16"} -->
			<p class="has-text-align-center has-footer-widgets-color has-text-color has-16-font-size" style="font-weight:500;letter-spacing:0.07em;text-transform:uppercase"><?php esc_html_e( 'Courses & Resources', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:25%">

			<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"textColor":"footer-widgets","fontSize":"42"} -->
			<h3 class="wp-block-heading has-text-align-center has-footer-widgets-color has-text-color has-42-font-size" style="font-style:normal;font-weight:900"><?php esc_html_e( '10K+', 'memberlite' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.07em"}},"textColor":"footer-widgets","fontSize":"16"} -->
			<p class="has-text-align-center has-footer-widgets-color has-text-color has-16-font-size" style="font-weight:500;letter-spacing:0.07em;text-transform:uppercase"><?php esc_html_e( 'Community Posts', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column" style="flex-basis:25%">

			<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"textColor":"footer-widgets","fontSize":"42"} -->
			<h3 class="wp-block-heading has-text-align-center has-footer-widgets-color has-text-color has-42-font-size" style="font-style:normal;font-weight:900"><?php esc_html_e( 'Since 2015', 'memberlite' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.07em"}},"textColor":"footer-widgets","fontSize":"16"} -->
			<p class="has-text-align-center has-footer-widgets-color has-text-color has-16-font-size" style="font-weight:500;letter-spacing:0.07em;text-transform:uppercase"><?php esc_html_e( 'Years Running', 'memberlite' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"borders"} -->
	<hr class="wp-block-separator alignwide has-text-color has-borders-color has-alpha-channel-opacity has-borders-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"/>
	<!-- /wp:separator -->

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

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"-0.03em"}},"textColor":"footer-widgets"} -->
			<p class="has-footer-widgets-color has-text-color" style="letter-spacing:-0.03em;text-transform:uppercase"><strong><?php esc_html_e( 'Membership', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<ul class="wp-block-list is-style-plain">
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Membership Levels', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Join Now', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'Member Login', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="#"><?php esc_html_e( 'My Account', 'memberlite' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
		<div class="wp-block-column">

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"-0.03em"}},"textColor":"footer-widgets"} -->
			<p class="has-footer-widgets-color has-text-color" style="letter-spacing:-0.03em;text-transform:uppercase"><strong><?php esc_html_e( 'Resources', 'memberlite' ); ?></strong></p>
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

			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"-0.03em"}},"textColor":"footer-widgets"} -->
			<p class="has-footer-widgets-color has-text-color" style="letter-spacing:-0.03em;text-transform:uppercase"><strong><?php esc_html_e( 'Follow Along', 'memberlite' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"footer-widgets","size":"has-normal-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"#","service":"facebook"} /-->
				<!-- wp:social-link {"url":"#","service":"instagram"} /-->
				<!-- wp:social-link {"url":"#","service":"x"} /-->
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
			</ul>
			<!-- /wp:social-links -->

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

		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|footer-widgets"}}}}} -->
		<p class="has-link-color" style="--wp--elements--link--color--text:var(--wp--preset--color--footer-widgets)"><a href="#"><?php esc_html_e( 'Privacy Policy', 'memberlite' ); ?></a> &nbsp;·&nbsp; <a href="#"><?php esc_html_e( 'Terms of Service', 'memberlite' ); ?></a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
