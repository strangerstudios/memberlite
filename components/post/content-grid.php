<?php
/**
 * Template part for displaying grid-style posts.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

global $memberlite_defaults; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	<a class="post-thumbnail-link" href="<?php echo esc_url( get_permalink() ); ?>">
		<?php
			// Use the dedicated banner image if available, otherwise fall back to the featured image.
			$grid_image = memberlite_get_banner_image( get_the_ID(), 'large', false, array( 'class' => 'aligncenter' ) );
			if ( empty( $grid_image ) ) {
				$grid_image = get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'aligncenter' ) );
			}
			if ( ! empty( $grid_image ) ) {
				echo $grid_image; // WPCS: xss ok.
			} else { ?>
				<div class="post-thumbnail-empty"><i class="fas fa-file-alt"></i></div>
			<?php }
		?>
	</a>
	<?php get_template_part( 'components/post/entry', 'header' ); ?>

	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<?php do_action( 'memberlite_after_content_post' ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
