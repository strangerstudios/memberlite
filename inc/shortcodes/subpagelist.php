<?php
/**
 * Shows the subpages (in page order) and excerpts.
 *
 * @param array $args Configuration arguments.
 */
function memberlite_subpagelist_shortcode_handler($atts, $content=null, $code="") {
	global $post;
	
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// $code    ::= the shortcode found, when == callback name
	// examples: [subpagelist exclude="1,2,3" show="excerpt" link="true" orderby="menu_order"]
	
	extract(shortcode_atts(array(
		'exclude' => NULL,
		'layout' => NULL,
		'show' => 'excerpt',
		'link' => true,
		'orderby'	=> 'menu_order',
		'order'	=>	'ASC'
	), $atts));
	
	if($link && strtolower($link) != "false")
		$link = true;
	else
		$link = false;
	
	if(!is_numeric($columns))
		$columns = false;

	// prep exclude array
	$exclude = str_replace(" ", "", $exclude);
	$exclude = explode(",", $exclude);
		
	// our return string
	$r = "";
		
	// get posts
	query_posts(array("post_type"=>"page", "showposts"=>-1, "orderby"=>$orderby, "post_parent"=>$post->ID, "order"=>$order, "post__not_in"=>$exclude));
  
  	//to show excerpts. save the old value to revert
	global $more;
	$oldmore = $more;
	$more = 0;
	$count = 0;

	if(!empty($layout))
		$r .= '<div class="row">';
  
	// the Loop		
	if ( have_posts() ) : while ( have_posts() ) : the_post();	

		if(!empty($layout))
		{
			$r .= '<div class="medium-';
			
			if($layout == '2col')
				$r .= '6';
			elseif($layout == '3col')
				$r .= '4';
			elseif($layout == '4col')
				$r .= '3';
			else
				$r .= '12';
			
			$r .= ' columns">';
		}
	
		$r .= '<article id="post-' . get_the_ID() . '" class="' . implode(" ", get_post_class()) . ' memberlite_subpagelist_item">';

		if ( has_post_thumbnail() && empty($layout)) 
		{					
			if($link)
				$r .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'alignright')) . '</a>';
			else
				$r .= get_the_post_thumbnail($post->ID, 'thumbnail');
		}
		
		$r .= '<header class="entry-header">';
		$r .= '<h1 class="entry-title">';

		if($link)
		{
			$r .= '<a href="' . get_permalink() . '" rel="bookmark">';
			$r .= the_title('','',false);
			$r .= '</a>';
		}
		else
		{
			$r .= the_title('','',false);
		}
					
		$r .= '</h1>';
		$r .= '</header>';		
		$r .= '<div class="entry-content">';		

		if ( has_post_thumbnail() && !empty($layout)) 
		{					
			if($link)
				$r .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'alignright')) . '</a>';
			else
				$r .= get_the_post_thumbnail($post->ID, 'thumbnail');
		}
									
		if($show == "excerpt")
			$r .= apply_filters('the_content', preg_replace("/\[memberlite_subpagelist[^\]]*\]/", "", get_the_excerpt( '' )));
		elseif($show == "content")
			$r .= apply_filters('the_content', preg_replace("/\[memberlite_subpagelist[^\]]*\]/", "", get_the_content( '' )));						
		else
			$r .= '';
		
		if($link)
		{
			$r .= '<a class="more-link" href="' . get_permalink() . '" rel="bookmark">';
			$r .= __('(more...)','memberlite');
			$r .= '</a>';
		}
								
		$r .= '</div>';
			
		$r .= '</article>';
	
		if(!empty($layout))
		{
			$r .= '</div>'; //end columns
			
			//end and begin new row
			if($layout == '2col')
				$r .= '</div><hr /><div class="row">';
			elseif($layout == '3col' && $count++ % 3 == 2)
				$r .= '</div><hr /><div class="row">';
			elseif($layout == '4col')
				$r .= '</div><hr /><div class="row">';
		}

	endwhile; endif;
	
	if(!empty($layout))
		$r .= '</div>'; //end row
		
	//Reset Query
	wp_reset_query();

	//revert
	$more = $oldmore;
	
	return $r;
}

add_shortcode('memberlite_subpagelist', 'memberlite_subpagelist_shortcode_handler');

function memberlite_remove_subpagelist_from_excerpt($excerpt)
{
	$excerpt = preg_replace("/\[subpagelist[^\]]*\]/", "", $excerpt);
	return $excerpt;
}
add_filter("the_excerpt", "memberlite_remove_subpagelist_from_excerpt");