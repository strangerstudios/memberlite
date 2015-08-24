<?php
/**
 * The main template file.
 *
 * @package Memberlite
 */
get_header(); ?>
	<div id="primary" class="medium-8 columns content-area">
		<?php do_action('before_main'); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action('before_loop'); ?>
		<?php if ( have_posts() ) : ?>
			<?php global $more; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $more = 1; ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php memberlite_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php do_action('after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('after_main'); ?>
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>