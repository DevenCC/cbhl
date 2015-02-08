<?php 
 class goals_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	// TODO: Make season specific
	public function get_player_goal_sum($playerid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE player_scoring = '$playerid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	// TODO: Make season specific
	public function get_player_assist_sum($playerid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE player_assisting = '$playerid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$assists_array = $result->row_array();
		return $assists_array['COUNT(*)'];
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