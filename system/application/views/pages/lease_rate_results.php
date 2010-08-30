<div id="rightside" class="ajax_box">

<?php 

foreach($quote_results as $key => $row):


	$this->table->add_row('Capital Amount', "&pound;".number_format($row['capital'], 2)."");
	$this->table->add_row('Interest Rate', $row['interest_rate']);
	$this->table->add_row('Rate Per Thousand', $row['rate_per_1000']);
	
	$this->table->add_row('Payment Type', $row['payment_type']);
	$this->table->add_row('Payment Frequency', $row['payment_frequency']);
	$this->table->add_row('Payment Profile', $row['initial']."+".$row['regular']);
	$this->table->add_row('Initial', "&pound;".$row['initial_result']."");
	$this->table->add_row('Regular', "&pound;".$row['regular_result']."");
	$this->table->add_row('', '');
echo $this->table->generate();
	$this->table->clear();
	
	
endforeach;	
	?>

</div>