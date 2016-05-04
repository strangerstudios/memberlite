<?php
/**
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark" target="_blank"><i class="fa fa-external-link"></i>&nbsp;', esc_url( memberlite_get_link_url() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	<footer class="entry-footer">
		<div class="entry-meta">
			<?php echo memberlite_get_entry_meta($post, 'before'); ?>
			<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->