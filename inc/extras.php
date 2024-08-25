<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Memberlite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function memberlite_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'memberlite_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function memberlite_body_classes( $classes ) {
	global $memberlite_defaults;

	// sidebar classes
	if ( ! is_page_template( 'templates/fluid-width.php' ) && ! memberlite_is_blog() ) {
		$classes[] = get_theme_mod( 'sidebar_location', $memberlite_defaults['sidebar_location'] );
	}
	if ( memberlite_is_blog() ) {
		$classes[] = get_theme_mod( 'sidebar_location_blog', $memberlite_defaults['sidebar_location_blog'] );
		$classes[] = 'content-archives-' . get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
	}
	if ( is_page_template( 'templates/sidebar-content.php' ) ) {
		$classes[] = 'sidebar-content';
	}
	if ( is_page_template( 'templates/content-sidebar.php' ) ) {
		$classes[] = 'content-sidebar';
	}

	// color scheme class
	$classes[] = 'scheme_' . get_theme_mod( 'memberlite_color_scheme', $memberlite_defaults['memberlite_color_scheme'] );

	// dark mode class
	if ( get_theme_mod( 'memberlite_darkcss', $memberlite_defaults['memberlite_darkcss'] ) ) {
		$classes[] = 'is-style-dark';
	} else {
		$classes[] = 'is-style-light';
	}

	// other classes
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( is_page_template( 'templates/landing.php' ) ) {
		$classes[] = 'landing';
	}
	if ( is_page_template( 'templates/interstitial.php' ) ) {
		$classes[] = 'interstitial';
	}

	return $classes;
}
add_filter( 'body_class', 'memberlite_body_classes' );

/* Get main and sidebar columns width from theme mod or defaults. */
function memberlite_getColumnsRatio( $location = null ) {
	global $memberlite_defaults;

	// Get the values as set in customizer.
	$columns_ratio              = get_theme_mod( 'columns_ratio', $memberlite_defaults['columns_ratio'] );
	$columns_ratio_header       = get_theme_mod( 'columns_ratio_header', $memberlite_defaults['columns_ratio_header'] );
	$columns_ratio_array        = explode( '-', $columns_ratio );
	$columns_ratio_header_array = explode( '-', $columns_ratio_header );

	// Get the page template slug to use in checking which ratio below.
	$page_template_slug = get_page_template_slug();

	if ( $location == 'sidebar' ) {
		$r = $columns_ratio_array[1];
	} elseif ( $location == 'header-right' ) {
		$r = $columns_ratio_header_array[1];
	} elseif ( $location == 'header-left' ) {
		$r = $columns_ratio_header_array[0];
	} elseif ( is_front_page() && empty( $page_template_slug ) && 'posts' != get_option( 'show_on_front' ) ||
		is_page_template( 'templates/full-width.php' ) ||
		is_page_template( 'templates/interstitial.php' )
	) {
		$r = '12';
	} elseif ( is_page_template( 'templates/narrow-width.php' ) ) {
		$r = '8 medium-offset-2';
	} elseif ( ( $location == 'masthead' ) && is_page_template( 'templates/narrow-width.php' ) ) {
		$r = '8 medium-offset-2';
	} elseif ( $location == 'masthead' ) {
		$r = '12';
	} else {
		$r = $columns_ratio_array[0];
	}

	// Filter to allow child themes and plugins to modify column width.
	$r = apply_filters( 'memberlite_columns_ratio', $r, $location );

	return $r;
}

function memberlite_sidebar_location_none_columns_ratio( $r, $location ) {
	global $memberlite_defaults;

	if ( ! empty( $location ) ) {
		return $r;
	}

	if ( is_page() ) {
		$sidebar_location = get_theme_mod( 'sidebar_location', $memberlite_defaults['sidebar_location'] );
		if ( $sidebar_location === 'sidebar-none' && empty( is_page_template() ) ) {
			$r = '8 medium-offset-2';
		}
	} elseif ( memberlite_is_blog() || is_search() ) {
		$sidebar_location = get_theme_mod( 'sidebar_location_blog', $memberlite_defaults['sidebar_location_blog'] );
		$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
		if ( $content_archives === 'grid' && ! is_singular() && ! is_search() ) {
			$r = '12';
		} elseif ( $sidebar_location === 'sidebar-blog-none' ) {
			$r = '8 medium-offset-2';
		}
	}

	return $r;
}
add_filter( 'memberlite_columns_ratio', 'memberlite_sidebar_location_none_columns_ratio', 10, 2 );

/**
 * Hide the sidebar if the theme option is set to none.
 *
 */
