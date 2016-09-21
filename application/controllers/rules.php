<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('seasons_model');
	}

	public function index()
	{
		$season = $this->seasons_model->get_current_season();

		$data = array
		(
			'page_title' => 'Rules',
			'season' => $season,
		);

		$this->view_wrapper('rules', $data);
	}
}