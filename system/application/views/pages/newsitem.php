

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
<p><h2>
<?=$news['news_title'];?> <?php if(isset($edit))
{
	echo "  <a  style='float:right;' href='".base_url()."admin/editnews/".$news['news_id']."'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/edit_16.png'></a>";
}
?>
</h2>
<?php

	$old_date = strtotime($news['date_added']);
	$new_date = date('l jS \of F Y', $old_date);

?>
<div class="news_date"><?=$new_date?>  Added by <?=$news['added_by'];?></div>

</p>
<?php 
$content = str_replace('[readmore]', '', $news['news_content']); 

echo $content;
?>
<div class="social-single">


<div id="twitterbutton">
    <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="leasedeskdotcom">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>



<!-- Place this tag where you want the +1 button to render -->
<div  style="float:left;" class="g-plusone" data-size="medium" href="<?=base_url()?>blog/post/<?=$news['news_id']?>"></div>

    <div id="likebutton">
    <fb:like href="<?=base_url()?>blog/post/<?=$news['news_id']?>" send="false" layout="button_count" width="0" height="20" show_faces="false" font=""></fb:like>
</div>
</div>
<div style="clear:both"></div>



<?php endforeach; ?>
