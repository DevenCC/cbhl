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