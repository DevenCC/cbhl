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
		$season = $this->seasons_model->get_current_season_id();

		$games = array();
		$games = $this->games_model->get_all_games_by_seasonid($season);

		foreach ($games as $game)
		{
			$games[$game->gameid]->home_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_home);
			$games[$game->gameid]->away_goals = $this->goals_model->get_goals_for_team_by_game($game->gameid, $game->team_away);
			$games[$game->gameid]->team_home = $this->teams_model->get_team_color_by_id($game->team_home);
			$games[$game->gameid]->team_away = $this->teams_model->get_team_color_by_id($game->team_away);
			
			$games[$game->gameid]->period1_goals = array();
			$games[$game->gameid]->period2_goals = array();
			$games[$game->gameid]->period3_goals = array();
			$games[$game->gameid]->period4_goals = array();
			$games[$game->gameid]->period5_goals = array();

			$games[$game->gameid]->period1_penalties = array();
			$games[$game->gameid]->period2_penalties = array();
			$games[$game->gameid]->period3_penalties = array();
			$games[$game->gameid]->period4_penalties = array();

			$goals = $this->goals_model->get_goals_by_game($game->gameid);
			foreach ($goals as $goalid => $goal) 
			{
				$goal->team_scoring = $this->teams_model->get_team_color_by_id($goal->team_scoring);
				$goal->player_scoring = $this->players_model->get_player_full_name_by_id($goal->player_scoring);
				if($goal->player_assisting)
				{
					$goal->player_assisting = $this->players_model->get_player_full_name_by_id($goal->player_assisting);
				}

				if ($goal->goal_period == 1)
				{
					$games[$game->gameid]->period1_goals[$goal->goalid] = $goal;
				}
				elseif ($goal->goal_period == 2)
				{
					$games[$game->gameid]->period2_goals[$goal->goalid] = $goal;
				}
				elseif ($goal->goal_period == 3)
				{
					$games[$game->gameid]->period3_goals[$goal->goalid] = $goal;
				}
				elseif ($goal->goal_period == 4)
				{
					$games[$game->gameid]->period4_goals[$goal->goalid] = $goal;
				}
				elseif ($goal->goal_period == 5)
				{
					$games[$game->gameid]->period5_goals[$goal->goalid] = $goal;
				}
			}

			$penalties = $this->penalties_model->get_penalties_by_game($game->gameid);
			foreach ($penalties as $penaltyid => $penalty) 
			{
				$penalty->team_serving = 
					$this->teams_model->get_team_color_by_id(
						$penalty->team_serving);
				$penalty->player_serving =
					$this->players_model->get_player_full_name_by_id(
						$penalty->player_serving);
				if ($penalty->penalty_period == 1)
				{
					$games[$game->gameid]->period1_penalties[$penalty->penaltyid] = $penalty;
				}
				elseif ($penalty->penalty_period == 2)
				{
					$games[$game->gameid]->period2_penalties[$penalty->penaltyid] = $penalty;
				}
				elseif ($penalty->penalty_period == 3)
				{
					$games[$game->gameid]->period3_penalties[$penalty->penaltyid] = $penalty;
				}
				elseif ($penalty->penalty_period == 4)
				{
					$games[$game->gameid]->period4_penalties[$penalty->penaltyid] = $penalty;
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

}