<?php
/**
 * Displays the default footer content
 *
 * @package Memberlite
 *
 * @todo: Add hooks for customization
 */
?>

<div class="footer-navigation row">
	<?php get_template_part( 'components/footer/footer', 'site-info' ); ?>

	<?php get_template_part( 'components/footer/footer', 'navigation' ); ?>

	<?php get_template_part( 'components/footer/footer', 'back-to-top' ); ?>
</div><!-- .footer-navigation -->
