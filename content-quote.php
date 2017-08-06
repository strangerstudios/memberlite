<?php
/**
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		global $memberlite_defaults;
		$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images',$memberlite_defaults['memberlite_loop_images'] ); 
		if($memberlite_loop_images == 'show_both' || $memberlite_loop_images == 'show_thumbnail')
			the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
		?>
	<div class="entry-content">
		<blockquote class="quote">
			<?php the_content( __( 'Continue Reading', 'memberlite' ) ); ?>
			<cite>&mdash;<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></cite>
		</blockquote>
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