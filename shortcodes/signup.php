<?php
/*
	Based on the pmpro_signup shortcode bundled in the PMPro Register Helper plugin.
	
	This shortcode will show a signup form. It will only show user account fields.
	If the level is not free, the user will have to enter the billing information on the checkout page.	
*/
function memberlite_signup_shortcode($atts, $content=null, $code="")
{
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// $code    ::= the shortcode found, when == callback name
	// examples: [pmpro_signup level="3" short="1" intro="0" submit_button="Signup Now"]

	extract(shortcode_atts(array(
		'level' => NULL,		
		'title' => NULL,
		'short' => NULL,
		'intro' => NULL,
		'submit_button' => "Sign Up Now"
	), $atts));
	
	//turn 0's into falses
	if($short == "0" || $short == "false" || $short == "no")
		$short = false;
	
	if(empty($title))
		$title = pmpro_getLevel($level)->name;
		
	global $current_user, $membership_levels;

	ob_start();	
	?>
		<?php if(empty($current_user->ID) || !pmpro_hasMembershipLevel($level,$current_user->ID)) { ?>
		<form class="pmpro_form memberlite_signup" action="<?php echo pmpro_url("checkout", "?level=" . $level, "https"); ?>" method="post">
			<h2><?php echo $title; ?></h2>
			<?php
				if(!empty($intro))
					echo wpautop($intro);
			?>
			<input type="hidden" id="level" name="level" value="<?php echo esc_attr( $level ); ?>" />
			<?php
				if(!empty($current_user->ID))
				{
					?>
					<p id="pmpro_account_loggedin">
						<?php printf(__('You are logged in as <strong>%s</strong>. If you would like to use a different account for this membership, <a href="%s">log out now</a>.', 'memberlite-shortcodes'), $current_user->user_login, wp_logout_url($_SERVER['REQUEST_URI'])); ?>			
					</p>
					<?php
				}
				else
				{
					?>
					<div>
						<label for="username"><?php esc_html_e( 'Username', 'memberlite-shortcodes' ); ?></label>
						<input id="username" name="username" type="text" class="input" size="30" value="" /> 
					</div>
					<?php do_action("pmpro_checkout_after_username");?>
					<div>
						<label for="password"><?php esc_html_e( 'Password', 'memberlite-shortcodes' ); ?></label>
						<input id="password" name="password" type="password" class="input" size="30" value="" /> 
					</div>
					<?php if($short) { ?>
						<input type="hidden" name="password2_copy" value="1" />
					<?php } else { ?>
						<div>
							<label for="password2"><?php esc_html_e( 'Confirm Password', 'memberlite-shortcodes' ); ?></label>
							<input id="password2" name="password2" type="password" class="input" size="30" value="" /> 
						</div>			
					<?php } ?>
					<?php do_action("pmpro_checkout_after_password");?>
					<div>
						<label for="bemail"><?php esc_html_e( 'E-mail Address', 'memberlite-shortcodes' ); ?></label>
						<input id="bemail" name="bemail" type="email" class="input" size="30" value="" /> 
					</div>
					<?php if($short) { ?>
						<input type="hidden" name="bconfirmemail_copy" value="1" />
					<?php } else { ?>
						<div>
							<label for="bconfirmemail"><?php esc_html_e( 'Confirm E-mail', 'memberlite-shortcodes' ); ?></label>
							<input id="bconfirmemail" name="bconfirmemail" type="email" class="input" size="30" value="" /> 
						</div>	         
					<?php } ?>
					<?php do_action("pmpro_checkout_after_email");?>
					<div class="pmpro_hidden">
						<label for="fullname"><?php esc_html_e( 'Full Name', 'memberlite-shortcodes' ); ?></label>
						<input id="fullname" name="fullname" type="text" class="input" size="30" value="" /> <strong><?php esc_html_e( 'LEAVE THIS BLANK', 'memberlite-shortcodes' ); ?></strong>
					</div>
					
					<div class="pmpro_captcha">
						<?php 																								
							global $recaptcha, $recaptcha_publickey;										
							if($recaptcha == 2 || ($recaptcha == 1 && pmpro_isLevelFree($pmpro_level))) 
							{											
								echo recaptcha_get_html($recaptcha_publickey, NULL, true);						
							}								
						?>								
					</div>
					<?php
				}
			?>
			<div>
				<span id="pmpro_submit_span" >
					<input type="hidden" name="submit-checkout" value="1" />		
					<input type="submit" class="pmpro_btn pmpro_btn-submit-checkout" value="<?php echo esc_attr( $submit_button ); ?>" />
				</span>
			</div>	
		</form>
		<?php } ?>
	<?php
	$temp_content = ob_get_contents();
	ob_end_clean();
	return $temp_content;
}
remove_shortcode('memberlite_signup');	//replace shortcode bundled with Memberlite 2.0 and prior or anywhere else
add_shortcode("memberlite_signup", "memberlite_signup_shortcode");
