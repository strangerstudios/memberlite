<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php
			global $pmproal_landing_page_level, $memberlite_landing_page_checkout_button;
			if(defined('PMPRO_VERSION') && !empty($pmproal_landing_page_level) && ($pmproal_landing_page_level != 'blank'))
				echo do_shortcode('[memberlite_btn style="action" href="' . pmpro_url('checkout','?level=' . $pmproal_landing_page_level,'https') . '" text="' . $memberlite_landing_page_checkout_button . '"]');
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php 
		if( current_user_can( 'edit_post', $post->ID ) ) 
		{
			?>
			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
			<?php
		}
	?>
</article><!-- #post-## -->
