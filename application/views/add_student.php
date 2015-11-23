<?php $this->load->view('worker_templates/wheader');
if (isset($_SESSION['worker_id']) && $_SESSION['role'] === 'admin'){
		$this->output->enable_profiler(TRUE);
$this->load->helper('form');
echo "<br/><br/><br/><br/><br/>";
echo form_open('student/add_student');

	echo "<div class='col-md-6'>";
	echo form_label('Name&nbsp', 'worker_name');
	echo form_input('Name', '');


	echo form_label('Role&nbsp', 'role');
	echo form_input('Role', '');

	echo form_label('Email&nbsp', 'worker_email');
	echo form_input('Email', '');
	echo "<br/><br/>";

	echo form_label('Password&nbsp', 'pass');
	echo form_input('pass', '');

	echo form_label('Phone&nbsp', 'phone');
	echo form_input('Phone', '');

	echo form_label('Date of Birth&nbsp', 'date_of_birth');
	echo form_input('Date of Birth', '');

	echo form_label('Sex&nbsp', 'sex');
	echo form_input('Sex', '');
	echo "<br/><br/>";

	echo form_label('University&nbsp', 'university');
	echo form_input('University', '');

	echo form_label('Speciality&nbsp', 'speciality');
	echo form_input('Speciality', ' ');

	echo form_label('Professional Interest&nbsp', 'prof_interest');
	echo form_input('Professional Interest', '');
	echo "<br/><br/>";

	echo form_label('Smoker&nbsp', 'smoker');
	echo form_input('Smoker', '');

	echo form_label('Alergies&nbsp', 'alergies');
	echo form_input('Alergies', '');

	echo form_label('Specific Alergies&nbsp', 'alergies_specific');
	echo form_input('Specific Alergies', '');
	echo "<br/><br/>";

	echo form_label('About&nbsp', 'about');
	echo form_input('About', '');
	echo "<br/><br/>";
	echo "</div>";
	echo "<div class='col-md-6'>";

	echo form_label('Interest1&nbsp', 'interests1');
	echo form_input('Interest1', '');

	echo form_label('Interest2&nbsp', 'interests2');
	echo form_input('Interest2', '');

	echo form_label('Interest3&nbsp', 'interests3');
	echo form_input('Interest3', '');
	echo "<br/><br/>";


	echo form_label('Interest4&nbsp', 'interests4');
	echo form_input('Interest4', '');
	
	echo form_label('Address from ID card&nbsp', 'idcard_address');
	echo form_input('Address from ID card', '');

	echo form_label('Current Address&nbsp', 'current_address');
	echo form_input('Current Address', '');
	echo "<br/><br/>";


	echo form_label('Address for Pickup 1&nbsp', 'address1');
	echo form_input('Address for Pickup 1', '');

	echo form_label('Address for Pickup 2&nbsp', 'address2');
	echo form_input('Address for Pickup 2', '');
	echo "<br/><br/>";

	echo form_label('Name for Emergency contact&nbsp', 'em_contact_name');
	echo form_input('Name for Emergency contact', '');


	echo form_label('Phone of Emergency contact&nbsp', 'em_telephone');
	echo form_input('Phone of Emergency contact', '');
	echo "<br/><br/>";

	echo form_label('Email of Emergency contact&nbsp', 'em_email');
	echo form_input('Email of Emergency contact', '');


	echo form_label('Connection with Em. Contact&nbsp', 'em_connection');
	echo form_input('Connection with Em. Contact', '');
	echo "<br/><br/>";

	echo form_label('Address of Em. Contact&nbsp', 'em_address');
	echo form_input('Address of Em. Contact', '');
	

	echo form_label('Average score&nbsp', 'avg_score');
	echo form_input('Average score', '');
	echo "<br/><br/>";

	echo form_label('Recommended by&nbsp', 'recommended_by');
	echo form_input('Recommended by', '');

	echo form_label('Score from recruitment test&nbsp', 'recruitment_score');
	echo form_input('Score from recruitment test', '');
	echo "<form><input Type='button' value='Back' onClick='history.go(-1);return true;''></form> &nbsp";
	echo form_submit('add_student', 'Add');
	echo "</div>";
}
else
{
	redirect('worker/login');
}
$this->load->view('worker_templates/wfooter'); ?>