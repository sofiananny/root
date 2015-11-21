<?php
/**
 * Description of Account
 *
 * @author User
 */
class Admin_account extends CI_Controller {
  public function index(){
    $_SESSION['menu']=200;
    if (!isset($_SESSION['admin_id'])){ $this->load->view('admin_login_view'); }
    else {
      $this->load->model('admin_model');
      $data=array();
      $this->load->view('admin_account_view',$data);
    }
  }
}

