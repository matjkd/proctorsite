<div id="rightside" class="ajax_box">
<div id="calculator"> 
<?php 

foreach($quote_results as $key => $row):
?>
<p> 	
<?=form_label('Capital Amount')?><br/>
&pound;<?=number_format($row['capital'], 2)?><br/>
</p>

<p> 	
<?=form_label('Interest Rate')?><br/>
<?=$row['interest_rate']?><br/>
</p>

<p> 	
<?=form_label('Rate Per Thousand')?><br/>
<?=$row['rate_per_1000']?><br/>
</p>

<p> 	
<?=form_label('Payment Type')?><br/>
<?=$row['payment_type']?><br/>
</p>

<p> 	
<?=form_label('Payment Frequency')?><br/>
<?=$row['payment_frequency']?><br/>
</p>

<p> 	
<?=form_label('Payment Profile')?><br/>
<?=$row['initial']."+".$row['regular']?><br/>
</p>

<p> 	
<?=form_label('Initial')?> 
&pound;<?=$row['initial_result']?><br/>
</p>

<p> 	
<?=form_label('Regular')?> 
&pound;<?=$row['regular_result']?><br/>
</p><br/>
<?php endforeach;?>
</div>
</div>