<?php
/**
 * Template part for displaying the post entry footer.
 * Version: TBD
 *
 * @version TBD
 *
 * @package Memberlite
 */

$memberlite_get_entry_meta_after = memberlite_get_entry_meta( $post, 'after' );

if ( ! empty( $memberlite_get_entry_meta_after ) || current_user_can( 'edit_post', $post->ID ) ) { ?>
	<footer class="entry-footer">
		<?php
		if ( 'post' == get_post_type() ) {
			echo Memberlite_Customize::sanitize_text_with_links( $memberlite_get_entry_meta_after ); // WPCS: xss ok.
		}
		?>
		<?php edit_post_link( esc_html__( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
<?php } ?>
