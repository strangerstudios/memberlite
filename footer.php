	
	</div></div> <!-- end width, end w-wrapper -->

	<div id="w-footer"><div class="width"><div id="footer">
		<?php if (!dynamic_sidebar('Footer: Column 1')) : ?>
			<div class="pmpro-widget fcol fcol1">
				<h3>Footer: Column 1 Widget</h3>
				<p>This is a widgeted area called Footer: Column 1. To modify, log in to your WordPress dashboard then go to the Appearance > Widgets screen. There you can update this section with the content of your choice.</p>
				<div class="clear"></div>
			</div> <!-- end fcol1 -->
		<?php endif; ?>
			
		<?php if (!dynamic_sidebar('Footer: Column 2')) : ?>
			<div class="pmpro-widget fcol fcol2">
				<h3>Footer: Column 2 Widget</h3>
				<p>This is a widgeted area called Footer: Column 2. To modify, log in to your WordPress dashboard then go to the Appearance > Widgets screen. There you can update this section with the content of your choice.</p>
				<div class="clear"></div>
			</div> <!-- end fcol1 -->
		<?php endif; ?>
		
		<?php if (!dynamic_sidebar('Footer: Column 3')) : ?>
			<div class="pmpro-widget fcol fcol3">
				<h3>Footer: Column 3 Widget</h3>
				<p>This is a widgeted area called Footer: Column 3. To modify, log in to your WordPress dashboard then go to the Appearance > Widgets screen. There you can update this section with the content of your choice.</p>
				<div class="clear"></div>
			</div> <!-- end fcol1 -->
		<?php endif; ?>
		
		<?php if (!dynamic_sidebar('Footer: Column 4')) : ?>
			<div class="pmpro-widget fcol fcol4">
				<h3>Footer: Column 4 Widget</h3>
				<p>This is a widgeted area called Footer: Column 41. To modify, log in to your WordPress dashboard then go to the Appearance > Widgets screen. There you can update this section with the content of your choice.</p>
				<div class="clear"></div>
			</div> <!-- end fcol1 -->
		<?php endif; ?>
		
		<div class="clear"></div>
	</div></div></div> <!-- end footer, end width, end w-footer -->	
       
    <div id="w-base"><div class="width"><div id="base">
        <?php dynamic_sidebar('Footer'); ?>

		<div class="clear"></div>

		<a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/GPL-v2.png" class="left" width="165" height="30" border="0" alt="GPL v2" /></a>
		<p>&copy; <?php echo date("Y") ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
        <p><?php bloginfo('name'); ?> is Proudly Powered by  <a href="https://wordpress.org" target="_blank">WordPress</a> and <a href="https://www.paidmembershipspro.com" target="_blank">Paid Memberships Pro</a>.</p>

		<div class="clear"></div>
	
	</div></div></div> <!-- end base, end width, end w-base -->
	
</div> <!-- end page -->
</div> <!-- end w-body -->
<?php wp_footer(); ?>

</body>
</html>