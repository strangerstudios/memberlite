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

	<?php 
		$memberlite_get_entry_meta_after = memberlite_get_entry_meta($post, 'after'); 
		if(!empty($memberlite_get_entry_meta_after) || current_user_can( 'edit_post', $post->ID ) )
		{
			?>
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php if ( 'post' == get_post_type() ) : ?>
						<a href="<?php the_permalink(); ?>" rel="bookmark"><i class="fa fa-link"></i></a> |
						<?php echo $memberlite_get_entry_meta_after; ?>
					<?php endif; ?>
					<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
			</footer><!-- .entry-footer -->
			<?php 
		} 
	?>
</article><!-- #post-## -->