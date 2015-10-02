<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Rules',
		);

		$this->view_wrapper('rules', $data);
	}
}