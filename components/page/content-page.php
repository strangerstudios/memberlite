<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="entry-content">
		<?php do_action('before_content_page'); ?>
		<?php
			the_content(); 
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			) );
		?>
		
		<?php 
			$memberlite_page_nav = get_theme_mod( 'memberlite_page_nav', 1 );
			if( !empty( $memberlite_page_nav ) && !is_page_template('templates/fluid-width.php') )
				memberlite_page_nav();
		?>
		
		<?php do_action('after_content_page'); ?>
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
