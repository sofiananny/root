<?php
/**
 * Description of Account
 *
 * @author User
 */
class Account extends CI_Controller {
  public function index(){
    if (isset($_SESSION['userid'])) {
      $this->load->model('users_model');
      $data['usr']=$this->users_model->getUserData();
      $this->load->view('account_view',$data);
    }
    else { redirect(base_url()); }
  }
  function update(){
    if (isset($_SESSION['userid'])) {
      $response['success']=false;
      $errors=array();
      $this->load->model('users_model');
      $this->load->library('form_validation');
      $val=$this->form_validation;
      $val->set_rules('username','','trim|required|min_length[5]|max_length[50]');
      $val->set_rules('phone','','trim|required|numeric|min_length[9]|max_length[50]');
      $val->set_rules('email','','trim|required|valid_email|max_length[50]');
      $exsist=$this->users_model->isExsistEmail();
      if ($exsist && $exsist != $_SESSION['userid']) { $errors[]='email_busy'; }
      if ($val->run() && empty($errors)) {
        $this->users_model->updateUser();
        $response['success']=true;
        $response['username']=$_SESSION['username'];
      }
      else { foreach ($val->error_array() as $key=>$value) { $errors[]=$key; } }
      $response['errors']=$errors;
      header('Content-Type: application/json');
      echo json_encode($response);
    }
    else { redirect(base_url()); }
  }
  function newPass(){
    if (isset($_SESSION['userid'])) {
      $response['success']=false;
      $errors=array();
      $this->load->library('form_validation');
      $val=$this->form_validation;
      $val->set_rules('old_pass','','trim|required|min_length[4]|max_length[30]');
      $val->set_rules('pass','','trim|required|min_length[4]|max_length[30]');
      if (strlen(trim($this->input->post('pass')))) {
        $val->set_rules('pass2','','trim|required|matches[pass]');
      }
      if ($val->run() && empty($errors)) {
        $this->load->model('users_model');
        if ($this->users_model->newPass()) { $response['success']=true; }
        else { $errors[]='old_pass'; }
      }
      else { foreach ($val->error_array() as $key=>$value) { $errors[]=$key; } }
      $response['errors']=$errors;
      header('Content-Type: application/json');
      echo json_encode($response);
    }
    else { redirect(base_url()); }
  }
}