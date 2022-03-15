<?php
/**
 * The template for displaying archive pages.
 *
 * @package Memberlite
 */

get_header(); ?>

	<section id="primary" class="medium-<?php echo esc_attr( memberlite_getColumnsRatio() ); ?> columns content-area">
		<?php do_action( 'memberlite_before_main' ); ?>
		<main id="main" class="site-main" role="main">
		<?php do_action( 'memberlite_before_loop' ); ?>

		<?php if ( have_posts() ) : ?>
			<?php
				/**
				 * Wrap posts output in the .grid-list class based on settings.
				 */
				$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
				if ( $content_archives === 'grid' ) { ?>
					<div class="grid-list">
				<?php }
			?>
			<?php while ( have_posts() ) :
				the_post(); ?>
				<?php
					/**
					 * Load the grid-style content part based on settings.
					 */
					if ( $content_archives === 'grid' ) {
						get_template_part( 'components/post/content', 'grid' );
					} else {
						get_template_part( 'components/post/content', get_post_format() );
					}
				?>
			<?php endwhile; ?>
			<?php if ( $content_archives === 'grid' ) { ?>
				</div> <!-- end .grid-list -->
			<?php } ?>
			<?php memberlite_paging_nav(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php do_action( 'memberlite_after_loop' ); ?>
		</main><!-- #main -->
		<?php do_action( 'memberlite_after_main' ); ?>
	</section><!-- #primary -->

<?php memberlite_get_sidebar(); ?>

<?php get_footer(); ?>
