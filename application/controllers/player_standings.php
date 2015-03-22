<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Player_standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('players_model');
		$this->load->model('goals_model');
		$this->load->model('penalties_model');
		$this->load->model('seasons_model');
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Player Standings',
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

	public function players($is_playoff = false)
	{
		$season = $this->seasons_model->get_current_season_id();

		$players = array();
		$players = $is_playoff ?	$this->players_model->get_all_in_playoffs_by_seasonid($season):
									$this->players_model->get_all_by_seasonid($season);
	

		if($is_playoff)
		{
			foreach ($players as $player) 
			{
				$players[$player->playerid]->goals = 
					$this->goals_model->get_player_playoff_goal_sum_by_season($player->playerid, $season);
				$players[$player->playerid]->assists = 
					$this->goals_model->get_player_playoff_assist_sum_by_season($player->playerid, $season);
				$players[$player->playerid]->points = 
					$players[$player->playerid]->goals + $players[$player->playerid]->assists;
				$players[$player->playerid]->penalties = 
					$this->penalties_model->get_player_playoff_penalties_sum($player->playerid, $season);
			}
		}
		else
		{
			foreach ($players as $player) 
			{
				$players[$player->playerid]->goals = 
					$this->goals_model->get_player_season_goal_sum_by_season($player->playerid, $season);
				$players[$player->playerid]->assists = 
					$this->goals_model->get_player_season_assist_sum_by_season($player->playerid, $season);
				$players[$player->playerid]->points = 
					$players[$player->playerid]->goals + $players[$player->playerid]->assists;
				$players[$player->playerid]->penalties = 
					$this->penalties_model->get_player_season_penalties_sum($player->playerid, $season);
			}	
		}

		usort($players, array("player_standings", "sort_players_by_points"));

		$data = array
		(
			'page_title' => 'Player Standings',
			'players' => $players
		);
		$this->view_wrapper('player_standings', $data);
	}
}