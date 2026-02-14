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
	'content'     => '<!-- wp:group {"className":"is-style-pmpro-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px","color":"#e0e0e0","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-pmpro-card has-border-color has-white-background-color has-background" style="border-color:#e0e0e0;border-width:1px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">' . __( 'Member Resources', 'memberlite' ) . '</h3>
	<!-- /wp:heading -->
	<!-- wp:image {"linkDestination":"none","className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
	<figure class="wp-block-image is-style-plain"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/patterns/experts/cathryn-lavery-fMD_Cru6OTk-unsplash-md.jpg" alt="' . esc_attr__( 'Notebook on a wooden desk with hands holding a pen writing.', 'memberlite' ) . '"/></figure>
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
