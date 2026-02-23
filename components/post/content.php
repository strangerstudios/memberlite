<?php
/**
 * Template part for displaying posts.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

global $memberlite_defaults;
$post_class = get_post_type() === 'post' ? 'entry-header-grid' : '';
$aria_attr = is_single() ? ' aria-labelledby="page-title"' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?><?php echo $aria_attr; ?>>

	<?php if ( ! is_single() ) {
		get_template_part( 'components/post/entry', 'header' );
	} ?>

	<div class="entry-content">
		<?php if ( is_single() ) {
			do_action( 'memberlite_before_content_single' );
		} else {
			do_action( 'memberlite_before_content_post' );
		}

		$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );
		if ( in_array( $memberlite_loop_images, array( 'show_thumbnail', 'show_both' ) ) && has_post_thumbnail() ) {
			$alt = ''; // Assume purely decorative.
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			if ( $thumbnail_id ) {
				$alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
			}

			the_post_thumbnail(
				'thumbnail',
				array(
					'class' => 'alignright',
					'alt'   => esc_attr( $alt ),
				)
			);
		}

		if ( is_archive() || ( is_home() && get_post_type() === 'post' ) ) {
			// If we're on an archive or the blog posts list that isn't an archive.
			$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
			if ( $content_archives === 'excerpt' ) {
				memberlite_the_excerpt();
			} else {
				memberlite_more_content();
				get_template_part( 'components/post/post', 'author-block' );
			}
		} else {
			the_content();

			if ( is_single() ) {
				// Only show author blocks on single posts if enabled
				get_template_part( 'components/post/post', 'author-block' );
			}
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			)
		);

		if ( is_single() ) {
			do_action( 'memberlite_after_content_single' );
		} else {
			do_action( 'memberlite_after_content_post' );
		} ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'components/post/entry', 'footer' ); ?>
</article><!-- #post-## -->
