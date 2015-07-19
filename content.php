<?php
/**
 * @package Member Lite 2.0
 */
global $memberlite_defaults;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images',$memberlite_defaults['memberlite_loop_images'] ); 
		if($memberlite_loop_images == 'show_both' || $memberlite_loop_images == 'show_banner')
		{		
			if(memberlite_getPostThumbnailWidth($post->ID) > '740')
			{
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner'); ?>
				<div class="entry-banner" style="background-image: url('<?php echo esc_attr($thumbnail[0]);?>');"><?php
			}
			elseif($memberlite_loop_images != 'show_banner')
				the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
		}
		elseif($memberlite_loop_images == ('show_thumbnail'))
			the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
		?>
		<header class="entry-header">
			<?php $author_id = $post->post_author; ?>
			<div class="post_author_avatar"><?php echo get_avatar( $author_id, 80 ); ?></div>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php memberlite_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	<?php		
		if(($memberlite_loop_images == 'show_both' || $memberlite_loop_images == 'show_banner') && memberlite_getPostThumbnailWidth($post->ID) > '740')
		{
			?>
			</div> <!-- .entry-banner -->
			<?php
		}
	?>

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

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'memberlite' ) );
				if ( $categories_list && memberlite_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s.', 'memberlite' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'memberlite' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s.', 'memberlite' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'memberlite' ), __( '1 Comment', 'memberlite' ), __( '% Comments', 'memberlite' ) ); ?>.</span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->