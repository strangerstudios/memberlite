<?php
/**
 * Template part for displaying the entry header on posts.
 * Version: 7.0
 *
 * @version 7.0
 *
 * @package Memberlite
 */

global $memberlite_defaults, $post;
$content_archives = get_theme_mod( 'content_archives', $memberlite_defaults['content_archives'] );

if ( $content_archives != 'grid' || is_search() ) {
	if ( memberlite_should_show_banner_image() ) {
		$memberlite_get_banner_image_src = memberlite_get_banner_image_src( $post->ID, 'banner' );
	}

	if ( ! empty( $memberlite_get_banner_image_src ) ) { ?>
		<div class="entry-banner">
			<img class="banner-image" src="<?php echo esc_url( $memberlite_get_banner_image_src[0] ); ?>" alt="" aria-hidden="true" />
	<?php } ?>

<?php } ?>

<header class="entry-header">
	<?php
		$author_avatar_allowed_html = array(
			'div' => array(
				'class' => array(),
			),
			'img' => array(
				'alt' => array(),
				'class' => array(),
				'height' => array(),
				'loading' => array(),
				'src' => array(),
				'title' => array(),
				'width' => array()
			),
			'noscript' => array()
		);
		$author_avatar = memberlite_get_author_avatar( $post->post_author );
		echo empty( $author_avatar ) ? '' : wp_kses( $author_avatar, $author_avatar_allowed_html );
	?>
	<div class="entry-header-content">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php echo Memberlite_Customize::sanitize_text_with_links( memberlite_get_entry_meta( $post, 'before' ) );  // WPCS: xss ok. ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</div> <!-- .entry-header-content -->
</header><!-- .entry-header -->

<?php if ( ! empty( $memberlite_get_banner_image_src ) ) { ?>
	</div><!--.entry-banner-->
<?php } ?>
