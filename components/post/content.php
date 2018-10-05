<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<?php global $memberlite_defaults; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'components/post/entry', 'header' ); ?>

	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<?php
			$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );
		if ( $memberlite_loop_images == 'show_both' ) {
			the_post_thumbnail( 'medium', array( 'class' => 'alignright' ) );
		}
		?>
		<?php
			$content_archives = get_theme_mod( 'content_archives' );
			if ( $content_archives == 'excerpt' ) {
				$content_arr = get_extended ( $post->post_content );
				if ( empty( $content_arr['extended'] ) ) {
					// There is no custom excerpt designated, show the_excerpt()
					the_excerpt();
				} else {
					// There is an excerpt designated by the <!--more--> tag, show that.
					echo apply_filters( 'the_content', $content_arr['main'] );
				}
			} else {
				global $more;
				$more = 1;
				the_content();
			}
		?>
		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
					'after'  => '</div>',
				)
			);
		?>
		<div class="clear"></div>
		<?php do_action( 'memberlite_after_content_post' ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide meta text for pages on Search ?>
			<?php echo memberlite_get_entry_meta( $post, 'after' ); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
