<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('games_model');
		$this->load->model('goals_model');
		$this->load->model('teams_model');
	}

	public function index()
	{
		$games = array();
		$games = $this->games_model->get_all_games();		

		foreach ($games as $game)
		{
			$games[$game->gameid]->home_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_home);
			$games[$game->gameid]->away_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_away);
			$games[$game->gameid]->team_home = $this->teams_model->get_team_color_by_id($game->team_home);
			$games[$game->gameid]->team_away = $this->teams_model->get_team_color_by_id($game->team_away);
		}

		usort($games, array("feed", "sort_games_by_date"));

		$data = array
		(
			'page_title' => 'Game Feed',
			'games' => $games,
		);
		$this->view_wrapper('game_feed', $data);
	}

	private function sort_games_by_date($a,$b)
	{
		if($a->game_date ==  $b->game_date )
	 	{ 
	 		if($a->gameid ==  $b->gameid )
		 	{ 
		 		return 0 ; 
		 	} 
			return ($a->gameid < $b->gameid) ? -1 : 1;
		} 
		return ($a->game_date > $b->game_date) ? -1 : 1;
	}

}