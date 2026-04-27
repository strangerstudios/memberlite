<?php
/**
 * Template part for displaying the post entry footer.
 * Version: 7.0
 *
 * @version 7.0
 *
 * @package Memberlite
 */

global $post;
$memberlite_get_entry_meta_after = memberlite_get_entry_meta( $post, 'after' );

if ( ! empty( $memberlite_get_entry_meta_after ) || current_user_can( 'edit_post', $post->ID ) ) { ?>
	<footer class="entry-footer">
		<?php
		if ( get_post_type() == 'post' ) {
			echo Memberlite_Customize::sanitize_text_with_links( $memberlite_get_entry_meta_after ); // WPCS: xss ok.
		}
		?>
		<?php edit_post_link( '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
	<path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path>
	</svg>'. esc_html__( 'Edit Post', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
<?php } ?>
