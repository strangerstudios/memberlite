<?php
/**
 * Displays the post author block
 *
 * @package Memberlite
 */
?>
<div class="entry-author">
	<?php
		$memberlite_avatar_size = apply_filters( 'memberlite_avatar_size', 80 );
	?>
	<div class="post_author_avatar">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), $memberlite_avatar_size, '', get_the_author_meta( 'display_name' ) ); ?>
	</div><!--.post_author_avatar-->
	<div class="post_author_details">
		<p class="post_author_name"><?php printf( esc_html__( 'Author: %s', 'memberlite' ), '<span class="vcard">' .get_the_author_meta( 'display_name' ) . '</span>' ); ?></p>
		<p class="post_author_description"><?php the_author_meta( 'description' ); ?></p>
	</div><!--.post_author_details-->
</div><!--.entry-author-->
