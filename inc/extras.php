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
	global $post, $memberlite_defaults;
	
	//sidebar classes
	if ( !is_page_template( 'templates/fluid-width.php' ) ) {
		$classes[] = get_theme_mod( 'sidebar_location', $memberlite_defaults['sidebar_location'] );
	}

	$classes[] = get_theme_mod( 'sidebar_location_blog', $memberlite_defaults['sidebar_location_blog'] );

	if ( is_page_template( 'templates/sidebar-content.php' ) ) {
		$classes[] = 'sidebar-content';
	}

	if ( is_page_template( 'templates/content-sidebar.php' ) ) {
		$classes[] = 'content-sidebar';
	}
	
	//color scheme class
	$classes[] = 'scheme_' . get_theme_mod( 'memberlite_color_scheme', $memberlite_defaults['memberlite_color_scheme'] );
	
	//other classes	
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
function memberlite_getColumnsRatio( $location = NULL ) {
	global $memberlite_defaults;
	
	//Get the values as set in customizer.
	$columns_ratio = get_theme_mod( 'columns_ratio', $memberlite_defaults['columns_ratio'] );
	$columns_ratio_header = get_theme_mod( 'columns_ratio_header', $memberlite_defaults['columns_ratio_header'] );
	$columns_ratio_array = explode( '-', $columns_ratio );
	$columns_ratio_header_array = explode( '-', $columns_ratio_header );

	if( $location == 'sidebar' ) {
		$r = $columns_ratio_array[1];
	} elseif( $location == 'header-right' ) {
		$r = $columns_ratio_header_array[1];
	} elseif( $location == 'header-left' ) {
		$r = $columns_ratio_header_array[0];
	} elseif( is_page_template( 'templates/full-width.php' ) || is_page_template( 'templates/interstitial.php' ) ) {
		$r = '12';
	} elseif( is_page_template( 'templates/narrow-width.php' ) ) {
		$r = '8 medium-offset-2';
	} elseif( ( $location == 'masthead') && is_page_template( 'templates/narrow-width.php' ) ) {
		$r = '8 medium-offset-2';
	} elseif( $location == 'masthead' ) {
		$r = '12';
	} else {
		$r = $columns_ratio_array[0];
	}

	//Filter to allow child themes and plugins to modify column width.
	$r = apply_filters( 'memberlite_columns_ratio', $r, $location );

	return $r;
}

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function memberlite_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'memberlite_setup_author' );

/**
 * Get the width of a thumbnail.
 *
 */
function memberlite_getPostThumbnailWidth( $post_id = NULL ) {
	//get thumbnail from post_id
	$attachment_id = get_post_thumbnail_id( $post_id );	
	if( empty( $attachment_id) ) {
		return false;	//no thumbnail
	}
		
	//get attachment src, width, and height
	$attachment = wp_get_attachment_image_src( $attachment_id, 'full' );
	
	//make sure width is there
	if( is_array( $attachment ) && !empty( $attachment[1] ) ) {
		return $attachment[1];
	} else {
		return false;	
	}
}

