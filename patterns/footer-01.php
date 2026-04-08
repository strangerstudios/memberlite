<?php
/**
 * Title: Footer: Basic
 * Slug: memberlite/footer-01
 * Description: The default footer.
 * Categories: memberlite-footer, footer
 * Keywords: footer, links
 * Block Types: core/post-content
 * Post Types: memberlite_footer
 * @package WordPress
 * @subpackage Memberlite
 * @since TBD
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">

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
