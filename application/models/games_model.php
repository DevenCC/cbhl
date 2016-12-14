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

		// TODO: G1 - Add proper logic to deal with possibility of games entered but not yet played (date)
		foreach ($result->result() as $row) 
		{
				$games[$row->gameid] = $row;
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

		// TODO: G1 
		foreach ($result->result() as $row) 
		{
				$games[$row->gameid] = $row;
		}
		return $games;
	}

	public function get_all_games_by_seasonid($seasonid)
	{
		$sql = "SELECT * FROM games g
				LEFT JOIN teams t
				ON g.team_home = t.teamid
				WHERE t.team_seasonid = '$seasonid'";

		$result = $this->db->query($sql);
		$games = array();

		// TODO: G1 
		foreach ($result->result() as $row) 
		{
				$games[$row->gameid] = $row;
		}
		return $games;
	}

	public function get_all_playoff_games_by_seasonid($seasonid)
	{
		$sql = "SELECT * FROM games g
				LEFT JOIN teams t
				ON g.team_home = t.teamid
				WHERE t.team_seasonid = '$seasonid'
				AND g.game_playoff = 1";

		$result = $this->db->query($sql);
		$games = array();

		// TODO: G1 
		foreach ($result->result() as $row) 
		{
				$games[$row->gameid] = $row;
		}
		return $games;
	}

	public function is_game_overtime($gameid)
	{
		$regulation_time ='01:30:00';

		$sql = "SELECT * FROM goals go
				LEFT JOIN games ga
				ON ga.gameid = go.goal_gameid
				WHERE ga.gameid = '$gameid' ";

		$result = $this->db->query($sql);
		foreach ($result->result() as $row) 
		{
			if($row->goal_time>$regulation_time)
			{
				return true;
			}
		}

		return false;
	}

	public function get_game_winner_teamid($gameid)
	{
		$sql = "SELECT * FROM goals go
				LEFT JOIN games ga
				ON ga.gameid = go.goal_gameid
				WHERE ga.gameid = '$gameid' ";
		$result = $this->db->query($sql);
		$game_array = $result->row_array();

		$score_home = 0;
		$homeid = $game_array['team_home'];
		$score_away = 0;
		$awayid = $game_array['team_away'];

		foreach ($result->result() as $row) 
		{
			if($row->team_scoring == $row->team_home)
			{
				$score_home++;
			}
			elseif($row->team_scoring == $row->team_away)
			{
				$score_away++;
			}
		}

		return ($score_home > $score_away)? $homeid : $awayid;
	}

	public function get_game_loser_teamid($gameid)
	{
		$sql = "SELECT * FROM goals go
				LEFT JOIN games ga
				ON ga.gameid = go.goal_gameid
				WHERE ga.gameid = '$gameid' ";
		$result = $this->db->query($sql);
		$game_array = $result->row_array();

		$score_home = 0;
		$homeid = $game_array['team_home'];
		$score_away = 0;
		$awayid = $game_array['team_away'];

		foreach ($result->result() as $row) 
		{
			if($row->team_scoring == $row->team_home)
			{
				$score_home++;
			}
			elseif($row->team_scoring == $row->team_away)
			{
				$score_away++;
			}
		}

		return ($score_home < $score_away)? $homeid : $awayid;
	}
}