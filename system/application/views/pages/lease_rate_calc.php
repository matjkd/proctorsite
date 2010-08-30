<?=$this->load->view('pages/dynamic')?>
<?=$this->load->view('admin/table')?>
<?=$this->load->view('pages/quote')?>

<?php if(isset($calc_results)) {?>
<?=$this->load->view($calc_results)?>

<?php }
else
{
	?>
	
	<div id="rightside" class="ajax_box">
	<?php echo validation_errors('<p class="error">'); ?>
	</div>
	
	<?php 
}
?>