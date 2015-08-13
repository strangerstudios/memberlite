<?php
/**
 * Custom sidebar memberlite_custom_sidebars page
 *
 * @package Memberlite
 */

/**
 * Adds Custom Sidebars submenu page to "Appearance" menu.
 *
 */
function memberlite_custom_sidebars_menu() {
	add_theme_page('Custom Sidebars', 'Custom Sidebars', 'edit_theme_options', 'memberlite-custom-sidebars', 'memberlite_custom_sidebars');
}
add_action('admin_menu', 'memberlite_custom_sidebars_menu');

function memberlite_custom_sidebars() { 	
	$memberlite_custom_sidebars = get_option('memberlite_custom_sidebars', array());
	if(!empty($_REQUEST['memberlite_custom_sidebar_name'])) {

		//check nonce
		if(check_admin_referer('memberlite_add_custom_sidebar'))
		{	
			$new_sidebar = trim(sanitize_text_field($_REQUEST['memberlite_custom_sidebar_name']));
			
			if(empty($new_sidebar))
			{
				$msg = __("Please enter a valid sidebar name.", "memberlite");
				$msgt = "error";
			}
			elseif(memberlite_sidebarExists($new_sidebar))
			{
				$msg = __("Sidebar id or name already used. Try another name.", "memberlite");
				$msgt = "error";
			}
			else
			{
				//add new sidebar
				$memberlite_custom_sidebars[] = $new_sidebar;

				//register
				memberlite_registerCustomSidebar($new_sidebar);
				
				//remove any blanks
				$memberlite_custom_sidebars = array_values(array_filter($memberlite_custom_sidebars));

				//save option
				update_option('memberlite_custom_sidebars', $memberlite_custom_sidebars);

				$msg = __("Sidebar added.", "memberlite");
				$msgt = "updated fade";
			}
		}
	}
	elseif(!empty($_REQUEST['delete']))
	{
		//check nonce
		if(!empty($_REQUEST['_wpnonce']) && check_admin_referer('memberlite_delete_custom_sidebar'))
		{
			//look for sidebar to delete
			$key = array_search($_REQUEST['delete'], $memberlite_custom_sidebars);
			if($key !== false)
			{
				//unset
				unset($memberlite_custom_sidebars[$key]);

				//unregister
				unregister_sidebar(generateSlug($_REQUEST['delete'], 45));

				//remove any blanks
				$memberlite_custom_sidebars = array_values(array_filter($memberlite_custom_sidebars));

				//save option
				update_option('memberlite_custom_sidebars', $memberlite_custom_sidebars);

				$msg = "Custom sidebar deleted.";
				$msgt = "updated fade";
			}
			else
			{
				$msg = "Could not find custom sidebar. Maybe it was already deleted.";
				$msgt = "error";
			}
		}
	}

	if(!empty($msg))
	{
	?>
	<div id="message" class="message <?php echo $msgt;?>"><p><?php echo $msg;?></p></div>
	<?php
	}
?>
	<div id="wpbody-content" aria-label="Main content" tabindex="0">	
		<div class="wrap"><div class="metabox-holder">
			<h2><?php _e('Memberlite Custom Sidebars', 'memberlite');?></h2>
			<br class="clear" />
			<div id="memberlite-custom-sidebars">
				<div class="postbox">
					<h3 class="hndle"><?php _e('Add New Sidebar', 'memberlite');?></h3>
					<div class="inside">
						<form id="memberlite_add_sidebar_form" method="post" action="<?php echo admin_url("themes.php?page=memberlite-custom-sidebars");?>">					
							<label for="memberlite_custom_sidebar_name"><?php _e('Sidebar Name','memberlite'); ?></label>
							<input type="text" name="memberlite_custom_sidebar_name" id="memberlite_custom_sidebar_name" value="" size="30">
							<?php wp_nonce_field('memberlite_add_custom_sidebar'); ?>
							<?php submit_button( __( 'Add Sidebar', 'memberlite' ), 'primary', 'memberlite_add_sidebar_submit', false ); ?>
						</form>								
					</div> <!-- end inside -->
				</div> <!-- end postbox -->
				<table class="widefat" id="memberlite-custom-sidebars-table">
					<thead>
						<tr>
							<th scope="col" class="manage-column column-sidebar-id"><?php _e( 'ID', 'memberlite' ); ?></th>
							<th scope="col" class="manage-column column-sidebar-name"><?php _e( 'Name', 'memberlite' ); ?></th>
							<th scope="col" class="manage-column column-sidebar-actions"><?php _e( 'Actions', 'memberlite' ); ?></th>
						</tr>
					</thead>
					<tbody class="memberlite-custom-sidebars">
					<?php
						global $wp_registered_sidebars;
						$count = 0;
						foreach($wp_registered_sidebars as $wp_registered_sidebar)
						{
							$count++;
							?>
							<tr class="memberlite-custom-sidebars-row<?php if($count % 2 == 0) { echo ' alternate'; } ?>">
								<td class="custom-sidebar-id"><?php echo $wp_registered_sidebar['id']; ?></td>
								<td class="custom-sidebar-name"><?php echo $wp_registered_sidebar['name']; ?></td>
								<td class="custom-sidebar-actions">
									<?php 
										if(in_array($wp_registered_sidebar['name'], $memberlite_custom_sidebars))
										{ 
										?>
											<a href="javascript:confirmCustomSidebarDeletion('Are you sure that you want to delete the <?php echo $wp_registered_sidebar['name'];?> sidebar?', '<?php echo wp_nonce_url(admin_url("themes.php?page=memberlite-custom-sidebars&delete=" . urlencode($wp_registered_sidebar['name'])), "memberlite_delete_custom_sidebar");?>');"><?php _e('Delete', 'memberlite'); ?></a>
										<?php 
										} 
										else 
										{ 
										?>
											<em><?php _e('Not a custom sidebar.', 'memberlite');?></em>
										<?php 
										} 
									?>
								</td>
							</tr>
							<?php
						} 
					?>
					</tbody>
				</table>
			</div> <!-- end memberlite-custom-sidebars-->			
		</div></div><!-- /.wrap-->
	<div class="clear"></div>
	</div>
	<script>
		function confirmCustomSidebarDeletion(text, url)
		{
			var answer = confirm (text);
			
			if (answer)
				window.location=url;
		}
	</script>
	<?php	
}

