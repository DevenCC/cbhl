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

	public function get_all($sort_by = NULL)
	{
		$sql = "SELECT * FROM players p";
		if ($sort_by) 
		{
			// This is really bad and has a security flaw - SQL Injection
			// Ask Stew about this later
			$sql .= ' ORDER BY ' . $sort_by;
		}

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