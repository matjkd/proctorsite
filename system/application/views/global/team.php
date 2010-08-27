<script type="text/javascript">
function example_ajax_request(id) {
	  

	  	$('#ajax_content').hide('normal');  
	    //$('#load').remove();  
	    $('#ajax_content').html('<p><img src="/images/load.gif"  /></p>');  
	    //$('#load').fadeIn('normal');  
	   
	    $('#ajax_content').load("http://www.matsadler.co.uk/welcome/team_member/"+ id);  
	  
	    
	    $('#ajax_content').show('normal');

	
	 
	}
</script>

<?php foreach($team as $team_row):?>
<div style="width:170px; float:left; padding-right:10px;">


<div style="width:170px; height:200px; background:#333333; display:block;">
<span id="ajax_click"><a onclick="example_ajax_request(<?=$team_row['professional_id']?>)" href="#"><?=$team_row['image_location']?></a></span>
</div>


<strong><?=$team_row['firstname']?> <?=$team_row['lastname']?></strong><br/>
<?=$team_row['title']?><br/>


</div>

<?php endforeach;?>
	


