<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({showOtherMonths: true, selectOtherMonths: true, dateFormat: 'D, dd M yy' });
	});
	</script>
	<div align="center" style="width:400px; margin:20px auto; border:1px solid #888888; padding:5px;">
<h2>Register for Webinar</h2>
on Thursday 24th Feb at 4pm
<?php echo $errors;?>	
<?=form_open('forms/webinar')?>
<?=$this->load->view('global/table')?>	

<?php 
$data = array(
			'name' => 'message',
			'id' => 'message',
            'rows'   => '4',
            'cols'        => '22'
            
            );



$this->table->add_row('First Name', form_input('firstname', set_value('firstname', $firstname)));
$this->table->add_row('Last Name', form_input('lastname', set_value('lastname', $lastname)));
$this->table->add_row('Email', form_input('email', set_value('email', $email)));
$this->table->add_row('Phone', form_input('phone', set_value('phone', $phone)));
$this->table->add_row('Job Title', form_input('jobtitle', set_value('jobtitle', $jobtitle)));
$this->table->add_row('Business Name', form_input('business_name', set_value('business_name', $business_name)));
$this->table->add_row('Address', form_textarea($data, set_value('address', $address)));

	
	echo $this->table->generate();
	$this->table->clear();
	echo form_submit('submit', 'Submit');
		form_close();
	
?>