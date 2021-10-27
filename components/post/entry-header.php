<?php
/**
 * Displays the post entry header
 *
 * @package Memberlite
 */
?>

<?php
	global $memberlite_defaults;

if ( memberlite_should_show_banner_image() ) {
	$memberlite_get_banner_image_src = memberlite_get_banner_image_src( $post->ID, 'banner' );
}

if ( ! empty( $memberlite_get_banner_image_src ) ) {
	?>
		<div class="entry-banner" style="background-image: url('<?php echo esc_attr( $memberlite_get_banner_image_src[0] ); ?>'); ">
	<?php } ?>

	<?php
	$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images', $memberlite_defaults['memberlite_loop_images'] );
	if ( $memberlite_loop_images === 'show_thumbnail' ) {
		the_post_thumbnail(
			'thumbnail',
			array(
				'class' => 'alignright',
			)
		);
	}
	?>

	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				$author = get_userdata( $post->post_author );
				$memberlite_avatar_size = apply_filters( 'memberlite_avatar_size', 80 );
			?>
			<div class="post_author_avatar"><?php echo get_avatar( $author->ID, $memberlite_avatar_size, '', $author->display_name ); ?></div>
		<?php endif; ?>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php echo Memberlite_Customize::sanitize_text_with_links( memberlite_get_entry_meta( $post, 'before' ) ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( ! empty( $memberlite_get_banner_image_src ) ) { ?>
		</div><!--.entry-banner-->
	<?php } ?>
