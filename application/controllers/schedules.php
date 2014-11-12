<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Schedules',
		);

		$this->view_wrapper('standings', $data);
	}

	public function season()
	{
		$data = array
		(
			'page_title' => 'Season Schedule',
			'source' => '../../assets/img/gameSchedule.png',
		);
		$this->view_wrapper('image', $data);
	}

	public function referee()
	{
		$data = array
		(
			'page_title' => 'Referee Schedule',
			'source' => '../../assets/img/refSchedule.png'
		);
		$this->view_wrapper('image', $data);
	}
}