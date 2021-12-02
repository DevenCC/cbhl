<?php 
 class teampenalties_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_team_penalties($teamid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM teampenalties p
				WHERE p.teamid = '$teamid'";

		$result = $this->db->query($sql);
		$penalty_array = $result->row_array();
		return $penalty_array['COUNT(*)'];
	}
 }