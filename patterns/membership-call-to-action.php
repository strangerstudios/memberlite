<?php
/**
 * Title: Membership Call To Action
 * Slug: memberlite/membership-call-to-action
 * Description: Promote your membership levels to increase signups.
 * Categories: memberlite-cta
 * Keywords: marketing, call to action, cta, promotion, join, subscribe, membership
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"42"} -->
	<h2 class="wp-block-heading has-text-align-center has-42-font-size"><?php esc_html_e( 'Start Your Membership Today', 'memberlite' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}},"fontSize":"21"} -->
	<p class="has-text-align-center has-link-color has-21-font-size"><?php esc_html_e( 'Get instant access to exclusive content, resources, and a community of members who share your goals.', 'memberlite' ); ?> <a href="#"><?php esc_html_e( 'Compare membership levels', 'memberlite' ); ?></a> <?php esc_html_e( 'to find the right fit.', 'memberlite' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Join Now', 'memberlite' ); ?></a></div>
		<!-- /wp:button -->
		<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#"><?php esc_html_e( 'Compare Plans', 'memberlite' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->