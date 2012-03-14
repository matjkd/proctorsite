
<div style="clear:both" class="tagcloud">
    <h2>Tags</h2>
<hr/>
    <?php 
    
    $lastone = '';
    $lastsafe = '';
    $size = 1;
    $fontsize = 11;
    
    ?>
<?php if($tagcloud !=NULL) { foreach($tagcloud as $row):?>
   
<?php
if($row->news_tag == $lastone) {
    $size = $size + 1;
} else { ?>
   <span style="font-size: <?php echo $fontsize+$size; ?>px;"><a href="<?=base_url()?>blog/tagged/<?=$lastsafe?>"><?=$lastone?></a></span> 
 <?php    $size = 1;
}



?>





<?php $lastone = $row->news_tag;?>
<?php $lastsafe = $row->news_tag_safe;?>
<?php endforeach; } ?>
 <span style="font-size: <?php echo $fontsize+$size; ?>px;"><a href="<?=base_url()?>blog/tagged/<?=$lastsafe?>"><?=$lastone?></a></span> 
</div>