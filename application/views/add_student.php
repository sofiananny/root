<?php $this->load->view('worker_templates/wheader');
if (isset($_SESSION['worker_id']) && $_SESSION['role'] === 'admin'){
		
	}
else
{
	redirect('worker/login');
}
$this->load->view('worker_templates/wfooter'); ?>