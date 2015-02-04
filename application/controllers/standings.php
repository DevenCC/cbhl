<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('players_model');
		$this->load->model('games_model');
		$this->load->model('goals_model');
		$this->load->model('teams_model');
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Standings',
		);

		$this->view_wrapper('standings', $data);
	}

	// Get the team's goal total agaisnt a specific team throughout the entire season
	private function get_total_goals_agaisnt_team($teamid, $opposing_teamid)
	{
		$games = $this->games_model->get_games_played_by_team($teamid);
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

	private function sort_players_by_points($a,$b)
	{
		if($a->points ==  $b->points )
	 	{ 
	 		if($a->goals ==  $b->goals )
		 	{ 
		 		return 0 ; 
		 	} 
			return ($a->goals > $b->goals) ? -1 : 1;
		} 
		return ($a->points > $b->points) ? -1 : 1;
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
		$position = 0;
		foreach ($teams as $team)
		{
			if($position == 0)
			{
				$team->position = ++$position;
			}
			else
			{
				if($team->tied_flag != 0 && $team->tied_flag == $teams[$team->teamid-1]->tied_flag && $team->points == $teams[$team->teamid-1]->points)
				{
					$team->position = $teams[$team->teamid-1]->position;
					++$position;	
				}
				else
				{
					$team->position = ++$position;		
				}
		}
		}
	}

	public function players()
	{
		$players = array();
		$players = $this->players_model->get_all();

		// Removing spare players
		unset($players[41]);
		unset($players[42]);
		unset($players[44]);
		unset($players[45]);
		unset($players[46]);
		unset($players[47]);
		unset($players[48]);
		unset($players[49]);
		unset($players[50]);
		unset($players[51]);
		unset($players[52]);
		unset($players[53]);
		unset($players[54]);
		unset($players[55]);
		unset($players[56]);
	
		foreach ($players as $player) 
		{
			$players[$player->playerid]->goals = 
				$this->goals_model->get_player_goal_sum($player->playerid);
			$players[$player->playerid]->assists = 
				$this->goals_model->get_player_assist_sum($player->playerid);
			$players[$player->playerid]->points = 
				$players[$player->playerid]->goals + $players[$player->playerid]->assists;
		}

		usort($players, array("standings", "sort_players_by_points"));

		$data = array
		(
			'page_title' => 'Player Standings',
			'players' => $players
		);
		$this->view_wrapper('player_standings', $data);
	}

	public function teams()
	{
		$teams = array();
		$games = array();
		$teams = $this->teams_model->get_all();

		foreach ($teams as $team)
		{
			$games = $this->games_model->get_games_played_by_team($team->teamid);
			$wins = 0;
			$losses = 0;
			$ot_losses = 0;
			$regulation_wins = 0;
			$points = 0;
			$goals_against = 0;
			$goals_for = 0;

			foreach ($games as $game)
			{
				if($game->team_winner == $team->teamid)
				{
					$wins++;
					$points += 2;
					if($game->game_overtime == 0)
					{
						$regulation_wins++;
					}
				}	
				else
				{
					if($game->game_overtime == 1)
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
			$teams[$team->teamid]->points = $points;	
			$teams[$team->teamid]->goals_against = $goals_against;	
			$teams[$team->teamid]->goals_for = $goals_for;	
			$teams[$team->teamid]->games_played = count($games);	
			$teams[$team->teamid]->tied_flag = 0;	
		}

		usort($teams, array("standings", "sort_teams_by_points"));

		$this->assign_team_position($teams);

		$data = array
		(
			'page_title' => 'Team Standings',
			'teams' => $teams,
			'games' => $games,
		);
		$this->view_wrapper('team_standings', $data);
	}

}