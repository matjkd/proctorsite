<div align="left">
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
	<?=form_open('forms/request_info');?>

	<p class="form_name">

		 <input type="text" id="name" name="name" value="<?php if ($this->session->flashdata('formname')) { echo $this->session->flashdata('formname');} ?>"/>  
<?=form_label('Name')?>
	</p>
	
	<p class="form_phone">

		 <input type="text" id="phone" name="phone" value="<?php if ($this->session->flashdata('formphone')) { echo $this->session->flashdata('formphone');} ?>"/>   
<?=form_label('Phone')?>
	</p>
	
	<p class="form_company">

		 <input type="text" id="business_name" name="business_name" value="<?php if ($this->session->flashdata('formbusiness_name')) { echo $this->session->flashdata('formbusiness_name');} ?>"/>   
<?=form_label('Business Name')?>
	</p>
	
	<p class="form_email">

		 <input type="text" id="email" name="email"value="<?php if ($this->session->flashdata('formemail')) { echo $this->session->flashdata('formemail');} ?>"/>   
<?=form_label('Email')?>
	</p>
	
	

	
	<p class="form_message">
<?=form_label('Your Message')?><br/>
<?php if ($this->session->flashdata('formmessage')) { $message = $this->session->flashdata('formmessage');} else { $message = ""; } ?>

	<?=form_textarea($data, $message)?>
	</p>
	
	
	
<?=form_label('Enter the word you see below')?><br/>


<?=form_label($captcha['image'])?><br/>

<input type="text" name="captcha" value="" />
</div>
	<?=form_hidden('ip_address', $this->input->ip_address())?>
	<?=form_hidden('time', $captcha['time'])?>
<div id="contact_submit"><?=form_submit('submit', 'Submit')?></div><br/>
	<?=form_close()?>

</div>