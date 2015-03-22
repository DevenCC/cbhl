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
						

						<?php for($period_number = 1; $period_number <= 3; $period_number++): ?>
							<?php $period = "period$period_number"; ?>
							<?php if($period_number == 1): ?>
								<tr>
									<td bgcolor="#fafafa" colspan='6' align="center">
										--- <b>1<sup>st</sup> period</b> ---
									</td>
								</tr>
							<?php elseif($period_number == 2): ?>
								<tr>
									<td bgcolor="#fafafa" colspan='6' align="center">
										--- <b>2<sup>nd</sup> period</b> ---
									</td>
								</tr>
							<?php elseif($period_number == 3): ?>
								<tr>
									<td bgcolor="#fafafa" colspan='6' align="center">
										--- <b>3<sup>rd</sup> period</b> ---
									</td>
								</tr>
							<?php endif; ?>

							<?php if ($game->{$period.'_goals'}): ?>
								<?php foreach ($game->{$period.'_goals'} as $goalid => $goal): ?>
									<tr class="bs-callout bs-callout-<?php print($goal->team_scoring); ?>">
										<td  colspan='6'>
											<span class="glyphicon glyphicon-screenshot"></span>
											Goal by <b><?php print($goal->player_scoring); ?></b>
											<?php if ($goal->player_assisting): ?>
												from <b><?php print($goal->player_assisting); ?></b>
											<?php else: ?>
												unassisted
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td colspan='6' >
										<i>no goals</i>
									</td>
								</tr>
							<?php endif; ?>
							<?php foreach ($game->{$period.'_penalties'} as $penaltyid => $penalty): ?>
								<tr class="bs-callout bs-callout-<?php print($penalty->team_serving); ?>">
									<td  colspan='6'>
										<!-- <span class="glyphicon glyphicon-exclamation-sign color-<?php print($penalty->team_serving); ?>"></span> -->
										&nbsp; &nbsp; Penalty by <b><?php print($penalty->player_serving); ?></b>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endfor; ?>

						<?php if ($game->game_overtime): ?>
							<tr>
								<td bgcolor="#fafafa" colspan='6' align="center">
									--- <b>Overtime / Shootouts</b> ---
								</td>
							</tr>
								<?php if ($game->period4_goals): ?>
									<?php foreach ($game->period4_goals as $goalid => $goal): ?>
										<tr class="bs-callout bs-callout-<?php print($goal->team_scoring); ?>">
											<td  colspan='6'>
												<span class="glyphicon glyphicon-screenshot"></span>
												Goal by <b><?php print($goal->player_scoring); ?></b>
												<?php if ($goal->player_assisting): ?>
													from <b><?php print($goal->player_assisting); ?></b>
												<?php else: ?>
													unassisted
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php elseif ($game->period5_goals ): ?>
									<?php foreach ($game->period5_goals as $goalid => $goal): ?>
										<tr class="bs-callout bs-callout-<?php print($goal->team_scoring); ?>">
											<td  colspan='6'>
												<span class="glyphicon glyphicon-screenshot"></span>
												Winning shootout goal by <b><?php print($goal->player_scoring); ?></b>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>	
						<?php endif; ?>
						<?php foreach ($game->period4_penalties as $penaltyid => $penalty): ?>
							<tr class="bs-callout bs-callout-<?php print($penalty->team_serving); ?>">
								<td  colspan='6'>
									<!-- <span class="glyphicon glyphicon-exclamation-sign"></span> -->
									&nbsp; &nbsp; Penalty by <b><?php print($penalty->player_serving); ?></b>
								</td>
							</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>
			</br>
		<?php endforeach; ?>
		<?php else: ?>
			<h4>No games availble</h4>
	<?php endif; ?>
</div>