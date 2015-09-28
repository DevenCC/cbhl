<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	</br>
	<?php $game_date = DateTime::createFromFormat('Y-m-d H:i:s', $start_date); ?>
	<?php $index0 = 0; ?>
	<?php $index1 = 0; ?>
	<?php $index2 = 0; ?>
	<?php $index3 = 0; ?>
	<?php $index4 = 0; ?>

	<div class="panel panel-default">
		<table width="100%" class="table table-hover table-bordered">
			<thead bgcolor="#fafafa">
				<th class="col-color" width="4%">
					<div align="center">WEEK</div>
				</th>
				<th class="col-color" width="22%">
					<div align="center">DATE</div>
				</th>
				<th class="col-team-name" colspan="2" width="37%">
					<div align="center">GAME</div>
				</th>
				<th class="col-points" colspan="2" width="37%">
					<div align="center">GAME</div>
				</th>
			</thead>
			<tbody>
				
				<!-- --------------SHCEDULE-------------- -->


				<?php if ($teams): ?>
					<tr bgcolor="#eaeaea">
						<td>
							<div align="center">0</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->sub(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Rookie Game / Draft</div>
						</td>
					</tr>
						<td>
							<div align="center">1</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">2</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">3</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">4</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">5</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td/>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Veterans Game</div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">6</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">7</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">8</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">9</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">10</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td/>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
							<!-- Christmas and new year break -->
							<?php $game_date->add(new DateInterval("P14D")); ?>
						</td>
						<td colspan="4">
							<div align="center">Christmas Charity Game</div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">11</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">12</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">13</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">14</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">15</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
					</tr>


					<tr bgcolor="#eaeaea">
						<td/>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td colspan="4">
							<div align="center">Valentine's Day</div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">12</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['2']->players[$index2%count($teams['2']->players)]->player_first_name; ?> <?php echo $teams['2']->players[$index2++%count($teams['2']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">14</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['3']->players[$index3%count($teams['3']->players)]->player_first_name; ?> <?php echo $teams['3']->players[$index3++%count($teams['3']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">11</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['1']->players[$index1%count($teams['1']->players)]->player_first_name; ?> <?php echo $teams['1']->players[$index1++%count($teams['1']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">13</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['4']->players[$index4%count($teams['4']->players)]->player_first_name; ?> <?php echo $teams['4']->players[$index4++%count($teams['4']->players)]->player_last_name; ?></div>
						</td>
					</tr>
					</tr>
						<td>
							<div align="center">15</div>
						</td>
						<td>
							<div align="center"><?php echo date_format($game_date->add(new DateInterval("P7D")), 'm/d/Y - H:i'); ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
						</td>
						<td>
							<div align="center"><?php echo $teams['0']->players[$index0%count($teams['0']->players)]->player_first_name; ?> <?php echo $teams['0']->players[$index0++%count($teams['0']->players)]->player_last_name; ?></div>
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