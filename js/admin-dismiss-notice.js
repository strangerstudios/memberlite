/**
 * Make AJAX call to note that a dashboard notice has been dismissed
 */
jQuery( document ).ready(
	function() {
		jQuery( 'div.memberlite-notice button.notice-dismiss' ).click(
			function() {
				var $notice = jQuery( this ).closest( 'div.memberlite-notice' );
				var notice = $notice.attr( 'id' ).replace( 'memberlite-admin-notice-', '' );

				if (notice.length > 1) {
					jQuery.ajax(
						{
							url: ajaxurl,type:'POST', timeout: 30000,
							dataType: 'html',
							data: {
								action: 'memberlite_dismiss_notice',
								notice: notice,
								nonce: $notice.data( 'nonce' )
							}
						}
					);
				}
			}
		);
	}
);
