<?php
/**
 * Memberlite's Patterns class file
 *
 * @since TBD
 */

/**
 * Main Class.
 *
 * @since TBD
 */
final class Memberlite_Patterns {
	/**
	 * Array of patterns.
	 *
	 * @since TBD
	 */
	public static $patterns = array(
		'about-the-founder',
		'call-to-action-with-image',
		'content-upgrade-1',
		'content-upgrade-2',
		'content-upgrade-3',
		'featured-box-with-photo-grid',
		'featured-testimonial',
		'features-grid-with-icons',
		'homepage-hero',
		'meet-the-team-1',
		'meet-the-team-2',
		'membership-call-to-action',
		'section-with-image-and-three-features',
		'social-proof-trusted-by-logos',
		'testimonials-grid-of-two',
		'testimonials-grid-of-four',
	);

	/**
	 * Array of categories.
	 *
	 * @since TBD
	 */
	public static $categories = array(
		'memberlite-featured'     => 'Memberlite - Featured',
		'memberlite-cta'          => 'Memberlite - Call to Action',
		'memberlite-team'         => 'Memberlite - Team',
		'memberlite-about'        => 'Memberlite - About',
		'memberlite-hero'         => 'Memberlite - Hero',
		'memberlite-testimonials' => 'Memberlite - Testimonials',
		'memberlite-services'     => 'Memberlite - Services',
	);

	/**
	 * Constructor.
	 *
	 * @since TBD
	 */
	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_patterns' ) );
	}

	/**
	 * Get patterns.
	 *
	 * @since TBD
	 */
	public static function get_patterns() {
		$all_patterns = array();

		foreach ( self::$patterns as $pattern ) {

			$all_patterns[] = $pattern;
		}

		return $all_patterns;
	}

	/**
	 * Register patterns.
	 *
	 * @since TBD
	 */
	public static function register_patterns(): void {

		$patterns = self::get_patterns();

		// Registering the categories.
		foreach ( self::$categories as $category_id => $category_name ) {

			register_block_pattern_category(
				$category_id,
				array(
					'label' => $category_name,
				)
			);
		}

		// Registering the patterns.
		foreach ( $patterns as $pattern ) {

			$pattern_data = self::get_pattern_data( $pattern );

			register_block_pattern(
				'memberlite/' . $pattern,
				array(
					'title'       => $pattern_data['title'],
					'description' => $pattern_data['title'],
					'categories'  => $pattern_data['categories'],
					'keywords'    => $pattern_data['keywords'],
					'content'     => $pattern_data['content'],
				)
			);
		}
	}

	/**
	 * Get pattern data.
	 *
	 * @since TBD
	 */
	public static function get_pattern_data( $pattern ) {
		return include_once get_template_directory() . '/patterns/' . $pattern . '.php';
	}
}

Memberlite_Patterns::init();
