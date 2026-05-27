<?php
/**
 * Custom Sidebars core logic for Memberlite Theme.
 *
 * Contains registration, helper functions, meta box logic,
 * save handlers, and front-end sidebar selection.
 *
 * The admin page UI (Memberlite > Custom Sidebars) is loaded in adminpages/custom-sidebars.php.
 *
 * @package Memberlite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Generate a slug for a new custom sidebar.
 *
 * @param string $phrase    The base phrase to slugify.
 * @param int    $maxLength Maximum length of the slug.
 *
 * @return string
 */
function memberlite_generateSlug( $phrase, $maxLength ) {
	$result = strtolower( $phrase );

	$result = preg_replace( '/[^a-z0-9\s-]/', '', $result );
	$result = trim( preg_replace( '/[\s-]+/', ' ', $result ) );
	$result = trim( substr( $result, 0, $maxLength ) );
	$result = preg_replace( '/\s/', '-', $result );

	return $result;
}

/**
 * Check if a sidebar already exists.
 *
 * @param string      $name Sidebar name.
 * @param string|null $id   Sidebar ID (optional).
 *
 * @return bool True if a sidebar with this name or ID exists, false otherwise.
 */
function memberlite_sidebar_exists( $name, $id = null ) {
	if ( empty( $id ) ) {
		$id = memberlite_generateSlug( $name, 45 );
	}

	global $wp_registered_sidebars;

	foreach ( $wp_registered_sidebars as $wp_registered_sidebar ) {
		if ( $name === $wp_registered_sidebar['name'] || $id === $wp_registered_sidebar['id'] ) {
			return true; // conflict.
		}
	}

	return false; // no conflict.
}

/**
 * Register a specified custom sidebar.
 *
 * @param string      $name Sidebar name.
 * @param string|null $id   Sidebar ID (optional).
 *
 * @return string|false Sidebar ID or false on failure.
 */
