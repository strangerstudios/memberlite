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

<article id="post-<?php the_ID(); ?>"
	<?php if ( get_post_type() == 'post' ) {
		post_class( 'entry-header-grid' );
	} else {
		post_class( );
	} ?>>
	
	<?php get_template_part( 'components/post/entry', 'header' ); ?>

	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<?php
			$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );
			// Only show the thumbnail in post loop if Memberlite Elements is active. This prevents double images where only a featured image is set.
			if ( $memberlite_loop_images == 'show_both' && defined( 'MEMBERLITE_ELEMENTS_VERSION' ) ) {
				the_post_thumbnail(
					'medium',
					array(
						'class' => 'alignright',
					)
				);
			}

			$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
			if ( $content_archives == 'excerpt' ) {
				memberlite_the_excerpt();
			} else {
				memberlite_more_content();
				$author_block = get_theme_mod( 'author_block', $memberlite_defaults['author_block'] );
				if ( ! empty( $author_block ) ) {
					get_template_part( 'components/post/entry', 'author-block' );
				}
			}

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
			<?php echo Memberlite_Customize::sanitize_text_with_links( memberlite_get_entry_meta( $post, 'after' ) ); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
