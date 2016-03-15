<?php
/**
 * Custom admin theme pages
 *
 * @package Memberlite
 */

/**
 * Adds Theme Support submenu page to "Appearance" menu.
 *
 */

function memberlite_theme_menu() {
	add_theme_page('Memberlite Documentation and Support', 'Memberlite', 'edit_theme_options', 'memberlite-support', 'memberlite_support');
}
add_action('admin_menu', 'memberlite_theme_menu');

function memberlite_support() {
	//only let admins get here
	if(!function_exists("current_user_can") || (!current_user_can("edit_theme_options") && !current_user_can("member_lite_options")))
	{
		die(__('You do not have permissions to perform this action.', 'memberlite'));
	}
	
	if(isset($_REQUEST['tab']))
		$view = $_REQUEST['tab'];
	else
		$view = "";
	?>
	<div id="wpbody-content" aria-label="Main content" tabindex="0">	
		<div class="wrap"><div class="metabox-holder">
			<h1><?php _e('Memberlite Theme Documentation', 'memberlite');?></h1>
			<div id="memberlite-shortcodes">
				<h2>Adding Your Logo</h2>
				<p>Use the Appearance Header Screen to add a Custom Header logo (formatted for retina display) and to toggle the display of header text and text color.</p>
				<p><?php 
					if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) 
					{
						?>
						<a href="<?php echo admin_url( 'themes.php?page=custom-header'); ?>">Edit Your Custom Header &raquo</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						<?php
					}
				?>
				<a href="http://www.paidmembershipspro.com/themes/memberlite/adding-your-logo/" target="_blank">Explore Documentation on Custom Headers in Memberlite &raquo;</a></p>
				<hr />
				<h2>Customize the Theme</h2>
				<p>Use the Customize Screen to modify theme layout, logo, fonts, colors, copyright message and more.</p>
				<p><a href="<?php echo wp_customize_url (); ?>">Customize Your Theme &raquo;</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="http://www.paidmembershipspro.com/themes/memberlite/customize-the-theme/" target="_blank">Explore Documentation on Customizing Memberlite &raquo;</a></p>
				<hr />
				<h2>Using Child Themes</h2>
				<p>If you need to customize the theme beyond the settings in "Customize", use a child theme.</p>
				<p><a href="https://github.com/strangerstudios/memberlite-child" target="_blank">Download a Blank Child Theme &raquo;</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="http://codex.wordpress.org/Child_Themes" target="_blank">About Child Themes (WordPress Codex)  &raquo; </a></p>
				<hr />
				<h2>Integrated Plugins</h2>
				<p>Memberlite includes formatting for use with:</p>
				<ul class="ul-disc">
					<li><strong><a href="http://www.paidmembershipspro.com" target="_blank">Paid Memberships Pro</a></strong><br /><a href="<?php echo admin_url( 'plugin-install.php?tab=search&s=paid+memberships+pro'); ?>">Install Plugin &raquo;</a></li>
					<li><strong><a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a></strong><br /><a href="<?php echo admin_url( 'plugin-install.php?tab=search&s=woocommerce'); ?>">Install Plugin &raquo;</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=term&s=Paid+Memberships+Pro+-+WooCommerce+Add+On'); ?>">Install PMPro WooCommerce Addon &raquo;</a></li>						
					<li><strong><a href="http://www.bbpress.org" target="_blank">bbPress</a></strong><br /><a href="<?php echo admin_url( 'plugin-install.php?tab=search&s=bbpress'); ?>">Install Plugin</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=term&s=Paid+Memberships+Pro+-+bbPress+Add+On'); ?>">Install PMPro bbPress Addon &raquo;</a></li>
					<li><strong><a href="http://wp-events-plugin.com" target="_blank">Events Manager</a></strong><br /><a href="<?php echo admin_url( 'plugin-install.php?tab=search&s=events+manager'); ?>">Install Plugin &raquo;</a></li>						
			</div>		
		</div></div><!-- /.wrap-->
	<div class="clear"></div></div>
	<?php	
}

/*
	Add a Banner Image as a secondary thumbnail
*/
function memberlite_banner_image_setup()
{
	//$memberlite_post_types = get_post_types( array('public' => true), 'names' );
	if (class_exists('MultiPostThumbnails')) {
	    $screens = get_post_types( array('public' => true), 'names' );
		foreach ($screens as $screen) 
		{
			if(in_array($screen, array('reply','topic')))
				continue;
			else
			{
				new MultiPostThumbnails(
					array(
						'label' => 'Banner Image',
						'id' => 'memberlite_banner_image' . $screen,
						'post_type' => $screen,
					)
				);
			}
		}
	}
}
add_action('wp_loaded', 'memberlite_banner_image_setup');

/*
	Update the mce_buttons in Editor
*/
function memberlite_mce_buttons( $buttons, $id ){
 
    /* only add this for content editor */
    if ( 'content' != $id )
        return $buttons;
 
    /* add next page after more tag button */
    array_splice( $buttons, 13, 0, 'wp_page' );
 
    return $buttons;
}
add_filter( 'mce_buttons', 'memberlite_mce_buttons', 1, 2 );