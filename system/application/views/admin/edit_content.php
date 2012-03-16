<?php foreach($content as $row):?>

<h1><?=$row['title'];?></h1>
<?php  $id = $row['content_id'];?>


<?=form_open("admin/edit_content/$page")?> 
Title:<br/>
 <?=form_input('title', $row['title'])?>
 &nbsp;
<a id="tips1"   title="The title displayed at the top of the article. Though for most articles this is replaced by graphic"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a> 

<br/>
<?=form_open("admin/edit_content/$page")?> 
Page Title:<br/>
 <?=form_input('page_title', $row['page_title'])?>
 &nbsp;
<a id="tips2"   title="The title displayed at the top of the browser"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a> 

<br/>
Youtube id:<br/>
<?=form_input('youtube', $row['youtube'])?> &nbsp;
<a id="tips3"   title="The youtube id. This can be found in the url when viewing the youtube video. it will be something like this: B5zGxkMK6hk"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a> 

<br/>

Content:<br/>
<textarea cols=75 rows=20 name="content" id="content"  class='wymeditor'><?=$row['content'];?></textarea>
<br/>

Meta Description:<br/>
<textarea cols="250" rows="2" name="meta_desc" id="meta_desc"  ><?=$row['meta_desc'];?></textarea>
<br/>
Meta Keywords:<br/>
<textarea cols="250" rows="2" name="meta_keywords" id="meta_keywords"  ><?=$row['meta_keywords'];?></textarea>
<br/>


<hr/>
Unless you know what you're doing, the fields below could break the site if not changed properly<br/>

Menu Title<br/>
<?=form_input('menu_title', $row['menu_title'])?>&nbsp;
<a id="tips4"   title="Only change this if changing code. The menu title is refered to by the links and the name of the image file that makes the title"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a> 


<br/>

Extra<br/>
<?=form_input('extra', $row['extra'])?>&nbsp;
<a id="tips5"   title="Only change this if changing code. This is the location of extra code for this page. So any additional info can be displayed below the content"><img width='12px' height='12px' alt='i' src='<?=base_url()?>images/icons/i.png'></a> 



<br/>

<input type="submit" class="wymupdate" />
<?=form_close()?> 
<?php endforeach;
?>