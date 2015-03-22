<?php 
 class goals_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_player_season_goal_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_scoring = '$playerid'
				AND ga.game_playoff = 0
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_player_season_assist_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_assisting = '$playerid'
				AND ga.game_playoff = 0
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_player_playoff_goal_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_scoring = '$playerid'
				AND ga.game_playoff = 1
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_player_playoff_assist_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_assisting = '$playerid'
				AND ga.game_playoff = 1
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_goals_by_game($gameid)
	{
		$sql = "SELECT * FROM goals
				WHERE goal_gameid = '$gameid'";
		$result = $this->db->query($sql);
		$goals = array();

		// Map the goals rows by their ID
		foreach ($result->result() as $row) 
		{
			$goals[$row->goalid] = $row;
		}
		return $goals;
	}	

	public function get_goals_for_team_by_game($gameid, $teamid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE goal_gameid = '$gameid'
				AND team_scoring =  '$teamid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}		

	public function get_goals_against_team_by_game($gameid, $teamid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE goal_gameid = '$gameid'
				AND team_scoring <> '$teamid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}
 }