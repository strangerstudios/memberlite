<?php get_header(); ?>

	<div id="wrapper">
	
		<div id="content" class="blogposts content-1 left">
	
		<?php
			global $searchpages;
			if(!$searchpages)
			{
				$posts = query_posts($query_string . '&post_type=post');
			}
		?>

		<?php if (have_posts()) : ?>

			<?php getBreadcrumbs(); ?>
	
			<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
			
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="p-date"><?php the_time('F j, Y') ?></div>
				
				<div class="posttext">
					<?php the_excerpt(); ?>
					<div class="clear"></div>
				</div> <!-- end posttext -->
		
				<div class="postmetadata">Posted in <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','',' <strong>|</strong> '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
				
			</div> <!-- end post -->
	
	
			<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
				<div class="clear"></div>
			</div> <!-- end navigation -->
		
		<?php else : ?>
			
			<?php 
				global $breadcrumbs;
				if($breadcrumbs)
				{
				?>	
				<p class="breadcrumbs">
					<a href="<?php echo get_option('home'); ?>/">Home</a>
					&raquo; No Search Results Found
				</p>
				<?php
				}
			?>
			
			<div class="post page">
				<h2 class="pagetitle">No Search Results Found</h2>
				<div class="pagetext">
					<p>Your search returned no results.</p>
					<p>Please try another search above or <a href="<?php echo get_option('home'); ?>/">visit the homepage</a> or visit our <a href="/site-map/">site map</a>.</p>	
				</div> <!-- end pagetext -->
			</div> <!-- end post, page -->

		<?php endif; ?>
		
			<div class="clear"></div>
	
		</div> <!-- end content -->
	
		<div id="sidebar" class="right sidebar-2">
			<?php get_sidebar(); ?>
		</div>
		
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
