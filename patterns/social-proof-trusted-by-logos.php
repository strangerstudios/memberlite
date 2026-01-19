<?php
/**
 * Memberlite Pattern: Social Proof Trusted by Logos
 *
 * @since TBD
 */

return [
	'title'       => __( 'Social Proof Trusted by Logos', 'memberlite' ),
	'description' => __( 'Increase credibility by showcasing brands that use your products and services.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-featured', 'memberlite' ), __( 'memberlite-testimonials', 'memberlite' ) ],
	'keywords'    => [
		__( 'logos', 'memberlite' ),
		__( 'trusted by', 'memberlite' ),
		__( 'social proof', 'memberlite' ),
		__( 'users', 'memberlite' ),
		__( 'testimonials', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"120px","bottom":"120px","left":"60px","right":"60px"},"blockGap":"30px"},"color":{"background":"#ffffff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#ffffff;margin-top:0px;margin-bottom:0px;padding-top:120px;padding-right:60px;padding-bottom:120px;padding-left:60px">
	<!-- wp:heading {"textAlign":"center","align":"wide","style":{"typography":{"fontStyle":"normal","fontSize":"42px"},"color":{"text":"#000000"},"elements":{"link":{"color":{"text":"#000000"}}}}} -->
	<h2 class="wp-block-heading alignwide has-text-align-center has-text-color has-link-color" style="color:#000000;font-size:42px;font-style:normal">' . __( 'Our Members Work With', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"60px"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%","color":"#e0e0e0","width":"1px"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/logos/wealth-builders-association.png' ) . '" alt="' . __( 'Wealth Builders Association Logo', 'memberlite' ) . '" class="has-border-color" style="border-color:#e0e0e0;border-width:1px;border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%","color":"#e0e0e0","width":"1px"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/logos/financial-mastery-society.png' ) . '" alt="' . __( 'Financial Mastery Society Logo', 'memberlite' ) . '" class="has-border-color" style="border-color:#e0e0e0;border-width:1px;border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%","color":"#e0e0e0","width":"1px"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/logos/future-scholars-alliance.png' ) . '" alt="' . __( 'Future Scholars Alliance Logo', 'memberlite' ) . '" class="has-border-color" style="border-color:#e0e0e0;border-width:1px;border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%","color":"#e0e0e0","width":"1px"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/logos/investment-strategies-guild.png' ) . '" alt="' . __( 'Investment Strategies Guild Logo', 'memberlite' ) . '" class="has-border-color" style="border-color:#e0e0e0;border-width:1px;border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%","color":"#e0e0e0","width":"1px"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/logos/money-management-consortium.png' ) . '" alt="' . __( 'Money Management Consortium Logo', 'memberlite' ) . '" class="has-border-color" style="border-color:#e0e0e0;border-width:1px;border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%","color":"#e0e0e0","width":"1px"}},"className":"is-style-rounded"} -->
			<figure class="wp-block-image has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/patterns/logos/real-estate-titans.png' ) . '" alt="' . __( 'Real Estate Titans Logo', 'memberlite' ) . '" class="has-border-color" style="border-color:#e0e0e0;border-width:1px;border-radius:100%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
];
