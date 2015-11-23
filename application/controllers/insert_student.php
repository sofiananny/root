<?php

class Insert_student extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('insert_model');
}
function index() {
$data = array(
        'worker_name' => $this->input->post('worker_name'),
        'worker_email' => $this->input->post('worker_email'),
        'worker_pass'=>md5(trim($this->input->post('pass'))),
        'role' => $this->input->post('role'));
        $data2 = array(
        'phone' => $this->input->post('phone'),
        'date_of_birth' => $this->input->post('date_of_birth'),
        'sex' => $this->input->post('sex'),
        'university' => $this->input->post('university'),
        'speciality' => $this->input->post('speciality'),
        'smoker' => $this->input->post('smoker'),
        'alergies' => $this->input->post('alergies'),
        'alergies_specific' => $this->input->post('alergies_specific'),
        'about' => $this->input->post('about'),
        'interests1' => $this->input->post('interests1'),
        'interests2' => $this->input->post('interests2'),
        'interests3' => $this->input->post('interests3'),
        'interests4' => $this->input->post('interests4'),
        'idcard_address' => $this->input->post('idcard_address'),
        'current_address' => $this->input->post('current_address'),
        'address1' => $this->input->post('address1'),
        'address2' => $this->input->post('address2'),
        'em_contact_name' => $this->input->post('em_contact_name'),
        'em_telephone' => $this->input->post('em_telephone'),
        'em_email' => $this->input->post('em_email'),
        'em_connection' => $this->input->post('em_connection'),
        'em_address' => $this->input->post('em_address'),
        'avg_score' => $this->input->post('avg_score'),
        'recommended_by' => $this->input->post('recommended_by'),
        'recruitment_score' => $this->input->post('recruitment_score')
        );
$this->insert_model->form_insert($data, $data2);
$data['message'] = 'Data Inserted Successfully';
redirect('students');
}
}

}

?>