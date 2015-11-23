<?php $this->load->view('worker_templates/wheader');
$this->output->enable_profiler(TRUE);
$this->load->helper('form');
echo "<br/><br/><br/><br/><br/>";
$hidden = array('worker_id' => '$_GET[id]', 'student_id' => '$_GET[id]');
echo form_open('student/update_student', '', $hidden);

foreach ($one_student as $key => $value)
{
	echo "<div class='col-md-6'>";
	echo form_label('Name&nbsp', 'worker_name');
	echo form_input('Name', $value['worker_name']);


	echo form_label('Role&nbsp', 'role');
	echo form_input('Role', $value['role']);

	echo form_label('Email&nbsp', 'worker_email');
	echo form_input('Email', $value['worker_email']);
	echo "<br/><br/>";

	echo form_label('Phone&nbsp', 'phone');
	echo form_input('Phone', $value['phone']);

	echo form_label('Date of Birth&nbsp', 'date_of_birth');
	echo form_input('Date of Birth', $value['date_of_birth']);

	echo form_label('Sex&nbsp', 'sex');
	echo form_input('Sex', $value['sex']);
	echo "<br/><br/>";

	echo form_label('University&nbsp', 'university');
	echo form_input('University', $value['university']);

	echo form_label('Speciality&nbsp', 'speciality');
	echo form_input('Speciality', $value['speciality']);

	echo form_label('Professional Interest&nbsp', 'prof_interest');
	echo form_input('Professional Interest', $value['prof_interest']);
	echo "<br/><br/>";

	echo form_label('Smoker&nbsp', 'smoker');
	echo form_input('Smoker', $value['smoker']);

	echo form_label('Alergies&nbsp', 'alergies');
	echo form_input('Alergies', $value['alergies']);

	echo form_label('Specific Alergies&nbsp', 'alergies_specific');
	echo form_input('Specific Alergies', $value['alergies_specific']);
	echo "<br/><br/>";

	echo form_label('About&nbsp', 'about');
	echo form_input('About', $value['about']);
	echo "<br/><br/>";
	echo "</div>";
	echo "<div class='col-md-6'>";

	echo form_label('Interest1&nbsp', 'interests1');
	echo form_input('Interest1', $value['interests1']);

	echo form_label('Interest2&nbsp', 'interests2');
	echo form_input('Interest2', $value['interests2']);

	echo form_label('Interest3&nbsp', 'interests3');
	echo form_input('Interest3', $value['interests3']);
	echo "<br/><br/>";


	echo form_label('Interest4&nbsp', 'interests4');
	echo form_input('Interest4', $value['interests4']);
	
	echo form_label('Address from ID card&nbsp', 'idcard_address');
	echo form_input('Address from ID card', $value['idcard_address']);

	echo form_label('Current Address&nbsp', 'current_address');
	echo form_input('Current Address', $value['current_address']);
	echo "<br/><br/>";


	echo form_label('Address for Pickup 1&nbsp', 'address1');
	echo form_input('Address for Pickup 1', $value['address1']);

	echo form_label('Address for Pickup 2&nbsp', 'address2');
	echo form_input('Address for Pickup 2', $value['address2']);
	echo "<br/><br/>";

	echo form_label('Name for Emergency contact&nbsp', 'em_contact_name');
	echo form_input('Name for Emergency contact', $value['em_contact_name']);


	echo form_label('Phone of Emergency contact&nbsp', 'em_telephone');
	echo form_input('Phone of Emergency contact', $value['em_telephone']);
	echo "<br/><br/>";

	echo form_label('Email of Emergency contact&nbsp', 'em_email');
	echo form_input('Email of Emergency contact', $value['em_email']);


	echo form_label('Connection with Em. Contact&nbsp', 'em_connection');
	echo form_input('Connection with Em. Contact', $value['em_connection']);
	echo "<br/><br/>";

	echo form_label('Address of Em. Contact&nbsp', 'em_address');
	echo form_input('Address of Em. Contact', $value['em_address']);
	

	echo form_label('Average score&nbsp', 'avg_score');
	echo form_input('Average score', $value['avg_score']);
	echo "<br/><br/>";

	echo form_label('Recommended by&nbsp', 'recommended_by');
	echo form_input('Recommended by', $value['recommended_by']);

	echo form_label('Score from recruitment test&nbsp', 'recruitment_score');
	echo form_input('Score from recruitment test', $value['recruitment_score']);
	echo "<form><input Type='button' VALUE='Back' onClick='history.go(-1);return true;''></form> &nbsp";
	echo form_submit('edit_student', 'Update');
	echo "</div>";
}

echo form_close();
$this->load->view('worker_templates/wfooter'); ?>