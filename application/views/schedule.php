<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
	<?php $game_date = DateTime::createFromFormat('Y-m-d H:i:s', $start_date); ?>

	<div class="panel panel-default table-responsive">
		<table class="table table-hover table-bordered">
			<thead bgcolor="#fafafa">
				<th class="col-color" >
					<div align="center">DATE</div>
				</th>
				<th class="col-team-name" colspan="2" >
					<div align="center">GAME</div>
				</th>
				<th class="col-points" colspan="2" >
					<div align="center">GAME</div>
				</th>
				<th class="col-games-played">
					<div align="center">REFS</div>
				</th>
			</thead>
			<tbody>
				<tr>
					<td/>
					<td>
						<div align="center"><b>Home</b></div>
					</td>
					<td>
						<div align="center"><b>Away</b></div>
					</td>
					<td>
						<div align="center"><b>Home</b></div>
					</td>
					<td>
						<div align="center"><b>Away</b></div>
					</td>
					<td/>
				</tr>
				
				<!-- --------------SHCEDULE-------------- -->


				<?php if ($teams): ?>
					<tr bgcolor="#eaeaea">
						<td>
							<div align="center"><?php echo date_format($game_date->sub(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Rookie Game / Draft</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Week Off</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
							<!-- Christmas and new year break -->
							<?php $game_date->add(new DateInterval("P7D")); ?>
						</td>
						<td colspan="4">
							<div align="center">Holiday Break</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Week Off</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>

				<?php else: ?>
					<tr>
						<td colspan='6'>
							Schedule not yet available
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>