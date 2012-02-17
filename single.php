<?php get_header(); ?>

<div id="wrapper" class="css">
	<div id="content">
				
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php getBreadcrumbs(); ?>
		
		<article class="post single" id="post-<?php the_ID(); ?>">
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry-meta">By <?php the_author_posts_link(); ?> on <strong><?php the_time('F j, Y') ?></strong> at <?php the_time() ?></div>
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
						$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.');
					} else {
						$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.');
					}
					printf(
						$utility_text,
						/* translators: used between list items, there is a space after the comma */
						get_the_category_list( __( ', ') ),
						$tag_list,
						esc_url( get_permalink() ),
						the_title_attribute( 'echo=0' ),
						get_the_author(),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
					);
				?>							
			</footer>
			
			<?php edit_post_link('Edit this entry.','',''); ?>

		</article> <!-- end article -->
		
			<?php comments_template(); ?>
		
		<?php endwhile; endif; ?>
		
			<div class="clear"></div>
	
		</div> <!-- end content -->
	
		<?php 
			global $pmprot_sidebar_class;
			$pmprot_sidebar_class = "right sidebar-2";
			get_sidebar(); 
		?>
		
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