function memberlite_sidebar_none_get_sidebar( $name ) {
	global $memberlite_defaults;

	if ( is_page() ) {
		$sidebar_location = get_theme_mod( 'sidebar_location', $memberlite_defaults['sidebar_location'] );
		if ( $sidebar_location === 'sidebar-none' && empty( is_page_template() ) ) {
			$name = false;
		}
	} elseif ( memberlite_is_blog() || is_search() ) {
		$sidebar_location = get_theme_mod( 'sidebar_location_blog', $memberlite_defaults['sidebar_location_blog'] );
		if ( $sidebar_location === 'sidebar-blog-none' ) {
			$name = false;
		}
	}

	return $name;
}
add_filter( 'memberlite_get_sidebar', 'memberlite_sidebar_none_get_sidebar' );

/**
 * Get the width of a thumbnail.
 */
function memberlite_getPostThumbnailWidth( $post_id = null ) {
	// get thumbnail from post_id
	$attachment_id = get_post_thumbnail_id( $post_id );
	if ( empty( $attachment_id ) ) {
		return false;   // no thumbnail
	}

	// get attachment src, width, and height
	$attachment = wp_get_attachment_image_src( $attachment_id, 'full' );

	// make sure width is there
	if ( is_array( $attachment ) && ! empty( $attachment[1] ) ) {
		return $attachment[1];
	} else {
		return false;
	}
}

/**
 * Change the excerpt more string
 */
function memberlite_excerpt_more( $more ) {
	global $post;

	if ( ! is_admin() ) {
		$more = ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" rel="nofollow">' . esc_html( __( '(more...)', 'memberlite' ) ) . '</a>';
	}

	return $more;
}
add_filter( 'excerpt_more', 'memberlite_excerpt_more' );

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @return string The Link format URL.
 */
function memberlite_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', esc_url( get_permalink() ) );
}

/**
 * Some content filters for excerpts on pages - used in Theme Templates
 */
function memberlite_get_the_content_after_more( $content = null ) {
	if ( $content === null ) {
		$content = get_the_content();
	}
	$moretag = preg_match( '/\<span id="more-[0-9]*"\>\<\/span\>/', $content, $matches );
	if ( ! $moretag ) {
		$moretag = preg_match( '/(\<\!\-\-more\-\-\>)/', $content, $matches );
	}
	if ( $moretag ) {
		$morespan     = $matches[0];
		$morespan_pos = strpos( $content, $morespan );
		$newcontent   = substr( $content, $morespan_pos + strlen( $morespan ), strlen( $content ) - strlen( $morespan ) );
		$newcontent   = apply_filters( 'the_content', $newcontent );
		return $newcontent;
	} else {
		return '';
	}
}

function memberlite_get_the_content_before_more( $content = null ) {
	if ( $content === null ) {
		$content = get_the_content();
	}

	$moretag = preg_match( '/\<span id="more-[0-9]*"\>\<\/span\>/', $content, $matches );
	if ( ! $moretag ) {
		$moretag = preg_match( '/(\<\!\-\-more\-\-\>)/', $content, $matches );
	}
	if ( $moretag ) {
		$morespan     = $matches[0];
		$morespan_pos = strpos( $content, $morespan );
		$newcontent   = substr( $content, 0, $morespan_pos );
		$newcontent   = apply_filters( 'the_content', $newcontent );
		return $newcontent;
	} else {
		return $content;
	}
}

function memberlite_the_content( $content ) {
	global $memberlite_defaults;

	// Identify where the more tag is (block editor or class editor).
	$moretag = preg_match( '/\<span id="more-[0-9]*"\>\<\/span\>/', $content, $matches );
	if ( ! $moretag ) {
		$moretag = preg_match( '/(\<\!\-\-more\-\-\>)/', $content, $matches );
	}

	// Optionally include the featured image.
	$image_content = memberlite_loop_image();

	// Adjust the format of the excerpt and content, insert block image if set in theme options.
	if ( ! empty( $moretag ) ) {
		$morespan = $matches[0];
		$morespan_pos = strpos( $content, $morespan );
		$leadcontent = substr( $content, 0, $morespan_pos );

		// Add the block image between the "excerpt" and the rest of the content.
		if ( ! empty( $image_content ) ) {
			$leadcontent .= $image_content;
		}

		/**
		 * Filter to turn off the enlarged/enhanced excerpt text for a single post with a separator.
		 *
		 * @since 4.5.4
		 *
		 * @param bool $memberlite_excerpt_larger Enlarge/enhance the excerpt text on a single post.
		 * @return bool $memberlite_excerpt_larger
		 *
		 */
		$memberlite_excerpt_larger = apply_filters( 'memberlite_excerpt_larger', true);
		if ( ! empty( $memberlite_excerpt_larger ) ) {
			$leadcontent = '<div class="lead">' . $leadcontent . '<hr /></div>';
		}

		// Add the content after the $more tag to the $content.
		$newcontent = substr( $content, $morespan_pos + strlen( $morespan ), strlen( $content ) - strlen( $morespan ) );

		// The new $content variable.
		$content = $leadcontent . $newcontent;
	} elseif ( ! empty( $image_content ) && is_singular() ) {
		// No excerpt. Add the block image before the content if theme mod is set to show_block.
		$content = $image_content . $content;
	}

	// The returned, reformatted $content.
	return $content;
}
add_filter( 'the_content', 'memberlite_the_content' );

