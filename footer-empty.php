<?php
/**
 * The template for displaying the empty footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Memberlite
 */
?>
		
<?php do_action( 'memberlite_after_content' ); ?>

	</div><!-- #page -->

<?php do_action( 'memberlite_after_page' ); ?>

<?php wp_footer(); ?>

</body>
</html>
