<?=$this->load->view('sidebar/forms/form_top')?>
<div align=center style="width:350px; margin: 0 auto;">

<h2>Request Lease-Desk V2.0 Web Demo </h2>
<h3>On <?=$datetime?></h3>
	<hr />
<?php echo $errors;?>	
<?=form_open('forms/'.$form)?>
<?=$this->load->view('global/table')?>	

<?php 
$data = array(
			'name' => 'message',
			'id' => 'message',
              'rows'   => '4',
              'cols'        => '22'
            
            );


$this->table->add_row('Name', form_input('name', set_value('name', $name)));
$this->table->add_row('Telephone', form_input('phone', set_value('phone', $phone)));
$this->table->add_row('Company Name', form_input('business_name', set_value('business_name', $business_name)));
$this->table->add_row('Email', form_input('email', set_value('email', $email)));


$this->table->add_row('Message', form_textarea($data, set_value('message', $message)));

	
	echo $this->table->generate();
	$this->table->clear();
	echo form_submit('submit', 'Submit');
		form_close();
	
?>
<hr />
</div>