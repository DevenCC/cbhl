<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('players_model');
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Standings',
			'message' => 'Hello World'
		);

		$this->view_wrapper('standings', $data);
	}

	public function player()
	{
		$data = array
		(
			'page_title' => 'Player Standings',
			'players' => $this->players_model->get_all(),
		);

		unset($data["players"][45]);
		unset($data["players"][46]);
		unset($data["players"][47]);
		unset($data["players"][48]);
		unset($data["players"][49]);

		$this->view_wrapper('standings', $data);
	}
}