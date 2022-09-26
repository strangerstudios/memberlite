<?php
/**
 * Template part for displaying quote posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<?php global $memberlite_defaults; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		global $memberlite_defaults;
		$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );
	if ( ( $memberlite_loop_images == 'show_both' && defined( 'MEMBERLITE_ELEMENTS_VERSION' ) ) || $memberlite_loop_images == 'show_thumbnail' ) {
		the_post_thumbnail(
			'medium',
			array(
				'class' => 'alignright',
			)
		);
	}
		?>
	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<blockquote class="quote">
			<?php
				$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );
				if ( $content_archives == 'excerpt' ) {
					memberlite_the_excerpt();
				} else {
					memberlite_more_content();
				}
			?>
			<cite>&mdash;<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></cite>
		</blockquote>
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
