<?php
/**
 * Custom meta boxes
 *
 * @package Memberlite
 */

/* Adds a Memberlite settings meta box to the side column on the Page edit screens. */
function memberlite_settings_add_meta_box() {
	$screens = array('page');

	foreach ($screens as $screen) {
		add_meta_box(
			'memberlite_settings_section',
			__('Memberlite Settings', 'memberlite'),
			'memberlite_settings_meta_box_callback',
			$screen,
			'normal',
			'high'
		);
	}
}
add_action('add_meta_boxes', 'memberlite_settings_add_meta_box');

/* Meta box for Memberlite settings */
function memberlite_settings_meta_box_callback($post) {

	global $fontawesome_icons;
	wp_nonce_field('memberlite_settings_meta_box', 'memberlite_settings_meta_box_nonce');

	$memberlite_page_template = get_post_meta($post->ID, '_wp_page_template', true);
	$memberlite_banner_show = get_post_meta($post->ID, '_memberlite_banner_show', true);

	if($memberlite_banner_show === '') {
		$memberlite_banner_show = 1;		//we want to default to showing if this has never been set
	}

    $memberlite_page_icon = get_post_meta($post->ID, '_memberlite_page_icon', true);
	$memberlite_banner_desc = get_post_meta($post->ID, '_memberlite_banner_desc', true);
	$memberlite_banner_hide_title = get_post_meta($post->ID, '_memberlite_banner_hide_title', true);
	$memberlite_banner_hide_breadcrumbs = get_post_meta($post->ID, '_memberlite_banner_hide_breadcrumbs', true);
	$memberlite_banner_extra_padding = get_post_meta($post->ID, '_memberlite_banner_extra_padding', true);
	$memberlite_banner_right = get_post_meta($post->ID, '_memberlite_banner_right', true);
	$memberlite_banner_icon = get_post_meta($post->ID, '_memberlite_banner_icon', true);
	$memberlite_banner_bottom = get_post_meta($post->ID, '_memberlite_banner_bottom', true);
	$memberlite_landing_page_checkout_button = get_post_meta($post->ID, '_memberlite_landing_page_checkout_button', true);
	$pmproal_landing_page_level = get_post_meta($post->ID, '_pmproal_landing_page_level', true);
	$memberlite_landing_page_upsell = get_post_meta($post->ID, '_memberlite_landing_page_upsell', true);
	?>

	<h3><?php _e('Page Banner Settings', 'memberlite')?></h3>

	<p><strong><?php _e('Show Page Banner', 'memberlite') ?></strong>
        <em><?php _e ('Disable the entire page banner for this content.', 'memberlite') ?></em><br />
	    <label class="screen-reader-text" for="memberlite_banner_show"><?php _e('Show Page Banner', 'memberlite') ?></label>
	    <input class="widefat" type="radio" name="memberlite_banner_show" value="1" <?php checked( $memberlite_banner_show, 1) ?>><?php _e('Yes', 'memberlite') ?>
        <input class="widefat" type="radio" name="memberlite_banner_show" value="0" <?php checked( $memberlite_banner_show, 0) ?>><?php _e('No', 'memberlite') ?>
    </p>

    <div class="wrap" id="memberlite_top_banner_settings_wrapper">
		<p>
            <strong><?php _e('Banner Description', 'memberlite') ?></strong>
		    <em><?php _e ('Shown in the masthead banner below the page title.', 'memberlite') ?></em>
            <?php if( ($memberlite_page_template == 'templates/landing.php') && function_exists('pmpro_getAllLevels')) : ?>
                <em><?php _e('Leave blank to show landing page level description as banner description', 'memberlite') ?></em>
            <?php endif ?>
	    </p>
        <label class="screen-reader-text" for="memberlite_banner_desc"><?php _e('Banner Description', 'memberlite') ?></label>
        <textarea class="large-text" rows="3" id="memberlite_banner_desc" name="memberlite_banner_desc"><?php echo esc_textarea( $memberlite_banner_desc ) ?></textarea>
        <input type="hidden" name="memberlite_banner_hide_title_present" value="1" />
        <label for="memberlite_banner_hide_title" class="selectit">
            <input name="memberlite_banner_hide_title" type="checkbox" id="memberlite_banner_hide_title" value="1" <?php checked( $memberlite_banner_hide_title, 1) ?>><?php  _e('Hide Page Title on Single View', 'memberlite') ?>
        </label>
        <input type="hidden" name="memberlite_banner_hide_breadcrumbs_present" value="1" />

        <label for="memberlite_banner_hide_breadcrumbs" class="selectit">
            <input name="memberlite_banner_hide_breadcrumbs" type="checkbox" id="memberlite_banner_hide_breadcrumbs" value="1" <?php checked( $memberlite_banner_hide_breadcrumbs, 1) ?>><?php _e('Hide Breadcrumbs', 'memberlite') ?>
        </label>
        <input type="hidden" name="memberlite_banner_extra_padding_present" value="1" />

        <label for="memberlite_banner_extra_padding" class="selectit"><input name="memberlite_banner_extra_padding" type="checkbox" id="memberlite_banner_extra_padding" value="1" <?php checked( $memberlite_banner_extra_padding, 1 ) ?>><?php _e('Add Extra Banner Padding', 'memberlite') ?>
        </label>

        <p><strong><?php _e('Banner Right Column', 'memberlite') ?></strong>
            <em><?php _e('Right side of the masthead banner. (i.e. Video Embed, Image or Action Button)', 'memberlite') ?></em>
        </p>

        <label class="screen-reader-text" for="memberlite_banner_right"><?php _e('Banner Right Column', 'memberlite')?></label>
        <textarea class="large-text" rows="3" id="memberlite_banner_right" name="memberlite_banner_right"><?php echo esc_textarea($memberlite_banner_right) ?></textarea>


	<p><strong><?php _e('Page Bottom Banner', 'memberlite') ?></strong>
        <em><?php _e('Banner shown above footer on pages. (i.e. call to action)', 'memberlite')?></em>
    </p>

	<label class="screen-reader-text" for="memberlite_banner_bottom"><?php _e('Page Bottom Banner', 'memberlite') ?></label>

    <textarea class="large-text" rows="3" id="memberlite_banner_bottom" name="memberlite_banner_bottom"><?php echo esc_textarea($memberlite_banner_bottom) ?></textarea>
    </div>
	<div class="wrap">
	<p><strong><?php _e('Page Icon', 'memberlite') ?></strong>
	    <label class="screen-reader-text" for="memberlite_page_icon"><?php _e('Select Icon', 'memberlite') ?></label>

	    <select id="memberlite_page_icon" name="memberlite_page_icon">
			<option value="blank" <?php selected( $memberlite_page_icon, "blank" ) ?>><?php _e('- Select -', 'memberlite') ?></option>
			<?php foreach($fontawesome_icons as $fontawesome_icon) : ?>
				<option value="<?php echo $fontawesome_icon ?>" <?php selected( $memberlite_page_icon, $fontawesome_icon ) ?>><?php echo $fontawesome_icon ?></option>
			<?php endforeach ?>
	    </select>
    </p>
	<input type="hidden" name="memberlite_banner_icon_present" value="1" />
	<p><label for="memberlite_banner_icon" class="selectit">
            <input name="memberlite_banner_icon" type="checkbox" id="memberlite_banner_icon" value="1" <?php checked( $memberlite_banner_icon, 1) ?>><?php _e('Show Icon in Banner Title', 'memberlite') ?></label>
    </p>
    </div>
	<?php if(($memberlite_page_template == 'templates/landing.php') && function_exists('pmpro_getAllLevels')) : ?>

		<h3><?php  _e('Landing Page Settings', 'memberlite') ?></h3>
		<?php $membership_levels = pmpro_getAllLevels();

		if ( empty( $membership_levels ) ) : ?>
			<div class="inline notice error">
                <p><a href="<?php echo admin_url('admin.php?page=pmpro-membershiplevels') ?>"><?php _e('Add a Membership Level to Use These Landing Page Features', 'memberlite') ?></a></p>
            </div>
		<?php else : ?>
			<div class="wrap form-table">
                <p><strong><?php _e('Membership Level', 'memberlite') ?></strong>
                    <label class="screen-reader-text" for="pmproal_landing_page_level"><?php _e('Landing Page Membership Level', 'memberlite') ?></label>
                    <select id="pmproal_landing_page_level" name="pmproal_landing_page_level">
                    <option value="blank" <?php selected( $pmproal_landing_page_level, 'blank' ) ?>><?php _e('- Select -', 'memberlite') ?></option>
                    <?php foreach($membership_levels as $level) : ?>
                        <option value="<?php echo $level->id ?>"<?php selected( $pmproal_landing_page_level, $level->id ) ?>><?php echo $level->name ?></option>
                    <?php endforeach ?>
                    </select>
                 </p>
                <p><strong><?php _e('Checkout Button Text', 'memberlite') ?></strong>
                    <label class="screen-reader-text" for="memberlite_landing_page_checkout_button"><?php _e('Checkout Button Text', 'memberlite') ?></label>
                    <input type="text" id="memberlite_landing_page_checkout_button" name="memberlite_landing_page_checkout_button" value="<?php echo esc_attr($memberlite_landing_page_checkout_button) ?>"><em><?php _e('( default: "Select")', 'memberlite') ?></em>
                </p>
                <p><strong><?php _e('Membership Level Upsell', 'memberlite') ?></strong>
                    <label class="screen-reader-text" for="memberlite_landing_page_upsell"><?php _e('Landing Page Membership Level Upsell', 'memberlite') ?></label>
                    <select id="memberlite_landing_page_upsell" name="memberlite_landing_page_upsell">
                        <option value="blank" <?php selected( $memberlite_landing_page_upsell, 'blank' ) ?>><?php _e('- Select -', 'memberlite') ?></option>
                        <?php foreach($membership_levels as $level) : ?>
                        <option value="<?php echo $level->id ?>" <?php selected( $memberlite_landing_page_upsell, $level->id ) ?>><?php echo $level->name ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
            </div>
		<?php endif;
		endif;
}

