<?php
/**
 * @package Member Lite 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php 
			$content_archives = get_theme_mod('content_archives'); 
			if($content_archives == 'excerpt')
				the_excerpt();
			else
				the_content( __( 'Continue Reading', 'memberlite' ) ); 
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'memberlite' ),
				'after'  => '</div>',
			) );
		?>
		<p><a href="<?php the_permalink(); ?>" rel="bookmark"><i class="fa fa-link"></i></a></p>
		<div class="clear"></div>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php memberlite_posted_on(); ?>	
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'memberlite' ) );
				if ( $categories_list && memberlite_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'in %1$s.', 'memberlite' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'memberlite' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s.', 'memberlite' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'memberlite' ), __( '1 Comment', 'memberlite' ), __( '% Comments', 'memberlite' ) ); ?>.</span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'memberlite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->