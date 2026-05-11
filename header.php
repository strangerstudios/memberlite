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
		$header_post_name        = memberlite_get_current_header_post_name();
		$header_class            = 'site-header';
		$header_post_name_exists = ! empty( $header_post_name ) && '0' !== $header_post_name;

		if ( $header_post_name_exists ) {
			$header_class .= ' is-header-variation';
			$header_class .= ' site-header-' . sanitize_html_class( $header_post_name );
		} else {
			$header_class .= ' site-header-default';
		}

		?>
		<header class="<?php echo esc_attr( $header_class ); ?>" role="banner">
			<?php memberlite_the_header_edit_link( $header_post_name ); ?>
			<?php if ( $header_post_name_exists ) {
				get_template_part( 'components/header/header', 'mobile-row' );
				$is_sticky = memberlite_is_header_variation_sticky( $header_post_name );
				if ( $is_sticky ) { ?><div class="site-header-variation-sticky-wrapper"><?php } ?>
				<div class="site-header-variation">
			<?php } ?>

			<?php if ( ! memberlite_render_header_variation( $header_post_name ) ) {
				get_template_part( 'components/header/variation', 'default' );
			} ?>

			<?php if ( $header_post_name_exists ) { ?>
				</div>
				<?php if ( $is_sticky ) { ?></div><!-- .site-header-variation-sticky-wrapper --><?php } ?>
				<?php get_template_part( 'components/header/header', 'mobile-menu' );
			} ?>
		</header><!-- #masthead -->
	<?php } // End if memberlite_hide_page_header is false ?>

	<?php do_action( 'memberlite_before_content' ); ?>

	<div id="content" class="site-content">

		<?php
		$should_render_masthead = memberlite_should_masthead_render();
		$memberlite_banner_show = apply_filters( 'memberlite_banner_show', $should_render_masthead );
		get_template_part( 'components/header/header', 'masthead', array( 'should_render_masthead' => $memberlite_banner_show ) ); ?>
