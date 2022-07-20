<?php
/**
 * Custom widgets that act independently of the theme templates.
 **/

/**
 * Recent Posts with Thumbnails Widget
 * Based on the Recent_Posts widget class in core WP
 * /wp-includes/widgets/class-wp-widget-recent-posts.php
 */
class Memberlite_Widget_Recent_Posts_Thumbnails extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_recent_entries_thumbnails',
			'description' => __( 'Your site&#8217;s most recent Posts with Thumbnails.', 'memberlite' ),
		);
		parent::__construct( 'recent-posts-thumbnails', esc_html__( 'Recent Posts w/Thumbnails', 'memberlite' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_entries_thumbnails';

		add_action( 'save_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_recent_posts_thumbnails', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query(
			apply_filters(
				'widget_posts_args', array(
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				)
			)
		);

		if ( $r->have_posts() ) : ?>
			<?php echo $before_widget; ?>
			<?php if ( $title ) {
				echo $before_title . $title . $after_title;
			} ?>
			<ul>
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li>
					<?php if ( has_post_thumbnail() ) { ?>
						<a class="widget_post_thumbnail" href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( get_post_thumbnail_id( ), 'thumbnail' ); ?></a>
					<?php } elseif ( 'video' == get_post_format() ) { ?>
						<a class="widget_post_thumbnail" href="<?php the_permalink(); ?>"><i class="fa fa-video"></i></a>
					<?php } else { ?>
						<a class="widget_post_thumbnail" href="<?php the_permalink(); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 80, false, get_the_author_meta( 'display_name' ) ); ?></a>
					<?php } ?>
					<div class="entry-title"><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></div>
					<?php if ( $show_date ) : ?>
						<span class="post-date"><?php echo get_the_date(); ?></span>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php echo $after_widget; ?>
			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();
		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_recent_posts_thumbnails', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_recent_entries_thumbnails'] ) ) {
			delete_option( 'widget_recent_entries_thumbnails' );
		}

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_recent_posts_thumbnails', 'widget' );
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'memberlite' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'memberlite' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Display post date?', 'memberlite' ); ?></label></p>
<?php
	}
}
/* End Recent Posts with Thumbnails Widget */

/**
 * Register the Widgets
 */
function memberlite_register_widgets() {
	register_widget( 'Memberlite_Widget_Recent_Posts_Thumbnails' );
}
add_action( 'widgets_init', 'memberlite_register_widgets' );
