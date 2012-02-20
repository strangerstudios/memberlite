<?php	
	global $pmprot_options;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php
	//use this for calculations below
	$object = $wp_query->get_queried_object();
	if(!empty($object->ID))
		$my_id = $object->ID;
	else
		$my_id = NULL;
	
	//is there a longer title?
	global $longtitle, $pagetitle;
	$longtitle = get_post_meta($my_id, "longtitle", true);	
	if(!$longtitle) $longtitle = $pagetitle;
	if(!$longtitle) $longtitle = trim(wp_title('', false));	
?>

<title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

if($longtitle)
	echo $longtitle . " | ";
else
	wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>

<?php
	$headercode = get_post_meta($post->ID, "headercode", true);
	if($headercode)
		echo $headercode;
?>
</head>
<body>

<div id="w-body">
<div id="page">
	
    <?php if(!empty($pmprot_options['meta_menu'])) { ?>
	<div id="w-preheader"><div class="width">
    	<div class="user-info">
		  <?php 
              if ($user_ID) 
              { 
                  global $current_user;					
              ?>	
              <div class="user-welcome">
				  Welcome
				  <?php if(function_exists("pmpro_hasMembershipLevel") && pmpro_hasMembershipLevel()) { ?>				  
					<a href="<?php echo pmpro_url("account"); ?>"><?php echo preg_replace("/\@.*/", "", $current_user->display_name)?></a>
				  <?php } else { ?>
					<a href="<?php echo home_url("/wp-admin/profile.php"); ?>"><?php echo preg_replace("/\@.*/", "", $current_user->display_name)?></a>
				  <?php } ?>
					
              </div> <!-- end user-welcome -->
              <div class="user-links">
			  	<?php wp_nav_menu(  array( 'theme_location' => 'loggedin', 'fallback_cb' => false )); ?>
				
				<a href="<?php echo wp_logout_url( ); ?> " title="Log Out">Log Out</a>
               </div> <!-- end user-links -->
               <div class="clear"></div>
          <?php
              }
			  else
			  {
			?>
				<div class="user-links">
					<?php wp_nav_menu(  array( 'theme_location' => 'loggedout', 'fallback_cb' => false )); ?>				
				</div>
				<div class="clear"></div>
			<?php
			  }
          ?>
		</div> <!-- end user-info -->
                
        <?php dynamic_sidebar('Header Right'); ?>
        
        <div class="clear"></div>
    </div></div> <!-- end width, w-preheader -->
	<?php } ?>
	
	<div id="w-header"><div class="width"><div id="header">						
        <h1 id="logo"><a title="<?php bloginfo('name'); ?>" href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php if(!empty($pmprot_options['tagline'])) { ?><div class="description"><?php bloginfo('description'); ?></div><?php } ?>
        <div class="clear"></div>
	</div></div></div> <!-- end header, end width, end w-header -->
    
	<?php if(!empty($pmprot_options['main_menu'])) { ?>
    <div id="w-menu"><div class="width"><div id="menu">						
		<?php wp_nav_menu(  array( 'theme_location' => 'main' )); ?>
        <div class="clear"></div>	
    </div></div></div> <!-- end menu, end width, end w-menu -->
	<script>
		jQuery('li.menu-item').hover(
			function() { jQuery(this).toggleClass("hover"); },
			function() { jQuery(this).toggleClass("hover"); }
		);
	</script>
	<?php } ?>		
	
	<div id="w-wrapper"><div class="width">
	
