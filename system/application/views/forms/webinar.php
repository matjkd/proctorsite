<div  id="form">
<h2>Register for Webinar</h2>
on Thursday 24th Feb at 4pm<br/><br/>
<?php echo $errors;?>	
<?=form_open('forms/webinar')?>
<?=$this->load->view('global/table')?>	

<?php 
$data = array(
			'name' => 'address',
			'id' => 'address',
            'rows'   => '4',
            'cols'        => '18'
            
            );


echo form_fieldset('Firstname');
echo form_input('firstname', set_value('firstname', $firstname));
echo form_fieldset_close(); 

echo form_fieldset('Lastname');
echo form_input('lastname', set_value('lastname', $lastname));
echo form_fieldset_close(); 


echo form_fieldset('Email');
echo form_input('email', set_value('email', $email));
echo form_fieldset_close(); 


echo form_fieldset('Phone');
echo form_input('phone', set_value('phone', $phone));
echo form_fieldset_close(); 


echo form_fieldset('Job Title');
echo form_input('jobtitle', set_value('jobtitle', $jobtitle));
echo form_fieldset_close(); 


echo form_fieldset('Business Name');
echo form_input('business_name', set_value('business_name', $business_name));
echo form_fieldset_close(); 


echo form_fieldset('Address');
echo form_textarea($data, set_value('address', $address));
echo form_fieldset_close(); 



	
echo "<br/>";	
	echo form_submit('submit', 'Submit');
		form_close();
	
?>
</div>