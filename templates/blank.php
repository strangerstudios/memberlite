<?php
/**
 * Template Name: Blank
 *
 * The template for displaying pages with no header or footer.
 *
 * @package Memberlite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php do_action( 'memberlite_before_main' ); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action( 'memberlite_before_loop' ); ?>

			<?php
			while ( have_posts() ) :
				the_post();
?>

				<?php get_template_part( 'components/page/content', 'page' ); ?>
				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; // end of the loop. ?>

			<?php do_action( 'memberlite_after_loop' ); ?>
		</main><!-- #main -->
		<?php do_action( 'memberlite_after_main' ); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
