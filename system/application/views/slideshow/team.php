<div id="team_container">
	<div class="multiple" id="team">
		<ul>
			
		
		<?php foreach($team as $team_row):?>
		
	
			<li >
				
				<div class="employee_container" id="button<?=$team_row['professional_id']?>">
					<div id="team_image"><img width="150px" height="150px" src="<?=base_url()?>images/team/<?=$team_row['image_location']?>" class="latest_img" /></div>
					<div id="team_name"><?=$team_row['display_name']?> <br/>
					
					<em><?=$team_row['title']?></em></div>
				</div>
				
			</li>
		
		
		<?php endforeach; ?>
		</ul>
	</div>
</div>
