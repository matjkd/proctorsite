
	<?php foreach($content as $row):?>
<div 



<?php if(isset($row['youtube']) && $row['youtube'] != '') {?>
	
	

<?php } ?>
<img src="<?=base_url()?>images/dark_headers/<?=$row['menu_title']?>.png" alt="<?=$row['title']?>"/>

<?php if(isset($edit))
{
	echo " <a  style='float:right;' href='".base_url()."admin/edit/".$row['menu_title']."'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/edit_16.png'></a>";
}

?>


</div>

<?php endforeach;?>
<div class="widebox" id="halfwidth"><a href=""><img id="openchannel" src="<?=base_url()?>images/icons/softwaresolutions/request_demo.png" alt="request a demo of lease-desk"/></a></div>
<div class="widebox"  id="halfwidtheven"><a href=""><img id="openchannel2" src="<?=base_url()?>images/icons/softwaresolutions/request_info.png" alt="request info about lease-desk"/></a></div>
<div style="clear:both"></div>
<?php $this->load->view('popups/send_info')?>
<?php 
if(isset($row['extra']) && $row['extra'] != '') {

$this->load->view($row['extra']);	
	
}

?>



