<div class="container">
	<table class="table-standings-player">
		<thead>
			<th class="col-first-name">
				First Name
			</th>
			<th class="col-last-name">
				Last Name
			</th>
			<th class="col-last-name">
				Goals
			</th>
			<th class="col-last-name">
				Assist
			</th>
			<th class="col-last-name">
				Points
			</th>
		</thead>
		<tbody>
			<?php if ($players): ?>
				<?php foreach ($players as $playerid => $player): ?>
					<tr>
						<td>
							<?php print $player->player_first_name; ?>
						</td>
						<td>
							<?php print $player->player_last_name; ?>
						</td>
						<td>
							<?php print $goals[$player->playerid]; ?>
						</td>
						<td>
							<?php print $assists[$player->playerid]; ?>
						</td>
						<td>
							<?php print $goals[$player->playerid] + $assists[$player->playerid]; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan='5'>
						No players availble
					<td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>