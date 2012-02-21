
		<form method="get" id="searchform" action="/">
			<input type="text" name="s" id="s" value="<?php if(!empty($s)) { ?><?php echo wp_specialchars($s, 1); ?><?php } else { ?>Search this site for...<?php } ?>" class="input<?php if(empty($s)) { ?> lite<?php } ?>" onBlur="if(this.value=='') { this.value='Search this site for...'; this.className='input lite';}" onFocus="if(this.value=='Search this site for...') this.value=''; this.className='input';" />
			<input type="submit" id="searchsubmit" value="S" />
			<div class="clear"></div>
		</form>