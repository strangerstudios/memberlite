<?php
/**
 * The template for displaying search results pages.
 *
 * @package Memberlite
 */
get_header(); ?>
	<section id="primary" class="medium-<?php echo esc_attr( memberlite_getColumnsRatio() ); ?> columns content-area">
		<?php do_action( 'memberlite_before_main' ); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action( 'memberlite_before_loop' ); ?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) :
				the_post(); ?>
				<?php get_template_part( 'components/post/content', 'search' ); ?>
			<?php endwhile; ?>
			<?php memberlite_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'components/post/content', 'none' ); ?>
		<?php endif; ?>
		<?php do_action( 'memberlite_after_loop' ); ?>
		</main><!-- #main -->
		<?php do_action( 'memberlite_after_main' ); ?>
	</section><!-- #primary -->

<?php memberlite_get_sidebar(); ?>

<?php get_footer(); ?>
