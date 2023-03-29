<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>

	<?php if ($seasons): ?>
		<div class="dropdown">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="seasondropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	<?php print $season->season_name; ?>
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

	<div class="panel panel-default table-responsive">
		<table class="table table-bordered">
			<thead class="thead">
				<th class="col-position" style="position: sticky; left:0; background-color:#E9E9E9;">
					#
				</th>
				<th class="col-color" style="position: sticky; left: 24px; background-color:#E9E9E9;">
					Color
				</th>
				<th class="col-points">
					Points
				</th>
				<th class="col-games-played">
					GP
				</th>
				<th class="col-wins">
					W (r)
				</th>
				<th class="col-losses">
					L
				</th>
				<th class="col-over-times-loses">
					OTL
				</th>
				<th class="col-goals-for">
					GF
				</th>
				<th class="col-goals-against">
					GA
				</th>
				<th class="col-team-penalties" >
					TP
				</th>
			</thead>
			<tbody>
				<?php if ($teams): ?>
					<?php foreach ($teams as $teamid => $team): ?>
						<tr>
							<td style="position: sticky; left:0; background-color: #f9f9f9;">
								<?php if($team->position!=0): ?>
									<?php print $team->position; ?>
								<?php endif; ?>
							</td>
							<td style="position: sticky; left: 24px; background-color:#f9f9f9;">
								<?php print $team->team_color; ?>
							</td>
							<td>
								<?php print $team->points; ?>
							</td>
							<td>
								<?php print $team->games_played; ?>
							</td>
							<td>
								<?php print $team->wins; ?> (<?php print $team->regulation_wins; ?>)
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
							<td>
								<?php print $team->team_penalties; ?>
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