<?php
/**
 * Memberlite Pattern: Content Upgrade 2
 *
 * @since TBD
 */

return [
	'title'       => __( 'Content Upgrade 2', 'memberlite' ),
	'description' => __( 'Text and image "content upgrade" call to action to build your email list or promote offers', 'memberlite' ),
	'categories'  => [ __( 'memberlite-cta', 'memberlite' ), __( 'memberlite-featured', 'memberlite' ) ],
	'keywords'    => [
		__( 'marketing', 'memberlite' ),
		__( 'call to action', 'memberlite' ),
		__( 'cta', 'memberlite' ),
		__( 'content upgrade', 'memberlite' ),
		__( 'promotion', 'memberlite' ),
		__( 'lead magnet', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20","margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-pmpro-card has-base-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">' . __( 'Free Resource for Members', 'memberlite' ) . '</h3>
	<!-- /wp:heading -->

	<!-- wp:image {"linkDestination":"none","className":"is-style-default"} -->
	<figure class="wp-block-image is-style-default"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/experts/cathryn-lavery-fMD_Cru6OTk-unsplash-md.jpg" alt="' . esc_attr__( 'Notebook on a wooden desk with hands holding a pen writing.', 'memberlite' ) . '"/></figure>
	<!-- /wp:image -->

	<!-- wp:paragraph -->
	<p>' . __( 'Download our free starter guide to see what membership is all about. Practical tips you can use right away, with no strings attached.', 'memberlite' ) . '</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary","width":100} -->
		<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button">' . __( 'Download Free Guide', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
];
