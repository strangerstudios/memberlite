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
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
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
			<?php
			$should_show_header_right = memberlite_should_show_header_right();
			$header_layout_classes    = $should_show_header_right ? 'medium-' . esc_attr( memberlite_getColumnsRatio( 'header-left' ) ) : 'large-12';
			?>
			<div class="<?php echo esc_attr( $header_layout_classes ); ?> columns site-branding">

				<?php memberlite_the_custom_logo(); ?>

				<div class="site-identity">
					<?php echo memberlite_output_site_title(); ?>
					<span class="site-description"><?php bloginfo( 'description' ); ?></span>
				</div>

			</div><!-- .site-branding -->

			<?php if ( ! empty( $should_show_header_right ) ) {
				$header_meta_menu_class = ! memberlite_is_meta_login_active() ? 'no-meta-menu' : '';
				?>
				<div class="columns header-right medium-<?php echo esc_attr( memberlite_getColumnsRatio( 'header-right' ) );
					echo esc_attr( $header_meta_menu_class ) ?>">

					<?php
					// Get Login Form/Member Profile Info
					get_template_part( 'components/header/header', 'member-info' );

					// Replaces where we were previously using the "meta" menu and sidebar-3
					do_action( 'memberlite_after_member_info' );
					?>
				</div><!-- .columns -->
			<?php } ?>

			<?php
			// show the mobile menu toggle button
			if ( is_active_sidebar( 'sidebar-5' ) || has_nav_menu( 'primary' ) ) { ?>
				<div class="mobile-navigation-bar">
					<button class="menu-toggle"><i class="fa fa-bars"></i> <span
							class="screen-reader-text"><?php esc_html_e( 'Toggle Mobile Menu', 'memberlite' ); ?></span>
					</button>
				</div>
			<?php }
			?>
		</div><!-- .row -->

		<?php get_template_part( 'components/header/header', 'site-navigation' ); ?>

		<?php } // End if() that checks it's not the Blank page template. ?>
	</header><!-- #masthead -->

	<?php do_action( 'memberlite_before_content' ); ?>

	<div id="content" class="site-content">

		<?php get_template_part( 'components/header/header', 'masthead' ); ?>

		<?php if ( ! is_page_template( 'templates/fluid-width.php' ) && ( ! memberlite_hide_page_header() && ! memberlite_hide_page_footer() ) && ! is_404() ) { ?>
		<div class="row">
			<?php } ?>
