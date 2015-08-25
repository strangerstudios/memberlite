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
	// Adds a class of group-blog to blogs with more than 1 published author.
	global $post, $memberlite_defaults;
	$classes[] = get_theme_mod('sidebar_location',$memberlite_defaults['sidebar_location']);
	$classes[] = get_theme_mod('sidebar_location_blog',$memberlite_defaults['sidebar_location_blog']);
	if ( is_page_template( 'templates/sidebar-content.php' ) )
		$classes[] = 'sidebar-content';
	if ( is_page_template( 'templates/content-sidebar.php' ) )
		$classes[] = 'content-sidebar';
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	if ( is_page_template( 'templates/landing.php' ) )
		$classes[] = 'landing';
	if ( is_page_template( 'templates/interstitial.php' ) )
		$classes[] = 'interstitial';
	}
	return $classes;
}
add_filter( 'body_class', 'memberlite_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function memberlite_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'memberlite' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'memberlite_wp_title', 10, 2 );

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
function memberlite_getPostThumbnailWidth($post_id = NULL)
{
	//get thumbnail from post_id
	$attachment_id = get_post_thumbnail_id($post_id);	
	if(empty($attachment_id))
		return false;	//no thumbnail
		
	//get attachment src, width, and height
	$attachment = wp_get_attachment_image_src($attachment_id, "full");
	
	//make sure width is there
	if(is_array($attachment) && !empty($attachment[1]))
		return $attachment[1];
	else
		return false;	
}

function memberlite_excerpt_more($more) 
{
	global $post;
	return ' <a href="'. get_permalink($post->ID) . '">(more...)</a></p>';
}
add_filter('excerpt_more', 'memberlite_excerpt_more');

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
function get_the_content_after_more($content = NULL)
{
	if($content === NULL)
		$content = get_the_content();
	$moretag = preg_match("/\<span id=\"more-[0-9]*\"\>\<\/span\>/", $content, $matches);
	if(!$moretag)
		$moretag = preg_match("/(\<\!\-\-more\-\-\>)/", $content, $matches);
	if($moretag)
	{
		$morespan = $matches[0];
		$morespan_pos = strpos($content, $morespan);
		$newcontent = substr($content, $morespan_pos + strlen($morespan), strlen($content) - strlen($morespan));
		$newcontent = apply_filters('the_content', $newcontent);
		return $newcontent;
	}
	else
		return "";
}

function get_the_content_before_more($content = NULL)
{
	if($content === NULL)
		$content = get_the_content();
			
	$moretag = preg_match("/\<span id=\"more-[0-9]*\"\>\<\/span\>/", $content, $matches);
	if(!$moretag)
		$moretag = preg_match("/(\<\!\-\-more\-\-\>)/", $content, $matches);
	if($moretag)
	{				
		$morespan = $matches[0];
		$morespan_pos = strpos($content, $morespan);
		$newcontent = substr($content, 0, $morespan_pos);
		$newcontent = apply_filters('the_content', $newcontent);
		return $newcontent;
	}
	else
		return $content;
}
function memberlite_the_content($content){
	$moretag = preg_match("/\<span id=\"more-[0-9]*\"\>\<\/span\>/", $content, $matches);
	if(!$moretag)
		$moretag = preg_match("/(\<\!\-\-more\-\-\>)/", $content, $matches);
	if($moretag)
	{				
		$morespan = $matches[0];
		$morespan_pos = strpos($content, $morespan);
		$leadcontent = '<div class="lead">';
		$leadcontent .= substr($content, 0, $morespan_pos);
		$leadcontent .= '</div><hr />';
		$newcontent = substr($content, $morespan_pos + strlen($morespan), strlen($content) - strlen($morespan));
		return $leadcontent . $newcontent;
	}
	else
		return $content;
}
add_filter('the_content','memberlite_the_content');

function memberlite_page_title() {
	global $post; 
	
	//capture output
	ob_start();
	
	//figure out page title
	if(function_exists('is_woocommerce') && is_woocommerce())
	{
		woocommerce_breadcrumb();
		?>
		<h1 class="page-title">
		<?php
			if(is_shop())
				echo get_the_title(get_option( 'woocommerce_shop_page_id' ));
			elseif(is_archive())
				single_cat_title(); 
			else
				the_title();
		?>
		</h1>
			<?php
			// Show an optional term description.
			$term_description = woocommerce_product_archive_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;	
			woocommerce_taxonomy_archive_description();
	}
	elseif(is_author() || is_tag() || is_archive())
	{
		?>
			<h1 class="page-title">
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
	
				elseif (bbp_is_forum_archive()) :
					_e( 'Forums', 'memberlite');
					
				else :
					_e( 'Archives', 'memberlite' );
	
				endif;
			?>
		</h1>
		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;			
	}
	elseif(is_search())
	{
		global $s;
		?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'memberlite' ), '<span>' . $s . '</span>' ); ?></h1>
		<?php
	}
	elseif(is_singular('post'))
	{
		$author_id = $post->post_author;
		?>
		<div class="masthead-post-byline">
			<div class="post_author_avatar"><?php echo get_avatar( $author_id, 80 ); ?></div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<p class="entry-meta">
				<?php memberlite_posted_on($post); ?>
			</p><!-- .entry-meta -->
		</div>
		<?php
	}
	elseif(is_home())
	{
		?>
		<h1 class="page-title">
		<?php 
			if(get_option('page_for_posts'))
				echo get_the_title(get_option('page_for_posts')); 
		?></h1>
		<?php
	}
	elseif(is_page_template('templates/landing.php'))
	{
		global $memberlite_landing_page_level, $memberlite_banner_desc, $memberlite_landing_page_checkout_button;
		the_post_thumbnail( 'medium', array( 'class' => 'alignleft' ) );
		the_title( '<h1 class="entry-title">', '</h1>' );
		if(defined('PMPRO_VERSION'))
		{
			$level = pmpro_getLevel($memberlite_landing_page_level);
			if(!empty($level))
			{
				echo '<p class="pmpro_level-price">' . memberlite_getLevelCost($level, true, true) . '</p>';
				if(empty($memberlite_banner_desc))
					echo wpautop($level->description);
				echo '<p>' . do_shortcode('[memberlite_btn style="action" href="' . pmpro_url('checkout','?level=' . $memberlite_landing_page_level,'https') . '" text="' . $memberlite_landing_page_checkout_button . '"]') . '</p>';
			}
		}
	}	
	else
	{
		the_title( '<h1 class="entry-title">', '</h1>' );
	}
	
	//get captured output
	$page_title_html = ob_get_contents();
	ob_end_clean();
	
	//filter
	$page_title_html = apply_filters('memberlite_page_title', $page_title_html);
	
	echo $page_title_html;
}

