<div class="container">
	<table class="table-standings-player">
		<thead>
			<th class="col-first-name">
			First Name
			</th>
			<th class="col-last-name">
			Last Name
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
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan='2'>
						No players availble
					<td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>