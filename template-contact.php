<?php
/*
Template Name: Page - Contact Form
*/						
	function after_the_content()
	{
		global $msg;
		
		if(!empty($_REQUEST['sendemail']))
			$sendemail = $_REQUEST['sendemail'];
		else
			$sendemail = "";
		
		if(!empty($_REQUEST['email']))
			$email = $_REQUEST['email'];
		else
			$email = "";
		
		if(!empty($_REQUEST['cname']))
			$cname = $_REQUEST['cname'];
		else
			$cname = "";
			
		if(!empty($_REQUEST['lname']))
			$lname = $_REQUEST['lname'];
		else
			$lname = "";
			
		if(!empty($_REQUEST['email']))
			$email = $_REQUEST['email'];
		else
			$email = "";
		
		if(!empty($_REQUEST['phone']))
			$phone = $_REQUEST['phone'];
		else
			$phone = "";
			
		if(!empty($_REQUEST['message']))
			$message = $_REQUEST['message'];
		else
			$message = "";
			
		if(!empty($sendemail) && !empty($cname) && !empty($email) && empty($lname))
		{
			$mailto = get_bloginfo('admin_email');
			$mailsubj = "Contact Form Submission from " . get_bloginfo('name');
			$mailhead = "From: " . stripslashes($cname) . " <" . $email . ">\n";
			//reset ($HTTP_POST_VARS);			
			$mailbody = "Name: " . stripslashes($cname) . "\n\n";
			$mailbody .= "Email: $email\n\n";	
			$mailbody .= "Phone: $phone\n\n";
			$mailbody .= "Message:\n" . stripslashes($message);
			
			//$mailbody = $mailbody . stripslashes($message) . "\n\n";
			if(is_email($email)) 
			{ 
				//send email to us
				mail($mailto, $mailsubj, $mailbody, $mailhead); 
						
				//set message for this page and clear vars
				$msg = "Your message has been sent.";
							
				$message = "";
				$cname = "";
				$email = "";
				$phone = "";
			}
		}
		elseif(!is_email($email))
			$msg = "Please enter a valid email address.";
		elseif(!empty($lname))
			$msg = "Are you a spammer?";
		elseif(!empty($sendemail) && empty($cname))
			$msg = "Please enter your name.";
		elseif(!empty($sendemail) && !empty($cname) && empty($email))
			$msg = "Please enter your email address.";
	
		?>
		<?php 			
			if(!empty($msg)) { ?>
			<div class="message"><?php echo $msg?></div>				
		<?php } ?>
		<form class="general" action="<?php the_permalink(); ?>" method="post">	
			<div class="form-row">
				<label for="cname">Name</label>
				<input type="text" id="cname" name="cname" value="<?php echo esc_attr($cname);?>" size="40" /> <small class="red">* Required</small>  
			</div>
			<div class="hidden">
				<label for="lname">Last Name</label>
				<input type="text" id="lname" name="lname" value="<?php echo esc_attr($lname);?>" size="40" /> <small class="red">LEAVE THIS FIELD BLANK</small>
			</div>
			<div class="form-row">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" value="<?php echo esc_attr($email);?>" size="40" /> <small class="red">* Required</small>
			</div>					
			<div class="form-row">
				<label for="phone">Phone</label>
				<input type="text" id="phone" name="phone" value="<?php echo esc_attr($phone);?>" size="40" />  
			</div>					
			<div class="form-row">
				<label for="message">Question or Comment</label>
				<textarea class="textarea" id="message" name="message" rows="4" cols="55"><?php echo esc_attr(stripslashes($message))?></textarea>
			</div>					 
			
			<div class="form-row">
				<label for="sendemail">&nbsp;</label>
				<input type="submit" id="sendemail" name="sendemail" class="btn btn-primary" value="Submit" />
			</div>									
		</form>
		<?php
	}
	require(dirname(__FILE__) . "/page.php");
?>
