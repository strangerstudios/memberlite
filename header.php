<?php
/**
 * The template for displaying the header.
 *
 * Displays all of the <head> section and everything up to the "content" div.
 *
 * @package Memberlite
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
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

<?php if ( ! memberlite_hide_page_header() ) { ?>

	<?php get_template_part( 'components/header/mobile', 'menu' ); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'memberlite' ); ?></a>

	<?php do_action( 'memberlite_before_site_header' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<?php get_template_part( 'components/header/meta-member.php' );?>

			<div class="
			<?php
			if ( empty( $show_header_right ) ) {
				echo 'large-12';
			} else {
				echo 'medium-' . esc_attr( memberlite_getColumnsRatio( 'header-left' ) ); }
?>
 columns site-branding">

				<?php memberlite_the_custom_logo(); ?>

				<div class="site-identity">
					<?php
						/**
						 * Accessible and search-optimized page title HTML markup.
						 * Use h1 if this is the front page of the site and
						 * span if on an interior page.
						 */
						if ( is_front_page() ) {
							$site_title_html_tag = 'h1';
						} else {
							$site_title_html_tag = 'span';
						}
					?>
					<<?php echo esc_attr( $site_title_html_tag ); ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo esc_attr( $site_title_html_tag ); ?>>

					<span class="site-description"><?php bloginfo( 'description' ); ?></span>
				</div>

			</div><!-- .site-branding -->

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
									'walker'          => new Memberlite_Aria_Walker_Nav_Menu(),
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
						<button class="menu-toggle"><i class="fa fa-bars"></i> <span class="screen-reader-text"><?php esc_html_e( 'Toggle Mobile Menu', 'memberlite' ); ?></span></button>
					</div>
				<?php }
			?>
		</div><!-- .row -->

        <?php get_template_part( 'components/header/header', 'site-navigation' ); ?>

       <?php } // End if() that checks it's not the Blank page template. ?>
	</header><!-- #masthead -->

	<?php do_action( 'memberlite_before_content' ); ?>

	<div id="content" class="site-content">

	<?php get_template_part( 'components/header/masthead' ); ?>

	<?php if ( ! is_page_template( 'templates/fluid-width.php' )  && ( ! memberlite_hide_page_header() && ! memberlite_hide_page_footer() ) && ! is_404() ) { ?>
		<div class="row">
	<?php } ?>
