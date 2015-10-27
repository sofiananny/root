<?php
/**
 * Description of Requests
 *
 * @author User
 */
class Requests extends CI_Controller {
  function index(){
    $_SESSION['menu']=1;
    if (!isset($_SESSION['worker_id'])){ $this->load->view('worker_login_view'); }
    else { $this->load->view('worker_requests_view'); }
  }
}
