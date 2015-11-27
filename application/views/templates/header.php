<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="initial-scale=1, user-scalable=no"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0" />
  <meta name="apple-mobile-web-app-capable" content="yes"/>
  <title>SofiaNanny</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:300,400&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/pin.png"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nanny.css">
  <link href='https://fonts.googleapis.com/css?family=Comfortaa:300,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
<body>
<?php if (!isset($_SESSION['userid'])) { $this->load->view('templates/login_form'); } ?>
  <div id="nanny-header-wrap">
    <div id="top-div">
      <div class="container"><a class="logo" href="<?php echo base_url(); ?>"></a></div>
    </div>
    <div class="header-content container">
      <div class="small-header-wrap">
        <div id="top_r" class="pull-right" style="position: relative">
          <?php echo anchor('order', 'поръчай', array('class'=>'btn btn-order fw', 'id'=>'to_order')); ?>
          <!--<a id='to_order' class="btn btn-order fw" onclick="$('html,body').animate({ scrollTop: $('#nanny-waiting').offset().top-80 }, 800);">поръчай</a>-->
<?php if (!isset($_SESSION['userid'])) { //Не е логнат потребител *********** ?>
           <a class="btn btn-login fw" data-toggle="modal" data-target="#nannyLoginModal" onclick="$('html,body').animate({ scrollTop: $('login-div').offset().top-80 }, 800);">вход</a>
<?php  } else { // Логнат потребител **************************************** ?>
          <div class="dropdown pull-right">
            <button class="btn btn-login fw dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" 
                    aria-expanded="true">профил <span class="caret"></span></button>
            <ul id="profile" class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li>
                <a href="account">
                  <span class="glyphicon glyphicon-user to_account_g"></span>
                  <span id="usr_names"><?php echo $_SESSION['username']; ?></span>
                </a>
              </li>
              <li><a href="javascript: void(0)"  onclick="json_sbm('login/logout','')">Изход</a></li>
           </ul>
         </div>
<?php  } ?>
        </div>
      </div>
    </div>
  </div>