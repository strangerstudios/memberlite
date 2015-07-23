<?php
/*
	Based on the pmpro_levels shortcode bundled in the Paid Memberships Pro plugin.
	
	This shortcode will display the membership levels and additional content based on the defined attributes.
*/
function memberlite_levels_shortcode($atts, $content=null, $code="")
{
	// $atts    ::= array of attributes
	// $content ::= text within enclosing form of shortcode element
	// $code    ::= the shortcode found, when == callback name
	// examples: [memberlite_levels levels="1,2,3" layout="table" hightlight="2" description="false" checkout_button="Register Now"]
	
	extract(shortcode_atts(array(
		'account_button' => 'Your Level',
		'back_link' => '1',
		'checkout_button' => 'Select',
		'compare' => NULL,
		'description' => '1',
		'discount_code' => NULL,
		'expiration' => '1',
		'highlight' => NULL,
		'layout' => 'div',
		'levels' => NULL,		
		'more_button' => NULL,
		'price' => 'short',
		'renew_button' => 'Renew',
	), $atts));
	
	global $wpdb, $pmpro_msg, $pmpro_msgt, $current_user, $pmpro_currency_symbol, $pmpro_all_levels, $pmpro_visible_levels, $current_user, $membership_levels;
	
	//turn 0's into falses
	if($back_link === "0" || $back_link === "false" || $back_link === "no")
		$back_link = false;
	else
		$back_link = true;
	
	if($compare === "0" || $compare === "false" || $compare === "no")
		$compare = false;
	else
		$compareitems = explode(";", $compare);

	if($description === "0" || $description === "false" || $description === "no")
		$description = false;
	else
		$description = true;
		
	if($expiration === "0" || $expiration === "false" || $expiration === "no")
		$expiration = false;
	else
		$expiration = true;
	
	if($more_button === "0" || $more_button === "false" || $more_button === "no" || empty($more_button))
		$more_button = false;
	elseif($more_button === "1" || $more_button === "true" || $more_button === "yes")
		$more_button = "Read More";
		
	if($price === "0" || $price === "false" || $price === "hide")
		$show_price = false;
	else
		$show_price = true;	
		
	ob_start();					
		
		//make sure pmpro_levels has all levels
		if(!isset($pmpro_all_levels))
			$pmpro_all_levels = pmpro_getAllLevels(true, true);
		if(!isset($pmpro_visible_levels))
			$pmpro_visible_levels = pmpro_getAllLevels(false, true);
		
		if($pmpro_msg)
		{
			?>
			<div class="pmpro_message <?php echo $pmpro_msgt?>"><?php echo $pmpro_msg?></div>
			<?php
		}
		
		$pmpro_levels_filtered = array();
		if(!empty($levels))
		{
			$levels_order = explode(",", $levels);
			//loop through $levels_order array and pull levels from $levels
			foreach($levels_order as $level_id)
			{
				foreach($pmpro_all_levels as $level)
				{
					if($level->id == $level_id)
					{
						$pmpro_levels_filtered[$level->id] = $level;
						break;
					}
				}
			}
		}
		
		$pmpro_levels_filtered = apply_filters("pmpro_levels_array", $pmpro_visible_levels);
		
		$original_level = $level;
				  
		//update per discount code
		if(!empty($discount_code) && !empty($pmpro_levels_filtered))
		{			
			foreach($pmpro_levels_filtered as $level_id => $level)
			{				
				//check code for this level and update if applicable
				if(pmpro_checkDiscountCode($discount_code, $level->id))
				{
					$sqlQuery = "SELECT l.id, cl.*, l.name, l.description, l.allow_signups FROM $wpdb->pmpro_discount_codes_levels cl LEFT JOIN $wpdb->pmpro_membership_levels l ON cl.level_id = l.id LEFT JOIN $wpdb->pmpro_discount_codes dc ON dc.id = cl.code_id WHERE dc.code = '" . $discount_code . "' AND cl.level_id = '" . (int)$level->id . "' LIMIT 1";
					$pmpro_levels_filtered[$level_id] = $wpdb->get_row($sqlQuery);
					$pmpro_levels_filtered[$level_id]->base_level = $level;					
				}				
			}		
		}
					
		if($layout == 'table')
		{
			?>
			<table id="pmpro_levels" class="pmpro_levels-table">
			<thead>
			  <tr>
				<th><?php _e('Level', 'pmpro');?></th>
				<?php if(!empty($show_price)) { ?>
					<th><?php _e('Price', 'pmpro');?></th>	
				<?php } ?>
				<?php if(!empty($expiration)) { ?>
					<th><?php _e('Expiration', 'pmpro');?></th>
				<?php } ?>
				<th>&nbsp;</th>
			  </tr>
			</thead>
			<tbody>
			<?php	
				$count = 0;
				foreach($pmpro_levels_filtered as $level)
				{				  
				  if(isset($current_user->membership_level->ID))
					  $current_level = ($current_user->membership_level->ID == $level->id);
				  else
					  $current_level = false;
				?>
				<tr class="<?php if($current_level == $level) { echo 'pmpro_level-current '; } if($highlight == $level->id) { echo 'pmpro_level-highlight '; } ?>">
					<td>
						<h2><?php echo $level->name?></h2>
						<?php if(!empty($description)) { echo wpautop($level->description); } ?>
						<?php 
							$level_page = memberlite_getLevelLandingPage($level->id);
							if(!empty($level_page))
							{
								?>
								<p><a href="<?php echo get_permalink($level_page->ID); ?>"><?php echo $more_button; ?></a></p>
								<?php
							}
						?>
					</td>
					<?php if(!empty($show_price)) { ?>
					<td>
						<?php 
							if($price === 'full')
								echo memberlite_getLevelCost($level, true, false); 
							else
								echo memberlite_getLevelCost($level, true, true); 
						?>
					</td>
					<?php } ?>
					<?php 
						if(!empty($expiration)) 
						{ 
							?>
							<td>
							<?php 
								$level_expiration = pmpro_getLevelExpiration($level);
								if(empty($level_expiration))
									_e('Membership Never Expires.', 'pmpro');
								else
									echo $level_expiration;
							?>
							</td>
							<?php 
						} 
					?>
					<td>
					<?php if(empty($current_user->membership_level->ID)) { ?>
						<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
					<?php } elseif ( !$current_level ) { ?>                	
						<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
					<?php } elseif($current_level) { ?>      
						
						<?php
							//if it's a one-time-payment level, offer a link to renew											
							if(!pmpro_isLevelRecurring($current_user->membership_level) && !empty($current_user->membership_level->enddate))
							{
							?>
								<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $renew_button; ?></a>
							<?php
							}
							else
							{
							?>
								<a class="pmpro_btn disabled" href="<?php echo pmpro_url("account")?>"><?php echo $account_button; ?></a>
							<?php
							}
						?>
						
					<?php } ?>
					</td>
				</tr>
				<?php
				}
			?>
			</tbody>
			</table>
			<?php
		}
		elseif($layout == 'compare_table')
		{
			?>
			<table id="pmpro_levels" class="pmpro_levels-compare_table">
				<thead>
					<tr>
						<th><?php _e('Level', 'pmpro');?></th>
						<?php	
							$count = 0;
							foreach($pmpro_levels_filtered as $level)
							{				  
								?>
								<th class="<?php if($current_level == $level) { echo 'pmpro_level-current '; } if($highlight == $level->id) { echo 'pmpro_level-highlight '; } ?>">
									<h2><?php echo $level->name?></h2>
									<?php
										$level_page = memberlite_getLevelLandingPage($level->id);
										if(!empty($level_page))
										{
										?>
										<p><a href="<?php echo get_permalink($level_page->ID); ?>"><?php echo $more_button; ?></a></p>
										<?php
										}
									?>
								</th>
								<?php
							}
						?>
					</tr>
					<?php if(!empty($show_price)) { ?>
					<tr>
						<th><?php _e('Price', 'pmpro');?></th>
						<?php
							foreach($pmpro_levels_filtered as $level)
							{				  
								?>
								<th class="<?php if($current_level == $level) { echo 'pmpro_level-current '; } if($highlight == $level->id) { echo 'pmpro_level-highlight '; } ?>">
									<h1 class="primary">
									<?php 
										if($price === 'full')
											echo memberlite_getLevelCost($level, true, false); 
										else
											echo memberlite_getLevelCost($level, true, true); 
									?>
									</h1>
								</th>
								<?php 
							} 
						?>
					</tr>
					<?php } ?>
					<?php if(!empty($expiration)) { ?>
					<tr>
						<th><?php _e('Expiration', 'pmpro');?></th>
						<?php
							foreach($pmpro_levels_filtered as $level)
							{				  
								?>
								<th class="muted <?php if($current_level == $level) { echo 'pmpro_level-current '; } if($highlight == $level->id) { echo 'pmpro_level-highlight '; } ?>">
									<?php 
										$level_expiration = pmpro_getLevelExpiration($level);
										if(empty($level_expiration))
											_e('Membership Never Expires.', 'pmpro');
										else
											echo $level_expiration;
									?>
								</th>
								<?php 
							} 
						?>
					</tr>
					<?php } ?>
					<tr>
						<th>&nbsp;</th>
						<?php
							foreach($pmpro_levels_filtered as $level)
							{				  
								?>
								<th>
								<?php if(empty($current_user->membership_level->ID)) { ?>
									<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
								<?php } elseif ( !$current_level ) { ?>                	
									<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
								<?php } elseif($current_level) { ?>      									
									<?php
										//if it's a one-time-payment level, offer a link to renew											
										if(!pmpro_isLevelRecurring($current_user->membership_level) && !empty($current_user->membership_level->enddate))
										{
										?>
											<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $renew_button; ?></a>
										<?php
										}
										else
										{
										?>
											<a class="pmpro_btn disabled" href="<?php echo pmpro_url("account")?>"><?php echo $account_button; ?></a>
										<?php
										}
									?>									
								<?php } ?>
								</th>
								<?php
							}
						?>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($compareitems)) 
					{ 
						//var_dump($compareitems);
						foreach($compareitems as $compareitem)
						{
							?>
							<tr>
							<?php
								$compareitem_values = explode(",", $compareitem);
								foreach($compareitem_values as $compareitem_value)
								{
									?>
									<td>
										<?php 
											if($compareitem_value == '1') { echo '<i class="fa fa-check fa-2x success"></i>'; } 
											elseif($compareitem_value == '0') { echo '<i class="fa fa-minus muted"></i>'; } 
											else { echo $compareitem_value; } 
										?>
									</td>
									<?php
								}
							?>
							</tr>
							<?php 
						}
					}
				?>
				</tbody>
				<tfoot>
					<tr>
						<td>&nbsp;</td>
						<?php
							foreach($pmpro_levels_filtered as $level)
							{				  
								?>
								<td>
								<?php if(empty($current_user->membership_level->ID)) { ?>
									<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
								<?php } elseif ( !$current_level ) { ?>                	
									<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
								<?php } elseif($current_level) { ?>      									
									<?php
										//if it's a one-time-payment level, offer a link to renew											
										if(!pmpro_isLevelRecurring($current_user->membership_level) && !empty($current_user->membership_level->enddate))
										{
										?>
											<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $renew_button; ?></a>
										<?php
										}
										else
										{
										?>
											<a class="pmpro_btn disabled" href="<?php echo pmpro_url("account")?>"><?php echo $account_button; ?></a>
										<?php
										}
									?>									
								<?php } ?>
								</td>
								<?php
							}
						?>
					</tr>
					<?php if(!empty($expiration)) { ?>
					<tr>
						<td><?php _e('Expiration', 'pmpro');?></td>
						<?php
							foreach($pmpro_levels_filtered as $level)
							{				  
								?>
								<td class="muted <?php if($current_level == $level) { echo 'pmpro_level-current '; } if($highlight == $level->id) { echo 'pmpro_level-highlight '; } ?>">
									<?php 
										$level_expiration = pmpro_getLevelExpiration($level);
										if(empty($level_expiration))
											_e('Membership Never Expires.', 'pmpro');
										else
											echo $level_expiration;
									?>
								</td>
								<?php 
							} 
						?>
					</tr>
					<?php } ?>					
					<?php if(!empty($more_button)) { ?>
					<tr>
						<td><?php _e('More Information', 'pmpro');?></td>
						<?php	
							$count = 0;
							foreach($pmpro_levels_filtered as $level)
							{				  
								?>
								<td>
									<?php
										$level_page = memberlite_getLevelLandingPage($level->id);
										if(!empty($level_page))
										{
											?>
											<a href="<?php echo get_permalink($level_page->ID); ?>"><?php echo $more_button; ?></a>
											<?php
										}
									?>
								</td>
								<?php
							}
						?>
					</tr>
					<?php } ?>					
				</tfoot>
			</table>	
			<?php
		}
		//'div' or No layout specified - use 'div'
		else
		{
			?>
			<div id="pmpro_levels" class="pmpro_levels-<?php echo $layout; ?> row">
			<?php	
				$count = 0;
				foreach($pmpro_levels_filtered as $level)
				{
					$count++;				
					if(isset($current_user->membership_level->ID))
					  $current_level = ($current_user->membership_level->ID == $level->id);
					else
					  $current_level = false;
				?>
				<div class="medium-<?php
					if($layout == '2col') { echo '6'; }
					elseif($layout == '3col') { echo '4'; }
					elseif($layout == '4col') { echo '3'; } 
					else { if(count($pmpro_levels) > 1) { echo '12'; } } 
					//if($count == 1 || ($layout == 'div' || empty($layout))) { echo '12'; }
				?> columns">
				<div class="hentry post <?php if($current_level == $level) { echo 'pmpro_level-current '; } if($highlight == $level->id) { echo 'pmpro_level-highlight '; } ?>">
					<h2><?php echo $level->name?></h2>
					<?php if((!empty($description) || !empty($more_button)) && ($layout == 'div' || $layout == '2col' || empty($layout))) { ?>
						<div class="entry-content">
							<?php echo wpautop($level->description); ?>
							<?php 
								$level_page = memberlite_getLevelLandingPage($level->id);
								if(!empty($level_page))
								{
									?>
									<p><a href="<?php echo get_permalink($level_page->ID); ?>"><?php echo $more_button; ?></a></p>
									<?php
								}
							?>
						</div>
					<?php } ?>
					<?php if($layout == 'div' || $layout == '2col' || empty($layout)) { ?>
						<footer class="entry-footer">	
						<?php 
							if(empty($current_user->membership_level->ID)) 
							{ 
								?>
								<a class="pmpro_btn pmpro_btn-select <?php if($layout == 'div' || $layout == '2col' || empty($layout)) { echo 'alignright'; } ?>" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
								<?php 
							}
							elseif(!$current_level) 
							{ 
								?>                	
								<a class="pmpro_btn pmpro_btn-select <?php if($layout == 'div' || $layout == '2col' || empty($layout)) { echo 'alignright'; } ?>" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
								<?php
							}
							elseif($current_level)
							{
								//if it's a one-time-payment level, offer a link to renew				
								if(!pmpro_isLevelRecurring($current_user->membership_level) && !empty($current_user->membership_level->enddate))
								{
									?>
									<a class="pmpro_btn pmpro_btn-select <?php if($layout == 'div' || $layout == '2col' || empty($layout)) { echo 'alignright'; } ?>" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $renew_button; ?></a>
									<?php
								}
								else
								{
									?>
									<a class="pmpro_btn disabled <?php if($layout == 'div' || $layout == '2col' || empty($layout)) { echo 'alignright'; } ?>" href="<?php echo pmpro_url("account")?>"><?php echo $account_button; ?></a>
									<?php
								}
							} 
						?>
						
						<?php
							if(!empty($show_price))
							{
								?>
								<p class="pmpro_level-price">
								<?php
									if(pmpro_isLevelFree($level))
									{
										if(!empty($expiration))
										{
											?>
											<strong><?php _e('Free.', 'pmpro'); ?></strong>
											<?php
										}
										else
										{	
											?>
											<strong><?php _e('Free', 'pmpro'); ?></strong>
											<?php
										}
									}
									elseif($price === 'full')
										echo memberlite_getLevelCost($level, true, false); 
									else
										echo memberlite_getLevelCost($level, true, true); 
								?>
								</p>
								<?php
							}
						?>
		
						<?php 
							if(!empty($expiration)) 
							{ 
								$level_expiration = pmpro_getLevelExpiration($level);
								if(empty($level_expiration))
									_e('Membership Never Expires.', 'pmpro');
								else
									echo $level_expiration;
							} 
						?>
						<?php if($layout == 'div' || $layout == '2col' || empty($layout)) { echo '<div class="clear"></div>'; } ?>
						</footer> <!-- .entry-footer -->
						<?php 
						} 
						else
						{
							//This is a column-type div layout
							?>
							<div class="entry-content">
								<?php
									if(!empty($show_price))
									{
										?>
										<p class="pmpro_level-price">
										<?php
											if($price === 'full')
												echo memberlite_getLevelCost($level, true, false); 
											else
												echo memberlite_getLevelCost($level, true, true); 
										?>
										</p>
										<?php
									}
								?>
								
								<p class="pmpro_level-select"><?php 
									if(empty($current_user->membership_level->ID)) 
									{ 
										?>
										<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
										<?php 
									}
									elseif(!$current_level) 
									{ 
										?>                	
										<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $checkout_button; ?></a>
										<?php
									}
									elseif($current_level)
									{
										//if it's a one-time-payment level, offer a link to renew				
										if(!pmpro_isLevelRecurring($current_user->membership_level) && !empty($current_user->membership_level->enddate))
										{
											?>
											<a class="pmpro_btn pmpro_btn-select" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php echo $renew_button; ?></a>
											<?php
										}
										else
										{
											?>
											<a class="pmpro_btn disabled" href="<?php echo pmpro_url("account")?>"><?php echo $account_button; ?></a>
											<?php
										}
									} 
								?></p>

								<?php 
									if(!empty($description))
										echo wpautop($level->description); 
								?>
								
								<?php 
									$level_page = memberlite_getLevelLandingPage($level->id);
									if(!empty($level_page))
									{
										?>
										<p><a href="<?php echo get_permalink($level_page->ID); ?>"><?php echo $more_button; ?></a></p>
										<?php
									}
								?>
						</div> <!-- .entry-content -->		
						<?php
							if(!empty($expiration)) 
							{ 
								echo '<footer class="entry-footer pmpro_level-expiration">';
								$level_expiration = pmpro_getLevelExpiration($level);
								if(empty($level_expiration))
									_e('Membership Never Expires.', 'pmpro');
								else
									echo $level_expiration;
								echo '</footer>';
							} 
						?>

							<?php
						}
					?>
				</div></div>
				<?php
				}
			?>
			</div> <!-- #pmpro_levels, .row -->
		<?php
		} //end else if no layout specified, use 'div'
	?>
		
		<?php if(!is_page_template( 'templates/interstitial.php' ) && !empty($back_link)) { ?> 
		<nav id="nav-below" class="navigation" role="navigation">
			<div class="nav-previous alignleft">
				<?php if(!empty($current_user->membership_level->ID)) { ?>
					<a href="<?php echo pmpro_url("account")?>"><?php _e('&larr; Return to Your Account', 'pmpro');?></a>
				<?php } else { ?>
					<a href="<?php echo home_url()?>"><?php _e('&larr; Return to Home', 'pmpro');?></a>
				<?php } ?>
			</div>
		</nav>	
		<?php } ?>
	<?php
	$temp_content = ob_get_contents();
	ob_end_clean();
	return $temp_content;
}
add_shortcode("memberlite_levels", "memberlite_levels_shortcode");
