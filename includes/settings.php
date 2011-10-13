<?php
	/* Set Tagline variable to 1 if you wish to show the tagline in the header. Set variable to 0 to hide it. */
	global $description;
	$description = 1;
	
	/* Set the ID of the 404 page for use within template files */
	global $errorpage;
	$errorpage = '105';

	/* Shows breadcrumbs on pages, posts, blog index, archives, and search results */
	global $breadcrumbs;
	$breadcrumbs = 1;
	
	/* Sets the hidden pages from site map, search ,etc. */
	global $exclude, $pmpro_pages;
	$exclude = '107,' . $errorpage . ',' . $pmpro_pages["billing"] . ',' . $pmpro_pages["cancel"] . ',' . $pmpro_pages["checkout"] . ',' . $pmpro_pages["confirmation"] . ',' . $pmpro_pages["invoice"];
	//$exclude = implode(",", $wpdb->get_col("SELECT id FROM `$wpdb->postmeta` JOIN `$wpdb->posts` ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE $wpdb->postmeta.meta_key = 'hide' AND $wpdb->postmeta.meta_value = 'true' ORDER BY $wpdb->posts.menu_order"));
	
	/* Set the Search Pages variable to 1 if you wish to includes pages in your search results. */
	global $searchpages;
	$searchpages = 1;
	
	/* Show featured images on pages, posts, blog index, archives, and search results */
	global $featuredimages;
	$featuredimages = 1;
			
?>