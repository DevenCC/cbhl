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
		    	<li><a href="<?php echo site_url('team_standings/teams/'.$season->seasonid.'/1'); ?>"><?php print $season->season_name; ?></a></li>
			<?php endforeach; ?>
		  	</ul>
		</div>
	<?php endif; ?>
	</br>
	</br>

	<?php if ($is_playoff_started): ?>
		<div calss="row">
			<div class="col-sm-5 .col-xs-8"> 
				<h4>Bracket 1</h4>
				<table class="table table-hover table-bordered">
					<thead>
						<th class="col-color" >
							<div align="center">#1&nbsp;-&nbsp;<?php print $teams[0]->team_color; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<td align="center">
								Wins:&nbsp;<?php print ($teams[0]->playoff_wins>=2)? 2 : $teams[0]->playoff_wins; ?>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="table table-hover table-bordered">
					<thead>
						<th class="col-color">
							<div align="center">#4&nbsp;-&nbsp;<?php print $teams[3]->team_color; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<td align="center">
								Wins:&nbsp;<?php print ($teams[3]->playoff_wins>=2)? 2 : $teams[3]->playoff_wins; ?>
							</td>
						</tr>
					</tbody>
				</table>

				<h4>Bracket 2</h4>
				<table class="table table-hover table-bordered">
					<thead>
						<th class="col-color">
							<div align="center">#2&nbsp;-&nbsp;<?php print $teams[1]->team_color; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<td align="center">
								Wins:&nbsp;<?php print ($teams[1]->playoff_wins>=2)? 2 : $teams[1]->playoff_wins; ?>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="table table-hover table-bordered">
					<thead>
						<th class="col-color">
							<div align="center">#3&nbsp;-&nbsp;<?php print $teams[2]->team_color; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<td align="center">
								Wins:&nbsp;<?php print ($teams[2]->playoff_wins>=2)? 2 : $teams[2]->playoff_wins; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-sm-2 .col-xs-2"></div> 

			<div class="col-sm-5 .col-xs-8"> 
				<h4>Finals</h4>
				<table class="table table-hover table-bordered">
					<thead>
						<th class="col-color" >
							<?php if($teams[0]->playoff_wins>=2): ?>
								<div align="center"><?php print $teams[0]->team_color ; ?></div>
							<?php elseif($teams[3]->playoff_wins>=2): ?>
								<div align="center"><?php print $teams[3]->team_color ; ?></div>
							<?php else: ?>
								<div align="center">Bracket 1 Winner</div>
							<?php endif; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<?php if($teams[0]->playoff_wins>=2): ?>
								<td align="center">Wins:&nbsp;<?php print $teams[0]->playoff_wins-2 ; ?></td>
							<?php elseif($teams[3]->playoff_wins>=2): ?>
								<td align="center">Wins:&nbsp;<?php print $teams[3]->playoff_wins-2 ; ?></td>
							<?php else: ?>
								<td align="center">-</td>
							<?php endif; ?>
						</tr>
					</tbody>
				</table>

				<table class="table table-hover table-bordered">
					<thead>
						<th class="col-color" >
							<?php if($teams[1]->playoff_wins>=2): ?>
								<div align="center"><?php print $teams[1]->team_color ; ?></div>
							<?php elseif($teams[2]->playoff_wins>=2): ?>
								<div align="center"><?php print $teams[2]->team_color ; ?></div>
							<?php else: ?>
								<div align="center">Bracket 2 Winner</div>
							<?php endif; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<?php if($teams[1]->playoff_wins>=2): ?>
								<td align="center">Wins:&nbsp;<?php print $teams[1]->playoff_wins-2 ; ?></td>
							<?php elseif($teams[2]->playoff_wins>=2): ?>
								<td align="center">Wins:&nbsp;<?php print $teams[2]->playoff_wins-2 ; ?></td>
							<?php else: ?>
								<td align="center">-</td>
							<?php endif; ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

<?php else: ?>

<br>
<br>
	<p>
		Playoff games for the selected season have not yet started. Statistics will be uptdated once the games have been played and recorded.
	</p>

<?php endif; ?>
</div>