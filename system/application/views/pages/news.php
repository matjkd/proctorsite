<h1>Latest News</h1>

<?php if(isset($edit)) { ?>
	<a style='float:right;' href="<?=base_url()?>admin/create_news"><img width="16px" height="16px" alt="edit" src="<?=base_url()?>images/icons/social/add_16.png"></a>
<?php } ?>


<?php foreach($content as $row):?>

<h2><?=$row['menu_title'];?></h2>
 
<?php 

if(isset($create_news))
{
	echo "  <a href='$create_news'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/add.png'></a>";
}
?>



<?php endforeach; ?>

<p>
</p>
<?php
//list news here
foreach($news as $news):?>
<?php

	$old_date = strtotime($news['date_added']);
	$new_date = date('l jS \of F Y', $old_date);
$day = date('j', $old_date);
$month = date('M', $old_date);
?>
<div class="news_date"><?=$day?><br/>
    <?=$month?>
</div>
<div class="blogcontainer">
<h2>
<?=$news['news_title'];?> <?php if(isset($edit))
{
	echo "  <a style='float:right;' href='".base_url()."admin/editnews/".$news['news_id']."'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/edit_16.png'></a>";
}
?>
</h2>




<div style="clear:both"></div>
<br/>
<?php 
//adds a readmore by cutting all text after the $needle
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

<em>Added by <?=$news['added_by'];?></em><br/>
<div class="social-single">


<div id="twitterbutton">
    <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?=base_url()?>blog/post/<?=$news['news_id']?>" data-count="horizontal" data-via="leasedeskdotcom">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>



<!-- Place this tag where you want the +1 button to render -->
<div  style="float:left;" class="g-plusone" data-size="medium" href="<?=base_url()?>blog/post/<?=$news['news_id']?>"></div>

    <div id="likebutton">
    <fb:like href="<?=base_url()?>blog/post/<?=$news['news_id']?>" send="false" layout="button_count" width="0" height="20" show_faces="false" font=""></fb:like>
</div>
</div>
<div style="clear:both"></div>
</div>
<hr/>

<?php endforeach; ?>

