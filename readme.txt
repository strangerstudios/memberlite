General Settings:
- Open "includes/settings.php" to edit general theme formats.

Mini Navigation Bar:
- To include menu items in the mini navigation, add a custom field to the page with the key "mainmenu". The value of this field should be 'true'.

Top Navigation Bar:
- To include menu items in the top navigation, add a custom field to the page with the key "mainmenu". The value of this field should be 'true'.

Footer Navigation Bar:
- To include menu items in the footer navigation, add a custom field to the page with the key "footermenu". The value of this field should be 'true'.

Site Map Rules:
- To add a site map, create a page and set the template to "Site Map"
- To exclude pages from your site map, create a custom field on the page to be excluded with the key "hide". The value of this field should be true.

Customizing the 404 Error Page Content 
- Set the $errorpage variable to the ID of the page that contains your 404 text. Be sure to add the custom field "hide" to the error mesage page so it doesn't show up within the site map.