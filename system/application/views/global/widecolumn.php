<div id="widecolumn">
<?php $this->load->view($widecolumn); ?>
	<div style="clear:both;"></div>
</div> 

<?php if(isset($widecolumn2))
				{?>
				<div id="widecolumn" style="height:150px">
				
				<?=$this->load->view($widecolumn2)?> 
					<div style="clear:both;"></div>
</div> 
				
<?php } ?>
