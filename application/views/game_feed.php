<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
	<?php if ($games): ?>
		<?php foreach ($games as $gameid => $game): ?>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><?php print $game->game_date; ?></div>
				<table width="50%" class="table table-hover table-bordered">
					<tbody>
						<tr>
							<td class="col-home-team" width="10%">
								<div align="center"><b><?php print $game->team_home; ?></b></div>
							</td>
							<td class="col-home_score" width="10%">
								<div align="center"><?php print $game->home_goals; ?></div>
							</td>
							<td class="col-vs" width="1%">
								<div align="center">VS</div>
							</td>
							<td class="col-away_score" width="10%">
								<div align="center"><?php print $game->away_goals; ?></div>
							</td>
							<td class="col-away_team" width="10%">
								<div align="center"><b><?php print $game->team_away; ?></b></div>
							</td>
							<td class="col-overtime" width="11%">
								<?php if ($game->game_overtime ==1): ?>
									<div align="center">OVERTIME</div>
								<?php else: ?>
									<div align="center"><i>regulation time</i></div>
								<?php endif; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			</br>
		<?php endforeach; ?>
		<?php else: ?>
			<h4>No games availble</h4>
	<?php endif; ?>
</div>