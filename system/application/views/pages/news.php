<?php foreach($content as $row):?>

<?php 

if(isset($create_news))
{
	echo " - <a href='$create_news'><img width='20px' height='20px' alt='edit' src='".base_url()."images/icons/add.png'></a>";
}
?>




<?php endforeach;
//list news here
foreach($news as $news):
$old_date_added = strtotime($news['date_added']);
$new_date_added = date('F j, Y', $old_date_added);

?>
<p><h1>
<?=$news['news_title'];?> <?php if(isset($edit))
{
	echo " - <a href='".base_url()."admin/editnews/".$news['news_id']."'><img width='20px' height='20px' alt='edit' src='".base_url()."images/icons/edit_page.png'></a>";
}
?>
</h1>
<div class="news_date"><?php echo $new_date_added; ?>, Added by <?=$news['added_by'];?></div>

</p>
<?=$news['news_content'];?>


<br/>
<?php endforeach; ?>
