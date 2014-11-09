<div class="container">
	<table width="100%" class="table table-hover table-bordered">
		<thead>
			<th class="col-color" width="20%">
				Color
			</th>
			<th class="col-team-name" width="10%">
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
			<th class="col-over-times-wins" width="5%">
				OTW
			</th>
			<th class="col-over-times-losses" width="5%">
				OTL
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
							<?php print $team->team_color; ?>
						</td>
						<td>
							<?php print $team->team_name ? $team->team_name : "<i>unnammed</i>"; ?>
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
							<?php print $team->ot_wins; ?>
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
					<td colspan='9'>
						No teams availble
					<td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>