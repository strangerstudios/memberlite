<?php
/**
 * The template for displaying forum pages.
 *
 * @package Memberlite
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="medium-12 columns content-area">
		<?php do_action( 'memberlite_before_main' ); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action( 'memberlite_before_loop' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'components/page/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php do_action( 'memberlite_after_loop' ); ?>
		</main><!-- #main -->
		<?php do_action( 'memberlite_after_main' ); ?>
	</div><!-- #primary -->

</div><!-- .row -->

<?php get_footer(); ?>