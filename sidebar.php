		
        <div id="sidebar">					
			<?php   
				global $errorpage;
				if (is_404() || is_home() || is_search() || is_single() || is_category() || is_author() || is_archive() || is_day() || is_month() || is_year() || is_page($errorpage) ) 
				{
					//Sidebar for Blog
					dynamic_sidebar('Blog: Featured Sidebar'); ?>
					<div class="clear"></div>
					<div class="css-s-lcol">    
						<?php dynamic_sidebar('Blog: Column 1'); ?>
						<div class="clear"></div>
					</div> <!-- end css-s-lcol -->
					<div class="css-s-rcol">
						<?php dynamic_sidebar('Blog: Column 2'); ?>
						<div class="clear"></div>
					</div> <!-- end css-s-rcol -->				  
				<?php
				}
							  
				if(is_page())
				{			  
					if(is_page_template('template-contact.php') )
					{		
						//Sidebar for Right Column
						dynamic_sidebar('Page: Contact Sidebar');
					}
					
					if(is_page_template('template-rightsidebar.php') )
					{
						//Sidebar for Right Column
						dynamic_sidebar('Page: Right Sidebar');
					}				  
					else
					{
						global $post;
						if($post->post_parent) 
						{
							$exclude = get_post_meta($post->ID,'exclude',true);
							$pagemenuid = end($post->ancestors);
							$children = wp_list_pages('title_li=&child_of=' . $pagemenuid . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order');
							$titlenamer = get_the_title($pagemenuid);
							$titlelink = get_permalink($pagemenuid);
						}
						else 
						{
							$children = wp_list_pages('title_li=&child_of=' . $post->ID . '&exclude=' . $exclude . '&echo=0&sort_column=menu_order');
							$titlenamer = get_the_title($post->ID);
							$titlelink = get_permalink($post->ID);
						}
						if ($children) 
						{ ?>
							<div class="widget widget-submenu">
								<h3><a href="<?php echo $titlelink?>"><?php echo $titlenamer?></a></h3>
								<ul class="menu">				
									<?php echo $children; ?>
								</ul>
							</div> <!-- end widget -->
						<?php
						}						
						//Sidebar for Non-template Pages
						dynamic_sidebar('Page: Left Sidebar');
					}
				}
			?>
			<div class="clear"></div>
		</div> <!-- end sidebar-m -->
