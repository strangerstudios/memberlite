<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Memberlite
 */

if ( ! function_exists( 'memberlite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 */
function memberlite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

if ( ! function_exists( 'memberlite_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function memberlite_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'memberlite' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'memberlite' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'memberlite' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'memberlite_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function memberlite_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'memberlite' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'memberlite' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'memberlite' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'memberlite_page_nav' ) ) :
/**
 * Display navigation to next/previous page when applicable.
 */
function memberlite_page_nav() {
	global $post;
	
	$post_type_object = get_post_type_object(get_post_type($post));
	if(empty($post_type_object))
		return;
				
	//check if subpage
	if(!empty($post->post_parent))
	{
		$post_ancestors = get_post_ancestors($post);
		$child_of = end($post_ancestors);
	}
	else
		$child_of = $post->ID;
	
	//build array of page ids for navigation
	$allpages = get_pages('child_of=' . $child_of . '&sort_column=menu_order&sort_order=asc');
	
	$pages = array();
	$pages[] = $child_of;		//parent id is first
	foreach ($allpages as $page) {
	   $pages[] += $page->ID;
	}
	
	//figure out prev and next post IDs
	$current = array_search($post->ID, $pages);
	
	//prev
	if(!empty($pages[$current-1]))
		$previousID = $pages[$current-1];
	else
		$previousID = false;
	
	//next
	if(!empty($pages[$current+1]))
		$nextID = $pages[$current+1];
	else
		$nextID = false;
	
	//don't show if neither prev or next
	if ( empty($nextID) && empty($previousID) ) {
		return;
	}
	
	//HTML
	?>
	<nav class="navigation page-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Page navigation', 'memberlite' ); ?></h1>
		<div class="nav-links">
			<?php if(!empty($previousID) && ($previousID != $post->ID)) { ?>
				<div class="nav-previous"><a href="<?php echo get_permalink($previousID); ?>" rel="prev"><span class="meta-nav">&larr;</span> <?php echo get_the_title($previousID); ?></a></div>
			<?php } if(!empty($nextID) && ($nextID != $post->ID)) { ?>
				<div class="nav-next"><a href="<?php echo get_permalink($nextID); ?>" rel="next"><?php echo get_the_title($nextID); ?> <span class="meta-nav">&rarr;</span></a></div>
			<?php } ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/**
 * Prints HTML with meta information based on theme setting Post Entry Meta (before or after) in customizer.
 */
function memberlite_get_entry_meta($post = NULL, $location = "before") {
    global $memberlite_defaults;
	
	if(empty($post))
        global $post;
    
    $meta = get_theme_mod( 'posts_entry_meta_' . $location, $memberlite_defaults['posts_entry_meta_' . $location] );
    $meta = apply_filters('memberlite_get_entry_meta', $meta, $post, $location);
    $meta = memberlite_parse_tags($meta, $post);
    
    return $meta;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function memberlite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'memberlite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'memberlite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so memberlite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so memberlite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in memberlite_categorized_blog.
 */
function memberlite_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'memberlite_categories' );
}
add_action( 'edit_category', 'memberlite_category_transient_flusher' );
add_action( 'save_post',     'memberlite_category_transient_flusher' );

class comment_walker extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	// constructor: wrapper for the comments list
	function __construct() { ?>

		<section class="comments-list">

	<?php }

	// start_lvl: wrapper for child comments list
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		
		<section class="child-comments comments-list">

	<?php }

	// end_lvl: closing wrapper for child comments list
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>

		</section>

	<?php }

	// start_el: HTML for comment template
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 

		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		} ?>

		<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
			<?php if($depth > 1) { ?><i class="fa fa-caret-left"></i><?php } ?>
			<figure class="gravatar"><?php echo get_avatar( $comment, 80, '', 'Author&#8217;s gravatar' ); ?></figure>
			<div class="comment-meta post-meta" role="complementary">
				<h4 class="comment-author">
					<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author" rel="nofollow" target="_blank"><?php comment_author(); ?></a>
				</h4>
				<?php edit_comment_link('<span class="alignright">Edit this comment</span>','',''); ?>
				<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
				<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-meta-item"><?php _e('Your comment is awaiting moderation.', 'memberlite'); ?></p>
				<?php endif; ?>
			</div>
			<div class="comment-content post-content" itemprop="text">
				<?php comment_text() ?>
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>

	<?php }

	// end_el: closing HTML for comment template
	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

		</article>

	<?php }

	// destructor: closing wrapper for the comments list
	function __destruct() { ?>

		</section>
	
	<?php }
}

class pings_walker extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	// constructor: wrapper for the comments list
	function __construct() { ?>

		<section class="comments-list">

	<?php }

	// start_lvl: wrapper for child comments list
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		
		<section class="child-comments comments-list">

	<?php }

	// end_lvl: closing wrapper for child comments list
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>

		</section>

	<?php }

	// start_el: HTML for comment template
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 

		if ( 'article' == $args['style'] ) {
			$tag = 'article';
			$add_below = 'comment';
		} else {
			$tag = 'article';
			$add_below = 'comment';
		} ?>

		<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
			<?php if($depth > 1) { ?><i class="fa fa-caret-left"></i><?php } ?>
			<div class="comment-meta post-meta" role="complementary">
				<h4 class="comment-author">
					<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author" rel="nofollow" target="_blank"><?php comment_author(); ?></a>
				</h4>
				<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
				<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
				<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-meta-item"><?php _e('Your comment is awaiting moderation.', 'memberlite'); ?></p>
				<?php endif; ?>
			</div>
	<?php }

	// end_el: closing HTML for comment template
	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

		</article>

	<?php }

	// destructor: closing wrapper for the comments list
	function __destruct() { ?>

		</section>
	
	<?php }

}