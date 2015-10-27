  <div class="modal" id="nannyLoginModal" tabindex="-1" role="dialog" aria-labelledby="nannyLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title modal-title-logo" style="margin: -10px 0; height: 40px">&nbsp</h4>
        </div>
        <div class="modal-body">
          <div id="login-div">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <span class="btn btn-block btn-primary" style="margin: 12px 0;">
                  <img style="margin-right: 8px;" src="<?php echo base_url(); ?>assets/img/facebook.icon.png"/>
                  <span class="btn-inside-text">Вход през Facebook</span>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12" style="padding: 0 25px 0 25px">
                <hr/>
                <center style="margin-top: -30px;"><span style="padding: 12px; background-color: #FFF">или</span></center>
              </div>
            </div>
            <div class="row">
              <form class="col-sm-10 col-sm-offset-1" action="login/login_usr">
                <div style="height: 30px; padding: 8px 0;">
                  <div id="no_user" style="display: none; width: 100%;">
                    <span class="label label-danger" style="display: block; width: 100%;">
                      Грешен e-mail и/или парола!
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input id="login_email" type="email" class="form-control" name="email" 
                         placeholder="Email-а с който сте регистрирани" required>
                  <span class="help-block">Невалиден e-mail!</span>
                </div>
                <div class="form-group">
                  <label class="control-label">Парола</label>
                  <input id="login_password" type="password" class="form-control" name="pass" 
                         placeholder="Вашата парола за този сайт" required>
                  <span class="help-block">Паролата трябва да бъде между 4 и 30 символа!</span>
                  <p>
                    <a class="pull-right" href="javascript:;" onclick="$('#login-div,#forgot-password').toggle(600);">
                      Забравена парола?
                    </a>
                  </p>
                </div>
                <br/>
                <button type="submit" class="btn btn-block btn-success">Вход</button>
                <label>
                  Нямате акаунт?&nbsp;
                  <a href="javascript:;" onclick="$('#login-div,#regist').toggle(600);">Регистрирайте се!</a>
                </label>
              </form>
            </div>
          </div>
          <div id="forgot-password" class="row" style="display: none;">
            <form class="col-sm-10 col-sm-offset-1" action="login/forgot_password">
              <h4 class="modal-title"><i>Забравили сте Вашата парола?</i></h4><br/>
              <p>Въведете e-mail адреса, който сте използвали за да се регистрирате и ние ще Ви изпратим нова парола.</p>
              <div class="form-group">
                <input id="femail" class="form-control" type="text" name="email" 
                       placeholder="Email-а с който сте регистрирани"/>
                <span id="flabel" class="help-block"></span>
              </div>
              <button id="fpass" type="submit" class="btn btn-block btn-primary" style="margin: 20px 0" onclick="$(this).attr('disabled',true)">
                Получи на email
              </button>
              <div id="success" class="alert alert-success" role="success" style="display: none; margin-top: 20px;">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Новата Ви парола е изпратена успешно.
              </div>
            </form>
          </div>
          <div id="regist" class="row" style="display: none;">
            <center><h4 class="modal-title"><i>Регистрирайте се</i></h4></center><br/>
            <form class="col-sm-10 col-sm-offset-1" action="login/regist">
              <div class="form-group">
                <label class="control-label">Имена</label>
                <input class="form-control" type="text" name="username" id="username" required/>
                <span class="help-block">Въведете Вашите имена!</span>
              </div>
              <div class="form-group">
                <label class="control-label">Телефон</label>
                <input class="form-control" type="text" name="phone" id="phone" required/>
                <span class="help-block">Въведете телефон!</span>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" required/>
                <span class="help-block">Невалиден e-mail!</span>
                <div id="email_busy" style="display: none; margin-top: 3px; width: 100%;">
                  <span class="label label-danger" style="display: block; width: 100%;">
                    Вече има регистриран потребител с този e-mail!
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Парола</label>
                <input class="form-control" type="password" name="pass" id="pass" required/>
                <span class="help-block">Паролата трябва да бъде между 4 и 30 символа!</span>
              </div>
              <div class="form-group">
                <label class="control-label">Потвърдете паролата</label>
                <input class="form-control" type="password" name="pass2" id="pass2" required/>
                <span class="help-block">Потвърдената парола не съвпада!</span>
              </div><br/>
              <label>
                Регистрирайки се, Вие се съгласявате с нашите <a target="_blank" href="#">условия за ползване</a>
              </label>
              <button type="submit" class="btn btn-block btn-success" style="margin: 20px 0">Регистрирай ме</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  
  </script>
  