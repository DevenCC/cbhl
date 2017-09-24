<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
	<?php $game_date = DateTime::createFromFormat('Y-m-d H:i:s', $start_date); ?>

	<div class="panel panel-default">
		<table width="100%" class="table table-hover table-bordered">
			<thead bgcolor="#fafafa">
				<th class="col-color" width="10%">
					<div align="center">WEEK</div>
				</th>
				<th class="col-color" width="20%">
					<div align="center">DATE</div>
				</th>
				<th class="col-team-name" colspan="2" width="25%">
					<div align="center">GAME</div>
				</th>
				<th class="col-points" colspan="2" width="25%">
					<div align="center">GAME</div>
				</th>
				<th class="col-games-played" width="20%">
					<div align="center">REFS</div>
				</th>
			</thead>
			<tbody>
				<tr>
					<td/>
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
							<div align="center"></div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->sub(new DateInterval("P14D")), 'm/d/Y - H:i'); ?></div>
							<!-- Week off before the season's starts -->
							<?php $game_date->add(new DateInterval("P7D")); ?>
						</td>
						<td colspan="4">
							<div align="center">Rookie Game / Draft</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center">1</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">2</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">3</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">4</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">5</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td/>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Week Off</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center">6</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">7</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">8</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">9</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">10</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td/>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
							<!-- Christmas and new year break -->
							<?php $game_date->add(new DateInterval("P7D")); ?>
						</td>
						<td colspan="4">
							<div align="center">Christmas Charity Game</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center">1</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">12</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">13</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">14</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">15</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td/>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Week Off</div>
						</td>
						<td/>
					</tr>
					<tr>
						<td>
							<div align="center">16</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">17</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">18</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">19</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['0']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->team_color; ?></div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">20</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['3']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['2']->team_color; ?></div>
						</td>
						<td>
							<div align="right"><?php echo $teams['4']->team_color; ?></div>
						</td>
						<td>
							<div align="left"><?php echo $teams['1']->team_color; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->team_color; ?></div>
						</td>
					</tr>

				<?php else: ?>
					<tr>
						<td colspan='7'>
							Schedule not yet available
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>