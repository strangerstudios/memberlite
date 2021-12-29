<?php
/**
 * Template part for displaying grid-style posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<?php global $memberlite_defaults; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	<a href="<?php echo esc_url( get_permalink() ); ?>">
		<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large', array( 'class' => 'aligncenter' ) );
			}
		?>
	</a>
	<?php get_template_part( 'components/post/entry', 'header' ); ?>

	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<?php do_action( 'memberlite_after_content_post' ); ?>
	</div><!-- .entry-content -->

	<?php /*
	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide meta text for pages on Search ?>
			<?php echo Memberlite_Customize::sanitize_text_with_links( memberlite_get_entry_meta( $post, 'after' ) ); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	*/ ?>
</article><!-- #post-## -->
