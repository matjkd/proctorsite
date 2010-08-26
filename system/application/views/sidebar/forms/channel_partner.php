<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({showOtherMonths: true, selectOtherMonths: true, dateFormat: 'D, dd M yy' });
	});
	</script>
	
<?php echo $errors;?>	
<?=form_open('channel/request')?>
<?=$this->load->view('global/table')?>	

<?php 
$data = array(
			'name' => 'message',
			'id' => 'message',
              'rows'   => '4',
              'cols'        => '22'
            
            );
$datepicker = "id='datepicker'";
$interested = array(
'Further Information' => 'Further Information',
'Becoming a Channel Partner'  => 'Becoming a Channel Partner'
);


$this->table->add_row('Name', form_input('name', set_value('name', $name)));
$this->table->add_row('Email', form_input('email', set_value('email', $email)));
$this->table->add_row('Telephone', form_input('phone', set_value('phone', $phone)));
$this->table->add_row('Business Name', form_input('business_name', set_value('business_name', $business_name)));
$this->table->add_row('I am interested in?', form_dropdown('interested', $interested));

$this->table->add_row('Postcode', form_input('postcode', set_value('postcode', $postcode)));
$this->table->add_row('Message', form_textarea($data, set_value('message', $message)));


	
	echo $this->table->generate();
	$this->table->clear();
	echo form_submit('submit', 'Submit');
		form_close();
	
?>