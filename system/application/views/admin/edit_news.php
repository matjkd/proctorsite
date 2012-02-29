type [readmore] to create a break. So when you view the news as a list it only displays what comes before the [readmore], clicking readmore will show the entire article.


<?php foreach($news as $row):?>

<?php  $id = $row['news_id'];?>


<?=form_open_multipart("admin/edit_news/$id")?> 

<p>
    <?= form_label('title') ?><br/>
  <?=form_input('title', $row['news_title'])?>
</p>

<p>
    <?= form_label('added by') ?><br/>
  <?=form_input('added_by', $row['added_by'])?>
</p>
<p>
    <?= form_label('date') ?><br/>
   <input type="text" name="date_added" id="datepicker" value="<?=$row['date_added']?>">
</p> 
<p class="Image">
    <?= form_label('Image') ?><br/>

    <?= form_upload('file') ?>
</p>

<p>
    <?= form_label('content') ?><br/>
    <textarea cols=75 rows=20 name="content" id="content"  class='wymeditor'><?=$row['news_content'];?></textarea>

</p>



<?php echo form_submit('submit', 'Submit'); ?>
<?=form_close()?> 
<?php endforeach;
?>