/**
 * Show the excerpt for a post whether it is specified,
 * implied by a more tag, or generated.
 */
function memberlite_the_excerpt() {
	global $post;

	$content_arr = get_extended( $post->post_content );
	if ( empty( $content_arr['extended'] ) ) {
		// There is no custom excerpt designated, show the_excerpt()
		the_excerpt();
	} else {
		// There is an excerpt designated by the <!--more--> tag, show that.
		echo wp_kses_post( apply_filters( 'the_content', $content_arr['main'] ) );
	}

	// Optionally include the featured image.
	$image_content = memberlite_loop_image();
	if ( ! empty ( $image_content ) ) {
		$loop_image_allowed_html = array(
			'img' => array(
				'alt' => array(),
				'class' => array(),
				'height' => array(),
				'loading' => array(),
				'sizes' => array(),
				'src' => array(),
				'srcset' => array(),
				'title' => array(),
				'width' => array()
			)
		);
		echo wp_kses( $image_content, $loop_image_allowed_html );
	}
}

/**
 * Show the full post content.
 * Override the $more global so full content shows on archives/etc.
 * Despite warnings in theme checks, this is the approved way of
 * doing this.
 */
function memberlite_more_content() {
	global $more;
	$more = 1;
	the_content();
}

/**
 * Get the featured block image to insert into the post content.
 * 
 */
function memberlite_loop_image() {
	global $memberlite_defaults;

	// Get the theme setting for loop images.
	$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );

	// Return if the theme mod isn't set to show block images.
	if ( $memberlite_loop_images != 'show_block' ) {
		return false;
	}

	/**
	 * Filter to specify what post types to include a block image for based on theme setting.
	 *
	 * @since 4.5.4
	 *
	 * @param array $memberlite_loop_images_post_types An array of post types to include a featured image for based on theme setting.
	 * @return array $memberlite_loop_images_post_types
	 *
	 */
	$memberlite_loop_images_post_types = apply_filters( 'memberlite_loop_images_post_types', array( 'post') );

	// Check if the current post's post_type should show an image.
	if ( ! empty( $memberlite_loop_images_post_types ) && ( ! in_array( get_post_type(), $memberlite_loop_images_post_types ) ) ) {
		return false;
	} else {
		$image_content = get_the_post_thumbnail( null, 'large' );
	}
	return $image_content;
}

