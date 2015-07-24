<?php
/**
 * Shows the recent posts in a column layout.
 *
 * @param array $args Configuration arguments.
 */
function memberlite_recent_posts_shortcode_handler($atts, $content=null, $code="") {
	global $post;
	
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// $code    ::= the shortcode found, when == callback name
	// examples: [memberlite_recent_posts title="Recent Posts" show="none" category_id="2"]
	
	extract(shortcode_atts(array(
		'count' => '3',
		'title' => NULL,
		'subtitle' => NULL,
		'show' => 'excerpt',
		'category_id' => NULL
	), $atts));
			
	// our return string
	$r = '<div class="memberlite_recent_posts">';
		
	// get posts
	if(!empty($category_id))
		query_posts(array("post_type"=>"post", "posts_per_page"=>$count, "ignore_sticky_posts"=>true, "cat"=>$category_id));
  	else
		query_posts(array("post_type"=>"post", "posts_per_page"=>$count, "ignore_sticky_posts"=>true,));
	
	if(!empty($title))
		$r .= '<h1>' . $title . '</h1>';
	if(!empty($subtitle))
		$r .= '<p class="subtitle">' . $subtitle . '</p>';
	
	$r .= '<div class="row">';
	
	$counter = 0;
	
	if($count == "1")
		$colclass = "large-12";
	elseif($count == "2")
		$colclass = "medium-6";
	elseif($count == "3")
		$colclass = "medium-4 small-12";
	elseif($count == "4")
		$colclass = "medium-3 small-12";
	else
		$colclass = "medium-6";
	
	// the Loop		
	if ( have_posts() ) : while ( have_posts() ) : the_post();	
		$counter++;

		$r .= '<div class="' . $colclass . ' columns ';
		if ( has_post_thumbnail())
		{
			$r .= ' widget_has_thumbnail';
		}
		$r .= '">';

		$r .= '<article id="post-' . get_the_ID() . '" class="' . implode(" ", get_post_class()) . '">';

		if ( has_post_thumbnail()) 
		{
			$r .= '<a class="widget_post_thumbnail" href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, 'mini') . '</a>';
		}
		elseif( 'video' == get_post_format() )
			$r .= '<a class="widget_post_thumbnail" href="' . get_permalink() . '"><i class="fa fa-video-camera"></i></a>';
		
		$r .= '<header class="entry-header">';
		$r .= '<h4 class="entry-title">';
		$r .= '<a href="' . get_permalink() . '" rel="bookmark">';
		$r .= the_title('','',false);
		$r .= '</a>';
		$r .= '</h4>';
		$r .= '<span class="post-date">' . get_the_date() . '</span>';
		
		$r .= '</header>';		

		$r .= '<div class="entry-content">';
		if($show == "excerpt")
			$r .= apply_filters('the_content', get_the_excerpt( '' ));
		else
			$r .= '';
		$r .= '</div>';
		$r .= '</article>';
		$r .= '</div>';
		
		if(($count > 4) && ($counter % 2 == 0))
		{
			$r .= '</div><!-- .row -->';
			$r .= '<div class="row">';
		}
		
	endwhile; endif;
	
	if(! (($count > 4) && ($counter % 2 == 0)) )
	{
		$r .= '</div><!-- .row -->';
		$r .= '</div> <!-- .memberlite_recent_posts -->';
	}
	
	//Reset Query
	wp_reset_query();

	return $r;
}

add_shortcode('memberlite_recent_posts', 'memberlite_recent_posts_shortcode_handler');