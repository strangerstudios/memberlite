<?php
/**
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content lead">
		<?php $author_id = $post->post_author; ?>
		<div class="post_author_avatar"><?php echo get_avatar( $author_id, 80 ); ?></div>
		<?php the_content( __( 'Continue Reading', 'memberlite' ) ); ?>
		<div class="clear"></div>
	</div><!-- .entry-content -->
		<footer class="entry-footer">
		<div class="entry-meta">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><i class="fa fa-link"></i></a> |
			<?php echo memberlite_get_entry_meta($post, 'before'); ?>
			<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->