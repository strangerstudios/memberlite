	
	</div></div> <!-- end width, end w-wrapper -->

	<div id="w-footer"><div class="width"><div id="footer">
		<div class="fcol fcol1">
			<?php dynamic_sidebar('Footer: Column 1'); ?>			
		</div>
		<div class="fcol fcol2">
			<?php dynamic_sidebar('Footer: Column 2'); ?>				
		</div>
		<div class="fcol fcol3">
			<?php dynamic_sidebar('Footer: Column 3'); ?>
		</div>
		<div class="fcol fcol4">
			<?php dynamic_sidebar('Footer: Column 4'); ?>
		</div>
		<div class="clear"></div>
	</div></div></div> <!-- end footer, end width, end w-footer -->	
       
    <div id="w-base"><div class="width"><div id="base">
		<?php dynamic_sidebar('Base: Left Column'); ?>
		<p>&copy; <?php echo date("Y") ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
        <p><?php bloginfo('name'); ?> is Proudly Powered by  <a href="https://wordpress.org" target="_blank">WordPress</a> and <a href="https://www.paidmembershipspro.com" target="_blank">Paid Memberships Pro</a>.</p>
		<div class="clear"></div>	
	</div></div></div> <!-- end base, end width, end w-base -->
	
</div> <!-- end page -->
</div> <!-- end w-body -->
<?php wp_footer(); ?>

</body>
</html>