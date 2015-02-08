<?php
/**
 * @file
 * Extends the base controller to load the PHP session upon construction. Also
 * provides a convienient way to render a view and check if the user is logged
 * in.
 */
class MY_Controller extends CI_Controller  {
  public function __construct() {
    parent::__construct();
    session_start();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('date');
    $this->load->model('system_message_model');
    //$this->load->model('user_model');
  }

  /**
   * Load the specified View, automatically wrapping it between the site's
   * header and footer.
   */
  public function view_wrapper($template, $data = array(), $display_messages = TRUE) {
    $data['navbar_logo'] = base_url('assets/img/SimpleWhiteLogo.png');
    $data['system_messages'] = array();
    if ($display_messages) {
      $data['system_messages'] = $this->system_message_model->get_messages();
    }
    $data['is_logged_in'] = $this->is_logged_in();
    $this->load->view('include/header', $data);

    if ($data['is_logged_in']){
      //$data['user'] = $this->user_model->get($this->get_current_user());
    }

    $this->load->view('include/navigation', $data);
    $this->load->view('include/system_messages', $data);
    $this->load->view($template, $data);
    $this->load->view('include/footer');
  }

  /**
   * Convinience function to determine if the user is logged in.
   * @returns
   *   TRUE if the user is currently authenticated, FALSE otherwise.
   */
  protected function is_logged_in() {
    return isset($_SESSION['uid']);
  }

  /**
   * Convinience function to get the student ID of the currently logged in user.
   */
  protected function get_current_user() {
    return isset($_SESSION['uid']) ? $_SESSION['uid'] : 0;
  }

  protected function set_current_user($uid) {
    $_SESSION['uid'] = $uid;
  }

  protected function destroy_session() {
    unset($_SESSION['uid']);
    unset($_SESSION['cid']);
    unset($_SESSION['last_login_time']);
  }

  /**
   * Verifies the current user's session and redirects to the login form if the
   * user has not authenticated.
   */
  protected function require_login() {
    if (!$this->is_logged_in()) {
      $this->system_message_model->set_message('Please login to access this page.', MESSAGE_WARNING);
      redirect('user/login', 'location');
      die();
    }
  }

  /**
  * Verifies that client is not logged in, and if so, it logs them out but allows them to view
  * the originally requested page (ie Registration)
  */
  protected function require_not_login(){
    if ($this->is_logged_in()){
      $this->system_message_model->set_message('You have been automatically logged out in order to view this page.', MESSAGE_WARNING);
      $this->destroy_session();
    }
  }
}
