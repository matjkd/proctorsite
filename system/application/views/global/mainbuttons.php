<div id="mainbutton" class="sidebox">
	
	<a href="<?=base_url()?>welcome/lease_rate_calc"><img width="179px" height="45px" src="<?=base_url()?>images/icons/leaserate_calc.png"/></a>
	
</div>

<div id="mainbutton" class="sidebox">
	
	<a id="channelbutton" >
	<img width="179px" height="45px" src="<?=base_url()?>images/icons/channel_resource.png"/>
	</a>
	
</div>


<div id="mainbutton" class="sidebox">
	
	<a id="customerbutton" >
	<img width="179px" height="45px" src="<?=base_url()?>images/icons/customer_resource.png"/>
	</a>
	
</div>

<div id="site_login">	
<?=$this->load->view('sidebar/site-login')?>
</div>

<div id="channel_login" style="display:none;">	
<?=$this->load->view('sidebar/channel-resource-login')?>
</div>

<div id="customer_login" style="display:none;">	
<?=$this->load->view('sidebar/customer-resource-login')?>
</div>

