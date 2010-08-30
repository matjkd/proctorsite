<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb">

<?php $this->load->view('global/header'); ?>

<body id="bd" class="  fs3"> 
 <!--[if lt IE 7]>
  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>
        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>
      </div>
      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
    </div>
  </div>
  <![endif]-->
<a name="Top" id="Top"></a>

		
        <div id="top_menu">
        	<?php $this->load->view('global/menutop'); ?>	
		</div>
  


        <?php $this->load->view('global/main_menu'); ?>

	

	
  	<div id="ja-container-fr" class="wrap"> 
  	<div class="main clearfix">
  	<div id="ja-col1">
<?php  		
	
$this->load->view('sidebar/lease-desk-login');

if(isset($sidebar)) { $this->load->view($sidebar); }

?>
  </div>     
 		
  	
  	
  	<!-- CONTENT -->  
  	<div id="ja-content" style="min-height:420px;"> 
  	
    	<div class="main clearfix"> 
            
                        <div id="ja-current-content" class="clearfix"> 
    
     <div class="slideshow">    
           
      <?php	
      if (isset($slideshow))
      {
      $this->load->view($slideshow); 
      }
      ?>
      
     </div>            
     <div style="clear:both;"></div>
									<div class="main_content" <?php if(!isset($rightcolumn)) {?> style="width:670px;"<?php }?>>
										    
											
											<?php $this->load->view('global/warning'); ?> 
											<?php $this->load->view($main); ?>
								 <div id='bottom' style="clear:both;"><?php if(isset($bottom)) { $this->load->view($bottom); } ?> </div>
								 	</div>
								 	
								 	<div class="right_column">
								 	
								 		<?php if(isset($rightcolumn)) { $this->load->view($rightcolumn); } ?> 
								 	</div>
								 	
            </div> 
      </div> 
     
  	<!-- //CONTENT --> 
		
     </div></div></div>
  
  

<?php $this->load->view('global/footer'); ?>
<script type="text/javascript"> 
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script> 
<script type="text/javascript"> 
try {
var pageTracker = _gat._getTracker("UA-920708-15");
pageTracker._trackPageview();
} catch(err) {}</script> 
</body>
</html>