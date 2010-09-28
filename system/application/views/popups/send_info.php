<script type="text/javascript">
	// increase the default animation speed to exaggerate the effect
	$.fx.speeds._default = 1000;
	$(function() {
		$('#send_info').dialog({
			autoOpen: false,
			
			width:400,
			height:400
			
		});
		
		$('#open_send_info').click(function() {
			$('#send_info').dialog('open');
			return false;
		});
	});
	</script>
	
<div id="send_info" title="Send Info">



<iframe src ="<?=base_url()?>forms/send_info" width=100% height=100%>
  <p>Your browser does not support iframes. Go here for standalone form: <?=base_url()?>forms/send_info</p>
</iframe>
</div>

<button id="open_send_info">Send Info</button>
