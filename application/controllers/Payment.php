<?php
/**
 * Description of Payment
 *
 * @author User
 */
class Payment extends CI_Controller {
  function index(){
//    unset($_SESSION['order']);
    $this->output->enable_profiler(TRUE);
    if (isset($_SESSION['userid']) && isset($_SESSION['order']) && $_SESSION['order']['valid']){
      $this->load->model('order_model');
      $this->order_model->add_order();

      $this->load->view('payment_view');
      unset($_SESSION['order']);
    }
    else { 
    	redirect(base_url().'Order'); 
    }
  }
}
