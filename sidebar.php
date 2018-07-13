<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Memberlite
 */
?>

<?php do_action( 'memberlite_before_sidebar' ); ?>

<div id="secondary" class="medium-<?php echo esc_attr( memberlite_getColumnsRatio( 'sidebar' ) ); ?> columns widget-area" role="complementary">

<?php do_action( 'memberlite_before_sidebar_widgets' ); ?>

<?php
	$widget_areas = memberlite_get_widget_areas();
foreach ( $widget_areas as $widget_area ) {
	// memberlite_nav_menu_submenu is not a real widget area, load the function instead
	if ( $widget_area === 'memberlite_nav_menu_submenu' ) {
		memberlite_nav_menu_submenu();
	} else {
		dynamic_sidebar( $widget_area );
	}
}
?>

<?php do_action( 'memberlite_after_sidebar_widgets' ); ?>

</div><!-- #secondary -->

<?php do_action( 'memberlite_after_sidebar' ); ?>
