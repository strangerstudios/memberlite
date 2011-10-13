<?php get_header(); ?>

<div id="wrapper">
	
	<div id="content" class="left content-1">
				
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php 
			global $breadcrumbs;
			if($breadcrumbs)
			{
			?>			
			<?php getBreadcrumbs(); ?>
			<?php
			}
		?>
	
			<div class="post single" id="post-<?php the_ID(); ?>">
				
				<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="p-date"><?php the_time('F j, Y') ?> at <?php the_time() ?></div>
		
				<div class="posttext">
					<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div> <!-- end posttext -->
		
				<div class="postmetadata">Posted in <?php the_category(', ') ?><?php edit_post_link('Edit this entry.',' | ',''); ?></div>
	
			</div> <!-- end post -->
			
			<?php comments_template(); ?>
		
		<?php endwhile; endif; ?>
		
			<div class="clear"></div>
	
		</div> <!-- end content -->
	
		<div id="sidebar" class="right sidebar-2">
			<?php get_sidebar(); ?>
		</div>
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
