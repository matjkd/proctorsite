
  <!-- Javascript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
   
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.js"></script>
  	<script>!window.jQuery && document.write(unescape('%3Cscript src="<?=base_url()?>js/libs/jquery-1.5.0.js"%3E%3C/script%3E'))</script>
  
  	
 	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAo44bloMTDYnLwRZTm304PxRlhv7tmu5Jw57pU8LHkTOiwTlaTBTtxIJ_-B0EH1BQwonAQ3uLskBMrQ" type="text/javascript"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.js"></script>
  	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<?php if($page == "contact_us") { ?>
<script src="<?=base_url()?>js/maps.js"></script>

<?php } ?>
  <!-- scripts concatenated and minified via ant build script-->
	<script src="<?=base_url()?>js/libs/editor.js" type="text/javascript"></script>
	<script src="<?=base_url()?>js/libs/easing.min.js"></script> 
	<script src="<?=base_url()?>js/libs/bxslider.js"></script>
	<script src="<?=base_url()?>js/script.js"></script>
	
	<script src="<?=base_url()?>js/plugins.js"></script>
 
 
	
	 
  <!-- end concatenated and minified scripts-->
  
  <!--[if lt IE 7 ]>
    <script src="<?=base_url()?>js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->
  

