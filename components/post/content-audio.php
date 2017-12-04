<?php
/**
 * Template part for displaying audio posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'components/post/entry', 'header' ); ?>
	<div class="entry-content">
		<?php 
			$content_archives = get_theme_mod('content_archives'); 
			if($content_archives == 'excerpt')
				the_excerpt();
			else
				the_content( __( 'Continue Reading', 'memberlite' ) ); 
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			) );
		?>
		<div class="clear"></div>
	</div><!-- .entry-content -->
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