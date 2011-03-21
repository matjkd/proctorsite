<?php foreach($content as $row):?>
<img src="<?=base_url()?>images/titles/<?=$row['menu_title']?>.png"/>

<?php if(isset($edit))
{
	echo " - <a href='$edit'><img width='20px' height='20px' alt='edit' src='".base_url()."images/icons/edit_page.png'></a>";
}

?>
<div class="clear"></div>
<?php if(isset($row['youtube'])) {?>
	
	<div class="content_image">
	
	<a href="http://www.youtube.com/watch?v=<?=$row['youtube']?>" rel="prettyPhoto" title=""><img src="<?=base_url()?>images/general/youtube_screenshot.jpg" alt="YouTube" width="200px" height="185px"  /></a>
	
	</div>

<?php } ?>
<p>
<?=$row['content'];?>
</p>



<?php endforeach;?>

<?php 
if(isset($row['extra'])) {

$this->load->view($row['extra']);	
	
}

?>



