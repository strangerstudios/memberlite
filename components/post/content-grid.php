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
			if ( has_post_thumbnail() && ! empty( get_the_post_thumbnail() ) ) {
				the_post_thumbnail( 'large', array( 'class' => 'aligncenter' ) );
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
