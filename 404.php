<?php get_header(); ?>

	<div id="wrapper" class="css">
	
		<div id="content">
			
			<?php getBreadcrumbs(); ?>
 
			<div class="page">
				<h2 class="pagetitle">Page Not Found</h2>
				<div class="pagetext">
					<p>
						<?php
							global $errorpage;
							echo getPostContent($errorpage);
						?>					
					</p>	
				</div> <!-- end pagetext -->
			</div> <!-- end post, page -->
	
		</div> <!-- end content -->
	
		<?php get_sidebar(); ?>
	
		<div class="clear"></div>
		
	</div> <!-- end wrapper -->
	
<?php get_footer(); ?>
