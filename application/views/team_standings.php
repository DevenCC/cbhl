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
			<th class="col-over-times" width="5%">
				OT
			</th>
			<th class="col-goals-against" width="5%">
				GA
			</th>
			<th class="col-goals-for" width="5%">
				GF
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
							<?php print $team->team_name; ?>
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