<?php
/**
 * Masthead — default variation.
 *
 * Handles all contexts: single posts (with byline), singular pages, and archives.
 *
 * @version TBD
 *
 * @package Memberlite
 */
?>

<?php do_action( 'memberlite_before_masthead' ); ?>

<?php
// Check _memberlite_banner_show meta to determine if the masthead should display.
$memberlite_banner_post_id = get_queried_object_id();
if ( empty( $memberlite_banner_post_id ) && ( is_home() || is_post_type_archive( 'post' ) ) ) {
	$memberlite_banner_post_id = get_option( 'page_for_posts' );
}
$memberlite_banner_show = true;
if ( ! empty( $memberlite_banner_post_id ) && get_post_meta( $memberlite_banner_post_id, '_memberlite_banner_show', true ) === '0' ) {
	$memberlite_banner_show = false;
}
$memberlite_banner_show = apply_filters( 'memberlite_banner_show', $memberlite_banner_show );
$banner_image_url = memberlite_get_masthead_banner_image_url();

if ( ! empty( $memberlite_banner_show ) ) { ?>

	<?php do_action( 'memberlite_before_masthead_outer' ); ?>

	<div class="masthead">
		<?php if ( $banner_image_url ) { ?>
			<img class="banner-image" src="<?php echo esc_url( $banner_image_url ); ?>" alt="" aria-hidden="true" />
			<div class="masthead-banner">
		<?php } ?>
		<div class="row">
			<div class="medium-<?php echo esc_attr( memberlite_getColumnsRatio( 'masthead' ) ); ?> columns">

				<?php do_action( 'memberlite_before_masthead_inner' ); ?>

				<?php memberlite_get_breadcrumbs(); ?>

				<?php if ( is_singular( 'post' ) ) : ?>

					<div class="masthead-post-byline">
						<?php
							$author_avatar_allowed_html = array(
								'div' => array(
									'class' => array(),
								),
								'img' => array(
									'alt'     => array(),
									'class'   => array(),
									'height'  => array(),
									'loading' => array(),
									'src'     => array(),
									'title'   => array(),
									'width'   => array(),
								),
								'noscript' => array(),
							);
							$author_avatar = memberlite_get_author_avatar( $post->post_author );
							echo empty( $author_avatar ) ? '' : wp_kses( $author_avatar, $author_avatar_allowed_html );
						?>
						<div class="entry-header-content">
							<?php the_title( '<h1 class="entry-title" id="page-title">', '</h1>' ); ?>
							<?php
							$memberlite_get_entry_meta_before = memberlite_get_entry_meta( $post, 'before' );
							if ( ! empty( $memberlite_get_entry_meta_before ) ) {
								?>
								<p class="entry-meta">
									<?php echo Memberlite_Customize::sanitize_text_with_links( $memberlite_get_entry_meta_before ); // WPCS: xss ok. ?>
								</p><!-- .entry-meta -->
								<?php
							}
							?>
						</div> <!-- .entry-header-content -->
					</div>

				<?php else : ?>

					<?php
					$memberlite_masthead_content = apply_filters( 'memberlite_masthead_content', '' );
					if ( $memberlite_masthead_content === '' ) {
						echo wp_kses_post( memberlite_get_page_title() . memberlite_get_page_description() );
					} else {
						echo wp_kses_post( $memberlite_masthead_content );
					}
					?>

				<?php endif; ?>

				<?php do_action( 'memberlite_after_masthead_inner' ); ?>

			</div><!--.columns-->
		</div><!-- .row -->
		<?php if ( $banner_image_url ) { ?>
			</div><!--.masthead-banner-->
		<?php } ?>
	</div><!-- .masthead -->

	<?php do_action( 'memberlite_after_masthead_outer' ); ?>

<?php } // End if(). ?>

<?php do_action( 'memberlite_after_masthead' ); ?>
