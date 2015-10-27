<?php
/**
 * Description of Delayed_extension
 *
 * @author User
 */
class Delayed_extension  extends CI_Controller {
  function index(){
    $_SESSION['menu']=3;
    if (!isset($_SESSION['worker_id'])){ $this->load->view('worker_login_view'); }
    else { $this->load->view('delayed_extension_view'); }
  }
}