function generateSlug($phrase, $maxLength)
{
    $result = strtolower($phrase);
 
    $result = preg_replace("/[^a-z0-9\s-]/", "", $result);
    $result = trim(preg_replace("/[\s-]+/", " ", $result));
    $result = trim(substr($result, 0, $maxLength));
    $result = preg_replace("/\s/", "-", $result);
 
    return $result;
}

function memberlite_sidebarExists($name, $id = NULL)
{
	if(empty($id))
		$id = generateSlug($name, 45);

	global $wp_registered_sidebars;
	foreach($wp_registered_sidebars as $wp_registered_sidebar)
	{
		if($name == $wp_registered_sidebar['name'] || $id == $wp_registered_sidebar['id'])
			return true;	//conflict
	}

	return false;			//no conflict
}

function memberlite_custom_sidebars_init() {
	$memberlite_custom_sidebars = get_option('memberlite_custom_sidebars', array());
	foreach($memberlite_custom_sidebars as $memberlite_custom_sidebar)
	{
		memberlite_registerCustomSidebar($memberlite_custom_sidebar);
	}
}
add_action('widgets_init', 'memberlite_custom_sidebars_init');

function memberlite_registerCustomSidebar($name, $id = NULL)
{
	if(empty($id))
		$id = generateSlug($name, 45);

	return register_sidebar( array(
		'name' => __( $name, 'memberlite' ),
		'id' => $id,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',			
	) );
}