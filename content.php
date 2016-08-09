<?php
/**
 * @package Memberlite
 */
global $memberlite_defaults;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images',$memberlite_defaults['memberlite_loop_images'] ); 
		if($memberlite_loop_images == 'show_both' || $memberlite_loop_images == 'show_banner')
		{
			$banner_image_id = memberlite_getBannerImageID($post);
			$banner_image_src = wp_get_attachment_image_src( $banner_image_id, 'banner');
			if(!empty($banner_image_src))
			{
				?>
				<div class="entry-banner" style="background-image: url('<?php echo esc_attr($banner_image_src[0]);?>');">
				<?php
			}
		}
		elseif($memberlite_loop_images == 'show_thumbnail')
			the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
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
		if(!empty($banner_image_src))
		{
			?>
			</div> <!-- .entry-banner -->
			<?php
		}
	?>

	<div class="entry-content">
		<?php
			if($memberlite_loop_images == 'show_both')
			{
				the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
			}
		?>
		<?php 
			$content_archives = get_theme_mod('content_archives'); 
			if($content_archives == 'excerpt')
				the_excerpt();
			else
				the_content(); 
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			) );
		?>
		<div class="clear"></div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide meta text for pages on Search ?>
			<?php echo memberlite_get_entry_meta($post, 'after'); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->