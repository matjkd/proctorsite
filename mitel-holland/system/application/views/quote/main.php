 
<p>Mitel Total Solutions biedt u een handig online offerte
tool. Dit tool is zo ontwikkeld, dat u en uw salesmensen
geen omkijken meer hebben naar complexe omrekeningen
naar bedragen per poort, medewerker of per maand.
U geeft simpelweg de kosten in van het project (de vaste
en flexibele), de termijn van de beoogde overeenkomst
en u krijgt direct een vertaalslag wat dat per maand/per
poort zou gaan kosten.</p>
  <div id="leftside">
 
<?php 
	
	$user_id = $this->session->userdata('user_id');
	
	$attributes = array('id' => 'quoteform');
	$hidden = array('user_id' => $user_id);
	echo form_open('quote/results', $attributes, $hidden); 
?>

<?php 
// quote calculator form
	$this->load->view('admin/table');
	$this->load->view('quote/quote_table');
	
	$this->table->add_row(form_reset('reset', 'Reset'), form_submit('submit', 'Submit'));
	echo $this->table->generate();
	 $this->table->clear();
?>
	

	<?=form_close()?>
	</div>	
	<div id="rightside" class="ajax_box">
	<?php echo validation_errors('<p class="error">'); ?>
	</div>
	<div style="clear:both;">
</div>
	<div style="clear:both">
	
	<?php $this->load->view('quote/listentries'); ?>
	</div>