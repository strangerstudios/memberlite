<?php
/*
Template Name: Page - Contact Form
*/
	$sendemail = $_REQUEST['sendemail'];
	$email = $_REQUEST['email'];
	$cname = $_REQUEST['cname'];
	$lname = $_REQUEST['lname'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$message = $_REQUEST['message'];

	if($sendemail && $cname && $email && !$lname)
	{
		$mailto = get_bloginfo('admin_email');
		$mailsubj = "Contact Form Submission from " . get_bloginfo('name');
		$mailhead = "From: $email <" . $cname . ">\n";
		//reset ($HTTP_POST_VARS);
		$mailbody = "*From $cname ($email)\n\n";
		
		$mailbody .= "Name: $cname \n\n";
		$mailbody .= "Email: $email\n\n";	
		$mailbody .= "Phone: $phone\n\n";
		$mailbody .= "Message:\n$message";
		
		//$mailbody = $mailbody . stripslashes($message) . "\n\n";
		if (!eregi("\n",$email)) 
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
	elseif($lname)
		$msg = "Are you a spammer?";
	elseif($sendemail && !$cname)
		$msg = "Please enter your name.";
	elseif($sendemail && $cname && !$email)
		$msg = "Please enter your email address.";
					
	function after_the_content()
	{		
		?>
		<?php 
			global $msg;
			if($msg) { ?>
			<div class="message"><?php echo $msg?></div>				
		<?php } ?>
		<form class="general" action="<?php the_permalink(); ?>" method="post">	
			<div class="form-row">
				<label for="cname">Name</label>
				<input type="text" id="cname" name="cname" value="<?php echo $cname?>" size="40" /> <small class="red">* Required</small>  
			</div>
			<div class="hidden">
				<label for="lname">Last Name</label>
				<input type="text" id="lname" name="lname" value="<?php echo $lname?>" size="40" /> <small class="red">LEAVE THIS FIELD BLANK</small>
			</div>
			<div class="form-row">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" value="<?php echo $email?>" size="40" /> <small class="red">* Required</small>
			</div>					
			<div class="form-row">
				<label for="phone">Phone</label>
				<input type="text" id="phone" name="phone" value="<?php echo $phone?>" size="40" />  
			</div>					
			<div class="form-row">
				<label for="message">Question or Comment</label>
				<textarea class="textarea" id="message" name="message" rows="4" cols="55"><?php echo stripslashes($message)?></textarea>
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
