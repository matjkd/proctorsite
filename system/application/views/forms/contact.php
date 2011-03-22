<?php echo $errors;?>	
<?php 
$data = array(
			'name' => 'message',
			'id' => 'message',
              'rows'   => '4',
              'cols'        => '22'
            
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
	<?=form_input('name', set_value('name', $name))?><?=form_label('Name')?>
	</p>
	
	<p class="form_phone">
	<?=form_input('phone', set_value('phone', $phone))?><?=form_label('Phone')?>
	</p>
	
	<p class="form_company">
	<?=form_input('business_name', set_value('business_name', $business_name))?><?=form_label('Company Name')?>
	</p>
	
	<p class="form_email">
	<?=form_input('email', set_value('email', $email))?><?=form_label('Email')?>
	</p>
	
	
	
	<p class="form_subject">
	<?=form_input('subject')?><?=form_label('Subject')?>
	</p>
	
	<p class="form_message">
	<?=form_textarea($data, set_value('message', $message))?>
	</p>
	
	<p class="form_referral">
	<?=form_dropdown('referral', $referrals)?><?=form_label('How did you hear about us')?>
	</p>
	
Enter the word you see below<br/>


<?=form_label($captcha['image'])?><br/>

<input type="text" name="captcha" value="" />
</div>
	<?=form_hidden('ip_address', $this->input->ip_address())?>
	<?=form_hidden('time', $captcha['time'])?>
<div id="contact_submit"><?=form_submit('submit', 'Submit')?></div><br/>
	<?=form_close()?>
