<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('games_model');
		$this->load->model('goals_model');
		$this->load->model('penalties_model');
		$this->load->model('players_model');
		$this->load->model('teams_model');
		$this->load->model('teampenalties_model');
		$this->load->model('seasons_model');
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Team Standings',
		);

		$this->view_wrapper('standings', $data);
	}

	// Get the team's goal total agaisnt a specific team throughout the entire season
	private function get_total_goals_agaisnt_team($teamid, $opposing_teamid)
	{
		$games = $this->games_model->get_season_games_played_by_team($teamid);
		$get_total_goals_agaisnt_team = 0;
		foreach ($games as $game)
		{
			if( ($game->team_home == $teamid 		  && $game->team_away == $opposing_teamid) ||
				($game->team_home == $opposing_teamid && $game->team_away == $teamid)			)
			{
				$get_total_goals_agaisnt_team += $this->goals_model->get_goals_for_team_by_game($game->gameid, $teamid);
			}
		}

		return $get_total_goals_agaisnt_team;
	}

	private function sort_teams_by_points($a,$b)
	{
		if($a->points ==  $b->points )
	 	{ 
	 		if($a->wins ==  $b->wins )
		 	{ 
		 		if($a->regulation_wins ==  $b->regulation_wins )
			 	{ 
			 		$a_points = $this->get_total_goals_agaisnt_team($a->teamid, $b->teamid);
			 		$b_points = $this->get_total_goals_agaisnt_team($b->teamid, $a->teamid);
			 		if($a_points ==  $b_points )
				 	{ 
				 		if( ($a->goals_for - $a->goals_against) ==  ($b->goals_for - $b->goals_against) )
					 	{ 
					 		$a->tied_flag+=1;
					 		$b->tied_flag+=1;
					 		return 0 ; 
					 	} 
						return (($a->goals_for - $a->goals_against) > ($b->goals_for - $b->goals_against)) ? -1 : 1;
				 	} 
					return ($a_points > $b_points) ? -1 : 1;
			 	} 
				return ($a->regulation_wins > $b->regulation_wins) ? -1 : 1;
			} 
			return ($a->wins > $b->wins) ? -1 : 1;
		} 
		return ($a->points > $b->points) ? -1 : 1;
	}

	private function assign_team_position($teams)
	{
		// Do not display position if all teams are unranked
		$skip = true;

		foreach ($teams as $team)
		{
			$team->position =0;
			if($team->points != 0)
			{
				$skip = false;
			}
		}

		if(!$skip)
		{
			$index = 0;
			foreach ($teams as $team)
			{
				if($index == 0)
				{
					$team->position = ++$index;
				}
				else
				{
					if($team->tied_flag != 0 &&
					   $team->tied_flag == $teams[$index-1]->tied_flag &&
					   $team->points == $teams[$index-1]->points)
					{
						$team->position = $teams[$index-1]->position;
						++$index;	
					}
					else
					{
						$team->position = ++$index;		
					}
				}
			}
		}
	}

	public function team($seasonid = 0, $color)
	{
		$seasons = $this->seasons_model->get_all();

		// TODO : Refactor team standings dropdown to only include season where the team color was active
		$season = ($seasonid == 0) 
					? $this->seasons_model->get_current_season()
					: $this->seasons_model->get($seasonid);

		$team = (object) $this->teams_model->get_by_seasonid_and_color($season->seasonid, $color);
		$team->season = $season;
		$team->stats_against = array();

		$team->stats_against['ALL'] = (object) array(
					'wins' => 0,
					'losses' => 0,
					'ot_losses' => 0,
					'ot_wins' => 0,
					'points' => 0,
					'games_played' => 0,
					'goals_against' => 0,
					'goals_for' => 0,
					'avg_goals_against_time' => 0,
					'avg_goals_for_time' => 0,
					'pk_success' => $this->penalties_model->get_penaltykill_success_by_teamid($team->teamid),
					'pp_success' => $this->penalties_model->get_powerplay_success_by_teamid($team->teamid),
				);

		$teams = $this->teams_model->get_all_by_season($team->team_seasonid);
		foreach ($teams as $t)
		{
			if($t->teamid <> $team->teamid)
			{
				$team->stats_against[$this->teams_model->get_team_color_by_id($t->teamid)] = (object) array(
					'wins' => 0,
					'losses' => 0,
					'ot_losses' => 0,
					'ot_wins' => 0,
					'points' => 0,
					'games_played' => 0,
					'goals_against' => 0,
					'goals_for' => 0,
					'avg_goals_against_time' => null,
					'avg_goals_for_time' => null,
					'pk_success' => $this->penalties_model->get_team_penalty_success_by_teamid($team->teamid, $t->teamid),
					'pp_success' => (is_null($this->penalties_model->get_team_penalty_success_by_teamid($t->teamid, $team->teamid))) 
									? null
									: 1 - $this->penalties_model->get_team_penalty_success_by_teamid($t->teamid, $team->teamid),
				);
			}
		}

		$games = array();
		$games = $this->games_model->get_season_games_played_by_team($team->teamid);
		foreach ($games as $game)
		{
			$game_winner = 	$this->teams_model->get(
							$this->games_model->get_game_winner_teamid($game->gameid));
			$game_loser =	$this->teams_model->get(
							$this->games_model->get_game_loser_teamid($game->gameid));
			if($game_winner->teamid == $team->teamid)
			{
				$team->stats_against[$game_loser->team_color]->games_played++;
				$team->stats_against[$game_loser->team_color]->avg_goals_for_time = is_null($team->stats_against[$game_loser->team_color]->avg_goals_for_time) 
																		? $this->goals_model->get_team_first_goal_by_game($game->gameid, $game_winner->teamid) 
																		: ($team->stats_against[$game_loser->team_color]->avg_goals_against_time + 
																		   $this->goals_model->get_team_first_goal_by_game($game->gameid,$game_winner->teamid)) /
																		   $team->stats_against[$game_loser->team_color]->games_played;
				$team->stats_against[$game_loser->team_color]->avg_goals_against_time = is_null($team->stats_against[$game_loser->team_color]->avg_goals_against_time) 
																			? $this->goals_model->get_team_first_goal_by_game($game->gameid, $game_loser->teamid) 
																			: ($team->stats_against[$game_loser->team_color]->avg_goals_for_time +
																		       $this->goals_model->get_team_first_goal_by_game($game->gameid, $game_loser->teamid)) /
																		       $team->stats_against[$game_loser->team_color]->games_played;
				$team->stats_against[$game_loser->team_color]->wins++;
				$team->stats_against[$game_loser->team_color]->points += 2;
				if($this->games_model->is_game_overtime($game->gameid))
				{
					$team->stats_against[$game_loser->team_color]->ot_wins++;
				}

				$team->stats_against[$game_loser->team_color]->goals_for += $this->goals_model->get_goals_for_team_by_game($game->gameid, $team->teamid);
				$team->stats_against[$game_loser->team_color]->goals_against += $this->goals_model->get_goals_against_team_by_game($game->gameid, $team->teamid);
			}	
			else
			{
				$team->stats_against[$game_winner->team_color]->games_played++;
				$team->stats_against[$game_winner->team_color]->avg_goals_for_time = is_null($team->stats_against[$game_winner->team_color]->avg_goals_against_time) 
																		? $this->goals_model->get_team_first_goal_by_game($game->gameid, $game_loser->teamid) 
																		: ($team->stats_against[$game_winner->team_color]->avg_goals_for_time +
																		   $this->goals_model->get_team_first_goal_by_game($game->gameid, $game_loser->teamid)) /
																	       $team->stats_against[$game_winner->team_color]->games_played;
				$team->stats_against[$game_winner->team_color]->avg_goals_against_time = is_null($team->stats_against[$game_winner->team_color]->avg_goals_for_time) 
																			? $this->goals_model->get_team_first_goal_by_game($game->gameid,$game_winner->teamid) 
																			: ($team->stats_against[$game_winner->team_color]->avg_goals_against_time + 
																			   $this->goals_model->get_team_first_goal_by_game($game->gameid,$game_winner->teamid)) /
																			   $team->stats_against[$game_winner->team_color]->games_played;
				if($this->games_model->is_game_overtime($game->gameid))
				{
					$team->stats_against[$game_winner->team_color]->ot_losses++;
					$team->stats_against[$game_winner->team_color]->points++;
				}
				else
				{
					$team->stats_against[$game_winner->team_color]->losses++;
				}

				$team->stats_against[$game_winner->team_color]->goals_for += $this->goals_model->get_goals_for_team_by_game($game->gameid, $team->teamid);
				$team->stats_against[$game_winner->team_color]->goals_against += $this->goals_model->get_goals_against_team_by_game($game->gameid, $team->teamid);
			}
		}

		foreach ($team->stats_against as $statid => $stats)
		{
			if(($team->stats_against[$statid]->games_played > 0) && $statid <> 'ALL')
			{
				$team->stats_against['ALL']->avg_goals_for_time = (($team->stats_against['ALL']->avg_goals_for_time * $team->stats_against['ALL']->games_played)  +
																   ($team->stats_against[$statid]->avg_goals_for_time) * $team->stats_against[$statid]->games_played ) /
																   ($team->stats_against['ALL']->games_played + $team->stats_against[$statid]->games_played );
				$team->stats_against['ALL']->avg_goals_against_time = (($team->stats_against['ALL']->avg_goals_against_time * $team->stats_against['ALL']->games_played)  +
																   	   ($team->stats_against[$statid]->avg_goals_against_time) * $team->stats_against[$statid]->games_played ) /
																	   ($team->stats_against['ALL']->games_played + $team->stats_against[$statid]->games_played );
				$team->stats_against['ALL']->games_played += $team->stats_against[$statid]->games_played;
				$team->stats_against['ALL']->wins += $team->stats_against[$statid]->wins;
				$team->stats_against['ALL']->losses += $team->stats_against[$statid]->losses;
				$team->stats_against['ALL']->ot_losses += $team->stats_against[$statid]->ot_losses;
				$team->stats_against['ALL']->ot_wins += $team->stats_against[$statid]->ot_wins;
				$team->stats_against['ALL']->points += $team->stats_against[$statid]->points;
				$team->stats_against['ALL']->goals_against += $team->stats_against[$statid]->goals_against;
				$team->stats_against['ALL']->goals_for += $team->stats_against[$statid]->goals_for;
			}
		}

		$team->players = $this->players_model->get_all_by_teamid($team->teamid);	
		foreach ($team->players as $player) 
		{
			$player->pass_percentage =	$this->goals_model->get_pass_percentage_by_playerid($player->playerid, $team->teamid);
			$player->goals = 			$this->goals_model->get_player_season_goal_sum_by_season($player->playerid, $team->team_seasonid);
			$player->assists = 			$this->goals_model->get_player_season_assist_sum_by_season($player->playerid, $team->team_seasonid);
			$player->points = 			$player->goals + $player->assists;
			$player->penalties = 		$this->penalties_model->get_player_season_penalties_sum($player->playerid, $team->team_seasonid);
		}

		$data = array
		(
			'page_title' => $team->team_color . ' Team ',
			'team' => $team,
			'seasons' => $seasons,
		);
		$this->view_wrapper('team_details', $data);	

	}

	public function teams($seasonid = 0, $is_playoff = false)
	{
		$season = ($seasonid == 0) 
					? $this->seasons_model->get_current_season()
					: $this->seasons_model->get($seasonid);

		$seasons = $this->seasons_model->get_all();

		$is_playoff_started = count($this->games_model->get_all_playoff_games_by_seasonid($season->seasonid))>0;

		$teams = array();
		$teams = $is_playoff 
				? $this->teams_model->get_all_in_playoffs_by_season($season->seasonid)
				: $this->teams_model->get_all_by_season($season->seasonid);
		$games = array();

		foreach ($teams as $team)
		{
			$wins = 0;
			$losses = 0;
			$ot_losses = 0;
			$ot_wins = 0;
			$regulation_wins = 0;
			$points = 0;
			$goals_against = 0;
			$goals_for = 0;

			$games = $this->games_model->get_season_games_played_by_team($team->teamid);
			foreach ($games as $game)
			{
				if($this->games_model->get_game_winner_teamid($game->gameid) == $team->teamid)
				{
					$wins++;
					$points += 2;
					if(!$this->games_model->is_game_overtime($game->gameid))
					{
						$regulation_wins++;
					}
				}	
				else
				{
					if($this->games_model->is_game_overtime($game->gameid))
					{
						$ot_losses++;
						$points++;
					}
					else
					{
						$losses++;
					}
				}

				$goals_for += $this->goals_model->get_goals_for_team_by_game($game->gameid, $team->teamid);
				$goals_against += $this->goals_model->get_goals_against_team_by_game($game->gameid, $team->teamid);
			}

			$teams[$team->teamid]->wins = $wins;	
			$teams[$team->teamid]->losses = $losses;	
			$teams[$team->teamid]->ot_losses = $ot_losses;	
			$teams[$team->teamid]->regulation_wins = $regulation_wins;		
			$teams[$team->teamid]->goals_against = $goals_against;	
			$teams[$team->teamid]->goals_for = $goals_for;	
			$teams[$team->teamid]->games_played = count($games);	
			$teams[$team->teamid]->tied_flag = 0;	
			$teams[$team->teamid]->team_penalties = $this->teampenalties_model->get_team_penalties($team->teamid);


			$teams[$team->teamid]->points = $points - $teams[$team->teamid]->team_penalties;

			if($is_playoff)
			{
				$playoff_wins = 0;

				$games = $this->games_model->get_playoff_games_played_by_team($team->teamid);
				foreach ($games as $game)
				{
					if($this->games_model->get_game_winner_teamid($game->gameid) == $team->teamid)
					{
						$playoff_wins++;
					}
				}
				$teams[$team->teamid]->playoff_wins = $playoff_wins;	
			}
		}

		usort($teams, array("team_standings", "sort_teams_by_points"));
		$this->assign_team_position($teams);

		if($is_playoff)
		{
			$data = array
			(
				'page_title' => 'Playoff Team Tracking',
				'teams' => $teams,
				'seasons' => $seasons,
				'season' => $season,
				'is_playoff_started' => $is_playoff_started,
			);
			$this->view_wrapper('playoff_team_tracking', $data);
		}
		else
		{
			$data = array
			(
				'page_title' => 'Team Standings',
				'teams' => $teams,
				'seasons' => $seasons,
				'season' => $season,
			);
			$this->view_wrapper('team_standings', $data);	
		}
	}
}