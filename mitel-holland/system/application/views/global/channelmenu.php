<!-- Left COLUMN --> 
  		<div id="ja-col1"> 
        <div class="ja-innerpad"> 
            		
	     </div> 
	     <?php $this->load->view('user/login'); ?>
	     
	    
   
    
  
   
   <div>
     <a href="<?=base_url()?>quote/main"><img src="<?=base_url()?>images/icons/quotetool.png"></img></a>
    </div>
 
    <div>
    <a href="<?=base_url()?>welcome/news"><img src="<?=base_url()?>images/icons/news.png"></img></a>
    </div>
    
    <div>
    <a href="<?=base_url()?>welcome/presentations"><img src="<?=base_url()?>images/icons/presentations.png"></img></a>
    </div>
   
   <div>
    <a href="http://mitel.lease-desk.com" target="_blank"><img src="<?=base_url()?>images/icons/mitel_link.png"></img></a>
    </div>
    
    <div>
    <a href="mailto:arian_khodabaks@mitel.com" ><img src="<?=base_url()?>images/icons/contact_arian.png"></img></a>
    </div>
   
  <?php  if(isset($flash))
{
	$this->load->view('global/flashlink');
}
   ?>
    </div> 
    
  	<!-- //Left COLUMN --> 