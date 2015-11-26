<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>SofiaNanny</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/pin.png"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-toggle.min.css">
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-toggle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/worker.css">
  <link rel="stylesheet" type="text/css" href="http:////cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"> <!--datatables-->
  <script type="text/javascript" charset="utf8" src="http:////cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script><!--datatables-->
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img alt="SofiaNanny" src="<?php echo base_url(); ?>assets/img/logo_2r.png" style="height: 50px;"/>
<?php if (isset($_SESSION['worker_id'])) { ?>      
        <ul class="navbar-brand visible-xs-block pull-right" style="margin-bottom: 0px; list-style-type: none; margin-left: -300px;">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration: none; color: #777; color: red">
              <?php echo $_SESSION['worker_name']; ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url(); ?>/worker/login/logout_worker">Изход</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="nav navbar-nav" id="items">
          <li><a href="student">Списък студенти<span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav hidden-xs navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: red">
              <b><?php echo $_SESSION['worker_name']; ?> <span class="caret"></span></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url(); ?>/worker/login/logout_worker">Изход</a></li>
            </ul>
          </li>
        </ul>
<?php } ?>
      </div>
    </div>
  </nav>
<?php if (false) { $this->load->view('templates/login_form'); }  ?>
<script type="text/javascript">$(document).ready( function () {
    $('#admintable').DataTable();
} );</script>
<?php 
if (isset($_SESSION['worker_id']) && $_SESSION['role'] === 'admin'){
echo '<br/><br/><br/><br/><br/>
	<div class="col-lg-12" style="text-align: center">
	<a href="student/add_student" class="col-xs-1 btn btn-danger" role="button">Add Student</a><br/><br/>
	<table id="admintable"class="table table-striped" border 1 px black>
	<tr><td>No</td>
	<td>Name</td>
	<td>View Profile</td>
	<td>Edit Student</td></tr>
	';
	$num=1;
	foreach ($all_students as $key => $value)
	{
		echo "<tr><td> $num</td>
		<td> $value[worker_name]</td>
		<td><a href='student/view_student?id=$value[worker_id]' class='btn btn-success' id='$value[worker_id]' role='button'>View</td>
		<td><a href='student/edit_student?id=$value[worker_id]' class='btn btn-info' id='$value[worker_id]' role='button'>Edit</td>
		</tr>";
		$num++;
	}
echo "</table></div>";
}
else
{
	redirect('worker/requests');
}
$this->load->view('worker_templates/wfooter'); ?>