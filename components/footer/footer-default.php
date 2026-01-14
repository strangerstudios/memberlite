<?php
/**
 * Displays the default footer content
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

<div class="site-info row">

	<div class="medium-12 columns">

		<?php get_template_part( 'components/footer/footer', 'site-info' ); ?>

		<?php get_template_part( 'components/footer/footer', 'back-to-top' ); ?>

	</div>

</div><!-- .site-info -->
