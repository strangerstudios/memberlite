<?php
/**
 * The template for displaying forum pages.
 *
 * @package Memberlite
 */

get_header(); ?>
	<?php
		if ( bbp_is_single_user() ) {
			$columns_class = 'medium-12';
		} else {
			$columns_class = 'medium-' . esc_attr( memberlite_getColumnsRatio() );
		}
	?>
	<div id="primary" class="<?php echo esc_attr( $columns_class ); ?> columns content-area">
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

<?php
if ( ! bbp_is_single_user() ) {
	memberlite_get_sidebar();
}
?>

<?php get_footer(); ?>