function memberlite_getSidebar() {
	global $post;
	
	//capture output
	ob_start();
	
	//figure out sidebars
	$memberlite_custom_sidebar = get_post_meta($post->ID, '_memberlite_custom_sidebar', true);
	if (is_404() || is_home() || is_search() || is_single() || is_category() || is_author() || is_archive() || is_day() || is_month() || is_year() ) 
	{
		//Sidebar for Posts and Archives
		if($memberlite_custom_sidebar != 'sidebar-2')
			dynamic_sidebar('sidebar-2');	
	}
	
	if(is_page())
	{
		global $post, $memberlite_hide_children;
		if(empty($memberlite_hide_children))
			$memberlite_hide_children = get_post_meta($post->ID, '_memberlite_hide_children', true);
		if(empty($memberlite_hide_children))
		{
			if($post->post_parent) 
			{
				$exclude = get_post_meta($post->ID,'exclude',true);
				$pagemenuid = end(get_post_ancestors($post));
				$children = wp_list_pages('title_li=&child_of=' . $pagemenuid . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order,post_title');
				$titlenamer = get_the_title($pagemenuid);
				$titlelink = get_permalink($pagemenuid);
			}
			else 
			{
				$exclude = "";
				$children = wp_list_pages('title_li=&child_of=' . $post->ID . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order,post_title');
				$titlenamer = get_the_title($post->ID);
				$titlelink = get_permalink($post->ID);
			}
			if($children) 
			{ ?>
				<aside id="nav_menu-submenu" class="widget widget_nav_menu">
					<h3 class="widget-title"><a<?php if(is_page($pagemenuid)) { ?> class="active"<?php } ?> href="<?php echo $titlelink?>"><?php echo $titlenamer?></a></h3>
					<ul class="menu">
						<?php echo $children; ?>
					</ul>
				</aside> <!-- end widget -->
			<?php
			}						
		}
		
		//Sidebar for Non-template Pages
		if($memberlite_custom_sidebar != 'sidebar-1')
			dynamic_sidebar('sidebar-1');
	}
	
	//get captured output
	$sidebar_html = ob_get_contents();
	ob_end_clean();
	
	//filter
	$sidebar_html = apply_filters('memberlite_getSidebar', $sidebar_html);
	
	echo $sidebar_html;
}

function memberlite_getLevelCost(&$level, $tags = true, $short = false)
{
	global $pmpro_currency_symbol;
	//initial payment
	if(empty($short))
		$r = sprintf(__('The price for membership is <strong>%s</strong> now', 'pmpro'), $pmpro_currency_symbol . number_format($level->initial_payment, 2));
	elseif(pmpro_isLevelFree($level))
		$r = sprintf(__('<strong>FREE</strong>', 'pmpro'));
	else
		$r = sprintf(__('<strong>%s</strong>', 'pmpro'), $pmpro_currency_symbol . number_format($level->initial_payment, 2));
			
	//recurring part
	if($level->billing_amount != '0.00')
	{
		if($level->billing_limit > 1)
		{			
			if($level->cycle_number == '1')
			{
				$r .= sprintf(__(' and then <strong>%s per %s for %d more %s</strong>.', 'pmpro'), $pmpro_currency_symbol . $level->billing_amount, pmpro_translate_billing_period($level->cycle_period), $level->billing_limit, pmpro_translate_billing_period($level->cycle_period, $level->billing_limit));
			}				
			else
			{ 
				$r .= sprintf(__(' and then <strong>%s every %d %s for %d more %s</strong>.', 'pmpro'), $pmpro_currency_symbol . $level->billing_amount, $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number), $level->billing_limit, pmpro_translate_billing_period($level->cycle_period, $level->billing_limit));
			}
		}
		elseif($level->billing_limit == 1)
		{
			$r .= sprintf(__(' and then <strong>%s after %d %s</strong>.', 'pmpro'), $pmpro_currency_symbol . $level->billing_amount, $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number));
		}
		else
		{
			if( $level->billing_amount === $level->initial_payment ) {
				if($level->cycle_number == '1')
				{
					if(empty($short))
					{
						$r = sprintf(__('The price for membership is <strong>%s per %s</strong>.', 'pmpro'), $pmpro_currency_symbol . number_format($level->initial_payment, 2), pmpro_translate_billing_period($level->cycle_period) );
					}
					else
					{
						$r = sprintf(__('<strong>%s/%s</strong>', 'pmpro'), $pmpro_currency_symbol . number_format($level->initial_payment, 2), pmpro_translate_billing_period($level->cycle_period) );
					}
				}
				else
				{
					if(empty($short))
					{
						$r = sprintf(__('The price for membership is <strong>%s every %d %s</strong>.', 'pmpro'), $pmpro_currency_symbol . number_format($level->initial_payment, 2), $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number) );
					}
					else
					{
						$r = sprintf(__('<strong>%s every %d %s</strong>.', 'pmpro'), $pmpro_currency_symbol . number_format($level->initial_payment, 2), $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number) );
					}
				}
			} else {
				$r .= '<span class="pmpro_level-subprice">';
				if($level->cycle_number == '1')
				{
					if(empty($short))
					{
						$r .= sprintf(__(' and then <strong>%s per %s</strong>.', 'pmpro'), $pmpro_currency_symbol . $level->billing_amount, pmpro_translate_billing_period($level->cycle_period));
					}
					else
					{
						$r .= sprintf(__('then <strong>%s/%s</strong>', 'pmpro'), $pmpro_currency_symbol . $level->billing_amount, pmpro_translate_billing_period($level->cycle_period));
					}
				}
				else
				{
					$r .= sprintf(__(' and then <strong>%s every %d %s</strong>.', 'pmpro'), $pmpro_currency_symbol . $level->billing_amount, $level->cycle_number, pmpro_translate_billing_period($level->cycle_period, $level->cycle_number));
				}
				$r .= '</span>';
			}
		}
	}

	//add a space
	$r .= ' ';
	
	//trial part
	if($level->trial_limit)
	{
		if($level->trial_amount == '0.00')
		{
			if($level->trial_limit == '1')
			{
				$r .= ' ' . __('After your initial payment, your first payment is Free.', 'pmpro');
			}
			else
			{
				$r .= ' ' . sprintf(__('After your initial payment, your first %d payments are Free.', 'pmpro'), $level->trial_limit);
			}
		}
		else
		{
			if($level->trial_limit == '1')
			{
				$r .= ' ' . sprintf(__('After your initial payment, your first payment will cost %s.', 'pmpro'), $pmpro_currency_symbol . $level->trial_amount);
			}
			else
			{
				$r .= ' ' . sprintf(__('After your initial payment, your first %d payments will cost %s.', 'pmpro'), $level->trial_limit, $pmpro_currency_symbol . $level->trial_amount);
			}
		}
	}
				
	//taxes part
	$tax_state = pmpro_getOption("tax_state");
	$tax_rate = pmpro_getOption("tax_rate");
	
	if($tax_state && $tax_rate && !pmpro_isLevelFree($level))
	{
		$r .= sprintf(__('Customers in %s will be charged %s%% tax.', 'pmpro'), $tax_state, round($tax_rate * 100, 2));			
	}
	
	if(!$tags)
		$r = strip_tags($r);
	
	$r = apply_filters("pmpro_level_cost_text", $r, $level);		
	return $r;
}

