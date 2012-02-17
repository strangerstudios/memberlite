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
		
		<form action="options.php" method="post">
			
			<?php settings_fields('pmprot_options'); ?>
			<?php do_settings_sections('pmprot_options'); ?>

			<p><br /></p>
			
			<div class="bottom-buttons">
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
		add_settings_field('pmprot_option_meta_menu', 'Meta Menu', 'pmprot_option_meta_menu', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_footer_menu', 'Footer Menu', 'pmprot_option_footer_menu', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_footer_widgets', 'Footer Widgets', 'pmprot_option_footer_widgets', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_homepage_widgets', 'Homepage Widgets', 'pmprot_option_homepage_widgets', 'pmprot_options', 'pmprot_section_general');
		
		add_settings_field('pmprot_option_color', 'Color', 'pmprot_option_color', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_hide_pages', 'Hide Pages', 'pmprot_option_hide_pages', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_error_page', '404 Page', 'pmprot_option_error_page', 'pmprot_options', 'pmprot_section_general');
		
		add_settings_field('pmprot_option_wphead', 'Header', 'pmprot_option_wphead', 'pmprot_options', 'pmprot_section_general');
		add_settings_field('pmprot_option_wpfooter', 'Footer', 'pmprot_option_wpfooter', 'pmprot_options', 'pmprot_section_general');
	}
	add_action('admin_init', 'pmprot_admin_init');
	
	function pmprot_section_general()
	{	
	?>
		<p></p>
	<?php
	}
	
	function pmprot_option_tagline()
	{
		$options = get_option('pmprot_options');
		if($options['tagline']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[tagline]' type='checkbox' /> Show tagline in header?";
	}
	
	function pmprot_option_breadcrumbs()
	{
		$options = get_option('pmprot_options');
		if($options['breadcrumbs']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[breadcrumbs]' type='checkbox' /> Show breadcrumbs on pages, posts, blog index, archives, and search results?";
	}
	
	function pmprot_option_pages_in_search_results()
	{
		$options = get_option('pmprot_options');
		if($options['pages_in_search_results']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[pages_in_search_results]' type='checkbox' /> Include pages in your search results?";
	}
	
	function pmprot_option_featured_images()
	{
		$options = get_option('pmprot_options');
		if($options['featured_images']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[featured_images]' type='checkbox' /> Show featured images on pages, posts, blog index, archives, and search results?";
	}
	
	function pmprot_option_main_menu()
	{
		$options = get_option('pmprot_options');
		if($options['main_menu']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[main_menu]' type='checkbox' /> Show the main menu?";
	}
	
	function pmprot_option_meta_menu()
	{
		$options = get_option('pmprot_options');
		if($options['meta_menu']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[meta_menu]' type='checkbox' /> Show the meta (upper right) menu?";
	}
	
	function pmprot_option_footer_menu()
	{
		$options = get_option('pmprot_options');
		if($options['footer_menu']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[footer_menu]' type='checkbox' /> Show footer menu?";
	}
	
	function pmprot_option_footer_widgets()
	{
		$options = get_option('pmprot_options');
		if($options['footer_widgets']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[footer_widgets]' type='checkbox' /> Show widgets in footer?";
	}
	
	function pmprot_option_homepage_widgets()
	{
		$options = get_option('pmprot_options');
		if($options['homepage_widgets']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='pmprot_tagline' name='pmprot_options[homepage_widgets]' type='checkbox' /> Show widgets on homepage?";
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
		$newinput['tagline'] = trim($input['tagline']);					
		$newinput['breadcrumbs'] = trim($input['breadcrumbs']);
		$newinput['pages_in_search_results'] = trim($input['pages_in_search_results']);
		$newinput['featured_images'] = trim($input['featured_images']);
		$newinput['main_menu'] = trim($input['main_menu']);
		$newinput['meta_menu'] = trim($input['meta_menu']);
		$newinput['footer_menu'] = trim($input['footer_menu']);
		$newinput['footer_widgets'] = trim($input['footer_widgets']);
		$newinput['homepage_widgets'] = trim($input['homepage_widgets']);
		$newinput['color'] = trim($input['color']);
		$newinput['hide_pages'] = trim($input['hide_pages']);
		$newinput['error_page'] = trim($input['error_page']);
		$newinput['wphead'] = trim($input['wphead']);
		$newinput['wpfooter'] = trim($input['wpfooter']);		
		return $newinput;
	}		
	
?>