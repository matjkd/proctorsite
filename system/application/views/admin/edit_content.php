<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced"
	

		
	
});
</script>

<?php foreach($content as $row):?>

<h1><?=$row['title'];?></h1>
<?php  $id = $row['content_id'];?>


<?=form_open("admin/edit_content/$page")?> 
Title: <?=form_input('title', $row['title'])?>
<br/>
Content:
<textarea cols=75 rows=20 name="content" id="content"><?=$row['content'];?></textarea>


<?php echo form_submit('submit', 'Submit'); ?>
<?=form_close()?> 
<?php endforeach;
?>