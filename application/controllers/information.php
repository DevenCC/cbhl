<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array
		(
			'page_title' => 'Information',
		);

		$this->view_wrapper('information', $data);
	}
}