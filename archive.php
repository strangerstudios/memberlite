<?php
/**
 * The template for displaying archive pages.
 *
 * @package Memberlite
 */
get_header(); ?>
	<section id="primary" class="medium-8 columns content-area">
		<?php do_action('before_main'); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action('before_loop'); ?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php memberlite_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php do_action('after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('after_main'); ?>
	</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>