function memberlite_excerpt_more( $more ) {
	global $post;
	return ' <a href="'. get_permalink($post->ID) . '">(more...)</a></p>';
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

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Some content filters for excerpts on pages - used in Theme Templates
 *
 *
*/
function memberlite_get_the_content_after_more( $content = NULL ) {
	if($content === NULL) {
		$content = get_the_content();
	}

	$moretag = preg_match( "/\<span id=\"more-[0-9]*\"\>\<\/span\>/", $content, $matches );

	if(!$moretag) {
		$moretag = preg_match( "/(\<\!\-\-more\-\-\>)/", $content, $matches );
	}

	if($moretag) {
		$morespan = $matches[0];
		$morespan_pos = strpos( $content, $morespan );
		$newcontent = substr( $content, $morespan_pos + strlen($morespan), strlen($content) - strlen($morespan) );
		$newcontent = apply_filters( 'the_content', $newcontent );
		return $newcontent;
	} else {
		return '';
	}
}

function memberlite_get_the_content_before_more( $content = NULL ) {
	if($content === NULL) {
		$content = get_the_content();
	}
			
	$moretag = preg_match( "/\<span id=\"more-[0-9]*\"\>\<\/span\>/", $content, $matches );

	if(!$moretag) {
		$moretag = preg_match( "/(\<\!\-\-more\-\-\>)/", $content, $matches );
	}

	if($moretag) {				
		$morespan = $matches[0];
		$morespan_pos = strpos( $content, $morespan );
		$newcontent = substr( $content, 0, $morespan_pos );
		$newcontent = apply_filters( 'the_content', $newcontent );
		return $newcontent;
	} else {
		return $content;
	}
}

function memberlite_the_content( $content ) {
	$moretag = preg_match( "/\<span id=\"more-[0-9]*\"\>\<\/span\>/", $content, $matches );

	if(!$moretag) {
		$moretag = preg_match( "/(\<\!\-\-more\-\-\>)/", $content, $matches );
	}

	if($moretag) {				
		$morespan = $matches[0];
		$morespan_pos = strpos( $content, $morespan );
		$leadcontent = '<div class="lead">';
		$leadcontent .= substr( $content, 0, $morespan_pos );
		$leadcontent .= '</div><hr />';
		$newcontent = substr( $content, $morespan_pos + strlen($morespan), strlen($content) - strlen($morespan) );
		return $leadcontent . $newcontent;
	} else {
		return $content;
	}
}
add_filter( 'the_content','memberlite_the_content' );

function memberlite_page_title( $echo = true ) {
	global $post; 
	
	//capture output
	ob_start();
	
	//figure out page title
	if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		woocommerce_breadcrumb();
		?>
		<h1 class="page-title">
		<?php
			if( is_shop() ) {
				echo get_the_title( get_option( 'woocommerce_shop_page_id' ) );
			} elseif( is_archive() ) {
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
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;	
			woocommerce_taxonomy_archive_description();
	} elseif( is_post_type_archive() ) {
		$post_type = get_post_type_object( get_query_var( 'post_type' ) ); ?>
		<h1 class="page-title"><?php echo $post_type->labels->name; ?></h1>
		<?php
	} elseif( function_exists('is_bbpress') && ( is_bbpress() || bbp_is_single_user() ) ) { ?>
		<h1 class="page-title">
		<?php
			if( bbp_is_search_results() ) {
				printf( __( 'Forum Search Results for: %s', 'memberlite' ), '<span>' . bbp_get_search_terms() . '</span>' );
			} elseif( bbp_is_search() ) {
				_e( 'Forum Search', 'memberlite' );
			} elseif( bbp_is_single_forum() || bbp_is_single_topic() ) {
				the_title( '' );
			} elseif( bbp_is_single_user() ) {
				echo sprintf( __( "%s's Profile", 'memberlite' ), get_userdata( bbp_get_user_id() )->display_name );
			} else {	
				_e( 'Forums', 'memberlite' );
			}
		?>
		</h1>
		<?php
	} elseif( is_author() || is_tag() || is_archive() ) { ?>
		<h1 class="page-title">
		<?php
			if ( is_category() ) {
				single_cat_title();
			} elseif ( is_tag() ) {
				$current_tag = single_tag_title( '', false );
				printf( __( 'Posts Tagged: %s', 'memberlite' ), '<span>' . $current_tag . '</span>' );
			} elseif ( is_author() ) {
				printf( __( 'Author: %s', 'memberlite' ), '<span class="vcard">' . get_the_author() . '</span>' );
			} elseif ( is_day() ) {
				printf( __( 'Day: %s', 'memberlite' ), '<span>' . get_the_date() . '</span>' );
			} elseif ( is_month() ) {
				printf( __( 'Month: %s', 'memberlite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'memberlite' ) ) . '</span>' );
			} elseif ( is_year() ) {
				printf( __( 'Year: %s', 'memberlite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'memberlite' ) ) . '</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
				_e( 'Asides', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				_e( 'Galleries', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				_e( 'Images', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				_e( 'Videos', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				_e( 'Quotes', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				_e( 'Links', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				_e( 'Statuses', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				_e( 'Audios', 'memberlite' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				_e( 'Chats', 'memberlite' );
			} elseif ( is_tax ( ) ) {
                single_term_title();
			} else {
				_e( 'Archives', 'memberlite' );
			}
		?>
		</h1>
		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) {
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			}
	} elseif( is_search() ) { ?>
		<h1 class="page-title">
			<?php printf( __( 'Search Results for: %s', 'memberlite' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
		<?php
	} elseif( is_singular('post') ) {
		$author_id = $post->post_author;
		?>
		<div class="masthead-post-byline">
			<div class="post_author_avatar"><?php echo get_avatar( $author_id, 80 ); ?></div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
				$memberlite_get_entry_meta_before = memberlite_get_entry_meta( $post, 'before' );
				if( !empty( $memberlite_get_entry_meta_before ) ) { ?>
					<p class="entry-meta">
						<?php echo memberlite_get_entry_meta($post, 'before'); ?>
					</p><!-- .entry-meta -->
				<?php } 
			?>
		</div>
		<?php
	} elseif( is_home() ) { ?>
		<h1 class="page-title">
		<?php 
			if( get_option( 'page_for_posts' ) ) {
				echo get_the_title(get_option( 'page_for_posts' )); 
			}
		?></h1>
		<?php
	} else {
		the_title( '<h1 class="entry-title">', '</h1>' );
	}
	
	//get captured output
	$page_title_html = ob_get_contents();
	ob_end_clean();
	
	//filter
	$page_title_html = apply_filters( 'memberlite_page_title', $page_title_html );
	
	if( $echo ) {
		echo $page_title_html;
	}
	
	return $page_title_html;
}

function memberlite_nav_menu_submenu() {
	global $post;
	
	//Build the pages array
	if( $post->post_parent ) {
		$exclude = get_post_meta( $post->ID,'exclude',true );
		$ancestors = get_post_ancestors( $post );
		$pagemenuid = end( $ancestors );
		$children = wp_list_pages( 'title_li=&child_of=' . $pagemenuid . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order,post_title' );
		$titlenamer = get_the_title( $pagemenuid );
		$titlelink = get_permalink( $pagemenuid) ;
	} else {
		$exclude = '';
		$children = wp_list_pages( 'title_li=&child_of=' . $post->ID . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order,post_title' );
		$titlenamer = get_the_title( $post->ID );
		$titlelink = get_permalink( $post->ID );
	}

	//Display the nav menu
	if( $children ) { ?>
		<aside id="nav_menu-submenu" class="widget widget_nav_menu">
			<h3 class="widget-title"><a<?php if( !empty( $pagemenuid ) && is_page( $pagemenuid ) ) { ?> class="active"<?php } ?> href="<?php echo $titlelink; ?>"><?php echo $titlenamer; ?></a></h3>
			<ul class="menu">
				<?php echo $children; ?>
			</ul>
		</aside> <!-- end widget -->
	<?php }
}

function memberlite_get_widget_areas() {
	$widget_areas = array();

	if( is_page() ) {
		//Add the submenu widget to the sidebar on Pages (not a real widget area; handled in memberlite_nav_menu_submenu() )
		$widget_areas[] = 'memberlite_nav_menu_submenu';

		//Add the 'Pages' sidebar
		$widget_areas[] = 'sidebar-1';
	} else {
		//Add the 'Posts and Archives' sidebar
		$widget_areas[] = 'sidebar-2';
	}

	//Filter to allow customization of the array of widget areas
	$widget_areas = apply_filters( 'memberlite_get_widget_areas', $widget_areas );

	return $widget_areas;
}

/* Customizes the bbp_breadcrumb output */
function memberlite_bbp_breadcrumb( $args ) {
	global $memberlite_defaults;
	$args = array(
		'sep' => get_theme_mod('delimiter',$memberlite_defaults['delimiter']),
		'home_text' => __('Home', 'memberlite'),
		'before' => '',
		'after' => '',	
	);
	return $args;
}
add_filter( 'bbp_before_get_breadcrumb_parse_args', 'memberlite_bbp_breadcrumb' );

/* Removes bbp_breadcrumb from bbpress templates */
add_filter('bbp_no_breadcrumb', '__return_true');

function memberlite_getBreadcrumbs() {
	global $posts, $post, $memberlite_defaults;
	$page_breadcrumbs = get_theme_mod( 'page_breadcrumbs', false );
	$post_breadcrumbs = get_theme_mod( 'post_breadcrumbs', false );
	$archive_breadcrumbs = get_theme_mod( 'archive_breadcrumbs', false );
	$attachment_breadcrumbs = get_theme_mod( 'attachment_breadcrumbs', false );
	$search_breadcrumbs = get_theme_mod( 'search_breadcrumbs', false );
	$profile_breadcrumbs = get_theme_mod( 'profile_breadcrumbs', false );
	$show_breadcrumbs = ( '' != $page_breadcrumbs
		|| '' != $post_breadcrumbs
		|| '' != $archive_breadcrumbs
		|| '' != $attachment_breadcrumbs
		|| '' != $search_breadcrumbs
		|| '' != $profile_breadcrumbs
	) ? true : false;
	
	$memberlite_show_breadcrumbs = apply_filters( 'memberlite_show_breadcrumbs',  true );
		
	if($memberlite_show_breadcrumbs) {
		$memberlite_delimiter = get_theme_mod('delimiter',$memberlite_defaults['delimiter']);

		if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		
		} elseif(function_exists('is_bbpress') && is_bbpress() ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
			<?php 
				/* Displays bbp_breadcrumb in theme masthead */
				remove_filter( 'bbp_no_breadcrumb', '__return_true' );
				echo bbp_breadcrumb(); 
				add_filter( 'bbp_no_breadcrumb', '__return_true' );
			?>
			</nav>
		<?php } elseif(is_attachment() && '' != $attachment_breadcrumbs) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
	          	<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'memberlite' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php
					global $post;
					$parent_id  = $post->post_parent;
					$breadcrumbs = array();
					while ($parent_id) {
					  $page = get_page($parent_id);
					  $breadcrumbs[] = '<a href="'.get_permalink( $page->ID ).'" title="">'.get_the_title( $page->ID ).'</a><span class="sep">' . $memberlite_defaults['delimiter'] . '</span>';
					  $parent_id  = $page->post_parent;
					}
					$breadcrumbs = array_reverse( $breadcrumbs );
					foreach ( $breadcrumbs as $crumb ) echo $crumb;
				?>
				<?php the_title(); ?>
			</nav>
		<?php } elseif( is_page() && !is_front_page() && !is_attachment() && '' != $page_breadcrumbs ) { ?>			
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'memberlite' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php
					$breadcrumbs = get_post_ancestors( $post->ID );				
					if( !empty( $breadcrumbs ) ) {
						$breadcrumbs = array_reverse($breadcrumbs);
						foreach ($breadcrumbs as $crumb) { ?>
							<a href="<?php echo get_permalink( $crumb ); ?>"><?php echo get_the_title( $crumb ); ?></a>
							<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php } 
					}
				?>
				<?php 
					if(function_exists( 'pmpro_getOption' ) && is_page( array( pmpro_getOption( 'cancel_page_id' ), pmpro_getOption( 'billing_page_id' ), pmpro_getOption( 'confirmation_page_id' ), pmpro_getOption( 'invoice_page_id' ) ) ) && !in_array( pmpro_getOption( 'account_page_id' ), get_post_ancestors( $post->ID ) ) ) { ?>
						<a href="<?php echo get_permalink( pmpro_getOption( 'account_page_id' ) ); ?>"><?php echo get_the_title( pmpro_getOption( 'account_page_id' ) ); ?></a>
						<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php 
					} 
				?>
				<?php the_title(); ?>
			</nav>
			<?php
		} elseif( is_post_type_archive() && '' != $archive_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
	          	<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'memberlite' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php
					$post_type = get_post_type_object( get_query_var( 'post_type' ) );
					echo $post_type->labels->name; ?>
			</nav>
		<?php } elseif( ( ( is_author() || is_tag() || is_archive())) && '' != $archive_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
	          	<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'memberlite' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php 
					if( is_tax() ) {
						$queried_object = get_queried_object();
						$term_taxonomy = $queried_object->taxonomy;
						$taxonomy = get_taxonomy($term_taxonomy);
					}
					if ( is_tax() && count( $taxonomy->object_type ) === 1 ) {
						$post_type = get_post_type_object( $taxonomy->object_type[0] );
						?>
						<a href="<?php echo get_post_type_archive_link( $taxonomy->object_type[0] ); ?>"><?php echo $post_type->labels->name; ?></a>
						<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php
					} elseif( get_option( 'page_for_posts' ) ) { ?>
						<a href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>"><?php echo get_the_title(get_option( 'page_for_posts' ) ); ?></a>
						<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php
					}
				?>				
				<?php 
					if ( is_category() ) :
						single_cat_title();
		
					elseif ( is_tag() ) :
						$current_tag = single_tag_title("", false);
						printf( __( 'Posts Tagged: %s', 'memberlite' ), '<span>' . $current_tag . '</span>' );
		
					elseif ( is_author() ) :
						printf( __( 'Author: %s', 'memberlite' ), '<span class="vcard">' . get_the_author() . '</span>' );
		
					elseif ( is_day() ) :
						printf( __( 'Day: %s', 'memberlite' ), '<span>' . get_the_date() . '</span>' );
		
					elseif ( is_month() ) :
						printf( __( 'Month: %s', 'memberlite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'memberlite' ) ) . '</span>' );
		
					elseif ( is_year() ) :
						printf( __( 'Year: %s', 'memberlite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'memberlite' ) ) . '</span>' );
		
					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						_e( 'Asides', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						_e( 'Galleries', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						_e( 'Images', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						_e( 'Videos', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						_e( 'Quotes', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						_e( 'Links', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
						_e( 'Statuses', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
						_e( 'Audios', 'memberlite' );
		
					elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
						_e( 'Chats', 'memberlite' );
		
					else :
						_e( 'Archives', 'memberlite' );
		
					endif;
				?>
			</nav>
		<?php } elseif( is_singular( array( 'post' ) ) && '' != $post_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
	          	<a href="<?php echo esc_url( home_url() )?>"><?php _e( 'Home', 'memberlite' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php if( get_option( 'page_for_posts' ) ) { ?>
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php echo get_the_title(get_option( 'page_for_posts' )); ?></a>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php } ?>
				<?php the_title(); ?>
			</nav>
		<?php } elseif(is_single() && '' != $post_breadcrumbs) {
			$post_type_object = get_post_type_object(get_post_type($post)); ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
	          	<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'memberlite' ); ?></a>
				<?php if($post_type_object->has_archive == true) { ?>
					<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
					<a href="<?php echo get_post_type_archive_link( get_post_type($post) ); ?>"><?php echo $post_type_object->labels->name; ?></a>
				<?php } ?>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php the_title(); ?>
			</nav>	
		<?php } elseif( is_search() && '' != $search_breadcrumbs ) { ?>
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
	          	<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'memberlite' ); ?></a>
				<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
				<?php 
					if(get_option( 'page_for_posts' ))
					{
						?>
						<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php echo get_the_title(get_option( 'page_for_posts' )); ?></a>
						<span class="sep"><?php echo esc_html( $memberlite_delimiter ); ?></span>
						<?php
					}
				?>
				<?php _e( 'Search Results For','memberlite' ); ?> '<?php the_search_query();?>'
			</nav>
		<?php }
	}
}

function memberlite_should_show_banner_image( $post_id = NULL ) {
	global $memberlite_defaults;

	//default to global post
	if( empty( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}

	//no post, no show
	if( empty( $post_id ) ) {
		$r = false;
	} else {
		//Check if we should show the banner image in the loop based on customizer setting
		$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images',$memberlite_defaults['memberlite_loop_images'] );
		if( ( in_the_loop() && ( $memberlite_loop_images == 'show_both' || $memberlite_loop_images == 'show_banner' ) ) ) {
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

function memberlite_get_banner_image_src( $post_id = NULL, $size = 'banner' ) {
	//default to global post
	if( empty( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}

	$memberlite_banner_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );

	$memberlite_banner_image_src = apply_filters( 'memberlite_banner_image_src', $memberlite_banner_image_src, $size );

	return $memberlite_banner_image_src;
}

/* Parses tags added to fields in customizer (i.e. posts_entry_meta_before and posts_entry_meta_after. Available tags include:
	{post_author} - Entry author display name
	{post_author_posts_link} - Entry author display name, linked to their archive
	{post_categories} - List of entry categories separated by a comma.
	{post_comments} - Entry comments link in the format "X Comment/s".
	{post_date} - Date the entry was published, formatted to your site's "Date Format" under Settings > General
	{post_permalink} - A permalink to the post displayed as "permalink".
	{post_permalink_icon} - A permalink to the post displayed as the Font Awesome "link" icon.
	{post_tags} - List of entry tags separated by a comma.
	{post_time} - Time the entry was published, formatted to your site's "Time Format" under Settings > General
*/
function memberlite_parse_tags($meta, $post = NULL) {
	if( empty( $post ) ) {
		global $post;
	}
	
	$author = get_userdata( $post->post_author );
	
	$searches = array();
	$replacements = array();
		
	if( strpos( $meta, '{post_author}' ) !== false ) {
		$searches[] = "{post_author}";
		$replacements[] = '<span class="author vcard">' . esc_html( $author->display_name ) . '</span>';
	}
	
	if( strpos( $meta, '{post_author_posts_link}' ) !== false ) {
		$searches[] = "{post_author_posts_link}";
		$replacements[] = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $author->ID, $author->user_nicename ) ) . '">' . esc_html( $author->display_name ) . '</a></span>';
	}
	
	if( strpos( $meta, '{post_categories}' ) !== false ) {
		$searches[] = "{post_categories}";
		$replacements[] = get_the_category_list( __( ', ', 'memberlite' ) );
	}
	
	if( strpos( $meta, '{post_comments}' ) !== false ) {
		$searches[] = "{post_comments}";
		$replacements[] = '';
		$num_comments = get_comments_number();
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = __('No Comments', 'memberlite');
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments . __(' Comments', 'memberlite');
			} else {
				$comments = __('1 Comment', 'memberlite');
			}
			$write_comments = '<a href="';
			if( is_single() ) {
				$write_comments .= '#respond';
			} else {
				$write_comments .= get_comments_link();
			}
			$write_comments .= '">'. $comments.'</a>';
		} 
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
			$replacements[] = '<span class="comments-link">' . $write_comments . '</span>';
		}
	}
	
	if(strpos( $meta, '{post_date}' ) !== false ) {
		$searches[] = "{post_date}";
		$replacements[] = '<time class="entry-date published" datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( get_the_date() ) . '</time>';
	}
	
	if(strpos( $meta, '{post_permalink}' ) !== false ) {
		$searches[] = "{post_permalink}";
		$replacements[] = '<a href="' . get_permalink() . '" rel="bookmark">permalink</a>';
	}
	
	if( strpos( $meta, '{post_permalink_icon}' ) !== false ) {
		$searches[] = "{post_permalink_icon}";
		$replacements[] = '<a href="' . get_permalink() . '" rel="bookmark"><i class="fa fa-link"></i></a>';
	}
	
	if( strpos( $meta, '{post_tags}' ) !== false ) {
		$searches[] = "{post_tags}";
		$replacements[] = get_the_tag_list( '', __( ', ', 'memberlite' ) );
	}

	if( strpos( $meta, '{post_time}' ) !== false ) {
		$searches[] = "{post_time}";
		$replacements[] = '<time class="entry-time" datetime="' . esc_attr( get_the_date( 'H:i' ) ) . '">' . esc_html( get_the_time() ) . '</time>';
	}
	
	$meta = str_replace( $searches, $replacements, $meta );	
	return $meta;
}
