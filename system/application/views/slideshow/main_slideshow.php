<script type="text/javascript">
$(document).ready(function() {
    $('.cycle').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		speedIn:  2500, 
	    speedOut: 2500, 
	   timeout:   18000 
	});
});
</script>

<div class="cycle">
<img width="960px" height="273px" src="<?=base_url()?>images/slides/slide1.png"/>
<img width="960px" height="273px" src="<?=base_url()?>images/slides/slide2.png"/>
</div>

