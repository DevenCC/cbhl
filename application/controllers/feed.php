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

		foreach ($games as $game)
		{
			$games[$game->gameid]->home_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_home);
			$games[$game->gameid]->away_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_away);
			$games[$game->gameid]->team_home = $this->teams_model->get_team_color_by_id($game->team_home);
			$games[$game->gameid]->team_away = $this->teams_model->get_team_color_by_id($game->team_away);
			
			$games[$game->gameid]->period1 = array();
			$games[$game->gameid]->period2 = array();
			$games[$game->gameid]->period3 = array();
			$games[$game->gameid]->period4 = array();
			$games[$game->gameid]->period5 = array();

			$goals = $this->goals_model->get_goals_by_game($game->gameid);
			foreach ($goals as $goalid => $goal) 
			{
				$action = new stdClass();
				$action->type = "goal";
				$action->team = $this->teams_model->get_team_color_by_id($goal->team_scoring);
				$action->player_primary =$this->players_model->get_player_full_name_by_id($goal->player_scoring);

				$goal->player_assisting ? $action->player_secondary = $this->players_model->get_player_full_name_by_id($goal->player_assisting):
										  $action->player_secondary = "none";	

				if ($goal->goal_time < '00:30:00' )
				{
					$action->time = $goal->goal_time;
					array_push($games[$game->gameid]->period1, $action);
				}
				elseif ($goal->goal_time < '01:00:00' )
				{
					$action->time = (new DateTime($goal->goal_time))->sub(new DateInterval("PT30M"))->format('H:i:s');
					array_push($games[$game->gameid]->period2, $action);
				}
				elseif ($goal->goal_time < '01:30:00' )
				{
					$action->time = (new DateTime($goal->goal_time))->sub(new DateInterval("PT1H"))->format('H:i:s');
					array_push($games[$game->gameid]->period3, $action);
				}
				elseif ($goal->goal_time < '01:50:00' )
				{
					$action->time = (new DateTime($goal->goal_time))->sub(new DateInterval("PT1H30M"))->format('H:i:s');
					array_push($games[$game->gameid]->period4, $action);
				}
				else
				{
					$action->time = null;
					array_push($games[$game->gameid]->period5, $action);
				}
			}

			$penalties = $this->penalties_model->get_penalties_by_game($game->gameid);
			foreach ($penalties as $penaltyid => $penalty) 
			{
				$action = new stdClass();
				$action->type = "penalty";
				$action->team = $this->teams_model->get_team_color_by_id($penalty->team_serving);
				$action->player_primary = $this->players_model->get_player_full_name_by_id($penalty->player_serving);
				$action->player_secondary = null;

				if ($penalty->penalty_time < '00:30:00' )
				{
					$action->time = $penalty->penalty_time;
					array_push($games[$game->gameid]->period1, $action);
				}
				elseif ($penalty->penalty_time < '01:00:00' )
				{
					$action->time = (new DateTime($penalty->penalty_time))->sub(new DateInterval("PT30M"))->format('H:i:s');
					array_push($games[$game->gameid]->period2, $action);
				}
				elseif ($penalty->penalty_time < '01:30:00' )
				{
					$action->time =(new DateTime($penalty->penalty_time))->sub(new DateInterval("PT1H"))->format('H:i:s');
					array_push($games[$game->gameid]->period3, $action);
				}
				elseif ($penalty->penalty_time < '01:50:00' )
				{
					$action->time = (new DateTime($penalty->penalty_time))->sub(new DateInterval("PT1H30M"))->format('H:i:s');
					array_push($games[$game->gameid]->period4, $action);
				}
				else
				{
					$action->time = null;
					array_push($games[$game->gameid]->period5, $action);
				}	
			}

			usort($games[$game->gameid]->period1, array("feed", "sort_actions_by_time"));
			usort($games[$game->gameid]->period2, array("feed", "sort_actions_by_time"));
			usort($games[$game->gameid]->period3, array("feed", "sort_actions_by_time"));
			usort($games[$game->gameid]->period4, array("feed", "sort_actions_by_time"));
			usort($games[$game->gameid]->period5, array("feed", "sort_actions_by_time"));

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
 		if($a->time ==  $b->time )
	 	{ 
	 		return 0 ; 
	 	} 
		return ($a->time < $b->time) ? -1 : 1;
	}

}