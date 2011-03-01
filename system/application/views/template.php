<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
 
<?=$this->load->view('global/header')?>

</head>

<body onload="initialize()" onunload="GUnload()">
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






<div class="header">

<div class="topbar"> </div> 
<div class="container_24">
	<div class="head_container">
		
		<div  class="logo">
			<img width="310px" src="<?=base_url()?>images/logos/proctor.png"/>
			<br/>
			<br/>
			<br/>
			
			<a href="mailto:support@lease-desk.com"><img src="<?=base_url()?>images/logos/email_link.png"/></a>
			<img src="<?=base_url()?>images/logos/tel_link.png"/>
			<a href="http://twitter.com/leasedeskdotcom" target="_blank"><img src="<?=base_url()?>images/logos/twitter_link.png"/></a>
			
		</div> 
		
		
		<div class="menu">
			<?=$this->load->view('global/top_menu')?>
		</div> 
		
		
	</div>

</div>
<div class="slide_container">
<div class="slides" align="center">
<?php	
      if (isset($slideshow))
      {
      $this->load->view($slideshow); 
      }
      ?>

</div>
</div>
</div>
<div class="top_shadow"></div>

<div class="main_content">
	<div class="container_24">
		<div class="grid_14">
	<?php $this->load->view('global/warning'); ?> 
	<?php $this->load->view($main); ?>
		</div>
		
		<div class="grid_5">
	col 1
		</div>
		
		<div class="grid_5">
	<div class="col3box"></div>
		</div>
	
	</div>
</div>
<div class="clear"></div>
<div class="footer1">
	<div class="container_24">
	
		<div class="grid_14">
<h2>LATEST NEWS</h2>
	</div>
	
	<div class="grid_5">
<h2>LATEST TWEETS</h2>
	</div>
	
	<div class="grid_5">
<h2>LEASE-DESK CLIENT LOGIN</h2>
	</div>
	</div>
</div>

<div class="footer2">
	<div class="container_24">
	<div class="grid_24">
	footer
	</div>
	</div>
</div>
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



<!--[if !IE]><!-->
<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});

		FLIR.init( { path: '/facelift/' } );
		FLIR.auto([ 'h1', 'h2']);  
</script>   
<!-- <![endif]--> 

<!--[if gte IE 7]>
<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});

		
</script> 
<![endif]-->

<!--[if gte IE 8]>
<script type="text/javascript" charset="utf-8">
	
		 FLIR.init();  
		 FLIR.auto([ 'h1', 'h2']);  
</script> 
<![endif]--> 
</body>
</html>