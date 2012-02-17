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
	function pmprot_init_styles()
	{
		global $pmprot_options;
		
		if(!is_admin() )
		{
			wp_enqueue_style('pmprot_reset', get_stylesheet_directory_uri() . "/css/reset.css", NULL, NULL, "all");
			wp_enqueue_style('pmprot_main', get_stylesheet_directory_uri() . "/style.css", NULL, NULL, "screen");
			wp_enqueue_style('pmprot_print', get_stylesheet_directory_uri() . "/css/print.css", NULL, NULL, "print");
			if($pmprot_options['color'])
				wp_enqueue_style('pmprot_color', get_stylesheet_directory_uri() . "/colors/" . strtolower($pmprot_options['color']) . ".css", NULL, NULL, "all");	
			else
				wp_enqueue_style('pmprot_color', get_stylesheet_directory_uri() . "/colors/default.css", NULL, NULL, "all");	
				
			//do we need the ie6 stylesheet?
			$ua = $_SERVER['HTTP_USER_AGENT'];
			if (strpos($ua,'MSIE') != false && strpos($ua,'Opera') === false)
			{
				if (strpos($ua,'Windows NT 5.2') != false)
				{
					if(strpos($ua,'.NET CLR') === false) 
					{
						$skipnextcheck = true;
					}
				}
			   
				if (!$skipnextcheck && substr($ua,strpos($ua,'MSIE')+5,1) < 7)
				{
					/* the browser claims to be IE6 or older, and is not Opera, Safari or iCab */
					global $isie6;
					$isie6 = true;
					wp_enqueue_style('pmprot_ie6', get_stylesheet_directory_uri() . "/css/ie6.css", NULL, NULL, "all");					   
				}
			}
		}
	}
	add_action("init", "pmprot_init_styles");				
?>