function memberlite_page_title( $echo = true ) {
	global $post;

	// capture output
	ob_start();

	// figure out page title
	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) { ?>
		<h1 class="page-title">
		<?php
		if ( is_shop() ) {
			echo esc_html( get_the_title( get_option( 'woocommerce_shop_page_id' ) ) );
		} elseif ( is_archive() ) {
			single_cat_title();
		} else {
			the_title();
		}
		?>
		</h1>
			<?php
			// Show an optional term description.
			$term_description = woocommerce_product_archive_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', wp_kses_post( $term_description ) );
			endif;
			woocommerce_taxonomy_archive_description();
	} elseif ( is_post_type_archive() ) {
		?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<?php
	} elseif ( function_exists( 'is_bbpress' ) && ( is_bbpress() || bbp_is_single_user() ) ) {
		?>
		<h1 class="page-title">
		<?php
		if ( bbp_is_search_results() ) {
			/* translators: %s: bbPress forum search terms */
			printf( esc_html__( 'Forum Search Results for: %s', 'memberlite' ), '<span>' . esc_html( bbp_get_search_terms() ) . '</span>' );
		} elseif ( bbp_is_search() ) {
			esc_html_e( 'Forum Search', 'memberlite' );
		} elseif ( bbp_is_single_forum() || bbp_is_single_topic() ) {
			the_title();
		} elseif ( bbp_is_single_user() ) {
			/* translators: %s: bbPress user profile display name */
			echo sprintf( esc_html__( '%s\'s Profile', 'memberlite' ), esc_html( get_userdata( bbp_get_user_id() )->display_name ) );
		} else {
			esc_html_e( 'Forums', 'memberlite' );
		}
		?>
		</h1>
		<?php
	} elseif ( is_author() || is_tag() || is_archive() ) {
		$archive_title = get_the_archive_title();
		$archive_description = get_the_archive_description();

		if ( ! empty( $archive_title ) ) { ?>
			<h1 class="page-title">
				<?php echo wp_kses_post( $archive_title ); ?>
			</h1>
			<?php
		}

		if ( ! empty( $archive_description ) ) { ?>
			<div class="taxonomy-description">
				<?php echo wp_kses_post( $archive_description ); ?>
			</div>
			<?php
		}

	} elseif ( is_search() ) {
		?>
		<h1 class="page-title">
			<?php
				/* translators: %s: search keywords */
				printf( esc_html__( 'Search Results for: %s', 'memberlite' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
		<?php
	} elseif ( is_singular( 'post' ) ) { ?>
		<div class="masthead-post-byline">
			<?php
				$author_avatar_allowed_html = array(
					'div' => array(
						'class' => array(),
					),
					'img' => array(
						'alt' => array(),
						'class' => array(),
						'height' => array(),
						'loading' => array(),
						'src' => array(),
						'title' => array(),
						'width' => array()
					),
					'noscript' => array()
				);
				echo wp_kses( memberlite_get_author_avatar( $post->post_author ), $author_avatar_allowed_html );
			?>
			<div class="entry-header-content">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php
					$memberlite_get_entry_meta_before = memberlite_get_entry_meta( $post, 'before' );
				if ( ! empty( $memberlite_get_entry_meta_before ) ) {
					?>
					<p class="entry-meta">
						<?php echo Memberlite_Customize::sanitize_text_with_links( memberlite_get_entry_meta( $post, 'before' ) ); ?>
						</p><!-- .entry-meta -->
						<?php
				}
				?>
			</div> <!-- .entry-header-content -->
		</div>
		<?php
	} elseif ( is_home() ) {
		?>
		<h1 class="page-title">
		<?php
		if ( get_option( 'page_for_posts' ) ) {
			echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) );
		}
		?>
		</h1>
		<?php
	} elseif ( is_404() ) {
		echo '<h1 class="entry-title">' . esc_html__( '404: Page Not Found', 'memberlite' ) . '</h1>';
	} else {
		the_title( '<h1 class="entry-title">', '</h1>' );
	}

	// get captured output
	$page_title_html = ob_get_contents();
	ob_end_clean();

	// filter
	$page_title_html = apply_filters( 'memberlite_page_title', $page_title_html );

	if ( $echo ) {
		echo wp_kses_post( $page_title_html );
	}

	return $page_title_html;
}

/**
 * Are we on a "blog" page?
 */
function memberlite_is_blog() {
	$is_blog = ( is_home() || is_singular( 'post' ) || ( is_archive() && ! is_post_type_archive() && ! is_tax() ) );

	$is_blog = apply_filters( 'memberlite_is_blog', $is_blog );

	return $is_blog;
}

