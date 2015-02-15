<?php 
 class penalties_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	// TODO: Make season specific
	public function get_player_penalties_sum($playerid)
	{
		$sql = "SELECT COUNT(*) FROM penalties
				WHERE player_serving = '$playerid'
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