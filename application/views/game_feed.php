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
								<?php if (empty($game->period4) && empty($game->period5)): ?>
									<div align="center"><i>regulation time</i></div>
								<?php else: ?>
									<div align="center">OVERTIME</div>
								<?php endif; ?>
							</td>
						</tr>
						

						<?php for($period_number = 1; $period_number <= 5; $period_number++): ?>
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
							<?php elseif($period_number == 4 && (!empty($game->period4) || empty($game->period4) && !empty($game->period5)) ): ?>
								<tr>
									<td bgcolor="#fafafa" colspan='6' align="center">
										--- <b>Overtime</b> ---
									</td>
								</tr>
							<?php elseif($period_number == 5 && !empty($game->period5)): ?>
								<tr>
									<td bgcolor="#fafafa" colspan='6' align="center">
										--- <b>Shootouts</b> ---
									</td>
								</tr>
							<?php endif; ?>

							<?php if ($game->{'period'.$period_number}): ?>
								<?php foreach ($game->{'period'.$period_number} as $action): ?>
									<?php if($action->type == "goal"): ?>
										<tr class="bs-callout bs-callout-<?php print($action->team); ?>">
											<td  colspan='6'>
												<span class="glyphicon glyphicon-screenshot"></span>
												&nbsp;  <?php print($action->time); ?>  &nbsp;
												Goal by <b><?php print($action->player_primary); ?></b>
												<?php if ($action->player_secondary != "none"): ?>
													from <b><?php print($action->player_secondary); ?></b>
												<?php else: ?>
													unassisted
												<?php endif; ?>
											</td>
										</tr>
									<?php elseif($action->type == "penalty"): ?>
										<tr class="bs-callout bs-callout-<?php print($action->team); ?>">
											<td  colspan='6'>
												<!-- <span class="glyphicon glyphicon-exclamation-sign color-<?php print($penalty->team_serving); ?>"></span> -->
												&nbsp; &nbsp; &nbsp;  <?php print($action->time); ?>  &nbsp; 
												Penalty by <b><?php print($action->player_primary); ?></b>
											</td>
										</tr>
									<?php endif;?>
								<?php endforeach; ?>
							<?php elseif( !($period_number ==5 && empty($game->period5)) && !($period_number ==4 && empty($game->period4) && empty($game->period5))): ?>
								<tr>
									<td colspan='6' >
										<i>n/a</i>
									</td>
								</tr>
							<?php endif; ?>
						<?php endfor; ?>
					</tbody>
				</table>
			</div>
			</br>
		<?php endforeach; ?>
		<?php else: ?>
			<h4>No games recorded for this season yet.</h4>
	<?php endif; ?>
</div>