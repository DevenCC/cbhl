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
 }