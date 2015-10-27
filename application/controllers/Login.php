<?php
/**
 * Description of forgot_password
 *
 * @author User
 */
class Login extends CI_Controller {
  function login_usr(){
    $response['success']=false;
    $errors=array();
    $this->load->model('users_model');
    if (filter_var($this->input->post('email'),FILTER_VALIDATE_EMAIL)) {
      if (strlen(trim($this->input->post('pass')))>3) {
        if ($this->users_model->isExsistUser()) {
          $response['success']=true;
          $response['top_r']=<<<TOP_R
          <a class="btn btn-danger fw" onclick="json_sbm('login/logout','')">изход</a>
          <a id='to_order' class="btn btn-order fw" onclick="window.location.href='order'">поръчай</a>
          <a href="account" class="to_account">
            <span class="glyphicon glyphicon-user to_account_g"></span><span id="usr_names">{$_SESSION['username']}</span>
          </a>
TOP_R;
        }
        else { $errors[]='no_user'; }
      }
      else { $errors[]='login_password'; }
    }
    else { $errors[]='login_email'; }
    $response['errors']=$errors;
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  function logout(){
    unset($_SESSION['userid']);
    $response['success']=true;
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  function forgot_password(){
    $response['success']=false;
    $errors=array(0=>'flabel');
    $this->load->model('users_model');
    $response['msg']='Невалиден email.';
    if (filter_var($this->input->post('email'),FILTER_VALIDATE_EMAIL)) {
      if ($this->users_model->isExsistEmail()) { 
        $this->users_model->generatePassword();
        $response['success']=true;
      }
      else {
        $response['msg']='Няма регистриран потребител с този e-mail.';
      }
    }
    $response['errors']=$errors;
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  function regist(){
    $response['success']=false;
    $errors=array();
    $this->load->model('users_model');
    $this->load->library('form_validation');
    $val=$this->form_validation;
    $val->set_rules('username','','trim|required|min_length[5]|max_length[50]');
    $val->set_rules('phone','','trim|required|numeric|min_length[9]|max_length[50]');
    $val->set_rules('email','','trim|required|valid_email|max_length[50]');
    $val->set_rules('pass','','trim|required|min_length[4]|max_length[30]');
    if (strlen(trim($this->input->post('pass')))) {
      $val->set_rules('pass2','','trim|required|matches[pass]');
    }
    if ($this->users_model->isExsistEmail()) { $errors[]='email_busy'; }
    if ($val->run() && empty($errors)) {
        $this->users_model->insertUser();
        $response['success']=true;
        $response['top_r']=<<<TOP_R
          <a class="btn btn-danger fw" onclick="json_sbm('login/logout','')">изход</a>
          <a id='to_order' class="btn btn-order fw" onclick="window.location.href='order'">поръчай</a>
          <a href="account" class="to_account">
            <span class="glyphicon glyphicon-user to_account_g"></span><span id="usr_names">{$_SESSION['username']}</span>
          </a>
TOP_R;
    }
    else { foreach ($val->error_array() as $key=>$value) { $errors[]=$key; } }
    $response['errors']=$errors;
    header('Content-Type: application/json');
    echo json_encode($response);
  }
}
