<?php
/**
 * Description of Account
 *
 * @author User
 */
class Worker_account extends CI_Controller {
  public function index(){
    $_SESSION['menu']=200;
    if (!isset($_SESSION['worker_id'])){ $this->load->view('worker_login_view'); }
    else {
      $this->load->model('worker_model');
      $data=array();
//      $data['worker']=$this->users_model->getWorkerData();
      $this->load->view('worker_account_view',$data);
    }
  }
  /*function newPass(){
    if (!isset($_SESSION['worker_id'])){ $this->load->view('worker_login_view'); }
    else {
      $response['success']=false;
      $errors=array();
      $this->load->library('form_validation');
      $val=$this->form_validation;
      $val->set_rules('old_pass','','trim|required|min_length[4]|max_length[30]');
      $val->set_rules('pass','','trim|required|min_length[4]|max_length[30]');
      if (strlen(trim($this->input->post('pass')))) {
        $val->set_rules('pass2','','trim|required|matches[pass]');
      }
      if ($val->run()) {
        $this->load->model('worker_model');
        if ($this->worker_model->newPass()) { $response['success']=true; }
        else { $errors[]='old_pass'; }
      }
      else { foreach ($val->error_array() as $key=>$value) { $errors[]=$key; } }
      $response['errors']=$errors;
      header('Content-Type: application/json');
      echo json_encode($response);
    }
  }*/
}

