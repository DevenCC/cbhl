<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
	<div class="panel panel-default">
		<table width="100%" class="table table-hover table-bordered">
			<thead>
				<th class="col-first-name" width="30%">
					First Name
				</th>
				<th class="col-last-name" width="30%">
					Last Name
				</th>
				<th class="col-goals" width="10%">
					Goals
				</th>
				<th class="col-assists" width="10%">
					Assist
				</th>
				<th class="col-assists" width="10%">
					Penalties
				</th>
				<th class="col-points" width="10%">
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
								<?php print $player->goals; ?>
							</td>
							<td>
								<?php print $player->assists; ?>
							</td>
							<td>
								<?php print $player->penalties; ?>
							</td>
							<td>
								<?php print $player->points; ?>
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
	</tdiv>
</div>