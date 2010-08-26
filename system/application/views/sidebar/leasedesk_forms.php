<script type="text/javascript">
	// increase the default animation speed to exaggerate the effect
	$.fx.speeds._default = 1000;
	$(function() {
		$('#dialog').dialog({
			autoOpen: false,
			show: 'blind',
			width:400,
			height:500,
			hide: 'explode'
		});
		
		$('#opener').click(function() {
			$('#dialog').dialog('open');
			return false;
		});
	});
	</script>
	
	<div id="dialog" title="Basic dialog">



<iframe src ="http://www.proctorconsulting.co.uk/forms/" width=100% height=100%>
  <p>Your browser does not support iframes. http://www.proctorconsulting.co.uk/forms</p>
</iframe>
</div>

<button id="opener">Request a Demo</button>