function memberlite_registerCustomSidebar( $name, $id = null ) {
	if ( empty( $id ) ) {
		$id = memberlite_generateSlug( $name, 45 );
	}

	return register_sidebar(
		array(
			'name'          => $name,
			'id'            => $id,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

/**
 * Register all custom sidebars stored in the option.
 */
function memberlite_custom_sidebars_init() {
	$memberlite_custom_sidebars = get_option( 'memberlite_custom_sidebars', array() );

	if ( empty( $memberlite_custom_sidebars ) || ! is_array( $memberlite_custom_sidebars ) ) {
		return;
	}

	foreach ( $memberlite_custom_sidebars as $memberlite_custom_sidebar ) {
		memberlite_registerCustomSidebar( $memberlite_custom_sidebar );
	}
}
add_action( 'widgets_init', 'memberlite_custom_sidebars_init' );

/**
 * Add a Custom Sidebar meta box to the side column on the post and page edit screens.
 */
function memberlite_sidebar_add_meta_box() {
	$screens = get_post_types( array( 'public' => true ), 'names' );

	foreach ( $screens as $screen ) {
		if ( in_array( $screen, array( 'reply', 'topic' ), true ) ) {
			continue;
		}

		add_meta_box(
			'memberlite_sidebar_section',
			esc_html__( 'Custom Sidebar', 'memberlite' ),
			'memberlite_sidebar_meta_box_callback',
			$screen,
			'side',
			'core'
		);
	}
}
add_action( 'add_meta_boxes', 'memberlite_sidebar_add_meta_box' );

/**
 * Meta box for custom sidebar selection.
 *
 * @param WP_Post $post The current post object.
 */
function memberlite_sidebar_meta_box_callback( $post ) {
	global $wp_registered_sidebars;

	wp_nonce_field( 'memberlite_sidebar_meta_box', 'memberlite_sidebar_meta_box_nonce' );

	$memberlite_hide_children = get_post_meta( $post->ID, '_memberlite_hide_children', true );
	$memberlite_custom_sidebar = get_post_meta( $post->ID, '_memberlite_custom_sidebar', true );

	$post_type = get_post_type( $post );

	// Determine base default sidebar by post type.
	if ( ! in_array( $post_type, array( 'post', 'page' ), true ) ) {
		$memberlite_cpt_sidebars = get_option( 'memberlite_cpt_sidebars', array() );

		if ( empty( $memberlite_cpt_sidebars[ $post_type ] ) || 'memberlite_sidebar_default' === $memberlite_cpt_sidebars[ $post_type ] ) {
			$memberlite_cpt_sidebar_id = 'sidebar-1';
		} else {
			$memberlite_cpt_sidebar_id = $memberlite_cpt_sidebars[ $post_type ];
		}
	} elseif ( 'post' === $post_type ) {
		$memberlite_cpt_sidebar_id = 'sidebar-2';
	} else {
		$memberlite_cpt_sidebar_id = 'sidebar-1';
	}

	// Get the name of the default sidebar (if it exists).
	if ( ! empty( $wp_registered_sidebars[ $memberlite_cpt_sidebar_id ] ) ) {
		$memberlite_cpt_sidebar_name = $wp_registered_sidebars[ $memberlite_cpt_sidebar_id ]['name'];
	}

	$memberlite_default_sidebar = get_post_meta( $post->ID, '_memberlite_default_sidebar', true );

	// Page-specific options.
	if ( 'page' === $post_type ) {
		echo '<input type="hidden" name="memberlite_hide_children_present" value="1" />';

		if ( defined( 'PMPRO_VERSION' ) ) {
			global $pmpro_pages;

			// Check if this is the Membership Account page or a child of it.
			if ( ! empty( $post->post_parent ) ) {
				$post_ancestors = get_post_ancestors( $post );
				$toplevelpost   = end( $post_ancestors );
			} else {
				$toplevelpost = $post->ID;
			}

			$disable_hide_children_setting = ! empty( $pmpro_pages['account'] ) && (int) $pmpro_pages['account'] === (int) $toplevelpost;
		}

		if ( ! empty( $disable_hide_children_setting ) ) {
			echo '<label for="memberlite_hide_children" class="selectit"><input name="memberlite_hide_children" type="checkbox" id="memberlite_hide_children" value="1" checked="checked" disabled="disabled">' . esc_html__( 'Hide Page Children Menu in Sidebar', 'memberlite' ) . '</label>';
			echo '<p class="description"><br />' . esc_html__( 'The Membership Account page and its children do not display this menu.', 'memberlite' ) . '</p>';
		} else {
			echo '<label for="memberlite_hide_children" class="selectit"><input name="memberlite_hide_children" type="checkbox" id="memberlite_hide_children" value="1" ' . checked( $memberlite_hide_children, 1, false ) . '>' . esc_html__( 'Hide Page Children Menu in Sidebar', 'memberlite' ) . '</label>';
		}
		echo '<hr />';
	}

	// Current default sidebar display.
	if ( 'memberlite_sidebar_blank' !== $memberlite_cpt_sidebar_id ) {
		echo '<p>' . sprintf(
			esc_html__( 'The current default sidebar is %s.', 'memberlite' ),
			'<strong>' . esc_html( $memberlite_cpt_sidebar_name ) . '</strong>'
		);
	} else {
		echo '<p>' . wp_kses_post( __( 'The current default sidebar is <strong>hidden</strong>.', 'memberlite' ) );
	}

	echo ' <a href="' . esc_url( add_query_arg( array( 'page' => 'memberlite-custom-sidebars' ), admin_url( 'admin.php' ) ) ) . '">' . esc_html__( 'Manage Custom Sidebars', 'memberlite' ) . '</a></p><hr />';

	// Custom sidebar select.
	echo '<p><strong>' . esc_html__( 'Select Custom Sidebar', 'memberlite' ) . '</strong></p>';
	echo '<label class="screen-reader-text" for="memberlite_custom_sidebar">';
	esc_html_e( 'Select Sidebar', 'memberlite' );
	echo '</label>';
	echo '<select id="memberlite_custom_sidebar" name="memberlite_custom_sidebar">';
	echo '<option value="memberlite_sidebar_blank"' . selected( $memberlite_custom_sidebar, 'memberlite_sidebar_blank', false ) . '>- ' . esc_html__( 'Select', 'memberlite' ) . ' -</option>';

	// These are "theme" sidebars we generally hide in this dropdown.
	$memberlite_theme_sidebars = array( 'sidebar-3', 'sidebar-4', 'sidebar-5' );

	foreach ( $wp_registered_sidebars as $wp_registered_sidebar ) {
		if ( in_array( $wp_registered_sidebar['id'], $memberlite_theme_sidebars, true ) ) {
			continue;
		}
		echo '<option value="' . esc_attr( $wp_registered_sidebar['id'] ) . '"' . selected( $memberlite_custom_sidebar, $wp_registered_sidebar['id'], false ) . '>' . esc_html( $wp_registered_sidebar['name'] ) . '</option>';
	}
	echo '</select>';

	// Default sidebar behavior options.
	if ( 'memberlite_sidebar_blank' !== $memberlite_cpt_sidebar_id ) {
		echo '<hr />';
		echo '<p><strong>' . esc_html__( 'Default Sidebar Behavior', 'memberlite' ) . '</strong></p>';
		echo '<label class="screen-reader-text" for="memberlite_default_sidebar">';
		esc_html_e( 'Default Sidebar', 'memberlite' );
		echo '</label>';
		echo '<select id="memberlite_default_sidebar" name="memberlite_default_sidebar">';
		echo '<option value="default_sidebar_above"' . selected( $memberlite_default_sidebar, 'default_sidebar_above', false ) . '>' . esc_html__( 'Show Default Sidebar Above', 'memberlite' ) . '</option>';
		echo '<option value="default_sidebar_below"' . selected( $memberlite_default_sidebar, 'default_sidebar_below', false ) . '>' . esc_html__( 'Show Default Sidebar Below', 'memberlite' ) . '</option>';
		echo '<option value="default_sidebar_hide"' . selected( $memberlite_default_sidebar, 'default_sidebar_hide', false ) . '>' . esc_html__( 'Hide Default Sidebar', 'memberlite' ) . '</option>';
		echo '</select>';
	}
}

/**
 * Save custom sidebar selection when a post is saved.
 *
 * @param int $post_id The post ID.
 */
function memberlite_sidebar_save_meta_box_data( $post_id ) {
	if ( ! isset( $_POST['memberlite_sidebar_meta_box_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['memberlite_sidebar_meta_box_nonce'], 'memberlite_sidebar_meta_box' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	// Hide or show subpage menu in sidebar.
	if ( isset( $_POST['memberlite_hide_children_present'] ) ) {
		$memberlite_hide_children = ! empty( $_POST['memberlite_hide_children'] ) ? 1 : 0;
		update_post_meta( $post_id, '_memberlite_hide_children', $memberlite_hide_children );
	}

	// Custom sidebar selection.
	if ( isset( $_POST['memberlite_custom_sidebar'] ) ) {
		$memberlite_custom_sidebar = sanitize_text_field( wp_unslash( $_POST['memberlite_custom_sidebar'] ) );
		update_post_meta( $post_id, '_memberlite_custom_sidebar', $memberlite_custom_sidebar );
	}

	// Default sidebar behavior.
	if ( isset( $_POST['memberlite_default_sidebar'] ) ) {
		$memberlite_default_sidebar = sanitize_text_field( wp_unslash( $_POST['memberlite_default_sidebar'] ) );
		update_post_meta( $post_id, '_memberlite_default_sidebar', $memberlite_default_sidebar );
	}
}
add_action( 'save_post', 'memberlite_sidebar_save_meta_box_data' );

/**
 * Get the default sidebar for a specific CPT.
 *
 * @param string $post_type Post type slug.
 *
 * @return string|false Sidebar ID or false if none.
 */
function memberlite_get_default_sidebar_by_post_type( $post_type ) {
	$memberlite_cpt_sidebars = get_option( 'memberlite_cpt_sidebars', array() );

	if ( ! empty( $memberlite_cpt_sidebars[ $post_type ] ) ) {
		return $memberlite_cpt_sidebars[ $post_type ];
	}

	return false;
}

/**
 * Figure out which widget areas to use on the front end.
 *
 * @return array Unique array of sidebar IDs.
 */
function memberlite_get_widget_areas() {
	$widget_areas = array();

	if ( is_page() ) {
		// Add the submenu widget to the sidebar on Pages (not a real widget area; handled in memberlite_nav_menu_submenu() ).
		$widget_areas[] = 'memberlite_nav_menu_submenu';

		// Add the 'Pages' sidebar.
		$widget_areas[] = 'sidebar-1';
	} elseif ( function_exists( 'memberlite_is_blog' ) && memberlite_is_blog() ) {
		// Add the submenu widget to the sidebar (not a real widget area; handled in memberlite_nav_menu_submenu() ).
		$widget_areas[] = 'memberlite_nav_menu_submenu';

		// Add the 'Posts and Archives' sidebar.
		$widget_areas[] = 'sidebar-2';
	} else {
		// Add the 'Posts and Archives' sidebar.
		$widget_areas[] = 'sidebar-2';
	}

	// Get the queried object.
	$queried_object = get_queried_object();

	// If post, check for a post type-related sidebar.
	if ( ! empty( $queried_object ) ) {
		if ( empty( $queried_object->post_type ) && ! is_single() ) {
			$post_type = get_post_type();
		} else {
			$post_type = $queried_object->post_type;
		}

		// Look for a default sidebar.
		$default_sidebar = memberlite_get_default_sidebar_by_post_type( $post_type );

		// Check ancestors if no default found.
		if (
			! empty( $queried_object->post_parent )
			&& $queried_object->post_parent !== $queried_object->ID
			&& ( empty( $default_sidebar ) || 'memberlite_sidebar_default' === $default_sidebar )
		) {
			// Check parent.
			$parent_post = get_post( $queried_object->post_parent );
			if ( $parent_post && $parent_post->post_type !== $queried_object->post_type ) {
				$default_sidebar = memberlite_get_default_sidebar_by_post_type( $parent_post->post_type );
			}

			// Check oldest ancestor.
			if ( empty( $default_sidebar ) || 'memberlite_sidebar_default' === $default_sidebar ) {
				$ancestors = get_ancestors( $queried_object->ID, 'post' );
				if ( ! empty( $ancestors ) ) {
					$oldest_ancestor = get_post( $ancestors[ count( $ancestors ) - 1 ] );
					if ( $oldest_ancestor && $oldest_ancestor->post_type !== $queried_object->post_type ) {
						$default_sidebar = memberlite_get_default_sidebar_by_post_type( $oldest_ancestor->post_type );
					}
				}
			}
		}

		// Override the widget_areas with the default sidebar.
		if ( ! empty( $default_sidebar ) && 'memberlite_sidebar_default' !== $default_sidebar ) {
			if ( 'memberlite_sidebar_blank' === $default_sidebar ) {
				$widget_areas = array();
			} else {
				$widget_areas = array( $default_sidebar );
			}
		}

		// Figure out custom sidebar for this specific post.
		if ( ! empty( $queried_object->ID ) ) {
			$memberlite_custom_sidebar = get_post_meta( $queried_object->ID, '_memberlite_custom_sidebar', true );
		}
	}

	// Special case for bbPress search results page.
	if ( empty( $memberlite_custom_sidebar ) && function_exists( 'is_bbpress' ) && is_bbpress() && ! bbp_is_single_topic() ) {
		$widget_areas = array( memberlite_get_default_sidebar_by_post_type( 'forum' ) );
	}

	// If no custom sidebar for this specific post and we're on a blog page, check if the blog page has one to inherit.
	if ( empty( $memberlite_custom_sidebar ) && function_exists( 'memberlite_is_blog' ) && memberlite_is_blog() ) {
		$posts_page = get_option( 'page_for_posts' );
		if ( ! empty( $posts_page ) ) {
			$posts_page_obj = get_post( $posts_page );
			if ( $posts_page_obj ) {
				$memberlite_custom_sidebar = get_post_meta( $posts_page_obj->ID, '_memberlite_custom_sidebar', true );
			}
		}
	}

	if ( ! empty( $memberlite_custom_sidebar ) ) {
		if ( ! empty( $queried_object->ID ) ) {
			$memberlite_default_sidebar_position = get_post_meta( $queried_object->ID, '_memberlite_default_sidebar', true );
		} else {
			$memberlite_default_sidebar_position = false;
		}

		if ( 'default_sidebar_hide' === $memberlite_default_sidebar_position ) {
			$widget_areas = array( $memberlite_custom_sidebar );
		} elseif ( 'default_sidebar_below' === $memberlite_default_sidebar_position ) {
			$widget_areas = array_merge( array( $memberlite_custom_sidebar ), $widget_areas );
		} else {
			// Default to default_sidebar_above.
			$widget_areas = array_merge( $widget_areas, array( $memberlite_custom_sidebar ) );
		}
	}

	/**
	 * Filter the array of widget areas used on the front end.
	 *
	 * @param array $widget_areas Array of sidebar IDs.
	 */
	$widget_areas = apply_filters( 'memberlite_get_widget_areas', $widget_areas );

	return array_unique( $widget_areas );
}

/**
 * Hide subpage menu if option is chosen.
 *
 * @param array $widget_areas Array of sidebar IDs.
 *
 * @return array
 */
function memberlite_sidebar_hide_children( $widget_areas ) {
	$queried_object = get_queried_object();

	// If not a post, bail.
	if ( empty( $queried_object ) || empty( $queried_object->post_type ) ) {
		return $widget_areas;
	}

	// Are we even showing children?
	$memberlite_nav_menu_submenu_key = array_search( 'memberlite_nav_menu_submenu', $widget_areas, true );

	if ( false === $memberlite_nav_menu_submenu_key ) {
		return $widget_areas;
	}

	$memberlite_hide_children = get_post_meta( $queried_object->ID, '_memberlite_hide_children', true );

	if ( ! empty( $memberlite_hide_children ) ) {
		unset( $widget_areas[ $memberlite_nav_menu_submenu_key ] );
	}

	return $widget_areas;
}
add_filter( 'memberlite_get_widget_areas', 'memberlite_sidebar_hide_children' );
