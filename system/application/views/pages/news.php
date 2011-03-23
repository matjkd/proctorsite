<a target="_blank" href="<?=base_url()?>feed"><img style="float:right;" src="<?=base_url()?>images/icons/social/rss.png" /></a>
<img src="<?=base_url()?>images/titles/latest_news.png"/>
<?php foreach($content as $row):?>

<img src="<?=base_url()?>images/headings/<?=$row['menu_title'];?>.png">
<?php 

if(isset($create_news))
{
	echo " - <a href='$create_news'><img width='20px' height='20px' alt='edit' src='".base_url()."images/icons/add.png'></a>";
}
?>




<?php endforeach;
//list news here
foreach($news as $news):?>
<p><h3>
<?=$news['news_title'];?> <?php if(isset($edit))
{
	echo " - <a href='".base_url()."admin/editnews/".$news['news_id']."'><img width='20px' height='20px' alt='edit' src='".base_url()."images/icons/edit_page.png'></a>";
}
?>
</h3>
<?php

	$old_date = strtotime($news['date_added']);
	$new_date = date('l jS \of F Y', $old_date);

?>
<div class="news_date"><?=$new_date?><br/>
 Added by <?=$news['added_by'];?></div>

</p>
<?=$news['news_content'];?>


<br/>
<?php endforeach; ?>
