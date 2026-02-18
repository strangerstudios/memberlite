<?php
/**
 * The template for displaying all pages.
 *
 * @package Memberlite
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="medium-<?php echo esc_attr( memberlite_getColumnsRatio() ); ?> columns content-area">
		<?php do_action( 'memberlite_before_main' ); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action( 'memberlite_before_loop' );

			while ( have_posts() ) : the_post();
				get_template_part( 'components/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' !== get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // end of the loop.

			do_action( 'memberlite_after_loop' ); ?>
		</main><!-- #main -->
		<?php do_action( 'memberlite_after_main' ); ?>
	</div><!-- #primary -->

	<?php memberlite_get_sidebar(); ?>
</div>
<?php get_footer(); ?>
