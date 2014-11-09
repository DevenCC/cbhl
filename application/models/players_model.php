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
		//TODO: Needs to be seasons specific

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
 }