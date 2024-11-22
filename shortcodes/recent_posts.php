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
		'post_type' => 'post',
		'author_id' => NULL,
		'count' => '3',
		'title' => NULL,
		'subtitle' => NULL,
		'show' => 'excerpt',
		'show_avatar' => '1',
		'category_id' => NULL
	), $atts));

	// load default query args array.
	$query_args = array(
		'post_type' => $post,
		'posts_per_page' => $count,
		'ignore_sticky_posts' => true,
		'author' => $author_id,
	);

	// check to see if post type is not empty and the post type exists.
	if ( ! empty( $post_type ) && post_type_exists( $post_type ) ) {
		$query_args['post_type'] = $post_type;
	} else {
		return sprintf(
			/* translators: %s: post type */
			__( "There was a problem fetching content for the post type '%s'. Please ensure this exists.", "memberlite" ),
			esc_html( $post_type )
		);
	}

	if($show_avatar == "0" || $show_avatar == "false" || $show_avatar == "no"){
		$show_avatar = false;
	}else{
		$show_avatar = true;
	}

	// check to see if the author_id is current.
	if( $author_id === 'current' && !empty( $author_id ) ) {
		global $current_user;

		if( empty( $current_user->ID) ) {
			return __( 'There was a problem fetching posts for the current user. Please try again later.', 'memberlite-shortcodes' );
		}else{
			$query_args['author'] = $current_user->ID;
		}
	}

	// If author_id is not numeric, try and get the user's ID from their name.
	if( $author_id != 'current' && !is_numeric( $author_id ) && !empty( $author_id ) ) {
		$user = get_user_by( 'login', $author_id );

		$author_id = $user->ID;

		if( empty( $author_id ) ) {
			return __( "No posts found for this user. Please ensure the author's name/ID is correct.", "memberlite-shortcodes" );
		}else{
			$query_args['author'] = $author_id;
		}
	}

	// our return string
	$r = '<div id="widget_memberlite_recent_posts" class="memberlite_recent_posts">';

	// get posts
	if( !empty( $category_id ) ) {
		$query_args['cat'] = $category_id;
	}

	// allows users to filter the post query per post.
	$query_args = apply_filters( 'memberlite_recents_posts_query', $query_args, $post );

	// Run the post query.
	query_posts( $query_args );

	if(!empty($title))
		$r .= '<h1>' . wp_kses_post( $title ) . '</h1>';
	if(!empty($subtitle))
		$r .= '<p class="subtitle">' . wp_kses_post( $subtitle ) . '</p>';

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

		$r .= '<div class="' . esc_attr( $colclass ) . ' columns ';
		if ( has_post_thumbnail() || ! empty( $show_avatar ) ) {
			$r .= ' widget_has_thumbnail';
		} else {
			$r .= ' widget_no_thumbnail';
		}
		$r .= '">';

		$r .= '<article id="post-' . get_the_ID() . '" class="' . implode(" ", get_post_class()) . '">';

		$r .= '<header class="entry-header">';

		if ( has_post_thumbnail() || ! empty( $show_avatar ) ) {
			if ( has_post_thumbnail() ) {
				$r .= '<a class="widget_post_thumbnail" href="' . get_permalink() . '">' . wp_get_attachment_image( get_post_thumbnail_id( ) ) . '</a>';
			} else {
				$author_id = get_the_author_meta( 'ID' );
				$r .= '<a class="widget_post_thumbnail" href="' . get_permalink() . '">' . get_avatar( $author_id, 80, '', get_the_author_meta( 'display_name' ) ) . '</a>';
			}
		}

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
remove_shortcode('memberlite_recent_posts');	//replace shortcode bundled with Memberlite 2.0 and prior or anywhere else
add_shortcode('memberlite_recent_posts', 'memberlite_recent_posts_shortcode_handler');
