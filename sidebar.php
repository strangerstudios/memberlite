<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Member Lite 2.0
 */

/*
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
*/
?>
<?php do_action('before_sidebar'); ?>
<div id="secondary" class="medium-4 columns widget-area" role="complementary">
<?php do_action('before_sidebar_widgets'); ?>
<?php 
	$memberlite_custom_sidebar = get_post_meta($post->ID, '_memberlite_custom_sidebar', true);
	$memberlite_default_sidebar = get_post_meta($post->ID, '_memberlite_default_sidebar', true);
	if(bbp_is_single_topic())
	{
		$memberlite_custom_sidebar = get_post_meta(bbp_get_forum_id(), '_memberlite_custom_sidebar', true);
		$memberlite_default_sidebar = get_post_meta(bbp_get_forum_id(), '_memberlite_default_sidebar', true);
	}
	
	if(empty($memberlite_default_sidebar) || $memberlite_default_sidebar == 'default_sidebar_above')
	{
		memberlite_getSidebar();
	}

	if(!empty($memberlite_custom_sidebar))
	{
		//Custom sidebar
		dynamic_sidebar($memberlite_custom_sidebar);
	}

	if(!empty($memberlite_default_sidebar) && $memberlite_default_sidebar == 'default_sidebar_below')
	{
		memberlite_getSidebar();
	}
?>
<?php do_action('after_sidebar_widgets'); ?>
</div><!-- #secondary -->
<?php do_action('after_sidebar'); ?>