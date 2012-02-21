<?php
/*
remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
add_filter('user_contactmethods','modify_profile_fields',10,1);

function modify_profile_fields( $contactmethods ) {
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['facebook'] = 'Facebook';
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	unset($contactmethods['description']);	
	return $contactmethods;
}
*/

$pathFix = dirname(__FILE__);
require_once($pathFix . "/includes/options.php");
require_once($pathFix . "/includes/settings.php");
require_once($pathFix . "/includes/update.php");

function sortByMenuOrder($a,$b)
{
	if ($a->menu_order == $b->menu_order) {
        return 0;
    }
    return ($a->menu_order < $b->menu_order) ? -1 : 1;
}

//if you have an array of arrays, this will look in the 0 index of each array for the needle
function in_array_index($needle, $haystack, $index = 0)
{
	foreach($haystack as $a)
	{
		if($a[$index] == $needle)
			return true;			
	}
	
	return false;
}

function getPostContent($postid, $format = TRUE)
{
	global $wpdb;
	$ss_post_content = $wpdb->get_var("SELECT post_content FROM $wpdb->posts WHERE ID = '$postid' LIMIT 1");
	if($format)
		return WPautop($ss_post_content);
	else
		return $ss_post_content;
}	

function getPostTitle($postid, $format = TRUE)
{
	global $wpdb;
	$ss_post_title = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID = '$postid' LIMIT 1");
		
	if($format)
		return WPautop($ss_post_title);
	else
		return $ss_post_title;
}	

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}

