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
    elseif($_SESSION['role']==='admin') { 
    	redirect('student'); 
    }
    else{
      $this->load->library('form_validation');
    	$this->load->model('order_model');
    	$data['unapproved_orders'] = $this->order_model->get_all_unapproved_by_nanny($_SESSION['worker_id']);
    	$data['approved_orders'] = $this->order_model->get_all_approved_by_nanny($_SESSION['worker_id']);
      $data['current_order'] = $this->order_model->get_current_order_by_nanny($_SESSION['worker_id']);
    	$this->load->view('worker_requests_view', $data);
    }
  }

  function approve_order()
  {
  	//TODO - redirect does NOT work
  	$this->load->model('order_model');
  	$this->order_model->approve_order();
  	redirect('');
  }

  function parent_approve()
  {
    $this->load->model('order_model');
    $this->order_model->parent_approve();
    $this->index();
  }
}
