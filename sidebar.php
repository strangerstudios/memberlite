<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Memberlite
 */
?>

<?php do_action('before_sidebar'); ?>

<div id="secondary" class="medium-<?php echo memberlite_getColumnsRatio( 'sidebar' ); ?> columns widget-area" role="complementary">

<?php do_action('before_sidebar_widgets'); ?>

<?php 
	//Get the page settings for the custom sidebar
	if( is_singular() ) {	
		$memberlite_custom_sidebar = get_post_meta( $post->ID, '_memberlite_custom_sidebar', true );
		$memberlite_default_sidebar = get_post_meta( $post->ID, '_memberlite_default_sidebar', true );
	}

	//Get the page settings for the bbPress sidebars by the topic's parent forum
	if( function_exists( 'is_bbpress' ) && is_bbpress() ) {
		if(bbp_is_single_topic() || bbp_is_single_forum() ) {
			$memberlite_custom_sidebar = get_post_meta( bbp_get_forum_id(), '_memberlite_custom_sidebar', true );
			$memberlite_default_sidebar = get_post_meta( bbp_get_forum_id(), '_memberlite_default_sidebar', true );	
		} else {
			$memberlite_default_sidebar = 'default_sidebar_above';
		}
	}		

	//Show the default sidebar unless disabled
	if( empty( $memberlite_default_sidebar) || $memberlite_default_sidebar == 'default_sidebar_above' ) {
		memberlite_get_sidebar_content();
	}

	//Show the custom sidebar if set
	if( !empty( $memberlite_custom_sidebar ) ) {
		dynamic_sidebar($memberlite_custom_sidebar);
	}

	//Show the default sidebar if set to display after the custom sidebar
	if(!empty( $memberlite_default_sidebar ) && $memberlite_default_sidebar == 'default_sidebar_below') {
		memberlite_get_sidebar_content();
	}
?>

<?php do_action('after_sidebar_widgets'); ?>

</div><!-- #secondary -->

<?php do_action('after_sidebar'); ?>
