<?php if (isset($_SESSION['worker_id']) && $_SESSION['role'] === 'admin'){ ?>
<?php $this->load->view('worker_templates/wheader');
$this->output->enable_profiler(TRUE);
echo "<br/><br/><br/><br/><br/><div class='col-lg-12' style='text-align: center'><table class='table table-striped table-responsive' border 1 px black>
<tr><td>ID</td>
<td>Name</td>
<td>Role</td>
<td>Sex</td>
<td>Phone Number</td>
<td>Date of Birth</td>
<td>University</td>
<td>Speciality</td>
<td>Professional interests</td>
<td>Smoker?</td></tr>";
foreach ($one_student as $key => $value)
{
	echo "<tr><td> $value[worker_id]</td>
	<td> $value[worker_name]</td>
	<td> $value[role]</td>
	<td> $value[sex]</td>
	<td> $value[phone]</td>
	<td> $value[date_of_birth]</td>
	<td> $value[university]</td>
	<td> $value[speciality]</td>
	<td> $value[prof_interest]</td>
	<td> $value[smoker]</td></tr>";
}
echo "</table>";
echo "<div class='col-lg-12' style='text-align: center'><table class='table table-striped table-responsive' border 1 px black><tr><td>Alergies</td>
<td>Specific alergies</td>
<td>About student</td>
<td>Interest 1</td>
<td>Interest 2</td>
<td>Interest 3</td>
<td>Interest 4</td>
<td>Address from ID</td>
<td>Current address</td></tr>";
foreach ($one_student as $key => $value)
{
	echo "<tr><td> $value[alergies_specific]</td>
	<td> $value[about]</td>
	<td> $value[interests1]</td>
	<td> $value[interests2]</td>
	<td> $value[interests3]</td>
	<td> $value[interests4]</td>
	<td> $value[idcard_address]</td>
	<td> $value[current_address]</td></tr></table>";
	}
echo "<div class='col-lg-12' style='text-align: center'><table class='table table-striped table-responsive' border 1 px black><tr><td>1st address for pickup</td>
<td>2nd address for pickup</td>
<td>Emergency contact names</td>
<td>Emergency contact phone</td>
<td>Emergency contact email</td>
<td>Emergency contact connection (relativce, friend etc.)</td>
<td>Emergency contact address</td>
<td>Average score in school</td>
<td>Recommended by</td>
<td>Recruitment test score</td>
</tr>";
foreach ($one_student as $key => $value)
{
	echo "<tr>
	<td> $value[address1]</td>
	<td> $value[address2]</td>
	<td> $value[em_contact_name]</td>
	<td> $value[em_telephone]</td>
	<td> $value[em_email]</td>
	<td> $value[em_connection]</td>
	<td> $value[em_address]</td>
	<td> $value[avg_score]</td>
	<td> $value[recommended_by]</td>
	<td> $value[recruitment_score]</td>	
	</tr></table>";
}
}
else
{
	redirect('worker/requests');
}
$this->load->view('worker_templates/wfooter'); ?>