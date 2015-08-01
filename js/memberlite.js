/**
 * memberlite.js
 */
jQuery( document ).ready(function() {
  jQuery('.memberlite_tabbable .memberlite_tabs li a').click(function(e) {
  
	//don't want to jump to #
	e.preventDefault();
	
	//which tab was clicked
	var tab, tabarea;
	tab = jQuery(this).attr('href').replace(/#/, '');
	tabarea = jQuery(this).closest('.memberlite_tabbable');
	console.log(tab);
	
	//hide all tab panes
	tabarea.find('.memberlite_tab_pane').hide();
	tabarea.find('.memberlite_tab_pane').removeClass('memberlite_active');
	
	//show the active one
	jQuery('#' + tab).show();
	jQuery('#' + tab).addClass('memberlite_active');
	
	//unstyle tabs
	tabarea.find('.memberlite_tabs li').removeClass('memberlite_active');
	
	//highlight the active one
	jQuery(this).closest('li').addClass('memberlite_active');
  
  });  
});