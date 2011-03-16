<?php foreach($content as $row):?>

<h1><?=$row['title'];?></h1>
<?php  $id = $row['content_id'];?>


<?=form_open("admin/edit_content/$page")?> 
Title: <?=form_input('title', $row['title'])?>
<br/>
Content:
<textarea cols=75 rows=20 name="content" id="content"  class='wymeditor'><?=$row['content'];?></textarea>
<?=form_input('menu_title', $row['menu_title'])?>

<input type="submit" class="wymupdate" />
<?=form_close()?> 
<?php endforeach;
?>