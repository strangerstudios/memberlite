<?php
/**
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark" target="_blank"><i class="fa fa-external-link"></i>&nbsp;', esc_url( memberlite_get_link_url() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	<?php 
		$memberlite_get_entry_meta_after = memberlite_get_entry_meta($post, 'after'); 
		if(!empty($memberlite_get_entry_meta_after) || current_user_can( 'edit_post', $post->ID ) )
		{
			?>
			<footer class="entry-footer">
				<?php if ( 'post' == get_post_type() ) : 
					echo $memberlite_get_entry_meta_after; 
				endif; ?>
				<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
			<?php
		}
	?>
</article><!-- #post-## -->