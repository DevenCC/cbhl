<?php 
 class penalties_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_player_season_penalties_sum($playerid, $seasonid)
	{
		$sql = "SELECT COUNT(*) FROM penalties p
				LEFT JOIN games g
				ON p.penalty_gameid = g.gameid
				LEFT JOIN teams t
				ON p.team_serving = t.teamid
				WHERE p.player_serving = '$playerid'
				AND g.game_playoff = 0
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$penalties_array = $result->row_array();
		return $penalties_array['COUNT(*)'];
	}

	public function get_player_playoff_penalties_sum($playerid, $seasonid)
	{
		$sql = "SELECT COUNT(*) FROM penalties p
				LEFT JOIN games g
				ON p.penalty_gameid = g.gameid
				LEFT JOIN teams t
				ON p.team_serving = t.teamid
				WHERE p.player_serving = '$playerid'
				AND g.game_playoff = 1
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$penalties_array = $result->row_array();
		return $penalties_array['COUNT(*)'];
	}

	public function get_penalties_by_game($gameid)
	{
		$sql = "SELECT * FROM penalties
				WHERE penalty_gameid = '$gameid'";
		$result = $this->db->query($sql);
		$penalties = array();

		// Map the penalties rows by their ID
		foreach ($result->result() as $row) 
		{
			$penalties[$row->penaltyid] = $row;
		}
		return $penalties;
	}	

	public function get_team_penalty_success_by_teamid($penalty_teamid, $scoring_team)
	{
		$penalty_length = 5*60; // in seconds
		$sql = "SELECT penalties.penaltyid, penalties.team_serving, penalties.penalty_gameid, penalties.penalty_time, goals.goal_time, goals.team_scoring
				FROM penalties
				JOIN  goals on goals.goal_gameid = penalties.penalty_gameid
				WHERE penalties.team_serving = '$penalty_teamid'
				AND goals.team_scoring = '$scoring_team'";

		$result = $this->db->query($sql);
		$unsucessfull_pk = 0;
		$distinct_penalties = array();

		foreach ($result->result() as $row) 
		{
			if(!in_array($row->penaltyid, $distinct_penalties))
			{
				array_push($distinct_penalties, $row->penaltyid);
			}
			if( strtotime($row->goal_time) - strtotime($row->penalty_time) <= $penalty_length &&
				strtotime($row->goal_time) - strtotime($row->penalty_time) >  0) 
			{
				$unsucessfull_pk++;
			}

		}
		
		return (empty($distinct_penalties)) ?
					null:
					(count($distinct_penalties) - $unsucessfull_pk)/ count($distinct_penalties);
	}

	public function get_penaltykill_success_by_teamid($penalty_teamid)
	{
		$penalty_length = 5*60; // in seconds
		$sql = "SELECT penalties.penaltyid, penalties.team_serving, penalties.penalty_gameid, penalties.penalty_time, goals.goal_time, goals.team_scoring
				FROM penalties
				JOIN  goals on goals.goal_gameid = penalties.penalty_gameid
				WHERE penalties.team_serving = '$penalty_teamid'
				AND goals.team_scoring <> '$penalty_teamid'";

		$result = $this->db->query($sql);
		$unsucessfull_pk = 0;
		$distinct_penalties = array();

		foreach ($result->result() as $row) 
		{
			if(!in_array($row->penaltyid, $distinct_penalties))
			{
				array_push($distinct_penalties, $row->penaltyid);
			}
			if( strtotime($row->goal_time) - strtotime($row->penalty_time) <= $penalty_length &&
				strtotime($row->goal_time) - strtotime($row->penalty_time) >  0) 
			{
				$unsucessfull_pk++;
			}

		}
		
		return (empty($distinct_penalties))?
					null:
					(count($distinct_penalties) - $unsucessfull_pk)/ count($distinct_penalties);
	}

	public function get_powerplay_success_by_teamid($powerplay_teamid)
	{
		$penalty_length = 5*60; // in seconds
		$sql = "SELECT penalties.penaltyid, penalties.team_serving, penalties.penalty_gameid, penalties.penalty_time, goals.goal_time, goals.team_scoring
				FROM penalties
				JOIN  goals on goals.goal_gameid = penalties.penalty_gameid
				WHERE penalties.team_serving <> '$powerplay_teamid'
				AND goals.team_scoring = '$powerplay_teamid'";

		$result = $this->db->query($sql);
		$sucessful_powerplay = 0;
		$distinct_penalties = array();

		foreach ($result->result() as $row) 
		{
			if(!in_array($row->penaltyid, $distinct_penalties))
			{
				array_push($distinct_penalties, $row->penaltyid);
			}
			if( strtotime($row->goal_time) - strtotime($row->penalty_time) <= $penalty_length &&
				strtotime($row->goal_time) - strtotime($row->penalty_time) >  0) 
			{
				$sucessful_powerplay++;
			}

		}
		
		return (empty($distinct_penalties))? 
					null :
					($sucessful_powerplay)/ count($distinct_penalties);
	}
 }