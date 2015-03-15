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
				WHERE p.seasonid = '$seasonid'
				LIMIT 1";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function get_current_season_id()
	{
		$currentDate =  new DateTime('NOW', new DateTimeZone('America/Montreal'));	
		$sql = "SELECT * FROM seasons s";
		$result = $this->db->query($sql);

		foreach ($result->result() as $row) 
		{
			if( ($row->season_start_date<$currentDate->format('Y-m-d H:i:s')) &&
				($row->season_end_date>$currentDate->format('Y-m-d H:i:s'))		)
			{
				return $row->seasonid;
			}
		}
	}
 }