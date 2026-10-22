<?php
/**
 * The template for displaying all pages.
 *
 * @package Memberlite
 */

// Full Width runs edge to edge, outside the grid row.
$memberlite_full_width = 'full-width' === memberlite_get_layout();

get_header();

if ( ! $memberlite_full_width ) { ?>
<div class="row">
<?php } ?>
	<div id="primary" class="<?php echo $memberlite_full_width ? '' : 'medium-' . esc_attr( memberlite_getColumnsRatio() ) . ' columns '; ?>content-area">
		<?php do_action( 'memberlite_before_main' ); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action( 'memberlite_before_loop' );

			while ( have_posts() ) : the_post();
				get_template_part( 'components/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // end of the loop.

			do_action( 'memberlite_after_loop' ); ?>
		</main><!-- #main -->
		<?php do_action( 'memberlite_after_main' ); ?>
	</div><!-- #primary -->
<?php if ( ! $memberlite_full_width ) { ?>

	<?php memberlite_get_sidebar(); ?>
</div>
<?php } ?>
<?php get_footer(); ?>
