<?php
/**
 * The template for displaying forum pages.
 *
 * @package Memberlite
 */

get_header(); ?>

	<div id="primary" class="
	<?php
	if ( bbp_is_single_user() ) {
?>
medium-12
<?php
	} else {
	?>
	medium-<?php echo esc_attr( memberlite_getColumnsRatio() ); ?><?php } ?> columns content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();
?>

				<?php get_template_part( 'components/page/content', 'page' ); ?>
				
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( ! bbp_is_single_user() ) {
	memberlite_get_sidebar();
}
?>

<?php get_footer(); ?>
