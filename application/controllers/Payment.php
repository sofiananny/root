<?php
/**
 * Description of Payment
 *
 * @author User
 */
class Payment extends CI_Controller {
  function index(){
//    unset($_SESSION['order']);
    if (isset($_SESSION['userid']) && isset($_SESSION['order']) && $_SESSION['order']['valid']){
      $this->load->view('payment_view');
    }
    else { redirect(base_url().'Order'); }
  }
}
