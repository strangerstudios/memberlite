<?php
/**
 * Template part for displaying single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<?php global $memberlite_defaults; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	<div class="entry-content">
		<?php // NOTE: The title is generated in header.php via the memberlite_page_title() function found in functions.php ?>
		<?php do_action( 'memberlite_before_content_single' ); ?>
		<?php
		if ( get_post_format() == 'image' ) {
			the_post_thumbnail(
				'memberlite-fullwidth',
				array(
					'class' => 'aligncenter',
				)
			);
		}
		?>

		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
					'after'  => '</div>',
				)
			);
		?>
		<?php
			$author_block = get_theme_mod( 'author_block', $memberlite_defaults['author_block'] );
			if ( ! empty( $author_block ) ) {
				get_template_part( 'components/post/entry', 'author-block' );
			}
		?>
		<?php do_action( 'memberlite_after_content_single' ); ?>
	</div><!-- .entry-content -->
	<?php
		$memberlite_get_entry_meta_after = memberlite_get_entry_meta( $post, 'after' );
		if ( ! empty( $memberlite_get_entry_meta_after ) || current_user_can( 'edit_post', $post->ID ) ) { ?>
			<footer class="entry-footer">
				<?php
				if ( 'post' == get_post_type() ) {
					echo Memberlite_Customize::sanitize_text_with_links( $memberlite_get_entry_meta_after );
				}
				?>
				<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-## -->
