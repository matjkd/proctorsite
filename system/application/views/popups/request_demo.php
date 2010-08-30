<script type="text/javascript">
	// increase the default animation speed to exaggerate the effect
	$.fx.speeds._default = 500;
	$(function() {
		$('#dialog').dialog({
			autoOpen: false,
			show: 'puff',
			width:400,
			height:500,
			hide: 'puff'
		});
		
		$('#opener').click(function() {
			$('#dialog').dialog('open');
			return false;
		});
	});
	</script>
	
	<div id="dialog" title="Request a Demo">



<iframe src ="<?=base_url()?>forms/" width=100% height=100%>
  <p>Your browser does not support iframes. Go here for standalone form: <?=base_url()?>forms/</p>
</iframe>
</div>

<button id="opener">Request a Demo</button>