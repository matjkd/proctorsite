<?php foreach($professional as $profile):?>

<img src="<?=base_url()?>images/profiles/<?=$profile['image_location'];?>">
<br/>
<h3><?=$profile['firstname'];?> <?=$profile['middlename'];?> <?=$profile['lastname'];?></h3><br/>
<?=$profile['title'];?><br/>
Email: <a href="mailto:<?=$profile['email'];?>"><?=$profile['email'];?></a>
<?php endforeach; ?>