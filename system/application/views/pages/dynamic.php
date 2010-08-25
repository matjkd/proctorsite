

<?php foreach($content as $row):?>

<h1><?=$row['title'];?></h1>
<?php if(isset($edit))
{
	echo " - <a href='$edit'><img width='20px' height='20px' alt='edit' src='".base_url()."images/icons/edit_page.png'></a>";
}

?>

<p>
<?=$row['content'];?>
</p>


<?php endforeach;
?>
