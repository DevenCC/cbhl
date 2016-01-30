<?php 
 class goals_model extends CI_Model
 {
 	public function __construct()
	{
		parent::__construct();
	}

	public function get_player_season_goal_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_scoring = '$playerid'
				AND ga.game_playoff = 0
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_player_season_assist_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_assisting = '$playerid'
				AND ga.game_playoff = 0
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_player_playoff_goal_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_scoring = '$playerid'
				AND ga.game_playoff = 1
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_player_playoff_assist_sum_by_season($playerid, $seasonid)
	{
		$sql = "SELECT DISTINCT COUNT(*) FROM goals go
				LEFT JOIN games ga
				ON go.goal_gameid = ga.gameid
				LEFT JOIN teams t
				ON go.team_scoring = t.teamid
				WHERE go.player_assisting = '$playerid'
				AND ga.game_playoff = 1
				AND t.team_seasonid = '$seasonid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_goals_by_game($gameid)
	{
		$sql = "SELECT * FROM goals
				WHERE goal_gameid = '$gameid'";
		$result = $this->db->query($sql);
		$goals = array();

		// Map the goals rows by their ID
		foreach ($result->result() as $row) 
		{
			$goals[$row->goalid] = $row;
		}
		return $goals;
	}	

	public function get_goals_for_team_by_game($gameid, $teamid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE goal_gameid = '$gameid'
				AND team_scoring =  '$teamid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}		

	public function get_goals_against_team_by_game($gameid, $teamid)
	{
		$sql = "SELECT COUNT(*) FROM goals
				WHERE goal_gameid = '$gameid'
				AND team_scoring <> '$teamid'
				LIMIT 1";

		$result = $this->db->query($sql);
		$goals_array = $result->row_array();
		return $goals_array['COUNT(*)'];
	}

	public function get_team_first_goal_by_game($gameid, $teamid)
	{
		$sql = "SELECT goal_time FROM goals
				WHERE goal_gameid = '$gameid'
				AND team_scoring = '$teamid'
				ORDER BY goal_time ASC
				LIMIT 1";

		$result = $this->db->query($sql);
		return (!$result->row_array())
				? strtotime("01:30:00") 
				: strtotime($result->row_array()['goal_time']);
	}

	public function get_pass_percentage_by_playerid($playerid, $teamid)
	{
		$sql = "SELECT players.player_first_name, players.player_last_name, goals.player_assisting 
				FROM goals
				LEFT JOIN players on goals.player_assisting = players.playerid
				WHERE goals.player_scoring = '$playerid'
				AND team_scoring = '$teamid'";

		$result = $this->db->query($sql);
		$passing_players = array();
		$total_passes = 0;

		foreach ($result->result() as $row) 
		{
			$total_passes++;
			
			if($row->player_assisting <> null)
			{
				if(array_key_exists($row->player_first_name.' '.$row->player_last_name, $passing_players))
				{
					$passing_players[$row->player_first_name.' '.$row->player_last_name]++;	
				}
				else
				{
					$passing_players[$row->player_first_name.' '.$row->player_last_name] = 1;
				}
			}
			else
			{
				if(array_key_exists('Unassisted', $passing_players))
				{
					$passing_players['Unassisted']++;
				}
				else
				{
					$passing_players['Unassisted'] = 1;
				}
			}
		}
		foreach ($passing_players as $key => $value ) 
		{
			$passing_players[$key] = $value/$total_passes;
		}
		arsort($passing_players);

		return $passing_players;
	}
 }