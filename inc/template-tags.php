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
		<span class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'memberlite' ); ?></span>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> ' . esc_html__( 'Older posts', 'memberlite' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'memberlite' ) . ' <span class="meta-nav">&rarr;</span>' ); ?></div>
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
		<span class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'memberlite' ); ?></span>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'memberlite' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'memberlite' ) );
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

		$post_type_object = get_post_type_object( get_post_type( $post ) );
		if ( empty( $post_type_object ) ) {
			return;
		}

		// check if subpage
		if ( ! empty( $post->post_parent ) ) {
			$post_ancestors = get_post_ancestors( $post );
			$child_of       = end( $post_ancestors );
		} else {
			$child_of = $post->ID;
		}

		// Check if this is a
		if ( empty( $child_of ) ) {
			return;
		}

		// build array of page ids for navigation
		$allpages = get_pages( 'child_of=' . $child_of . '&sort_column=menu_order&sort_order=asc' );

		$pages   = array();
		$pages[] = $child_of;       // parent id is first
		foreach ( $allpages as $page ) {
			$pages[] += $page->ID;
		}

		// figure out prev and next post IDs
		$current = array_search( $post->ID, $pages );

		// prev
		if ( ! empty( $pages[ $current - 1 ] ) ) {
			$previousID = $pages[ $current - 1 ];
		} else {
			$previousID = false;
		}

		// next
		if ( ! empty( $pages[ $current + 1 ] ) ) {
			$nextID = $pages[ $current + 1 ];
		} else {
			$nextID = false;
		}

		// don't show if neither prev or next
		if ( empty( $nextID ) && empty( $previousID ) ) {
			return;
		}

		// HTML
		?>
		<nav class="navigation page-navigation" role="navigation">
		<span class="screen-reader-text"><?php esc_html_e( 'Page navigation', 'memberlite' ); ?></span>
		<div class="nav-links">
			<?php if ( ! empty( $previousID ) && ( $previousID != $post->ID ) ) { ?>
				<div class="nav-previous"><a href="<?php echo esc_url( get_permalink( $previousID ) ); ?>" rel="prev"><span class="meta-nav">&larr;</span> <?php echo esc_html( get_the_title( $previousID ) ); ?></a></div>
			<?php } if ( ! empty( $nextID ) && ( $nextID != $post->ID ) ) { ?>
				<div class="nav-next"><a href="<?php echo esc_url( get_permalink( $nextID ) ); ?>" rel="next"><?php echo esc_html( get_the_title( $nextID ) ); ?> <span class="meta-nav">&rarr;</span></a></div>
			<?php } ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
	}
endif;

/**
 * Prints HTML with meta information based on theme setting Post Entry Meta (before or after) in customizer.
 */
function memberlite_get_entry_meta( $post = null, $location = 'before' ) {
	global $memberlite_defaults;

	if ( empty( $post ) ) {
		global $post;
	}

	$meta = get_theme_mod( 'posts_entry_meta_' . $location, $memberlite_defaults[ 'posts_entry_meta_' . $location ] );
	$meta = apply_filters( 'memberlite_get_entry_meta', $meta, $post, $location );
	$meta = memberlite_parse_tags( $meta, $post );

	return $meta;
}


/**
 * Function to return the author avatar for display on posts.
 *
 */
function memberlite_get_author_avatar( $author_id ) {
	/**
	 * Filter to hide avatars in the post entry header.
	 *
	 * @param $memberlite_show_author_avatar mixed Show avatars in the header for specific post types or hide everywhere.
	 *
	 * @return $memberlite_show_author_avatar mixed The post types or a bool value to show avatars.
	 */
	$memberlite_show_author_avatar = apply_filters( 'memberlite_show_author_avatar', array( 'post' ) );

	// Bail if false.
	if ( empty( $memberlite_show_author_avatar ) ) {
		return;
	}

	// Show avatars if always set or for a specific post type.
	if ( ! empty( $memberlite_show_author_avatar ) ) {
		if ( is_array( $memberlite_show_author_avatar ) && ! in_array( get_post_type(), $memberlite_show_author_avatar ) ) {
			// Set to false if this post_type should not show avatars.
			$memberlite_show_author_avatar = false;
		}
	}

	// The return variable
	$memberlite_author_avatar = '';

	// If we get here, we know it is either true or set for this post type.
	if ( ! empty( $memberlite_show_author_avatar ) ) :
		$memberlite_avatar_size = apply_filters( 'memberlite_avatar_size', 80 );
		$memberlite_author_avatar = '<div class="post_author_avatar">' . get_avatar( $author_id, $memberlite_avatar_size, '', get_the_author_meta( 'display_name', $author_id ) ) . '</div>';
	endif;

	return $memberlite_author_avatar;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function memberlite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'memberlite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

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
add_action( 'save_post', 'memberlite_category_transient_flusher' );
