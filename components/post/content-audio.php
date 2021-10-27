<?php
/**
 * Template part for displaying audio posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<?php global $memberlite_defaults; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-header-grid' ); ?>>
	<?php get_template_part( 'components/post/entry', 'header' ); ?>
	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<?php
			$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
			if ( $content_archives == 'excerpt' ) {
				memberlite_the_excerpt();
			} else {
				memberlite_more_content();
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
	<?php
		$memberlite_get_entry_meta_after = memberlite_get_entry_meta( $post, 'after' );
	if ( ! empty( $memberlite_get_entry_meta_after ) || current_user_can( 'edit_post', $post->ID ) ) {
		?>
		<footer class="entry-footer">
			<?php
			if ( 'post' == get_post_type() ) :
				echo Memberlite_Customize::sanitize_text_with_links( $memberlite_get_entry_meta_after );
				endif;
				?>
				<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
			<?php
	}
	?>
</article><!-- #post-## -->
