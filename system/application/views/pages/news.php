<img src="<?=base_url()?>images/titles/latest_news.png"/>

<?php if(isset($edit)) { ?>
	<a style='float:right;' href="<?=base_url()?>admin/create_news"><img width="16px" height="16px" alt="edit" src="<?=base_url()?>images/icons/social/add_16.png"></a>
<?php } ?>
<?php foreach($content as $row):?>

<img src="<?=base_url()?>images/headings/<?=$row['menu_title'];?>.png">
<?php 

if(isset($create_news))
{
	echo "  <a href='$create_news'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/add.png'></a>";
}
?>



<?php endforeach;
//list news here
foreach($news as $news):?>

<span class="blogcontainer">
<p><h1>
<?=$news['news_title'];?> <?php if(isset($edit))
{
	echo "  <a style='float:right;' href='".base_url()."admin/editnews/".$news['news_id']."'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/edit_16.png'></a>";
}
?>
</h1>
<?php

	$old_date = strtotime($news['date_added']);
	$new_date = date('l jS \of F Y', $old_date);

?>
<div class="news_date"><?=$new_date?>, 
 Added by <?=$news['added_by'];?></div>

</p>
<?php 
//adds a readmore by cutting all text after the $needlee
$needle = "[readmore]";
$haystack = $news['news_content'];
$pos = strpos($haystack, $needle);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {
   //The string '$needle' was not found in the string $haystack
   $content = $haystack;
} else {
   //The string $needle' was found in the string $haystack
   $content = substr(strrev(strstr(strrev($haystack), strrev($needle))), 0, -strlen($needle)); 
}


echo $content; 
?>



<div  id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=195766550471199&amp;xfbml=1"></script>

<a href="<?=base_url()?>blog/post/<?=$news['news_id']?>">Read More</a><br/>

<div class="social-single">


<div id="twitterbutton">
    <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="leasedeskdotcom">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>



    <div id="plusone">
    <g:plusone size="medium" width="55px" height="20px" href="<?=base_url()?>blog/post/<?=$news['news_id']?>"></g:plusone>
</div>

    <div id="likebutton">
    <fb:like href="<?=base_url()?>blog/post/<?=$news['news_id']?>" send="false" layout="button_count" width="0" height="20" show_faces="false" font=""></fb:like>
</div>
</div>
<div style="clear:both"></div>
</span>
<?php endforeach; ?>

