<?php
class Memberlite_Aria_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * Assigns an ID to submenu <ul> elements so that toggle buttons can
	 * reference them via aria-controls.
	 *
	 * @param string   $output            Used to append additional content (passed by reference).
	 * @param int      $depth             Depth of menu item. Used for padding.
	 * @param stdClass $args              An object of wp_nav_menu() arguments.
	 * @param int      $current_item_id   ID of the current menu item (the parent li).
	 */
	public function start_lvl( &$output, $depth = 0, $args = null, $current_item_id = 0 ) {
		$indent = str_repeat( "\t", $depth );

		// Build a submenu ID from the parent menu item ID so toggle buttons
		// can point to it with aria-controls="submenu-{ID}".
		$submenu_id = $current_item_id ? ' id="submenu-' . esc_attr( $current_item_id ) . '"' : '';

		$output .= "\n$indent<ul$submenu_id class=\"sub-menu\">\n";
	}

	/**
	 * Start the element output.
	 *
	 * For items that have children, a <button> is injected immediately after
	 * the <a>. The button carries:
	 *   - aria-expanded="false"   — toggled by JS on click
	 *   - aria-controls           — points to the submenu's ID
	 *   - aria-label              — descriptive label for screen readers
	 *
	 * aria-haspopup and aria-expanded are intentionally NOT placed on the <li>
	 * or the <a>; they belong on the interactive control (the button).
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID (unused; item ID is on $item->ID).
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = $depth ? str_repeat( "\t", $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/** This filter is documented in wp-includes/class-walker-nav-menu.php */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/** This filter is documented in wp-includes/class-walker-nav-menu.php */
		$class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/** This filter is documented in wp-includes/class-walker-nav-menu.php */
		$li_id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$li_id = $li_id ? ' id="' . esc_attr( $li_id ) . '"' : '';

		// No aria attributes on the <li> itself. Interactive children handle
		// their own states.
		$output .= "$indent<li$li_id$class_names>";

		// Build anchor attributes.
		$atts          = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/** This filter is documented in wp-includes/class-walker-nav-menu.php */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/** This filter is documented in wp-includes/class-walker-nav-menu.php */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';

		// Inject a toggle button for items that have a submenu. The button is
		// the only element that carries aria-expanded and aria-controls; JS will
		// toggle aria-expanded between "true" and "false" on click.
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$submenu_id   = 'submenu-' . $item->ID;
			// Translators: %s is the menu item title. Describes the toggle button to screen readers.
			$button_label = sprintf( esc_attr__( 'Toggle submenu for %s', 'memberlite' ), $title );

			$item_output .= sprintf(
				'<button type="button" aria-expanded="false" aria-controls="%s" aria-label="%s">',
				esc_attr( $submenu_id ),
				$button_label
			);
			// SVG chevron — hidden from AT since the button's aria-label carries
			// the full accessible name. Role and focusable are set explicitly for
			// IE11 compatibility.
			$item_output .= '<span aria-hidden="true" class="fa fa-angle-down"></span></button>';
		}

		$item_output .= $args->after;

		/** This filter is documented in wp-includes/class-walker-nav-menu.php */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function memberlite_set_aria_walker_for_header_sidebar( $params ) {
	if ( isset( $params[0]['id'] ) && 'sidebar-3' === $params[0]['id'] ) {
		add_filter( 'wp_nav_menu_args', 'memberlite_set_aria_walker' );
		add_action( 'dynamic_sidebar_after', 'memberlite_remove_aria_walker_filter' );
	}
	return $params;
}
add_filter( 'dynamic_sidebar_params', 'memberlite_set_aria_walker_for_header_sidebar' );

function memberlite_set_aria_walker( $args ) {
	$args['walker'] = new Memberlite_Aria_Walker_Nav_Menu();
	return $args;
}

function memberlite_remove_aria_walker_filter() {
	remove_filter( 'wp_nav_menu_args', 'memberlite_set_aria_walker' );
	remove_action( 'dynamic_sidebar_after', 'memberlite_remove_aria_walker_filter' );
}
