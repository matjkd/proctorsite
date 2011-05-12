
	<?php foreach($content as $row):?>
<div 

<?php
//if extra is the frontpage buttons, match the height of the content with the testimonial so the boxes line up. 
//This will likley break in future (such as long testimonial, or other pages that need boxes lined upso we need a better solution
//This will do for now though as a temp solution
 if($row['extra']=='extras/frontpage_buttons') 
{?>style="height:170px; margin-bottom:10px;"
<?php } ?>
>	
	

<?php if(isset($row['youtube']) && $row['youtube'] != '') {?>
	
	<div class="content_image">
	
	<a href="http://www.youtube.com/watch?v=<?=$row['youtube']?>" rel="prettyPhoto" title=""><img src="<?=base_url()?>images/icons/leasedesk_video_icon.jpg" alt="YouTube" width="190px" height="168px"  /></a>
	
	</div>

<?php } ?>
<img src="<?=base_url()?>images/dark_headers/<?=$row['menu_title']?>.png" alt="<?=$row['title']?>"/>

<?php if(isset($edit))
{
	echo " <a  style='float:right;' href='".base_url()."admin/edit/".$row['menu_title']."'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/edit_16.png'></a>";
}

?>


<p>
<?=$row['content'];?>
</p>

</div>

<?php endforeach;?>

<?php 
if(isset($row['extra']) && $row['extra'] != '') {

$this->load->view($row['extra']);	
	
}

?>



