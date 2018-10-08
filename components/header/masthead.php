<?php
/**
 * Displays the page masthead content
 *
 * @package Memberlite
 */
?>

<?php do_action( 'memberlite_before_masthead' ); ?>

<?php
global $post;
$memberlite_banner_show = apply_filters( 'memberlite_banner_show', true );

if ( ! empty( $memberlite_banner_show ) ) { ?>

	<?php do_action( 'memberlite_before_masthead_outer' ); ?>

	<header class="masthead">
		<div class="row">
			<div class="medium-<?php echo esc_attr( memberlite_getColumnsRatio( 'masthead' ) ); ?> columns">

				<?php do_action( 'memberlite_before_masthead_inner' ); ?>

				<?php
				if ( is_page_template( 'templates/interstitial.php' ) ) {
					$referrer = isset( $_GET['redirect_to'] ) ? esc_url_raw( wp_unslash( $_GET['redirect_to'] ) ) : null;
					?>
					<a class="btn" href="<?php echo esc_url( $referrer ); ?>"><?php esc_html_e( 'No Thanks &raquo;', 'memberlite' ); ?></a>
				<?php } ?>

				<?php memberlite_getBreadcrumbs(); ?>

				<?php
				$memberlite_masthead_content = apply_filters( 'memberlite_masthead_content', '' );
				if ( $memberlite_masthead_content === '' ) {
					// Just show the page title
					memberlite_page_title();
				} else {
					echo wp_kses_post( $memberlite_masthead_content );
				}
				?>

				<?php do_action( 'memberlite_after_masthead_inner' ); ?>

			</div><!--.columns-->
		</div><!-- .row -->
	</header><!-- .masthead -->

	<?php do_action( 'memberlite_after_masthead_outer' ); ?>

<?php } // End if(). ?>

<?php do_action( 'memberlite_after_masthead' ); ?>
