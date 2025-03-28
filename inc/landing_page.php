<?php
/*
	Function to display content after the page.
*/
function memberlite_landing_page_after_content_page( ) {
	global $post;
	//Show the landing page level checkout button and upsell
	if( is_page_template( 'templates/landing.php' ) && defined( 'PMPRO_VERSION' ) ) {
		//Get settings for landing page
		$pmproal_landing_page_level = get_post_meta($post->ID,'_pmproal_landing_page_level',true);
		$memberlite_landing_page_checkout_button = get_post_meta($post->ID,'_memberlite_landing_page_checkout_button',true);
		$memberlite_landing_page_upsell = get_post_meta($post->ID,'_memberlite_landing_page_upsell',true);

		$level = pmpro_getLevel( $pmproal_landing_page_level );

		//Set default checkout button text
		if( empty( $memberlite_landing_page_checkout_button ) ) {
			$memberlite_landing_page_checkout_button = 'Select';
		}

		//Show the landing page level checkout button
		if( !empty( $level ) ) {
			echo '<p><a class="btn btn_action" href="' . esc_url( add_query_arg( 'level', $pmproal_landing_page_level, pmpro_url( 'checkout' ) ) ) . '">' . esc_attr( $memberlite_landing_page_checkout_button ) . '</a></p>';
		}

		//Show the landing page level upsell pricing block
		if( !empty( $memberlite_landing_page_upsell ) && ( is_numeric( $memberlite_landing_page_upsell ) ) && shortcode_exists( 'pmpro_advanced_levels' ) ) {
			echo '<hr />';
			echo do_shortcode('[pmpro_advanced_levels levels="' . intval($memberlite_landing_page_upsell) . '" back_link="false"]');
		}
	}
}
add_action( 'memberlite_after_content_page', 'memberlite_landing_page_after_content_page' );
