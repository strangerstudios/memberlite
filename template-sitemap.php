<?php 
/*
Template Name: Page - Site Map
*/
	function after_the_content()
	{		
		?>								
		<ul>
			<?php 
				global $exclude;
				wp_list_pages('title_li=&exclude=' . $exclude . ''); 
			?>
		</ul>
		<?php
	}
	require(dirname(__FILE__) . "/page.php");
?>