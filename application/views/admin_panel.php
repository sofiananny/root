<?php $this->load->view('worker_templates/wheader');
echo "<br/><br/><br/><br/><br/><div class='col-lg-12' style='text-align: center'><table class='table table-striped' border 1 px black>
<tr><td>ID</td>
<td>Name</td>
<td>Role</td>
<td>Sex</td>
<td>View Profile</td>
<td>Edit Student</td></tr>
";
foreach ($all_students as $key => $value)
{
	echo "<tr><td> $value[worker_id]</td>
	<td> $value[worker_name]</td>
	<td> $value[role]</td>
	<td> $value[sex]</td>	
	<td><a href='student/view_student?id=$value[worker_id]' class='btn btn-success' id='$value[worker_id]' role='button'>View</td>
	<td><a href='student/edit_student?id=$value[worker_id]' class='btn btn-info' id='$value[worker_id]' role='button'>Edit</td>
	</tr>";
}
echo "</table></div>";
$this->load->view('worker_templates/wfooter'); ?>