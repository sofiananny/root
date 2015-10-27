<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('worker_templates/wheader');
?>
  <div class="container container-main">
  <div class="col-md-5">
    <h3 style="margin: 30px 0;">Лични данни</h3>
    <p style="color: red">
      Информацията в този раздел се въвежда от администратора на SofiaNanny.<br/>
      Ако откриете несъотсветствия, моля уведомете администратора.
    </p>
  </div>
  <form class="col-md-6 col-md-offset-1" action="worker_account/newPass">
    <h3 style="margin: 30px 0;">Смяна на парола</h3>
    <div class="form-group row">
      <div class="col-sm-4"><label class="control-label">Текуща парола</label></div>
      <div class="col-sm-8">
        <input class="form-control" type="password" name="old_pass" id="old_pass"/>
        <span class="help-block">Невярна парола!</span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4"><label class="control-label">Нова парола</label></div>
      <div class="col-sm-8">
        <input class="form-control" type="password" name="pass" id="pass"/>
        <span class="help-block">Паролата трябва да бъде между 4 и 30 символа!</span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4"><label class="control-label">Повторете новата парола</label></div>
      <div class="col-sm-8">
        <input class="form-control" type="password" name="pass2" id="pass2"/>
        <span class="help-block">Потвърдената парола не съвпада!</span>
      </div>
    </div>
    <div id="success_pass" class="alert alert-success" style="display: none; margin: 20px 0;">
      <span class="glyphicon glyphicon-ok"></span> &nbsp; Паролата е променена успешно.
    </div>
    <button type="submit" class="btn btn-info btn-lg pull-right">Промени паролата</button>
  </form>
  </div>
<?php
$this->load->view('worker_templates/wfooter');
?>
