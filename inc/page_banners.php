<?php
/**
 * Page banner settings for the edit posts page in the admin.
 *
 * @package Memberlite
 */

/* Load JS on the edit post page in the admin. */
function memberlite_admin_enqueue_scripts_for_page_banners() {
	$screen = get_current_screen();

	if ( $screen->base == 'post' && ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] == 'edit' ) {
		wp_enqueue_script( 'memberlite-admin-page_banners', get_template_directory_uri() . '/js/admin-page_banners.js', array( 'jquery' ), MEMBERLITE_VERSION, true );
	}
}
add_action( 'admin_enqueue_scripts', 'memberlite_admin_enqueue_scripts_for_page_banners' );

/* Adds a Memberlite settings meta box to the side column on the Page edit screens.  */
function memberlite_settings_add_meta_box() {
	$screens = array( 'page' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'memberlite_settings_section',
			__( 'Memberlite Settings', 'memberlite' ),
			'memberlite_settings_meta_box_callback',
			$screen,
			'normal',
			'high'
		);
	}
}
add_action('add_meta_boxes', 'memberlite_settings_add_meta_box');

/* Meta box for Memberlite settings */
function memberlite_settings_meta_box_callback( $post ) {
	// Get the array of all possible Font Awesome icons.
	$font_awesome_icons = memberlite_get_font_awesome_icons( );

	wp_nonce_field( 'memberlite_settings_meta_box', 'memberlite_settings_meta_box_nonce' );
	$memberlite_page_template = get_post_meta($post->ID, '_wp_page_template', true);
	$memberlite_banner_show = get_post_meta($post->ID, '_memberlite_banner_show', true);
	if($memberlite_banner_show === '')
		$memberlite_banner_show = 1;		//we want to default to showing if this has never been set
	$memberlite_page_icon = get_post_meta($post->ID, '_memberlite_page_icon', true);
	$memberlite_banner_desc = get_post_meta($post->ID, '_memberlite_banner_desc', true);
	$memberlite_banner_hide_title = get_post_meta($post->ID, '_memberlite_banner_hide_title', true);
	$memberlite_banner_hide_breadcrumbs = get_post_meta($post->ID, '_memberlite_banner_hide_breadcrumbs', true);
	$memberlite_banner_extra_padding = get_post_meta($post->ID, '_memberlite_banner_extra_padding', true);
	$memberlite_banner_right = get_post_meta($post->ID, '_memberlite_banner_right', true);
	$memberlite_banner_icon = get_post_meta($post->ID, '_memberlite_banner_icon', true);
	$memberlite_banner_bottom = get_post_meta($post->ID, '_memberlite_banner_bottom', true);
	$memberlite_hide_page_nav = get_post_meta($post->ID, '_memberlite_hide_page_nav', true);
	$memberlite_landing_page_checkout_button = get_post_meta($post->ID, '_memberlite_landing_page_checkout_button', true);
	$pmproal_landing_page_level = get_post_meta($post->ID, '_pmproal_landing_page_level', true);
	$memberlite_landing_page_upsell = get_post_meta($post->ID, '_memberlite_landing_page_upsell', true);

	ob_start();
	?>

	<h2><?php esc_html_e( 'Page Banner Settings', 'memberlite' ); ?></h2>
	<p style="margin: 1rem 0 0 0;"><strong><?php esc_html_e( 'Show Page Banner', 'memberlite' ); ?></strong> <em><?php esc_html_e( 'Disable the entire page banner for this content.', 'memberlite' ); ?></em></p>
	<label class="screen-reader-text" for="memberlite_banner_show">
		<?php esc_html_e( 'Show Page Banner', 'memberlite' ); ?>
	</label>
	<input type="radio" name="memberlite_banner_show" value="1" <?php checked( $memberlite_banner_show, 1 ); ?>> <?php esc_html_e( 'Yes', 'memberlite' ); ?>
	&nbsp;&nbsp;
	<input type="radio" name="memberlite_banner_show" value="0" <?php checked( $memberlite_banner_show, 0 ); ?>> <?php esc_html_e( 'No', 'memberlite' ); ?>
	</p>

	<span id="memberlite_top_banner_settings_wrapper">
		<p style="margin: 1rem 0 0 0;"><strong><?php esc_html_e( 'Banner Description', 'memberlite' ); ?></strong> <em><?php esc_html_e( 'Shown in the masthead banner below the page title.', 'memberlite' ); ?></em><br />
			<?php if ( ( $memberlite_page_template == 'templates/landing.php' ) && function_exists( 'pmpro_getAllLevels' ) ) : ?>
				<em><?php esc_html_e( 'Leave blank to show landing page level description as banner description.', 'memberlite' ); ?></em>
			<?php endif; ?>
		</p>
		<label class="screen-reader-text" for="memberlite_banner_desc">
			<?php esc_html_e( 'Banner Description', 'memberlite' ); ?>
		</label>
		<?php wp_editor( $memberlite_banner_desc, 'memberlite_banner_desc', ['textarea_name' => 'memberlite_banner_desc', 'editor_class' => 'large-text', 'textarea_rows' => 3] ); ?>
		<input type="hidden" name="memberlite_banner_hide_title_present" value="1" />
		<label for="memberlite_banner_hide_title" class="selectit">
			<input name="memberlite_banner_hide_title" type="checkbox" id="memberlite_banner_hide_title" value="1" <?php checked( $memberlite_banner_hide_title, 1 ); ?>> <?php esc_html_e( 'Hide Page Title on Single View', 'memberlite' ); ?>
		</label>
		<input type="hidden" name="memberlite_banner_hide_breadcrumbs_present" value="1" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="memberlite_banner_hide_breadcrumbs" class="selectit">
			<input name="memberlite_banner_hide_breadcrumbs" type="checkbox" id="memberlite_banner_hide_breadcrumbs" value="1" <?php checked( $memberlite_banner_hide_breadcrumbs, 1 ); ?>> <?php esc_html_e( 'Hide Breadcrumbs', 'memberlite' ); ?>
		</label>
		<input type="hidden" name="memberlite_banner_extra_padding_present" value="1" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="memberlite_banner_extra_padding" class="selectit">
			<input name="memberlite_banner_extra_padding" type="checkbox" id="memberlite_banner_extra_padding" value="1" <?php checked( $memberlite_banner_extra_padding, 1 ); ?>> <?php esc_html_e( 'Add Extra Banner Padding', 'memberlite' ); ?>
		</label>
	</span>

	<hr />

	<p style="margin: 1rem 0 0 0;"><strong><?php esc_html_e( 'Page Bottom Banner', 'memberlite' ); ?></strong> <em><?php esc_html_e( 'Banner shown above footer on pages. (i.e. call to action)', 'memberlite' ); ?></em></p>
	<label class="screen-reader-text" for="memberlite_banner_bottom">
		<?php esc_html_e( 'Page Bottom Banner', 'memberlite' ); ?>
	</label>
	<?php wp_editor( $memberlite_banner_bottom, 'memberlite_banner_bottom', ['textarea_name' => 'memberlite_banner_bottom', 'editor_class' => 'large-text', 'textarea_rows' => 3] ); ?>

	<hr />

	<p style="margin: 1rem 0 0 0;"><strong><?php esc_html_e( 'Page Icon', 'memberlite' ); ?></strong></p>
	<label class="screen-reader-text" for="memberlite_page_icon">
		<?php esc_html_e( 'Select Icon', 'memberlite' ); ?>
	</label>
	<select id="memberlite_page_icon" name="memberlite_page_icon">
		<option value="blank" <?php selected( $memberlite_page_icon, 'blank' ); ?>><?php esc_html_e( '- Select -', 'memberlite' ); ?></option>
		<?php foreach ( $font_awesome_icons as $font_awesome_icon ) : ?>
			<option value="<?php echo esc_attr( $font_awesome_icon ); ?>" <?php selected( $memberlite_page_icon, $font_awesome_icon ); ?>><?php echo esc_html( $font_awesome_icon ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="memberlite_banner_icon_present" value="1" />
	<p style="margin: 1rem 0 0 0;"><label for="memberlite_banner_icon" class="selectit"><input name="memberlite_banner_icon" type="checkbox" id="memberlite_banner_icon" value="1" <?php checked( $memberlite_banner_icon, 1 ); ?>> <?php esc_html_e( 'Show Icon in Banner Title', 'memberlite' ); ?></label></p>

	<?php
		// Allow hiding the prev/next page navigation on this page if it is a child page.
		$memberlite_page_nav = get_theme_mod( 'memberlite_page_nav', 1 );
		if ( ! empty( $memberlite_page_nav ) ) {
			?>
			<input type="hidden" name="memberlite_hide_page_nav_present" value="1" />
			<p style="margin: 1rem 0 0 0;"><strong><?php esc_html_e( 'Page Navigation', 'memberlite' ); ?></strong></p>
			<p style="margin: 1rem 0 0 0;"><label for="memberlite_hide_page_nav" class="selectit"><input name="memberlite_hide_page_nav" type="checkbox" id="memberlite_hide_page_nav" value="1" <?php checked( $memberlite_hide_page_nav, 1 ); ?>> <?php esc_html_e( 'Hide the Prev/Next Navigation on this Page', 'memberlite' ); ?></label></p>
			<?php
		}
	?>

	<?php if ( ( $memberlite_page_template == 'templates/landing.php' ) && function_exists( 'pmpro_getAllLevels' ) ) { ?>
		<hr />
		<h2><?php esc_html_e( 'Landing Page Settings', 'memberlite' ); ?></h2>
		<?php
			$membership_levels = pmpro_getAllLevels();
			if ( empty( $membership_levels ) ) {
				?>
				<div class="inline notice error">
					<p>
						<a href="<?php echo esc_url( add_query_arg( 'page', 'pmpro-membershiplevels', admin_url( 'admin.php' ) ) ); ?>">
							<?php esc_html_e( 'Add a Membership Level to Use These Landing Page Features »', 'memberlite' ); ?>
						</a>
					</p>
				</div>
				<?php
			} else {
				?>
				<table class="form-table">
					<tbody>
						<tr><th scope="row"><?php esc_html_e( 'Membership Level', 'memberlite' ); ?></th>
						<td>
							<label class="screen-reader-text" for="pmproal_landing_page_level"><?php esc_html_e( 'Landing Page Membership Level', 'memberlite' ); ?></label>
							<select id="pmproal_landing_page_level" name="pmproal_landing_page_level">
								<option value=""<?php selected( $pmproal_landing_page_level, "" ); ?>><?php esc_html_e( '- Select -', 'memberlite' ); ?></option>
								<?php foreach( $membership_levels as $level ) { ?>
									<option value="<?php echo esc_html( intval( $level->id ) ); ?>" <?php selected( $pmproal_landing_page_level, $level->id ); ?>><?php esc_html_e( $level->name ); ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Checkout Button Text', 'memberlite'); ?></th>
						<td>
							<label class="screen-reader-text" for="memberlite_landing_page_checkout_button"><?php esc_html_e('Checkout Button Text', 'memberlite'); ?></label>
							<input type="text" id="memberlite_landing_page_checkout_button" name="memberlite_landing_page_checkout_button" value="<?php echo esc_attr( $memberlite_landing_page_checkout_button ); ?>"> <em><?php esc_html_e( '(default: "Select")', 'memberlite' ); ?></em>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php esc_html_e( 'Membership Level Upsell', 'memberlite'); ?></th>
						<td>
							<?php if ( ! function_exists( 'pmpro_advanced_levels_shortcode' ) ) : ?>
								<?php
								$allowed_advanced_levels_html = array (
									'a' => array (
										'href' => array(),
										'target' => array(),
										'title' => array(),
									),
								);
								?>
								<p class="description"><?php echo sprintf( wp_kses( __( 'Optional: You must install and activate the <a href="%s" title="Paid Memberships Pro - Advanced Levels Page Add On" target="_blank">Advanced Levels Page Add On</a> to use this landing page feature.', 'memberlite' ), $allowed_advanced_levels_html ), 'https://www.paidmembershipspro.com/add-ons/pmpro-advanced-levels-shortcode/' ); ?></p>
							<?php else : ?>
								<label class="screen-reader-text" for="memberlite_landing_page_upsell"><?php esc_html_e('Landing Page Membership Level Upsell', 'memberlite'); ?></label>
								<select id="memberlite_landing_page_upsell" name="memberlite_landing_page_upsell">
									<option value="" <?php selected( $memberlite_landing_page_upsell, "" ); ?>>- Select -</option>
									<?php foreach($membership_levels as $level) : ?>
										<option value="<?php echo intval( $level->id ); ?>" <?php selected( $memberlite_landing_page_upsell, $level->id ); ?>><?php echo esc_html( $level->name ); ?></option>
									<?php endforeach; ?>
								</select>
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
			<?php
		}
	}

	$output = ob_get_clean();
	echo $output;
}

/* Save custom sidebar selection */
function memberlite_settings_save_meta_box_data( $post_id ) {
	global $allowedposttags;

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
		if(!empty($_POST['memberlite_banner_show']))
			$memberlite_banner_show = 1;
		else
			$memberlite_banner_show = 0;
		update_post_meta($post_id, '_memberlite_banner_show', $memberlite_banner_show);
	}

	//banner description
	if(isset($_POST['memberlite_banner_desc'])) {
		$memberlite_banner_desc = wp_kses( wp_unslash( $_POST['memberlite_banner_desc'] ), $allowedposttags );
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
		$memberlite_banner_right = wp_kses( wp_unslash( $_POST['memberlite_banner_right'] ), $allowedposttags );

		update_post_meta($post_id, '_memberlite_banner_right', $memberlite_banner_right);
	}

	//banner bottom content
	if(isset($_POST['memberlite_banner_bottom'])) {
		$memberlite_banner_bottom = wp_kses( wp_unslash( $_POST['memberlite_banner_bottom'] ), $allowedposttags );

		update_post_meta($post_id, '_memberlite_banner_bottom', $memberlite_banner_bottom);
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

	// Hide page navigation checkbox.
	if(isset($_POST['memberlite_hide_page_nav_present'])) {
		if(!empty($_POST['memberlite_hide_page_nav']))
			$memberlite_hide_page_nav = 1;
		else
			$memberlite_hide_page_nav = 0;

		update_post_meta($post_id, '_memberlite_hide_page_nav', $memberlite_hide_page_nav);
	}

	//landing page level
	if(isset($_POST['pmproal_landing_page_level'])) {
		$pmproal_landing_page_level = intval($_POST['pmproal_landing_page_level']);

		update_post_meta($post_id, '_pmproal_landing_page_level', $pmproal_landing_page_level);
	}

	//landing page checkout button
	if(isset($_POST['memberlite_landing_page_checkout_button'])) {
		$memberlite_landing_page_checkout_button = sanitize_text_field($_POST['memberlite_landing_page_checkout_button']);

		update_post_meta($post_id, '_memberlite_landing_page_checkout_button', $memberlite_landing_page_checkout_button);
	}

	//landing page upsell content
	if(isset($_POST['memberlite_landing_page_upsell'])) {
		$memberlite_landing_page_upsell = intval($_POST['memberlite_landing_page_upsell']);

		update_post_meta($post_id, '_memberlite_landing_page_upsell', $memberlite_landing_page_upsell);
	}
}
add_action('save_post', 'memberlite_settings_save_meta_box_data');

/* Add Banner Image Setting meta box */
function memberlite_featured_image_meta( $content, $post_id ) {
	if(has_post_thumbnail( $post_id) )
	{
		$id = '_memberlite_show_image_banner';
		$value = esc_attr( get_post_meta( $post_id, $id, true ) );
		$label = '<hr /><label for="' . $id . '" class="selectit"><input name="' . esc_attr( $id ) . '" type="checkbox" id="' . esc_attr( $id ) . '" value="' . esc_attr( $value ) . ' "'. checked( $value, 1, false) .'>' . esc_html__('Show as Banner Image', 'memberlite') . '</label>';
		if ( class_exists( 'MemberliteMultiPostThumbnails' ) ) {
			$label .= '<p class="howto">' . esc_html__( 'If a banner image is set below, it will override this setting.', 'memberlite' ) . '</p>';
		}
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

function memberlite_display_banner_bottom( ) {
	global $post;

	$queried_object = get_queried_object();
	if ( ! empty( $queried_object->ID ) ) {
		$post_id = $queried_object->ID;
	}

	// If we don't have a post_id and we're on the "blog", set post_id to the page_for_posts.
	if ( empty( $post_id ) && ( is_home() || is_post_type_archive( 'post' ) ) ) {
		$post_id = get_option('page_for_posts');
	}

	if ( ! empty( $post_id ) ) {
		$memberlite_banner_bottom = get_post_meta( $post_id, '_memberlite_banner_bottom', true );
	} else {
		$memberlite_banner_bottom = false;
	}
	if ( ! empty( $memberlite_banner_bottom ) ) { ?>
		<div id="banner_bottom">
			<div class="row"><div class="large-12 columns">
				<?php echo apply_filters( 'the_content', $memberlite_banner_bottom ); ?>
			</div></div><!-- .row .columns -->
		</div><!-- #banner_bottom -->
	<?php }
}
add_action( 'memberlite_after_content', 'memberlite_display_banner_bottom' );

/*
	Filter to hide the masthead banner based on post meta setting
*/
function memberlite_maybe_show_page_banner( ) {
	// Set the post_id to the queried object ID.
	$queried_object = get_queried_object();
	if ( ! empty( $queried_object->ID ) ) {
		$post_id = $queried_object->ID;
	}
	
	// If we don't have a post_id and we're on the "blog", set post_id to the page_for_posts.
	if ( empty( $post_id ) && ( is_home() || is_post_type_archive( 'post' ) ) ) {
		$post_id = get_option('page_for_posts');
	}

	if ( ! empty( $post_id ) ) {
		$memberlite_banner_show = get_post_meta( $post_id, '_memberlite_banner_show', true );
		if ( $memberlite_banner_show === '0' ) {
			return false;
		} else {
			return true;
		}
	} else {
		return true;
	}
}
add_filter( 'memberlite_banner_show', 'memberlite_maybe_show_page_banner' );

/*
	Filter to hide the masthead banner breadcrumbs based on post meta setting
*/
function memberlite_maybe_show_breadcrumbs( ) {
	// Set the post_id to the queried object ID.
	$queried_object = get_queried_object();
	if ( ! empty( $queried_object->ID ) ) {
		$post_id = $queried_object->ID;
	}
	
	// If we don't have a post_id and we're on the "blog", set post_id to the page_for_posts.
	if ( empty( $post_id ) && ( is_home() || is_post_type_archive( 'post' ) ) ) {
		$post_id = get_option('page_for_posts');
	}
	
	if ( ! empty( $post_id ) ) {
		$memberlite_banner_hide_breadcrumbs = get_post_meta( $post_id, '_memberlite_banner_hide_breadcrumbs', true );
		if ( $memberlite_banner_hide_breadcrumbs === '1' ) {
			return false;
		} else {
			return true;
		}
	} else {
		return true;
	}
}
add_filter( 'memberlite_show_breadcrumbs', 'memberlite_maybe_show_breadcrumbs' );

/*
	Filter to show additional content in the masthead banner
*/
function memberlite_maybe_customize_masthead_content( $content ) {
	// Return early if this is the 404 page.
	if ( is_404() ) {
		return $content;
	}

	// Set the post_id to the queried object ID.
	$queried_object = get_queried_object();
	if ( ! empty( $queried_object->ID ) ) {
		$post_id = $queried_object->ID;
	}

	// If we don't have a post_id and we're on the "blog", set post_id to the page_for_posts.
	if ( empty( $post_id ) && ( is_home() || is_post_type_archive( 'post' ) ) ) {
		$post_id = get_option('page_for_posts');
	}

	if ( ! empty( $post_id ) ) {
		//add a space to the front, to make sure the default masthead isn't shown
		$content .= ' ';

		//Get setting for masthead banner extra padding
		$memberlite_banner_extra_padding = get_post_meta( $post_id, '_memberlite_banner_extra_padding', true );
		if ( ! empty( $memberlite_banner_extra_padding ) ) {
			//Add the masthead banner padding wrapper
			$content .= '<div class="masthead-padding">';
		}

		//Get setting for masthead banner right column content
		$memberlite_banner_right = get_post_meta( $post_id, '_memberlite_banner_right', true );

		//Get setting to show or hide masthead banner icon
		$memberlite_banner_icon = get_post_meta( $post_id, '_memberlite_banner_icon', true );

		//Get setting for masthead banner icon content
		$memberlite_page_icon = get_post_meta( $post_id, '_memberlite_page_icon', true );

		//Get settings for landing page
		$pmproal_landing_page_level = get_post_meta($post_id,'_pmproal_landing_page_level',true);
		$memberlite_landing_page_checkout_button = get_post_meta($post_id,'_memberlite_landing_page_checkout_button',true);
		$memberlite_landing_page_upsell = get_post_meta($post_id,'_memberlite_landing_page_upsell',true);

		if ( ! empty( $memberlite_banner_right ) || ( ! empty( $memberlite_banner_icon )  && ! empty( $memberlite_page_icon ) ) ) {

			//Get the columns ratio for the masthead banner based on content setting in customizer.
			$memberlite_columns_primary = memberlite_getColumnsRatio();

			$content .= '<div class="memberlite_elements-masthead row">';

			//Check that we should display a masthead banner icon and it is set
			if ( ! empty( $memberlite_banner_icon ) && ! empty( $memberlite_page_icon ) ) {
				$font_awesome_icons_brands = memberlite_get_font_awesome_icons( 'brand' );

				// Check if the icon is a "brand" icon and set the appropriate icon class.
				if ( in_array( $memberlite_page_icon, $font_awesome_icons_brands ) ) {
					$memberlite_page_icon_class = 'fab';
				} else {
					$memberlite_page_icon_class = 'fa';
				}

				if ( is_page_template( 'templates/narrow-width.php' ) ) {
					$memberlite_page_icon_size = 'fa-2x';
				} else {
					$memberlite_page_icon_size = 'fa-4x';
				}

				//Show the icon in a 2 column span
				$content .= '<div class="medium-1 columns text-center"><i class="' . esc_attr( $memberlite_page_icon_class . ' ' . $memberlite_page_icon_size . ' fa-' . $memberlite_page_icon ) . '"></i></div>';

				//Add the column wrapper for page title and description
				if ( empty( $memberlite_banner_right) ) {
					$content .= '<div class="medium-11 columns">';
				} else {
					$content .= '<div class="medium-' . esc_attr( $memberlite_columns_primary-1 ) .' columns">';
				}
			} else {
				$content .= '<div class="medium-' . esc_attr( $memberlite_columns_primary ) . '  columns">';
			}
		}

		//Show the landing page featured image
		if ( is_page_template( 'templates/landing.php' ) && has_post_thumbnail( $post_id ) ) {
			$content .= get_the_post_thumbnail( 'medium', array( 'class' => 'alignleft' ) );
		}

		//Get setting to show or hide page title in masthead banner
		$memberlite_banner_hide_title = get_post_meta( $post_id, '_memberlite_banner_hide_title', true );
		if ( empty( $memberlite_banner_hide_title ) ) {
			$content .= memberlite_page_title( false );	//false to not echo
		}

		//Get content for masthead banner description
		$memberlite_banner_desc = get_post_meta( $post_id, '_memberlite_banner_desc', true );
		if ( ! empty( $memberlite_banner_desc ) ) {
			//Show the masthead banner description
			$content .= wpautop( do_shortcode( $memberlite_banner_desc ) );
		}

		//Show the landing page level price and checkout button
		if ( is_page_template( 'templates/landing.php' ) && ! empty( $pmproal_landing_page_level ) && defined( 'PMPRO_VERSION' ) ) {
			$level = pmpro_getLevel( $pmproal_landing_page_level );

			//Set default checkout button text
			if ( empty( $memberlite_landing_page_checkout_button ) ) {
				$memberlite_landing_page_checkout_button = 'Select';
			}

			if ( ! empty( $level ) ) {
				if ( empty( $memberlite_banner_desc ) ) {
					//Show the level descrpition of banner description is empty
					$content .= wpautop( do_shortcode( $level->description ) );
				}
				$content .= '<p class="pmpro_level-price">' . pmpro_getLevelCost($level, true, true) . '</p>';
				$content .= '<p><a class="btn btn_action" href="' . esc_url( add_query_arg( 'level', $pmproal_landing_page_level, pmpro_url( 'checkout' ) ) ) . '">' . esc_attr( $memberlite_landing_page_checkout_button ) . '</a></p>';
			}
		}

		if ( ! empty( $memberlite_banner_right ) || ( ! empty( $memberlite_banner_icon )  && ! empty( $memberlite_page_icon ) ) ) {
			//Close the masthead banner columns div
			$content .= '</div> <!--.medium-X .columns -->';
		}

		if ( ! empty( $memberlite_banner_right ) ) {
			//Show the masthead banner right columns
			$content .= '<div class="medium-' . memberlite_getColumnsRatio( 'sidebar' ) . ' columns">';
			$content .= wpautop( do_shortcode( $memberlite_banner_right ) );
			$content .= '</div> <!--.medium-X .columns -->';
		}

		if ( ! empty( $memberlite_banner_right ) || ( ! empty( $memberlite_banner_icon )  && ! empty( $memberlite_page_icon ) ) ) {
			//Close the masthead banner row div
			$content .= '</div> <!--.row -->';
		}

		if ( ! empty( $memberlite_banner_extra_padding ) ) {
			//Cloise the masthead banner padding wrapper
			$content .= '</div><!--.masthead-padding-->';
		}
	}

	return $content;
}
add_filter( 'memberlite_masthead_content', 'memberlite_maybe_customize_masthead_content' );

/**
 * Filter to get the banner image from MemberliteMultiPostThumbnails if it exists.
 */
function memberlite_maybe_get_custom_banner_image( $memberlite_banner_image, $attachment_id, $size = 'banner', $icon = false, $attr = '', $post_id = 0 ) {
	if ( class_exists( 'MemberliteMultiPostThumbnails') && ! empty( $post_id ) ) {
		$post_type = get_post_type( $post_id );
		if ( ! empty( $post_type ) ) {
			$memberlite_banner_image_id = MemberliteMultiPostThumbnails::get_post_thumbnail_id(
				$post_type,
				'memberlite_banner_image' . $post_type,
				$post_id
			);
			if ( ! empty( $memberlite_banner_image_id ) ) {
				//Set memberlite_banner_image to the use Banner Image instead
				$memberlite_banner_image = wp_get_attachment_image( $memberlite_banner_image_id, $size, $icon, $attr );
			}
		}
	}

	return $memberlite_banner_image;
}
add_filter( 'memberlite_get_banner_image', 'memberlite_maybe_get_custom_banner_image', 10, 6 );

/**
 * Filter to get the banner image src from MemberliteMultiPostThumbnails if it exists
 */
function memberlite_maybe_change_banner_image_src( $memberlite_banner_image_src, $size, $post_id = null ) {
	if ( class_exists( 'MemberliteMultiPostThumbnails') && ! empty( $post_id ) ) {
		$post_type = get_post_type( $post_id );
		if ( ! empty( $post_type ) ) {
			$memberlite_banner_image_id = MemberliteMultiPostThumbnails::get_post_thumbnail_id(
				$post_type,
				'memberlite_banner_image' . $post_type,
				$post_id
			);
			if ( ! empty( $memberlite_banner_image_id ) ) {
				//Set memberlite_banner_image_src to the use Banner Image instead
				$memberlite_banner_image_src = wp_get_attachment_image_src( $memberlite_banner_image_id, $size );
			}
		}
	}

	return $memberlite_banner_image_src;
}
add_filter( 'memberlite_banner_image_src', 'memberlite_maybe_change_banner_image_src', 10, 3 );

/*
	Function to display the background image in the banner.
*/
function memberlite_custom_before_masthead_outer( ) {
	// Return early if this is the 404 page.
	if ( is_404() ) {
		return;
	}

	// If this is the front page, set the post_id to the page_for_posts.
	if ( is_home() || is_post_type_archive( 'post' ) ) {
		$post_id = get_option('page_for_posts');
	} else {
		// get from queried object
		$queried_object = get_queried_object();
		if ( ! empty( $queried_object->ID ) ) {
			$post_id = $queried_object->ID;
		}
	}

	if ( ! empty( $post_id ) && function_exists( 'memberlite_get_banner_image_src' ) ) {
		$memberlite_show_image_banner = get_post_meta( $post_id, '_memberlite_show_image_banner', true );
		$memberlite_banner_image_src = memberlite_get_banner_image_src( $post_id, 'memberlite-masthead' );
		$the_post_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'memberlite-masthead' );

		if ( ! empty( $memberlite_show_image_banner ) && ! empty( $memberlite_banner_image_src ) || ( ! empty( $memberlite_banner_image_src ) && ( $memberlite_banner_image_src != $the_post_thumbnail_src ) ) ) { ?>
			<div class="masthead-banner" style="background-image: url('<?php echo esc_attr($memberlite_banner_image_src[0]);?>');">
			<?php
		}
	}
}
add_action( 'memberlite_before_masthead_outer', 'memberlite_custom_before_masthead_outer' );

/*
	Function to display the background image in the banner.
*/
function memberlite_custom_after_masthead_outer( ) {

	// Return early if this is the 404 page.
	if ( is_404() ) {
		return;
	}

	// If this is the front page, set the post_id to the page_for_posts.
	if ( is_home() || is_post_type_archive( 'post' ) ) {
		$post_id = get_option('page_for_posts');
	} else {
		// get from queried object
		$queried_object = get_queried_object();
		if ( ! empty( $queried_object->ID ) ) {
			$post_id = $queried_object->ID;
		}
	}

	if ( ! empty( $post_id ) && function_exists( 'memberlite_get_banner_image_src' ) ) {
		$memberlite_show_image_banner = get_post_meta( $post_id, '_memberlite_show_image_banner', true );
		$memberlite_banner_image_src = memberlite_get_banner_image_src( $post_id, 'memberlite-masthead' );
		$the_post_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'memberlite-masthead' );

		if ( ! empty( $memberlite_show_image_banner ) && ! empty( $memberlite_banner_image_src ) || ( ! empty( $memberlite_banner_image_src ) && ( $memberlite_banner_image_src != $the_post_thumbnail_src ) ) ) { ?>
			</div><!--.masthead-banner-->
			<?php
		}
	}
}
add_action( 'memberlite_after_masthead_outer', 'memberlite_custom_after_masthead_outer' );
