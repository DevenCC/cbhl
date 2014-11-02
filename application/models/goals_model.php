<?php 
 class goals_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_player_goal_sum($playerid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE player_scoring = '$playerid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_player_assist_sum($playerid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE player_assisting = '$playerid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$assists_array = $result->row_array();
		return $assists_array['COUNT(*)'];
	}	
 }