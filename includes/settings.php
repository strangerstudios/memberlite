<?php
	/* Loads the Theme Options */
	global $pmprot_options;
	$pmprot_options = get_option('pmprot_options');	
	
	/* Sets the hidden pages from site map, search ,etc. */
	global $exclude, $pmpro_pages;
	$exclude = $pmprot_options['hide_pages'];
	if($pmpro_pages)
		$exclude .= ',' . $pmpro_pages["billing"] . ',' . $pmpro_pages["cancel"] . ',' . $pmpro_pages["checkout"] . ',' . $pmpro_pages["confirmation"] . ',' . $pmpro_pages["invoice"];
			
	//enqueue style sheets
	if(!is_admin() )
	{
		wp_enqueue_style('pmprot_reset', get_stylesheet_directory_uri() . "/reset.css", NULL, NULL, "all");
		wp_enqueue_style('pmprot_main', get_stylesheet_directory_uri() . "/style.css", NULL, NULL, "screen");
		wp_enqueue_style('pmprot_print', get_stylesheet_directory_uri() . "/css/print.css", NULL, NULL, "print");
		if($pmprot_options['color'])
			wp_enqueue_style('pmprot_color', get_stylesheet_directory_uri() . "/colors/" . strtolower($pmprot_options['color']) . ".css", NULL, NULL, "all");	
		else
			wp_enqueue_style('pmprot_color', get_stylesheet_directory_uri() . "/colors/default.css", NULL, NULL, "all");	
	}
		
	/*
		Try to remove everything below here but updating calls to the global variables to call $pmprot_options[] directly.
	*/
	
	/* Set Tagline variable to 1 if you wish to show the tagline in the header. Set variable to 0 to hide it. */
	global $description;
	$description = $pmprot_options['tagline'];
	
	/* Set the ID of the 404 page for use within template files */
	global $errorpage;
	$errorpage = $pmprot_options['error_page'];

	/* Shows breadcrumbs on pages, posts, blog index, archives, and search results */
	global $breadcrumbs;
	$breadcrumbs = $pmprot_options['breadcrumbs'];
	

	//$exclude = implode(",", $wpdb->get_col("SELECT id FROM `$wpdb->postmeta` JOIN `$wpdb->posts` ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE $wpdb->postmeta.meta_key = 'hide' AND $wpdb->postmeta.meta_value = 'true' ORDER BY $wpdb->posts.menu_order"));
	
	/* Set the Search Pages variable to 1 if you wish to includes pages in your search results. */
	global $searchpages;
	$searchpages = $pmprot_options['pages_in_search_results'];
	
	/* Show featured images on pages, posts, blog index, archives, and search results */
	global $featuredimages;
	$featuredimages = $pmprot_options['featured_images'];
			
?>