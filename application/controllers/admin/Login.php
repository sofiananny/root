<?php

class Login extends CI_Controller {
  public function index(){
    $_SESSION['menu']=100;
    if (isset($_SESSION['admin_id'])){ redirect('student'); }
    else {$this->load->view('admin_login_view'); }

  }
  public function login_admin(){
    $response['success']=false;
    $errors=array();
    $this->load->model('admin_model');
    if ($this->admin_model->login_admin()) { $response['success']=true; }
    $response['errors']=$errors;
    echo json_encode($response);
  }
  public function logout_admin(){
    unset($_SESSION['admin_id']);
    $response['success']=true;
    header('Content-Type: application/json');
    echo json_encode($response);
  }
}

?>
