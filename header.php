<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Memberlite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php if ( is_singular() && pings_open() ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('before_page'); ?>
<div id="page" class="hfeed site">
	<?php do_action('before_mobile_nav'); ?>	
	<?php 
		if(is_active_sidebar('sidebar-5') || has_nav_menu('primary'))
		{
			//show the mobile menu widget area
			?>
			<nav id="mobile-navigation" role="navigation">
			<?php
				if(is_active_sidebar('sidebar-5'))
				{
					dynamic_sidebar('sidebar-5');
				}
				elseif(has_nav_menu('primary'))
				{
					$mobile_defaults = array(
						'theme_location' => 'primary',
					);				
					wp_nav_menu($mobile_defaults ); 				
				}
			?>
			</nav>
			<div class="mobile-navigation-bar">
				<button class="menu-toggle"><i class="fa fa-bars"></i></button>
			</div>
			<?php
		}
	?>
	<?php do_action('after_mobile_nav'); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'memberlite' ); ?></a>
	<?php do_action('before_site_header'); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<?php
				$meta_login = get_theme_mod( 'meta_login', false ); 
				if(!is_page_template( 'templates/interstitial.php' ) && (!empty($meta_login) || has_nav_menu('meta') || is_active_sidebar('sidebar-3')) ) 
					$show_header_right = true;
			?>
			<div class="<?php if(is_page_template( 'templates/interstitial.php') || empty($show_header_right)) { echo 'large-12'; } else { echo 'medium-' . memberlite_getColumnsRatio( 'header-left' ); } ?> columns site-branding">
				<?php memberlite_the_custom_logo(); ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			</div><!-- .column4 -->
			<?php
				if(!empty($show_header_right))
				{
					?>
					<div class="medium-<?php echo memberlite_getColumnsRatio( 'header-right' ) ?> columns header-right<?php if($meta_login == false) { ?> no-meta-menu<?php } ?>">
					<?php
						if(!empty($meta_login))
						{	
							?>
							<div id="meta-member">
								<aside class="widget">
								<?php 
									global $current_user, $pmpro_pages;
									if($user_ID)
									{ 
										if(!empty($pmpro_pages)) {
											$account_page = get_post($pmpro_pages['account']);
											$user_account_link = '<a href="' . esc_url(pmpro_url("account")) . '">' . preg_replace("/\@.*/", "", $current_user->display_name) . '</a>';
										}
										else {
											$user_account_link = '<a href="' . esc_url(admin_url("profile.php")) . '">' . preg_replace("/\@.*/", "", $current_user->display_name) . '</a>';											
										}
										?>				
										<span class="user"><?php printf(__('Welcome, %s', 'memberlite'), $user_account_link);?></span>
										<?php										
									}									
									$member_menu_defaults = array(
										'theme_location' => 'member',
										'container' => 'nav',
										'container_id' => 'member-navigation',
										'container_class' => 'member-navigation',
										'fallback_cb' => 'memberlite_member_menu_cb',
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									);					
									wp_nav_menu( $member_menu_defaults ); 
								?>
								</aside>
							</div><!-- #meta-member -->
							<?php
						}
											
						$meta_defaults = array(
							'theme_location' => 'meta',
							'container' => 'nav',
							'container_id' => 'meta-navigation',
							'container_class' => 'meta-navigation',
							'fallback_cb' => false
						);
						wp_nav_menu( $meta_defaults );
						
						if(is_dynamic_sidebar('sidebar-3'))
							dynamic_sidebar('sidebar-3');
						?>
					</div><!-- .column8 -->
					<?php 
					}
				?>
		</div><!-- .row -->
	</header><!-- #masthead -->
	<?php do_action('before_site_navigation'); ?>
	<?php if(!is_page_template( 'templates/interstitial.php' )) { ?>
	<nav id="site-navigation">
	<?php
		$primary_defaults = array(
			'theme_location' => 'primary',
			'container' => 'div',
			'container_class' => 'main-navigation row',
			'menu_class' => 'menu large-12 columns',
			'fallback_cb' => false,					
		);				
		wp_nav_menu($primary_defaults); 				
	?>
	</nav><!-- #site-navigation -->
	<?php } ?>
	<?php do_action('before_content'); ?>
	<div id="content" class="site-content">
	<?php do_action('before_masthead'); ?>
	<?php 
		if( !empty( $post ) )
			$memberlite_banner_show = get_post_meta($post->ID, '_memberlite_banner_show', true);
		else
			$memberlite_banner_show = false;
		if( $memberlite_banner_show === '' || (function_exists('is_bbpress') && ( bbp_is_single_user() || is_bbpress() ) ) )
			$memberlite_banner_show = 1;		//we want to default to showing if this has never been set

		$template = get_page_template();
		if( !is_front_page() || (is_front_page() && (basename($template) != 'page.php') || 'posts' == get_option( 'show_on_front' )) && !is_404())
		{
			$post = get_queried_object();
			if(empty($post) && is_archive())
			{
				$page_for_posts_id = get_option('page_for_posts');
				$post = get_page($page_for_posts_id);
			}
			if(!empty($post) && !is_attachment())
			{
				$banner_image_id = memberlite_getBannerImageID($post);
				$banner_image_src = wp_get_attachment_image_src( $banner_image_id, 'full');
				if(!empty($banner_image_src) && !empty($memberlite_banner_show))
				{
					?>
					<div class="masthead-banner" style="background-image: url('<?php echo esc_attr($banner_image_src[0]);?>');">
					<?php
				}
			}
			if(!empty($memberlite_banner_show))
			{
				?>
				<header class="masthead">
					<div class="row">
						<div class="large-12 columns">
							<?php do_action('before_masthead_inner'); ?>
							<?php if(is_page_template( 'templates/interstitial.php' )) { 
								$referrer = isset( $_GET['redirect_to'] ) ? esc_url_raw( $_GET['redirect_to'] ) :null;
								?>
								<a class="btn" href="<?php echo esc_attr($referrer); ?>"><?php _e( 'No Thanks &raquo;','memberlite'); ?></a>
							<?php } else { ?>
								<?php 
									if(!empty($post))
									{
										$memberlite_banner_hide_breadcrumbs = get_post_meta($post->ID, '_memberlite_banner_hide_breadcrumbs', true);
										if(empty($memberlite_banner_hide_breadcrumbs))
											memberlite_getBreadcrumbs(); 
									}
									if(function_exists('is_bbpress') && bbp_is_search())
											memberlite_getBreadcrumbs();											
								?>
							<?php } ?>							
							<?php
								if(!empty($post))
								{
									$memberlite_banner_extra_padding = get_post_meta($post->ID, '_memberlite_banner_extra_padding', true);
								}
								if(!empty($memberlite_banner_extra_padding))
									echo '<div class="masthead-padding">';
							?>
							<?php if(is_search() || (function_exists('is_bbpress') && (bbp_is_search() || bbp_is_single_user()))) { ?>
								<?php memberlite_page_title(); ?>
							<?php } elseif(!empty($post)) { ?>
								<?php
									$memberlite_banner_right = get_post_meta($post->ID, '_memberlite_banner_right', true);									
									$memberlite_banner_icon = get_post_meta($post->ID, '_memberlite_banner_icon', true);
									$memberlite_page_icon = get_post_meta($post->ID, '_memberlite_page_icon', true);
									$memberlite_columns_primary = memberlite_getColumnsRatio();
									if(!empty($memberlite_banner_right) || (!empty($memberlite_banner_icon)  && !empty($memberlite_page_icon)) )
									{
										echo '<div class="row">';								
										if(!empty($memberlite_banner_icon) && !empty($memberlite_page_icon) )
										{
											//Show the icon in a 2 column span
											echo '<div class="medium-1 columns"><i class="fa fa-4x fa-' . $memberlite_page_icon . '"></i></div>';
											//Add the column wrapper for page title and description
											if(empty($memberlite_banner_right))
												echo '<div class="medium-11 columns">';
											else
												echo '<div class="medium-' . ($memberlite_columns_primary-1) .' columns">';
										}
										else
											echo '<div class="medium-' . $memberlite_columns_primary . '  columns">';
									}
								?>
								<?php 
									if(!empty($post))
									{
										$memberlite_banner_hide_title = get_post_meta($post->ID, '_memberlite_banner_hide_title', true);
										if(empty($memberlite_banner_hide_title))
											memberlite_page_title(); 
									}
								?>
								<?php do_action('before_masthead_description'); ?>
								<?php
									$memberlite_banner_desc = get_post_meta($post->ID, '_memberlite_banner_desc', true);
									if(!empty($memberlite_banner_desc))
										echo wpautop(do_shortcode($memberlite_banner_desc));
								?>
								<?php do_action('after_masthead_description'); ?>
								<?php 
									if(!empty($memberlite_banner_right) || (!empty($memberlite_banner_icon)  && !empty($memberlite_page_icon)) )
										echo '</div> <!-- end .medium-X .columns -->';
									if(!empty($memberlite_banner_right))
									{
										echo '<div class="medium-' . memberlite_getColumnsRatio( 'sidebar' ) . ' columns">';
										echo wpautop(do_shortcode($memberlite_banner_right));
										echo '</div> <!-- end .medium-X .columns -->';
									}
									if(!empty($memberlite_banner_right) || (!empty($memberlite_banner_icon)  && !empty($memberlite_page_icon)) )
										echo '</div> <!-- end .row -->';
								?>
							<?php } ?>
							<?php
								if(!empty($memberlite_banner_extra_padding))
									echo '</div> <!-- .masthead-padding -->';
							?>
							<?php do_action('after_masthead_inner'); ?>
						</div>
					</div><!-- .row -->
				</header><!-- .masthead -->
				<?php 
				} //checks if the banner is hidden
			?>
			<?php
				if(!empty($banner_image_src) && !empty($memberlite_banner_show))
				{
					?>
					</div> <!-- .masthead-banner -->
					<?php
				}
			?>
			<?php if(!is_page_template( 'templates/fluid-width.php' )) { ?>
				<div class="row">
			<?php } ?>
			<?php
		} 
	?>
	<?php do_action('after_masthead'); ?>