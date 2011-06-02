

<?php foreach($content as $row):?>

<img src="<?=base_url()?>images/headings/<?=$row['menu_title'];?>.png">
<?php 

if(isset($create_news))
{
	echo "  <a href='$create_news'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/add_16.png'></a>";
}
?>




<?php endforeach;
//list news here
foreach($news as $news):?>
<p><h3>
<?=$news['news_title'];?> <?php if(isset($edit))
{
	echo "  <a  style='float:right;' href='".base_url()."admin/editnews/".$news['news_id']."'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/edit_16.png'></a>";
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
<?php 
$content = str_replace('[readmore]', '', $news['news_content']); 

echo $content;
?>


<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?=base_url()?>blog/post/<?=$news['news_id']?>" show_faces="true" width="450" font=""></fb:like>
<?php endforeach; ?>
