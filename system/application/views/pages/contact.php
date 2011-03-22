<img src="<?=base_url()?>images/titles/contact.png"/>


<br/>

<?php echo $config_company_name; ?>.<br/>

<?=$config_address1?>,<br/>
<?=$config_address2?>,<br/>
<?=$config_address5?>,<br/>
<?=$config_address6?> <br/>

E&nbsp;<a href="mailto:<?=$config_email?>"><?=$config_email?></a></p>
Switchboard:<?=$config_phone?><br />


<?=$this->load->view('forms/contact')?>