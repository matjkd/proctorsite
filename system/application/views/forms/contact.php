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
<?=form_label('Name')?><br/>
 <input type="text" id="name" name="name" />  		

	</p>
	
	<p class="form_phone">
<?=form_label('Phone')?><br/>

 <input type="text" id="phone" name="phone"/>  
		
	</p>
	
	<p class="form_company">
<?=form_label('Business Name')?><br/>

 <input type="text" id="business_name" name="business_name"  />  
		
	</p>
	
	<p class="form_email">
<?=form_label('Email address')?><br/>

 <input type="text" id="email" name="email"  />  		

	</p>
	
	
	
	<p class="form_subject">
<?=form_label('Subject')?><br/>

	 <input type="text" id="subject" name="subject" />  
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
