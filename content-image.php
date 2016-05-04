<?php
/**
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark"><i class="fa fa-file-image-o"></i>&nbsp;', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_post_thumbnail( 'fullwidth', array( 'class' => 'aligncenter' ) ); ?>
		<div class="clear"></div>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide meta text for pages on Search ?>
			<?php echo memberlite_get_entry_meta($post, 'after'); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->