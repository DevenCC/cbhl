<?php 
 class games_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_games_played_by_team($teamid)
	{
		$sql = "SELECT * FROM games g
				WHERE g.team_home = '$teamid'
				OR g.team_away = '$teamid'";

		$result = $this->db->query($sql);
		$games = array();

		// Map the games rows by their ID and only adding the games played (games with winner)
		foreach ($result->result() as $row) 
		{
			if($row->team_winner)
			{
				$games[$row->gameid] = $row;
			}
		}
		return $games;
	}

	public function get_goals_for_team($gameid, $teamid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE goal_gameid = '$gameid'
				AND team_scoring =  '$teamid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}		

	public function get_goals_against_team($gameid, $teamid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE goal_gameid = '$gameid'
				AND team_scoring <> '$teamid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}
}