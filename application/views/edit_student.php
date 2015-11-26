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
              <?php echo $_SESSION['worker_name']; ?> <span class="caret"></span>
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
              <b><?php echo $_SESSION['worker_name']; ?> <span class="caret"></span></b>
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
<?php 
echo "<br/><br/><br/><br/>";

echo "<div class='col-xs-6' style='text-align: center'>";
$hidden = array('worker_id' => "$_GET[id]", 'student_id' => "$_GET[id]");
echo form_open_multipart('student/update_student', '', $hidden);

	echo form_label('Upload New Image:', 'upload');
	echo "<p style='margin-left: 40%;'>" . form_upload() . "</p>";
	echo "<br/><br/>";

	echo form_label('Name&nbsp', 'worker_name');
	echo form_input('worker_name', $one_student['worker_name']);
echo "<br/><br/>";
	echo form_label('Role&nbsp', 'role');
	echo form_input('role', $one_student['role']);
echo "<br/><br/>";
	echo form_label('Email&nbsp', 'worker_email');
	echo form_input('worker_email', $one_student['worker_email']);
echo "<br/><br/>";
	echo form_label('Phone&nbsp', 'phone');
	echo form_input('phone', $one_student['phone']);
echo "<br/><br/>";

echo form_label('Date of Birth&nbsp', 'date_of_birth');
	echo "<input type='date' name='date_of_birth' value=". $one_student['date_of_birth'] . ">";
	echo "<br/><br/>";

	echo form_label('Sex&nbsp', 'sex');
	echo form_input('sex', $one_student['sex']);
echo "<br/><br/>";
	echo form_label('University&nbsp', 'university');
	echo form_input('university', $one_student['university']);
echo "<br/><br/>";
	echo form_label('Speciality&nbsp', 'speciality');
	echo form_input('speciality', $one_student['speciality']);
echo "<br/><br/>";
	echo form_label('Professional Interest&nbsp', 'prof_interest');
	echo form_input('prof_interest', $one_student['prof_interest']);
echo "<br/><br/>";
	echo form_label('Smoker&nbsp', 'smoker');
	echo form_input('smoker', $one_student['smoker']);
echo "<br/><br/>";
	echo form_label('Alergies&nbsp', 'alergies');
	echo form_input('alergies', $one_student['alergies']);
echo "<br/><br/>";
	echo form_label('Specific Alergies&nbsp', 'alergies_specific');
	echo form_input('alergies_specific', $one_student['alergies_specific']);
echo "<br/><br/>";
	echo form_label('About&nbsp', 'about');
	echo form_input('about', $one_student['about']);
echo "<br/><br/>";
	echo "</div>";
	echo "<div class='col-md-6'>";
	echo form_label('Interest1&nbsp', 'interests1');
	echo form_input('interests1', $one_student['interests1']);
echo "<br/><br/>";
	echo form_label('Interest2&nbsp', 'interests2');
	echo form_input('interests2', $one_student['interests2']);
echo "<br/><br/>";
	echo form_label('Interest3&nbsp', 'interests3');
	echo form_input('interests3', $one_student['interests3']);
echo "<br/><br/>";
	echo form_label('Interest4&nbsp', 'interests4');
	echo form_input('interests4', $one_student['interests4']);
echo "<br/><br/>";
	echo form_label('Address from ID card&nbsp', 'idcard_address');
	echo form_input('idcard_address', $one_student['idcard_address']);
echo "<br/><br/>";
	echo form_label('Current Address&nbsp', 'current_address');
	echo form_input('current_address', $one_student['current_address']);
echo "<br/><br/>";
	echo form_label('Address for Pickup 1&nbsp', 'address1');
	echo form_input('address1', $one_student['address1']);
echo "<br/><br/>";
	echo form_label('Address for Pickup 2&nbsp', 'address2');
	echo form_input('address2', $one_student['address2']);
echo "<br/><br/>";
	echo form_label('Name for Emergency contact&nbsp', 'em_contact_name');
	echo form_input('em_contact_name', $one_student['em_contact_name']);
echo "<br/><br/>";
	echo form_label('Phone of Emergency contact&nbsp', 'em_telephone');
	echo form_input('em_telephone', $one_student['em_telephone']);
echo "<br/><br/>";
	echo form_label('Email of Emergency contact&nbsp', 'em_email');
	echo form_input('em_email', $one_student['em_email']);
echo "<br/><br/>";
	echo form_label('Connection with Em. Contact&nbsp', 'em_connection');
	echo form_input('em_connection', $one_student['em_connection']);
echo "<br/><br/>";
	echo form_label('Address of Em. Contact&nbsp', 'em_address');
	echo form_input('em_address', $one_student['em_address']);
echo "<br/><br/>";	
	echo form_label('Average score&nbsp', 'avg_score');
	echo form_input('avg_score', $one_student['avg_score']);
echo "<br/><br/>";
	echo form_label('Recommended by&nbsp', 'recommended_by');
	echo form_input('recommended_by', $one_student['recommended_by']);
echo "<br/><br/>";
	echo form_label('Score from recruitment test&nbsp', 'recruitment_score');
	echo form_input('recruitment_score', $one_student['recruitment_score']);
	echo "<br/>";
	echo "<form><input Type='button' VALUE='Back' onClick='history.go(-1);return true;''></form> &nbsp";
	echo form_submit('Edit', 'Update');
	echo "</div>";
	
echo form_close();

$this->load->view('worker_templates/wfooter'); 
?>