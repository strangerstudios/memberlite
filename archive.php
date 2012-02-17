<?php get_header(); ?>
<div id="wrapper" class="css">
	<div id="content" class="blogposts">

		<?php if (have_posts()) : ?>

		<?php getBreadcrumbs(); ?>
		
		<div class="introtext">					
			<h1>
			<?php
				$post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
				<?php /* If this is a category archive */ if (is_category()) { single_cat_title(); ?>
			
				<?php /* If this is a daily archive */ } elseif (is_tag()) { ?><?php single_tag_title(); ?>
		
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>Posted on <?php the_time('F jS, Y'); ?>
			
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>Posted in <?php the_time('F, Y'); ?>
				
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>Posted in <?php the_time('Y'); ?>
			
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			
				<?php						
					if(get_query_var('author_name')) :
						$curauth = get_user_by('slug', get_query_var('author_name'));
					else :
						$curauth = get_userdata(get_query_var('author'));
					endif;
					?>
					Articles by <?php echo $curauth->display_name; 
				}
			?>
			</h1>
			<?php 
				if(is_tag()) 
				{
					$tag = single_tag_title("",false);
					$description = 'Articles tagged \'' . $tag . '\'';
				}
				else
					$description = category_description( get_category_by_slug('category-slug')->term_id ); 
	
				if($description)
				{
					echo wpautop($description);
				}
					
				
				if($curauth->user_description)
				{
					echo wpautop($curauth->user_description);
				}
			?>
		</div> <!-- end intro -->
		
		<?php while (have_posts()) : the_post(); ?>
		
			<article class="post single" id="post-<?php the_ID(); ?>">
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<div class="entry-meta">By <?php the_author_posts_link(); ?> on <strong><?php the_time('F j, Y') ?></strong> at <?php the_time() ?><?php edit_post_link('Edit',' | ',''); ?></div>
				</header>
		
				<div class="entry-content">
					<?php the_excerpt('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		
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
				
				<?php edit_post_link('Edit this entry.','',''); ?>
	
			</article> <!-- end article -->	
			
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
