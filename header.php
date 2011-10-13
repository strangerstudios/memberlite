<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php
	//use this for calculations below
	$object = $wp_query->get_queried_object();
	$my_id = $object->ID;
	
	//is there a longer title?
	global $longtitle, $pagetitle;
	$longtitle = get_post_meta($my_id, "longtitle", true);	
	if(!$longtitle) $longtitle = $pagetitle;
	if(!$longtitle) $longtitle = trim(wp_title('', false));	
?>

<title>
	<?php echo $longtitle?>	
</title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />

<?php /*
<style type="text/css">
	div, img, a { behavior: url(<?php bloginfo('template_directory'); ?>/includes/iepngfix.htc) }
</style>
*/ ?> 

<?php
	//do we need the ie6 stylesheet?
	$ua = $_SERVER['HTTP_USER_AGENT'];
	if (strpos($ua,'MSIE') != false && strpos($ua,'Opera') === false)
	{
		if (strpos($ua,'Windows NT 5.2') != false)
		{
			if(strpos($ua,'.NET CLR') === false) 
			{
				$skipnextcheck = true;
			}
		}
	   
		if (!$skipnextcheck && substr($ua,strpos($ua,'MSIE')+5,1) < 7)
		{
			/* the browser claims to be IE6 or older, and is not Opera, Safari or iCab */
			global $isie6;
			$isie6 = true;
		   ?>
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie6.css" type="text/css" media="screen" />
		   <?php
		}
	}
?>

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
<?php include (TEMPLATEPATH . '/includes/settings.php'); ?>
<div id="w-body">
<div id="page">
	
    <div id="w-preheader"><div class="width">
    	<div class="user-info">
		  <?php 
              if ($user_ID) 
              { 
                  global $current_user;					
              ?>	
              <div class="user-welcome">
                  Welcome <a href="/membership-account/"><?php echo preg_replace("/\@.*/", "", $current_user->display_name)?></a>
              </div> <!-- end user-welcome -->
              <div class="user-links">
                <a href="/support/download/" title="Download Plugin Now">Download Plugin Now</a>
				<a href="<?php echo get_home_url(NULL,"/membership-account/"); ?>">My Account</a>
                <?php if(current_user_can('manage_options')) { ?>
                    <a href="/wp-admin/">Site Admin</a>
                <?php } ?>
                <a href="<?php echo wp_logout_url( ); ?> " title="Log Out">Log Out</a>
               </div> <!-- end user-links -->
               <div class="clear"></div>
          <?php
              }
			  else
			  {
			?>
				<div class="user-links">
					<a href="<?php echo pmpro_url("checkout", "?level=6", "https"); ?>" title="Download Plugin Now">Download Plugin Now</a>
					<a href="<?php echo wp_login_url()?>" title="Log In">Log In</a>
				</div>
				<div class="clear"></div>
			<?php
			  }
          ?>
		</div> <!-- end user-info -->
                
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
        
        <div class="clear"></div>
    </div></div> <!-- end width, w-preheader -->

	<div id="w-header"><div class="width"><div id="header">						
        <h1 id="logo">
            <a class="name" href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>                
        </h1>
        <div class="description"><?php bloginfo('description'); ?></div>			
                
        <div class="clear"></div>
	</div></div></div> <!-- end header, end width, end w-header -->
    
    <div id="w-menu"><div class="width"><div id="menu">						
		<?php
			//Top Level Menu
			wp_nav_menu(  array( 'theme_location' => 'top-level-menu' ));
		?>
        <div class="clear"></div>	
    </div></div></div> <!-- end menu, end width, end w-menu -->
	
	<script>
		jQuery('li.menu-item').hover(
			function() { jQuery(this).toggleClass("hover"); },
			function() { jQuery(this).toggleClass("hover"); }
		);
	</script>
	
	<div id="w-wrapper"><div class="width">
	