/* Save custom sidebar selection */
function memberlite_settings_save_meta_box_data($post_id) {
	if(!isset($_POST['memberlite_settings_meta_box_nonce'])) {
		return;
	}
	if(!wp_verify_nonce($_POST['memberlite_settings_meta_box_nonce'], 'memberlite_settings_meta_box')) {
		return;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if(!current_user_can('edit_page', $post_id)) {
			return;
		}
	} 
	else
	{
		if(!current_user_can('edit_post', $post_id)) {
			return;
		}
	}
	
	//banner show radio
	if(isset($_POST['memberlite_banner_show'])) {
		$memberlite_banner_show = sanitize_text_field($_POST['memberlite_banner_show']);
		update_post_meta($post_id, '_memberlite_banner_show', $memberlite_banner_show);
	}
	
	//banner description
	if(isset($_POST['memberlite_banner_desc'])) {
		$memberlite_banner_desc = sanitize_text_field($_POST['memberlite_banner_desc']);
		update_post_meta($post_id, '_memberlite_banner_desc', $memberlite_banner_desc);
	}
		
	//banner hide title checkbox	
	if(isset($_POST['memberlite_banner_hide_title_present'])) {
		if(!empty($_POST['memberlite_banner_hide_title']))
			$memberlite_banner_hide_title = 1;
		else
			$memberlite_banner_hide_title = 0;
			
		update_post_meta($post_id, '_memberlite_banner_hide_title', $memberlite_banner_hide_title);
	}
	
	//banner hide breadcrumbs checkbox
	if(isset($_POST['memberlite_banner_hide_breadcrumbs_present']))	{
		if(!empty($_POST['memberlite_banner_hide_breadcrumbs']))
			$memberlite_banner_hide_breadcrumbs = 1;
		else
			$memberlite_banner_hide_breadcrumbs = 0;
			
		update_post_meta($post_id, '_memberlite_banner_hide_breadcrumbs', $memberlite_banner_hide_breadcrumbs);
	}
	
	//banner extra padding checkbox
	if(isset($_POST['memberlite_banner_extra_padding_present']))	{
		if(!empty($_POST['memberlite_banner_extra_padding']))
			$memberlite_banner_extra_padding = 1;
		else
			$memberlite_banner_extra_padding = 0;
			
		update_post_meta($post_id, '_memberlite_banner_extra_padding', $memberlite_banner_extra_padding);
	}
	
	//banner right content
	if(isset($_POST['memberlite_banner_right'])) {
		$memberlite_banner_right = $_POST['memberlite_banner_right'];
		/**
		 * Only Admin can put js banner
		 */
		if ( current_user_can('unfiltered_html')){
			update_post_meta($post_id, '_memberlite_banner_right', $memberlite_banner_right);
        }

	}
	
	//banner bottom content
	if(isset($_POST['memberlite_banner_bottom'])) {
		$memberlite_banner_bottom = $_POST['memberlite_banner_bottom'];
		/**
		 * Only Admin can put js banner
		 */
		if ( current_user_can('unfiltered_html')) {
			update_post_meta( $post_id, '_memberlite_banner_bottom', $memberlite_banner_bottom );
		}
	}
	
	//page icon
	if(isset($_POST['memberlite_page_icon'])) {
		$memberlite_page_icon = sanitize_text_field($_POST['memberlite_page_icon']);
		
		update_post_meta($post_id, '_memberlite_page_icon', $memberlite_page_icon);
	}
	
	//page icon in banner right checkbox
	if(isset($_POST['memberlite_banner_icon_present']))	{
		if(!empty($_POST['memberlite_banner_icon']))
			$memberlite_banner_icon = 1;
		else
			$memberlite_banner_icon = 0;
			
		update_post_meta($post_id, '_memberlite_banner_icon', $memberlite_banner_icon);
	}	
	
	//landing page level
	if(isset($_POST['pmproal_landing_page_level'])) {
		$pmproal_landing_page_level = sanitize_text_field($_POST['pmproal_landing_page_level']);
		update_post_meta($post_id, '_pmproal_landing_page_level', $pmproal_landing_page_level);
	}
	
	//landing page checkout button
	if(isset($_POST['memberlite_landing_page_checkout_button'])) {
		$memberlite_landing_page_checkout_button = sanitize_text_field($_POST['memberlite_landing_page_checkout_button']);
		update_post_meta($post_id, '_memberlite_landing_page_checkout_button', $memberlite_landing_page_checkout_button);
	}
	
	//landing page upsell content
	if(isset($_POST['memberlite_landing_page_upsell'])) {
		$memberlite_landing_page_upsell = sanitize_text_field($_POST['memberlite_landing_page_upsell']);
		update_post_meta($post_id, '_memberlite_landing_page_upsell', $memberlite_landing_page_upsell);
	}	
}
add_action('save_post', 'memberlite_settings_save_meta_box_data');

