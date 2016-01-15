<div class="container">
	<h2> <?php echo $page_title; ?><small><?php echo $team->team_name; ?></small></h2>
	<?php if ($seasons): ?>
		<div class="dropdown">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="seasondropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	<?php print $team->season->season_name; ?>
		    	<span class="caret"></span>
		  	</button>
		  	<ul class="dropdown-menu" aria-labelledby="seasondropdown">
		  	<?php foreach ($seasons as $seasonid => $season): ?>
		    	<li><a href="<?php echo site_url('team_standings/team/'.$season->seasonid.'/'.$team->team_color); ?>"><?php print $season->season_name; ?></a></li>
			<?php endforeach; ?>
		  	</ul>
		</div>
	<?php endif; ?>
	<br>
	<p class="banner-<?php print($team->team_color); ?>" />



	<h3>Team stats</h3>
		<div class="panel panel-default">
			<table class="table table-hover table-bordered">
				<thead>
					<th class="col-color" width="28%">
						Against
					</th>
					<th class="col-points" width="9">
						Points
					</th>
					<th class="col-games-played" width="9%">
						GP
					</th>
					<th class="col-wins" width="9%">
						W
					</th>
					<th class="col-losses" width="9%">
						L
					</th>
					<th class="col-over-times-loses" width="9%">
						OTL
					</th>
					<th class="col-over-times-wins" width="9%">
						OTW
					</th>
					<th class="col-goals-for" width="9%">
						GF
					</th>
					<th class="col-goals-against" width="9%">
						GA
					</th>
				</thead>
				<tbody>
					<?php if ($team): ?>
						<?php foreach ($team->stats_against as $statid => $stats): ?>
							<?php if ($statid == 'ALL'): ?>
								<tr bgcolor="#fafafa" data-toggle="collapse" data-target="#details_<?php print($statid); ?>" class="accordion-toggle">
							<?php else: ?>
								<tr data-toggle="collapse" data-target="#details_<?php print($statid); ?>" class="bs-callout bs-callout-<?php print($statid); ?> accordion-toggle collapsed">
							<?php endif; ?>
									<td>
									<?php if ($statid == 'ALL'): ?>
										<span class="glyphicon glyphicon-minus"></span><span class="glyphicon glyphicon-plus"></span>  <?php print $statid; ?>
									<?php else: ?>
										<span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-minus"></span>  <?php print $statid; ?>
									<?php endif; ?>
									</td>
									<td>
										<?php print $stats->points; ?>
									</td>
									<td>
										<?php print $stats->games_played; ?>
									</td>
									<td>
										<?php print $stats->wins; ?>
									</td>
									<td>
										<?php print $stats->losses; ?>
									</td>
									<td>
										<?php print $stats->ot_losses; ?>
									</td>
									<td>
										<?php print $stats->ot_wins; ?>
									</td>
									<td>
										<?php print $stats->goals_for; ?>
									</td>
									<td>
										<?php print $stats->goals_against; ?>
									</td>
								</tr>
							<?php if (1): ?>
								<tr>
									<td colspan="9">
									<?php if ($statid == 'ALL'): ?>
										<div class="accordion-body collapse in" id="details_ALL">
									<?php else: ?>
										<div class="accordion-body collapse" id="details_<?php print($statid); ?>">
									<?php endif; ?>
										<?php if ($team->season->season_start_date>date('2015-10-03 00:00:00')): ?>
											avg GF: <?php print number_format($stats->goals_for/$stats->games_played, 2, ".",","); ?><br>
											avg GA: <?php print number_format($stats->goals_against/$stats->games_played, 2, ".",","); ?><br>
											avg 1<sup>st</sup> GF time:	<?php print date("H:i:s", $stats->avg_goals_for_time); ?><br>
											avg 1<sup>st</sup> GA time:	<?php print date("H:i:s", $stats->avg_goals_against_time); ?><br>
											<?php if (is_null($stats->pk_success)): ?>
												PK: <i>no penalties</i><br>
											<?php else: ?>
												PK:  <?php print number_format(($stats->pk_success)*100)."%"; ?><br>
											<?php endif; ?>
											<?php if (is_null($stats->pp_success)): ?>
												PP: <i>no powerplays</i><br>
											<?php else: ?>
												PP:  <?php print number_format(($stats->pp_success)*100)."%"; ?><br>
											<?php endif; ?>
										<?php else: ?>
											avg GF: <?php print number_format($stats->goals_for/$stats->games_played, 2, ".",","); ?><br>
											avg GA: <?php print number_format($stats->goals_against/$stats->games_played, 2, ".",","); ?><br>
										<?php endif; ?>	
										</div>
									</td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan='9'>
								<i>Team stats not availble</i>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</br>
	</br>
	</br>
	
	<h3>Roster stats</h3>
		<div class="panel panel-default">
			<table width="100%" class="table table-hover table-bordered">
				<thead>
					<th class="col-color" width="30%">
						Name
					</th>
					<th class="col-points" width="8%">
						Points
					</th>
					<th class="col-games-played" width="8%">
						Goals
					</th>
					<th class="col-wins" width="8%">
						Assists
					</th>
					<th class="col-losses" width="8%">
						Penalties
					</th>
					<th class="col-over-times-loses" width="38%">
						Assist %
					</th>
				</thead>
				<tbody>
					<?php if ($team): ?>
						<?php foreach ($team->players as $playerid => $player): ?>
							<tr>
								<td style="text-align:left;vertical-align:top">
									<?php print $player->player_first_name.' '.$player->player_last_name; ?>
								</td>
								<td style="text-align:left;vertical-align:top">
									<?php print $player->points; ?>
								</td>
								<td style="text-align:left;vertical-align:top">
									<?php print $player->goals; ?>
								</td>
								<td style="text-align:left;vertical-align:top">
									<?php print $player->assists; ?>
								</td>
								<td style="text-align:left;vertical-align:top">
									<?php print $player->penalties; ?>
								</td>
								<td style="text-align:left;vertical-align:top">
									<?php if (!empty($player->pass_percentage)): ?>
										<?php foreach ($player->pass_percentage as $passing_player => $passin_percent): ?>
											<?php print number_format($passin_percent*100); ?>%	- <?php print $passing_player; ?><br/>
										<?php endforeach; ?>
									<?php else: ?>
										<div style="font-style: italic;"> no assists</div>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan='6'>
								<i>Team Roster unavailble</i>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
</div>