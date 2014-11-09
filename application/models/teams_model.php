<?php 
 class teams_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
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
		//TODO: Needs to be season specific

		$sql = "SELECT * FROM teams t";
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