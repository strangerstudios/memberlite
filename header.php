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
<?php 
	do_action( 'memberlite_before_page' );
	
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	} 
?>
<div id="page" class="hfeed site">

<?php
	// Hide header output for the Blank page template.
	if ( ! is_page_template( 'templates/blank.php' ) ) { ?>

	<?php get_template_part( 'components/header/mobile', 'menu' ); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'memberlite' ); ?></a>

	<?php do_action( 'memberlite_before_site_header' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<?php
				$meta_login = get_theme_mod( 'meta_login', false );
				if ( ! is_page_template( 'templates/interstitial.php' ) && ( ! empty( $meta_login ) || has_nav_menu( 'meta' ) || is_active_sidebar( 'sidebar-3' ) ) ) {
					$show_header_right = true;
				} else {
					$show_header_right = false;
				}
				/**
				 * Filter to hide or show the right column area of the header.
				 *
				 * @param bool $show_header_right True to show the header right, false to hide it.
				 *
				 * @return bool $show_header_right
				 */
				$show_header_right = apply_filters( 'memberlite_show_header_right', $show_header_right );
			?>

			<div class="
			<?php
			if ( is_page_template( 'templates/interstitial.php' ) || empty( $show_header_right ) ) {
				echo 'large-12';
			} else {
				echo 'medium-' . esc_attr( memberlite_getColumnsRatio( 'header-left' ) ); }
?>
 columns site-branding">

				<?php memberlite_the_custom_logo(); ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<span class="site-description"><?php bloginfo( 'description' ); ?></span>

			</div><!-- .column4 -->

			<?php if ( ! empty( $show_header_right ) ) { ?>
				<div class="medium-<?php echo esc_attr( memberlite_getColumnsRatio( 'header-right' ) ); ?> columns header-right<?php if ( $meta_login == false ) { ?> no-meta-menu<?php } ?>">
					<?php
						if ( ! empty( $meta_login ) ) {
							get_template_part( 'components/header/meta', 'member' );
						}

						if ( has_nav_menu( 'meta' ) ) {
							wp_nav_menu(
								array(
									'theme_location'  => 'meta',
									'container'       => 'nav',
									'container_id'    => 'meta-navigation',
									'container_class' => 'meta-navigation',
									'fallback_cb'     => false,
								)
							);
						}

						if ( is_dynamic_sidebar( 'sidebar-3' ) ) {
							dynamic_sidebar( 'sidebar-3' );
						}
					?>
				</div><!-- .columns -->
			<?php } ?>

			<?php
				// show the mobile menu toggle button
				if ( is_active_sidebar( 'sidebar-5' ) || has_nav_menu( 'primary' ) ) { ?>
					<div class="mobile-navigation-bar">
					<button class="menu-toggle"><i class="fa fa-bars"></i></button>
					</div>
				<?php }
			?>
		</div><!-- .row -->
	</header><!-- #masthead -->

	<?php do_action( 'memberlite_before_site_navigation' ); ?>

	<?php if ( ! is_page_template( 'templates/interstitial.php' ) && has_nav_menu( 'primary' ) ) { ?>
		<?php
			$sticky_nav = get_theme_mod( 'sticky_nav' );
			if ( $sticky_nav == true ) { ?>
				<div class="site-navigation-sticky-wrapper">
			<?php }
		?>
		<nav id="site-navigation">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			$primary_defaults = array(
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_class' => 'main-navigation row',
				'menu_class'      => 'menu large-12 columns',
				'fallback_cb'     => false,
			);
			wp_nav_menu( $primary_defaults );
		}
		?>
		</nav><!-- #site-navigation -->
		<?php
			if ( $sticky_nav == true ) { ?>
			</div> <!-- .site-navigation-sticky-wrapper -->
		<?php }
		}
	} // End if(). ?>

	<?php do_action( 'memberlite_before_content' ); ?>

	<div id="content" class="site-content">

	<?php get_template_part( 'components/header/masthead' ); ?>

	<?php if ( ! is_page_template( 'templates/fluid-width.php' )  && ! is_page_template( 'templates/blank.php' ) && ! is_404() ) { ?>
		<div class="row">
	<?php } ?>
