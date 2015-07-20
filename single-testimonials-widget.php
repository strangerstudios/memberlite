<?php
/**
 * The template for displaying all single posts.
 *
 * @package Member Lite 2.0
 */
get_header(); ?>
	<div id="primary" class="medium-8 columns content-area">
		<?php do_action('before_main'); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action('after_loop'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
		<?php do_action('after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('after_main'); ?>
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>