<?php
	// add the admin options page	
	function pmprot_admin_add_page() 
	{
		add_theme_page('PMPro Theme Options', 'Theme Options', 'manage_options', 'pmprot_options', 'pmprot_options_page');
	}
	add_action('admin_menu', 'pmprot_admin_add_page');
	
	function pmprot_options_page()
	{	
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br></div>
		<h2>Member Lite Theme Options</h2>
		
		<div id="pmprot_notifications">
		</div>
		<script>
			jQuery(document).ready(function() {
				jQuery.get(ajaxurl + '?action=pmprot_notifications', function(data) {
				  jQuery('#pmprot_notifications').html(data);		 
				});
			});
		</script>
		
		<form action="options.php" method="post">
			
			<?php settings_fields('pmprot_options'); ?>
			<?php do_settings_sections('pmprot_options'); ?>

			<p><br /></p>
			
			<div class="bottom-buttons">
				<input type="hidden" name="pmprot_options[set]" value="1" />
				<input type="submit" name="submit" class="button-primary" value="<?php esc_attr_e('Save Settings'); ?>">				
			</div>
			
		</form>
	</div>
	<?php
	}
	
	function pmprot_admin_init()
	{
		register_setting('pmprot_options', 'pmprot_options', 'pmprot_options_validate');
		
		add_settings_section('pmprot_section_general', 'General Settings', 'pmprot_section_general', 'pmprot_options');
		
		add_settings_field('pmprot_option_tagline', 'Tagline', 'pmprot_option_tagline', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_breadcrumbs', 'Breadcrumbs', 'pmprot_option_breadcrumbs', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_pages_in_search_results', 'Search Results', 'pmprot_option_pages_in_search_results', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_featured_images', 'Featured Images', 'pmprot_option_featured_images', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_main_menu', 'Main Menu', 'pmprot_option_main_menu', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_meta_menu', 'Welcome Menu', 'pmprot_option_meta_menu', 'pmprot_options', 'pmprot_section_general');
		
		add_settings_field('pmprot_option_index_full_content', 'Index Excerpts', 'pmprot_option_index_full_content', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_archive_full_content', 'Archive Excerpts', 'pmprot_option_archive_full_content', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_search_full_content', 'Search Excerpts', 'pmprot_option_search_full_content', 'pmprot_options', 'pmprot_section_general');
		
		//add_settings_field('pmprot_option_footer_menu', 'Footer Menu', 'pmprot_option_footer_menu', 'pmprot_options', 'pmprot_section_general');
		//add_settings_field('pmprot_option_footer_widgets', 'Footer Widgets', 'pmprot_option_footer_widgets', 'pmprot_options', 'pmprot_section_general');
		//add_settings_field('pmprot_option_homepage_widgets', 'Homepage Widgets', 'pmprot_option_homepage_widgets', 'pmprot_options', 'pmprot_section_general');
		
		add_settings_field('pmprot_option_color', 'Color', 'pmprot_option_color', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_hide_pages', 'Hide Pages', 'pmprot_option_hide_pages', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_error_page', '404 Page', 'pmprot_option_error_page', 'pmprot_options', 'pmprot_section_general');
		
		add_settings_field('pmprot_option_wphead', 'Header', 'pmprot_option_wphead', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_wpfooter', 'Footer', 'pmprot_option_wpfooter', 'pmprot_options', 'pmprot_section_general');
	}
	add_action('admin_init', 'pmprot_admin_init');
	
	//default options
	function pmprot_default_options_check()
	{
		global $pmprot_options;
		$pmprot_options = get_option("pmprot_options");
		if(empty($pmprot_options['set']))
		{			
			//set the defaults
			$pmprot_options['set'] = 1;
			$pmprot_options['tagline'] = 1;
			$pmprot_options['breadcrumbs'] = 1;
			$pmprot_options['pages_in_search_results'] = 1;
			$pmprot_options['featured_images'] = 1;
			$pmprot_options['main_menu'] = 1;
			$pmprot_options['meta_menu'] = 1;
			$pmprot_options['index_full_content'] = '';
			$pmprot_options['archive_full_content'] = '';
			$pmprot_options['search_full_content'] = '';
			$pmprot_options['color'] = 'Default';
			$pmprot_options['hide_pages'] = '';
			$pmprot_options['error_page'] = '';
			$pmprot_options['wphead'] = '';
			$pmprot_options['wpfooter'] = '';
			
			update_option('pmprot_options', $pmprot_options);
		}
	}
	add_action("after_setup_theme", "pmprot_default_options_check");
	
	function pmprot_section_general()
	{	
	?>
		<p></p>
	<?php
	}
	
	function pmprot_option_tagline()
	{
		$options = get_option('pmprot_options');
		if($options['tagline']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[tagline]' type='checkbox' /> Show tagline in header?";
	}
	
	function pmprot_option_breadcrumbs()
	{
		$options = get_option('pmprot_options');
		if($options['breadcrumbs']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_breadcrumbs' name='pmprot_options[breadcrumbs]' type='checkbox' /> Show breadcrumbs on pages, posts, blog index, archives, and search results?";
	}
	
	function pmprot_option_pages_in_search_results()
	{
		$options = get_option('pmprot_options');
		if($options['pages_in_search_results']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_pages_in_search_results' name='pmprot_options[pages_in_search_results]' type='checkbox' /> Include pages in your search results?";
	}
	
	function pmprot_option_featured_images()
	{
		$options = get_option('pmprot_options');
		if($options['featured_images']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_featured_images' name='pmprot_options[featured_images]' type='checkbox' /> Show featured images on pages, posts, blog index, archives, and search results?";
	}
	
	function pmprot_option_main_menu()
	{
		$options = get_option('pmprot_options');
		if($options['main_menu']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_main_menu' name='pmprot_options[main_menu]' type='checkbox' /> Show the main menu?";
	}
	
	function pmprot_option_meta_menu()
	{
		$options = get_option('pmprot_options');
		if($options['meta_menu']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_meta_menu' name='pmprot_options[meta_menu]' type='checkbox' /> Show the welcome menu bar (upper left)?";
	}
	
	function pmprot_option_index_full_content()
	{
		$options = get_option('pmprot_options');
		if($options['index_full_content']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_index_full_content' name='pmprot_options[index_full_content]' type='checkbox' /> Show full post content on the index page?";
	}		
	
	function pmprot_option_archive_full_content()
	{
		$options = get_option('pmprot_options');
		if($options['archive_full_content']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_archive_full_content' name='pmprot_options[archive_full_content]' type='checkbox' /> Show full post content on archive pages?";
	}		
	
	function pmprot_option_search_full_content()
	{
		$options = get_option('pmprot_options');
		if($options['search_full_content']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_search_full_content' name='pmprot_options[search_full_content]' type='checkbox' /> Show full post content in search results?";
	}		
		
	function pmprot_option_footer_menu()
	{
		$options = get_option('pmprot_options');
		if($options['footer_menu']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_footer_menu' name='pmprot_options[footer_menu]' type='checkbox' /> Show footer menu?";
	}
	
	function pmprot_option_footer_widgets()
	{
		$options = get_option('pmprot_options');
		if($options['footer_widgets']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_footer_widgets' name='pmprot_options[footer_widgets]' type='checkbox' /> Show widgets in footer?";
	}
	
	function pmprot_option_homepage_widgets()
	{
		$options = get_option('pmprot_options');
		if($options['homepage_widgets']) { $checked = ' checked="checked" '; } else { $checked = ''; }
		echo "<input ".$checked." id='pmprot_homepage_widgets' name='pmprot_options[homepage_widgets]' type='checkbox' /> Show widgets on homepage?";
	}
	
	function pmprot_option_color() 
	{
		$options = get_option('pmprot_options');
		
		//get color stylesheets from theme directory
		$cwd = getcwd();
		$dir = get_stylesheet_directory() . "/colors/";
		chdir($dir);
		$stylesheets = glob("*.css");
		chdir($cwd);
				
		$items = array();
		foreach($stylesheets as $stylesheet)
			$items[] = ucwords(str_replace(".css", "", $stylesheet));
				
		echo "<select id='pmprot_color' name='pmprot_options[color]'>";
		foreach($items as $item) {
			$selected = ($options['color']==$item) ? 'selected="selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
	}
	
	function pmprot_option_hide_pages() 
	{
		$options = get_option('pmprot_options');
		echo "<input id='pmprot_hide_pages' name='pmprot_options[hide_pages]' size='70' type='text' value='{$options['hide_pages']}' /><br /><small class='lite'>Enter comma-separated ids of pages you would like to hide from menus, the sitemap, and searches, etc.</small>";
	}
	
	function pmprot_option_error_page() 
	{
		$options = get_option('pmprot_options');
		echo "<input id='pmprot_error_page' name='pmprot_options[error_page]' size='10' type='text' value='{$options['error_page']}' /><br /><small class='lite'>Enter the id of the page to use for 404s.</small>";
	}
	
	function pmprot_option_wphead() 
	{
		$options = get_option('pmprot_options');
		echo "<textarea id='pmprot_wphead' name='pmprot_options[wphead]' rows='7' cols='50' type='textarea'>{$options['wphead']}</textarea><br /><small class='lite'>Code to add to the wp_head() section of your site.</small>";
	}
	
	function pmprot_option_wpfooter() 
	{
		$options = get_option('pmprot_options');
		echo "<textarea id='pmprot_wpfooter' name='pmprot_options[wpfooter]' rows='7' cols='50' type='textarea'>{$options['wpfooter']}</textarea><br /><small class='lite'>Code to add to the wp_footer() section of your site.</small>";
	}
	
	// validate our options
	function pmprot_options_validate($input) 
	{	
		$newinput['set'] = 1;
		
		$newinput['tagline'] = trim($input['tagline']);					
		$newinput['breadcrumbs'] = trim($input['breadcrumbs']);
		$newinput['pages_in_search_results'] = trim($input['pages_in_search_results']);
		$newinput['featured_images'] = trim($input['featured_images']);
		$newinput['main_menu'] = trim($input['main_menu']);
		$newinput['meta_menu'] = trim($input['meta_menu']);
		
		$newinput['index_full_content'] = trim($input['index_full_content']);
		$newinput['archive_full_content'] = trim($input['archive_full_content']);
		$newinput['search_full_content'] = trim($input['search_full_content']);
		
		//$newinput['footer_menu'] = trim($input['footer_menu']);
		//$newinput['footer_widgets'] = trim($input['footer_widgets']);
		//$newinput['homepage_widgets'] = trim($input['homepage_widgets']);
		
		$newinput['color'] = trim($input['color']);
		$newinput['hide_pages'] = trim($input['hide_pages']);
		$newinput['error_page'] = trim($input['error_page']);
		$newinput['wphead'] = trim($input['wphead']);
		$newinput['wpfooter'] = trim($input['wpfooter']);		
		return $newinput;
	}		
	
	/*
	This code calls the server at www.memberlitetheme.com to see if there are any notifications to display to the user.
	*/
	function pmprot_notifications()
	{
		if(current_user_can("manage_options"))
		{			
			$pmprot_notification = get_transient("pmprot_notification");
			if(empty($pmprot_notification))
			{
				if(is_ssl())
					$pmprot_notification = wp_remote_retrieve_body(wp_remote_get("https://www.memberlitetheme.com/notifications/?v=" . PMPROT_VERSION));
				else
					$pmprot_notification = wp_remote_retrieve_body(wp_remote_get("http://www.memberlitetheme.com/notifications/?v=" . PMPROT_VERSION));
					
				set_transient("pmprot_notification", $pmprot_notification, 86400);
			}
			
			if($pmprot_notification && $pmprot_notification != "NULL")
			{
			?>
			<div id="pmprot_notifications">
				<?php echo $pmprot_notification; ?>
			</div>
			<?php
			}
		}
		
		//exit so we just show this content
		exit;
	}
	add_action('wp_ajax_pmprot_notifications', 'pmprot_notifications');	
	
?>