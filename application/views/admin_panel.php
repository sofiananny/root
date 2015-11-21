<?php $this->load->view('admin_templates/aheader');
echo "<br/><br/> <br/><br/> <table class='table table-striped'>";
foreach ($all_students as $key => $value)
{
	echo "<tr><td> $value[worker_name]</td></tr>";
}
echo "</table>";
$this->load->view('admin_templates/afooter'); ?>