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

<?php wp_body_open(); ?>

<?php do_action( 'memberlite_before_page' ); ?>

<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'memberlite' ); ?></a>

	<?php if ( ! memberlite_hide_page_header() ) { ?>
		<?php do_action( 'memberlite_before_site_header' ); ?>

		<?php
		$header_post_name = memberlite_get_current_header_post_name();
		$is_legacy_header = memberlite_is_legacy_header_active();
		$header_class     = $is_legacy_header ? 'site-header-default' : 'site-header-' . esc_attr( $header_post_name );
		?>
		<header class="site-header <?php echo esc_attr( $header_class ); ?>" role="banner">
			<?php if ( $is_legacy_header ) {
				get_template_part( 'components/header/variation', 'default' );
			} else {
				get_template_part( 'components/header/header', 'mobile-row' );
				?>
				<div class="site-header-variation">
					<?php memberlite_render_header_variation( $header_post_name ); ?>
				</div>
				<?php
				get_template_part( 'components/header/header', 'mobile-menu' );
				memberlite_the_header_edit_link( $header_post_name );
			} ?>
		</header><!-- #masthead -->
	<?php } // End if memberlite_hide_page_header is false ?>

	<?php do_action( 'memberlite_before_content' ); ?>

	<div id="content" class="site-content">

		<?php get_template_part( 'components/header/header', 'masthead' ); ?>