/* Adds a Custom Sidebar meta box to the side column on the Post and Page edit screens. */
function memberlite_sidebar_add_meta_box() {
	$screens = get_post_types( array('public' => true), 'names' );
	foreach ($screens as $screen) {
		if(in_array($screen, array('reply','topic')))
			continue;
		else
		{
			add_meta_box(
				'memberlite_sidebar_section',
				__('Custom Sidebar', 'memberlite'),
				'memberlite_sidebar_meta_box_callback',
				$screen,
				'side',
				'core'
			);
		}
	}
}
add_action('add_meta_boxes', 'memberlite_sidebar_add_meta_box');

/* Meta box for custom sidebar selection */
function memberlite_sidebar_meta_box_callback($post) {
	global $wp_registered_sidebars;
	wp_nonce_field('memberlite_sidebar_meta_box', 'memberlite_sidebar_meta_box_nonce');
	$memberlite_hide_children = get_post_meta($post->ID, '_memberlite_hide_children', true);
	$memberlite_custom_sidebar = get_post_meta($post->ID, '_memberlite_custom_sidebar', true);
	
	$post_type = get_post_type($post);
	//check post type and custom cpt sidebar
    if ( ! in_array( $post_type, array ( 'post', 'page' ) ) ) {
        $memberlite_cpt_sidebars = get_option( 'memberlite_cpt_sidebars', array () );
        if ( empty( $memberlite_cpt_sidebars[ $post_type ] ) || ( $memberlite_cpt_sidebars[ $post_type ] == 'memberlite_sidebar_default' ) ) {
            $memberlite_cpt_sidebar_id = 'sidebar-1';
        } else {
            $memberlite_cpt_sidebar_id = $memberlite_cpt_sidebars[ $post_type ];
        }
    } elseif ( get_post_type( $post ) == 'post' ) {
        $memberlite_cpt_sidebar_id = 'sidebar-2';
    } else {
        $memberlite_cpt_sidebar_id = 'sidebar-1';
    }

	//get the name of the default sidebar
    $memberlite_cpt_sidebar_name = '';
    if ( ! empty( $wp_registered_sidebars[ $memberlite_cpt_sidebar_id ] ) ) {
        $memberlite_cpt_sidebar_name = $wp_registered_sidebars[ $memberlite_cpt_sidebar_id ]['name'];
    }
	
	$memberlite_default_sidebar = get_post_meta($post->ID, '_memberlite_default_sidebar', true);

    echo '<div class="wrap">';

    if ( (get_post_type($post) == 'page' ) || (isset($_POST['post_type']) && 'page' == $_POST['post_type'])) : ?>
		<input type="hidden" name="memberlite_hide_children_present" value="1" />
		<label for="memberlite_hide_children" class="selectit">
            <input name="memberlite_hide_children" type="checkbox" id="memberlite_hide_children" value="1" <?php checked( $memberlite_hide_children, 1) ?>><?php _e('Hide Page Children Menu in Sidebar', 'memberlite') ?></label>
		<hr />
	<?php endif;

	if( $memberlite_cpt_sidebar_id != 'memberlite_sidebar_blank') : ?>
	    <p><?php printf( __('The current default sidebar is <strong>%s</strong>.', 'memberlite' ), $memberlite_cpt_sidebar_name) ?>
	<?php else : ?>
		<p><?php _e('The current default sidebar is <strong>hidden</strong>.', 'memberlite' ) ?>
	<?php endif ?>

	<a href="<?php echo admin_url( 'themes.php?page=memberlite-custom-sidebars') ?>"><?php _e('Manage Custom Sidebars','memberlite') ?></a></p>
    <hr />
	<p><strong><?php _e('Select Custom Sidebar', 'memberlite') ?></strong></p>
	<label class="screen-reader-text" for="memberlite_custom_sidebar">
	<?php _e('Select Sidebar', 'memberlite') ?>
    </label>
    <select class="widefat" id="memberlite_custom_sidebar" name="memberlite_custom_sidebar">
        <option value="memberlite_sidebar_blank" <?php selected( $memberlite_custom_sidebar, 'memberlite_sidebar_blank' ) ?>><?php _e('- Select -', 'memberlite') ?></option>
        <?php $memberlite_theme_sidebars = array('sidebar-3', 'sidebar-4', 'sidebar-5');
        foreach($wp_registered_sidebars as $wp_registered_sidebar) :
            if ( in_array( $wp_registered_sidebar['id'], $memberlite_theme_sidebars ) ) {
                continue;
            }  ?>
            <option value="<?php echo $wp_registered_sidebar['id'] ?>" <?php selected( $memberlite_custom_sidebar, $wp_registered_sidebar['id'] ) ?>> <?php echo $wp_registered_sidebar['name']?></option>
        <?php endforeach ?>
	</select>
	<?php if( $memberlite_cpt_sidebar_id != 'memberlite_sidebar_blank') : ?>
		<hr />
		<p><strong><?php _e('Default Sidebar Behavior', 'memberlite') ?></strong></p>
		<label class="screen-reader-text" for="memberlite_default_sidebar"><?php _e('Default Sidebar', 'memberlite') ?></label>
        <select class="widefat" id="memberlite_default_sidebar" name="memberlite_default_sidebar">
		<option value="default_sidebar_above" <?php selected( $memberlite_default_sidebar, 'default_sidebar_above' ) ?>><?php _e('Show Default Sidebar Above', 'memberlite') ?></option>
		<option value="default_sidebar_below" <?php selected( $memberlite_default_sidebar, 'default_sidebar_below' ) ?>><?php _e('Show Default Sidebar Below', 'memberlite') ?></option>
		<option value="default_sidebar_hide" <?php selected( $memberlite_default_sidebar, 'default_sidebar_hide' ) ?>><?php _e('Hide Default Sidebar', 'memberlite') ?></option>
		</select>
    <?php endif;

    echo '</div>';
}

