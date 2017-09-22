<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('teams_model');
		$this->load->model('seasons_model');
	}

	public function index()
	{
		$season = $this->seasons_model->get_current_season();

		$teams_temp = array();
		$teams = array();
		$teams_temp = $this->teams_model->get_all_by_season($season->seasonid);

		// map teams in teams array as incrementing indexes from 0 instead of by teamid
		foreach ($teams_temp as $team)
		{
			array_push($teams, $team);
		}

		$data = array
		(
			'page_title' => 'Season Schedule',
			'teams' => $teams,
			'start_date' => $season->season_start_date,
		);
		$this->view_wrapper('schedule', $data);
	}
}