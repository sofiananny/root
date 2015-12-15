<?php if (isset($_SESSION['worker_id']) && $_SESSION['role'] === 'admin'){ ?>
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
  <!--<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>-->
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
              <?php echo $_SESSION['first_name']; ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url(); ?>../../worker/login/logout_worker">Изход</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="nav navbar-nav" id="items">
          <li><a onClick='history.go(-1);return true;'>Списък студенти<span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav hidden-xs navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: red">
              <b><?php echo $_SESSION['first_name']; ?> <span class="caret"></span></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url(); ?>../../worker/login/logout_worker">Изход</a></li>
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
echo "<br/><br/><br/><br/><br/><div class='col-lg-12' style='text-align: center'>
<img src='../uploads/". $one_student['image'] . "'  alt='avatar' style='width:200px; height:250px;'>
<br/><br/>
<table class='table table-striped table-responsive' border 1 px black>
<tr><th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Role</th>
<th>Email</th>
<th>Sex</th>
<th>Phone Number</th>
<th>Date of Birth</th>
<th>University</th>
<th>Speciality</th>
<th>Professional interests</th>
<th>Smoker?</th></tr>";
	echo "<tr><td> $one_student[worker_id]</td>
	<td> $one_student[first_name]</td>
  <td> $one_student[last_name]</td>
	<td> $one_student[role]</td>
  <td> $one_student[worker_email]</td>
	<td> $one_student[sex]</td>
	<td> $one_student[phone]</td>
	<td> $one_student[date_of_birth]</td>
	<td> $one_student[university]</td>
	<td> $one_student[speciality]</td>
	<td> $one_student[prof_interest]</td>
	<td> $one_student[smoker]</td></tr>";
echo "</table>";
echo "<div class='col-lg-12' style='text-align: center'><table class='table table-striped table-responsive' border 1 px black>
<tr><th>Alergies</th>
<th>Specific alergies</th>
<th>About student</th>
<th>Interest 1</th>
<th>Interest 2</th>
<th>Interest 3</th>
<th>Interest 4</th>
<th>Address from ID</th>
<th>Current address</th></tr>";
	echo "<tr>
	<td> $one_student[alergies]</td>
	<td> $one_student[alergies_specific]</td>
	<td> $one_student[about]</td>
	<td> $one_student[interests1]</td>
	<td> $one_student[interests2]</td>
	<td> $one_student[interests3]</td>
	<td> $one_student[interests4]</td>
	<td> $one_student[idcard_address]</td>
	<td> $one_student[current_address]</td></tr></table>";
echo "<div class='col-lg-12' style='text-align: center'><table class='table table-striped table-responsive' border 1 px black><tr><td>1st address for pickup</td>
<th>2nd address for pickup</th>
<th>Emergency contact names</th>
<th>Emergency contact phone</th>
<th>Emergency contact email</th>
<th>Emergency contact connection (relativce, friend etc.)</th>
<th>Emergency contact address</th>
<th>Average score in school</th>
<th>Recommended by</th>
<th>Recruitment test score</th>
</tr>";
	echo "<tr>
	<td> $one_student[address1]</td>
	<td> $one_student[address2]</td>
	<td> $one_student[em_contact_name]</td>
	<td> $one_student[em_telephone]</td>
	<td> $one_student[em_email]</td>
	<td> $one_student[em_connection]</td>
	<td> $one_student[em_address]</td>
	<td> $one_student[avg_score]</td>
	<td> $one_student[recommended_by]</td>
	<td> $one_student[recruitment_score]</td>	
	</tr></table>";
echo anchor("student", 'Back', array('class' => 'btn btn-info', 'role'=>'button'));
echo "<br/><br/><br/><br/>";
echo "<a href='delete_student?id=$one_student[worker_id]' class='col-lg-2 btn btn-danger' role='button'>Delete student</a>";
}
else
{
	redirect('worker/requests');
}
$this->load->view('worker_templates/wfooter'); ?>