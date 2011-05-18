<?php echo $errors;?>	
<?php 
$data = array(
			'name' => 'message',
			'id' => 'message',
              'rows'   => '2',
              'cols'        => '12'
            
            );
$referrals = array(
'Search Engine' => 'Search Engine',
'Email Shot'  => 'Email Shot',
'Word of Mouth' => 'Word of Mouth',
'Other' => 'Other'
);
?>
<div id="contact_form">
	<?=form_open('forms/contact_page');?>
	<br/>
	
	
	<p class="form_name">
 <input type="text" id="name" name="name" title="Name" />  		

	</p>
	
	<p class="form_phone">
 <input type="text" id="phone" name="phone" title="Phone" />  
		
	</p>
	
	<p class="form_company">
 <input type="text" id="business_name" name="business_name" title="Company Name" />  
		
	</p>
	
	<p class="form_email">
 <input type="text" id="email" name="email" title="Email Address" />  		

	</p>
	
	
	
	<p class="form_subject">
	 <input type="text" id="subject" name="subject" title="Subject" />  
	</p>
	
	<p class="form_message">
<?=form_label('Message')?><br/>
	<?=form_textarea($data, set_value('message', $message))?>
	</p>
	
	<p class="form_referral">
		<?=form_label('How did you hear about us')?><br/>
		
	<?=form_dropdown('referral', $referrals)?>
	</p>
	
<?=form_label('Enter the word you see below')?><br/>


<?=form_label($captcha['image'])?><br/>

<input type="text" name="captcha" value="" />
</div>
	<?=form_hidden('ip_address', $this->input->ip_address())?>
	<?=form_hidden('time', $captcha['time'])?>
<div id="contact_submit"><?=form_submit('submit', 'Submit')?></div><br/>
	<?=form_close()?>
