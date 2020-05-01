<?php
/*
	Don't show the page nav on the PMPro Membership Account page and subpages.
*/
function memberlite_pmpro_theme_mod_memberlite_page_nav( $mod ) {
	global $pmpro_pages, $post;

	// no post or pmpro_pages and we stop
	if ( empty( $pmpro_pages ) || empty( $pmpro_pages['account'] ) || empty( $post ) || empty( $post->ID ) ) {
		return $mod;
	}

	// which page to be checking
	if ( ! empty( $post->post_parent ) ) {
		$post_ancestors = get_post_ancestors( $post );
		$toplevelpost   = end( $post_ancestors );
	} else {
		$toplevelpost = $post->ID;
	}

	if ( $toplevelpost == $pmpro_pages['account'] ) {
		$mod = 0;
	}

	return $mod;
}
add_filter( 'theme_mod_memberlite_page_nav', 'memberlite_pmpro_theme_mod_memberlite_page_nav' );

/**
 * Filter the page title on the Log In page based on page action.
 *
 */
function pmpro_login_memberlite_page_title( $page_title_html ) {
	global $pmpro_pages;

	if ( ! is_main_query() ) {
		return $page_title_html;
	}

	if ( empty( $pmpro_pages ) || empty( $pmpro_pages['login'] ) ) {
		return $page_title_html;
	}

	if ( ! is_page( $pmpro_pages['login'] ) ) {
		return $page_title_html;
	}

	if ( is_user_logged_in() ) {
		$title = __( 'Welcome', 'memberlite' );
	} elseif ( ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'reset_pass' ) {
		$title = __( 'Lost Password', 'memberlite' );
	} elseif ( ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'rp' ) {
		$title = __( 'Reset Password', 'memberlite' );
	} else {
		return $page_title_html;
	}

	$page_title_html = '<h1 class="page-title">' . esc_html( $title ) . '</h1>';

	return $page_title_html;
}
add_filter( 'memberlite_page_title', 'pmpro_login_memberlite_page_title' );
