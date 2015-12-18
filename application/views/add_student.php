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
$this->load->helper('form');
echo "<br/><br/><br/><br/><br/>";
echo form_open_multipart('student/insert_student');

	echo "<div class='col-md-6' style='text-align: center;'>";
	echo form_label('Upload Image:', 'upload');
	echo "<p style='margin-left: 40%;'>" . form_upload('upload') . "</p>";
	echo "<br/><br/>";
	
	echo form_label('First Name&nbsp', 'first_name');
	echo form_input('first_name', set_value('first_name'));
	echo form_error('first_name', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Last Name&nbsp', 'last_name');
	echo form_input('last_name', set_value('last_name'));
	echo form_error('last_name', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";


	echo form_label('Role&nbsp', 'role');
	echo form_input('role', 'worker', set_value('role'));
	echo form_error('role', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Email&nbsp', 'worker_email');
	echo form_input('worker_email', set_value('worker_email'));
	echo form_error('worker_email', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Password&nbsp', 'worker_pass');
	echo form_input('worker_pass', set_value('worker_pass'));
	echo form_error('worker_pass', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Phone&nbsp', 'phone');
	echo form_input('phone', set_value('phone'));
	echo form_error('phone', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Date of Birth&nbsp', 'date_of_birth');
	echo "<input type='date' name='date_of_birth'>";
	echo form_error('date_of_birth', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Sex:&nbsp', 'sex');
	$sex_data=array('name' => 'sex', 'value' => 'male', 'style'=> 'margin: 10px');
	echo form_label('Male', 'sex');
	echo form_radio($sex_data, set_value('sex'));
	$sex_data2=array('name' => 'sex', 'value' => 'female','style'=> 'margin: 10px');
	echo form_label('Female', 'sex');
	echo form_radio($sex_data2, set_value('sex'));
	echo form_error('sex', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('University&nbsp', 'university');
	echo form_input('university', set_value('university'));
	echo form_error('university', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Speciality&nbsp', 'speciality');
	echo form_input('speciality', set_value('speciality'));
	echo form_error('speciality', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";
	echo form_label('Professional Interest&nbsp', 'prof_interest');
	echo form_input('prof_interest', set_value('prof_interest'));
	echo "<br/><br/>";

	echo form_label('Smoker:&nbsp', 'smoker');
	$smoker_data=array('name' => 'smoker', 'value' => 'yes', 'style'=> 'margin: 10px');
	echo form_label('Yes', 'sex');
	echo form_radio($smoker_data, set_value('smoker'));
	$smoker_data2=array('name' => 'smoker', 'value' => 'no','style'=> 'margin: 10px');
	echo form_label('No', 'smoker');
	echo form_radio($smoker_data2, set_value('smoker'));
	echo form_error('smoker', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Alergies&nbsp', 'alergies');
	echo form_input('alergies', set_value('alergies'));
	echo "<br/><br/>";

	echo form_label('Specific Alergies&nbsp', 'alergies_specific');
	echo form_input('alergies_specific', set_value('alergies_specific'));
	echo "<br/><br/>";

	echo form_label('About&nbsp', 'about');
	echo form_input('about', set_value('about'));
	echo form_error('about', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";
	echo "</div>";
	echo "<div class='col-md-6'>";

	echo form_label('Interest1&nbsp', 'interests1');
	echo form_input('interests1', set_value('interests1'));
	echo form_error('interests1', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Interest2&nbsp', 'interests2');
	echo form_input('interests2', set_value('interests2'));
	echo form_error('interests2', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";
	

	echo form_label('Interest3&nbsp', 'interests3');
	echo form_input('interests3', set_value('interests3'));
	echo form_error('interests3', '<div class="error" style="color: red;">', '</div>');
	
	echo "<br/><br/>";


	echo form_label('Interest4&nbsp', 'interests4');
	echo form_input('interests4', set_value('interests4'));
	echo form_error('interests4', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";
	
	echo form_label('Address from ID card&nbsp', 'idcard_address');
	echo form_input('idcard_address', set_value('idcard_address'));
	echo "<br/><br/>";

	echo form_label('Current Address&nbsp', 'current_address');
	echo form_input('current_address', set_value('current_address'));
	echo "<br/><br/>";


	echo form_label('Address for Pickup 1&nbsp', 'address1');
	echo form_input('address1', set_value('address1'));
	echo form_error('address1', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Address for Pickup 2&nbsp', 'address2');
	echo form_input('address2', set_value('address2'));
	echo form_error('address2', '<div class="error" style="color: red;">', '</div>');
	echo "<br/><br/>";

	echo form_label('Name for Emergency contact&nbsp', 'em_contact_name');
	echo form_input('em_contact_name', set_value('em_contact_name'));
	echo "<br/><br/>";


	echo form_label('Phone of Emergency contact&nbsp', 'em_telephone');
	echo form_input('em_telephone', set_value('em_telephone'));
	echo "<br/><br/>";

	echo form_label('Email of Emergency contact&nbsp', 'em_email');
	echo form_input('em_email', set_value('em_email'));
	echo "<br/><br/>";


	echo form_label('Connection with Em. Contact&nbsp', 'em_connection');
	echo form_input('em_connection', set_value('em_connection'));
	echo "<br/><br/>";

	echo form_label('Address of Em. Contact&nbsp', 'em_address');
	echo form_input('em_address', set_value('em_address'));
	echo "<br/><br/>";
	

	echo form_label('Average score&nbsp', 'avg_score');
	echo form_input('avg_score', set_value('avg_score'));
	echo "<br/><br/>";

	echo form_label('Recommended by&nbsp', 'recommended_by');
	echo form_input('recommended_by', set_value('recommended_by'));
	echo "<br/><br/>";

	echo form_label('Score from recruitment test&nbsp', 'recruitment_score');
	echo form_input('recruitment_score', set_value('recruitment_score'));
	echo "<br/><br/>";
	echo form_submit('add_student', 'Add','class="btn btn-success"');
	echo "<br/><br/>";
	echo anchor("student", 'Back', array('class' => 'btn btn-info', 'role'=>'button'));
	echo "</div>";
	echo form_close();
}
else
{
	redirect('worker/login');
}
//$this->load->view('worker_templates/wfooter');
 ?>