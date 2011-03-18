
<?php foreach($team as $team_row):?>
	
	
		<div class="profile" id="profile<?=$team_row['professional_id']?>">
		<hr />
	
		<h3><?=$team_row['display_name']?></h3>
		<strong><?=$team_row['title']?></strong>
		<p>
			
		<?=$team_row['bio']?>	
			
		</p>
		
		</div>
		<?php endforeach; ?>
	