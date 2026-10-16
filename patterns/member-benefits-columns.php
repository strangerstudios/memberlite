<?php
/**
 * Title: Member Benefits Columns
 * Slug: memberlite/member-benefits-columns
 * Description: An intro column with a heading, description, and CTA alongside three bordered benefit columns with icon badges. Icon badges use the Memberlite Font Awesome shortcode rather than the WordPress 7.0 Icon block, for compatibility with sites not yet on WordPress 7.0.
 * Categories: memberlite-about, memberlite-features
 * Keywords: benefits, features, icons, columns, membership, services
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite TBD
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|color-action"}}},"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"color-action"} -->
			<p class="has-color-action-color has-text-color has-link-color" style="letter-spacing:1px;text-transform:uppercase"><strong>Benefits</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"capitalize"}},"fontSize":"32"} -->
			<h2 class="wp-block-heading has-32-font-size" style="text-transform:capitalize">Why members choose us</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Your membership unlocks more than content — it's a community, a resource library, and support whenever you need it.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"width":75,"className":"is-style-outline"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link wp-element-button" href="#">Learn more</a></div>
				<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders","width":"25%"} -->
		<div class="wp-block-column has-border-color has-borders-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20);border-radius:8px;flex-basis:25%"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
			<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="users" color="site-background" background="secondary" shape="circle"]</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"capitalize"}},"fontSize":"24","level":3} -->
			<h3 class="wp-block-heading has-24-font-size" style="text-transform:capitalize">Community access</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Connect with other members in our private discussion forums and events.</p>
			<!-- /wp:paragraph --></div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders","width":"25%"} -->
		<div class="wp-block-column has-border-color has-borders-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20);border-radius:8px;flex-basis:25%"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
			<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="book-open" color="site-background" background="secondary" shape="circle"]</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"capitalize"}},"fontSize":"24","level":3} -->
			<h3 class="wp-block-heading has-24-font-size" style="text-transform:capitalize">Exclusive content</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Get instant access to premium articles, videos, and downloadable resources.</p>
			<!-- /wp:paragraph --></div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders","width":"25%"} -->
		<div class="wp-block-column has-border-color has-borders-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20);border-radius:8px;flex-basis:25%"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"21"} -->
			<p class="has-21-font-size" style="font-style:normal;font-weight:700">[fa icon="headset" color="site-background" background="secondary" shape="circle"]</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"capitalize"}},"fontSize":"24","level":3} -->
			<h3 class="wp-block-heading has-24-font-size" style="text-transform:capitalize">Priority support</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Get faster responses and dedicated help whenever you need it.</p>
			<!-- /wp:paragraph --></div>
		<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
<!-- /wp:group -->