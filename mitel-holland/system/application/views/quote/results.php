<div id="leftside"><?php 

	
	$attributes = array('id' => 'quoteform');
	$hidden = array('user_id' => $user_id, 'quote_id' => $quote_id);
	echo form_open('quote/results', $attributes, $hidden); 
	
	$this->load->view('admin/table');
	$this->load->view('quote/quote_table');
	$this->table->add_row(form_submit('submit', 'Reset'), form_submit('submit', 'Update'));
	echo $this->table->generate();
	$this->table->clear();
	
	
	
?>
</div>
<div id="rightside" class="ajax_box">

<?php 

foreach($quote_results as $key => $row):


$this->table->set_heading('Resultaten', '');
	$this->table->add_row('Kapitaalbedrag', "&euro;".number_format($row['capital'], 2)."");
	$this->table->add_row('Rentepercentage', $row['interest_rate']);
	$this->table->add_row('Kosten per 1000', $row['rate_per_1000']);
	
	$this->table->add_row('Betalingstype', $row['payment_type']);
	$this->table->add_row('Betalingsfrequentie', $row['payment_frequency']);
	$this->table->add_row('Betalingsprofiel', $row['initial']."+".$row['regular']);
	$this->table->add_row('Initi&euml;le betaling', "&euro;".$row['initial_result']."");
	$this->table->add_row('Reguliere betalingen', "&euro;".$row['regular_result']."");
	
echo $this->table->generate();
	$this->table->clear();
	$this->table->set_heading('Managed Service Resultaten', '');
	$this->table->add_row('Kosten per poort/per gebruiker per maand', "&euro;".$row['cost_per_port_per_month']."");
	echo $this->table->generate();
	$this->table->clear();
	
endforeach;	
	?>

</div>
<div style="clear:both">
		<?php $this->load->view('quote/listentries'); ?>
	</div>