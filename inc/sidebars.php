<?php
/**
 * Custom sidebar memberlite_custom_sidebars page
 *
 * @package Memberlite
 */

/**
 * Adds Custom Sidebars submenu page to "Appearance" menu.
 */
function memberlite_custom_sidebars_menu() {
	add_theme_page('Custom Sidebars', 'Custom Sidebars', 'edit_theme_options', 'memberlite-custom-sidebars', 'memberlite_custom_sidebars');
}
add_action('admin_menu', 'memberlite_custom_sidebars_menu');

/**
 * Settings page for Appearance -> Custom Sidebars
 */
function memberlite_custom_sidebars() {
	global $wp_registered_sidebars;

	//get options
	$memberlite_custom_sidebars = get_option('memberlite_custom_sidebars', array());
	$memberlite_cpt_sidebars = get_option('memberlite_cpt_sidebars', array());

	//get post types
	$memberlite_post_types = get_post_types( array('public' => true, '_builtin' => false), 'objects' );

	if(!empty($_REQUEST['memberlite_custom_sidebar_name'])) {

		//check nonce
		if(check_admin_referer('memberlite_add_custom_sidebar'))
		{
			$new_sidebar = trim(stripslashes(sanitize_text_field($_REQUEST['memberlite_custom_sidebar_name'])));

			if(empty($new_sidebar))
			{
				$msg = __("Please enter a valid sidebar name.", "memberlite");
				$msgt = "error";
			}
			elseif(memberlite_sidebar_exists($new_sidebar))
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
				update_option('memberlite_custom_sidebars', $memberlite_custom_sidebars, 'no');

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
			$key = array_search(sanitize_text_field($_REQUEST['delete']), $memberlite_custom_sidebars);
			if($key !== false)
			{
				//unset
				unset($memberlite_custom_sidebars[$key]);

				//unregister
				unregister_sidebar(memberlite_generateSlug(sanitize_text_field($_REQUEST['delete']), 45));

				//remove any blanks
				$memberlite_custom_sidebars = array_values(array_filter($memberlite_custom_sidebars));

				//save option
				update_option('memberlite_custom_sidebars', $memberlite_custom_sidebars, 'no');

				$msg = esc_html__( 'Custom sidebar deleted.', 'memberlite' );
				$msgt = "updated fade";
			}
			else
			{
				$msg = esc_html__( 'Could not find custom sidebar. Maybe it was already deleted.', 'memberlite' );
				$msgt = "error";
			}
		}
	}
	elseif(!empty($_REQUEST['memberlite_cpt_sidebar']))
	{
		//check nonce
		if(!empty($_REQUEST['_wpnonce']) && check_admin_referer('memberlite_cpt_sidebar'))
		{
			//get values
			$memberlite_cpt_sidebars = array();
			$memberlite_sidebar_cpt_sidebar_ids = $_REQUEST['memberlite_sidebar_cpt_sidebar_ids'];	//array parameter, sanitized below
			$memberlite_sidebar_cpt_names = $_REQUEST['memberlite_sidebar_cpt_names'];				//array parameter, sanitized below

			//build array
			for($i = 0; $i < count($memberlite_sidebar_cpt_names); $i++) {
				$memberlite_cpt_sidebars[sanitize_text_field($memberlite_sidebar_cpt_names[$i])] = sanitize_text_field($memberlite_sidebar_cpt_sidebar_ids[$i]);
			}

			//update option
			update_option('memberlite_cpt_sidebars', $memberlite_cpt_sidebars, 'no');
		}
	}
	if(!empty($msg))
	{
	?>
	<div id="message" class="message <?php echo esc_attr( $msgt );?>"><p><?php echo esc_html( $msg );?></p></div>
	<?php
	}
?>
	<div id="wpbody-content" aria-label="Main content" tabindex="0">
		<div class="wrap"><div class="metabox-holder">
			<h2><?php esc_html_e('Memberlite Custom Sidebars', 'memberlite');?></h2>
			<br class="clear" />
			<div id="memberlite-custom-sidebars">
				<div class="postbox">
					<h2 class="hndle"><?php esc_html_e('Add New Sidebar', 'memberlite');?></h2>
					<div class="inside">
						<form id="memberlite_add_sidebar_form" method="post" action="<?php echo admin_url("themes.php?page=memberlite-custom-sidebars");?>">
							<label for="memberlite_custom_sidebar_name"><?php esc_html_e('Sidebar Name','memberlite'); ?></label>
							<input type="text" name="memberlite_custom_sidebar_name" id="memberlite_custom_sidebar_name" value="" size="30">
							<?php wp_nonce_field('memberlite_add_custom_sidebar'); ?>
							<?php submit_button( esc_html__( 'Add Sidebar', 'memberlite' ), 'primary', 'memberlite_add_sidebar_submit', false ); ?>
						</form>
					</div> <!-- end inside -->
				</div> <!-- end postbox -->
				<table class="widefat striped" id="memberlite-custom-sidebars-table">
					<thead>
						<tr>
							<th scope="col" class="manage-column column-sidebar-id"><?php esc_html_e( 'ID', 'memberlite' ); ?></th>
							<th scope="col" class="manage-column column-sidebar-name"><?php esc_html_e( 'Name', 'memberlite' ); ?></th>
							<th scope="col" class="manage-column column-sidebar-actions"><?php esc_html_e( 'Actions', 'memberlite' ); ?></th>
						</tr>
					</thead>
					<tbody class="memberlite-custom-sidebars">
					<?php
						global $wp_registered_sidebars;
						ksort($wp_registered_sidebars);

						foreach($wp_registered_sidebars as $wp_registered_sidebar)
						{
							?>
							<tr class="memberlite-custom-sidebars-row">
								<td class="custom-sidebar-id"><?php echo esc_html( $wp_registered_sidebar['id'] ); ?></td>
								<td class="custom-sidebar-name"><?php echo esc_html( $wp_registered_sidebar['name'] ); ?></td>
								<td class="custom-sidebar-actions">
									<?php
										if(in_array($wp_registered_sidebar['name'], $memberlite_custom_sidebars))
										{
										?>
											<a href="javascript:confirmCustomSidebarDeletion('Are you sure that you want to delete the <?php echo esc_js($wp_registered_sidebar['name']);?> sidebar?', '<?php echo wp_nonce_url(admin_url("themes.php?page=memberlite-custom-sidebars&delete=" . urlencode($wp_registered_sidebar['name'])), "memberlite_delete_custom_sidebar");?>');"><?php esc_html_e('Delete', 'memberlite'); ?></a>
										<?php
										}
										else
										{
										?>
											<em><?php esc_html_e('Not a custom sidebar.', 'memberlite');?></em>
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
				<hr />
				<h2><?php _e('Assign Sidebars to Custom Post Types','memberlite'); ?></h2>
				<p><?php _e('For each detected CPT below, select the sidebar you would like to display.','memberlite'); ?></p>
				<?php
					if(!empty($memberlite_post_types))
					{
						?>
						<form id="memberlite_cpt_sidebar_form" method="post" action="<?php echo admin_url("themes.php?page=memberlite-custom-sidebars");?>">
							<table class="widefat striped" id="memberlite-cpt-sidebars-table">
								<thead>
									<tr>
										<th scope="col" class="manage-column column-cpt-name"><?php _e( 'Custom Post Type', 'memberlite' ); ?></th>
										<th scope="col" class="manage-column column-cpt-actions"><?php _e( 'Select Sidebar', 'memberlite' ); ?></th>
									</tr>
								</thead>
								<tbody class="memberlite-cpt-sidebars">
								<?php
									foreach($memberlite_post_types as $post_type)
									{
										if(in_array($post_type->name, array('reply')))
											continue;
										else
										{
											if ( ! empty( $memberlite_cpt_sidebars[$post_type->name] ) ) {
												$selected_sidebar = $memberlite_cpt_sidebars[$post_type->name];
											} else {
												$selected_sidebar = '';
											}
											?>
											<tr class="memberlite-cpt-sidebars-row">
												<td class="cpt-name"><?php echo $post_type->labels->name; ?></td>
												<td class="cpt-actions">
												<?php
													echo '<select id="memberlite_sidebar_cpt_sidebar_ids" name="memberlite_sidebar_cpt_sidebar_ids[]">';
													echo '<option value="memberlite_sidebar_default"' . selected( $selected_sidebar, 'memberlite_sidebar_default' ) . '>- Default Sidebar -</option>';
													foreach ( $wp_registered_sidebars as $wp_registered_sidebar ) {
														echo '<option value="' . esc_attr( $wp_registered_sidebar['id'] ) . '"' . selected( $selected_sidebar, $wp_registered_sidebar['id'] ) . '>' . esc_html( $wp_registered_sidebar['name'] ) . '</option>';
													}
														echo '<option value="memberlite_sidebar_blank"' . selected( $selected_sidebar, 'memberlite_sidebar_blank' ) . '>- Hide Sidebar -</option>';
													echo '</select>';
												?>
												<input type="hidden" name="memberlite_sidebar_cpt_names[]" id="memberlite_sidebar_cpt_names" value="<?php echo esc_attr( $post_type->name ); ?>">
												</td>
											</tr>
											<?php
										}
									}
								?>
								</tbody>
							</table>
							<?php wp_nonce_field('memberlite_cpt_sidebar'); ?>
							<input type="hidden" name="memberlite_cpt_sidebar" value="1" />
							<p><?php submit_button( esc_html__( 'Save CPT Sidebar Selections', 'memberlite' ), 'primary', 'memberlite_cpt_sidebar_submit', false ); ?></p>
						</form>
						<?php
					}
					else
					{
						echo '<p><em>No custom post types found.';
					}
				?>
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

/**
 * Generate a slug for a new custom sidebar
 */
function memberlite_generateSlug($phrase, $maxLength)
{
    $result = strtolower($phrase);

    $result = preg_replace("/[^a-z0-9\s-]/", "", $result);
    $result = trim(preg_replace("/[\s-]+/", " ", $result));
    $result = trim(substr($result, 0, $maxLength));
    $result = preg_replace("/\s/", "-", $result);

    return $result;
}

/**
 * Check if a sidebar already exists
 */
function memberlite_sidebar_exists($name, $id = NULL)
{
	if(empty($id))
		$id = memberlite_generateSlug($name, 45);

	global $wp_registered_sidebars;
	foreach($wp_registered_sidebars as $wp_registered_sidebar)
	{
		if($name == $wp_registered_sidebar['name'] || $id == $wp_registered_sidebar['id'])
			return true;	//conflict
	}

	return false;			//no conflict
}

/**
 * Register our custom sidebars on init
 */
function memberlite_custom_sidebars_init() {

	$memberlite_custom_sidebars = get_option('memberlite_custom_sidebars', array() );

	foreach($memberlite_custom_sidebars as $memberlite_custom_sidebar)
	{
		memberlite_registerCustomSidebar($memberlite_custom_sidebar);
	}

}
add_action( 'widgets_init', 'memberlite_custom_sidebars_init' );

/**
 * Register a specified custom sidebar
 */
function memberlite_registerCustomSidebar($name, $id = NULL)
{
	if(empty($id))
		$id = memberlite_generateSlug($name, 45);

	return register_sidebar( array(
		'name' => $name,
		'id' => $id,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}

/**
 * Add a Custom Sidebar meta box to the side column on the Post and Page edit screens.
 */
function memberlite_sidebar_add_meta_box() {
	$screens = get_post_types( array('public' => true), 'names' );
	foreach ($screens as $screen) {
		if(in_array($screen, array('reply','topic')))
			continue;
		else
		{
			add_meta_box(
				'memberlite_sidebar_section',
				esc_html__('Custom Sidebar', 'memberlite'),
				'memberlite_sidebar_meta_box_callback',
				$screen,
				'side',
				'core'
			);
		}
	}
}
add_action('add_meta_boxes', 'memberlite_sidebar_add_meta_box');

/**
 * Meta box for custom sidebar selection
 */
function memberlite_sidebar_meta_box_callback($post) {
	global $wp_registered_sidebars;
	wp_nonce_field('memberlite_sidebar_meta_box', 'memberlite_sidebar_meta_box_nonce');
	$memberlite_hide_children = get_post_meta($post->ID, '_memberlite_hide_children', true);
	$memberlite_custom_sidebar = get_post_meta($post->ID, '_memberlite_custom_sidebar', true);

	$post_type = get_post_type($post);
	//check post type and custom cpt sidebar
	if(!in_array($post_type, array('post','page')) )
	{
		$memberlite_cpt_sidebars = get_option('memberlite_cpt_sidebars', array());
		if(empty($memberlite_cpt_sidebars[$post_type]) || ($memberlite_cpt_sidebars[$post_type] == 'memberlite_sidebar_default') )
			$memberlite_cpt_sidebar_id = 'sidebar-1';
		else
			$memberlite_cpt_sidebar_id = $memberlite_cpt_sidebars[$post_type];
	}
	elseif(get_post_type($post) == 'post')
		$memberlite_cpt_sidebar_id = 'sidebar-2';
	else
		$memberlite_cpt_sidebar_id = 'sidebar-1';

	//get the name of the default sidebar
	if(!empty($wp_registered_sidebars[$memberlite_cpt_sidebar_id]))
		$memberlite_cpt_sidebar_name = $wp_registered_sidebars[$memberlite_cpt_sidebar_id]['name'];

	$memberlite_default_sidebar = get_post_meta($post->ID, '_memberlite_default_sidebar', true);
	if ( (get_post_type($post) == 'page' ) || (isset($_POST['post_type']) && 'page' == $_POST['post_type'])) {
		echo '<input type="hidden" name="memberlite_hide_children_present" value="1" />';

		if ( defined( 'PMPRO_VERSION' ) ) {
			global $pmpro_pages;
			// Check if this is the Membership Account page or a child of it.
			if ( ! empty( $post->post_parent ) ) {
				$post_ancestors = get_post_ancestors( $post );
				$toplevelpost   = end( $post_ancestors );
			} else {
				$toplevelpost = $post->ID;
			}
			$disable_hide_children_setting = ! empty( $pmpro_pages['account'] ) && $pmpro_pages['account'] == $toplevelpost;
		}
		if ( ! empty( $disable_hide_children_setting ) ) {
			echo '<label for="memberlite_hide_children" class="selectit"><input name="memberlite_hide_children" type="checkbox" id="memberlite_hide_children" value="1" checked="checked" disabled="disabled">' . esc_html__('Hide Page Children Menu in Sidebar', 'memberlite') . '</label>';
			echo '<p class="description"><br />' . esc_html__('The Membership Account page and its children do not display this menu.', 'memberlite') . '</p>';
		} else {
			echo '<label for="memberlite_hide_children" class="selectit"><input name="memberlite_hide_children" type="checkbox" id="memberlite_hide_children" value="1" '. checked( $memberlite_hide_children, 1, false) .'>' . esc_html__('Hide Page Children Menu in Sidebar', 'memberlite') . '</label>';
		}
		echo '<hr />';
	}
	if( $memberlite_cpt_sidebar_id != 'memberlite_sidebar_blank')
	{
		echo '<p>' . sprintf( esc_html__('The current default sidebar is %s.', 'memberlite' ), '<strong>' . esc_html( $memberlite_cpt_sidebar_name ) . '</strong>' );
	}
	else
	{
		echo '<p>' . esc_html__('The current default sidebar is <strong>hidden</strong>.', 'memberlite' );
	}
	echo ' <a href="' . admin_url( 'themes.php?page=memberlite-custom-sidebars') . '">' . esc_html__('Manage Custom Sidebars','memberlite') . '</a></p><hr />';
	echo '<p><strong>' . esc_html__('Select Custom Sidebar', 'memberlite') . '</strong></p>';
	echo '<label class="screen-reader-text" for="memberlite_custom_sidebar">';
	_e('Select Sidebar', 'memberlite');
	echo '</label>';
	echo '<select id="memberlite_custom_sidebar" name="memberlite_custom_sidebar">';
	echo '<option value="memberlite_sidebar_blank"' . selected( $memberlite_custom_sidebar, 'memberlite_sidebar_blank' ) . '>- Select -</option>';
	$memberlite_theme_sidebars = array('sidebar-3', 'sidebar-4', 'sidebar-5');
	foreach($wp_registered_sidebars as $wp_registered_sidebar)
	{
		if(in_array($wp_registered_sidebar['id'], $memberlite_theme_sidebars))
			continue;
		echo '<option value="' . esc_attr( $wp_registered_sidebar['id'] ) . '"' . selected( $memberlite_custom_sidebar, $wp_registered_sidebar['id'] ) . '>' . esc_html( $wp_registered_sidebar['name'] ) . '</option>';
	}
	echo '</select>';
	if( $memberlite_cpt_sidebar_id != 'memberlite_sidebar_blank')
	{
		echo '<hr />';
		echo '<p><strong>' . esc_html__('Default Sidebar Behavior', 'memberlite') . '</strong></p>';
		echo '<label class="screen-reader-text" for="memberlite_default_sidebar">';
		esc_html_e('Default Sidebar', 'memberlite');
		echo '</label>';
		echo '<select id="memberlite_default_sidebar" name="memberlite_default_sidebar">';
		echo '<option value="default_sidebar_above"' . selected( $memberlite_default_sidebar, 'default_sidebar_above' ) . '>' . esc_html__('Show Default Sidebar Above', 'memberlite') . '</option>';
		echo '<option value="default_sidebar_below"' . selected( $memberlite_default_sidebar, 'default_sidebar_below' ) . '>' . esc_html__('Show Default Sidebar Below', 'memberlite') . '</option>';
		echo '<option value="default_sidebar_hide"' . selected( $memberlite_default_sidebar, 'default_sidebar_hide' ) . '>' . esc_html__('Hide Default Sidebar', 'memberlite') . '</option>';
		echo '</select>';
	}
}

/**
 * Save custom sidebar selection when a post is saved
 */
function memberlite_sidebar_save_meta_box_data($post_id) {
	if(!isset($_POST['memberlite_sidebar_meta_box_nonce'])) {
		return;
	}
	if(!wp_verify_nonce($_POST['memberlite_sidebar_meta_box_nonce'], 'memberlite_sidebar_meta_box')) {
		return;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if(!current_user_can('edit_page', $post_id)) {
			return;
		}
	}
	else
	{
		if(!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	//hide or show subpage menu in sidebar
	if(isset($_POST['memberlite_hide_children_present'])) {
		if(!empty($_POST['memberlite_hide_children']))
			$memberlite_hide_children = 1;
		else
			$memberlite_hide_children = 0;

		update_post_meta($post_id, '_memberlite_hide_children', $memberlite_hide_children);
	}

	//custom sidebar selection
	if(isset($_POST['memberlite_custom_sidebar'])) {
		$memberlite_custom_sidebar = sanitize_text_field($_POST['memberlite_custom_sidebar']);
		update_post_meta($post_id, '_memberlite_custom_sidebar', $memberlite_custom_sidebar);
	}

	//default sidebar behavior
	if(isset($_POST['memberlite_default_sidebar'])) {
		$memberlite_default_sidebar = sanitize_text_field($_POST['memberlite_default_sidebar']);
		update_post_meta($post_id, '_memberlite_default_sidebar', $memberlite_default_sidebar);
	}

}
add_action('save_post', 'memberlite_sidebar_save_meta_box_data');

/**
 * Figure out which sidebars to use
 */
function memberlite_get_widget_areas() {
	$widget_areas = array();

	if ( is_page() ) {
		// Add the submenu widget to the sidebar on Pages (not a real widget area; handled in memberlite_nav_menu_submenu() )
		$widget_areas[] = 'memberlite_nav_menu_submenu';

		// Add the 'Pages' sidebar
		$widget_areas[] = 'sidebar-1';
	} elseif ( memberlite_is_blog() ) {
		// Add the submenu widget to the sidebar (not a real widget area; handled in memberlite_nav_menu_submenu() )
		$widget_areas[] = 'memberlite_nav_menu_submenu';

		// Add the 'Posts and Archives' sidebar
		$widget_areas[] = 'sidebar-2';
	} else {
		// Add the 'Posts and Archives' sidebar
		$widget_areas[] = 'sidebar-2';
	}

	// Get the queried object.
	$queried_object = get_queried_object();

	//if post, check for a post type related sidebar
	if( ! empty( $queried_object ) ) {

		// Queried object doesn't return post_type if the page is an archive page. Try to get a pages post type.
		if ( empty( $queried_object->post_type ) && ! is_single() ) {
			$post_type = get_post_type();
		} else {
			$post_type = $queried_object->post_type;
		}

		// Look for a default sidebar
		$default_sidebar = memberlite_get_default_sidebar_by_post_type( $post_type );

		//check ancestors if no default found
		if( !empty( $queried_object->post_parent) && $queried_object->post_parent != $queried_object->ID
			&& ( empty( $default_sidebar ) || $default_sidebar == 'memberlite_sidebar_default' ) ) {
			//check parent
			$parent_post = get_post( $queried_object->post_parent );
			if( $parent_post->post_type != $queried_object->post_type ) {
				$default_sidebar = memberlite_get_default_sidebar_by_post_type( $parent_post->post_type );
			}

			//check oldest ancestor
			if( empty( $default_sidebar ) || $default_sidebar == 'memberlite_sidebar_default' ) {
				$ancestors = get_ancestors($queried_object->ID, 'post');
				if( !empty( $ancestors ) ) {
					$oldest_ancestor = get_post( $ancestors[count( $ancestors ) - 1] );

					if( $oldest_ancestor->post_type != $queried_object->post_type ) {
						$default_sidebar = memberlite_get_default_sidebar_by_post_type( $oldest_ancestor->post_type );
					}
				}
			}
		}

		//override the widget_areas with the default sidebar
		if( ! empty( $default_sidebar ) && $default_sidebar != 'memberlite_sidebar_default' ) {
			if ( $default_sidebar == 'memberlite_sidebar_blank' )
				$widget_areas = array();
			else
				$widget_areas = array( $default_sidebar );
		}

		//figure out custom sidebar for this specific post
		if( ! empty( $queried_object->ID ) ) {
			$memberlite_custom_sidebar = get_post_meta( $queried_object->ID, '_memberlite_custom_sidebar', true );
		}
	}

	//special case for bbpress search results page
	if ( empty( $memberlite_custom_sidebar ) && function_exists( 'is_bbpress' ) && is_bbpress() && ! bbp_is_single_topic() ) {
		$widget_areas = array( memberlite_get_default_sidebar_by_post_type( 'forum' ) );
	}

	//if no custom sidebar for this specific post and we're on a blog page, check if the blog page has one to inherit
	if( empty( $memberlite_custom_sidebar ) && memberlite_is_blog() ) {
		$queried_object = get_post( get_option( 'page_for_posts' ) );	//note we override the queried object here so it figures out the sidebar position correctly below
		if ( ! empty( $queried_object ) ) {
			// The user has defined a 'posts page', set a custom sidebar if specified.
			$memberlite_custom_sidebar = get_post_meta( $queried_object->ID, '_memberlite_custom_sidebar', true );
		}
	}

	if( ! empty( $memberlite_custom_sidebar ) ) {
		if( ! empty( $queried_object->ID ) ) {
			$memberlite_default_sidebar_position = get_post_meta( $queried_object->ID, '_memberlite_default_sidebar', true );
		} else {
			$memberlite_default_sidebar_position = false;
		}

		if( $memberlite_default_sidebar_position == 'default_sidebar_hide' ) {
			$widget_areas = array( $memberlite_custom_sidebar );
		} elseif( $memberlite_default_sidebar_position == 'default_sidebar_below' ) {
			$widget_areas = array_merge( array( $memberlite_custom_sidebar ), $widget_areas );
		} else {
			//default to default_sidebar_above
			$widget_areas = array_merge( $widget_areas, array( $memberlite_custom_sidebar ) );
		}
	}

	// Filter to allow customization of the array of widget areas
	$widget_areas = apply_filters( 'memberlite_get_widget_areas', $widget_areas );

	return array_unique( $widget_areas );
}

/**
 * Hide subpage menu if option is chosen
 */
function memberlite_sidebar_hide_children( $widget_areas ) {
	$queried_object = get_queried_object();

	//if not a post, bail
	if( empty( $queried_object ) || empty( $queried_object->post_type ) ) {
		return $widget_areas;
	}

	//are we even showing children?
	$memberlite_nav_menu_submenu_key = array_search( 'memberlite_nav_menu_submenu', $widget_areas );

	if( $memberlite_nav_menu_submenu_key === false ) {
		return $widget_areas;
	}

	$memberlite_hide_children = get_post_meta($queried_object->ID, '_memberlite_hide_children', true);
	if( !empty( $memberlite_hide_children ) ) {
		unset( $widget_areas[$memberlite_nav_menu_submenu_key] );
	}

	return $widget_areas;
}
add_filter( 'memberlite_get_widget_areas', 'memberlite_sidebar_hide_children' );

/**
 * Get the default sidebar for a specific CPT
 */
function memberlite_get_default_sidebar_by_post_type( $post_type ) {

	$memberlite_cpt_sidebars = get_option('memberlite_cpt_sidebars', array());

	if ( ! empty( $memberlite_cpt_sidebars[$post_type] ) ) {
		return $memberlite_cpt_sidebars[$post_type];
	} else {
		return false;
	}
}
