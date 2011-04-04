<?=form_open("admin/submit_news")?> 
<?=form_input('title')?>

<br/>
Added By: <?=form_input('added_by')?><br/>
Date: <input type="text" name="date_added" id="datepicker"><br/>

Content:
<textarea cols=75 rows=20 name="content" id="content"  class='wymeditor'></textarea>


<?php echo form_submit('submit', 'Submit'); ?>
<?=form_close()?> 
