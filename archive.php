<?php get_header(); ?>
<div id="wrapper" class="css">
	<div id="content" class="blogposts">

		<?php if (have_posts()) : ?>

		<?php getBreadcrumbs(); ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post" id="post-<?php the_ID(); ?>">
			
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="p-date"><?php the_time('F j, Y') ?></div>
				
				<div class="posttext">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<div class="clear"></div>
				</div> <!-- end posttext -->
		
				<div class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit','',' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
				
			</div> <!-- end post -->
	
			<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
				<div class="clear"></div>
			</div> <!-- end navigation -->
		
			<?php else : ?>
			
			<div class="post page">
				<h2 class="pagetitle">Page Not Found</h2>
				<div class="pagetext">
					<p>
						<?php
							global $errorpage;
							getPostContent($errorpage);
						?>						
					</p>	
				</div> <!-- end pagetext -->
			</div> <!-- end post, page -->

		<?php endif; ?>
		
			<div class="clear"></div>
	
		</div> <!-- end content -->
	
		<?php get_sidebar(); ?>
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
