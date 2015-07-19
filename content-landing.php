<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Member Lite 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php
			$landing_page_level = get_post_meta($post->ID,'landing_page_level',true);
			echo do_shortcode('[pmpro_button level="' . $landing_page_level . '"]'); 
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
