<?php 
 class seasons_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get($seasonid)
	{
		$sql = "SELECT * FROM seasons s
				WHERE s.seasonid = '$seasonid'
				LIMIT 1";
		$result = $this->db->query($sql);
		return $result->row_object();
	}

	public function get_all()
	{
		$sql = "SELECT * FROM seasons s";
		$result = $this->db->query($sql);

		// Map the seson rows by their ID
		$seasons = array();
		foreach ($result->result() as $row) 
		{
			$seasons[$row->seasonid] = $row;
		}
		return $seasons;
	}

	public function get_current_season()
	{
		$currentDate =  new DateTime('NOW', new DateTimeZone('America/Montreal'));	
		$sql = "SELECT * FROM seasons s";
		$result = $this->db->query($sql);

		$season = array();
		foreach ($result->result() as $row) 
		{
			if( ($row->season_start_date<$currentDate->format('Y-m-d H:i:s')) &&
				($row->season_end_date>$currentDate->format('Y-m-d H:i:s'))		)
			{
				$season = (object) $row;
			}
		}

		if(empty($season))
		{
			$sql = "SELECT * FROM seasons s
					 ORDER BY season_start_date DESC 
					 LIMIT 1";
			$result = $this->db->query($sql);
			return $result->row_object();
		}
		return $season;
	}
 }