register_sidebar(array(
	'name'=>'Blog: Featured Sidebar', 
	'id'=>'blogfeatured',
	'description'=>'300px wide sidebar shown at the top of the right sidebar on blog index, archive, search, single post, site map, and 404 pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3>', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></aside>',));

register_sidebar(array(
	'name'=>'Page: Left Sidebar',
	'id'=>'leftsidebar',
	'description'=>'Shown in the left sidebar of pages using the default template',  
	'before_title'=>'<h3>', 
	'after_title'=>'</h3><div class="widget_inner">', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></div></aside>',));
	
register_sidebar(array(
	'name'=>'Page: Right Sidebar', 
	'id'=>'rightsidebar',
	'description'=>'Shown in the right sidebar of pages using the Page - Right Sidebar template', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3><div class="widget_inner">', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></div></aside>',));
	
register_sidebar(array(
	'name'=>'Page: Contact Sidebar',
	'id'=>'contactsidebar',
	'description'=>'Shown in the right sidebar of pages using the Page - Contact Form template', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3><div class="widget_inner">', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></div></aside>',));
	
register_sidebar(array(
	'name'=>'Header Right',
	'id'=>'header',
	'description'=>'Shown at the top right of the header of all pages',  
	'before_title'=>'', 
	'after_title'=>'', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s h-right">',
    'after_widget'  => '<div class="clear"></div></aside>',));	
register_sidebar(array(
	'name'=>'Blog: Column 1', 
	'id'=>'blogcol1',
	'description'=>'140px wide sidebar shown in column 1 of the right sidebar on blog index, archive, search, single post, site map, and 404 pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3><div class="widget_inner">', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></div></aside>',));

register_sidebar(array(
	'name'=>'Blog: Column 2', 
	'id'=>'blogcol2',
	'description'=>'140px wide sidebar shown in column 2 of the right sidebar on blog index, archive, search, single post, site map, and 404 pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3><div class="widget_inner">', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></div></aside>',));
	
register_sidebar(array(
	'name'=>'Footer: Column 1', 
	'id'=>'footercol1',
	'description'=>'Shown in column 1 of the footer on all pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3>', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></aside>',));
	
register_sidebar(array(
	'name'=>'Footer: Column 2', 
	'id'=>'footercol2',
	'description'=>'Shown in column 2 of the footer on all pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3>', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></aside>',));

register_sidebar(array(
	'name'=>'Footer: Column 3',
	'id'=>'footercol3',
	'description'=>'Shown in column 3 of the footer on all pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3>', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></aside>',));

register_sidebar(array(
	'name'=>'Footer: Column 4', 
	'id'=>'footercol4',
	'description'=>'Shown in column 4 of the footer on all pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3>', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></aside>',));

register_sidebar(array(
	'name'=>'Base: Left Column', 
	'id'=>'baselcol',
	'description'=>'Shown in left column of the base on all pages', 
	'before_title'=>'<h3>', 
	'after_title'=>'</h3>', 
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<div class="clear"></div></aside>',));

function register_my_menus() {
register_nav_menus(
array(
'loggedin' => __( 'Logged In User', 'memberlite' ),
'loggedout' => __( 'Logged Out User', 'memberlite' ),
'main' => __( 'Main Menu', 'memberlite' ))
);
}

add_action( 'init', 'register_my_menus' );

function getBreadcrumbs()
{
	global $posts, $post, $pmprot_options;
	if(!empty($pmprot_options['breadcrumbs']))
	{
	?>
	<p class="breadcrumbs">
		<?php
		if(is_page() && !is_front_page())
		{
		?>			
			<a href="<?php echo home_url()?>">Home</a>
				<?php
					$breadcrumbs = get_post_ancestors($post->ID);				
					if($breadcrumbs)
					{
						$breadcrumbs = array_reverse($breadcrumbs);
						foreach ($breadcrumbs as $crumb)
						{
							?>
							&#8734; <a href="<?php echo get_permalink($crumb); ?>"><?php echo getPostTitle($crumb,FALSE); ?></a>
							<?php
						}
					}				
				?>
				&#8734; <?php the_title(); ?>
			<?php
		}
		elseif(is_archive())
		{
		?>
			<a href="<?php echo get_option('home'); ?>/">Home</a>
			<?php 
				if(get_option('page_for_posts'))
				{
					?>
					&#8734; <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo getPostTitle(get_option('page_for_posts'),FALSE); ?></a>
					<?php
				}
			?>
			&#8734; <span>			
			<?php 
				if(empty($post) && !empty($posts[0]))
					$post = $posts[0]; // Hack. Set $post so that the_date() works. 
			?>
			<?php /* If this is a category archive */ if (is_category()) { single_cat_title(); ?>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { the_time('F jS, Y'); ?>
		
			<?php /* If this is a monthly archive */ } elseif (is_month()) { the_time('F, Y'); ?>
			
			<?php /* If this is a yearly archive */ } elseif (is_year()) { the_time('Y'); ?>
		
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	
			<?php						
				if(get_query_var('author_name')) :
					$curauth = get_user_by('slug', get_query_var('author_name'));
				else :
					$curauth = get_userdata(get_query_var('author'));
				endif;
				?>
				Articles by <?php echo $curauth->display_name; ?>
		
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>Blog<?php } ?>
	
			</span> Archive	
		<?php
		}
		elseif(is_attachment())
		{
		?>
			<a href="<?php echo get_option('home'); ?>/">Home</a>
			<?php
				global $post;
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
				  $page = get_page($parent_id);
				  $breadcrumbs[] = '<a href="'.get_permalink($page->ID).'" title="">'.get_the_title($page->ID).'</a>';
				  $parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo ' &#8734; '.$crumb;
			?>
			&#8734; <?php the_title(); ?>
		<?php
		}
		elseif(is_single())
		{
		?>
			<a href="<?php echo get_option('home'); ?>/">Home</a>
			<?php 
				if(get_option('page_for_posts'))
				{
					?>
					&#8734; <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo getPostTitle(get_option('page_for_posts'),FALSE); ?></a>
					<?php
				}
			?>
			&#8734; <?php the_title(); ?>
		<?php
		}
		elseif(is_search())
		{
			global $s;
		?>
			<a href="<?php echo get_option('home'); ?>/">Home</a>
			<?php 
				if(get_option('page_for_posts'))
				{
					?>
					&#8734; <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php echo getPostTitle(get_option('page_for_posts'),FALSE); ?></a>
					<?php
				}
			?>
			&#8734; Search Results For <span>'<?=stripslashes($s)?>'</span>
		<?php
		}
		elseif(is_home() && !is_front_page() )
		{
		?>
			<a href="<?php echo get_option('home'); ?>/">Home</a>
			&#8734; <?php echo getPostTitle(get_option('page_for_posts'),FALSE); ?>
		<?php
		}
	?>
	</p>
	<?php
	}
}

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

function SearchFilter($query){
 	if($query->is_search)
	{ 
		// List of pages/posts to omit when searching.  Page/post ID should be placed in the array.
		global $pmprot_options;
		if(!$pmprot_options['pages_in_search_results'])
			$query->set('post_type', 'post');
		$postOmitArray = explode(",", $pmprot_options['hide_pages']);
	
		// Set the pages to exclude in the WP Query
		$query->set('post__not_in', $postOmitArray);		
	}
	return $query;
}
add_filter('pre_get_posts','SearchFilter');

function new_excerpt_more($more) 
{
	global $post;
	return '...<p><a class="btn btn-grey" href="'. get_permalink($post->ID) . '">Continue Reading &raquo;</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>
