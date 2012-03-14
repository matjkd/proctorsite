
<div id="tags">
Add Tags:
<input type="text" name="tags" id="autocompletetags"/>


  <span style="width:18px; float:right;" class="ui-icon ui-icon-circle-plus spanlink" onclick="addTagtoBlog(<?= $news_id ?>)" ></span>
  <br/>
  
  <?php if($tags != NULL) { foreach($tags as $row):?>
  <div id="tag_<?= $row->news_tag_link_id ?>" class="tag"><span style="float:left; padding-right:5px;"> <?=$row->news_tag?></span> <span style="width:18px; float:right;" class="ui-icon ui-icon-circle-close spanlink" onclick="deleteTagfromBlog(<?= $row->news_tag_link_id ?>)" ></span></div>
  <?php endforeach; }?>
</div>