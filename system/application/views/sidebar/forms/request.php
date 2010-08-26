<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({showOtherMonths: true, selectOtherMonths: true, dateFormat: 'D, dd M yy' });
	});
	</script>
	
<?php echo $errors;?>	
<?=form_open('welcome/send_request')?>
<?=$this->load->view('global/table')?>	

<?php 
$data = array(
			'name' => 'message',
			'id' => 'message',
              'rows'   => '4',
              'cols'        => '22'
            
            );
$datepicker = "id='datepicker'";
$hours = array(
'07:00' => '07:00',
'08:00'  => '08:00',
'09:00' => '09:00',
'10:00' => '10:00',
'11:00' => '11:00',
'12:00' => '12:00',
'13:00' => '13:00',
'14:00' => '14:00',
'15:00' => '15:00',
'16:00' => '16:00',
'17:00' => '17:00',
'18:00' => '18:00',
'19:00' => '19:00',
'20:00' => '20:00'
);


$this->table->add_row('Name', form_input('name', set_value('name', $name)));
$this->table->add_row('Email', form_input('email', set_value('email', $email)));
$this->table->add_row('Telephone', form_input('phone', set_value('phone', $phone)));
$this->table->add_row('Business Name', form_input('business_name', set_value('business_name', $business_name)));
$this->table->add_row('Postcode', form_input('postcode', set_value('postcode', $postcode)));
$this->table->add_row('Message', form_textarea($data, set_value('message', $message)));
$this->table->add_row('Preferred Date', form_input('preferred_date', set_value('preferred_date', $preferred_date), $datepicker));
$this->table->add_row('Preferred Time', form_dropdown('preferred_time', $hours));

	
	echo $this->table->generate();
	$this->table->clear();
	echo form_submit('submit', 'Submit');
		form_close();
	
?>