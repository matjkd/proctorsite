<!-- Left COLUMN --> 
  		<div id="ja-col1"> 
        <div class="ja-innerpad"> 
            		
	     </div> 
	      <?php $this->load->view('user/login'); ?>
	
     <div>
    <a href="mailto:support@lease-desk.com?subject=Customer Resource Help Required"><img src="<?=base_url()?>images/icons/contact.png"></img></a>
    </div>
     <?php  if(isset($flash))
{
	$this->load->view('global/flashlink');
}
   ?>
    </div> 
    
  	<!-- //Left COLUMN --> 