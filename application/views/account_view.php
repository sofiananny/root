<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>
  <div class="blue">
    <div class="white-container container">
      <div class="row">
        <form class="col-md-5" action="account/update">
          <h3 style="margin: 30px 0;">Лични данни</h3>
          <div class="form-group row">
            <div class="col-sm-2"><label class="control-label">Имена</label></div>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="username" id="username" value="<?php echo htmlspecialchars($usr->username); ?>"/>
              <span class="help-block">Въведете Вашите имена!</span>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"><label class="control-label">Телефон</label></div>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $usr->phone; ?>"/>
              <span class="help-block">Въведете телефон!</span>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"><label class="control-label">Email</label></div>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="email" id="email" value="<?php echo $usr->email; ?>"/>
              <span class="help-block">Невалиден e-mail!</span>
              <div id="email_busy" style="display: none; margin-top: 3px; width: 100%;">
                <span class="label label-danger" style="display: block; width: 100%;">
                  Има регистриран друг потребител с този e-mail!
                </span>
              </div>
            </div>
          </div>
          <div id="success_data" class="alert alert-success" style="display: none; margin: 20px 0;">
            <span class="glyphicon glyphicon-ok"></span> &nbsp; Промените са записани успешно.
          </div>
          <button type="submit" id="save_change" class="btn btn-login fw btn-lg">Запиши промените</button><br/><br/>
        </form>
        <form class="col-md-6 col-md-offset-1" action="account/newPass">
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
          <button type="submit" id="save_change" class="btn btn-login fw btn-lg">Промени паролата</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    
  </script>
<?php
$this->load->view('templates/footer');
?>