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
		'link' => true,
		'orderby'	=> 'menu_order',
		'order'	=>	'ASC',
		'post_parent' => $post->ID,
		'show' => 'excerpt',
		'thumbnail' => false,
	), $atts));
	
	if($link && strtolower($link) != "false")
		$link = true;
	else
		$link = false;
		
	if($thumbnail && strtolower($thumbnail) != "false")
	{
		if(strtolower($thumbnail) == "medium")
			$thumbnail = "medium";
		elseif(strtolower($thumbnail) == "large")
			$thumbnail = "large";
		else
			$thumbnail = "thumbnail";
	}
	else
		$thumbnail = false;

	// prep exclude array
	$exclude = str_replace(" ", "", $exclude);
	$exclude = explode(",", $exclude);
		
	// our return string
	$r = "";
		
	// get posts
	$args = array(
		"post_type"=>"page",
		"showposts"=>-1,
		"orderby"=>$orderby,
		"post_parent"=>$post_parent,
		"order"=>$order,
		"post__not_in"=>$exclude
	);
	$memberlite_subpageposts = get_posts($args);
	
	$layout_cols = preg_replace('/[^0-9]/', '', $layout);;	
	if(!empty($layout_cols))
		$memberlite_subpageposts_chunks = array_chunk($memberlite_subpageposts, $layout_cols);
	else
		$memberlite_subpageposts_chunks = array_chunk($memberlite_subpageposts, '1');

  	//to show excerpts. save the old value to revert
	global $more;
	$oldmore = $more;
	$more = 0;

	// the Loop		
	foreach($memberlite_subpageposts_chunks as $row):
		$r .= '<div class="row">';
		foreach($row as $post): 
			setup_postdata($post);
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
			$r .= '<article id="post-' . get_the_ID() . '" class="' . implode(" ", get_post_class()) . ' memberlite_subpagelist_item">';
		
			if ( has_post_thumbnail() && empty($layout) && !empty($thumbnail))
			{
				if($layout == '3col' || $layout == '4col')
					$thumbnail_class = "aligncenter";
				else
					$thumbnail_class = "alignright";		
				if($link)
					$r .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, $thumbnail, array('class' => $thumbnail_class )) . '</a>';
				else
					$r .= get_the_post_thumbnail($post->ID, $thumbnail, array('class' => $thumbnail_class) );
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
	
			if ( has_post_thumbnail() && !empty($layout) && !empty($thumbnail)) 
			{			
				if($layout == '3col' || $layout == '4col')
					$thumbnail_class = "aligncenter";
				else
					$thumbnail_class = "alignright";		
				if($link)
					$r .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, $thumbnail, array('class' => $thumbnail_class )) . '</a>';
				else
					$r .= get_the_post_thumbnail($post->ID, $thumbnail, array('class' => $thumbnail_class) );
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
			$r .= '</div>'; //end columns		
		
			endforeach;
		$r .= '</div><hr />'; //end row
	
	endforeach;

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