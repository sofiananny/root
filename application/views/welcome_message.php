<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/header');
?>
  <a class="btn-up" onclick="$('html,body').animate({ scrollTop: 0 }, 800);">
    <span class="glyphicon glyphicon-menu-up"></span>
  </a>
  <div id="welcome-div">
    <div style="display: table; height: 100%; width: 100%;">
      <div style="display: table-cell; vertical-align: middle; text-align: center;">
        <center><h1></h1></center>
        <h3>
          <p style="margin-bottom: 20px;">намерете бавачка в Cофия бързо и лесно</p>
          <button class="btn btn-r" onclick="$('html,body').animate({ scrollTop: $('#nanny-waiting').offset().top-80 }, 800);">
            присъедини се
          </button>
        </h3>
      </div>
    </div>
    <div style="width: 100%; background-color: #FFF; position: absolute; bottom: 0; height: 60px; opacity: 0.8">
      <a class="btn-dwn" onclick="$('html,body').animate({ scrollTop: $('#how-work').offset().top-80 }, 800);">
        <span class="glyphicon glyphicon-menu-down"></span>
      </a>
    </div>
  </div>
  <div id="how-work">
    <div class="container">
      <div class="row">
        <center><h2>Как работи?</h2></center><br/>
        <div class="col-sm-4">
          <img alt="time" src="<?php echo base_url(); ?>assets/img/time2.png" width="128px"/>
          <p>
            Бавачката идва в посочения начален час на адреса и гледа детето за времетраенето на резервираната продължителност
          </p>
        </div>
        <div class="col-sm-4">
          <img alt="transport" src="<?php echo base_url(); ?>assets/img/transport2.png" width="128px"/>
          <p>
            Ние се грижим за организирането на транспорта при пристигането и заминаването на бавачката 
          </p>
        </div>
        <div class="col-sm-4">
          <img alt="online" src="<?php echo base_url(); ?>assets/img/online2.png" width="128px"/>
          <p>
            Bсички процеси са онлайн – поръчвате и променяте заявката за посещение директно във
<?php 
  if (isset($_SESSION['userid'])) { echo "            <a href='account'><b>Вашия профил</b></a>\n"; }
  else { echo "            <a href='' data-toggle='modal' data-target='#nannyLoginModal' onclick=\"showLogin('login-div')\"><b>Вашия профил</b></a>\n";  }
?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div id="nanny-waiting">
    <center style="padding: 10px 0; background: rgba(255, 255, 255, 0.9)">
      <h3>Запишете се, за да научите първи, когато стартираме пълната версия на сайта</h3>
    </center>
    <div style="display: table; height: 100%; width: 100%; margin-top: -100px">
      <form action="invite" style="display: table-cell; vertical-align: middle; text-align: center;">
        <div class="col-md-6" style="padding-left: 15%">
          <input id="invite" name="email" type="email" class="form-control" required placeholder="email"/>
          <div id="success-invite" class="alert alert-success" style="display: none; width: 100%; padding-top: 25px;">
            <h4>Благодарим Ви! Ще бъдете уведомени, когато сме готови.</h4>
            <div class="fb-share-button" data-href="https://www.facebook.com/sofiananny/" data-layout="button_count"></div>
          </div>
        </div>
        <div class="col-md-6"><button type="submit" class="btn btn-r">присъедини се</button></div>
      </form>
    </div>
    <div style="background: rgba(255, 255, 255, 0.7); height: 60px; width: 100%; margin-top: -110px"></div>
  </div>
  <div id="why">
    <div class="container">
      <div class="row">
        <div class="hidden-xs hidden-sm col-md-4 col-lg-5">
          <br/><br/>
          <div style="min-height: 675px">
            <img id="pin" alt="pin" src="<?php echo base_url(); ?>assets/img/pin.png" width="100%"/>
          </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-7">
          <div class="row">
            <div class="col-sm-2 visible-sm-block">
              <br/>
              <img alt="pin" src="<?php echo base_url(); ?>assets/img/pin.png" width="100%"/>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-12" style="margin-bottom: 15px;">
              <center><h2>Защо SofiaNanny?</h2></center><br/>
              <p id="why_sofia">
                Кога за последно прекарахте романтична вечер с любимия човек, наслаждавайки се на любовта помежду Ви?
              </p>
              <p id="why_sofia">
                Имате ли на разположение доверен човек, на когото да поверите малкото човече за няколко часа и да 
                сте сигурни, че то е в добри ръце?
              </p>
            </div>
          </div>
          <div class="row">
            <img class="col-xs-3 col-sm-2 i4" alt="safety" src="<?php echo base_url(); ?>assets/img/safety.png"/>
            <div class="col-xs-9 col-sm-10">
              <h4>Сигурност</h4>
              <p class="p120">
                Бавачките на SofiaNanny са отговорни, мотивирани студенти, които ние специално сме подбрали и обучили.
              </p>
            </div>
          </div>
          <div class="row">
            <img class="col-xs-3 col-sm-2 i4" alt="flexibility" src="<?php echo base_url(); ?>assets/img/flexibility.png"/>
            <div class="col-xs-9 col-sm-10">
              <h4>Гъвкавост</h4>
              <p class="p120">
                Наемете бавачка за няколко часа само когато имате нужда. Може да направите заявка за посещение и в 
                последния момент. Ще я приемем!
              </p>
            </div>
          </div>
          <div class="row">
            <img class="col-xs-3 col-sm-2 i4" alt="businesscause" src="<?php echo base_url(); ?>assets/img/businesscause.png"/>
            <div class="col-xs-9 col-sm-10">
              <h4>Бизнес с кауза</h4>
              <p class="p120">
                Използвайки услугите на SofiaNanny, Вие помагате на студент да завърши образованието си!
                Давате му достойна работа, чрез която да се издържа, без да е необходимо да пренебрегва учението си.
              </p>
            </div>
          </div>
          <div class="row">
            <img class="col-xs-3 col-sm-2 i4" alt="accreditation" src="<?php echo base_url(); ?>assets/img/accreditation.png"/>
            <div class="col-xs-9 col-sm-10">
              <h4>Акредитация</h4>
              <p class="p120">
                Бавачките на SofiaNanny са сертифицирани от най-уважаваната световна организация – 
                Американския червен кръст – за предоставяне на услугата “babysitting”. Нашите бавачки са обучени 
                как да развличат детето с разнообрази игри, и как да реагират в стресови ситауции, изискващи 
                навременна адекватна намеса.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="btn-up" onclick="$('html,body').animate({ scrollTop: 0 }, 800);">
    <span class="glyphicon glyphicon-menu-up"></span>
  </a>
  <script>
    $(window).scroll(function() {
      if ($(window).scrollTop()>$(window).height()-90 && $('.btn-up').css('display')=='none' ||
          $(window).scrollTop()<$(window).height()-90 && $('.btn-up').css('display')=='block') {
        $('.btn-up').toggle(); 
      }
    });
  </script>
<?php
  $this->load->view('templates/footer');
?>