function memberlite_nav_menu_submenu() {
	if ( memberlite_is_blog() ) {
		$current_post = get_post( get_option( 'page_for_posts' ) );
	} else {
		$current_post = get_queried_object();
	}

	// Build the pages array
	if ( ! empty( $current_post ) && ! empty( $current_post->post_parent ) ) {
		$exclude   = get_post_meta( $current_post->ID, 'exclude', true );
		$ancestors = get_post_ancestors( $current_post );
		if ( ! empty( $ancestors ) ) {
			$pagemenuid = end( $ancestors );
		} else {
			$pagemenuid = $current_post->ID;
		}
		/**
		 * Filter to set the top level page to generate the submenu.
		 *
		 * @param string $pagemenuid The post ID of the page used to generate the submenu. Defaults to the post's oldest ancestor.
		 * @param array $ancestors An array of post IDs for the ancestors of the current post.
		 */
		$pagemenuid = apply_filters( 'memberlite_nav_menu_submenu_pagemenuid', $pagemenuid, $ancestors );
		$children   = wp_list_pages( 'title_li=&child_of=' . $pagemenuid . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order,post_title' );
		$titlenamer = get_the_title( $pagemenuid );
		$titlelink  = get_permalink( $pagemenuid );
	} elseif( ! empty( $current_post->ID ) )  {
		$exclude    = '';
		$children   = wp_list_pages( 'title_li=&child_of=' . $current_post->ID . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order,post_title' );
		$titlenamer = get_the_title( $current_post->ID );
		$titlelink  = get_permalink( $current_post->ID );
	}

	// Display the nav menu
	if ( ! empty( $children ) ) {
	?>
		<aside id="nav_menu-submenu" class="widget widget_nav_menu">
			<h3 class="widget-title"><a
			<?php
			if ( ! empty( $pagemenuid ) && is_page( $pagemenuid ) ) {
?>
 class="active"<?php } ?> href="<?php echo esc_url( $titlelink ); ?>"><?php echo esc_html( $titlenamer ); ?></a></h3>
			<ul class="menu">
				<?php echo wp_kses_post( $children ); ?>
			</ul>
		</aside> <!-- end widget -->
	<?php
	}
}

function memberlite_get_widget_areas() {
	$widget_areas = array();

	if ( is_page() ) {
		// Add the submenu widget to the sidebar on Pages (not a real widget area; handled in memberlite_nav_menu_submenu() )
		$widget_areas[] = 'memberlite_nav_menu_submenu';

		// Add the 'Pages' sidebar
		$widget_areas[] = 'sidebar-1';
	} elseif ( memberlite_is_blog() ) {
		// Add the submenu widget to the sidebar (not a real widget area; handled in memberlite_nav_menu_submenu() )
		$widget_areas[] = 'memberlite_nav_menu_submenu';

		// Add the 'Posts and Archives' sidebar
		$widget_areas[] = 'sidebar-2';
	} else {
		// Add the 'Posts and Archives' sidebar
		$widget_areas[] = 'sidebar-2';
	}

	// Filter to allow customization of the array of widget areas
	$widget_areas = apply_filters( 'memberlite_get_widget_areas', $widget_areas );

	return $widget_areas;
}

/* Customizes the bbp_breadcrumb output */
function memberlite_bbp_breadcrumb( $args ) {
	global $memberlite_defaults;
	$args = array(
		'sep'       => get_theme_mod( 'delimiter', $memberlite_defaults['delimiter'] ),
		'home_text' => __( 'Home', 'memberlite' ),
		'before'    => '',
		'after'     => '',
	);
	return $args;
}
add_filter( 'bbp_before_get_breadcrumb_parse_args', 'memberlite_bbp_breadcrumb' );

/* Removes bbp_breadcrumb from bbpress templates */
add_filter( 'bbp_no_breadcrumb', '__return_true' );

function memberlite_getBreadcrumbs() {
	global $posts, $post, $memberlite_defaults;
	$page_breadcrumbs       = get_theme_mod( 'page_breadcrumbs', false );
	$post_breadcrumbs       = get_theme_mod( 'post_breadcrumbs', false );
	$archive_breadcrumbs    = get_theme_mod( 'archive_breadcrumbs', false );
	$attachment_breadcrumbs = get_theme_mod( 'attachment_breadcrumbs', false );
	$search_breadcrumbs     = get_theme_mod( 'search_breadcrumbs', false );
	$profile_breadcrumbs    = get_theme_mod( 'profile_breadcrumbs', false );
	$show_breadcrumbs       = ( '' != $page_breadcrumbs
		|| '' != $post_breadcrumbs
		|| '' != $archive_breadcrumbs
		|| '' != $attachment_breadcrumbs
		|| '' != $search_breadcrumbs
		|| '' != $profile_breadcrumbs
	) ? true : false;

	$memberlite_show_breadcrumbs = apply_filters( 'memberlite_show_breadcrumbs', true );

	if ( $memberlite_show_breadcrumbs ) {
		$memberlite_delimiter = get_theme_mod( 'delimiter', $memberlite_defaults['delimiter'] );

		$memberlite_hide_home_breadcrumb = apply_filters( 'memberlite_hide_home_breadcrumb', false );

		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			woocommerce_breadcrumb();
		} elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
			<?php
				/* Displays bbp_breadcrumb in theme masthead */
				remove_filter( 'bbp_no_breadcrumb', '__return_true' );
				echo wp_kses_post( bbp_breadcrumb() );
				add_filter( 'bbp_no_breadcrumb', '__return_true' );
			?>
			</nav>
		<?php } elseif ( is_attachment() && '' != $attachment_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<?php if ( empty( $memberlite_hide_home_breadcrumb ) ) { ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberlite' ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<?php
					global $post;
					$parent_id   = $post->post_parent;
					$breadcrumbs = array();
				while ( $parent_id ) {
					$page          = get_page( $parent_id );
					$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '" title="">' . get_the_title( $page->ID ) . '</a><span class="sep">' . $memberlite_defaults['delimiter'] . '</span>';
					$parent_id     = $page->post_parent;
				}
					$breadcrumbs = array_reverse( $breadcrumbs );
				foreach ( $breadcrumbs as $crumb ) {
					echo wp_kses_post( $crumb );
				}
				?>
				<span class="current_page_item"><?php the_title(); ?></span>
			</nav>
		<?php } elseif ( is_page() && ! is_front_page() && ! is_attachment() && '' != $page_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<?php if ( empty( $memberlite_hide_home_breadcrumb ) ) { ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberlite' ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<?php
					$breadcrumbs = get_post_ancestors( $post->ID );
				if ( ! empty( $breadcrumbs ) ) {
					$breadcrumbs = array_reverse( $breadcrumbs );
					foreach ( $breadcrumbs as $crumb ) {
					?>
							<a href="<?php echo esc_url( get_permalink( $crumb ) ); ?>"><?php echo esc_html( get_the_title( $crumb ) ); ?></a>
							<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php
					}
				}
				?>
				<?php
				if ( is_page( array( get_option( 'pmpro_cancel_page_id' ), get_option( 'pmpro_billing_page_id' ), get_option( 'pmpro_confirmation_page_id' ), get_option( 'pmpro_invoice_page_id' ) ) ) && ! in_array( get_option( 'pmpro_account_page_id' ), get_post_ancestors( $post->ID ) ) ) {
				?>
					<a href="<?php echo esc_url( get_permalink( get_option( 'pmpro_account_page_id' ) ) ); ?>"><?php echo esc_html( get_the_title( get_option( 'pmpro_account_page_id' ) ) ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
					<?php
				}
				?>
				<span class="current_page_item"><?php the_title(); ?></span>
			</nav>
		<?php } elseif ( is_post_type_archive() && '' != $archive_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<?php if ( empty( $memberlite_hide_home_breadcrumb ) ) { ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberlite' ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<?php
				$post_type = get_post_type_object( get_query_var( 'post_type' ) );
				echo '<span class="current_page_item">' . esc_html( $post_type->labels->name ) . '</span>';
			?>
			</nav>
		<?php } elseif ( ( ( is_author() || is_tag() || is_archive() ) ) && '' != $archive_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<?php if ( empty( $memberlite_hide_home_breadcrumb ) ) { ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberlite' ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<?php
				if ( is_tax() ) {
					$queried_object = get_queried_object();
					$term_taxonomy  = $queried_object->taxonomy;
					$taxonomy       = get_taxonomy( $term_taxonomy );
				}
				if ( is_tax() && count( $taxonomy->object_type ) === 1 ) {
					$post_type = get_post_type_object( $taxonomy->object_type[0] );
					?>
					<a href="<?php echo esc_url( get_post_type_archive_link( $taxonomy->object_type[0] ) ); ?>"><?php echo esc_html( $post_type->labels->name ); ?></a>
						<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php
				} elseif ( get_option( 'page_for_posts' ) ) { ?>
						<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></a>
						<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php
				} ?>

				<?php
					if ( is_category() ) :
						echo '<span class="current_page_item">' . single_cat_title( '', false ) . '</span>';

					elseif ( is_tag() ) :
						$current_tag = single_tag_title( '', false );
						/* translators: %s: current tag archive's single title */
						printf( esc_html__( 'Posts Tagged: %s', 'memberlite' ), '<span class="current_page_item">' . esc_html( $current_tag ) . '</span>' );

					elseif ( is_author() ) :
						/* translators: %s: current author archive's name */
						printf( esc_html__( 'Author: %s', 'memberlite' ), '<span class="vcard current_page_item">' . get_the_author() . '</span>' );

					elseif ( is_day() ) :
						/* translators: %s: day for the viewed archive */
						printf( esc_html__( 'Day: %s', 'memberlite' ), '<span class="current_page_item">' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
						/* translators: %s: month for the viewed archive */
						printf( esc_html__( 'Month: %s', 'memberlite' ), '<span class="current_page_item">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'memberlite' ) ) . '</span>' );

					elseif ( is_year() ) :
						/* translators: %s: year for the viewed archive */
						printf( esc_html__( 'Year: %s', 'memberlite' ), '<span class="current_page_item">' . get_the_date( _x( 'Y', 'yearly archives date format', 'memberlite' ) ) . '</span>' );

					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Asides', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Galleries', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Images', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Videos', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Quotes', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Links', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Statuses', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Audios', 'memberlite' ) . '</span>';

					elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
						echo '<span class="current_page_item">' . esc_html__( 'Chats', 'memberlite' ) . '</span>';

					elseif ( is_tax( ) ) :
						echo '<span class="current_page_item">' . esc_html( single_term_title( '', false ) ) . '</span>';

					else :
						echo '<span class="current_page_item">' . esc_html__( 'Archives', 'memberlite' ) . '</span>';

					endif;
				?></span>
			</nav>
		<?php } elseif ( is_singular( array( 'post' ) ) && '' != $post_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<?php if ( empty( $memberlite_hide_home_breadcrumb ) ) { ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberlite' ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<?php if ( get_option( 'page_for_posts' ) ) { ?>
					<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<span class="current_page_item"><?php the_title(); ?></span>
			</nav>
		<?php } elseif ( is_single() && '' != $post_breadcrumbs ) {
			$post_type_object = get_post_type_object( get_post_type( $post ) );
			?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<?php if ( empty( $memberlite_hide_home_breadcrumb ) ) { ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberlite' ); ?></a>
				<?php } ?>
				<?php if ( $post_type_object->has_archive == true ) { ?>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
					<a href="<?php echo esc_url( get_post_type_archive_link( get_post_type( $post ) ) ); ?>"><?php echo esc_html( $post_type_object->labels->name ); ?></a>
				<?php } ?>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<span class="current_page_item"><?php the_title(); ?></span>
			</nav>
		<?php } elseif ( is_search() && '' != $search_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<?php if ( empty( $memberlite_hide_home_breadcrumb ) ) { ?>
					<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'memberlite' ); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<?php
				if ( get_option( 'page_for_posts' ) ) {
					?>
					<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></a>
						<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php
				}
				?>
				<?php esc_html_e( 'Search Results For', 'memberlite' ); ?> '<?php the_search_query(); ?>'
			</nav>
		<?php
}
	}
}

function memberlite_should_show_banner_image( $post_id = null ) {
	global $memberlite_defaults;

	// default to global post
	if ( empty( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}

	// no post, no show
	if ( empty( $post_id ) ) {
		$r = false;
	} else {
		// Check if we should show the banner image in the loop based on customizer setting
		$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );
		if ( ( in_the_loop() && ( $memberlite_loop_images == 'show_both' || $memberlite_loop_images == 'show_banner' ) ) ) {
			$r = true;
		} else {
			$r = false;
		}
	}

	/**
	 * Filter whether the banner image should be shown or not
	 */
	$r = apply_filters( 'memberlite_should_show_banner_image', $r, $post_id );

	return $r;
}

/**
 * Get the post thumbnail image src and allow filtering.
 * Used to swap in the banner for loop/single posts with Memberlite Elements.
 */
function memberlite_get_banner_image( $attachment_id = 0, $size = 'banner', $icon = false, $attr = '', $post_id = 0 ) {
	// default to global post
	if ( empty( $attachment_id ) ) {
		global $post;
		$post_id = $post->ID;
		$attachment_id = get_post_thumbnail_id( $post_id );
	}

	$memberlite_banner_image = wp_get_attachment_image( $attachment_id, $size, $icon, $attr );

	$memberlite_banner_image = apply_filters( 'memberlite_get_banner_image', $memberlite_banner_image, $attachment_id, $size, $icon, $attr, $post_id );

	return $memberlite_banner_image;
}

/**
 * Get the post thumbnail image src and allow filtering.
 * Used to swap in the banner for loop/single posts with Memberlite Elements.
 */
function memberlite_get_banner_image_src( $post_id = null, $size = 'banner' ) {
	// default to global post
	if ( empty( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}

	$memberlite_banner_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );

	$memberlite_banner_image_src = apply_filters( 'memberlite_banner_image_src', $memberlite_banner_image_src, $size, $post_id );

	return $memberlite_banner_image_src;
}

/**
 * Parses tags added to fields in customizer (i.e. posts_entry_meta_before and posts_entry_meta_after. Available tags include:
 *
 * * {post_author} - Entry author display name
 * * {post_author_posts_link} - Entry author display name, linked to their archive
 * * {post_categories} - List of entry categories separated by a comma.
 * * {post_comments} - Entry comments link in the format "X Comment/s".
 * * {post_date} - Date the entry was published, formatted to your site's "Date Format" under Settings > General
 * * {post_permalink} - A permalink to the post displayed as "permalink".
 * * {post_permalink_icon} - A permalink to the post displayed as the Font Awesome "link" icon.
 * * {post_tags} - List of entry tags separated by a comma.
 * * {post_time} - Time the entry was published, formatted to your site's "Time Format" under Settings > General
 * * {post_title} - Title of the entry.
 *
 */
function memberlite_parse_tags( $meta, $post = null ) {

	$author = get_userdata( $post->post_author );

	$searches     = array();
	$replacements = array();

	if ( strpos( $meta, '{post_author}' ) !== false && ! empty( $author ) ) {
		$searches[]     = '{post_author}';
		$replacements[] = '<span class="author vcard post_meta_author">' . esc_html( $author->display_name ) . '</span>';
	}

	if ( strpos( $meta, '{post_author_posts_link}' ) !== false && ! empty( $author ) ) {
		$searches[]     = '{post_author_posts_link}';
		$replacements[] = '<span class="author vcard post_meta_author_posts_link"><a class="url fn n" href="' . esc_url( get_author_posts_url( $author->ID, $author->user_nicename ) ) . '">' . esc_html( $author->display_name ) . '</a></span>';
	}

	if ( strpos( $meta, '{post_categories}' ) !== false ) {
		$searches[]     = '{post_categories}';
		$category_list = get_the_category_list( __( ', ', 'memberlite' ), '', $post->ID );
		if ( ! empty( $category_list ) ) {
			$replacements[] = '<span class="post_meta_categories">' . $category_list . '</span>';
		} else {
			$replacements[] = '<span class="post_meta_categories">' . __( 'No Category', 'memberlite' ) . '</span>';
		}
	}

	if ( strpos( $meta, '{post_comments}' ) !== false ) {
		$searches[]     = '{post_comments}';
		
		// Get comments count (exclude Trackbacks and Pingbacks).
		$comment_args = array(
			'post_id'	=> $post->ID,
			'count'		=> true,
			'type'		=> 'comment'
		);
		$num_comments = get_comments($comment_args);

		// Show comment count if open and post is public.
		if ( ! post_password_required() && ( comments_open() || ( $num_comments > 0 ) ) ) {
			if ( $num_comments === 0 ) {
				$comments = esc_html__( 'No Comments', 'memberlite' );
			} elseif ( $num_comments > 1 ) {
				/* translators: %s: number of comments */
				$comments = sprintf( esc_html__( '%s Comments', 'memberlite' ), $num_comments );
			} else {
				$comments = esc_html__( '1 Comment', 'memberlite' );
			}
			$write_comments = '<a href="';
			if ( is_single() ) {
				$write_comments .= '#respond';
			} else {
				$write_comments .= get_comments_link( $post->ID );
			}
			$write_comments .= '">' . $comments . '</a>';
			$replacements[] = '<span class="post_meta_comments">' . $write_comments . '</span>';
		} else {
			$replacements[] = '<span class="post_meta_comments">' . esc_html__( 'Comments Off', 'memberlite' ) . '</span>';
		}
	}

	if ( strpos( $meta, '{post_date}' ) !== false ) {
		$searches[]     = '{post_date}';
		$replacements[] = '<span class="post_meta_date"><time class="entry-date published" datetime="' . esc_attr( get_the_date( 'Y-m-d', $post->ID ) ) . '">' . esc_html( get_the_date( get_option( 'date_format' ), $post->ID ) ) . '</time></span>';
	}

	if ( strpos( $meta, '{post_permalink}' ) !== false ) {
		$searches[]     = '{post_permalink}';
		$replacements[] = '<span class="post_meta_permalink"><a href="' . get_permalink( $post->ID ) . '" rel="bookmark">' . __( 'permalink', 'memberlite' ) . '</a></span>';
	}

	if ( strpos( $meta, '{post_permalink_icon}' ) !== false ) {
		$searches[]     = '{post_permalink_icon}';
		$replacements[] = '<span class="post_meta_permalink_icon"><a href="' . get_permalink( $post->ID ) . '" rel="bookmark" class="post_meta_permalink_icon"><i class="fa fa-link"></i></a></span>';
	}
	if ( strpos( $meta, '{post_tags}' ) !== false ) {
		$searches[]     = '{post_tags}';
		$tag_list = get_the_tag_list( '', __( ', ', 'memberlite' ) );
		if ( ! empty( $tag_list ) ) {
			$replacements[] = '<span class="post_meta_tags">' . $tag_list . '</span>';
		}
	}

	if ( strpos( $meta, '{post_time}' ) !== false ) {
		$searches[]     = '{post_time}';
		$replacements[] = '<span class="post_meta_time"><time class="entry-time" datetime="' . esc_attr( get_the_date( 'H:i' ), $post->ID ) . '">' . esc_html( get_the_time() ) . '</time></span>';
	}

	if ( strpos( $meta, '{post_title}' ) !== false ) {
		$searches[]     = '{post_title}';
		$replacements[] = '<span class="entry-title post_meta_title">' . esc_html( get_the_title( $post->ID ) ) . '</span>';
	}

	$meta = str_replace( $searches, $replacements, $meta );
	return $meta;
}
