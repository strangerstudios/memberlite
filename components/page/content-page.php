<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Memberlite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_page' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
					'after'  => '</div>',
				)
			);
		?>

		<?php
			// Start with global theme setting.
			$show_page_nav = (bool) get_theme_mod( 'memberlite_page_nav', 1 );

			// Check per-page override.
			if ( (bool) get_post_meta( get_the_ID(), '_memberlite_hide_page_nav', true ) ) {
				$show_page_nav = false;
			}

			if ( $show_page_nav ) {
				memberlite_page_nav();
			}
		?>

		<?php do_action( 'memberlite_after_content_page' ); ?>
	</div><!-- .entry-content -->
	<?php if ( ! empty( $post->post_type ) && current_user_can( 'edit_post', $post->ID ) ) { ?>
		<footer class="entry-footer">
			<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-## -->
