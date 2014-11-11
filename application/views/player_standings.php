<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
	<div class="panel panel-default">
		<table width="100%" class="table table-hover table-bordered">
			<thead>
				<th class="col-first-name" width="33%">
					First Name
				</th>
				<th class="col-last-name" width="33%">
					Last Name
				</th>
				<th class="col-goals" width="11%">
					Goals
				</th>
				<th class="col-assists" width="11%">
					Assist
				</th>
				<th class="col-points" width="11%">
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