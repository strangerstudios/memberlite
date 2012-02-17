<?php get_header(); ?>
<div id="wrapper" class="css">
	<div id="content" class="blogposts">
	
		<?php if (have_posts()) : ?>
		
			<?php getBreadcrumbs(); ?>

			<?php while (have_posts()) : the_post(); ?>
				
			<article class="post single" id="post-<?php the_ID(); ?>">
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<div class="entry-meta">
						By <?php the_author_posts_link(); ?> on <strong><?php the_time('F j, Y') ?></strong> at <?php the_time() ?>. <?php comments_popup_link( 'No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?><?php edit_post_link('Edit',' | ',''); ?>
						<div class="clear"></div>
					</div>
				</header>
		
				<div class="entry-content">
					<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div> <!-- end posttext -->
		
				<footer class="entry-meta">
					<?php
						/* translators: used between list items, there is a space after the comma */
						$tag_list = get_the_tag_list( '', __( ', ') );
						if ( '' != $tag_list ) {
							$utility_text = __( 'Posted in %1$s. Tagged %2$s');
						} else {
							$utility_text = __( 'Posted in %1$s');
						}
						printf(
							$utility_text,
							/* translators: used between list items, there is a space after the comma */
							get_the_category_list( __( ', ') ),
							$tag_list,
							esc_url( get_permalink() ),
							the_title_attribute( 'echo=0' )
						);
					?>							
				</footer>								
			</article> <!-- end article -->	
	
			<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
				<div class="clear"></div>
			</div> <!-- end navigation -->
		
			<?php endif; ?>
		
			<div class="clear"></div>
	
		</div> <!-- end content -->
	
		<?php get_sidebar(); ?>
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
