<?php
/**
 * Displays the post entry header
 *
 * @package Memberlite
 */
?>

<?php
	global $memberlite_defaults;

	$memberlite_loop_images = get_theme_mod( 'memberlite_loop_images',$memberlite_defaults['memberlite_loop_images'] ); 
	if( $memberlite_loop_images == 'show_both' || $memberlite_loop_images == 'show_banner' ) {
		$banner_image_id = memberlite_getBannerImageID( $post );
		$banner_image_src = wp_get_attachment_image_src( $banner_image_id, 'banner' );
		if( !empty( $banner_image_src ) ) { ?>
			<div class="entry-banner" style="background-image: url('<?php echo esc_attr( $banner_image_src[0] ); ?>'); ">
		<?php }
	} elseif( $memberlite_loop_images == 'show_thumbnail' ) {
		the_post_thumbnail( 'thumbnail', array( 'class' => 'alignright' ) );
	} ?>

	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php $author_id = $post->post_author; ?>
			<div class="post_author_avatar"><?php echo get_avatar( $author_id, 80 ); ?></div>
		<?php endif; ?>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php echo memberlite_get_entry_meta($post, 'before'); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php if( !empty( $banner_image_src ) ) { ?>
		</div> <!-- .entry-banner -->
	<?php }
?>