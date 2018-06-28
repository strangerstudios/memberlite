<?php
/**
 * The template for displaying all single posts.
 *
 * @package Memberlite
 */
get_header(); ?>
	<div id="primary" class="medium-<?php echo memberlite_getColumnsRatio(); ?> columns content-area">
		<?php do_action('memberlite_before_main'); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action('memberlite_after_loop'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<hr />
			<a href="<?php echo esc_url( get_post_type_archive_link( 'testimonials-widget' ) ); ?>"><?php _e('View All Testimonials','memberlite'); ?></a>
		<?php endwhile; // end of the loop. ?>
		<?php do_action('memberlite_after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('memberlite_after_main'); ?>
	</div><!-- #primary -->

<?php memberlite_get_sidebar(); ?>

<?php get_footer(); ?>