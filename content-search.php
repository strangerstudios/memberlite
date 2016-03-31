<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php		
		if(memberlite_getPostThumbnailWidth($post->ID) > '740')
		{
			//get src of thumbnail
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner');			
			?>
			<div class="entry-banner" style="background-image: url('<?php echo esc_attr($thumbnail[0]);?>');">
			<?php
		}
		else
		{
			?>
			<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
		}
	?>
		<header class="entry-header">
			<?php if ( 'post' == get_post_type() ) : ?>
				<?php $author_id = $post->post_author; ?>
				<div class="post_author_avatar"><?php echo get_avatar( $author_id, 80 ); ?></div>
			<?php endif; ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php echo memberlite_get_entry_meta($post, 'before'); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	<?php		
		if(memberlite_getPostThumbnailWidth($post->ID) > '740')
		{
			?>
			</div> <!-- .entry-banner -->
			<?php
		}
	?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<div class="clear"></div>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide meta text for pages on Search ?>
			<?php echo memberlite_get_entry_meta($post, 'after'); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
