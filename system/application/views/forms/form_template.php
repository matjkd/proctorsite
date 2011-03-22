<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb">

<?php $this->load->view('forms/header'); ?>

<body> 
<div id="header">
	<div id="logo">
		<img src="<?=base_url()?>images/forms/leasedesk-logo.jpg"/>
	</div>
</div>	
<?php $this->load->view($main); ?>

<div id="footer">
	      
	<img width="251px" height="102px" src="<?=base_url()?>images/proctor/logofade.png" /><br/> 
	 &copy; Copyright 2011 Proctor Consulting
	
</div>
</body>
</html>
