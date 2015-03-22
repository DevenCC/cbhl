<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
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
								Wins:&nbsp;<?php print $teams[0]->playoff_wins; ?>
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
								Wins:&nbsp;<?php print $teams[3]->playoff_wins; ?>
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
								Wins:&nbsp;<?php print $teams[1]->playoff_wins; ?>
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
								Wins:&nbsp;<?php print $teams[2]->playoff_wins; ?>
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
							<?php if($teams[0]->playoff_wins==2): ?>
								<div align="center"><?php print $teams[0]->team_color ; ?></div>
							<?php elseif($teams[3]->playoff_wins==2): ?>
								<div align="center"><?php print $teams[3]->team_color ; ?></div>
							<?php else: ?>
								<div align="center">Bracket 1 Winner</div>
							<?php endif; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<?php if($teams[0]->playoff_wins==2): ?>
								<td align="center"><?php print $teams[0]->playoff_wins-2 ; ?></td>
							<?php elseif($teams[3]->playoff_wins==2): ?>
								<td align="center"><?php print $teams[3]->playoff_wins-2 ; ?></td>
							<?php else: ?>
								<td align="center">-</td>
							<?php endif; ?>
						</tr>
					</tbody>
				</table>

				<table class="table table-hover table-bordered">
					<thead>
						<th class="col-color" >
							<?php if($teams[1]->playoff_wins==2): ?>
								<div align="center"><?php print $teams[1]->team_color ; ?></div>
							<?php elseif($teams[2]->playoff_wins==2): ?>
								<div align="center"><?php print $teams[2]->team_color ; ?></div>
							<?php else: ?>
								<div align="center">Bracket 2 Winner</div>
							<?php endif; ?>
						</th>
					</thead>
					<tbody>
						<tr>
							<?php if($teams[1]->playoff_wins==2): ?>
								<td align="center"><?php print $teams[1]->playoff_wins-2 ; ?></td>
							<?php elseif($teams[2]->playoff_wins==2): ?>
								<td align="center"><?php print $teams[2]->playoff_wins-2 ; ?></td>
							<?php else: ?>
								<td align="center">-</td>
							<?php endif; ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
</div>