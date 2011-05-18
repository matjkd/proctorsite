
	<?php foreach($content as $row):?>
<div 



<?php if(isset($row['youtube']) && $row['youtube'] != '') {?>
	
	<div class="content_image">
	
	<a href="http://www.youtube.com/watch?v=<?=$row['youtube']?>" rel="prettyPhoto" title=""><img src="<?=base_url()?>images/icons/leasedesk_video_icon.jpg" alt="YouTube" width="190px" height="168px"  /></a>
	
	</div>

<?php } ?>
<img src="<?=base_url()?>images/dark_headers/<?=$row['menu_title']?>.png" alt="<?=$row['title']?>"/>




</div>

<?php endforeach;?>

<?php 
if(isset($row['extra']) && $row['extra'] != '') {

$this->load->view($row['extra']);	
	
}

?>



