<?php
/**
 * Title: Content Upgrade 2
 * Slug: memberlite/content-upgrade-2
 * Description: Text and image "content upgrade" call to action to build your email list or promote offers
 * Categories: memberlite-cta
 * Keywords: marketing, call to action, cta, content upgrade, promotion, lead magnet
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}},"border":{"width":"1px","radius":"8px"}},"borderColor":"borders","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading">Member Resources</h3>
	<!-- /wp:heading -->
	<!-- wp:image {"linkDestination":"none","className":"is-style-plain","style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
	<figure class="wp-block-image is-style-plain"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/experts/cathryn-lavery-fMD_Cru6OTk-unsplash-md.jpg" alt="Notebook on a wooden desk with hands holding a pen writing."/></figure>
	<!-- /wp:image -->
	<!-- wp:paragraph -->
	<p>Download our free starter guide to see what membership is all about. Practical tips you can use right away, with no strings attached.</p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary","width":100} -->
		<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button">Download Free Guide</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
