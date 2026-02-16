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

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'memberlite' ); ?></a>

	<?php if ( ! memberlite_hide_page_header() ) { ?>
		<?php do_action( 'memberlite_before_site_header' ); ?>

		<?php
		$header_variation = get_theme_mod( 'memberlite_header_variation' );
		$is_default       = empty( $header_variation ) || 'default' === $header_variation;
		$header_class     = $is_default ? 'site-header-default' : 'site-header-' . $header_variation;
		?>
		<header class="site-header <?php echo esc_attr( $header_class ); ?>" role="banner">
			<?php if ( $is_default ) {
				get_template_part( 'components/header/header', 'default' );
			} else {
				get_template_part( 'components/header/header', $header_variation );
			} ?>
		</header><!-- #masthead -->
	<?php } // End if memberlite_hide_page_header is false ?>

	<?php do_action( 'memberlite_before_content' ); ?>

	<div id="content" class="site-content">

		<?php if ( ! is_single() ) {
			get_template_part( 'components/header/header', 'masthead' );
		} ?>
