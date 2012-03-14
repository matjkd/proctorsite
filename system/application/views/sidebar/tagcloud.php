
<div style="clear:both" class="tagcloud">
    <h2>Tags</h2>
<hr/>
    <?php 
    
    $lastone = '';
    $size = 1;
    $fontsize = 11;
    
    ?>
<?php if($tagcloud !=NULL) { foreach($tagcloud as $row):?>
    
<?php
if($row->news_tag == $lastone) {
    $size = $size + 1;
} else { ?>
   <span style="font-size: <?php echo $fontsize+$size; ?>px;"><a href="<?=base_url()?>blog/tagged/<?=$row->news_tag_safe?>"><?=$row->news_tag?></a></span> 
 <?php    $size = 1;
}



?>



<?php $lastone = $row->news_tag;?>

<?php endforeach; } ?>
</div>