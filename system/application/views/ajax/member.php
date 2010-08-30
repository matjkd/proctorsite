 <div id="ajax_content"><?php foreach($member as $member_row):?>
<strong><?=$member_row['firstname']?> <?=$member_row['lastname']?> - <?=$member_row['title']?></strong><br/>
<?=$member_row['bio']?>

<?php endforeach; ?>
</div>