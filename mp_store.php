<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Memberlite
 */

get_header(); ?>

	<div id="primary" class="medium-<?php echo memberlite_getColumnsRatio(); ?> columns content-area">
		<?php do_action('before_main'); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action('before_loop'); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				<?php
				//If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
				?>
				
			<?php endwhile; // end of the loop. ?>

			<?php do_action('after_loop'); ?>
		</main><!-- #main -->
		<?php do_action('after_main'); ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
