<?php 
 class teams_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_team_color_by_id($teamid)
	{
		$sql = "SELECT team_color FROM teams 
				WHERE teamid = '$teamid'
				LIMIT 1";
		$result = $this->db->query($sql);
		$team_array = $result->row_array();
		return $team_array['team_color'];
	}

	public function get($teamid)
	{
		$sql = "SELECT * FROM teams t
				WHERE t.teamid = '$teamid'
				LIMIT 1";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function get_all()
	{
		$sql = "SELECT * FROM teams t";
		$result = $this->db->query($sql);

		$teams = array();

		// Map the team rows by their ID
		foreach ($result->result() as $row) 
		{
			$teams[$row->teamid] = $row;
		}
		return $teams;
	}

	public function get_all_by_season($seasonid)
	{
		$sql = "SELECT * FROM teams t
				WHERE t.team_seasonid = '$seasonid'";
		$result = $this->db->query($sql);

		$teams = array();

		// Map the team rows by their ID and removing team "spare"
		foreach ($result->result() as $row) 
		{
			if($row->team_color != "none")
			{
				$teams[$row->teamid] = $row;
			}
		}
		return $teams;
	}
 }