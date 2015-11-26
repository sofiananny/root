<?php
/**
 * Description of Worker
 *
 * @author User
 */
class Login extends CI_Controller {
  public function index(){
    $_SESSION['menu']=100;
    if (isset($_SESSION['worker_id'])){ redirect('student'); }
    else {$this->load->view('worker_login_view'); }
  }
 public function login_worker(){
    $response['success']=false;
    $errors=array();
    $this->load->model('worker_model');
    if ($this->worker_model->login_worker()) { $response['success']=true; }
    $response['errors']=$errors;
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  public function logout_worker(){
    unset($_SESSION['worker_id']);
    $response['success']=true;
    header('Content-Type: application/json');
    echo json_encode($response);
    redirect('worker/requests');
  }
}

?>
