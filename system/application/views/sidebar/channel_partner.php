<script type="text/javascript"> 


// increase the default animation speed to exaggerate the effect
$.fx.speeds._default = 1000;
$(function() {
	$('#channel').dialog({
		autoOpen: false,
		
		width:400,
		height:400
	});
	
	$('#openchannel').click(function() {
		$('#channel').dialog('open');
		return false;
	});
});
$(function() {
    // run the code in the markup!
	$('#s2').cycle({ 
	    fx: 'turnDown',
	    speed:    600, 
	    timeout:  15000
	   
	});
    
});

</script>

<div id="channel" title="Get More Info">
<iframe src ="<?=base_url()?>channel/" width=100% height=100%>
  <p>Your browser does not support iframes. Go here for standalone form: <?=base_url()?>channel/</p>
</iframe>
</div>


<div  style="width:228px; height:238px; z-index:-50; position:relative; float:left;">

<div id="s2" class="pics">

<a href="http://www.redstudio.co.uk"><img width="228px" height="238px" src="<?=base_url()?>images/stories/demo/channelpartner1.png" /></a>
<a href="http://www.redstudio.co.uk"><img width="228px" height="238px" src="<?=base_url()?>images/stories/demo/channelpartner2.png" /></a>

</div>

</div>
<a href="#" id="openchannel"><img width="228px" height="35px" src="<?=base_url()?>images/stories/demo/clickhere.png" /></a>
