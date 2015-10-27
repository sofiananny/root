<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('worker_templates/wheader');
?>

  <form id="login" class="col-xs-10 col-sm-6 col-md-4 col-xs-offset-1 col-sm-offset-3 col-md-offset-4" action="login/login_worker">
    <br/>
    <div class="form-group">
      <label class="control-label">Потребител</label>
      <input id="login_email" type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label class="control-label">Парола</label>
      <input id="login_password" type="password" class="form-control" name="pass" required>
      <p><a class="pull-right" href="javascript:;" onclick="">Забравена парола?</a></p>
    </div>
    <p style="padding: 30px 30% 10px 30%;"><button type="submit" class="btn btn-block btn-default">Вход</button></p>
  </form>
<?php
$this->load->view('worker_templates/wfooter');
?>
