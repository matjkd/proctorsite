<?php foreach($content as $row):?>
<img src="<?=base_url()?>images/titles/home.png"/>
<h1><?php // echo $row['title'];?>
<?php if(isset($edit))
{
	echo " - <a href='$edit'><img width='20px' height='20px' alt='edit' src='".base_url()."images/icons/edit_page.png'></a>";
}

?>
</h1>
<p>
<?=$row['content'];?>
</p>


<?php endforeach;
?>
