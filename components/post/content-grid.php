<?php
/**
 * Template part for displaying grid-style posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Memberlite
 */
?>

<?php global $memberlite_defaults; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	<a class="post-thumbnail-link" href="<?php echo esc_url( get_permalink() ); ?>">
		<?php
			$attachment_id = get_post_thumbnail_id( get_the_ID() );
			$memberlite_get_banner_image = memberlite_get_banner_image( $attachment_id, 'large', '', array( 'class' => 'aligncenter' ), get_the_ID() );
			if ( ! empty( $memberlite_get_banner_image ) ) {
				// NOTE: The HTML is generated and escaped by the wp_get_attachment_image() function /inc/extras.php.
				echo $memberlite_get_banner_image;
			} else { ?>
				<div class="post-thumbnail-empty"><i class="fas fa-file-alt"></i></div>
			<?php }
		?>
	</a>
	<?php get_template_part( 'components/post/entry', 'header' ); ?>

	<div class="entry-content">
		<?php do_action( 'memberlite_before_content_post' ); ?>
		<?php do_action( 'memberlite_after_content_post' ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
