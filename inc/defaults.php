<?php
/**
 * Get default theme settings
 *
 * Merges non-color defaults with the default color scheme.
 *
 * @since 7.0
 * @return array
 */
function memberlite_get_defaults(): array {
	$defaults = array(
		// Typography
		'memberlite_header_font'            => 'Lato',
		'memberlite_body_font'              => 'Lato',

		// Layout
		'columns_ratio'                     => '8-4',
		'columns_ratio_blog'                => '8-4',
		'columns_ratio_header'              => '4-8',
		'sidebar_location'                  => 'sidebar-right',
		'sidebar_location_blog'             => 'sidebar-blog-right',

		// Archives
		'content_archives'                  => 'content',
		'memberlite_loop_images'            => 'show_none',

		// Post Meta
		'posts_entry_meta_before'           => __( 'Posted on {post_date} by {post_author_posts_link}', 'memberlite' ),
		'posts_entry_meta_after'            => __( 'This entry was posted in {post_categories} and tagged {post_tags}. Bookmark the {post_permalink}.', 'memberlite' ),
		'author_block'                      => false,

		// Footer
		'memberlite_footerwidgets'          => '4',
		'copyright_textbox'                 => '&copy; !!current_year!! !!site_title!!',
		'memberlite_back_to_top'            => true,

		// Color Scheme
		'memberlite_color_scheme'           => 'default',

		// Other
		'delimiter'							=> '&nbsp;&#47;&nbsp;',
		'hover_brightness'                  => '1.1',
		'color_white'                       => 'ffffff',
	);

	// Merge with default color scheme
	$defaults = array_merge( $defaults, memberlite_get_default_colors() );

	/**
	 * Filter Memberlite default settings.
	 *
	 * @since 7.0
	 * @param array $defaults Associative array of default settings.
	 */
	return apply_filters( 'memberlite_defaults', $defaults );
}

// Initialize global defaults
global $memberlite_defaults;
$memberlite_defaults = memberlite_get_defaults();
