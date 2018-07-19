<?php
/**
 * Template part for displaying status posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content lead">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<?php $author_id = $post->post_author; ?>
		<div class="post_author_avatar"><?php echo get_avatar( $author_id, 80 ); ?></div>
		<?php the_content( esc_html__( 'Continue Reading', 'memberlite' ) ); ?>
		<div class="clear"></div>
		<?php do_action( 'memberlite_after_content_post' ); ?>
	</div><!-- .entry-content -->

	<?php
		$memberlite_get_entry_meta_after = memberlite_get_entry_meta( $post, 'after' );
	if ( ! empty( $memberlite_get_entry_meta_after ) || current_user_can( 'edit_post', $post->ID ) ) {
		?>
		<footer class="entry-footer">
			<div class="entry-meta">
				<?php if ( 'post' == get_post_type() ) : ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark"><i class="fa fa-link"></i></a> |
						<?php echo Memberlite_Customize::sanitize_text_with_links( $memberlite_get_entry_meta_after ); ?>
					<?php endif; ?>
				<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
			</footer><!-- .entry-footer -->
			<?php
	}
	?>
</article><!-- #post-## -->
