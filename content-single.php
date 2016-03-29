<?php
/**
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php //NOTE: The title is generated in header.php via the memberlite_page_title() function found in functions.php ?>
		<?php do_action('before_content_single'); ?>
		
		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			) );
		?>
		<?php do_action('after_content_single'); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo memberlite_get_entry_meta($post, 'after'); ?>

		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
