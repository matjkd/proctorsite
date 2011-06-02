<div id="contact_form">
<?php echo $errors;?>	
<?=form_open('channel/request')?>


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
?>

<p>
<?=form_label('Name')?><br/>
<?=form_input('name', set_value('name', $name))?>
</p>

<p>
<?=form_label('Email')?><br/>
<?=form_input('email', set_value('email', $email))?>
</p>

<p>
<?=form_label('Phone')?><br/>
<?=form_input('phone', set_value('phone', $phone))?>
</p>

<p>
<?=form_label('Company Name')?><br/>
<?=form_input('business_name', set_value('business_name', $business_name))?>
</p>

<p>
<?=form_label('Interested in?')?><br/>
<?=form_dropdown('interested', $interested)?>
</p>

<p>
<?=form_label('Postcode')?><br/>
<?=form_input('postcode', set_value('postcode', $postcode))?>
</p>

<p>
<?=form_label('Message')?><br/>

<?=form_textarea($data, set_value('message', $message))?>
</p>

<p>
<?=form_submit('submit', 'Submit')?>
<?=form_close()?>
</p>	
</div>
