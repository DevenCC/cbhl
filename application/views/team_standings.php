<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>

	<?php if ($seasons): ?>
		<div class="dropdown">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="seasondropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	<?php print $season['season_name']; ?>
		    	<span class="caret"></span>
		  	</button>
		  	<ul class="dropdown-menu" aria-labelledby="seasondropdown">
		  	<?php foreach ($seasons as $seasonid => $season): ?>
		    	<li><a href="<?php echo site_url('team_standings/teams/'.$season->seasonid.'/0'); ?>"><?php print $season->season_name; ?></a></li>
			<?php endforeach; ?>
		  	</ul>
		</div>
	<?php endif; ?>
	</br>
	</br>

	<div class="panel panel-default">
		<table width="100%" class="table table-hover table-bordered">
			<thead>
				<th class="col-color" width="5%">
					Position
				</th>
				<th class="col-color" width="15%">
					Color
				</th>
				<th class="col-team-name" width="15%">
					Team Name
				</th>
				<th class="col-points" width="7.5%">
					Points
				</th>
				<th class="col-games-played" width="5%">
					GP
				</th>
				<th class="col-wins" width="5%">
					W
				</th>
				<th class="col-losses" width="5%">
					L
				</th>
				<th class="col-over-times" width="5%">
					OT
				</th>
				<th class="col-goals-for" width="5%">
					GF
				</th>
				<th class="col-goals-against" width="5%">
					GA
				</th>
			</thead>
			<tbody>
				<?php if ($teams): ?>
					<?php foreach ($teams as $teamid => $team): ?>
						<tr>
							<td>
								<?php print $team->position; ?>
							</td>
							<td>
								<?php print $team->team_color; ?>
							</td>
							<td>
								<?php print $team->team_name ? $team->team_name : "<i>N/A</i>"; ?>
							</td>
							<td>
								<?php print $team->points; ?>
							</td>
							<td>
								<?php print $team->games_played; ?>
							</td>
							<td>
								<?php print $team->wins; ?>
							</td>
							<td>
								<?php print $team->losses; ?>
							</td>
							<td>
								<?php print $team->ot_losses; ?>
							</td>
							<td>
								<?php print $team->goals_for; ?>
							</td>
							<td>
								<?php print $team->goals_against; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan='10'>
							No teams availble
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>