function memberlite_getLevelLandingPage($level_id) {
	if(is_object($level_id))
		$level_id = $level_id->id;
	
	$args = array(
		'post_type' => apply_filters('memberlite_level_landing_page_post_types', array('page', 'post')),
		'meta_query' => array(
			array(
				'key' => '_memberlite_landing_page_level',
				'value' => $level_id,
			)
		)
	);
	
	$posts = get_posts($args);
	
	if(empty($posts))
		return false;
	else
		return $posts[0];
}

/* Customizes the bbp_breadcrumb output */
function memberlite_bbp_breadcrumb( $args ) {
	global $memberlite_defaults;
	$args = array(
		'sep' => $memberlite_defaults['delimiter'],
		'home_text' => __('Home', 'memberlite'),
		'before' => '',
		'after' => '',	
	);
	return $args;
}
add_filter( 'bbp_before_get_breadcrumb_parse_args', 'memberlite_bbp_breadcrumb' );

/* Removes bbp_breadcrumb from bbpress templates */
add_filter('bbp_no_breadcrumb', '__return_true');

function memberlite_getBreadcrumbs()
{
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
	global $posts, $post, $memberlite_defaults;
	if($show_breadcrumbs)
	{
		if(function_exists('is_woocommerce') && is_woocommerce())
		{
		}
		elseif(function_exists('is_bbpress') && is_bbpress())
		{
		?>
		<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
		<?php 
			/* Displays bbp_breadcrumb in theme masthead */
			remove_filter('bbp_no_breadcrumb', '__return_true' );
			echo bbp_breadcrumb(); 
			add_filter('bbp_no_breadcrumb', '__return_true');
		?>
		</nav>
		<?php
		}
		elseif(is_attachment() && '' != $attachment_breadcrumbs)
		{
		?>
		<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
          	<a href="<?php echo home_url()?>"><?php _e('Home', 'memberlite'); ?></a>
			<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
			<?php
				global $post;
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
				  $page = get_page($parent_id);
				  $breadcrumbs[] = '<a href="'.get_permalink($page->ID).'" title="">'.get_the_title($page->ID).'</a><span class="sep">' . $memberlite_defaults['delimiter'] . '</span>';
				  $parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb;
			?>
			<?php the_title(); ?>
		</nav>
		<?php
		}		
		elseif(is_page() && !is_front_page() && !is_attachment() && '' != $page_breadcrumbs)
		{
			?>			
			<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
				<a href="<?php echo home_url()?>"><?php _e('Home', 'memberlite'); ?></a>
				<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
				<?php
					$breadcrumbs = get_post_ancestors($post->ID);				
					if($breadcrumbs)
					{
						$breadcrumbs = array_reverse($breadcrumbs);
						foreach ($breadcrumbs as $crumb)
						{
							?>
							<a href="<?php echo get_permalink($crumb); ?>"><?php echo get_the_title($crumb); ?></a>
							<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
							<?php
						}
					}				
				?>
				<?php 
					if(function_exists("pmpro_getOption") && is_page(array(pmpro_getOption('cancel_page_id'), pmpro_getOption('billing_page_id'), pmpro_getOption('confirmation_page_id'), pmpro_getOption('invoice_page_id'))) && !in_array(pmpro_getOption('account_page_id'), get_post_ancestors( $post->ID )))
					{ 
						?>
						<a href="<?php echo get_permalink(pmpro_getOption('account_page_id')); ?>"><?php echo get_the_title(pmpro_getOption('account_page_id')); ?></a>
						<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
						<?php 
					} 
				?>
				<?php the_title(); ?>
			</nav>
			<?php
		}
		elseif(((is_author() || is_tag() || is_archive())) && '' != $archive_breadcrumbs)
		{
		?>
		<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
          	<a href="<?php echo get_option('home'); ?>/"><?php _e('Home', 'memberlite'); ?></a>
			<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
			<?php 
				if(get_option('page_for_posts'))
				{
					?>
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo get_the_title(get_option('page_for_posts')); ?></a>
					<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
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
	
				elseif (bbp_is_forum_archive()) :
					_e( 'Forums', 'memberlite');
					
				else :
					_e( 'Archives', 'memberlite' );
	
				endif;
			?>
		</nav>
		<?php
		}
		elseif(is_single() && '' != $post_breadcrumbs)
		{
		?>
		<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
          	<a href="<?php echo home_url()?>"><?php _e('Home', 'memberlite'); ?></a>
			<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
			<?php 
				if(get_option('page_for_posts'))
				{
					?>
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo get_the_title(get_option('page_for_posts')); ?></a>
					<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
					<?php
				}
			?>
			<?php the_title(); ?>
		</nav>
		<?php
		}
		elseif(is_search() && '' != $search_breadcrumbs)
		{
			global $s;
		?>
		<nav class="memberlite-breadcrumb" itemprop="breadcrumb">
          	<a href="<?php echo home_url()?>"><?php _e('Home', 'memberlite'); ?></a>
			<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
			<?php 
				if(get_option('page_for_posts'))
				{
					?>
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo get_the_title(get_option('page_for_posts')); ?></a>
					<span class="sep"><?php echo $memberlite_defaults['delimiter']; ?></span>
					<?php
				}
			?>
			<?php _e('Search Results For','memberlite'); ?> '<?php echo $s;?>'
		</nav>
	<?php
		}
	}
}