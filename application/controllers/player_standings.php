<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Player_standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('players_model');
		$this->load->model('goals_model');
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
		$players = $this->players_model->get_all_by_seasonid($season);
	
		foreach ($players as $player) 
		{
			$players[$player->playerid]->goals = 
				$this->goals_model->get_player_goal_sum($player->playerid);
			$players[$player->playerid]->assists = 
				$this->goals_model->get_player_assist_sum($player->playerid);
			$players[$player->playerid]->points = 
				$players[$player->playerid]->goals + $players[$player->playerid]->assists;
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