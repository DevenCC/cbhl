<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller {
  /**
   * Constructor: initialize required libraries.
   */
  public function __construct() {
    parent::__construct();
    // For when they exist
    //$this->load->model('user_model');
  }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
			'page_title' => 'Welcome',
			//'splash_image' => 'assets/img/cbhlLogo' . rand(1,2) . '.png',
			'splash_image' => 'assets/img/cbhlLogo.png',
		);
		$this->view_wrapper('index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
