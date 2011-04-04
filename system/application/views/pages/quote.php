<div id="leftside">
<?php 
$attributes = array('id' => 'quoteform');
echo form_open('welcome/lease_rate_results', $attributes); 



$choose = array(1 => 'Interest Rate', 2 => 'Rate Per 1000');

$choose2 = array(1 => 'Capital Amount', 2 => 'Periodic Payment');
$advance_arrears = array(2 => 'Advance', 1 => 'Arrears');
$frequency = array(12=>'Monthly',4=>'Quarterly',1=>'Annually');

?>
<div id="calculator"> 
<div id="form">
<p> 	
<?=form_label('Capital Type')?> <a id="tips1" style="float:right;"  title="Capital Type: The capital amount or periodoc payment. Select then enter the value in the box below."><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a><br/>
<?=form_dropdown('capital_type', $choose2, set_value('capital_type', $capital_type))?><br/>
<?=form_input('amount_type', set_value('amount_type', $amount_type))?><br/>
</p>

<p>
<?=form_label('Interest Type')?> <a id="tips2"  style="float:right;"  title="Interest Type: Interest rate or Rate per Thousand. Enter Value in box below"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a><br/>
<?=form_dropdown('interest_type', $choose, set_value('interest_type', $interest_type))?><br/>
<?=form_input('calculate_by', set_value('calculate_by', $calculate_by))?><br/>
</p>

<p>
<?=form_label('Payment Type')?>  <a id="tips3"  style="float:right;"  title="Payment Type: Select Advance or Arrears"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a><br/>
<?=form_dropdown('payment_type', $advance_arrears, set_value('payment_type', $payment_type))?><br/>
</p>

<p>
<?=form_label('Payment Frequency')?> <a id="tips4"  style="float:right;"  title="Payment Frequency: Monthly Quarterly or yearly payments"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a> <br/>
<?=form_dropdown('payment_frequency', $frequency, set_value('payment_frequency', $payment_frequency))?><br/>
</p>

<p>
<?=form_label('Initial')?> <a id="tips5"  style="float:right;"  title="Intial: The initial payment"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a><br/>
<?=form_input('initial', set_value('initial', $initial))?><br/>
</p>

<p>
<?=form_label('Regular')?> <a id="tips6"  style="float:right;"  title="Regular: The number or regular payments"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a><br/>
<?=form_input('regular', set_value('regular', $regular))?><br/>
</p>
		
<?=form_hidden('date_added', unix_to_human(now(), TRUE, 'eu'))?>
</div><br/>


<?=form_submit('reset', 'Reset')?>
<?=form_submit('submit', 'Submit')?>
<?=form_close()?>
	</div>

</div>	

