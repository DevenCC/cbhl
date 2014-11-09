<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('players_model');
		$this->load->model('goals_model');
		$this->load->model('teams_model');
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Standings',
			'message' => 'Hello World'
		);

		$this->view_wrapper('standings', $data);
	}

	private function sort_by_points($a,$b)
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

	public function players()
	{
		$players = array();
		$players = $this->players_model->get_all();

		// Removing spare players
		unset($players[41]);
		unset($players[42]);
		unset($players[43]);
		unset($players[44]);
	
		foreach ($players as $player) 
		{
			$players[$player->playerid]->goals = 
				$this->goals_model->get_player_goal_sum($player->playerid);
			$players[$player->playerid]->assists = 
				$this->goals_model->get_player_assist_sum($player->playerid);
			$players[$player->playerid]->points = 
				$players[$player->playerid]->goals + $players[$player->playerid]->assists;
		}

		usort($players, array("standings", "sort_by_points"));

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
		$teams = $this->teams_model->get_all();

		// Removing "spare" team
		unset($teams[5]);
			
		$data = array
		(
			'page_title' => 'Team Standings',
			'teams' => $teams
		);
		$this->view_wrapper('team_standings', $data);
	}

}