<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
	<?php if ($seasons): ?>
		<div class="dropdown">
		  	<button class="btn btn-default dropdown-toggle" type="button" id="seasondropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    	<?php print $season->season_name; ?>
		    	<span class="caret"></span>
		  	</button>
		  	<ul class="dropdown-menu" aria-labelledby="seasondropdown">
		  	<?php foreach ($seasons as $seasonid => $season): ?>
		    	<li><a href="<?php echo site_url('player_standings/players/'.$season->seasonid.'/'.$is_playoff); ?>"><?php print $season->season_name; ?></a></li>
			<?php endforeach; ?>
		  	</ul>
		</div>
	<?php endif; ?>
	</br>
	</br>


	<?php if ((!$is_playoff) || ($is_playoff && $is_playoff_started)): ?>
		<div class="panel panel-default">
			<table width="100%" class="table table-bordered table-striped">
				<thead>
					<th class="col-first-name" width="30%">
						First Name
					</th>
					<th class="col-last-name" width="30%">
						Last Name
					</th>
					<th class="col-points" width="10%">
						Pts
					</th>
					<th class="col-goals" width="10%">
						G
					</th>
					<th class="col-assists" width="10%">
						A
					</th>
					<th class="col-assists" width="10%">
						P
					</th>
				</thead>
				<tbody>
					<?php if ($players): ?>
						<?php foreach ($players as $playerid => $player): ?>
							<tr>
								<td style="padding:0 0 0 5px;">
									<?php if ($player->team_color =='none'): ?>
										<img style="display:inline-block;height:25px;" class="img-responsive" src="../../assets/img/spare.png"   alt="spare " id='spare_pin' />
									<?php endif; ?>
										<div style="display:inline-block;vertical-align:middle;"><?php print $player->player_first_name; ?></div>
								</td>
								<td>
									<?php print $player->player_last_name; ?>
								</td>
								<td>
									<?php print $player->points; ?>
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
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan='6'>
								No players availble
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</tdiv>
	</div>
<?php else: ?>

<br>
<br>
	<p>
		Playoff games for the selected season have not yet started. Statistics will be uptdated once the games have been played and recorded.
	</p>

<?php endif; ?>