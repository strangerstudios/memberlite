<?php
/**
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark"><i class="fa fa-video-camera"></i>&nbsp;', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
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
		<?php echo memberlite_get_entry_meta($post, 'after'); ?>

		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->