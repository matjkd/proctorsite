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
<p><h3>
<?=$news['news_title'];?> <?php if(isset($edit))
{
	echo "  <a style='float:right;' href='".base_url()."admin/editnews/".$news['news_id']."'><img width='16px' height='16px' alt='edit' src='".base_url()."images/icons/social/edit_16.png'></a>";
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


<a href="<?=base_url()?>blog/post/<?=$news['news_id']?>">Read More</a><br/>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?=base_url()?>blog/post/<?=$news['news_id']?>" show_faces="true" width="450" font=""></fb:like>
<?php endforeach; ?>
