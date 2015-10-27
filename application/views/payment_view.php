<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>
  <div class="blue">
    <div class="white-container container">
      <br/><br/><br/><br/><br/><br/><br/>
      <a class="btn btn-login pull-right fw">плащам</a>
      <a class="btn btn-warning pull-left fw" onclick="window.location.href='order'">отказ</a>
    </div>
  </div>
<?php
//var_dump($_SESSION['order']);
$this->load->view('templates/footer');
?>