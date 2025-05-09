<?php
/**
 * This code is used to add a second featured image to the single post template.
 *
 * This code is based off the Multiple Post Thumbnails plugin by Chris Scott.
 */



if (!class_exists('MemberliteMultiPostThumbnails')) {

	class MemberliteMultiPostThumbnails {

		/**
		 * Records if the scripts and styles have been enqueued so that we only
		 * do so once.
		 *
		 * @var boolean
		 */
		protected static $statics_enqueued = false;

		// Declare all instance properties used in this class
		public $label;
		public $id;
		public $post_type;
		public $priority;
		public $context;

		public function __construct($args = array()) {
			$this->register($args);
		}

		/**
		 * Register a new post thumbnail.
		 *
		 * @param array|string $args See above description.
		 * @return void
		 */
		public function register($args = array()) {
			global $wp_version;
			
			$defaults = array(
				'label'     => null,
				'id'        => null,
				'post_type' => 'post',
				'priority'  => 'low',
				'context'   => 'side',
			);

			$args = wp_parse_args($args, $defaults);

			// Assign properties only if they exist in the class
			foreach ($args as $k => $v) {
				if (property_exists($this, $k)) {
					$this->$k = $v;
				}
			}

			// Validate the required args
			if (null === $this->label || null === $this->id) {
				if (WP_DEBUG) {
					/* translators: 1: class name, 2: function name */
					trigger_error(
						sprintf(
							esc_html__("The 'label' and 'id' values of the 'args' parameter of '%1$s::%2$s()' are required", 'memberlite'),
							__CLASS__,
							__FUNCTION__
						)
					);
				}
				return;
			}

			// Add theme support if not already added
			if (!current_theme_supports('post-thumbnails')) {
				add_theme_support('post-thumbnails');
			}

			// Hook actions and filters
			add_action('add_meta_boxes', array($this, 'add_metabox'));
			add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
			add_action('admin_print_scripts-post.php', array($this, 'admin_header_scripts'));
			add_action('admin_print_scripts-post-new.php', array($this, 'admin_header_scripts'));
			add_action("wp_ajax_set-{$this->post_type}-{$this->id}-thumbnail", array($this, 'set_thumbnail'));
			add_action('delete_attachment', array($this, 'action_delete_attachment'));
			add_filter('is_protected_meta', array($this, 'filter_is_protected_meta'), 20, 2);
		}
		
		/**
		 * get the meta key used to store a post's thumbnail
		 * 
		 * @return string 
		 */
		public function get_meta_key() {
			return "{$this->post_type}_{$this->id}_thumbnail_id";
		}

		/**
		 * Add admin metabox for thumbnail chooser
		 *
		 * @return void
		 */
		public function add_metabox() {
			add_meta_box("{$this->post_type}-{$this->id}", __($this->label, 'memberlite'), array($this, 'thumbnail_meta_box'), $this->post_type, $this->context, $this->priority);
		}

		/**
		 * Output the thumbnail meta box
		 *
		 * @return string HTML output
		 */
		public function thumbnail_meta_box() {
			global $post;
			
			$thumbnail_id = get_post_meta($post->ID, $this->get_meta_key(), true);
			echo $this->post_thumbnail_html($thumbnail_id);	
		}

		/**
		 * Throw this in the media attachment fields
		 *
		 * @param string $form_fields
		 * @param string $post
		 * @return void
		 */
		public function add_attachment_field($form_fields, $post) {
			$calling_post_id = 0;
			if (isset($_GET['post_id']))
				$calling_post_id = absint($_GET['post_id']);
			elseif (isset($_POST) && count($_POST)) // Like for async-upload where $_GET['post_id'] isn't set
				$calling_post_id = $post->post_parent;

			if (!$calling_post_id)
				return $form_fields;

			// check the post type to see if link needs to be added
			$calling_post = get_post($calling_post_id);
			if (is_null($calling_post) || $calling_post->post_type != $this->post_type) {
				return $form_fields;
			}

			$referer = wp_get_referer();
			$query_vars = wp_parse_args(parse_url($referer, PHP_URL_QUERY));
			
			if( (isset($_REQUEST['context']) && $_REQUEST['context'] != $this->id) || (isset($query_vars['context']) && $query_vars['context'] != $this->id) )
				return $form_fields;

			$ajax_nonce = wp_create_nonce("set_post_thumbnail-{$this->post_type}-{$this->id}-{$calling_post_id}");
			$link = sprintf('<a id="%4$s-%1$s-thumbnail-%2$s" class="%1$s-thumbnail" href="#" onclick="MemberliteMultiPostThumbnails.setAsThumbnail(\'%2$s\', \'%1$s\', \'%4$s\', \'%5$s\');return false;">' . __( 'Set as %3$s', 'memberlite' ) . '</a>', $this->id, $post->ID, $this->label, $this->post_type, $ajax_nonce);
			$form_fields["{$this->post_type}-{$this->id}-thumbnail"] = array(
				'label' => $this->label,
				'input' => 'html',
				'html' => $link);
			return $form_fields;
		}

		/**
		 * Enqueue admin JavaScripts
		 *
		 * @return void
		 */
		public function enqueue_admin_scripts( $hook ) {
			if ( self::$statics_enqueued ) {
				return;
			}

			global $post_ID;
			
			// only load on select pages
			if ( ! in_array( $hook, array( 'post-new.php', 'post.php', 'media-upload-popup' ) ) )
				return;

			wp_enqueue_media( array( 'post' => ( $post_ID ? $post_ID : null ) ) );
			wp_enqueue_script( "mpt-featured-image", get_template_directory_uri() . '/js/multi-post-thumbnails-admin.js', array( 'jquery', 'set-post-thumbnail' ) );
			wp_enqueue_script( "mpt-featured-image-modal", get_template_directory_uri() . '/js/media-modal.js', array( 'jquery', 'media-models' ) );

			self::$statics_enqueued = true;
		}
		
		public function admin_header_scripts() {
			$post_id = get_the_ID();
			echo "<script>var post_id = $post_id;</script>";
		}

		/**
		 * Deletes the post meta data for posts when an attachment used as a
		 * multiple post thumbnail is deleted from the Media Libray
		 *
		 * @global object $wpdb
		 * @param int $post_id
		 */
		public function action_delete_attachment($post_id) {
			global $wpdb;

			$wpdb->query( $wpdb->prepare( "DELETE FROM $wpdb->postmeta WHERE meta_key = '%s' AND meta_value = %d", $this->get_meta_key(), $post_id ));
		}
		
		/**
		 * make the meta for storing thumbnails protected so it doesn't show in the Custom Fields metabox
		 * 
		 * @param boolean $protected Passed in from filter
		 * @param type $meta_key Passed in from filter
		 * @return boolean 
		 */
		public function filter_is_protected_meta($protected, $meta_key) {
			/**
			 * Filter to allow the meta key to be unprotected
			 *
			 * @param boolean $protected
			 */
			if ( apply_filters('memberlite_unprotect_meta', false) ) {
				return $protected;
			}
			
			if ($meta_key == $this->get_meta_key()) {
				$protected = true;
			}
			
			return $protected;
		}

		/**
		 * allow the plugin to be in the plugins directory or the theme directory
		 *
		 * @param string $relative_path Relative file path to the plugin file to get the URL of
		 * @param string $plugin_path Absolute file path to the plugin base directory
		 * @return string the URL of the plugin file
		 */
		private function plugins_url($relative_path, $plugin_path) {
			$template_dir = get_stylesheet_directory();

			foreach ( array('template_dir', 'plugin_path') as $var ) {
				$$var = str_replace('\\' ,'/', $$var); // sanitize for Win32 installs
				$$var = preg_replace('|/+|', '/', $$var);
			}

			if(0 === strpos($plugin_path, $template_dir)) {
				$url = get_stylesheet_directory_uri();
				$folder = str_replace($template_dir, '', dirname($plugin_path));
				if ( '.' != $folder ) {
					$url .= '/' . ltrim($folder, '/');
				}
				if ( !empty($relative_path) && is_string($relative_path) && strpos($relative_path, '..') === false ) {
					$url .= '/' . ltrim($relative_path, '/');
				}
				return $url;
			} else {
				return plugins_url($relative_path, $plugin_path);
			}
		}

		/**
		 * Check if post has an image attached.
		 *
		 * @param string $post_type The post type.
		 * @param string $id The id used to register the thumbnail.
		 * @param string $post_id Optional. Post ID.
		 * @return bool Whether post has an image attached.
		 */
		public static function has_post_thumbnail($post_type, $id, $post_id = null) {
			if (null === $post_id) {
				$post_id = get_the_ID();
			}

			if (!$post_id) {
				return false;
			}

			return get_post_meta($post_id, "{$post_type}_{$id}_thumbnail_id", true);
		}

		/**
		 * Display Post Thumbnail.
		 *
		 * @param string $post_type The post type.
		 * @param string $thumb_id The id used to register the thumbnail.
		 * @param string $post_id Optional. Post ID.
		 * @param int $size Optional. Image size.  Defaults to 'post-thumbnail', which theme sets using set_post_thumbnail_size( $width, $height, $crop_flag );.
		 * @param string|array $attr Optional. Query string or array of attributes.
		 * @param bool $link_to_original Optional. Wrap link to original image around thumbnail?
		 */
		public static function the_post_thumbnail($post_type, $thumb_id, $post_id = null, $size = 'post-thumbnail', $attr = '', $link_to_original = false) {
			echo self::get_the_post_thumbnail($post_type, $thumb_id, $post_id, $size, $attr, $link_to_original);
		}

		/**
		 * Retrieve Post Thumbnail.
		 *
		 * @param string $post_type The post type.
		 * @param string $thumb_id The id used to register the thumbnail.
		 * @param int $post_id Optional. Post ID.
		 * @param string $size Optional. Image size.  Defaults to 'thumbnail'.
		 * @param bool $link_to_original Optional. Wrap link to original image around thumbnail?
		 * @param string|array $attr Optional. Query string or array of attributes.
		  */
		public static function get_the_post_thumbnail($post_type, $thumb_id, $post_id = NULL, $size = 'post-thumbnail', $attr = '' , $link_to_original = false) {
			global $id;
			$post_id = (NULL === $post_id) ? get_the_ID() : $post_id;
			$post_thumbnail_id = self::get_post_thumbnail_id($post_type, $thumb_id, $post_id);
			$size = apply_filters("{$post_type}_{$post_id}_thumbnail_size", $size);
			if ($post_thumbnail_id) {
				do_action("begin_fetch_multi_{$post_type}_thumbnail_html", $post_id, $post_thumbnail_id, $size); // for "Just In Time" filtering of all of wp_get_attachment_image()'s filters
				$html = wp_get_attachment_image( $post_thumbnail_id, $size, false, $attr );
				do_action("end_fetch_multi_{$post_type}_thumbnail_html", $post_id, $post_thumbnail_id, $size);
			} else {
				$html = '';
			}

			if ($link_to_original && $html) {
				$html = sprintf('<a href="%s">%s</a>', wp_get_attachment_url($post_thumbnail_id), $html);
			}

			return apply_filters("{$post_type}_{$thumb_id}_thumbnail_html", $html, $post_id, $post_thumbnail_id, $size, $attr);
		}

		/**
		 * Retrieve Post Thumbnail ID.
		 *
		 * @param string $post_type The post type.
		 * @param string $id The id used to register the thumbnail.
		 * @param int $post_id Post ID.
		 * @return int
		 */
		public static function get_post_thumbnail_id($post_type, $id, $post_id) {
			return get_post_meta($post_id, "{$post_type}_{$id}_thumbnail_id", true);
		}

		/**
		 *
		 * @param string $post_type The post type.
		 * @param string $id The id used to register the thumbnail.
		 * @param int $post_id Optional. The post ID. If not set, will attempt to get it.
		 * @param string $size Optional. The thumbnail size to use. If set, use wp_get_attachment_image_src() instead of wp_get_attachment_url()
		 * @return mixed Thumbnail url or false if the post doesn't have a thumbnail for the given post type, and id.
		 */
		public static function get_post_thumbnail_url($post_type, $id, $post_id = 0, $size = null) {
			if (!$post_id) {
				$post_id = get_the_ID();
			}

			$post_thumbnail_id = self::get_post_thumbnail_id($post_type, $id, $post_id);

			if ($size) {
				if ($url = wp_get_attachment_image_src($post_thumbnail_id, $size)) {
					$url = $url[0];
				} else {
					$url = '';
				}
			} else {
				$url = wp_get_attachment_url($post_thumbnail_id);
			}

			return $url;
		}

		/**
		 * Output the post thumbnail HTML for the metabox and AJAX callbacks
		 *
		 * @param string $thumbnail_id The thumbnail's post ID.
		 * @return string HTML
		 */
		private function post_thumbnail_html($thumbnail_id = null) {
			global $content_width, $_wp_additional_image_sizes, $post_ID, $wp_version;
			
			$url_class = "";
			$ajax_nonce = wp_create_nonce("set_post_thumbnail-{$this->post_type}-{$this->id}-{$post_ID}");
			
			// Use the media modal for 3.5 and up
			$image_library_url = "#";
			$modal_js = sprintf(
				'var mm_%3$s = new MediaModal({
					calling_selector : "#set-%1$s-%2$s-thumbnail",
					cb : function(attachment){
						MemberliteMultiPostThumbnails.setAsThumbnail(attachment.id, "%2$s", "%1$s", "%4$s");
					}
				});',
				$this->post_type, $this->id, md5($this->id), $ajax_nonce
			);

			$format_string = '<p class="hide-if-no-js"><a title="%1$s" href="%2$s" id="set-%3$s-%4$s-thumbnail" class="%5$s" data-thumbnail_id="%7$s" data-uploader_title="%1$s" data-uploader_button_text="%1$s">%%s</a></p>';
			/* translators: %s is the Banner Image label. */
			$set_thumbnail_link = sprintf( $format_string, sprintf( esc_attr__( "Set %s" , 'memberlite' ), $this->label ), esc_url($image_library_url), $this->post_type, $this->id, $url_class, $this->label, $thumbnail_id );
			/* translators: %s is the Banner Image label. */
			$content = sprintf( $set_thumbnail_link, sprintf( esc_html__( "Set %s", 'memberlite' ), $this->label ) );

			if ($thumbnail_id && get_post($thumbnail_id)) {
				$old_content_width = $content_width;
				$content_width = 266;
				$attr = array( 'class' => 'mpt-thumbnail' );
				
				if ( !isset($_wp_additional_image_sizes["{$this->post_type}-{$this->id}-thumbnail"])) {
						$thumbnail_html = wp_get_attachment_image( $thumbnail_id, array($content_width, $content_width), false, $attr );
				} else {
						$thumbnail_html = wp_get_attachment_image( $thumbnail_id, "{$this->post_type}-{$this->id}-thumbnail", false, $attr );
				}
				
				if (!empty($thumbnail_html)) {
					$content = sprintf($set_thumbnail_link, $thumbnail_html);
					$format_string = '<p class="hide-if-no-js"><a href="#" id="remove-%1$s-%2$s-thumbnail" onclick="MemberliteMultiPostThumbnails.removeThumbnail(\'%2$s\', \'%1$s\', \'%4$s\');return false;">%3$s</a></p>';
					// translators: %s is the Banner Image label.
					$content .= sprintf( $format_string, $this->post_type, $this->id, sprintf( esc_html__( "Remove %s", 'memberlite' ), $this->label ), $ajax_nonce );
				}
				$content_width = $old_content_width;
			}

			$content .= sprintf('<script>%s</script>', $modal_js);

			return apply_filters( sprintf( '%s_%s_admin_post_thumbnail_html', $this->post_type, $this->id ), $content, $post_ID, $thumbnail_id );
		}

		/**
		 * Set/remove the post thumbnail. AJAX handler.
		 *
		 * @return string Updated post thumbnail HTML.
		 */
		public function set_thumbnail() {
			global $post_ID; // have to do this so get_upload_iframe_src() can grab it
			$post_ID = intval($_POST['post_id']);
			if ( !current_user_can('edit_post', $post_ID))
				die('-1');
			$thumbnail_id = intval($_POST['thumbnail_id']);

			check_ajax_referer("set_post_thumbnail-{$this->post_type}-{$this->id}-{$post_ID}");

			if ($thumbnail_id == '-1') {
				delete_post_meta($post_ID, $this->get_meta_key());
				die($this->post_thumbnail_html(null));
			}

			if ($thumbnail_id && get_post($thumbnail_id)) {
				$thumbnail_html = wp_get_attachment_image($thumbnail_id, 'thumbnail');
				if (!empty($thumbnail_html)) {
					$this->set_meta($post_ID, $this->post_type, $this->id, $thumbnail_id);
					die($this->post_thumbnail_html($thumbnail_id));
				}
			}

			die('0');
		}
		
		/**
		 * set thumbnail meta
		 * 
		 * @param int $post_ID
		 * @param string $post_type
		 * @param string $thumbnail_id ID used to register the thumbnail
		 * @param int $thumbnail_post_id ID of the attachment to use as the thumbnail
		 * @return bool result of update_post_meta
		 */
		public static function set_meta($post_ID, $post_type, $thumbnail_id, $thumbnail_post_id) {
			return update_post_meta($post_ID, "{$post_type}_{$thumbnail_id}_thumbnail_id", $thumbnail_post_id);
		}

	}

}
