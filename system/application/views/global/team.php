<script src="<?=base_url()?>js/fade_icon.js" type="text/javascript"></script>
<script type="text/javascript">
function example_ajax_request(id) {
	  
	
	   
	    $('#ajax_content').html('<p><img src="/images/load.gif"  /></p>');  
	    //$('#load').fadeIn('normal');  
	   
	    $('#ajax_content').load("http://www.matsadler.co.uk/welcome/team_member/"+ id);  
		$('#ajax_content').css("display", "none");  
		$("#ajax_content").fadeIn(1000);
		
	    
	
	
	 
	}
</script>
<?php $x=1;?>
<?php foreach($team as $team_row):?>
<?php $x=$x+1;
?>
<?php if($x == 5)
{
?>
<div style="width:170px; float:left; padding-right:0px;">
<?php	
}
else
{
?>
<div style="width:170px; float:left; padding-right:14px;">
<?php

}?>

<div id="images" style="width:170px; height:200px; background:#333333; display:block;">
<span id="ajax_click"><a onclick="example_ajax_request(<?=$team_row['professional_id']?>)" href="#"><img src="<?=base_url()?>images/team/<?=$team_row['image_location']?>" class="latest_img"></img></a></span>
</div>


<strong><?=$team_row['firstname']?> <?=$team_row['lastname']?></strong><br/>
<?=$team_row['title']?><br/>


</div>

<?php endforeach;?>
<div style="clear:both;"></div>
<div style="border:1px #cccccc solid; padding:10px; background:#dddddd;">
<?php $this->load->view('/pages/dynamic')?>
</div>

