<div class="sidebox" id="login_button">


<?php $is_logged_in = $this->session->userdata('is_logged_in');
if(!isset($is_logged_in) || $is_logged_in != true)
		{ ?>	
<div style="position:relative;  text-align:center;">

Log In
</div>	
<?=form_open('user/login/validate_credentials')?>

 <div id="inputs"> 
   <input type="text" id="username" name="username" title="Username" />  
<br/>
   
    <input type="password" id="password" name="password" title="Password" />
    <br/>
    </div>
<div id="submit_button">
<input type="image" name="submit" src="<?=base_url()?>images/menu/login.png" border="0" />
</div>
    
</form>
	<?php } else { ?>
	
	
	<a href='<?=base_url()?>user/login/logout'>Logout</a>
	<?php }  ?>
</div>