/* Save custom sidebar selection */
function memberlite_sidebar_save_meta_box_data($post_id) {
	if(!isset($_POST['memberlite_sidebar_meta_box_nonce'])) {
		return;
	}
	if(!wp_verify_nonce($_POST['memberlite_sidebar_meta_box_nonce'], 'memberlite_sidebar_meta_box')) {
		return;
	}
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if(!current_user_can('edit_page', $post_id)) {
			return;
		}
	} 
	else
	{
		if(!current_user_can('edit_post', $post_id)) {
			return;
		}
	}
	
	//hide or show subpage menu in sidebar
	if(isset($_POST['memberlite_hide_children_present'])) {
		if(!empty($_POST['memberlite_hide_children']))
			$memberlite_hide_children = 1;
		else
			$memberlite_hide_children = 0;
			
		update_post_meta($post_id, '_memberlite_hide_children', $memberlite_hide_children);
	}
	
	//custom sidebar selection
	if(isset($_POST['memberlite_custom_sidebar'])) {
		$memberlite_custom_sidebar = sanitize_text_field($_POST['memberlite_custom_sidebar']);
		update_post_meta($post_id, '_memberlite_custom_sidebar', $memberlite_custom_sidebar);
	}

	//default sidebar behavior
	if(isset($_POST['memberlite_default_sidebar'])) {
		$memberlite_default_sidebar = sanitize_text_field($_POST['memberlite_default_sidebar']);
		update_post_meta($post_id, '_memberlite_default_sidebar', $memberlite_default_sidebar);
	}
	
}
add_action('save_post', 'memberlite_sidebar_save_meta_box_data');

/* Add Banner Image Setting meta box */
function memberlite_featured_image_meta( $content, $post_id ) {
	if(has_post_thumbnail($post_id) && !class_exists('MultiPostThumbnails'))
	{
		$id = '_memberlite_show_image_banner';
		$value = esc_attr( get_post_meta( $post_id, $id, true ) );
		$label = '<label for="' . $id . '" class="selectit"><input name="' . $id . '" type="checkbox" id="' . $id . '" value="' . $value . ' "'. checked( $value, 1, false) .'>' . __('Show as Banner Image', 'memberlite') . '</label>';
		return $content .= $label;
	}
	else
		return $content;
}
add_filter( 'admin_post_thumbnail_html', 'memberlite_featured_image_meta', 10, 2 );


/* Save Setting in Featured Images meta box */
function memberlite_save_featured_image_meta( $post_id, $post, $update ) {  
	$value = 0;
	if ( isset( $_REQUEST['_memberlite_show_image_banner'] ) ) {
		$value = 1;
	}
	// Set meta value to either 1 or 0
	update_post_meta( $post_id, '_memberlite_show_image_banner', $value );
}
add_action( 'save_post', 'memberlite_save_featured_image_meta', 10, 3 );