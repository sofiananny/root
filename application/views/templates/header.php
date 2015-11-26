<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="initial-scale=1, user-scalable=no"/>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
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
<?php if (!isset($_SESSION['userid'])) { $this->load->view('templates/login_form'); }  ?>
  <div id="nanny-header-wrap">
    <div id="top-div">
      <div class="container">
        <a class="logo" href="<?php echo base_url(); ?>" 
           style="">
<!--<p style="margin-left: 62px; margin-top: -26px; color: #444; width: 130px;"><i><b>градска бавачка</b></i></p> -->
        </a>
      </div>
    </div>
    <div class="header-content container">
      <div class="small-header-wrap">
        <div id="top_r" class="pull-right" style="position: relative">
<?php 
  if (!isset($_SESSION['userid'])) { //Не е логнат потребител ******************
    echo "          <a id=\"enter\" class=\"btn btn-login fw\" data-toggle=\"modal\" data-target=\"#nannyLoginModal\"";
    echo " onclick=\"showLogin('login-div')\">вход</a>\n";
  }
  else { // Логнат потребител **************************************************
    echo "          <a class=\"btn btn-login fw\" onclick=\"json_sbm('login/logout','')\">изход</a>\n";
  }
  echo "          <a id='to_order' class=\"btn btn-order fw\" onclick=\"window.location.href='order'\">поръчай</a>\n";
  if (isset($_SESSION['userid'])) { //Към профила на потребител ****************
    echo "          <a href=\"account\" class=\"to_account\"><span class=\"glyphicon glyphicon-user to_account_g\">";
    echo "</span><span id=\"usr_names\">{$_SESSION['username']}</span></a>\n";
  }
?>
        </div>
      </div>
    </div>
  </div>
<?php  // var_dump($_SESSION); ?>
