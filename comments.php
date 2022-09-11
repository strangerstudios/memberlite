<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Memberlite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>

		<?php
			$memberlite_comments   = get_comments(
				array(
					'type'    => 'comment',
					'post_id' => $post->ID,
					'status'  => 'approve',
				)
			);
			$memberlite_trackbacks = get_comments(
				array(
					'type'    => 'trackback',
					'post_id' => $post->ID,
					'status'  => 'approve',
				)
			);
			$memberlite_pingbacks  = get_comments(
				array(
					'type'    => 'pingback',
					'post_id' => $post->ID,
					'status'  => 'approve',
				)
			);
		?>

		<?php
			if ( count( $memberlite_trackbacks ) == 0 && count( $memberlite_pingbacks ) == 0 ) { ?>
				<h2>
					<?php
						/* translators: %s: number of comments */
						printf( esc_html__( 'Comments (%s)', 'memberlite' ), count( $memberlite_comments ) );
					?>
				</h2>
				<?php the_comments_navigation(); ?>
				<?php
				wp_list_comments(
					array(
						'avatar_size'	=> 40,
						'per_page'		=> 0,
						'type'			=> 'comment',
						'style'			=> 'div',
					)
				);
			?>
			<?php the_comments_navigation(); ?>
				<?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
					<p class="pmpro_message pmpro_alert no-comments"><?php esc_html_e( 'Comments are closed.', 'memberlite' ); ?></p>
				<?php }
			} else { ?>
				<div class="memberlite_tabbable">
					<ul class="memberlite_tabs">
						<?php if ( count( $memberlite_comments ) > 0 ) { ?>
							<li class="memberlite_active"><a href="#tab-comments" data-toggle="tab">
								<?php
									/* translators: %s: number of comments */
									printf( esc_html__( 'Comments (%s)', 'memberlite' ), count( $memberlite_comments ) );
								?>
							</a></li>
						<?php } ?>

						<?php if ( count( $memberlite_trackbacks ) > 0 ) { ?>
							<li><a href="#tab-tracks" data-toggle="tab">
								<?php
									/* translators: %s: number of trackbacks */
									printf( esc_html__( 'Trackbacks (%s)', 'memberlite' ), count( $memberlite_trackbacks ) );
								?>
							</a></li>
						<?php } ?>

						<?php if ( count( $memberlite_pingbacks ) > 0 ) { ?>
							<li><a href="#tab-pings" data-toggle="tab">
								<?php
									/* translators: number of pingbacks */
									printf( esc_html__( 'Pingbacks (%s)', 'memberlite' ), count( $memberlite_pingbacks ) );
								?>
							</a></li>
						<?php } ?>
					</ul>
					<div class="memberlite_tab_content">
					<?php if ( count( $memberlite_comments ) > 0 ) { ?>
						<div class="memberlite_tab_pane memberlite_active" id="tab-comments">
							<?php the_comments_navigation(); ?>
							<?php
								wp_list_comments(
									array(
										'avatar_size'	=> 40,
										'per_page' => 0,
										'type'     => 'comment',
										'style'    => 'div',
									)
								);
							?>
							<?php the_comments_navigation(); ?>
							<?php
								// If comments are closed and there are comments, let's leave a little note, shall we?
							if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
							?>
							<p class="pmpro_message pmpro_alert no-comments"><?php esc_html_e( 'Comments are closed.', 'memberlite' ); ?></p>
							<?php endif; ?>
						</div>
					<?php } ?>
					<?php if ( count( $memberlite_trackbacks ) > 0 ) { ?>
						<div class="memberlite_tab_pane" id="tab-tracks">
						<?php
							wp_list_comments(
								array(
									'max_depth'	 => 1,
									'type'       => 'trackback',
									'short_ping' => false,
									'style'      => 'div',
								)
							);
						?>
						</div>
					<?php } ?>
					<?php if ( count( $memberlite_pingbacks ) > 0 ) { ?>
						<div class="memberlite_tab_pane" id="tab-pings">
						<?php
							wp_list_comments(
								array(
									'max_depth'	 => 1,
									'type'       => 'pingback',
									'short_ping' => false,
									'style'      => 'div',
								)
							);
						?>
						</div>
					<?php } ?>
					</div>
				</div>
				<?php } // End if(). ?>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
