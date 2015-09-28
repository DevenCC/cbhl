<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('teams_model');
		$this->load->model('seasons_model');
		$this->load->model('players_model');
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Schedules',
		);

		$this->view_wrapper('standings', $data);
	}

	public function season()
	{

		$season = $this->seasons_model->get_current_season();

		$teams_temp = array();
		$teams = array();
		$teams_temp = $this->teams_model->get_all_by_season($season['seasonid']);

		// map teams in teams array as incrementing indexes from 0 instead of by teamid
		foreach ($teams_temp as $team)
		{
			array_push($teams, $team);
		}

		$data = array
		(
			'page_title' => 'Season Schedule',
			'teams' => $teams,
			'start_date' => $season['season_start_date'],
		);
		$this->view_wrapper('schedule_season', $data);
	}

	public function referee()
	{
		$season = $this->seasons_model->get_current_season();

		$teams_temp = array();
		$teams = array();
		$teams_temp = $this->teams_model->get_all_by_season($season['seasonid']);

		// mapping the teams in $teams to incremental indexes from 0 instead of by teamid
		foreach ($teams_temp as $team)
		{
			$team->players=$this->players_model->get_all_by_teamid($team->teamid);
			array_push($teams, $team);
		}



		$data = array
		(
			'page_title' => 'Referee Schedule',
			'teams' => $teams,
			'start_date' => $season['season_start_date'],
		);
		$this->view_wrapper('schedule_referee', $data);
	}
}