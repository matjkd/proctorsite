
<?php 
$this->load->view('admin/table');
foreach ($company_info as $key => $row):?>
<?php $this->table->set_heading($row['company_name']);
 echo $this->table->generate();
 $this->table->clear();
?>

<?php endforeach;

foreach ($employees_detail as $key => $row2):?>
<a href="mailto:<?=$row2['email_address'];?>">
<?=$row2['firstname'];?> <?=$row2['lastname'];?></a> 

(<?=$row2['username'];?>) - <a href="<?=base_url()?>admin/view_user/<?=$row2['user_id'];?>">View User</a> | Delete User<br/>
<?php endforeach; ?>
<br/>
Add User<br/>
<?=$this->load->view('admin/add_user')?>

