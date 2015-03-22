<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('games_model');
		$this->load->model('goals_model');
		$this->load->model('teams_model');
		$this->load->model('seasons_model');
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Team Standings',
		);

		$this->view_wrapper('standings', $data);
	}

	// Get the team's goal total agaisnt a specific team throughout the entire season
	private function get_total_goals_agaisnt_team($teamid, $opposing_teamid)
	{
		$games = $this->games_model->get_games_played_by_team($teamid);
		$get_total_goals_agaisnt_team = 0;
		foreach ($games as $game)
		{
			if( ($game->team_home == $teamid 		  && $game->team_away == $opposing_teamid) ||
				($game->team_home == $opposing_teamid && $game->team_away == $teamid)			)
			{
				$get_total_goals_agaisnt_team += $this->goals_model->get_goals_for_team_by_game($game->gameid, $teamid);
			}
		}

		return $get_total_goals_agaisnt_team;
	}

	private function sort_teams_by_points($a,$b)
	{
		if($a->points ==  $b->points )
	 	{ 
	 		if($a->wins ==  $b->wins )
		 	{ 
		 		if($a->regulation_wins ==  $b->regulation_wins )
			 	{ 
			 		$a_points = $this->get_total_goals_agaisnt_team($a->teamid, $b->teamid);
			 		$b_points = $this->get_total_goals_agaisnt_team($b->teamid, $a->teamid);
			 		if($a_points ==  $b_points )
				 	{ 
				 		if( ($a->goals_for - $a->goals_against) ==  ($b->goals_for - $b->goals_against) )
					 	{ 
					 		$a->tied_flag+=1;
					 		$b->tied_flag+=1;
					 		return 0 ; 
					 	} 
						return (($a->goals_for - $a->goals_against) > ($b->goals_for - $b->goals_against)) ? -1 : 1;
				 	} 
					return ($a_points > $b_points) ? -1 : 1;
			 	} 
				return ($a->regulation_wins > $b->regulation_wins) ? -1 : 1;
			} 
			return ($a->wins > $b->wins) ? -1 : 1;
		} 
		return ($a->points > $b->points) ? -1 : 1;
	}

	private function assign_team_position($teams)
	{
		$position = 0;
		foreach ($teams as $team)
		{
			if($position == 0)
			{
				$team->position = ++$position;
			}
			else
			{
				if($team->tied_flag != 0 && $team->tied_flag == $teams[$team->teamid-1]->tied_flag && $team->points == $teams[$team->teamid-1]->points)
				{
					$team->position = $teams[$team->teamid-1]->position;
					++$position;	
				}
				else
				{
					$team->position = ++$position;		
				}
		}
		}
	}

	

	public function teams($is_playoff = false)
	{
		$season = $this->seasons_model->get_current_season_id();

		$teams = array();
		$games = array();

		$teams = $is_playoff ?	$this->teams_model->get_all_in_playoffs_by_season($season):
								$this->teams_model->get_all_by_season($season);

		foreach ($teams as $team)
		{
			$wins = 0;
			$losses = 0;
			$ot_losses = 0;
			$regulation_wins = 0;
			$points = 0;
			$goals_against = 0;
			$goals_for = 0;

			$games = $this->games_model->get_season_games_played_by_team($team->teamid);
			foreach ($games as $game)
			{
				if($game->team_winner == $team->teamid)
				{
					$wins++;
					$points += 2;
					if($game->game_overtime == 0)
					{
						$regulation_wins++;
					}
				}	
				else
				{
					if($game->game_overtime == 1)
					{
						$ot_losses++;
						$points++;
					}
					else
					{
						$losses++;
					}
				}

				$goals_for += $this->goals_model->get_goals_for_team_by_game($game->gameid, $team->teamid);
				$goals_against += $this->goals_model->get_goals_against_team_by_game($game->gameid, $team->teamid);
			}

			$teams[$team->teamid]->wins = $wins;	
			$teams[$team->teamid]->losses = $losses;	
			$teams[$team->teamid]->ot_losses = $ot_losses;	
			$teams[$team->teamid]->regulation_wins = $regulation_wins;	
			$teams[$team->teamid]->points = $points;	
			$teams[$team->teamid]->goals_against = $goals_against;	
			$teams[$team->teamid]->goals_for = $goals_for;	
			$teams[$team->teamid]->games_played = count($games);	
			$teams[$team->teamid]->tied_flag = 0;	

			if($is_playoff)
			{
				$playoff_wins = 0;

				$games = $this->games_model->get_playoff_games_played_by_team($team->teamid);
				foreach ($games as $game)
				{
					if($game->team_winner == $team->teamid)
					{
						$playoff_wins++;
					}
				}
				$teams[$team->teamid]->playoff_wins = $playoff_wins;	
			}
		}

		usort($teams, array("team_standings", "sort_teams_by_points"));

		$this->assign_team_position($teams);

		if($is_playoff)
		{
			$is_playoff_started = count($this->games_model->get_all_playoff_games_by_seasonid($season))>0;
			if($is_playoff_started)
			{
				$data = array
				(
					'page_title' => 'Playoff Team Tracking',
					'teams' => $teams,
				);
				$this->view_wrapper('playoff_team_tracking', $data);
			}
			else
			{
				$data = array
				(
					'page_title' => 'Playoff Team Tracking',
				);
				$this->view_wrapper('playoffs_not_started', $data);	
			}
		}
		else
		{
			$data = array
			(
				'page_title' => 'Team Standings',
				'teams' => $teams,
			);
			$this->view_wrapper('team_standings', $data);	
		}
	}

}