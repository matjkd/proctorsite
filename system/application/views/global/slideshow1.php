<script type="text/javascript"> 
$(function() {
    // run the code in the markup!
	$('#s1').cycle({ 
	    fx: 'fade',
	    speed:    500, 
	    timeout:  7000  
	});
    
});


</script>



<div style="width:96-px; height:300px; z-index:-50; position:relative; float:left;">
<div id="s1" class="pics">
<img width="725px" height="300px" src="<?=base_url()?>images/stories/slideshow/sl1.jpg" alt="" class="active" />
<img width="725px" height="300px" src="<?=base_url()?>images/stories/slideshow/sl2.jpg" alt="" />
<img width="725px" height="300px" src="<?=base_url()?>images/stories/slideshow/sl3.jpg" alt="" />
<img width="725px" height="300px" src="<?=base_url()?>images/stories/slideshow/sl4.jpg" alt="" />
</div>
</div>
