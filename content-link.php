<?php
/**
 * @package Member Lite 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark" target="_blank"><i class="fa fa-external-link"></i>&nbsp;', esc_url( memberlite_get_link_url() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php memberlite_posted_on(); ?>
			<?php edit_post_link( __( 'Edit', 'memberlite' ), '. <span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->