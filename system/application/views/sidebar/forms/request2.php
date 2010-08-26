<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({showOtherMonths: true, selectOtherMonths: true, dateFormat: 'D, dd M yy' });
	});
	</script>
	
<?php echo $errors;?>	
<?=form_open('welcome/send_info')?>
<?=$this->load->view('global/table')?>	

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

$this->table->add_row('Name', form_input('name', set_value('name', $name)));
$this->table->add_row('Telephone', form_input('phone', set_value('phone', $phone)));
$this->table->add_row('Company Name', form_input('business_name', set_value('business_name', $business_name)));
$this->table->add_row('Email', form_input('email', set_value('email', $email)));


$this->table->add_row('Message', form_textarea($data, set_value('message', $message)));
$this->table->add_row('How did you hear about us', form_dropdown('referral', $referrals));

	
	echo $this->table->generate();
	$this->table->clear();
	echo form_submit('submit', 'Submit');
		form_close();
	
?>