<?php 
 class players_teams_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_player_current_team_by_id($playerid)
	{
		$sql = "SELECT teamid
				FROM playersteams 
				WHERE playerid = '$playerid'
				LIMIT 1";
		$result = $this->db->query($sql);
		$player_team = $result->row_array();
		return @$player_team['teamid'];
	}
}