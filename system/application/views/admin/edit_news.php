<?php foreach($news as $row):?>

<?php  $id = $row['news_id'];?>


<?=form_open("admin/edit_news/$id")?> 
<?=form_input('title', $row['news_title'])?>

<br/>
Added By: <?=form_input('added_by', $row['added_by'])?><br/>
Date: <input type="text" name="date_added" id="datepicker" value="<?=$row['date_added']?>"><br/>

Content:
<textarea cols=75 rows=20 name="content" id="content"  class='wymeditor'><?=$row['news_content'];?></textarea>


<?php echo form_submit('submit', 'Submit'); ?>
<?=form_close()?> 
<?php endforeach;
?>