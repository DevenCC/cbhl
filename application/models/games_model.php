<?php 
 class games_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_season_games_played_by_team($teamid)
	{
		$sql = "SELECT * FROM games g
				WHERE g.game_playoff = 0
				AND ( g.team_home = '$teamid'
					  OR g.team_away = '$teamid')";

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

	public function get_playoff_games_played_by_team($teamid)
	{
		$sql = "SELECT * FROM games g
				WHERE g.game_playoff = 1
				AND ( g.team_home = '$teamid'
					  OR g.team_away = '$teamid')";

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

	public function get_all_games_by_seasonid($seasonid)
	{
		$sql = "SELECT * FROM games g
				LEFT JOIN teams t
				ON g.team_winner = t.teamid
				WHERE t.team_seasonid = '$seasonid'";

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

	public function get_all_playoff_games_by_seasonid($seasonid)
	{
		$sql = "SELECT * FROM games g
				LEFT JOIN teams t
				ON g.team_winner = t.teamid
				WHERE t.team_seasonid = '$seasonid'
				AND g.game_playoff = 1";

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
}