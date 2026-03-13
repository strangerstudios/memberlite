<?php
/**
 * Displays the footer content for the default footer variation.
 * Version: 7.0
 *
 * @version 7.0
 *
 * @package Memberlite
 */
?>

<?php do_action( 'memberlite_before_footer_widgets' ); ?>

<?php get_template_part( 'components/footer/footer', 'widgets' ); ?>

<?php do_action( 'memberlite_after_footer_widgets' ); ?>

<div class="footer-navigation row">

	<div class="medium-12 columns">

		<?php get_template_part( 'components/footer/footer', 'navigation' ); ?>

	</div>

</div><!-- .footer-navigation -->

<?php do_action( 'memberlite_before_site_info' ); ?>

<div class="site-info">

	<?php get_template_part( 'components/footer/footer', 'site-info' ); ?>

	<?php get_template_part( 'components/footer/footer', 'back-to-top' ); ?>

</div><!-- .site-info -->

<?php do_action( 'memberlite_after_site_info' ); ?>
