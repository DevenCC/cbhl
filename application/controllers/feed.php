<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('games_model');
		$this->load->model('goals_model');
		$this->load->model('penalties_model');
		$this->load->model('players_model');
		$this->load->model('players_teams_model');
		$this->load->model('teams_model');
		$this->load->model('seasons_model');
	}

	public function index()
	{
		$season = $this->seasons_model->get_current_season();

		$games = array();
		$games = $this->games_model->get_all_games_by_seasonid($season->seasonid);


		$TIME_0 = (int)(strtotime("00:00:00"));
		foreach ($games as $game)
		{
			$games[$game->gameid]->home_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_home);
			$games[$game->gameid]->away_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_away);
			$games[$game->gameid]->team_home = $this->teams_model->get_team_color_by_id($game->team_home);
			$games[$game->gameid]->team_away = $this->teams_model->get_team_color_by_id($game->team_away);
			$games[$game->gameid]->is_overtime = 0;
			$games[$game->gameid]->number_periods_played = 3;
			$games[$game->gameid]->actions = array();

			$goals = $this->goals_model->get_goals_by_game($game->gameid);
			foreach ($goals as $goalid => $goal) 
			{
				$action = new stdClass();
				$action->type = "goal";
				$action->team = $this->teams_model->get_team_color_by_id($goal->team_scoring);
				$action->player_primary =$this->players_model->get_player_full_name_by_id($goal->player_scoring);

				$goal->player_assisting ? $action->player_secondary = $this->players_model->get_player_full_name_by_id($goal->player_assisting):
										  $action->player_secondary = "none";	

				$action->period = (int)((strtotime($goal->goal_time) - $TIME_0) / 1800) + 1;
				$action->periodSeconds = (int)(((strtotime($goal->goal_time) - $TIME_0) % 1800) % 60);
				$action->periodMinutes = (int)(((strtotime($goal->goal_time) - $TIME_0) % 1800) / 60);

				if($action->period > $games[$game->gameid]->number_periods_played)
				{
					$games[$game->gameid]->number_periods_played = $action->period;
				}

				if($games[$game->gameid]->is_overtime == 0 && $action->period > 3 )
				{
					$games[$game->gameid]->is_overtime = 1;
				}

				if(!array_key_exists($action->period,$games[$game->gameid]->actions))
				{
					$games[$game->gameid]->actions[$action->period] = array();	
				}

				array_push($games[$game->gameid]->actions[$action->period], $action);
			}

			$penalties = $this->penalties_model->get_penalties_by_game($game->gameid);
			foreach ($penalties as $penaltyid => $penalty) 
			{
				$action = new stdClass();
				$action->type = "penalty";
				$action->team = $this->teams_model->get_team_color_by_id($penalty->team_serving);
				$action->player_primary = $this->players_model->get_player_full_name_by_id($penalty->player_serving);
				$action->player_secondary = null;

				$action->period = (int)((strtotime($penalty->penalty_time) - $TIME_0) / 1800) + 1;
				$action->periodSeconds = (int)(((strtotime($penalty->penalty_time) - $TIME_0) % 1800) % 60);
				$action->periodMinutes = (int)(((strtotime($penalty->penalty_time) - $TIME_0) % 1800) / 60);

				if(!array_key_exists($action->period,$games[$game->gameid]->actions))
				{
					$games[$game->gameid]->actions[$action->period] = array();	
				}

				array_push($games[$game->gameid]->actions[$action->period], $action);
			}


			ksort($games[$game->gameid]->actions);

			for($period_number = 1 ; $period_number <= (int)$games[$game->gameid]->number_periods_played; $period_number++)
			{
				if(array_key_exists($period_number,$games[$game->gameid]->actions))
				{
					usort($games[$game->gameid]->actions[$period_number], array("feed", "sort_actions_by_time"));
				}
			}
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

	private function sort_actions_by_time($a,$b)
	{	
		if(((int)$a->periodMinutes) ==  ((int)$b->periodMinutes) )
		{ 
			if(((int)$a->periodSeconds) ==  ((int)$b->periodSeconds) )
			{ 
			 	return 0 ; 
			} 
			return (((int)$a->periodSeconds) < ((int)$b->periodSeconds)) ? -1 : 1;
		} 
		return (((int)$a->periodMinutes) < ((int)$b->periodMinutes)) ? -1 : 1;
	 } 

}