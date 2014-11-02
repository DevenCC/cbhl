<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('players_model');
		$this->load->model('goals_model');
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

	public function player()
	{

		$players = array();
		$players = $this->players_model->get_all();

		// Removing spare players
		unset($players[41]);
		unset($players[42]);
		unset($players[43]);
		unset($players[44]);
	
		$goals = array();
		$assists = array();
		foreach ($players as $player) 
		{
			$goals[$player->playerid] = 
				$this->goals_model->get_player_goal_sum($player->playerid);
			$assists[$player->playerid] = 
				$this->goals_model->get_player_assist_sum($player->playerid);
		}

		$data = array
		(
			'page_title' => 'Player Standings',
			'players' => $players,
			'goals' => $goals,
			'assists' => $assists
		);
		$this->view_wrapper('player_standings', $data);
	}
}