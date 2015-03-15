<?php 
 class players_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get($playerid)
	{
		$sql = "SELECT * FROM players p
				WHERE p.playerid = '$playerid'
				LIMIT 1";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function get_all()
	{
		$sql = "SELECT * FROM players p";
		$result = $this->db->query($sql);

		// Map the player rows by their ID
		$players = array();
		foreach ($result->result() as $row) 
		{
			$players[$row->playerid] = $row;
		}
		return $players;
	}

	public function get_player_full_name_by_id($playerid)
	{
		$sql = "SELECT player_first_name, player_last_name 
				FROM players 
				WHERE playerid = '$playerid'
				LIMIT 1";
		$result = $this->db->query($sql);
		$player_array = $result->row_array();
		return @$player_array['player_first_name'] . " " . @$player_array['player_last_name'];
	}

	// Excludes spares
	public function get_all_by_seasonid($seasonid)
	{
		$sql = "SELECT DISTINCT players.playerid, players.player_first_name, players.player_last_name
				FROM playersteams
				JOIN players on playersteams.playerid = players.playerid
				JOIN teams on playersteams.teamid = teams.teamid
				WHERE teams.team_seasonid = '$seasonid'
				AND teams.team_color <> 'none'";
		$result = $this->db->query($sql);

		// Map the player rows by their ID
		$players = array();
		foreach ($result->result() as $row) 
		{
			$players[$row->playerid] = $row;
		}
		return $players;
	}
 }