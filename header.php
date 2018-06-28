<?php
/**
 * The template for displaying the header.
 *
 * Displays all of the <head> section and everything up to the "content" div.
 *
 * @package Memberlite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'memberlite_before_page' ); ?>
<div id="page" class="hfeed site">

	<?php get_template_part( 'components/header/mobile', 'menu' ); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'memberlite' ); ?></a>
	
	<?php do_action( 'memberlite_before_site_header' ); ?>
	
	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<?php
				$meta_login = get_theme_mod( 'meta_login', false );
			if ( ! is_page_template( 'templates/interstitial.php' ) && ( ! empty( $meta_login ) || has_nav_menu( 'meta' ) || is_active_sidebar( 'sidebar-3' ) ) ) {
				$show_header_right = true;
			}
			?>

			<div class="
			<?php
			if ( is_page_template( 'templates/interstitial.php' ) || empty( $show_header_right ) ) {
				echo 'large-12';
			} else {
				echo 'medium-' . memberlite_getColumnsRatio( 'header-left' ); }
?>
 columns site-branding">
				
				<?php memberlite_the_custom_logo(); ?>
				
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>

			</div><!-- .column4 -->
			
			<?php if ( ! empty( $show_header_right ) ) { ?>
				<div class="medium-<?php echo memberlite_getColumnsRatio( 'header-right' ); ?> columns header-right
												<?php
												if ( $meta_login == false ) {
								?>
								 no-meta-menu<?php } ?>">
					<?php
					if ( ! empty( $meta_login ) ) {
						get_template_part( 'components/header/meta', 'member' );
					}

					$meta_defaults = array(
						'theme_location'  => 'meta',
						'container'       => 'nav',
						'container_id'    => 'meta-navigation',
						'container_class' => 'meta-navigation',
						'fallback_cb'     => false,
					);
					wp_nav_menu( $meta_defaults );

					if ( is_dynamic_sidebar( 'sidebar-3' ) ) {
						dynamic_sidebar( 'sidebar-3' );
					}
					?>
				</div><!-- .columns -->
			<?php } ?>

		</div><!-- .row -->
	</header><!-- #masthead -->

	<?php do_action( 'memberlite_before_site_navigation' ); ?>
	
	<?php if ( ! is_page_template( 'templates/interstitial.php' ) && has_nav_menu( 'primary' ) ) { ?>
		<nav id="site-navigation">
		<?php
			$primary_defaults = array(
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_class' => 'main-navigation row',
				'menu_class'      => 'menu large-12 columns',
				'fallback_cb'     => false,
			);
			wp_nav_menu( $primary_defaults );
		?>
		</nav><!-- #site-navigation -->
	<?php } ?>

	<?php do_action( 'memberlite_before_content' ); ?>
	
	<div id="content" class="site-content">

	<?php get_template_part( 'components/header/masthead' ); ?>
	
	<?php
		$template = get_page_template();
	if ( ! is_page_template( 'templates/fluid-width.php' ) &&
			! is_404() &&
			( ! is_front_page() || ( is_front_page() && ! empty( $template ) && ( basename( $template ) != 'page.php' ) || 'posts' == get_option( 'show_on_front' ) ) )
		) {
		?>
		<div class="row">
	<?php } ?>
