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
		 		return 0 ; 
		 	} 
			return ($a->wins > $b->wins) ? -1 : 1;
		} 
		return ($a->points > $b->points) ? -1 : 1;
	}

	public function players()
	{
		$players = array();
		$players = $this->players_model->get_all();

		// Removing spare players
		unset($players[41]);
		unset($players[42]);
		unset($players[43]);
		unset($players[44]);
		unset($players[45]);
		unset($players[46]);
		unset($players[47]);
		unset($players[48]);
		unset($players[49]);
	
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
			$ot_wins = 0;
			$ot_losses = 0;
			$points = 0;
			$goals_against = 0;
			$goals_for = 0;

			foreach ($games as $game)
			{
				if($game->team_winner == $team->teamid)
				{
					$wins++;
					$points += 2;
					if($game->game_overtime == 1)
					{
						$ot_wins++;
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
			$teams[$team->teamid]->ot_wins = $ot_wins;	
			$teams[$team->teamid]->ot_losses = $ot_losses;	
			$teams[$team->teamid]->points = $points;	
			$teams[$team->teamid]->goals_against = $goals_against;	
			$teams[$team->teamid]->goals_for = $goals_for;	
			$teams[$team->teamid]->games_played = count($games);	
		}

		usort($teams, array("standings", "sort_teams_by_points"));

		$data = array
		(
			'page_title' => 'Team Standings',
			'teams' => $teams,
			'games' => $games,
		);
		$this->view_wrapper('team_standings', $data);
	}

}